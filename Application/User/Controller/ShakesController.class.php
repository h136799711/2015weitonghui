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
class ShakesController extends UserController{
	public $shake_model;
	public $token_where;
	public $keyword_model;
	public function _initialize() {
		parent::_initialize();
		//$this->canUseFunction('panorama');
		$this->shake_model=M('Shake');
		$this->token_where['token']=$this->token;
		$this->keyword_model=M('Keyword');
	}
	public function index(){
		var_export(M('Shake_rt')->where(array('token'=>'hcmhym1395735507'))->select());
	}
}
?>