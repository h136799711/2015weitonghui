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
class GuajiangController extends LotteryBaseController{
	public function _initialize() {
		parent::_initialize();
		$this->canUseFunction('gua2');
	}
	public function cheat(){
		parent::cheat();
		$this->display();
	}
	public function index(){
		parent::index(2);
		$this->display();
	
	}
	public function sn(){
		parent::sn(2);
		$this->display('Lottery:sn');
	}
	public function add(){
		parent::add(2);
	}
	
	public function edit(){
		parent::edit(2);
	}
}


?>