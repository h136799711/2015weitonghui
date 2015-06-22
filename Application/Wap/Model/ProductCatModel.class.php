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

class ProductCatModel extends Model{
    protected $_validate = array(
            array('name','require','名称不能为空',1)
     );
    protected $_auto = array (
    array('token','gettoken',1,'callback'),
        array('time','time',1,'function')
    );
    function gettoken(){
		return session('token');
	}
}

?>