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
class HotelsHouseSortModel extends Model{
	protected $_validate =array(
		array('name', 'require', '房间名（编号）不能为空', 1),
	);
	
	protected $_auto = array (
		array('token', 'gettoken', self::MODEL_INSERT, 'callback'),
	);
	
	public function gettoken(){
		return session('token');
	}
}