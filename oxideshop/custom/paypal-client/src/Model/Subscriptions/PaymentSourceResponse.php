<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment source used to fund the payment.
 *
 * generated from: payment_source_response.json
 */
class PaymentSourceResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * The payment card used to fund the payment. Card can be a credit or debit card.
     *
     * @var CardResponseWithBillingAddress | null
     */
    public $card;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->card) || Assert::isInstanceOf(
            $this->card,
            CardResponseWithBillingAddress::class,
            "card in PaymentSourceResponse must be instance of CardResponseWithBillingAddress $within"
        );
        !isset($this->card) ||  $this->card->validate(PaymentSourceResponse::class);
    }

    public function __construct()
    {
    }
}
