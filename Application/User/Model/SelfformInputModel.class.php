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
class SelfformInputModel extends Model{
	protected $_validate = array(
	array('displayname','require','显示名称不能为空',1),
	array('inputtype','require','输入类型不能为空',1),
	array('fieldname','require','字段名称不能为空',1)
	);
	protected $_auto = array (
	array('time','time',1,'function')
	);
}

?>