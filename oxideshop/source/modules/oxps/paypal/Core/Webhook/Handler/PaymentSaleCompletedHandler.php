<?php

/**
 * This file is part of OXID eSales PayPal module.
 *
 * OXID eSales PayPal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales PayPal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales PayPal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace OxidProfessionalServices\PayPal\Core\Webhook\Handler;

use OxidProfessionalServices\PayPal\Core\Webhook\Event;
use OxidProfessionalServices\PayPal\Repository\SubscriptionRepository;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Application\Model\Order;
use OxidEsales\Eshop\Application\Model\OrderArticle;
use OxidEsales\Eshop\Application\Model\Article;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
use OxidEsales\Eshop\Core\Field;
use OxidEsales\Eshop\Core\Price;

class PaymentSaleCompletedHandler implements HandlerInterface
{
    /**
     * @inheritDoc
     */
    public function handle(Event $event): void
    {
        $lang = Registry::getLang();
        $data = $event->getData()['resource'];

        $subscriptionRepository = new SubscriptionRepository();

        // collect relevant IDs
        $ids = $subscriptionRepository->getAllIdsFromBillingAgreementId($data['billing_agreement_id']);
        $orderId = $ids['OXORDERID'];
        $oldArticleId = $ids['OXARTID'];
        $payPalProductId = $ids['PAYPALPRODUCTID'];
        $payPalSubscriptionPlanId = $ids['PAYPALSUBSCRIPTIONPLANID'];

        // collect Paypal-PlanDetails & -ProductDetails
        $sf = Registry::get(ServiceFactory::class);

        $subscriptionPlan = $sf
            ->getSubscriptionService()
            ->showPlanDetails('string', $payPalSubscriptionPlanId, 1);

        $payPalProduct = $sf
            ->getCatalogService()
            ->showProductDetails($payPalProductId);

        // collect cycles
        // todo: Need the source for this information
        $actualCycle = 1;
        $totalCycles = 10;

        // prepare price
        $vat = $subscriptionPlan->taxes->percentage;
        $isBrutto = $subscriptionPlan->taxes->inclusive;
        $enterNetPrice = Registry::getConfig()->getConfigParam('blEnterNetPrice');
        $billingSubTotal = (float)$data['amount']['details']['subtotal'];
        $amount = 1;

        $singlePrice = oxNew(Price::class);
        $singlePrice->setVat($vat);
        if ($isBrutto) {
            $singlePrice->setBruttoPriceMode();
        } else {
            $singlePrice->setNettoPriceMode();
        }
        $singlePrice->setPrice($billingSubTotal);

        // create a temporary article that we can add to the new order
        $oldArticle = oxNew(Article::class);
        $oldArticle->load($oldArticleId);

        $newArticle = oxNew(Article::class);
        $newArticle->assign([
            'oxarticles__oxtitle'  => sprintf(
                $lang->translateString('OXPS_PAYPAL_SUBSCRITION_PART_ARTICLE_TITLE'),
                $payPalProduct->name,
                $actualCycle,
                $totalCycles
            ),
            'oxarticles__oxprice'  => ($enterNetPrice ? $singlePrice->getNettoPrice() : $singlePrice->getBruttoPrice()),
            'oxarticles__oxvat'    => $vat,
            'oxarticles__oxartnum' => $oldArticle->oxarticles__oxartnum->value
        ]);
        $newArticle->save();
        $newArticleId = $newArticle->getId();

        // create order-article based on temporary article
        $newOrderArticle = oxNew(OrderArticle::class);
        $newOrderArticle->oxorderarticles__oxartid = new Field($newArticleId);
        $newOrderArticle->oxorderarticles__oxamount = new Field($amount);
        $newOrderArticle->oxorderarticles__oxartnum = new Field($oldArticle->oxarticles__oxartnum->value);

        // clone the old order and add the new article
        $oldOrder = oxNew(Order::class);
        $oldOrder->load($orderId);
        $newOrder = oxNew(Order::class);
        $newOrder->oxClone($oldOrder);
        $newOrder->oxorder__oxordernr = null;
        $newOrder->setId();
        $newOrder->recalculateOrder([$newOrderArticle]);

        // delete the temporary article
        $newArticle->delete();
    }
}
