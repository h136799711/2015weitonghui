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
    class SmsConfigModel extends Model{
    protected $_validate = array(
            array('server','require','请选择短信平台',1),
            array('username','require','请填写用户名',1),
            array('password','require','请填写key',1),
     );
    protected $_auto = array (
    array('token','gettoken',1,'callback'),
    );
    function gettoken(){
		return session('token');
	}
}

?>