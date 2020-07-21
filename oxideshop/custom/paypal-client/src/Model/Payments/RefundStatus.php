<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The refund status.
 */
class RefundStatus implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $status;

    /** @var RefundStatusDetails */
    public $status_details;
}
