<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The name of the party.
 *
 * generated from: customer_common-v1-schema-common_components-v4-schema-json-openapi-2.0-name.json
 */
class Name implements JsonSerializable
{
    use BaseModel;

    /**
     * The prefix, or title, to the party's name.
     *
     * @var string | null
     * maxLength: 140
     */
    public $prefix;

    /**
     * When the party is a person, the party's given, or first, name.
     *
     * @var string | null
     * maxLength: 140
     */
    public $given_name;

    /**
     * When the party is a person, the party's surname or family name. Also known as the last name. Required when the
     * party is a person. Use also to store multiple surnames including the matronymic, or mother's, surname.
     *
     * @var string | null
     * maxLength: 140
     */
    public $surname;

    /**
     * When the party is a person, the party's middle name. Use also to store multiple middle names including the
     * patronymic, or father's, middle name.
     *
     * @var string | null
     * maxLength: 140
     */
    public $middle_name;

    /**
     * The suffix for the party's name.
     *
     * @var string | null
     * maxLength: 140
     */
    public $suffix;

    /**
     * When the party is a person, the party's full name.
     *
     * @var string | null
     * maxLength: 300
     */
    public $full_name;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->prefix) || Assert::maxLength(
            $this->prefix,
            140,
            "prefix in Name must have maxlength of 140 $within"
        );
        !isset($this->given_name) || Assert::maxLength(
            $this->given_name,
            140,
            "given_name in Name must have maxlength of 140 $within"
        );
        !isset($this->surname) || Assert::maxLength(
            $this->surname,
            140,
            "surname in Name must have maxlength of 140 $within"
        );
        !isset($this->middle_name) || Assert::maxLength(
            $this->middle_name,
            140,
            "middle_name in Name must have maxlength of 140 $within"
        );
        !isset($this->suffix) || Assert::maxLength(
            $this->suffix,
            140,
            "suffix in Name must have maxlength of 140 $within"
        );
        !isset($this->full_name) || Assert::maxLength(
            $this->full_name,
            300,
            "full_name in Name must have maxlength of 300 $within"
        );
    }

    public function __construct()
    {
    }
}
