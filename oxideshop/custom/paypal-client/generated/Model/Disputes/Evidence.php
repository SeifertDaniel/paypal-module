<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A merchant- or customer-submitted evidence document.
 *
 * generated from: referred-evidence.json
 */
class Evidence implements JsonSerializable
{
    use BaseModel;

    /**
     * The evidence-related information.
     *
     * @var EvidenceInfo | null
     */
    public $evidence_info;

    /**
     * An array of evidence documents.
     *
     * @var Document[] | null
     */
    public $documents;

    /**
     * Any notes about the evidence.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $notes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->evidence_info) || Assert::isInstanceOf(
            $this->evidence_info,
            EvidenceInfo::class,
            "evidence_info in Evidence must be instance of EvidenceInfo $within"
        );
        !isset($this->evidence_info) ||  $this->evidence_info->validate(Evidence::class);
        !isset($this->documents) || Assert::isArray(
            $this->documents,
            "documents in Evidence must be array $within"
        );
        if (isset($this->documents)) {
            foreach ($this->documents as $item) {
                $item->validate(Evidence::class);
            }
        }
        !isset($this->notes) || Assert::minLength(
            $this->notes,
            1,
            "notes in Evidence must have minlength of 1 $within"
        );
        !isset($this->notes) || Assert::maxLength(
            $this->notes,
            2000,
            "notes in Evidence must have maxlength of 2000 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['evidence_info'])) {
            $this->evidence_info = new EvidenceInfo($data['evidence_info']);
        }
        if (isset($data['documents'])) {
            $this->documents = [];
            foreach ($data['documents'] as $item) {
                $this->documents[] = new Document($item);
            }
        }
        if (isset($data['notes'])) {
            $this->notes = $data['notes'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
