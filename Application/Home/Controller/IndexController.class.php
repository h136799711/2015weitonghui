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
use Common\Controller\BaseController;

class IndexController extends BaseController
{

    // 用户登出
    public function logout() {
        session(null);
        session_destroy();
        if (session('?' . C('USER_AUTH_KEY'))) {
            session(C('USER_AUTH_KEY'), null);            
            redirect(U('Home/Index/index'));
        } else {
            $this->error('已经登出！', U('Home/Index/index'));
        }
    }
    //替换
    public function replace() {
        $path = "F:\WWW\a\gai\Application\Wap\View\gooraye";
        $cur_dir_name = "gooraye";
        $this->traverse($path, $cur_dir_name);
    }
    
    function traverse($path, $cur_dir_name) {
        $current_dir = opendir($path);
         //opendir()返回一个目录句柄,失败返回false
        while (($file = readdir($current_dir)) !== false) {
             //readdir()返回打开目录句柄中的一个条目
            $sub_dir = $path . DIRECTORY_SEPARATOR . $file;
             //构建子目录路径
            if ($file == '.' || $file == '..') {
                continue;
            } else if (is_dir($sub_dir)) {
                 //如果是目录,进行递归
                echo 'Directory ' . $file . ':<br>';
                $this->traverse($sub_dir, $file);
            } else {
                 //如果是文件,直接输出
                if (!empty($cur_dir_name) && strpos($file, $cur_dir_name) !== false) {
                    $newname = $path . DIRECTORY_SEPARATOR . str_replace($cur_dir_name . "_", "", $file);
                    rename($sub_dir, $newname);
                    echo 'Rename ' . $newname . '<br>';
                } else {
                    echo 'Not Rename ' . $path . ': ' . $file . '<br>';
                }
            }
        }
    }
    
    public function _empty($name) {
        $this->display('login');
    }
    
    protected function _initialize() {
        parent::_initialize();
    }
    //微信墙下
    public function whenWall($userinfo) {
        
        $token = I('get.token');
        $wallid = I('get.wallid');
        $data['portrait'] = $userinfo->headimgurl;
        S('fans_' . $token . '_' . $userinfo->openid, NULL);
        
        $data['wecha_id'] = $userinfo->openid;
        $data['nickname'] = $userinfo->nickname;
        $data['sex'] = $userinfo->sex;
        $data['time'] = time();
        $data['token'] = $token;
        $data['wallid'] = $wallid;
        $data['last_msg_time'] = time();
        $map['wallid'] = $wallid;
        $map['wecha_id'] = $userinfo->openid;
        $map['token'] = $token;
        $wallMember = M('Wall_member')->where($map)->find();
        if (!$wallMember) {
            M('Wall_member')->add($data);
        }
        $userinfo = FALSE;
        $userinfo = M('Userinfo')->where(array('token' => $token, 'wecha_id' => $map['wecha_id']))->find();
        if (!$userinfo) {
            $userinfo['token'] = $data['token'];
            $userinfo['protrait'] = $data['portrait'];
            $userinfo['wecha_id'] = $data['wecha_id'];
            $userinfo['wechaname'] = $data['nickname'];
            $userinfo['truename'] = $data['nickname'];
            $userinfo['sex'] = $data['sex'];
            $userinfo['wallopen'] = $wallid;
            M('Userinfo')->add($userinfo);
        } else {
            M('Userinfo')->where(array('token' => $token, 'wecha_id' => $map['wecha_id']))->save(array('wallopen' => $wallid));
        }
        
        sendTextTofan($token, $map['wecha_id'], '您已进入微信墙对话模式，您可以发送图片、照片、文字、语音消息了 : )');
        
        $this->show('<!DOCTYPE html><html ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width,height=device-height,maximum-scale=1.0,user-scalable=no"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black"><meta name="format-detection" content="telephone=no"><title>进入成功</title><style type="text/css">.countdown{font-weight: bold;text-align: center;}</style></head><body><p class="countdown">您已进入微信墙对话模式，您可以发送图片、照片、文字、语音消息了，<em id="cnt" style="color:red;"></em>秒后返回公众号。若不能自动返回，请点击左上角返回</p><script type="text/javascript">function close(){if(typeof(WeixinJSBridge)!="undefined"){WeixinJSBridge.call("closeWindow");}}function countdown(i){if(i == 0){close();}else{document.getElementById("cnt").innerHTML = i;setTimeout(function(){countdown(i-1)},1000);}}/*** 检测微信JsAPI* @param callback*/function detectWeixinApi(callback){if(typeof window.WeixinJSBridge == "undefined" || typeof window.WeixinJSBridge.invoke == "undefined"){setTimeout(function(){detectWeixinApi(callback);},200);}else{callback();}}detectWeixinApi(function(){countdown(0);});</script></body></html>');
    }
    
    /*微信oauth2的回发处理方法*/
    public function oauth2() {
        $token = I('get.token');
        $code = I('get.code');
        $state = I('get.state');
        import("Org.OAuth2");
        $oauth2 = new \OAuth2();
        $errmsg = $oauth2->getInfo($code);
        if ($errmsg == "") {
            
            //成功获取
            $userinfo = $oauth2->getUserInfo();
            
            if (empty($userinfo->errcode)) {
                
                if ($state == "shake") {
                    $shakeid = I('get.shakeid');
                    $map['token'] = $token;
                    $map['shakeid'] = $shakeid;
                    $map['wecha_id'] = $userinfo->openid;
                    $user = M('Shake_user')->where($map)->find();
                    if ($user == FALSE) {
                        
                        //针对摇一摇处理获得的用户信息
                        $data['headurl'] = $userinfo->headimgurl;
                        $data['wecha_id'] = $userinfo->openid;
                        $data['nickname'] = $userinfo->nickname;
                        $data['sex'] = $userinfo->sex;
                        $data['jointime'] = time();
                        $data['token'] = getToken();
                        $data['shakeid'] = $shakeid;
                        M('Shake_user')->add($data);
                        
                        // $this->show(U('Wap/Shake/index',array('token'=>$token,'wecha_id'=>$userinfo->openid,'id'=>$shakeid)));
                        // $this->show()
                        redirect(C('site_url') . U('Wap/Shake/index', array('token' => $token, 'wecha_id' => $userinfo->openid, 'id' => $shakeid)));
                        
                        //					exit();
                        // $this->redirect(C('site_url').U('Wap/Shake/index',array('token'=>$token,'wecha_id'=>$userinfo->openid,'id'=>$shakeid)),2,'页面跳转中');
                        
                    }
                     //End 1IF
                    else {
                        redirect(C('site_url') . U('Wap/Shake/index', array('token' => $token, 'wecha_id' => $userinfo->openid, 'id' => $shakeid)));
                    }
                } elseif ($state == "wall") {
                    $this->whenWall($userinfo);
                }
                
                //End 2IF}
                
                // }//End 3IF
                
            } else {
                $this->show("<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><meta name='viewport' content='width=device-width,height=device-height,maximum-scale=1.0,user-scalable=no'><meta name='apple-mobile-web-app-capable' content='yes'><meta name='apple-mobile-web-app-status-bar-style' content='black'><meta name='format-detection' content='telephone=no'></head><body><p style='font-size:18px;color:red;text-align:center;width:100%;'>出错了：" . $userinfo->errmsg . "。请重新尝试！</p></body></html>");
            }
        } else {
            $this->show("<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><meta name='viewport' content='width=device-width,height=device-height,maximum-scale=1.0,user-scalable=no'><meta name='apple-mobile-web-app-capable' content='yes'><meta name='apple-mobile-web-app-status-bar-style' content='black'><meta name='format-detection' content='telephone=no'></head><body><p style='font-size:18px;color:red;text-align:center;width:100%;'>" . $errmsg . "请重新尝试！</p></body></html>");
        }
        
        // var_dump($oauth2);
        
    }
    
    //绑定公众号
    public function bind() {
        $this->assign("site_url", C('site_url'));
        $this->assign("token", I('get.token'));
        $this->display();
    }
    
    //公司员工登录
    public function clogin() {
        $cid = I('cid', 0, 'intval');
        $k = I('k', '');
        $this->assign('cid', $cid);
        $this->assign('k', $k);
        $this->display();
    }
    
    //
    public function index() {
        $this->display('login');
    }
    
    // public function verify(){
    // 	Image::buildImageVerify(4,1,'png',0,28,'verify');
    // }
    // public function verifyLogin(){
    // 	Image::buildImageVerify(4,1,'png',0,28,'loginverify');
    // }
    
    function think_encrypt($data, $key = '', $expire = 0) {
        $key = md5(empty($key) ? C('DATA_AUTH_KEY') : $key);
        $data = base64_encode($data);
        $x = 0;
        $len = strlen($data);
        $l = strlen($key);
        $char = '';
        
        for ($i = 0; $i < $len; $i++) {
            if ($x == $l) $x = 0;
            $char.= substr($key, $x, 1);
            $x++;
        }
        
        $str = sprintf('%010d', $expire ? $expire + time() : 0);
        
        for ($i = 0; $i < $len; $i++) {
            $str.= chr(ord(substr($data, $i, 1)) + (ord(substr($char, $i, 1))) % 256);
        }
        return str_replace('=', '', base64_encode($str));
    }
}
