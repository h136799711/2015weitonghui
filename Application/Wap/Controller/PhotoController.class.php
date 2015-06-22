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

class PhotoController extends WapController{
	public $token;
	public function _initialize(){
		parent::_initialize();
	}
	public function index(){
		$this->token=I('get.token');
		$reply_info_db=M('Reply_info');
		$config=$reply_info_db->where(array('token'=>$this->token,'infotype'=>'album'))->find();
		if ($config){
			$headpic=$config['picurl'];
		}else {
			$headpic='/Public/Wap/css/Photo/banner.jpg';
		}
		$this->assign('headpic',$headpic);
		//
		$token=I('get.token');
		if($token==false){
			echo '数据不存在';exit;
		}
		$photo=M('Photo')->where(array('token'=>$token,'status'=>1))->order('id desc')->select();
		if($photo==false){ }
		$this->assign('photo',$photo);
		$this->display();
	}
	public function plist(){
		$this->token=I('get.token');
		$reply_info_db=M('Reply_info');
		$config=$reply_info_db->where(array('token'=>$this->token,'infotype'=>'album'))->find();
		if ($config){
			$headpic=$config['picurl'];
		}else {
			$headpic='/Public/Wap/css/Photo/banner.jpg';
		}
		$this->assign('headpic',$headpic);
		//
		$token=I('get.token');
		if($token==false){
			echo '数据不存在';exit;
		}
		$info=M('Photo')->field('title')->where(array('token'=>$token,'id'=>I('get.id')))->find();
		$photo_list=M('PhotoList')->where(array('token'=>$token,'pid'=>I('get.id'),'status'=>1))->select();
		// dump($photo);
		$this->assign('info',$info);
		$this->assign('photo',$photo_list);
		$this->display();
	}
}
?>