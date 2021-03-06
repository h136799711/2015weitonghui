<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace User\Model;
use Think\Model;

class ServiceUserModel extends Model{
	protected $_validate = array(
			array('name','require','工号名必须填写',1),
			array('userName','require','登陆用户名必须填写',1),
			//array('userPwd','require','登陆密码必须填写',1),
			array('id','checkid','非法操作',2,'callback',2),
	 );
	protected $_auto = array (		
		array('token','getToken',Model:: MODEL_BOTH,'callback'),
		array('userPwd','userPwd',Model:: MODEL_BOTH,'callback'),
		array('create_time','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳);
	);
	function checkid(){
		$dataid=$this->field('id')->where(array('id'=>$_POST['id'],'token'=>session('token')))->find();
		if($dataid==false){
			return false;
		}else{
			return true;
		}
	}
	function getToken(){	
		return getToken();
	}
	function userPwd(){	
		return md5($_POST['userPwd']);
	}
	function getServiceUser($id){
		$where['token']=session('token');
		$where['id']=$id;
		$data=M('Service_user')->where($where)->find();
		//dump(M('Service_user')->getLastSql());
		//dump($data);
		return $data['name'];
	
	}
}

?>
