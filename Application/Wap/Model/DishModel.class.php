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
class DishModel extends Model{
	protected $_validate = array(
		array('name','require','菜名不能为空',1),
	);
    protected $_auto = array ( 
        array('creattime','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳
    );
}
?>