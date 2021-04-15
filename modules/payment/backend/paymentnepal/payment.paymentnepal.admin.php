<?php

if (! defined('DIAFAN'))
{
	include dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/includes/404.php';
}

class Payment_rficb_admin
{
	public $config;

	public function __construct()
	{
		$this->config = array(
			"name" => 'Paymentnepal',
			"params" => array(
                'paymentnepal_key' => 'Paymentnepal: payment key',
                'paymentnepal_skey' => 'Paymentnepal: secret key',
			)
		);
	}
}
