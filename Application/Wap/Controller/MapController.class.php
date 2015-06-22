<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Wap\Controller;

/**
* 
*/
class MapController extends WapController
{
	public function index(){
		$this->display();
	}

	/* 查看地图位置 */
	public function location(){
		$info = I('get.info','');
		$title = I('get.title','');
		$lat = I('get.lat',0);
		$lng = I('get.lng',0);
		$this->assign("info",$info);
		$this->assign("title",$title);
		$this->assign("lat",$lat);
		$this->assign("lng",$lng);
		$this->display();
	}
}