<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The cancel dispute request details.
 *
 * generated from: request-cancel.json
 */
class Cancel implements JsonSerializable
{
    use BaseModel;

    /** The customer already received the item. */
    const CANCELLATION_REASON_ITEM_RECEIVED = 'ITEM_RECEIVED';

    /** The customer already received a refund for the item. */
    const CANCELLATION_REASON_REFUND_RECEIVED = 'REFUND_RECEIVED';

    /** The customer cancelled the dispute for another reason. If OTHER is specified, customer needs to specify more information in the notes field. */
    const CANCELLATION_REASON_OTHER = 'OTHER';

    /** The customer received the provided shipping tracking information and agrees to cancel. */
    const CANCELLATION_REASON_SHIPMENT_INFO_RECEIVED = 'SHIPMENT_INFO_RECEIVED';

    /** The customer received the item replacement and agrees to cancel. */
    const CANCELLATION_REASON_REPLACEMENT_RECEIVED = 'REPLACEMENT_RECEIVED';

    /**
     * @var string
     * The note, if any, about why the merchant canceled the dispute.
     *
     * maxLength: 1048576
     */
    public $note;

    /**
     * @var array<string>
     * An array of encrypted transaction IDs for a canceled unauthorized dispute. If you omit this ID for
     * unauthorized disputes, the issue is automatically canceled. Optional for other dispute types.
     */
    public $transaction_ids;

    /**
     * @var string
     * The reason the merchant cancelled the item.
     *
     * use one of constants defined in this class to set the value:
     * @see CANCELLATION_REASON_ITEM_RECEIVED
     * @see CANCELLATION_REASON_REFUND_RECEIVED
     * @see CANCELLATION_REASON_OTHER
     * @see CANCELLATION_REASON_SHIPMENT_INFO_RECEIVED
     * @see CANCELLATION_REASON_REPLACEMENT_RECEIVED
     * minLength: 1
     * maxLength: 255
     */
    public $cancellation_reason;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->note) || Assert::maxLength($this->note, 1048576, "note in Cancel must have maxlength of 1048576 $within");
        !isset($this->transaction_ids) || Assert::isArray($this->transaction_ids, "transaction_ids in Cancel must be array $within");
        !isset($this->cancellation_reason) || Assert::minLength($this->cancellation_reason, 1, "cancellation_reason in Cancel must have minlength of 1 $within");
        !isset($this->cancellation_reason) || Assert::maxLength($this->cancellation_reason, 255, "cancellation_reason in Cancel must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
