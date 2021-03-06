<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Admin\Model;
use Think\Model;

class OrderingClassModel extends Model{
	protected $_validate = array(
			array('name','require','分类名不能为空',1),
			array('info','require','分类详细内容必须填写',1),
			array('id','checkid','非法操作',2,'callback',2),

	 );
	protected $_auto = array (		
		array('token','getToken',Model:: MODEL_BOTH,'callback'),
		array('createtime','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳);
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
}

?>
