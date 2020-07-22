<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The total order amount with an optional breakdown that provides details, such as the total item amount, total
 * tax amount, shipping, handling, insurance, and discounts, if any.<br/>If you specify `amount.breakdown`, the
 * amount equals `item_total` plus `tax_total` plus `shipping` plus `handling` plus `insurance` minus
 * `shipping_discount` minus discount.<br/>The amount must be a positive number. For listed of supported
 * currencies and decimal precision, see the PayPal REST APIs <a
 * href="/docs/integration/direct/rest/currency-codes/">Currency Codes</a>.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-amount_with_breakdown.json
 */
class AmountWithBreakdown extends Money implements JsonSerializable
{
    use BaseModel;

    /**
     * @var AmountBreakdown
     * The breakdown of the amount. Breakdown provides details such as total item amount, total tax amount, shipping,
     * handling, insurance, and discounts, if any.
     */
    public $breakdown;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->breakdown) || Assert::isInstanceOf($this->breakdown, AmountBreakdown::class, "breakdown in AmountWithBreakdown must be instance of AmountBreakdown $within");
        !isset($this->breakdown) || $this->breakdown->validate(AmountWithBreakdown::class);
    }

    public function __construct()
    {
    }
}
