<?php

if (! defined('DIAFAN'))
{
	include dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/includes/404.php';
}

class Payment_paymentnepal_model extends Diafan
{

	public function get($params, $pay)
	{

		$link = "https://pay.paymentnepal.com/alba/input/";
 
		$link .= "?key=".$params['paymentnepal_key']
		."&cost=".$pay["summ"]
		."&order_id=".$pay["id"]  
    ."&name=Order-".$pay["id"]
		."&Desc=".$this->diafan->translit($pay["desc"]);

		$this->diafan->redirect($link);
		exit;
	}
}
