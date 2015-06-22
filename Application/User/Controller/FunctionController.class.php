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
class FunctionController extends UserController{
	function index(){
		$id=I('get.id',0,'intval');
		if (!$id){
			$token=$this->token;
			$info=M('Wxuser')->find(array('token'=>$this->token));
		}else {
			$info=M('Wxuser')->find($id);
		}
		$token=I('get.token','trim');	
		if($info==false||$info['token']!=$token){
			$this->error('非法操作',U('Home/Index/index'));
		}
		session('token',$token);
		session('wxid',$info['id']);
		//第一次登陆　创建　功能所有权
		$token_open=M('TokenOpen');
		$toback=$token_open->field('id,queryname')->where(array('token'=>session('token'),'uid'=>session('uid')))->find();
		$open['uid']=session('uid');
		$open['token']=session('token');
		//遍历功能列表
		// if (!C('agent_version')){
		// 	$group=M('UserGroup')->field('id,name')->where('status=1')->select();
		// }else {
		// 	$group=M('UserGroup')->field('id,name')->where('status=1 AND agentid='.$this->agentid)->select();
		// }
		$check=explode(',',$toback['queryname']);
		$this->assign('check',$check);
		// foreach($group as $key=>$vo){
			// if (C('agent_version')&&$this->agentid){
			// 	$fun=M('Agent_function')->where(array('status'=>1,'gid'=>$vo['id']))->select();
			// }else {
			// 	$fun=M('Function')->where(array('status'=>1,'gid'=>$vo['id']))->select();
			// }
		//过滤
		$filter = I('get.filter');
		if(strlen($filter)==0){
			// $fun = M('Function')->where(array('status'=>1,'gid'=>session('gid')))->select();
			$fun = M('Function')->where(array('status'=>1))->select();
		}else{
			// $fun = M('Function')->where(array('isserve'=>$filter,'status'=>1,'gid'=>session('gid')))->select();
			$fun = M('Function')->where(array('isserve'=>$filter,'status'=>1))->select();
		}
		// $closedfun = array();
		foreach($fun as $vkey=>$vo){
			// if(!in_array($vo['funname'],$check)){
			// 	$closedfun[$vkey] = $vo;
			// }else{
				$function[$vkey] = $vo;
			// }
		}
		// }
		// $this->assign('closedfun',$closedfun);
		$this->assign('fun',$function);
		//
		$wecha=M('Wxuser')->field('wxname,wxid,headerpic,weixin')->where(array('token'=>session('token'),'uid'=>session('uid')))->find();
		$this->assign('wecha',$wecha);
		$this->assign('token',session('token'));
		//
		$this->display();
	}
}

?>