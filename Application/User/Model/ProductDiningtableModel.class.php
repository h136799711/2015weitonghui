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

class ProductDiningtableModel extends Model{
    protected $_validate = array(
            array('name','require','名称不能为空',1),
     );
    protected $_auto = array (
    array('token','gettoken',1,'callback')
    );
    function gettoken(){
		return session('token');
	}
}

?>