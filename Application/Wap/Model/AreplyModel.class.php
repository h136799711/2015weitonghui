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
class AreplyModel extends Model{

	protected $_validate =array(
		array('content','require','内容不能为空',1),
	);
	
	protected $_auto = array (
		array('uid','getuser',self::MODEL_INSERT,'callback'),
		array('uname','getname',self::MODEL_UPDATE,'callback'),
		array('createtime','time',self::MODEL_INSERT,'function'),
		array('token','gettoken',self::MODEL_INSERT,'callback'),
		array('updatetime','time',self::MODEL_BOTH,'function'),
		array('home','gethome',self::MODEL_BOTH,'callback'),
	);
	
	function getuser(){
		return session('uid');
	}
	function gethome(){
		return isset($_POST['home'])?1:0;
	
	}
	function getname(){
		return session('uname');
	}
	
	function gettoken(){
		return session('token');
	}
}