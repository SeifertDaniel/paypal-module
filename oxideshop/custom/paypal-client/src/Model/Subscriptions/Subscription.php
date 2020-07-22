<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The subscription details.
 *
 * generated from: subscription.json
 */
class Subscription extends SubscriptionStatus implements JsonSerializable
{
    use BaseModel;

    /** PayPal currency conversion. */
    const PREFERRED_CURRENCY_CONVERSION_PAYPAL = 'PAYPAL';

    /** Vendor currency conversion. */
    const PREFERRED_CURRENCY_CONVERSION_VENDOR = 'VENDOR';

    /**
     * @var string
     * The PayPal-generated ID for the subscription.
     *
     * minLength: 3
     * maxLength: 50
     */
    public $id;

    /**
     * @var string
     * The ID of the plan.
     *
     * minLength: 3
     * maxLength: 50
     */
    public $plan_id;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $start_time;

    /**
     * @var string
     * The quantity of the product in the subscription.
     *
     * minLength: 1
     * maxLength: 32
     */
    public $quantity;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $shipping_amount;

    /**
     * @var Payee
     * The merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
     */
    public $payee;

    /**
     * @var Subscriber
     * The subscriber response information.
     */
    public $subscriber;

    /**
     * @var SubscriptionBillingInfo
     * The billing details for the subscription. If the subscription was or is active, these fields are populated.
     */
    public $billing_info;

    /**
     * @var boolean
     * DEPRECATED. Indicates whether the subscription auto-renews after the billing cycles complete.
     */
    public $auto_renewal = false;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $update_time;

    /**
     * @var string
     * The list of currency conversion providers.
     *
     * use one of constants defined in this class to set the value:
     * @see PREFERRED_CURRENCY_CONVERSION_PAYPAL
     * @see PREFERRED_CURRENCY_CONVERSION_VENDOR
     */
    public $preferred_currency_conversion;

    /**
     * @var FundingInstrumentResponse
     * The customer's funding instrument. Returned as a funding option to external entities.
     */
    public $preferred_funding_source;

    /**
     * @var array<array>
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     */
    public $links;

    public function validate()
    {
        assert(!isset($this->id) || strlen($this->id) >= 3);
        assert(!isset($this->id) || strlen($this->id) <= 50);
        assert(!isset($this->plan_id) || strlen($this->plan_id) >= 3);
        assert(!isset($this->plan_id) || strlen($this->plan_id) <= 50);
        assert(!isset($this->start_time) || strlen($this->start_time) >= 20);
        assert(!isset($this->start_time) || strlen($this->start_time) <= 64);
        assert(!isset($this->quantity) || strlen($this->quantity) >= 1);
        assert(!isset($this->quantity) || strlen($this->quantity) <= 32);
        assert(isset($this->shipping_amount));
        assert(isset($this->billing_info));
        assert(!isset($this->create_time) || strlen($this->create_time) >= 20);
        assert(!isset($this->create_time) || strlen($this->create_time) <= 64);
        assert(!isset($this->update_time) || strlen($this->update_time) >= 20);
        assert(!isset($this->update_time) || strlen($this->update_time) <= 64);
    }
}
