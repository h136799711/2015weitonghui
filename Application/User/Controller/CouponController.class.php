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
class CouponController extends LotteryBaseController {
	public function _initialize() {
		parent::_initialize();
		$this->canUseFunction('choujiang');
	}
	public function index(){
		parent::index(3);
		$this->display();
	}
	public function sn(){
		parent::sn(3);
		$this->display('Lottery:sn');
	}
	public function add(){
		parent::add(3);
	}
	public function edit(){
		parent::edit(3);
	}
}


?>