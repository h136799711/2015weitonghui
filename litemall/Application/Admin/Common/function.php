<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
function getOrderstatus($orderstatus){
	switch ($orderstatus) {
		case '0':
			return "未发货";
			break;
		case '1':
			return "已发货";
			break;		
		default:
			return "未发货";
			# code...
			break;
	}
}
function getPaystatus($paystatus){
	switch ("$paystatus") {
		case "1":
			return "已支付";
			break;
		case "0":
			return "未支付";
			break;
		case "-1":
			return "业务出错";
			break;
		case "-2":
			return "通信出错";
			break;
		
		default:
			return "未支付";
			break;
	}
}
