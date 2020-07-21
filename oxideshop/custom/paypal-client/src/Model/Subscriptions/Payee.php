<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
 */
class Payee extends \PayeeBase
{
	/** @var PayeeDisplayable */
	public $display_data;
}
