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
class UserController extends PublicController {
	function _initialize() {
		parent::_initialize ();
	}
	public function index() {
		$m = M ( "User" );
		
		$count = $m->count (); // 查询满足要求的总记录数
		$Page = new \Think\Page ( $count, 12 ); // 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show (); // 分页显示输出
		
		$result = $m->where(array('token'=>getToken()))->limit ( $Page->firstRow . ',' . $Page->listRows )->select ();
		
		$this->assign ( "result", $result );
		$this->assign ( "page", $show ); // 赋值分页输出
		$this->display ();
	}
}