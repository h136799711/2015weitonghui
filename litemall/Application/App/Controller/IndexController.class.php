<?php

// .-----------------------------------------------------------------------------------
// |
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace App\Controller;
use Think\Controller;
class IndexController extends Controller
{
    private $openid;
    private $token;
    
    public function getURL() {
        $token = I('get.token', '');
        if ($token) {
            $wxuser = M('Wxuser', 'gooraye_')->where(array('token' => $token))->find();
            if ($wxuser === false) {
                $this->error("无效token！");
            }
        } else {
            $this->error("缺少参数token！");
        }
    }
    
    private function requestOpenid() {
        
        $redirect_uri = '/litemall/index.php/App/Index/index?scope=snsapi_base&token=' . getToken();
        
        $appid = C('WX_APPID');
        $appsecret = C('WX_APPSECRET');
        $siteurl = C('WX_SITEURL');
        
        $oauth = new \Org\WxLib\Core\WeChatOAuth($appid, $appsecret, $siteurl);
        
        if (!isset($_GET['code'])) {
            $oauth->getCode($redirect_uri, $state = 1, 'snsapi_base');
        } else {
            $result = $oauth->getAccessTokenAndOpenId($_GET['code']);
        }
        
        if ($result) {
            return $result['openid'];
        }
        return false;
    }
    
    public function _initialize() {
        
        $this->token = getToken();
        //检测token的有效性
        if ($this->token) {
            $wxuser = M('Wxuser', 'gooraye_')->where(array('token' => $this->token))->find();
            if ($wxuser === false) {
                $this->error("无效token！");
            }
        } else {
            $this->error("缺少参数token！");
        }
        
        // 当前用户标识
        $this->openid = getOpenid();
        
        if (empty($this->openid)) {
            if (isWeixin()) {
                $this->openid = $this->requestOpenid();
            } else {       
                // $this->openid = "";         
                // 让用户登录，注册
                // $this->error("请用微信打开！");
                // $this->redirect( U('Index/login') ,3, "请登录");
                $this->openid = session_id() . time();
            }
        }
        
        //当前网站标识token
        session("token", $this->token);
        session("openid", $this->openid);
    }
    public function index() {
        if ($_GET['token']) {
            $info = R("Api/Api/gettheme");
            $info["theme"] = empty($info["theme"]) ? "default" : $info["theme"];
            C("DEFAULT_THEME", $info["theme"]);
            $this->assign("info", $info);
            
            $menuresult = R("Api/Api/getmenu");
            $this->assign("menu", $menuresult);
            
            $goodsresult = R("Api/Api/getgood");
            $this->assign("goods", $goodsresult);
            
            $usersresult = R("Api/Api/getuser", array($this->openid));
            
            $this->assign("users", $usersresult);
            $this->display();
        } else {
            echo '缺少参数!';
        }
    }
    public function fetchgooddetail() {
        $where["id"] = $_POST["id"];
        $result = M("Good")->where($where)->find();
        if ($result) {
            $result['image'] = __ROOT__.'/Uploads/gfile/'.getToken().'/'.$result['image'];
            $this->ajaxReturn($result);
        }
    }
    public function getorders() {
        
        $user_id = M("User")->where(array("openid" => $this->openid))->find();
        $result = M("Order")->where(array("user_id" => $user_id["id"]))->order('id desc')->select();
        $this->ajaxReturn($result);
    }
    public function addorder() {
            
        // if(empty($this->openid)){            
                        
        // }

        $username = $_POST['userData'][0][value];
        $phone = $_POST['userData'][1][value];
        $pay = $_POST['userData'][2][value];
        
        $address = $_POST['userData'][3][value];
        $note = $_POST['userData'][4][value];
        $totalprice = $_POST['totalPrice'];
        $cartdata = stripslashes($_POST['cartData']);
        $orderid = date("YmdHis") . mt_rand(1, 9);
        $time = time();
        
        if ($totalprice <= 0) {
            
            $rtn = array("error" => - 1, "errmsg" => "亲，请先选购商品~!");
            $this->ajaxReturn($rtn);
        }
        
        switch ($pay) {
            case 0:
                $pay_style = "货到付款";
                break;

            case 1:
                $pay_style = "微信支付";
                break;
        }
        
        $data["orderid"] = $orderid;
        $data["totalprice"] = $totalprice;
        $data["pay_style"] = $pay_style;
        $data["pay_status"] = "0";
        $data["note"] = $note;
        $data["order_status"] = '0';
        $data["time"] = $time;
        $data["cartdata"] = $cartdata;
        $userdata = M("User")->where(array("token" => $this->token, "openid" => $this->openid))->find();
        $cart = json_decode("$cartdata");
        $ordername = "商品";
        if ($cart) {
            $ordername = $cart[0]->name;
            if (count($cart) > 1) {
                $ordername.= "等等";
            }
        }
        if ($userdata) {
            $user_id = $userdata["id"];
            $user["id"] = $user_id;
            $user["username"] = $username;
            $user["phone"] = $phone;
            $user["address"] = $address;
            M("User")->save($user);
            $data["user_id"] = $user_id;
            $data["token"] = $userdata['token'];
            M("Order")->add($data);
        } else {
            $user["openid"] = $this->openid;
            $user["token"] = $this->token;
            $user["username"] = $username;
            $user["phone"] = $phone;
            $user["address"] = $address;
            
            $user_id = M("User")->add($user);
            $data["token"] = $user['token'];
            $data["user_id"] = $user_id;
            M("Order")->add($data);
        }
        
        //微信支付
        if ($pay == 1) {
            
            $wxpay_url = C('WX_PAYURL');
            $notify_url = C('WX_PAYNOTIFYURL');
            $return_url = U('App/Index/index', array('token' => getToken(), 'openid' => getOpenid()));
            $rtn = array("error" => 0, "data" => ($wxpay_url . "?showwxpaytitle=1&price=$totalprice&ordername=$ordername&orderid=$orderid&from=litemall&token=" . getToken() . "&userid=" . $this->openid . "&notify_url=" . urlencode($notify_url) . '&return_url=' . urlencode($return_url)));
        } else {
            $rtn = array("error" => 0, "data" => '');
        }
        
        //TODO : 提醒商家
        
        $this->ajaxReturn($rtn);
    }
    
    // app start
    public function appregister() {
        if (IS_POST) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $phone = $_POST["phone"];
            
            if ($username && $password && $phone) {
                $find = M("User")->where(array("phone" => $phone))->select();
                if (!$find) {
                    $data["username"] = $username;
                    $data["phone"] = $phone;
                    $data["password"] = md5($password);
                    $data["openid"] = $this->openid;
                    $data["time"] = time();
                    $data['token'] = getToken();
                    $data['openid'] = getOpenid();
                    
                    $result = M("User")->add($data);
                    if ($result) {
                        $this->ajaxReturn($result);
                    }
                }
            }
        } else {
            $this->display();
        }
    }
    public function applogin() {
        $phone = $_POST["phone"];
        $password = md5($_POST["password"]);
        
        if ($phone && $password) {
            $result = M("User")->where(array("phone" => $phone, "password" => $password))->find();
            if ($result) {
                $this->ajaxReturn($result);
            }
        }
    }
    public function appgetgood() {
        $result = M("Good")->where(array('token' => getToken()))->select();
        if ($result) {
            $this->ajaxReturn($result);
        }
    }
    public function appdoaddress() {
        $do = $_POST["do"];
        $uid = $_POST["uid"];
        
        switch ($do) {
            case 1:
                $result = M("User")->where(array("openid" => $this->openid))->find();
                if ($result) {
                    $this->ajaxReturn($result);
                }
                break;

            case 2:
                $address = $_POST["address"];
                $data["address"] = $address;
                $result = M("User")->where(array("openid" => $this->openid))->save($data);
                if ($result) {
                    $this->ajaxReturn($result);
                }
                break;

            default:;
                break;
        }
    }
    public function appdoorder() {
        $do = $_POST["do"];
        
        switch ($do) {
            case 1:
                $cartdata = $_POST["cartdata"];
                $note = $_POST["note"];
                $cartarray = json_decode($cartdata, true);
                $totalprice = 0;
                for ($i = 0; $i < count($cartarray); $i++) {
                    unset($cartarray[$i]["id"]);
                    unset($cartarray[$i]["image"]);
                    $totalprice+= $cartarray[$i]["num"] * $cartarray[$i]["price"];
                }
                $cartdata = json_encode($cartarray);
                $orderid = date("YmdHis") . mt_rand(1, 9);
                $time = time();
                $user = M("User")->where(array("openid" => $this->openid))->find();
                
                $data["orderid"] = $orderid;
                $data["totalprice"] = $totalprice;
                $data["pay_style"] = "货到付款";
                $data["pay_status"] = "0";
                $data["note"] = $note;
                $data["order_status"] = '0';
                $data["time"] = $time;
                $data["cartdata"] = $cartdata;
                $data["user_id"] = $user["id"];
                $data['token'] = getToken();
                $data['openid'] = getOpenid();
                
                $result = M("Order")->add($data);
                if ($result) {
                    $this->ajaxReturn($result);
                }
                
                break;

            case 2:
                $id = M("User")->where(array("openid" => $this->openid))->find();
                $id = $id["id"];
                
                $result = M("Order")->where(array("user_id" => $id))->select();
                if ($result) {
                    $this->ajaxReturn($result);
                }
                break;

            case 3:
                $orderid = $_POST["orderid"];
                $result = M("Order")->where(array("orderid" => $orderid))->find();
                
                $user = M("User")->where(array("openid" => $this->openid))->find();
                
                $result = array_merge($result, $user);
                
                if ($result) {
                    $this->ajaxReturn($result);
                }
                
                break;

            default:;
                break;
        }
    }
}
