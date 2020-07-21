<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Results of Authentication such as 3D Secure.
 */
class AuthenticationResponse implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $liability_shift;

    /** @var ThreeDSecureAuthenticationResponse */
    public $three_d_secure;
}
