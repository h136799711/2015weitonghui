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

class CarModel extends Model {

	//自动验证
	protected $_validate = array(

			array('name','require','品牌名不能为空',1),
			array('logo','require','LOGO不能为空',1),
			array('info','require','品牌简介不能为空',1)
	 );


}