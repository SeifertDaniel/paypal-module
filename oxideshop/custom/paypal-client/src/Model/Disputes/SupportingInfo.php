<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A merchant- or customer-submitted supporting information.
 */
class SupportingInfo implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $notes;

    /** @var array */
    public $documents;

    /** @var string */
    public $source;

    /** @var string */
    public $provided_time;
}
