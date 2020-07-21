<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A payment source that has additional authentication challenges.
 */
class ExtendedPaymentSource extends PaymentSource implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $contingencies;
}
