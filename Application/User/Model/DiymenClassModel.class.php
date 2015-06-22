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

class DiymenClassModel extends Model{
	protected $_validate = array(
			array('title','require','菜单主题中必须填写',1),
			array('keyword','require','关键词必须填写',1),
	 );
	protected $_auto = array (
		array('token','getToken',Model:: MODEL_INSERT,'callback'),
	);
	function getToken(){
		return getToken();
	}
}

?>
