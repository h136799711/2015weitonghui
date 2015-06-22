<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Admin\Model;
use Think\Model\RelationModel;

class OrderModel extends RelationModel {
	protected $_link = array(
		'User'=>array(
			'mapping_type'  => self::BELONGS_TO,
		          // 'class_name'    => 'user',
			'mapping_name'  => 'user',
			'foreign_key'   => 'user_id',//关联id
		),
	);
}