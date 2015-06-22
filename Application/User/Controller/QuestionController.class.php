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
class QuestionController extends UserController{

	public function index(){
		$this->display();
	}

	public function add(){
		if(IS_POST){
			$this->error('功能内测中,您无内测资格！');
		}else{
			$this->display();
		}
	}


}



?>