<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for a bank account that can be used to fund a payment.
 */
class BankAccountResponse implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $last_n_chars;

    /** @var string */
    public $bank_name;

    /** @var string */
    public $account_type;

    /** @var string */
    public $country_code;

    /** @var BackupFundingInstrument */
    public $backup_funding_instrument;
}
