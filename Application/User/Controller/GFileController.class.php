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
use Think\Controller;
class GFileController extends UserController
{
    public $token;
    public $upload_type;
    public function _initialize() {
        parent::_initialize();
        $this->token = session('token');
        if (!$this->token) {
            $this->token = 'admin';
        }
        
        //
        $this->upload_type = 'local';
    }
    public function upload() {
        
        if (!function_exists('imagecreate')) {
            exit('php不支持gd库，请配置后再使用');
        }
        if (IS_POST) {
            $return = $this->localUpload();
            $jumpURL = U('User/GFile/upload').'?error=' . $return['error'] . '&msg=' . $return['msg'];
            
            echo '<script>location.href="' . $jumpURL . '";</script>';
        } else {
            if (!isset($_GET['from'])) {
                $this->display('local');
            } else {
                $this->display('waplocal');
            }
        }
    }
    
    function deleteFile() {
    }
    function editorUpload() {
        echo $json->encode(array('error' => 1, 'message' => $msg));
    }
    function kindedtiropic() {
        $return = $this->localUpload();
        if ($return['error']) {
            $this->alert($return['msg']);
        } else {
            header('Content-type: text/html; charset=UTF-8');
            echo json_encode(array('error' => 0, 'url' => $return['msg']));
            exit;
        }
    }
    
    function localUpload() {
        
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
             // 
            $error = 1;
            $msg = $upload->getError();
            // $this->error($upload->getError());
        } else {
             // 上传成功
            $error = 0;
            $msg = C('site_url') .ltrim($rootPath,'.').$info['photo']['savepath']. $info['photo']['savename'];

            M('Users')->where(array('id' => $this->user['id']))->setInc('attachmentsize', intval($info[0]['size']));
            M('Files')->add(array('token' => $this->token, 'size' => intval($info[0]['size']), 'time' => time(), 'type' => $info[0]['ext'], 'url' => $msg));
            // $this->success('上传成功！');

        }
        return array('error' => $error, 'msg' => $msg);
    }
    
    // function localUpload_Bak($filetypes = '') {
    //     import('Org.UploadFile');
    //     $upload = new \UploadFile();
    //     $upload->maxSize = intval(C('up_size')) * 1024;
    //     if (!$filetypes) {
    //         $upload->allowExts = explode(',', C('up_exts'));
    //     } else {
    //         $upload->allowExts = $filetypes;
    //     }
    //     $upload->autoSub = 0;
        
    //     $upload->thumbRemoveOrigin = false;
        
    //     //
    //     $firstLetter = substr($this->token, 0, 1);
    //     $root = $_SERVER['DOCUMENT_ROOT'] . __ROOT__;
    //     $uploadPath = $root . '/' . C('up_path') . '/';
    //     $upload->savePath = $uploadPath . $firstLetter . '/' . $this->token . '/';
        
    //     // 设置附件上传目录
    //     //
    //     if (!file_exists($uploadPath) || !is_dir($uploadPath)) {
    //         mkdir($uploadPath, 777);
    //     }
    //     $firstLetterDir = $uploadPath . $firstLetter;
    //     if (!file_exists($firstLetterDir) || !is_dir($firstLetterDir)) {
    //         mkdir($firstLetterDir, 777);
    //     }
    //     if (!file_exists($firstLetterDir . '/' . $this->token) || !is_dir($firstLetterDir . '/' . $this->token)) {
    //         mkdir($firstLetterDir . '/' . $this->token, 0777);
    //     }
        
    //     $tmpPath = $uploadPath . $firstLetter . '/' . $this->token . '/';
        
    //     //
    //     $upload->hashLevel = 0;
    //     if (!$upload->upload()) {
            
    //         // 上传错误 提示错误信息
    //         $error = 1;
    //         $msg = $upload->getErrorMsg();
    //     } else {
            
    //         // 上传成功 获取上传文件信息
    //         $error = 0;
    //         $info = $upload->getUploadFileInfo();
            
    //         $msg = C('site_url') . '/' . C('up_path') . '/' . $firstLetter . '/' . $this->token . '/' . $info[0]['savename'];
            
    //         M('Users')->where(array('id' => $this->user['id']))->setInc('attachmentsize', intval($info[0]['size']));
    //         M('Files')->add(array('token' => $this->token, 'size' => intval($info[0]['size']), 'time' => time(), 'type' => $info[0]['extension'], 'url' => $msg));
    //     }
    //     return array('error' => $error, 'msg' => $msg);
    // }
    function alert($msg) {
        header('Content-type: text/html; charset=UTF-8');
        
        echo json_encode(array('error' => 1, 'message' => $msg));
        exit;
    }
}
