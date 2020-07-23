<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Catalog;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The list of products, with details.
 *
 * generated from: product_collection.json
 */
class ProductCollection implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of products.
     *
     * @var ProductCollectionElement[]
     * maxItems: 1
     * maxItems: 32767
     */
    public $products;

    /**
     * The total number of items.
     *
     * @var integer | null
     */
    public $total_items;

    /**
     * The total number of pages.
     *
     * @var integer | null
     */
    public $total_pages;

    /**
     * An array of request-related [HATEOAS links](/docs/api/overview/#hateoas-links).
     *
     * @var LinkDescription[] | null
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->products, "products in ProductCollection must not be NULL $within");
        Assert::minCount(
            $this->products,
            1,
            "products in ProductCollection must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->products,
            32767,
            "products in ProductCollection must have max. count of 32767 $within"
        );
        Assert::isArray(
            $this->products,
            "products in ProductCollection must be array $within"
        );

        if (isset($this->products)) {
            foreach ($this->products as $item) {
                $item->validate(ProductCollection::class);
            }
        }

        !isset($this->links) || Assert::isArray(
            $this->links,
            "links in ProductCollection must be array $within"
        );

        if (isset($this->links)) {
            foreach ($this->links as $item) {
                $item->validate(ProductCollection::class);
            }
        }
    }

    public function __construct()
    {
        $this->products = [];
    }
}
