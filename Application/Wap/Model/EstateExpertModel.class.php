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


class EstateExpertModel extends Model{
	protected $_validate  = array(
		array('title','require','标题不能为空'),
		array('name','require','专家姓名不能为空'),
		array('position','require','专家职位不能为空'),
		array('face','require','专家照片不能为空'),
		array('description','require','专家介绍不能为空'),
		array('comment','require','点评内容不能为空'),	
	);
}