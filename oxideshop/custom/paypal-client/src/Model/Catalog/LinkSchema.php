<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The request data or link target.
 */
class LinkSchema implements \JsonSerializable
{
    use BaseModel;

    /** @var object */
    public $additionalItems;

    /** @var object */
    public $dependencies;

    /** @var object */
    public $items;

    /** @var object */
    public $definitions;

    /** @var object */
    public $patternProperties;

    /** @var object */
    public $properties;

    /** @var array */
    public $allOf;

    /** @var array */
    public $anyOf;

    /** @var array */
    public $oneOf;

    /** @var object */
    public $not;

    /** @var array */
    public $links;

    /** @var string */
    public $fragmentResolution;

    /** @var string */
    public $type;

    /** @var string */
    public $binaryEncoding;

    /** @var OxidProfessionalServices\PayPal\Api\Model\Catalog\Media */
    public $Media;

    /** @var string */
    public $pathStart;
}
