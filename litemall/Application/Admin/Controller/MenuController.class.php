<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class MenuController extends Controller {
	public function index() {
		$result = R ( "Api/Api/getarraymenu" );
		$this->assign ( "menu", $result );
		$this->assign ( "menulist", $result );
		$this->display ();
	}
	
	public function addmenu() {
		$result = R ( "Api/Api/addmenu", array (
				$_POST ['parent'],
				$_POST ['name'],
				$_POST ['addmenu'] 
		) );
		$this->success ( "操作成功" );
	}

	public function del() {
		$result = R ( "Api/Api/delmenu", array (
				$_GET ['id'] 
		) );
		$this->success ( "删除成功" );
	}
}