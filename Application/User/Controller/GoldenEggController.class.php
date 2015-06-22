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
class GoldenEggController extends LotteryBaseController{
	public $lotteryType;
	public $lotteryTypeName;
	public function _initialize() {
		parent::_initialize();
		$this->canUseFunction('GoldenEgg');
		$this->lotteryType=5;
		$this->lotteryTypeName='砸金蛋';
		$this->assign('lotteryTypeName',$this->lotteryTypeName);
	}
	public function cheat(){
		parent::cheat();
		$this->display();
	}
	public function index(){
		parent::index($this->lotteryType);
		$this->display();
	
	}
	public function sn(){
		parent::sn($this->lotteryType);
		$this->display();
	}
	public function add(){
		parent::add($this->lotteryType);
	}
	
	public function edit(){
		parent::edit($this->lotteryType);
	}
}


?>