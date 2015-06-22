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

class MemberCardSetModel extends Model{
	protected $_validate = array(
			array('cardname','require','会员卡名称不能为空',1),
			array('msg','require','提示信息不能为空',1),
	 );
	protected $_auto = array (    
	array('status','0'),  // 新增的时候把status字段设置为1   
	array('create_time','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳);
	);
}

?>