<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details of the authorized payment status.
 */
class AuthorizationStatusDetails implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $reason;
}
