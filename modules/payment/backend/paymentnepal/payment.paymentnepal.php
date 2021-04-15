<?php

if (! defined('DIAFAN'))
{
	include dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/includes/404.php';
}

if (empty($_REQUEST["order_id"]))
{
	Custom::inc('includes/404.php');
}
$pay = $this->diafan->_payment->check_pay($_REQUEST["order_id"], 'paymentnepal');

$in_data = array(  'tid'            =>  $_REQUEST['tid'],
                   'name'           =>  $_REQUEST['name'], 
                   'comment'        =>  $_REQUEST['comment'],
                   'partner_id'     =>  $_REQUEST['partner_id'],
                   'service_id'     =>  $_REQUEST['service_id'],
                   'order_id'       =>  $_REQUEST['order_id'],
                   'type'           =>  $_REQUEST['type'],
                   'partner_income' =>  $_REQUEST['partner_income'],
                   'system_income'  =>  $_REQUEST['system_income'],
                   'test'           =>  $_REQUEST['test']
                );  
$my_crc = md5(implode('', array_values($in_data)) . $pay["params"]['paymentnepal_skey']);
$out_summ = $_REQUEST["partner_income"];
$crc = $_REQUEST["check"];
if ($_GET["rewrite"] == "paymentnepal/result")
{
	if ($my_crc != $crc)
	{
		echo "bad sign\n";
		exit;
	}
  if(sprintf('%0.2f',$_REQUEST['system_income']) < sprintf('%0.2f',$pay['summ']))
		echo "Incorrect sum";
	else {
  $this->diafan->_payment->success($pay, 'pay');  
  echo "OK".$pay["id"]."\n";
  }

	exit;
}
if ($_GET["rewrite"] == "paymentnepal/success")
{
	if ($my_crc == $crc)
	{
		$this->diafan->_payment->success($pay, 'redirect');
	}
}
$this->diafan->_payment->fail($pay);
