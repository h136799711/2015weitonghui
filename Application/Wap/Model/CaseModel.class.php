<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Wap\Model;
use Think\Model;
class CaseModel extends Model{
	protected $_validate =array(
		array('name','require','内容不能为空',1),
		array('url','url','url格式不正确',0),
	);

}