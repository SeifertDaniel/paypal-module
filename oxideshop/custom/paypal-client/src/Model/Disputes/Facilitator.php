<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A resource representing a Facilitator/Partner who facilitates a transaction.
 *
 * generated from: response-facilitator.json
 */
class Facilitator implements JsonSerializable
{
    use BaseModel;

    /**
     * The name of the Facilitator.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $name;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in Facilitator must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            2000,
            "name in Facilitator must have maxlength of 2000 $within"
        );
    }

    public function __construct()
    {
    }
}
