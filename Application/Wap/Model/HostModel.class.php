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
    class HostModel extends Model{
    protected $_validate = array(
            array('keyword','require','关键词不能为空',1),
            array('title','require','商家名称不能为空',1),
            array('tel','require','商家电话不能为空',1),
            array('tel2','require','商家手机号不能为空',1),
            array('info','require','商家介绍不能为空',1),
            array('info2','require','订房说明不能为空',1)
     );
    protected $_auto = array ( 
        array('token','gettoken',1,'callback'), // 对name字段在新增的时候回调getName方法
        array('creattime','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳
    );

    protected function gettoken(){
        return session('token');
    }

}

?>