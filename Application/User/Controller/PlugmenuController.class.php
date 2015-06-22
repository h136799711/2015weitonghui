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
class PlugmenuController extends UserController{
	//配置
	public function set(){
		$home=M('Home')->where(array('token'=>session('token')))->find();
		if(IS_POST){
			if($home==false){				
				$this->all_insert('Home','/set');
			}else{
				$_POST['id']=$home['id'];
				$this->all_save('Home','/set');				
			}
		}else{
			$this->assign('home',$home);
			$this->display();
		}
	}
	
}



?>