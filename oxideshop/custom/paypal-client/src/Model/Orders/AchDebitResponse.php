<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * ACH bank details response object
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-ach_debit_response.json
 */
class AchDebitResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The last 4 digits of the bank account number.
     *
     * minLength: 4
     * maxLength: 4
     */
    public $last_digits;

    /**
     * @var string
     * The 9-digit ABA routing transit number for the bank at which the account is held.
     *
     * minLength: 9
     * maxLength: 9
     */
    public $routing_number;

    /**
     * @var string
     * Name of the person or business that owns the bank account.
     *
     * minLength: 1
     * maxLength: 300
     */
    public $account_holder_name;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->last_digits) || Assert::minLength($this->last_digits, 4, "last_digits in AchDebitResponse must have minlength of 4 $within");
        !isset($this->last_digits) || Assert::maxLength($this->last_digits, 4, "last_digits in AchDebitResponse must have maxlength of 4 $within");
        !isset($this->routing_number) || Assert::minLength($this->routing_number, 9, "routing_number in AchDebitResponse must have minlength of 9 $within");
        !isset($this->routing_number) || Assert::maxLength($this->routing_number, 9, "routing_number in AchDebitResponse must have maxlength of 9 $within");
        !isset($this->account_holder_name) || Assert::minLength($this->account_holder_name, 1, "account_holder_name in AchDebitResponse must have minlength of 1 $within");
        !isset($this->account_holder_name) || Assert::maxLength($this->account_holder_name, 300, "account_holder_name in AchDebitResponse must have maxlength of 300 $within");
    }

    public function __construct()
    {
    }
}
