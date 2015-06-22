<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Home\Controller;
use Think\Controller;

class QrcodeController extends Controller{

	public function index(){
		 vendor("phpqrcode.phpqrcode");
	            $data = I('text','http://www.gooraye.net','urldecode') ;

	            // 纠错级别：L、M、Q、H
	            $level = 'L';
	            // 点的大小：1到10,用于手机端4就可以了
	            $size = 4;
	            // 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false
	            //$path = "images/";
	            // 生成的文件名
	            //$fileName = $path.$size.'.png';
	            \QRcode::png($data, false, $level, $size);

	}
}
