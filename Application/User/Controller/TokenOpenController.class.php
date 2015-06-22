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

class TokenOpenController extends UserController{

	public function add(){
		if ($this->isAgent){
			$fun=M('Agent_function')->where(array('id'=>I('get.id')))->find();
		}else {
			$fun=M('Function')->where(array('id'=>I('get.id')))->find();
		}
		
		$openwhere=array('uid'=>session('uid'),'token'=>session('token'));
		//删除掉重复的token
		$deleteWhere=array();
		$deleteWhere['uid']=array('neq',session('uid'));
		$deleteWhere['token']=session('token');
		M('TokenOpen')->where($deleteWhere)->delete();
		//
		$open=M('TokenOpen')->where($openwhere)->find();		
		$str['queryname']=str_replace(',,',',',$open['queryname'].','.$fun['funname']);	
		//
		if (!$open){
			M('TokenOpen')->add(array('uid'=>session('uid'),'token'=>session('token')));
		}
		//
		$back=M('TokenOpen')->where($openwhere)->save($str);
		if($back){
			echo 1;
		}else{
			echo 2;
		}
	
	}
	public function del(){
		if ($this->isAgent){
			$fun=M('Agent_function')->where(array('id'=>I('get.id')))->find();
		}else {
			$fun=M('Function')->where(array('id'=>I('get.id')))->find();
		}
		$openwhere=array('uid'=>session('uid'),'token'=>session('token'));
		$open=M('TokenOpen')->where($openwhere)->find();		
		//删除掉重复的token
		$deleteWhere=array();
		$deleteWhere['uid']=array('neq',session('uid'));
		$deleteWhere['token']=session('token');
		M('TokenOpen')->where($deleteWhere)->delete();
		//
		$str['queryname']=ltrim(str_replace(',,',',',str_replace($fun['funname'],'',$open['queryname'])),',');	
		$back=M('TokenOpen')->where($openwhere)->save($str);
		if($back){
			echo 1;
		}else{
			echo 2;
		}
	}




}



?>