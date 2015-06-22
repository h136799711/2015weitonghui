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

class CarmodelModel extends Model {

	//自动验证
	protected $_validate = array(

			array('name','require','车型名不能为空',1),
			array('brand_serise','require','品牌/车系必须选择',3),
			array('guide_price','require','指导价不能为空',1),
			array('dealer_price','require','经销商报价不能为空',1),
			array('pic_url','require','图片不能为空',1),

	 );


}