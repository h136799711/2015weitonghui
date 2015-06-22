<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------


namespace User\Controller;
use Common\Controller\BaseController;
class MapTestController extends BaseController{
	public $token;
	public $apikey;
	public function setLatLng(){
		if(IS_POST){
			
		}else{
			$this->display();
		}
	}
	//公司静态地图
	public function index(){

			$radius=2000;
			$map=new baiduMap('酒店',31.844931631914,117.21469057536);
			$str=$map->echoJson();

			$array=json_decode($str);
			echo $str;
	}
}


?>