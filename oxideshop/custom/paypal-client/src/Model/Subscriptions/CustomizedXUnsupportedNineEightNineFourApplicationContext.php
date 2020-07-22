<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The application context, which customizes the payer experience during the subscription approval process with
 * PayPal.
 *
 * generated from: customized_x_unsupported_9894_application_context.json
 */
class CustomizedXUnsupportedNineEightNineFourApplicationContext implements JsonSerializable
{
    use BaseModel;

    /** Get the customer-provided shipping address on the PayPal site. */
    const SHIPPING_PREFERENCE_GET_FROM_FILE = 'GET_FROM_FILE';

    /** Redacts the shipping address from the PayPal site. Recommended for digital goods. */
    const SHIPPING_PREFERENCE_NO_SHIPPING = 'NO_SHIPPING';

    /** Get the merchant-provided address. The customer cannot change this address on the PayPal site. If merchant does not pass an address, customer can choose the address on PayPal pages. */
    const SHIPPING_PREFERENCE_SET_PROVIDED_ADDRESS = 'SET_PROVIDED_ADDRESS';

    /**
     * @var string
     * The label that overrides the business name in the PayPal account on the PayPal site.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $brand_name;

    /**
     * @var string
     * The [language tag](https://tools.ietf.org/html/bcp47#section-2) for the language in which to localize the
     * error-related strings, such as messages, issues, and suggested actions. The tag is made up of the [ISO 639-2
     * language code](https://www.loc.gov/standards/iso639-2/php/code_list.php), the optional [ISO-15924 script
     * tag](https://www.unicode.org/iso15924/codelists.html), and the [ISO-3166 alpha-2 country
     * code](/docs/integration/direct/rest/country-codes/).
     *
     * minLength: 2
     * maxLength: 10
     */
    public $locale;

    /**
     * @var string
     * The location from which the shipping address is derived.
     *
     * use one of constants defined in this class to set the value:
     * @see SHIPPING_PREFERENCE_GET_FROM_FILE
     * @see SHIPPING_PREFERENCE_NO_SHIPPING
     * @see SHIPPING_PREFERENCE_SET_PROVIDED_ADDRESS
     * minLength: 1
     * maxLength: 24
     */
    public $shipping_preference = 'GET_FROM_FILE';

    /**
     * @var PaymentMethod
     * The customer and merchant payment preferences.
     */
    public $payment_method;

    /**
     * @var string
     * The URL where the customer is redirected after the customer approves the payment.
     *
     * minLength: 10
     * maxLength: 4000
     */
    public $return_url;

    /**
     * @var string
     * The URL where the customer is redirected after the customer cancels the payment.
     *
     * minLength: 10
     * maxLength: 4000
     */
    public $cancel_url;

    public function validate()
    {
        assert(!isset($this->brand_name) || strlen($this->brand_name) >= 1);
        assert(!isset($this->brand_name) || strlen($this->brand_name) <= 127);
        assert(!isset($this->locale) || strlen($this->locale) >= 2);
        assert(!isset($this->locale) || strlen($this->locale) <= 10);
        assert(!isset($this->shipping_preference) || strlen($this->shipping_preference) >= 1);
        assert(!isset($this->shipping_preference) || strlen($this->shipping_preference) <= 24);
        assert(!isset($this->return_url) || strlen($this->return_url) >= 10);
        assert(!isset($this->return_url) || strlen($this->return_url) <= 4000);
        assert(!isset($this->cancel_url) || strlen($this->cancel_url) >= 10);
        assert(!isset($this->cancel_url) || strlen($this->cancel_url) <= 4000);
    }
}
