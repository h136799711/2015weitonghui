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

	class ApiModel extends Model{
	protected $_validate = array(
			array('url','require','接口地址不能为空',3),
			array('number','require','显示条件不能为空',3),
			array('order','require','排序方式不能为空',3),
			array('number',array(1,2,3,4,5,6,7,8,9,10),'数据显示值的范围不正确！',3,'in'),
			array('order',array(1,2,3),'数据排序值的范围不正确！',3,'in'),
	 );
	protected $_auto = array (    
	array('time','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳);
	);
}

?>