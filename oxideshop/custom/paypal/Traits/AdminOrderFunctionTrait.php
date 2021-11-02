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

namespace OxidProfessionalServices\PayPal\Traits;

use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Application\Model\Order;
use OxidProfessionalServices\PayPal\Api\Exception\ApiException;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Money;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Patch;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\ShippingDetail;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionActivateRequest;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionCancelRequest;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionCaptureRequest;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionSuspendRequest;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Subscription as PayPalSubscription;
use OxidProfessionalServices\PayPal\Repository\SubscriptionRepository;

trait AdminOrderFunctionTrait
{
    /**
     * Updates subscription
     *
     * @throws ApiException
     * @throws StandardException
     */
    public function update()
    {
        $request = Registry::getRequest();
        $subscriptionId = $this->getPayPalSubscription()->id;

        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $subscriptionService = $serviceFactory->getSubscriptionService();

        $shippingAddress = $request->getRequestEscapedParameter('shippingAddress');
        $shippingAmount = $request->getRequestEscapedParameter('shippingAmount');
        $billingInfo = $request->getRequestEscapedParameter('billingInfo');

        $patches = [];

        if ($shippingAddress) {
            $patches[] = new Patch([
                'op' => Patch::OP_REPLACE,
                'path' => '/subscriber/shipping_address',
                'value' => new ShippingDetail($shippingAddress),
            ]);
        }

        if ($shippingAmount) {
            $patches[] = new Patch([
                'op' => Patch::OP_REPLACE,
                'path' => '/shipping_amount',
                'value' => new Money($shippingAmount),
            ]);
        }

        $outstandingBalance = $billingInfo['outstanding-balance'] ?? null;

        if ($outstandingBalance) {
            $patches[] = new Patch([
               'op' => Patch::OP_REPLACE,
               'path' => '/billing_info/outstanding_balance',
               'value' => new Money($outstandingBalance),
            ]);
        }

        $subscriptionService->updateSubscription($subscriptionId, $patches);
    }

    /**
     * Updates subscription status
     */
    public function updateStatus()
    {
        $request = Registry::getRequest();
        $subscriptionId = $this->getPayPalSubscription()->id;

        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $subscriptionService = $serviceFactory->getSubscriptionService();

        if ($status = $request->getRequestEscapedParameter('status')) {
            $statusNote = $request->getRequestEscapedParameter('statusNote');
            switch ($status) {
                case 'ACTIVE':
                    $subscriptionService->activateSubscription(
                        $subscriptionId,
                        new SubscriptionActivateRequest(['reason' => $statusNote])
                    );
                    break;
                case 'SUSPENDED':
                    $subscriptionService->suspendSubscription(
                        $subscriptionId,
                        new SubscriptionSuspendRequest(['reason' => $statusNote])
                    );
                    break;
                case 'CANCELED':
                    $subscriptionService->cancelSubscription(
                        $subscriptionId,
                        new SubscriptionCancelRequest(['reason' => $statusNote])
                    );
                    break;
            }
        }
    }

    /**
     * Captures outstanding subscription fee
     */
    public function captureOutstandingFee()
    {
        $request = Registry::getRequest();
        $subscriptionId = $this->getPayPalSubscription()->id;

        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $subscriptionService = $serviceFactory->getSubscriptionService();

        $params = [
            'note' => $request->getRequestEscapedParameter('captureNote'),
            'capture_type' => SubscriptionCaptureRequest::CAPTURE_TYPE_OUTSTANDING_BALANCE,
            'amount' => $request->getRequestEscapedParameter('outstandingFee')
        ];

        $subscriptionService->captureAuthorizedPaymentOnSubscription(
            $subscriptionId,
            new SubscriptionCaptureRequest($params)
        );
    }

    private function getSubscriptionProduct(string $paypalSubscriptionId)
    {
        $subscriptionProduct = null;

        $sql = 'SELECT OXPAYPALSUBPRODID
                  FROM oxps_paypal_subscription
                 WHERE PAYPALBILLINGAGREEMENTID = ?';

        $subProdId = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)
            ->getOne(
                $sql,
                [
                    $paypalSubscriptionId
                ]
            );

        if ($subProdId) {
            $sql = 'SELECT PAYPALPRODUCTID
                      FROM oxps_paypal_subscription_product
                     WHERE OXID = ?';

            $subscriptionProductId = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)
                ->getOne(
                    $sql,
                    [
                        $subProdId
                    ]
                );

            if ($subscriptionProductId) {
                $subscriptionProduct = Registry::get(ServiceFactory::class)
                    ->getCatalogService()->showProductDetails($subscriptionProductId);
            }
        }

        return $subscriptionProduct;
    }

    /**
     * Is the object a subscription?
     * @param string|null $orderId
     * @return bool
     */
    public function isPayPalSubscription(string $orderId = null)
    {
        $repository = new SubscriptionRepository();
        $subscription = $repository->getSubscriptionByOrderId($orderId);
        return (bool) (
            isset($subscription['OXPARENTORDERID'])
            && $subscription['OXPARENTORDERID'] == ''
        );
    }

    /**
     * Is the object a subscription?
     * @param string|null $orderId
     * @return bool
     */
    public function isCancelRequestSended(string $orderId = null)
    {
        $repository = new SubscriptionRepository();
        return $repository->isCancelRequestSended($orderId);
    }

    /**
     * Is the object a Part-subscription?
     * @param string|null $orderId
     * @return bool
     */
    public function isPayPalPartSubscription(string $orderId = null)
    {
        $repository = new SubscriptionRepository();
        $subscription = $repository->getSubscriptionByOrderId($orderId);
        return (bool) (
            isset($subscription['OXPARENTORDERID'])
            && $subscription['OXPARENTORDERID'] !== ''
        );
    }

    /**
     * Get associated PayPal subscription
     *
     * @return PayPalSubscription
     * @throws ApiException
     * @throws StandardException
     */
    private function getPayPalSubscription(string $billingAgreementId): PayPalSubscription
    {
        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $subscriptionService = $serviceFactory->getSubscriptionService();

        return $subscriptionService->showSubscriptionDetails($billingAgreementId, 'last_failed_payment');
    }

    /**
     * template-getter getpayPalSubscription
     * @param string|null $orderId
     * @return obj
     */
    public function getParentSubscriptionOrder(string $orderId = null)
    {
        $result = null;
        $repository = new SubscriptionRepository();
        if ($subscription = $repository->getSubscriptionByOrderId($orderId)) {
            $parentOrder = oxNew(Order::class);
            if ($parentOrder->load($subscription['OXPARENTORDERID'])) {
                $result = $parentOrder;
            }
        }
        return $result;
    }
}
