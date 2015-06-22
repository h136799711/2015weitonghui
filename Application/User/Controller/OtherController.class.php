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
class OtherController extends UserController{
	//配置
	public function index(){
		$other=M('Other')->where(array('token'=>session('token')))->find();
		if(IS_POST){
			if($other==false){				
				$this->all_insert('Other','/index');
			}else{
				$_POST['id']=$other['id'];
				$this->all_save('Other','/index');				
			}
		}else{
			if($other['keyword'] == '' && $other['info'] != ''){
				$replyType = 'text';
			}elseif($other['keyword'] != '' && $other['info'] == ''){
				$replyType = 'keyword';
			}else{
				$replyType = '';
			}

			$this->assign('replyType',$replyType);
			$this->assign('other',$other);
			$this->display();
		}
	}
	
}



?>