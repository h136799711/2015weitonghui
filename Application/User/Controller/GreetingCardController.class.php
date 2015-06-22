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
class GreetingCardController extends UserController{
	//喜帖配置
	public function index(){
		$greeting_card=M('greeting_card');
		$where['token']=session('token');
		$count=$greeting_card->where($where)->count();
		$page=new \Think\Page($count,25);
		$list=$greeting_card->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$page->show());
		$this->assign('greeting_card',$list);
		$this->display();
	}
	public function add(){
		if(IS_POST){
			$this->all_insert('GreetingCard','/index');
		}else{
			$photo=M('Photo')->where(array('token'=>session('token')))->select();
			$this->assign('photo',$photo);
			$this->display();
		}
	}
	public function edit(){
		$greeting_card=M('greeting_card')->where(array('token'=>session('token'),'id'=>I('get.id','intval')))->find();
		if(IS_POST){
			$_POST['id']=$greeting_card['id'];
			$this->all_save('GreetingCard','/index');	
		}else{
			
			$this->assign('greeting_card',$greeting_card);
			$this->display('add');
		}
	
	}
	public function del(){
		$where['id']=I('get.id','intval');
		$where['token']=session('token');
		if(D('GreetingCard')->where($where)->delete()){
			$this->success('操作成功',U(CONTROLLER_NAME.'/index'));
		}else{
			$this->error('操作失败',U(CONTROLLER_NAME.'/index'));
		}
	}
}



?>