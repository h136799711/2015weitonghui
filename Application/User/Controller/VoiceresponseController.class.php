<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------


namespace User\Controller;
use Think\Controller;
/**
 *语音回复
**/
class VoiceresponseController extends UserController{
	public function index(){
		$where['uid']=session('uid');
		$res=M('Voiceresponse')->where($where)->select();
		$this->assign('info',$res);
		$this->display();
	}
	public function add(){
		$this->display();
	}
	public function edit(){
		$where['id']=I('get.id','intval');
		$where['uid']=session('uid');
		$res=D('Voiceresponse')->where($where)->find();
		$this->assign('info',$res);
		$this->display();
	}
	public function del(){
		$where['id']=I('get.id','intval');
		$where['uid']=session('uid');
		if(D(CONTROLLER_NAME)->where($where)->delete()){
			$this->success('操作成功',U(CONTROLLER_NAME.'/index'));
		}else{
			$this->error('操作失败',U(CONTROLLER_NAME.'/index'));
		}
	}
	public function insert(){
		$this->all_insert();
	}
	public function upsave(){
		$this->all_save();
	}
}
?>