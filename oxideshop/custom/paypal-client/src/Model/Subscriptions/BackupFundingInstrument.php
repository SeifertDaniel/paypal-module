<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The backup funding instrument to use for payment when the primary instrument fails.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-backup_funding_instrument.json
 */
class BackupFundingInstrument implements JsonSerializable
{
    use BaseModel;

    /**
     * @var CardResponse
     * The payment card to use to fund a payment. Card can be a credit or debit card.
     */
    public $card;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->card) || Assert::isInstanceOf($this->card, CardResponse::class, "card in BackupFundingInstrument must be instance of CardResponse $within");
        !isset($this->card) || $this->card->validate(BackupFundingInstrument::class);
    }

    public function __construct()
    {
    }
}
