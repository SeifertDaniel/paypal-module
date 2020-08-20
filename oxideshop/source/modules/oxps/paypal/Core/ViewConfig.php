<?php

/**
 * This file is part of OXID eSales Paypal module.
 *
 * OXID eSales Paypal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales Paypal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales Paypal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace OxidProfessionalServices\PayPal\Core;

use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Core\PaypalSession;

/**
 * @mixin \OxidEsales\Eshop\Core\ViewConfig
 */
class ViewConfig extends ViewConfig_parent
{
    /**
     * @return bool
     */
    public function isPayPalActive(): bool
    {
        return $this->getPayPalConfig()->isActive();
    }

    /**
     * @return bool
     */
    public function isPayPalSessionActive(): bool
    {
        return PaypalSession::isPaypalOrderActive();
    }

    /**
     * TODO: get the exclude-function from amazon
     * @return bool
     */
    public function isPaypalExclude(): bool
    {
        return false;
    }

    /**
     * @return Config
     */
    public function getPayPalConfig(): Config
    {
        return oxNew(Config::class);
    }

    /**
     * @return null or string
     */
    public function getcheckoutOrderId(): ?string
    {
        return PaypalSession::getcheckoutOrderId();
    }

    /**
     * Gets PayPal JS SDK url
     *
     *  @param string $paymentStrategy ('continue', 'pay_now') commit the order or Show a Confirmation Page
     *
     * @return string
     */
    public function getPayPalJsSdkUrl($paymentStrategy = true): string
    {
        $payPalConfig = $this->getPayPalConfig();
        $config = Registry::getConfig();

        $params = [];

        $params['client-id'] = $payPalConfig->getClientId();
        $params['integration-date'] = Constants::PAYPAL_INTEGRATION_DATE;
        $params['intent'] = strtolower(Constants::PAYPAL_ORDER_INTENT_CAPTURE);
        $params['commit'] = ($paymentStrategy == 'pay_now' ? 'true' : 'false');

        if ($currency = $config->getActShopCurrencyObject()) {
            $params['currency'] = strtoupper($currency->name);
        }

        return Constants::PAYPAL_JS_SDK_URL . '?' . http_build_query($params);
    }
}
