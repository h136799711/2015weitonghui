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
/**
 *  首页
 */
class IndexController extends PublicController {
	function _initialize() {
		parent::_initialize ();
	}
	public function index() {

		$this->display ();
	}
	public function setting() {
		$result = R ( "Api/Api/setting", array (
				$_POST ["name"],
				$_POST ["notification"] 
		) );
		$this->success ( "修改成功");
	}
	public function set() {
		if (session('uid')) {
			$result = R ( "Api/Api/getsetting" );
			$this->assign ( "info", $result );
			
			// $payresult = R ( "Api/Api/getalipay" );
			// $this->assign ( "alipay", $payresult );
			$this->display ();
		}
	}
	// public function setalipay(){
	// 	$result = R ( "Api/Api/setalipay", array (
	// 			$_POST ["alipayname"],
	// 			$_POST ["partner"],
	// 			$_POST ["key"]
	// 	) );
		
	// 	$this->success ( "操作成功" );
	// }
}