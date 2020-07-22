<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The return details for the product.
 *
 * generated from: response-return_details.json
 */
class ReturnDetails implements JsonSerializable
{
    use BaseModel;

    /** The customer shipped the product back to the merchant. */
    const MODE_SHIPPED = 'SHIPPED';

    /** The customer returned the item to the merchant in person. */
    const MODE_IN_PERSON = 'IN_PERSON';

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $return_time;

    /**
     * @var string
     * The method that the customer used to return the product.
     *
     * use one of constants defined in this class to set the value:
     * @see MODE_SHIPPED
     * @see MODE_IN_PERSON
     * minLength: 1
     * maxLength: 255
     */
    public $mode;

    /**
     * @var boolean
     * Indicates whether customer has the return receipt.
     */
    public $receipt;

    /**
     * @var string
     * The confirmation number for the item return.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $return_confirmation_number;

    /**
     * @var boolean
     * If `true`, indicates that the item was returned but the seller refused to accept the return and if `false`,
     * indicates the item was not attempted to return.
     */
    public $returned;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->return_time) || Assert::minLength($this->return_time, 20, "return_time in ReturnDetails must have minlength of 20 $within");
        !isset($this->return_time) || Assert::maxLength($this->return_time, 64, "return_time in ReturnDetails must have maxlength of 64 $within");
        !isset($this->mode) || Assert::minLength($this->mode, 1, "mode in ReturnDetails must have minlength of 1 $within");
        !isset($this->mode) || Assert::maxLength($this->mode, 255, "mode in ReturnDetails must have maxlength of 255 $within");
        !isset($this->return_confirmation_number) || Assert::minLength($this->return_confirmation_number, 1, "return_confirmation_number in ReturnDetails must have minlength of 1 $within");
        !isset($this->return_confirmation_number) || Assert::maxLength($this->return_confirmation_number, 255, "return_confirmation_number in ReturnDetails must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
