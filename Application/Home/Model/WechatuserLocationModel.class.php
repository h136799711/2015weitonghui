<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Home\Model;
use Think\Model; 

class WechatuserLocationModel extends Model {

	protected $_validate =array(
		array('token','require','token不能为空',1),
		array('openid','require','openid不能为空',1),
	);
	
	
}