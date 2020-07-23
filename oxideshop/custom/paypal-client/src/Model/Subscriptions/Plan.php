<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The plan details.
 *
 * generated from: plan.json
 */
class Plan implements JsonSerializable
{
    use BaseModel;

    /** The plan was created. You cannot create subscriptions for a plan in this state. */
    public const STATUS_CREATED = 'CREATED';

    /** The plan is inactive. */
    public const STATUS_INACTIVE = 'INACTIVE';

    /** The plan is active. You can only create subscriptions for a plan in this state. */
    public const STATUS_ACTIVE = 'ACTIVE';

    /** A licensed plan. */
    public const USAGE_TYPE_LICENSED = 'LICENSED';

    /** A metered plan. */
    public const USAGE_TYPE_METERED = 'METERED';

    /**
     * The unique PayPal-generated ID for the plan.
     *
     * @var string | null
     * minLength: 3
     * maxLength: 50
     */
    public $id;

    /**
     * The version of the plan.
     *
     * @var integer | null
     */
    public $version;

    /**
     * The ID for the product.
     *
     * @var string | null
     * minLength: 6
     * maxLength: 50
     */
    public $product_id;

    /**
     * The plan name.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $name;

    /**
     * The plan status.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_CREATED
     * @see STATUS_INACTIVE
     * @see STATUS_ACTIVE
     * @var string | null
     * minLength: 1
     * maxLength: 24
     */
    public $status;

    /**
     * The detailed description of the plan.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 127
     */
    public $description;

    /**
     * The type of the plan, which indicates the billing pattern.
     *
     * use one of constants defined in this class to set the value:
     * @see USAGE_TYPE_LICENSED
     * @see USAGE_TYPE_METERED
     * @var string | null
     * minLength: 1
     * maxLength: 24
     */
    public $usage_type = 'LICENSED';

    /**
     * An array of billing cycles for trial billing and regular billing. A plan can have at most two trial cycles and
     * only one regular cycle.
     *
     * @var BillingCycle[]
     * maxItems: 1
     * maxItems: 12
     */
    public $billing_cycles;

    /**
     * The payment preferences for a subscription.
     *
     * @var PaymentPreferences | null
     */
    public $payment_preferences;

    /**
     * The tax details.
     *
     * @var Taxes | null
     */
    public $taxes;

    /**
     * Indicates whether you can subscribe to this plan by providing a quantity for the goods or service.
     *
     * @var boolean | null
     */
    public $quantity_supported = false;

    /**
     * The merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
     *
     * @var Payee | null
     */
    public $payee;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $update_time;

    /**
     * An array of request-related [HATEOAS links](/docs/api/reference/api-responses/#hateoas-links).
     *
     * @var LinkDescription[] | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength(
            $this->id,
            3,
            "id in Plan must have minlength of 3 $within"
        );
        !isset($this->id) || Assert::maxLength(
            $this->id,
            50,
            "id in Plan must have maxlength of 50 $within"
        );
        !isset($this->product_id) || Assert::minLength(
            $this->product_id,
            6,
            "product_id in Plan must have minlength of 6 $within"
        );
        !isset($this->product_id) || Assert::maxLength(
            $this->product_id,
            50,
            "product_id in Plan must have maxlength of 50 $within"
        );
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in Plan must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            127,
            "name in Plan must have maxlength of 127 $within"
        );
        !isset($this->status) || Assert::minLength(
            $this->status,
            1,
            "status in Plan must have minlength of 1 $within"
        );
        !isset($this->status) || Assert::maxLength(
            $this->status,
            24,
            "status in Plan must have maxlength of 24 $within"
        );
        !isset($this->description) || Assert::minLength(
            $this->description,
            1,
            "description in Plan must have minlength of 1 $within"
        );
        !isset($this->description) || Assert::maxLength(
            $this->description,
            127,
            "description in Plan must have maxlength of 127 $within"
        );
        !isset($this->usage_type) || Assert::minLength(
            $this->usage_type,
            1,
            "usage_type in Plan must have minlength of 1 $within"
        );
        !isset($this->usage_type) || Assert::maxLength(
            $this->usage_type,
            24,
            "usage_type in Plan must have maxlength of 24 $within"
        );
        Assert::notNull($this->billing_cycles, "billing_cycles in Plan must not be NULL $within");
        Assert::minCount(
            $this->billing_cycles,
            1,
            "billing_cycles in Plan must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->billing_cycles,
            12,
            "billing_cycles in Plan must have max. count of 12 $within"
        );
        Assert::isArray(
            $this->billing_cycles,
            "billing_cycles in Plan must be array $within"
        );

        if (isset($this->billing_cycles)) {
            foreach ($this->billing_cycles as $item) {
                $item->validate(Plan::class);
            }
        }

        !isset($this->payment_preferences) || Assert::isInstanceOf(
            $this->payment_preferences,
            PaymentPreferences::class,
            "payment_preferences in Plan must be instance of PaymentPreferences $within"
        );
        !isset($this->payment_preferences) ||  $this->payment_preferences->validate(Plan::class);
        !isset($this->taxes) || Assert::isInstanceOf(
            $this->taxes,
            Taxes::class,
            "taxes in Plan must be instance of Taxes $within"
        );
        !isset($this->taxes) ||  $this->taxes->validate(Plan::class);
        !isset($this->payee) || Assert::isInstanceOf(
            $this->payee,
            Payee::class,
            "payee in Plan must be instance of Payee $within"
        );
        !isset($this->payee) ||  $this->payee->validate(Plan::class);
        !isset($this->create_time) || Assert::minLength(
            $this->create_time,
            20,
            "create_time in Plan must have minlength of 20 $within"
        );
        !isset($this->create_time) || Assert::maxLength(
            $this->create_time,
            64,
            "create_time in Plan must have maxlength of 64 $within"
        );
        !isset($this->update_time) || Assert::minLength(
            $this->update_time,
            20,
            "update_time in Plan must have minlength of 20 $within"
        );
        !isset($this->update_time) || Assert::maxLength(
            $this->update_time,
            64,
            "update_time in Plan must have maxlength of 64 $within"
        );
        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in Plan must be array $within"
        );

        if (isset($this->links)) {
            foreach ($this->links as $item) {
                $item->validate(Plan::class);
            }
        }
    }

    public function __construct()
    {
        $this->billing_cycles = [];
    }
}
