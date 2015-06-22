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
class UserGroupModel extends Model{
	protected $_validate=array(
		array('name','require','用户组名称必须填写！',1,'',3),
		array('diynum','require','自定义图文数必须填写！',1,'',3),
		array('connectnum','require','用户请求数数必须填写！',1,'',3),
		array('activitynum','require','活动创建数称必须填写！',1,'',3),
		array('price','require','价格必须填写！',1,'',3),
		//array('name','','用户名称已经存在！',1,'unique',3), // 新增修改时候验证username字段是否唯一
	);
		// 获取单个用户信息
	public function getGroup($where = '',$field = '*') {
		return $this->field($field)->where($where)->find();
	}
	//所有的用户组
	public function getAllGroup($where = '',$field = '*') {
		return $this->field($field)->where($where)->select();
	}
}
?>