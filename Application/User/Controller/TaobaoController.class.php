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
class TaobaoController extends UserController{
	public function index(){
		if(I('get.token')!=session('token')){$this->error('非法操作');}
		
		if(IS_POST){
			$data['keyword']=I('post.keyword');
			$data['token']=I('get.token');
			$data['time']=time();
			$data['title']=I('post.title');
			$data['picurl']=I('post.picurl');
			$data['homeurl']=I('post.homeurl');
			if($data['keyword']&&$data['title']&&$data['picurl']&&$data['homeurl']){
				$sql=M('Taobao')->data($data)->add();
				if($sql){
					$this->success('操作成功');
				}else{
					$this->error('服务繁忙，请稍候再试');
				}
			}else{
				$this->error('所有表单都必须填写');
			}
		}else{
			$data=M('Taobao')->where(array('token'=>I('get.token')))->find();
			$this->assign('taobao',$data);
			$this->display();
		}
	}
	public function edit(){
		if(IS_POST){
			$data['keyword']=I('post.keyword');
			$data['title']=I('post.title');
			$data['picurl']=I('post.picurl');
			$data['homeurl']=I('post.homeurl');
			if($data['keyword']&&$data['title']&&$data['picurl']&&$data['homeurl']){
				$sql=M('Taobao')->where(array('token'=>I('get.token')))->save($data);
				if($sql){
					$this->success('操作成功');
				}else{
					$this->error('服务繁忙，请稍候再试');
				}
		}else{
			$this->error('非法操作');
		}
		}
}
}

?>