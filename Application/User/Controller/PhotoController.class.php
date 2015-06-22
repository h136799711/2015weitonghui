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
class PhotoController extends UserController{
	public function index(){
		$ReplyInfo_db=M('ReplyInfo');
		$config=$ReplyInfo_db->where(array('token'=>$this->token,'infotype'=>'album'))->find();
		if ($config){
			$headpic=$config['picurl'];
		}else {
			$headpic='/Public/Wap/css/Photo/banner.jpg';
		}
		$this->assign('headpic',$headpic);
		//
		$this->canUseFunction('album');
		//相册列表
		$data=M('Photo');
		$count      = $data->where(array('token'=>session('token')))->count();
		$Page       = new \Think\Page($count,12);
		$show       = $Page->show();
		$list = $data->where(array('token'=>session('token')))->limit($Page->firstRow.','.$Page->listRows)->select();	
		$this->assign('page',$show);		
		$this->assign('photo',$list);
		$this->display();		
	}
	public function config(){
		$ReplyInfo_db=M('ReplyInfo');
		$config=$ReplyInfo_db->where(array('token'=>$this->token,'infotype'=>'album'))->find();
		$configArr=array();
		$configArr['title']='相册';
		$configArr['info']='';
		$configArr['picurl']=I('post.picurl');
		$configArr['token']=$this->token;
		$configArr['apiurl']='';
		$configArr['infotype']='album';
		//
		if ($config){
			$ReplyInfo_db->where(array('token'=>$this->token,'infotype'=>'album'))->save($configArr);
		}else {
			$ReplyInfo_db->add($configArr);
		}
		$this->success('操作成功');
	}
	public function edit(){
		if(I('get.token')!=session('token')){$this->error('非法操作');}
		$data=D('Photo');
		if(IS_POST){
			$this->all_save('Photo');
		}else{
			$photo=$data->where(array('token'=>session('token'),'id'=>I('get.id')))->find();
			if($photo==false){
				$this->error('相册不存在');
			}else{
				$this->assign('photo',$photo);
			}
			$this->display();		
		
		}
	}
	public function list_edit(){
		if(I('get.token')!=session('token')){$this->error('非法操作');}
		$check=M('Photo_list')->field('id,pid')->where(array('token'=>session('token'),'id'=>I('post.id')))->find();
		if($check==false){$this->error('照片不存在');}
		if(IS_POST){
			$this->all_save('Photo_list','/list_add?id='.$check['pid']);		
		}else{
			$this->error('非法操作');
		}
	}
	public function list_del(){
		if(I('get.token')!=session('token')){$this->error('非法操作');}
		$check=M('Photo_list')->field('id,pid')->where(array('token'=>session('token'),'id'=>I('get.id')))->find();
		if($check==false){$this->error('服务器繁忙');}
		if(empty($_POST['edit'])){
			if(M('Photo_list')->where(array('id'=>$check['id']))->delete()){
				M('Photo')->where(array('id'=>$check['pid']))->setDec('num');
				$this->success('操作成功');
			}else{
				$this->error('服务器繁忙,请稍后再试');
			}
		}
	}
	public function list_add(){
		
		$checkdata=M('Photo')->where(array('token'=>session('token'),'pi'=>I('get.id')))->find();
		if($checkdata==false){$this->error('相册不存在');}
		if(IS_POST){			
			// dump(I('post.'));
			M('Photo')->where(array('token'=>session('token'),'id'=>I('post.pid')))->setInc('num');
			$this->all_insert('Photo_list','/list_add?id='.$_POST['pid']);						
		}else{
			$data=M('Photo_list');
			$count      = $data->where(array('token'=>session('token'),'pid'=>I('get.pid')))->count();
			$Page       = new \Think\Page($count,120);
			$show       = $Page->show();
			$list = $data->where(array('token'=>session('token'),'pid'=>I('get.id')))->order('sort desc')->limit($Page->firstRow.','.$Page->listRows)->select();	
			$this->assign('page',$show);		
			$this->assign('photo',$list);
			$this->display();	
		
		}
		
	}
	public function add(){
		if(IS_POST){		
			$this->all_insert('Photo','/add');			
		}else{
			$this->display();	
		
		}
		
	}
	public function del(){
		if(I('get.token')!=session('token')){$this->error('非法操作');}
		$check=M('Photo')->field('id')->where(array('token'=>session('token'),'id'=>I('get.id')))->find();
		if($check==false){$this->error('服务器繁忙');}
		if(empty($_POST['edit'])){
			if(M('Photo')->where(array('id'=>$check['id']))->delete()){
				M('Photo_list')->where(array('pid'=>$check['id']))->delete();
				$this->success('操作成功');
			}else{
				$this->error('服务器繁忙,请稍后再试');
			}
		}
	
	}


}


?>