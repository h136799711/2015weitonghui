<?php

// .-----------------------------------------------------------------------------------
// |
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;

class PublicController extends Controller
{
    
    function _initialize() {
        session('token', I('get.token'));
        if (!session("uid")) {
            $this->redirect("Admin/Login/index");
        }
        $this->assign("uname", session('uname'));
    }
    
    public function upload() {
        
        $upload = new \Think\Upload(C('GFILE_UPLOAD'));
        
        // 实例化上传类
        
        $rootPath = $upload->rootPath;
        
        if (!file_exists($rootPath) || !is_dir($rootPath)) {
            mkdir($rootPath, 777);
        }
        
        // 上传文件
        $info = $upload->upload();
        if (!$info) {
            
            // 上传错误提示错误信息
            $this->error($upload->getError());
        } else {
            return $info;
        }
        
    }
}
