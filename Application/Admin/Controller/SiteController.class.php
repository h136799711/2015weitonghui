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
class SiteController extends AdminController
{
    public function _initialize() {
        parent::_initialize();
         //RBAC 验证接口初始化
        
    }
    
    public function index() {
        $groups = M('UserGroup')->order('id ASC')->select();
        $this->assign('groups', $groups);
        $this->display();
    }
    public function email() {
        $this->display();
    }
    public function alipay() {
        $this->display();
    }
    public function safe() {
        $this->display();
    }
    public function upfile() {
        $this->display();
    }
    public function sms() {
        $total = M('Sms_expendrecord')->sum('count');
        $this->assign('total', $total);
        $this->display();
    }
    public function insert() {
        $file = I('post.files');
        unset($_POST['files']);
        unset($_POST[C('TOKEN_NAME') ]);
        if (isset($_POST['countsz'])) {
            $_POST['countsz'] = base64_encode($_POST['countsz']);
        }
        if ($this->update_config($_POST, CONF_PATH . $file)) {
            $this->success('操作成功', U('Site/index', array('pid' => 6, 'level' => 3)));
        } else {
            $this->success('操作失败', U('Site/index', array('pid' => 6, 'level' => 3)));
        }
    }
    
    private function update_config($config, $config_file = '') {
        !is_file($config_file) && $config_file = CONF_PATH . 'info.php';
      
        if (is_writable($config_file)) {
            file_put_contents($config_file, "<?php  \nreturn " . stripslashes(var_export($config, true)) . ";", LOCK_EX);
            @unlink(RUNTIME_FILE);
            return true;
        } else {
            return false;
        }
    }
}
