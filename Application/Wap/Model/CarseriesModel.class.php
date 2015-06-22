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
 
class CarseriesModel extends Model {

	//自动验证
	protected $_validate = array(
			
			array('name','require','车系名不能为空',1),
			array('shortname','require','车系简称不能为空',1),
			array('picture','require','图片不能为空',1),
	 );


}