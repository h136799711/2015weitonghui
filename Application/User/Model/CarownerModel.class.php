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


class CarownerModel extends Model {
	//自动验证
	protected $_validate = array(

			array('title','require','标题不能为空'),
			array('head_url','require','图文封面不能为空'),
			array('info','require','介绍不能为空'),

	 );
}