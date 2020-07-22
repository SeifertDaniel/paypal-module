<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The create subscription request details.
 *
 * generated from: subscription_request_post.json
 */
class SubscriptionRequestPost implements JsonSerializable
{
    use BaseModel;

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
     * @var SubscriberRequest
     * The subscriber request information .
     */
    public $subscriber;

    /**
     * @var boolean
     * DEPRECATED. Indicates whether the subscription auto-renews after the billing cycles complete.
     */
    public $auto_renewal = false;

    /**
     * @var ApplicationContext
     * The application context, which customizes the payer experience during the subscription approval process with
     * PayPal.
     */
    public $application_context;

    public function validate()
    {
        assert(!isset($this->plan_id) || strlen($this->plan_id) >= 3);
        assert(!isset($this->plan_id) || strlen($this->plan_id) <= 50);
        assert(!isset($this->start_time) || strlen($this->start_time) >= 20);
        assert(!isset($this->start_time) || strlen($this->start_time) <= 64);
        assert(!isset($this->quantity) || strlen($this->quantity) >= 1);
        assert(!isset($this->quantity) || strlen($this->quantity) <= 32);
        assert(isset($this->shipping_amount));
        assert(isset($this->application_context));
    }
}
