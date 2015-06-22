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
class OrderController extends PublicController {
	function _initialize() {
		parent::_initialize ();
	}
	public function index() {
		$m = D ( "Order" );
		
		$count = $m->count (); // 查询满足要求的总记录数
		$Page = new \Think\Page ( $count, 10 ); // 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show (); // 分页显示输出
		
		$timebegin = I('post.timebegin',time()-3600*24);
		$timeend = I('post.timeend',time());
		$where['time'] = array(array('gt',$timebegin),array('lt',$timeend));
		$where['token'] = getToken();

		$result = $m->limit ( $Page->firstRow . ',' . $Page->listRows )->order("id desc")->relation(true)->where($where)->select ();
		
		$this->assign ( "result", $result );
		$this->assign ( "page", $show ); // 赋值分页输出
		$this->display ();
	}
	public function del(){
		$result = R ( "Api/Api/delorder", array (
				$_GET ['id'],
		) );
		$this->success ( "操作成功" );
	}
	public function publish(){
		$result = R ( "Api/Api/publish", array (
				$_GET ['id'],
		) );
		$this->success ( "操作成功" );
	}
	public function payComplete(){
		$result = R ( "Api/Api/payComplete", array (
				$_GET ['id'],
		) );
		$this->success ( "操作成功" );
	}
}