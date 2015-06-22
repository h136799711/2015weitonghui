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
class LotteryController extends LotteryBaseController{
	public function _initialize() {
		parent::_initialize();
		//$this->canUseFunction('lottery');
	}
	public function cheat(){
		parent::cheat();
		$this->display();
	}
	public function index(){
		parent::index(1);
		$this->display();
	
	}
	public function sn(){
		$type=isset($_GET['type'])?intval($_GET['type']):1;
		parent::sn($type);
		$this->display();
	}
	public function add(){
		parent::add(1);
	}
	
	public function edit(){
		parent::edit(1);
	}
}


?>