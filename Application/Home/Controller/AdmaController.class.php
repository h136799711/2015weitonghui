<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------


namespace Home\Controller;
use Think\Controller;

class AdmaController extends Controller{
	//关注回复
	public function index(){
		if(I('get.token')!=false){
			$adma=M('Adma')->where(array('token'=>I('get.token')))->find();
			if($adma==false){
				$this->error('不在的宣传页',U('User/Adma/index',array("token"=>I('get.token'))));
			}else{
				$this->assign('adma',$adma);
			}
		}else{
			$this->error('身份验证失败',U('User/Adma/index',array("token"=>I('get.token'))));
		}
		$this->display();
	}

}
?>