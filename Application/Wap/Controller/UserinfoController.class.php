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
class UserinfoController extends WapController{
	public function _initialize() {
		parent::_initialize();
		if (!$this->wecha_id){
			$this->error('您无权访问','');
		}
	}
	public function index(){
		$agent = $_SERVER['HTTP_USER_AGENT']; 
		if(!strpos($agent,"icroMessenger")) {
			notInWeixin();
		}
		$cardid=intval(I('get.cardid'));
		
		//$sql=D('Userinfo');
		$card = D('Member_card_create'); 
		$data['wecha_id']=I('get.wecha_id');
		$data['token']=I('get.token');
		//
		$cardInfoRow['wecha_id']=I('get.wecha_id');
		$cardInfoRow['token']=I('get.token');
		$cardInfoRow['cardid']=I('get.cardid');
		$cardinfo=$card->where($cardInfoRow)->find(); //是否领取过
		$this->assign('cardInfo',$cardinfo);
		//
		$member_card_set_db=M('Member_card_set');
		$thisCard=$member_card_set_db->where(array('token'=>I('get.token'),'id'=>intval($_GET['cardid'])))->find();
		if (!$thisCard&&$cardid){
			exit();
		}
		//
		$sql=D('Userinfo');
		$userinfo=$sql->where($data)->find();
		if($thisCard['memberinfo']!=false){
			$img=$thisCard['memberinfo'];			
		}else{
			$img='tpl/Wap/default/common/images/userinfo/fans.jpg';
		}
		$this->assign('cardnum',$cardinfo['number']);
		$this->assign('homepic',$img);
		$this->assign('info',$userinfo);
		$this->assign('cardid',$cardid);
		//redirect url
		if (isset($_GET['redirect'])){
			$urlinfo=explode('|',$_GET['redirect']);
			$parmArr=explode(',',$urlinfo[1]);
			$parms=array('token'=>$cardInfoRow['token'],'wecha_id'=>$cardInfoRow['wecha_id']);
			if ($parmArr){
				foreach ($parmArr as $pa){
					$pas=explode(':',$pa);
					$parms[$pas[0]]=$pas[1];
				}
			}
			$redirectUrl=U($urlinfo[0],$parms);
			$this->assign('redirectUrl',$redirectUrl);
		}
		//
		if(IS_POST){
			//如果有post提交，说明是修改
			$data['wechaname'] = I('post.wechaname');
			$data['tel']       = I('post.tel');
			if(empty($data['tel'])){
				$this->error("手机号必填。");exit;
			}
			$data['truename']  = I('post.truename');			
			$data['qq']  = I('post.qq');
			$data['sex'] = I('post.sex');
			$data['bornyear'] = I('post.bornyear');
			$data['bornmonth'] = I('post.bornmonth');
			$data['bornday'] = I('post.bornday');
			$data['portrait'] = I('post.portrait');
			
 			//如果会员卡不为空[更新]
 			//写入两个表 Userinfo Member_card_create 
 			if ($cardid==0){
 				
 				$infoWhere=array();
 				$infoWhere['wecha_id']=$data['wecha_id'];
 				$infoWhere['token']=$data['token'];
 				$userInfoExist=M('Userinfo')->where($infoWhere)->find();
 				if ($userInfoExist){
 					M('Userinfo')->where($infoWhere)->save($data);
 				}else {
 					M('Userinfo')->add($data);
 				}
 				S('fans_'.$this->token.'_'.$this->wecha_id,NULL);
 				echo 1;exit;
 			}else {
 				if($cardinfo){ //如果Member_card_create 不为空，说明领过卡，但是可以修改会员信息
 					$update['wecha_id']=$data['wecha_id'];
 					$update['token']=$data['token'];
 					unset($data['wecha_id']);
 					unset($data['token']);
 					if(M('Userinfo')->where($update)->save($data)){
 						S('fans_'.$this->token.'_'.$this->wecha_id,NULL);
 						echo 1;exit;
 					}else{
 						echo 0;exit;
 					}
 				}else{
 					Sms::sendSms($this->token,'有新的会员领了会员卡');
 					$card=M('Member_card_create')->field('id,number')->where("token='".I('get.token')."' and cardid=".intval($_POST['cardid'])." and wecha_id = ''")->order('id ASC')->find();
 					//
 					$userinfo_db=M('Userinfo');
 					$userInfos=$userinfo_db->where(array('token'=>I('get.token'),'wecha_id'=>I('get.wecha_id')))->select();
 					$userScore=0;
 					if ($userInfos){
 						$userScore=intval($userInfos[0]['total_score']);
 						$userInfo=$userInfos[0];
 					}
 					if(!$card){
 						echo 3;exit;
 					}else {
 						//
 						if (intval($thisCard['miniscore'])==0||$userScore>intval($thisCard['minscore'])){
 							M('Member_card_create')->where(array('token'=>I('get.token'),'wecha_id'=>I('get.wecha_id')))->delete();
 							$card_up=M('Member_card_create')->where(array('id'=>$card['id']))->save(array('wecha_id'=>I('get.wecha_id')));
 							$data['getcardtime']=time();
 							if ($userinfo){
 								$update['wecha_id']=$data['wecha_id'];
 								$update['token']=$data['token'];
 								M('Userinfo')->where($update)->save($data);
 							}else {
 								M('Userinfo')->data($data)->add();
 							}
 							S('fans_'.$this->token.'_'.$this->wecha_id,NULL);
 							echo 2;exit;
 						}else {
 							echo 4;exit;
 						}
 					}

 				} //post
 			}
		}else {
			$this->display();	
		}

		
    } //end function index
} // end class UserinfoController

?>