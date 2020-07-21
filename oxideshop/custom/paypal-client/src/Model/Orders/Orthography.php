<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The orthography type based on the ISO 15924 names for scripts. Scipts are chosen based on [most widely used writing systems](https://www.worldatlas.com/articles/the-world-s-most-popular-writing-scripts.html).
 */
class Orthography implements \JsonSerializable
{
    use BaseModel;
}
