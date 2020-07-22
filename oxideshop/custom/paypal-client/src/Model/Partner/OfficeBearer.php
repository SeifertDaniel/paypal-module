<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The office bearer associated to the account.
 *
 * generated from: customer_common_overrides-office_bearer.json
 */
class OfficeBearer extends Person implements JsonSerializable
{
    use BaseModel;

    /** The ceo. */
    const ROLE_CEO = 'CEO';

    /** The chairman. */
    const ROLE_CHAIRMAN = 'CHAIRMAN';

    /** Director of the business */
    const ROLE_DIRECTOR = 'DIRECTOR';

    /** The secretary. */
    const ROLE_SECRETARY = 'SECRETARY';

    /** The treasurer. */
    const ROLE_TREASURER = 'TREASURER';

    /** The trustee. */
    const ROLE_TRUSTEE = 'TRUSTEE';

    /**
     * @var string
     * Role of the person party played in the business.
     *
     * use one of constants defined in this class to set the value:
     * @see ROLE_CEO
     * @see ROLE_CHAIRMAN
     * @see ROLE_DIRECTOR
     * @see ROLE_SECRETARY
     * @see ROLE_TREASURER
     * @see ROLE_TRUSTEE
     * minLength: 1
     * maxLength: 255
     */
    public $role;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->role) || Assert::minLength($this->role, 1, "role in OfficeBearer must have minlength of 1 $within");
        !isset($this->role) || Assert::maxLength($this->role, 255, "role in OfficeBearer must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
