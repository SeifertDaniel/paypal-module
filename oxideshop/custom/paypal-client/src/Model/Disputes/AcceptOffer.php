<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A customer request to accept the offer made by the merchant.
 */
class AcceptOffer implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $note;
}
