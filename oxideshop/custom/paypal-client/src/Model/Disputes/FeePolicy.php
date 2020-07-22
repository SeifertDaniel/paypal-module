<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Policy that determines whether the fee needs to be retained or returned while moving the money as part of
 * dispute process.
 *
 * generated from: response-fee_policy.json
 */
class FeePolicy implements JsonSerializable
{
    use BaseModel;

    /** No fee needs to be retained. */
    const TRANSACTION_FEE_RETAIN_NO_FEE = 'RETAIN_NO_FEE';

    /** All fees need to be retained. */
    const TRANSACTION_FEE_RETAIN_ALL_FEE = 'RETAIN_ALL_FEE';

    /** Fixed fee associated to the transaction needs to be retained and all other fees need to be returned. */
    const TRANSACTION_FEE_RETAIN_FIXED_FEE = 'RETAIN_FIXED_FEE';

    /**
     * @var string
     * Transaction fee policy.
     *
     * use one of constants defined in this class to set the value:
     * @see TRANSACTION_FEE_RETAIN_NO_FEE
     * @see TRANSACTION_FEE_RETAIN_ALL_FEE
     * @see TRANSACTION_FEE_RETAIN_FIXED_FEE
     * minLength: 1
     * maxLength: 255
     */
    public $transaction_fee;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->transaction_fee) || Assert::minLength($this->transaction_fee, 1, "transaction_fee in FeePolicy must have minlength of 1 $within");
        !isset($this->transaction_fee) || Assert::maxLength($this->transaction_fee, 255, "transaction_fee in FeePolicy must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
