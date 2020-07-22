<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * generated from: customer_common_overrides-business.json
 */
class Business implements JsonSerializable
{
    use BaseModel;

    /**
     * @var BusinessTypeInfo
     * The type and subtype of the business.
     */
    public $business_type;

    /**
     * @var BusinessIndustry
     * The category, subcategory and MCC code of the business.
     */
    public $business_industry;

    /**
     * @var BusinessIncorporation
     * Business incorporation information.
     */
    public $business_incorporation;

    /**
     * @var array<BusinessNameDetail>
     * Name of the business.
     *
     * maxItems: 0
     * maxItems: 5
     */
    public $names;

    /**
     * @var array<Email>
     * Email addresses of the business.
     *
     * maxItems: 0
     * maxItems: 5
     */
    public $emails;

    /**
     * @var string
     * Website of the business.
     *
     * minLength: 1
     * maxLength: 50
     */
    public $website;

    /**
     * @var array<BusinessAddressDetail>
     * List of addresses associated with the business entity.
     *
     * maxItems: 0
     * maxItems: 5
     */
    public $addresses;

    /**
     * @var array<BusinessPhoneDetail>
     * List of phone number associated with the business.
     *
     * maxItems: 0
     * maxItems: 5
     */
    public $phones;

    /**
     * @var array<BusinessDocument>
     * Business Party related Document data collected from the customer.. For example SSN, ITIN, Business
     * registration number that were collected from the user.
     *
     * maxItems: 0
     * maxItems: 20
     */
    public $documents;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->business_type) || Assert::isInstanceOf($this->business_type, BusinessTypeInfo::class, "business_type in Business must be instance of BusinessTypeInfo $within");
        !isset($this->business_type) || $this->business_type->validate(Business::class);
        !isset($this->business_industry) || Assert::notNull($this->business_industry->category, "category in business_industry must not be NULL within Business $within");
        !isset($this->business_industry) || Assert::notNull($this->business_industry->mcc_code, "mcc_code in business_industry must not be NULL within Business $within");
        !isset($this->business_industry) || Assert::notNull($this->business_industry->subcategory, "subcategory in business_industry must not be NULL within Business $within");
        !isset($this->business_industry) || Assert::isInstanceOf($this->business_industry, BusinessIndustry::class, "business_industry in Business must be instance of BusinessIndustry $within");
        !isset($this->business_industry) || $this->business_industry->validate(Business::class);
        !isset($this->business_incorporation) || Assert::isInstanceOf($this->business_incorporation, BusinessIncorporation::class, "business_incorporation in Business must be instance of BusinessIncorporation $within");
        !isset($this->business_incorporation) || $this->business_incorporation->validate(Business::class);
        Assert::notNull($this->names, "names in Business must not be NULL $within");
         Assert::minCount($this->names, 0, "names in Business must have min. count of 0 $within");
         Assert::maxCount($this->names, 5, "names in Business must have max. count of 5 $within");
         Assert::isArray($this->names, "names in Business must be array $within");

                                if (isset($this->names)){
                                    foreach ($this->names as $item) {
                                        $item->validate(Business::class);
                                    }
                                }

        Assert::notNull($this->emails, "emails in Business must not be NULL $within");
         Assert::minCount($this->emails, 0, "emails in Business must have min. count of 0 $within");
         Assert::maxCount($this->emails, 5, "emails in Business must have max. count of 5 $within");
         Assert::isArray($this->emails, "emails in Business must be array $within");

                                if (isset($this->emails)){
                                    foreach ($this->emails as $item) {
                                        $item->validate(Business::class);
                                    }
                                }

        !isset($this->website) || Assert::minLength($this->website, 1, "website in Business must have minlength of 1 $within");
        !isset($this->website) || Assert::maxLength($this->website, 50, "website in Business must have maxlength of 50 $within");
        Assert::notNull($this->addresses, "addresses in Business must not be NULL $within");
         Assert::minCount($this->addresses, 0, "addresses in Business must have min. count of 0 $within");
         Assert::maxCount($this->addresses, 5, "addresses in Business must have max. count of 5 $within");
         Assert::isArray($this->addresses, "addresses in Business must be array $within");

                                if (isset($this->addresses)){
                                    foreach ($this->addresses as $item) {
                                        $item->validate(Business::class);
                                    }
                                }

        Assert::notNull($this->phones, "phones in Business must not be NULL $within");
         Assert::minCount($this->phones, 0, "phones in Business must have min. count of 0 $within");
         Assert::maxCount($this->phones, 5, "phones in Business must have max. count of 5 $within");
         Assert::isArray($this->phones, "phones in Business must be array $within");

                                if (isset($this->phones)){
                                    foreach ($this->phones as $item) {
                                        $item->validate(Business::class);
                                    }
                                }

        Assert::notNull($this->documents, "documents in Business must not be NULL $within");
         Assert::minCount($this->documents, 0, "documents in Business must have min. count of 0 $within");
         Assert::maxCount($this->documents, 20, "documents in Business must have max. count of 20 $within");
         Assert::isArray($this->documents, "documents in Business must be array $within");

                                if (isset($this->documents)){
                                    foreach ($this->documents as $item) {
                                        $item->validate(Business::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
