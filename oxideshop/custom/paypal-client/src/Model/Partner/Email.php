<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * An email address at which the person or business can be contacted.
 *
 * generated from: customer_common_overrides-email.json
 */
class Email implements JsonSerializable
{
    use BaseModel;

    /** The email ID to be used to contact the customer service of the business. */
    public const TYPE_CUSTOMER_SERVICE = 'CUSTOMER_SERVICE';

    /**
     * The role of the email address.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_CUSTOMER_SERVICE
     * @var string
     * minLength: 1
     * maxLength: 50
     */
    public $type;

    /**
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * @var string
     * minLength: 3
     * maxLength: 254
     */
    public $email;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->type, "type in Email must not be NULL $within");
        Assert::minLength(
            $this->type,
            1,
            "type in Email must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->type,
            50,
            "type in Email must have maxlength of 50 $within"
        );
        Assert::notNull($this->email, "email in Email must not be NULL $within");
        Assert::minLength(
            $this->email,
            3,
            "email in Email must have minlength of 3 $within"
        );
        Assert::maxLength(
            $this->email,
            254,
            "email in Email must have maxlength of 254 $within"
        );
    }

    public function __construct()
    {
    }
}
