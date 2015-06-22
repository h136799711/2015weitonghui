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
    class ProductModel extends Model{
    protected $_validate = array(
            array('name','require','名称不能为空',1),
            array('keyword','require','关键词不能为空',1),
            array('price','require','价格不能为空',1),
            array('storeid','require','请选择店铺',1)
     );
    protected $_auto = array (
    array('token','gettoken',1,'callback'),
    //array('endtime','getTime',1,'callback'),
        array('time','time',1,'function')
    );
    function gettoken(){
		return session('token');
	}
	function getTime(){
		$date=$_POST['enddate'];
		if ($date){
		$dates=explode('-',$date);
		$time=mktime(23,59,59,$dates[1],$dates[2],$dates[0]);
		}else {
			$time=0;
		}
		return $time;
	}
}

?>