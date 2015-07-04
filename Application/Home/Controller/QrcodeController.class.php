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
        $data = I('get.text','http://www.gooraye.net','urldecode') ;
//        $data = "456237892378923456";
//        dump($data);
        // 纠错级别：L、M、Q、H
        $level = 'L';
        // 点的大小：1到10,用于手机端4就可以了
        $size = 4;
        // 生成的文件名
        $fileName = RUNTIME_PATH.time().'.png';
//        ob_clean();
//        dump(\QRcode);
//        header("Content-type: image/png;text/html; charset=utf-8");
//        $qrcode = new \QRcode();
        \QRcode::png($data,$fileName,$level,$size,true);
//            echo 1;
    }
}
