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
use Think\Controller;
class CouponController extends LotteryBaseController{
	public $token;
	public $wecha_id;
	public $lottory_record_db;
	public $lottory_db;

	public function index(){
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if(!strpos($agent,"icroMessenger")) {
			notInWeixin();
		}
		$this->token=I('get.token');
		$this->wecha_id	= I('get.wecha_id');
		$this->lottory_record_db=M('Lottery_record');
		$this->lottory_db=M('Lottery');
		
		
		$token		= $this->token;
		$wecha_id	= $this->wecha_id;
		$id 		= I('get.id');
		$Lottery 	= $this->lottory_db->where(array('id'=>$id,'token'=>$token,'type'=>3,'status'=>1))->find();
		$Lottery['renametel']=$Lottery['renametel']?$Lottery['renametel']:'手机号';
		$Lottery['renamesn']=$Lottery['renamesn']?$Lottery['renamesn']:'SN码';
		$this->assign('lottery',$Lottery);
		//var_dump($Lottery);
		//0. 判断优惠券是否领完了
		if ($Lottery['statdate']>time()){
			$data['usenums']=0;
		}else {
			
			$data=$this->prizeHandle($token,$wecha_id,$Lottery);
		}
	
		$data['token'] 		= $token;
		$data['wecha_id']	= $wecha_id;		
		$data['lid']		= $Lottery['id'];
		$data['phone']		= $data['phone']; 
		$data['usenums']	= $data['usenums'];
		$data['sendtime']	= $data['sendtime'];
		$data['canrqnums']	= $Lottery['canrqnums'];
		$data['fist'] 		= $Lottery['fist'];
		$data['second'] 	= $Lottery['second'];
		$data['third'] 		= $Lottery['third'];
		$data['fistnums'] 	= $Lottery['fistnums'];
		$data['secondnums'] = $Lottery['secondnums'];
		$data['thirdnums'] 	= $Lottery['thirdnums'];	
		$data['info']		= $Lottery['info'];
		$data['aginfo']		= $Lottery['aginfo'];
		$data['txt']		= $Lottery['txt'];
		$data['sttxt']		= $Lottery['sttxt'];
		$data['title']		= $Lottery['title'];
		$data['statdate']	= $Lottery['statdate'];
		$data['enddate']	= $Lottery['enddate'];
		$data['info']=nl2br($data['info']);
		$data['endinfo']=nl2br($data['endinfo']);	
		$this->assign('Coupon',$data);
		//var_dump($data);exit();
		$this->display();
	}
}
	
?>