<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payer-approved installment payment plan details.
 *
 * generated from: CreditFinancingOffer_installment_details
 */
class CreditFinancingOfferInstallmentDetails implements JsonSerializable
{
    use BaseModel;

    /** Payments are monthly. */
    public const PERIOD_MONTHLY = 'MONTHLY';

    /**
     * The frequency with which the payer has agreed to make the payment.
     *
     * use one of constants defined in this class to set the value:
     * @see PERIOD_MONTHLY
     * @var string | null
     */
    public $period;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $payment_due;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payment_due) || Assert::isInstanceOf(
            $this->payment_due,
            Money::class,
            "payment_due in CreditFinancingOfferInstallmentDetails must be instance of Money $within"
        );
        !isset($this->payment_due) ||  $this->payment_due->validate(CreditFinancingOfferInstallmentDetails::class);
    }

    public function __construct()
    {
    }
}
