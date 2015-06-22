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
class AlipayConfigController extends UserController{
	public $alipay_config_db;
	public function _initialize() {
		parent::_initialize();
		$this->alipay_config_db=M('AlipayConfig');
		if (!$this->token){
			exit();
		}
	}
	public function index(){
		$config = $this->alipay_config_db->where(array('token'=>$this->token))->find();
		if(IS_POST){
			$row['pid']=I('post.pid');
			$row['paytype']=I('post.paytype');
			$row['key']=I('post.key');
			$row['name']=I('post.name');
			$row['token']=I('post.token');
			$row['open']=I('post.open');
			
			$row['appid']=I('post.appid');
			$row['paysignkey']=I('post.paysignkey');
			$row['appsecret']=I('post.appsecret');
			$row['partnerid']=I('post.partnerid');
			$row['partnerkey']=I('post.partnerkey');
			if ($config){
				$where=array('token'=>$this->token);
				$this->alipay_config_db->where($where)->save($row);
			}else {
				$this->alipay_config_db->add($row);
			}
			$this->success('设置成功',U('AlipayConfig/index',$where));
		}else{
			$this->assign('config',$config);
			$this->display();
		}
	}
}


?>