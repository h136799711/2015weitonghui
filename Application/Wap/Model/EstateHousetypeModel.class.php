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


class EstateHousetypeModel extends Model{
	protected $_validate  = array(
		array('name','require','户型名称不能为空'),
		array('floor_num','require','楼层不能为空'),
		array('area','require','建筑面积不能为空'),
		array('description','require','户型介绍不能为空'),
		array('type1','require','户型图不能为空'),
		array('type2','require','户型图不能为空'),
		
	);
}