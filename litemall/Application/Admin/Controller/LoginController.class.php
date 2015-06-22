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
class LoginController extends Controller {

	public function index() {
		// $this->redirect ( "Public/login" );
		redirect('/a/gai/index.php');
	}
	
	public function login() {
		// dump('login');
		redirect('/a/gai/index.php');
		// $result = R ( "Api/Api/login", array (
		// 		$_POST ["username"],
		// 		$_POST ["password"] 
		// ) );
		
		// if ($result) {
		// 	$_SESSION ["wadmin"] = $result;
		// 	$this->success ( "登录成功", U ( "Admin/Index/index" ) );
		// } else {
		// 	$this->error ( "登录失败", U ( "Admin/Index/index" ) );
		// }
	}
	
	public function logout() {
		$this->success ( '已注销登录！', '/a/gai/index.php');
		// unset ( $_SESSION ["wadmin"] );
		// $this->success ( '已注销登录！', U ( "Admin/Login/index" ) );
	}
}