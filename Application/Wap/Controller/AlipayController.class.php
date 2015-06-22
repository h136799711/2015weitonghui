<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Wap\Controller;
use Common\Controller\BaseController;

class AlipayController extends BaseController{
	public $token;
	public $wecha_id;
	public $alipayConfig;
	public function _initialize(){
		$this->token = I('get.token');
		$this->wecha_id	= I('get.wecha_id');
		if (!$this->token){
			//
			$product_cart_model=M('ProductCart');
			$out_trade_no = I('get.out_trade_no');
			$order=$product_cart_model->where(array('orderid'=>$out_trade_no))->find();
			if (!$order){
				$order=$product_cart_model->where(array('id'=>intval(I('get.out_trade_no'))))->find();
			}
			$this->token=$order['token'];
		}
		//读取配置
		$AlipayConfig_db=M('AlipayConfig');
		$this->alipayConfig=$AlipayConfig_db->where(array('token'=>$this->token))->find();
	}
	public function pay(){
		//参数数据
		$price=$_GET['price'];
		$orderName=$_GET['orderName'];
		$orderid=$_GET['orderid'];

		if (!$orderid){
			$orderid=$_GET['single_orderid'];//单个订单
		}
		
		$from=isset($_GET['from'])?$_GET['from']:'shop';
		//
		$alipayConfig=$this->alipayConfig;
		//
		if(!$price)exit('必须有价格才能支付');
		import("Org.Alipay.AlipaySubmit");
		switch ($alipayConfig['paytype']){
			default:
				$alipayConfig['paytype']='Alipaytype';
				break;
			case 'tenpay':
				$alipayConfig['paytype']='Tenpay';
				break;
			case 'weixin':
				$alipayConfig['paytype']='Weixin';
				break;
			case 'tenpayComputer':
				$alipayConfig['paytype']='TenpayComputer';
				break;
		}
		
		if ($alipayConfig['paytype']=='Weixin'){

		redirect(U('Wap/'.$alipayConfig['paytype'].'/pay')."?price=".$price.'&orderName='.$orderName.'&single_orderid='.$orderid.'&from='.$from.'&token='.$this->token.'&wecha_id='.$this->wecha_id);

			 // header('Location:/index.php/Wap/'.$alipayConfig['paytype'].'/pay?price='.$price.'&orderName='.$orderName.'&single_orderid='.$orderid.'&showwxpaytitle=1&from='.$from.'&token='.$this->token.'&wecha_id='.$this->wecha_id);
		}else {
			
		redirect(U('Wap/'.$alipayConfig['paytype'].'/pay',array('price'=>$price,'orderName'=>$orderName,'single_orderid'=>$orderid,'from'=>$from,'token'=>$this->token,'wecha_id'=>$this->wecha_id)));

		}
	}
}
?>