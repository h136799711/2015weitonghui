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
class LotteryController extends LotteryBaseController{
	public function index(){
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if(!strpos($agent,"icroMessenger")) {
			// echo '此功能只能在微信浏览器中使用';exit;
		}
		$token		= I('get.token');
		$wecha_id	= I('get.wecha_id');
		$id 		= I('get.id');
		
		$redata		= M('Lottery_record');
		$where 		= array('token'=>$token,'wecha_id'=>$wecha_id,'lid'=>$id);
		$record 	= $redata->where(array('token'=>$token,'wecha_id'=>$wecha_id,'lid'=>$id,'islottery'=>1))->find();
		if (!$record){
			$record 	= $redata->where($where)->order('id DESC')->find();
		}
		$map['token'] = $token;
		$map['wecha_id'] = $wecha_id;
		$map['lid'] = $id;
		$map['time'] = array('lt',mktime(0,0,date("m"),date("d"),date("Y")) );
		//今天之前抽奖的次数
		$historyCnt 	= $redata->where($map)->count();
		
		$Lottery 	= M('Lottery')->where(array('id'=>$id,'token'=>$token,'type'=>1,'status'=>1))->find();
		if ($this->wecha_id&&!$this->fans&&$Lottery['needreg']){
			$this->error('请先完善个人资料再参加活动',U('Userinfo/index',array('token'=>$this->token,'wecha_id'=>$this->wecha_id,'redirect'=>MODULE_NAME.'/index|id:'.intval($id))));
		}
		$Lottery['renametel']=$Lottery['renametel']?$Lottery['renametel']:'手机号';
		$Lottery['renamesn']=$Lottery['renamesn']?$Lottery['renamesn']:'SN码';
		$data=$Lottery;
		//1.活动过期,显示结束
		//4.显示奖项,说明,时间
		if ($Lottery['enddate'] < time()) {
			 $data['end'] = 1;
			 $data['endinfo'] = $Lottery['endinfo'];
			 $this->assign('Dazpan',$data);
			 $this->display();
			 exit();
		}

		// 1. 中过奖金	
		if ($record['islottery'] == 1) {		
				
			// $data['end'] = 5;
			// $data['sn']	 	 = $record['sn'];
			// $data['uname']	 = $record['wecha_name'];
			// $data['prize']	 = $record['prize'];
			// $data['tel'] 	 = $record['phone'];	
		}
		// sendTextTofan(getToken(),$wecha_id,"您中了！");	
		//抽取次数
		$data['On'] 		= 1;
		$data['token'] 		= $token;
		$data['wecha_id']	= $wecha_id;		
		$data['lid']		= $Lottery['id'];
		$data['rid']		= intval($record['id']);
		$data['usenums'] 	= $record['usenums'];
		if($record['canrqnums'] == 0){
			$data['usenums'] = $record['usenums'] - $historyCnt;
		}
		$data['historycnt'] = $historyCnt;
		$data['info']=str_replace('&lt;br&gt;','<br>',$data['info']);
		$data['endinfo']=str_replace('&lt;br&gt;','<br>',$data['endinfo']);
		$this->assign('Dazpan',$data);
		$record['id']=intval($record['id']);
		$this->assign('record',$record);
		$this->display();
	}
	

	public function sendprize(){
		$sn=I('get.sn');
		$where=array('sn'=>$sn,'token'=>getToken());
		$data['sendtime'] = time();
		$data['sendstatus'] = 1;
		$lotteryRecord = M('Lottery_record')->where($where)->find();		

		if(!empty($lotteryRecord ) && $lotteryRecord['sendstatus'] == 1){

			$this->success('已经兑过奖了！',U('Lottery/index',array('id'=>$lotteryRecord['lid'],'token'=>$lotteryRecord['token'] ,'wecha_id'=>$lotteryRecord['wecha_id'] )));

		}else{
			$back = M('Lottery_record')->where($where)->save($data);
			if($back==true){
				$this->success('操作成功',U('Lottery/index',array('id'=>$lotteryRecord['lid'],'token'=>$lotteryRecord['token'] ,'wecha_id'=>$lotteryRecord['wecha_id'])));
			}else{
				$this->error('操作失败',U('Lottery/index',array('id'=>$lotteryRecord['lid'],'token'=>$lotteryRecord['token'] ,'wecha_id'=>$lotteryRecord['wecha_id'])));
			}
		}
	}
	
	
	public function getajax(){	
		
		$token 		=	I('get.token');
		$wecha_id	=	I('get.oneid');
		$id 		=	I('get.id');
		$rid 		= 	I('get.rid');
		$Lottery=M('Lottery')->where(array('id'=>$id))->find();
		$data=$this->prizeHandle($token,$wecha_id,$Lottery);
		if ($data['end']==3){
			$sn	 	 = $data['sn'];
			$uname	 = $data['wecha_name'];
			$prize	 = $data['prize'];
			$tel 	 = $data['phone'];
			$msg = $data['msg'];
			echo '{"error":1,"msg":"'.$msg.'"}';
			exit;
		}
		if ($data['end']==-1){
			$msg = $data['winprize'];
			echo '{"error":1,"msg":"'.$msg.'"}';
			exit;
		}
		if ($data['end']==-2){
			$msg = $data['winprize'];
			echo '{"error":1,"msg":"'.$msg.'"}';
			exit;
		}
		//  
		if ($data['prizetype'] >= 1 && $data['prizetype'] <= 6) {

			$url = C('site_url').U('Lottery/sendprize',array('sn'=>$data['sncode'],'token'=>getToken()));
			sendTextTofan(getToken(),$wecha_id,date('Y-m-d H:i:s',time()).'，您中了'.$data['prizetype']."等奖\r\n兑奖码：".$data['sncode'].'\r\n请及时联系我们<a href=\"'.$url.'\" >兑奖</a>！');
			echo '{"success":1,"sn":"'.$data['sncode'].'","prizetype":"'.$data['prizetype'].'","usenums":"'.$data['usenums'].'"}';
		}else{
			echo '{"success":0,"prizetype":"","usenums":"'.$data['usenums'].'"}';
		}
		exit();
	}


}
	
?>