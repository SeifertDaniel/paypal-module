<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information needed to pay using Verkkopankki (Finnish Online Banking).
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-verkkopankki_request.json
 */
class VerkkopankkiRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The full name representation like Mr J Smith
     *
     * minLength: 3
     * maxLength: 300
     */
    public $name;

    /**
     * @var string
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * minLength: 3
     * maxLength: 254
     */
    public $email;

    /**
     * @var string
     * The [two-character ISO 3166-1 code](/docs/integration/direct/rest/country-codes/) that identifies the country
     * or region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     *
     * minLength: 2
     * maxLength: 2
     */
    public $country_code;

    /**
     * @var string
     * The numeric bank identifier of the account holder associated with this payment method. Valid bank ids at the
     * moment are 50 (Aktia), 3 (Danske Bank), 6 (Handelsbanken), 1 Nordea, 61 (Oma Säästöpankki), 2
     * (Osuuspankki), 51 (POP Pankki), (10) S-Pankki, (52) Säästöpankki, (5) Ålandsbanken
     *
     * minLength: 1
     * maxLength: 255
     */
    public $bank_id;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength($this->name, 3, "name in VerkkopankkiRequest must have minlength of 3 $within");
        !isset($this->name) || Assert::maxLength($this->name, 300, "name in VerkkopankkiRequest must have maxlength of 300 $within");
        !isset($this->email) || Assert::minLength($this->email, 3, "email in VerkkopankkiRequest must have minlength of 3 $within");
        !isset($this->email) || Assert::maxLength($this->email, 254, "email in VerkkopankkiRequest must have maxlength of 254 $within");
        !isset($this->country_code) || Assert::minLength($this->country_code, 2, "country_code in VerkkopankkiRequest must have minlength of 2 $within");
        !isset($this->country_code) || Assert::maxLength($this->country_code, 2, "country_code in VerkkopankkiRequest must have maxlength of 2 $within");
        !isset($this->bank_id) || Assert::minLength($this->bank_id, 1, "bank_id in VerkkopankkiRequest must have minlength of 1 $within");
        !isset($this->bank_id) || Assert::maxLength($this->bank_id, 255, "bank_id in VerkkopankkiRequest must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
