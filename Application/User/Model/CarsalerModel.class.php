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
 
class CarsalerModel extends Model {

	//自动验证
	protected $_validate = array(
			
			array('name','require','姓名不能为空'),
			array('picture','require','头像不能为空',3),
			array('mobile','require','电话不能为空'),
			//array('info','require','介绍不能为空'),
			
	 );


}