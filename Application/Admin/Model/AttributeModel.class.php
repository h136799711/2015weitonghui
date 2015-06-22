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
class AttributeModel extends Model{

	protected $_validate =array(
		array('name','require','名称不能为空',1),
		array('value','require','属性值不能为空',1),
	);
}