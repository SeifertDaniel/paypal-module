<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The cancel subscription request details.
 *
 * generated from: subscription_cancel_request.json
 */
class SubscriptionCancelRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * The reason for the cancellation of a subscription.
     *
     * @var string
     * minLength: 1
     * maxLength: 128
     */
    public $reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->reason, "reason in SubscriptionCancelRequest must not be NULL $within");
        Assert::minLength(
            $this->reason,
            1,
            "reason in SubscriptionCancelRequest must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->reason,
            128,
            "reason in SubscriptionCancelRequest must have maxlength of 128 $within"
        );
    }

    public function __construct()
    {
    }
}
