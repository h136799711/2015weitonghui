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
use Common\Controller\BaseController;

class IndexController extends Controller
{
    
    //获取远程主机的IP
    public function getRemoteAddr() {
        
        if ($_SERVER["HTTP_X_FORWARDED_FOR"]) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif ($_SERVER["HTTP_CLIENT_IP"]) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif ($_SERVER["REMOTE_ADDR"]) {
            $ip = $_SERVER["REMOTE_ADDR"];
        } elseif ($_SERVER("HTTP_X_FORWARDED_FOR")) {
            $ip = $_SERVER("HTTP_X_FORWARDED_FOR");
        } elseif ($_SERVER("HTTP_CLIENT_IP")) {
            $ip = $_SERVER("HTTP_CLIENT_IP");
        } elseif ($_SERVER("REMOTE_ADDR")) {
            $ip = $_SERVER("REMOTE_ADDR");
        } else {
            $ip = "Unknown";
        }
        return $ip;
    }
    
    //获取远程主机的IP
    public function showRemoteAddr() {
        $ip = $this->getRemoteAddr();
        $this->show($ip);
    }
    
    public function admin() {

        $allowIP = C('ALLOWIP');

        if (defined('BIND_MODULE')  && ($_GET['key'] == 'hebidu-gooraye' || in_array($this->getRemoteAddr(), $allowIP))) {
            $this->display("index");
        } else {
            header('HTTP/1.1 404 Not Found');
            header('status: 404 Not Found');
            header('Location: '.__ROOT__.'/Public/404.html');
            exit();
        }
    }
    
    public function index() {
        $this->admin();
    }
    
    public function insert() {
        $username = I('post.username');
        $password = I('post.password','', 'md5');
        if (empty($username) || empty($password)) {
            $this->error('请输入帐号密码', U('Index/index'));
        }
        $code = I('post.code',0, 'intval,md5');
        if ($code != session('verify')) {
            $this->error('验证码错误', U('Index/index'));
        }
        
        //生成认证条件
        $map = array();
        
        // 支持使用绑定帐号登录
        $map['username'] = $username;
        $map['status'] = 1;
        import('Org.RBAC');
        $authInfo = \RBAC::authenticate($map, 'User');
        
        //exit;
        //使用用户名、密码和状态的方式进行认证
        if ($authInfo['password'] != $password) $this->error('账号密码不匹配，请认真填写');
        if ((false == $authInfo)) {
            $this->error('帐号不存在或已禁用！');
        } else {
            session(C('USER_AUTH_KEY'), $authInfo['id']);
            session('userid', $authInfo['id']);
             //用户ID
            session('username', $authInfo['username']);
             //用户名
            session('roleid', $authInfo['role']);
             //角色ID
            if ($authInfo['username'] == C('SPECIAL_USER')) {
                session(C('ADMIN_AUTH_KEY'), true);
            }
            
            //保存登录信息
            $User = M('User');
            $ip = get_client_ip();
            $data = array();
            if ($ip) {
                import('Org.IpLocation');
                 //如果获取到客户端IP，则获取其物理位置
                $Ip = new \IpLocation();
                 // 实例化类
                $location = $Ip->getlocation($ip);
                 // 获取某个IP地址所在的位置
                $data['last_location'] = '';
                if ($location['country'] && $location['country'] != 'CZ88.NET') $data['last_location'].= $location['country'];
                if ($location['area'] && $location['area'] != 'CZ88.NET') $data['last_location'].= ' ' . $location['area'];
            }
            $data['id'] = $authInfo['id'];
            $data['last_login_time'] = time();
            $data['last_login_ip'] = get_client_ip();
            $User->save($data);
            
            // 缓存访问权限
            \RBAC::saveAccessList();
            redirect(U('System/index'));
        }
    }
    
    public function verify() {
        import('Org.Image');
        \Image::buildImageVerify();
    }
    
    // 用户登出
    public function logout() {
        session(null);
        session_destroy();
        if (session('?' . C('USER_AUTH_KEY'))) {
            session(C('USER_AUTH_KEY'), null);
            
            redirect(U('Admin/Index'));
        } else {
            $this->error('已经登出！', U('Admin/index'));
        }
    }
}