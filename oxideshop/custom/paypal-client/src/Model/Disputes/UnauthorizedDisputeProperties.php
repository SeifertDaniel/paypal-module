<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer-entered issue details for an unauthorized dispute.
 *
 * generated from: response-unauthorized_dispute_properties.json
 */
class UnauthorizedDisputeProperties implements JsonSerializable
{
    use BaseModel;

    /**
     * @var boolean
     * Indicates whether the customer changed their password after a spoof incident.
     */
    public $password_changed;

    /**
     * @var boolean
     * Indicates whether the customer changed their PIN after a spoof incident.
     */
    public $pin_changed;

    /**
     * @var boolean
     * Indicates whether the customer changed their answers to security questions after a spoof incident.
     */
    public $security_questions_changed;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $review_sla;

    /**
     * @var array<string>
     * An array of transaction IDs that the user reported as unauthorized but that PayPal rejected.
     */
    public $rejected_dispute_transactions;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->review_sla) || Assert::minLength($this->review_sla, 20, "review_sla in UnauthorizedDisputeProperties must have minlength of 20 $within");
        !isset($this->review_sla) || Assert::maxLength($this->review_sla, 64, "review_sla in UnauthorizedDisputeProperties must have maxlength of 64 $within");
        !isset($this->rejected_dispute_transactions) || Assert::isArray($this->rejected_dispute_transactions, "rejected_dispute_transactions in UnauthorizedDisputeProperties must be array $within");
    }

    public function __construct()
    {
    }
}
