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
 
class VoteModel extends Model {

	//自动验证
	protected $_validate = array(
			
			array('keyword','require','关键词不能为空',1),
			array('title','require','投票标题不能为空',1),
			array('info','require','投票说明不能为空',1),
			array('statdate','require','投票开始时间不能为空',1),
			array('enddate','require','投票结束时间不能为空',1),
			array('enddate', 'checkdate', '结束时间不能小于开始时间',Model::MUST_VALIDATE,'callback',3),

	 );

	function checkdate(){	
		 if(strtotime($_POST['enddate'])<strtotime($_POST['statdate'])){
			 return false;
		}else{
			return true;
		}
	}


}