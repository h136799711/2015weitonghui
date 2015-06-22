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
use Common\Controller\BaseController;

/**
 *  微信支付
 */
class WeixinController extends BaseController
{
    public $token;
    public $wecha_id;
    public $payConfig;
    public function _initialize() {
        
        parent::_initialize();
        
        $this->token = I('get.token');
        $this->wecha_id = I('get.wecha_id');
        if (!$this->token) {            
            //
            $product_cart_model = M('ProductCart');
            $out_trade_no = I('get.out_trade_no');
            $order = $product_cart_model->where(array('orderid' => $out_trade_no))->find();
            if (!$order) {
                $order = $product_cart_model->where(array('id' => intval(I('get.out_trade_no'))))->find();
            }
            $this->token = $order['token'];
        }
        
        //读取支付宝配置
        $pay_config_db = M('AlipayConfig');
        $this->payConfig = $pay_config_db->where(array('token' => $this->token))->find();
    }
    
    /**
     *  [getWxpayConfig 获取微信支付配置]
     *  @return [type] [description]
     */
    public function getWxpayConfig() {
        
        $config = array(
        
        //微信公众号身份的唯一标识。审核通过后，在微信发送的邮件中查看
        'APPID' => $this->payConfig['appid'],
        
        //受理商ID，身份标识
        'MCHID' => $this->payConfig['paysignkey'],
        
        //商户支付密钥Key。审核通过后，在微信发送的邮件中查看,patenerkey
        'KEY' => $this->payConfig['partnerkey'],
        
        //JSAPI接口中获取openid，审核后在公众平台开启开发模式后可查看
        'APPSECRET' => $this->payConfig['appsecret'],
        
        //获取access_token过程中的跳转uri，通过跳转将code传入jsapi支付页面
        'JS_API_CALL_URL' => urlencode(C('site_url') . '/index.php/Wap/Weixin/pay?price=' . I('get.price') . '&orderName=' . I('get.orderName') . '&single_orderid=' . I('get.single_orderid') . '&from=' . I('get.from') . '&token=' . I('get.token') . '&wecha_id=' . I('get.wecha_id')).'&showwxpaytitle=1',
        
        //异步通知url，商户根据实际开发过程设定
        'NOTIFY_URL' => urlencode(C('site_url') . U('Wap/Weixin/return_url', array('token' => I('get.token'), 'wecha_id' => I('get.wecha_id'), 'from' => I('get.from'))))

        );
        
        // $url = C('site_url') . '/index.php/Wap/Weixin/pay?price=' . I('get.price') . '&orderName=' . I('get.orderName') . '&single_orderid=' . I('get.single_orderid') . '&from=' . I('get.from') . '&token=' . I('get.token') . '&wecha_id=' . I('get.wecha_id').'&showwxpaytitle=1';

        // $notify_url = C('site_url') . U('Wap/Weixin/return_url', array('token' => I('get.token'), 'wecha_id' => I('get.wecha_id'), 'from' => I('get.from'))));

        // $config = $this->getPayConfig($url,$notify_url);

        return $config;


    }


    private function getPayConfig($url, $notify_url) {
        
        $config = array(
        
        //微信公众号身份的唯一标识。审核通过后，在微信发送的邮件中查看
        'APPID' => $this->payConfig['appid'],
        
        //受理商ID，身份标识
        'MCHID' => $this->payConfig['paysignkey'],
        
        //商户支付密钥Key。审核通过后，在微信发送的邮件中查看,patenerkey
        'KEY' => $this->payConfig['partnerkey'],
        
        //JSAPI接口中获取openid，审核后在公众平台开启开发模式后可查看
        'APPSECRET' => $this->payConfig['appsecret'],
        
        //获取access_token过程中的跳转uri，通过跳转将code传入jsapi支付页面
        'JS_API_CALL_URL' => urlencode($url),
        
        //异步通知url，商户根据实际开发过程设定
        'NOTIFY_URL' => urlencode($notify_url));
        
        return $config;
    }

    public function testUnionpay(){
        $token = 'caspcu1403054302';
        redirect( C('site_url').U('Weixin/unionpay').'?showwxpaytitle=1&price=0.01&ordername=测试&orderid=orderid'.time()."&from=litemall&token=$token&userid=hebidu&notify_url=".urlencode('http://new.weitonghui.com/litemall/index.php/App/Wxpay/notify?token='.$token).'&return_url='.urlencode('http://new.weitonghui.com/litemall/index.php/App/Index/index?token='.$token) );
    }
    
    //通用微信支付
    //GET Weixin/unionpay
    //参数 ?token=&下单用户标识=价格=订单id=订单标题,
    //          notify_url=回调通知地址
    //          return_url=请求完成跳转地址
    //参数 ?token=&userid=&price=&orderid=&ordername=&notify_url=return_url
    public function unionpay() {
        import("Org.WxpayV33.WxPayPubHelper", '', ".php");
        // dump($this->payConfig);
        $price = I('price',0);
        $ordername = I('ordername','Unknow');
        $orderid = I('orderid','');
        $from = I('from','');
        $token = I('token','');
        $userid = I('userid','');
        $notify_url = I('notify_url','','urldecode');

        $return_url = I('return_url','');
        $url = C('site_url') . '/index.php/Wap/Weixin/unionpay';
        $url .= '?showwxpaytitle=1&token='.$token.'&userid='.$userid.'&from='.$from.'&price='.$price.'&ordername='.$ordername.'&orderid='.$orderid.'&notify_url='.urlencode($notify_url).'&return_url='.urlencode($return_url);

        $config = $this->getPayConfig($url,$notify_url);
        // 使用jsapi接口
        $jsApi = new \JsApi_pub($config);
        try {
            
            //=========步骤1：网页授权获取用户openid============
            //通过code获得openid
            if (!isset($_GET['code'])) {
                
                //触发微信返回code码
                $url = $jsApi->createOauthUrlForCode($config['JS_API_CALL_URL']);
                redirect($url);
            } else {
                
                //获取code码，以获取openid
                $code = $_GET['code'];
                $jsApi->setCode($code);
                $openid = $jsApi->getOpenId();
            }
            if(empty($openid)){
                $url = $jsApi->createOauthUrlForCode($config['JS_API_CALL_URL']);
                redirect($url);
            }

            //=========步骤2：使用统一支付接口，获取prepay_id============
            //使用统一支付接口
            $unifiedOrder = new \UnifiedOrder_pub($config);
            
            //设置统一支付接口参数
            //设置必填参数
            //appid已填,商户无需重复填写
            //mch_id已填,商户无需重复填写
            //noncestr已填,商户无需重复填写
            //spbill_create_ip已填,商户无需重复填写
            //sign已填,商户无需重复填写
            $unifiedOrder->setParameter("openid", "$openid");
            
            //商品描述
            $unifiedOrder->setParameter("body", $ordername);
            
            //商户订单号
            $unifiedOrder->setParameter("out_trade_no", $orderid);
            
            //总金额
            $unifiedOrder->setParameter("total_fee", floatval($price) * 100);
            
            //通知地址
            $unifiedOrder->setParameter("notify_url", $notify_url);
            
            //交易类型
            $unifiedOrder->setParameter("trade_type", "JSAPI");
            
            $unifiedOrder->setParameter("attach",'{"token":"'.$token.'","orderid":"'.$orderid.'"}');//附加数据
            
            //非必填参数，商户可根据实际情况选填
            //$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号
            //$unifiedOrder->setParameter("device_info","XXXX");//设备号
            //$unifiedOrder->setParameter("attach","XXXX");//附加数据
            // $unifiedOrder->setParameter("time_start",time());//交易起始时间
            // $unifiedOrder->setParameter("time_expire",time()+3600*3);//交易结束时间
            //$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记
            // $unifiedOrder->setParameter("openid","XXXX");//用户标识
            //商品ID
            // $unifiedOrder->setParameter("product_id", $orderid);
            
            $prepay_id = $unifiedOrder->getPrepayId();
            
            //=========步骤3：使用jsapi调起支付============
            $jsApi->setPrepayId($prepay_id);
            
            $jsApiParameters = $jsApi->getParameters();
        }
        catch(SDKRuntimeException $sdkexcep) {
            $error = $sdkexcep->errorMessage();
            $this->assign("error", $error);
        }
        
        // 是否团购订单
        
        $this->assign("orderid", $orderid);
        $this->assign("ordername", $ordername);
        $this->assign("url", $jsApiParameters);
        $this->assign('returnUrl', $return_url);
        $this->display();


    }
    
    //v3.3版本微信支付
    public function pay() {
        import("Org.WxpayV33.WxPayPubHelper", '', ".php");
        $config = $this->getWxpayConfig();
        
        //使用jsapi接口
        $jsApi = new \JsApi_pub($config);
        
        // addWeixinLog($_GET['code'],'code');
        // addWeixinLog($config['JS_API_CALL_URL'],'JS_API_CALL_URL');
        // $log->log_result('./pay.log', 'jsApi= ' .   (string)$c);
        try {
            
            //=========步骤1：网页授权获取用户openid============
            //通过code获得openid
            if (!isset($_GET['code'])) {
                
                //触发微信返回code码
                $url = $jsApi->createOauthUrlForCode($config['JS_API_CALL_URL']);
                redirect($url);
            } else {
                
                //获取code码，以获取openid
                $code = $_GET['code'];
                $jsApi->setCode($code);
                $openid = $jsApi->getOpenId();
            }
            
            // addWeixinLog($openid,'openid');
            
            //=========步骤2：使用统一支付接口，获取prepay_id============
            //使用统一支付接口
            $unifiedOrder = new \UnifiedOrder_pub($config);
            
            //设置统一支付接口参数
            //设置必填参数
            //appid已填,商户无需重复填写
            //mch_id已填,商户无需重复填写
            //noncestr已填,商户无需重复填写
            //spbill_create_ip已填,商户无需重复填写
            //sign已填,商户无需重复填写
            $unifiedOrder->setParameter("openid", "$openid");
            
            //商品描述
            $unifiedOrder->setParameter("body", $_GET['single_orderid']);
            
            //自定义订单号，此处仅作举例
            // $timeStamp = time();
            // $out_trade_no = $config['APPID'] . "$timeStamp";
            //商户订单号
            $unifiedOrder->setParameter("out_trade_no", $_GET['single_orderid']);
            
            //总金额
            $unifiedOrder->setParameter("total_fee", floatval($_GET['price']) * 100);
            
            //通知地址
            $unifiedOrder->setParameter("notify_url", $config['NOTIFY_URL']);
            
            //交易类型
            $unifiedOrder->setParameter("trade_type", "JSAPI");
            
            //非必填参数，商户可根据实际情况选填
            //$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号
            //$unifiedOrder->setParameter("device_info","XXXX");//设备号
            //$unifiedOrder->setParameter("attach","XXXX");//附加数据
            // $unifiedOrder->setParameter("time_start",time());//交易起始时间
            // $unifiedOrder->setParameter("time_expire",time()+3600*3);//交易结束时间
            //$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记
            // $unifiedOrder->setParameter("openid","XXXX");//用户标识
            //商品ID
            $unifiedOrder->setParameter("product_id", $_GET['single_orderid']);
            
            $prepay_id = $unifiedOrder->getPrepayId();
            
            //=========步骤3：使用jsapi调起支付============
            $jsApi->setPrepayId($prepay_id);
            
            $jsApiParameters = $jsApi->getParameters();
        }
        catch(SDKRuntimeException $sdkexcep) {
            $error = $sdkexcep->errorMessage();
            $this->assign("error", $error);
        }
        
        // 是否团购订单
        $from = $_GET['from'];
        $from = $from ? $from : 'Groupon';
        $from = $from != 'groupon' ? $from : 'Groupon';
        $returnUrl = U('Wap/' . $from . '/payReturn', array('token' => $_GET['token'], 'wecha_id' => $_GET['wecha_id'], 'orderid' => $_GET['single_orderid']));
        
        $this->assign("url", $jsApiParameters);
        $this->assign('returnUrl', $returnUrl);
        $this->display();
    }
    
    // 支付平台回调此URL 。
    public function return_url() {
        S('pay', $_GET);
        $out_trade_no = I('get.out_trade_no');
        addWeixinLog($out_trade_no, 'wxpay_return_url');
        
        if (intval($_GET['total_fee']) && !intval($_GET['trade_state'])) {
            
            /************************************************/
            $member_card_create_db = M('MemberCardCreate');
            $userCard = $member_card_create_db->where(array('token' => $this->token, 'wecha_id' => $this->wecha_id))->find();
            $member_card_set_db = M('MemberCardSet');
            $thisCard = $member_card_set_db->where(array('id' => intval($userCard['cardid'])))->find();
            
            $set_exchange = M('Member_card_exchange')->where(array('cardid' => intval($thisCard['id'])))->find();
            
            //
            $arr['token'] = $this->token;
            $arr['wecha_id'] = $this->wecha_id;
            $arr['expense'] = intval(intval($_GET['total_fee']) / 100);
            $arr['time'] = time();
            $arr['cat'] = 99;
            $arr['staffid'] = 0;
            $arr['score'] = intval($set_exchange['reward']) * $arr['expense'];
            if ($thisCard) {
                M('MemberCardUseRecord')->add($arr);
            }
            
            $userinfo_db = M('Userinfo');
            $thisUser = $userinfo_db->where(array('token' => $thisCard['token'], 'wecha_id' => $arr['wecha_id']))->find();
            
            $userArr = array();
            $userArr['total_score'] = $thisUser['total_score'] + $arr['score'];
            $userArr['expensetotal'] = $thisUser['expensetotal'] + $arr['expense'];
            $userinfo_db->where(array('token' => $this->token, 'wecha_id' => $arr['wecha_id']))->save($userArr);
            
            /************************************************/
            $from = $_GET['from'];
            $from = $from ? $from : 'Groupon';
            $from = $from != 'groupon' ? $from : 'Groupon';
            
            switch (strtolower($from)) {
                default:
                case 'groupon':
                    $order_model = M('ProductCart');
                    
                    break;

                case 'store':
                    $order_model = M('ProductCart');
                    break;

                case 'business':
                    $order_model = M('Reservebook');
                    break;

                case 'business':
                    $order_model = M('Reservebook');
                    break;

                case 'repast':
                    $order_model = M('Dish_order');
                    break;

                case 'hotels':
                    $order_model = M('Hotels_order');
                    break;
            }
            $order_model->where(array('orderid' => $out_trade_no))->setField('paid', 1);
            if (strtolower($from) == 'groupon') {
                $order_model->where(array('orderid' => $out_trade_no))->save(array('transactionid' => I('get.transaction_id'), 'paytype' => 'weixin'));
            }
        } else {
            exit('付款失败');
        }
    }
    public function notify_url() {
        
        addWeixinLog(time(), 'notify_url');
        
        import("Org.WxpayV33.WxPayPubHelper", '', ".php");
        $config = $this->getWxpayConfig();
        
        //使用通用通知接口
        $notify = new \Notify_pub($config);
        
        //存储微信的回调
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        $notify->saveData($xml);
        
        //验证签名，并回应微信。
        //对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
        //微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
        //尽可能提高通知的成功率，但微信不保证通知最终能成功。
        // if($notify->checkSign() == FALSE){
        //  $notify->setReturnParameter("return_code","FAIL");//返回状态码
        //  $notify->setReturnParameter("return_msg","签名失败");//返回信息
        // }else{
        //  $notify->setReturnParameter("return_code","SUCCESS");//设置返回码
        // }
        // $returnXml = $notify->returnXml();
        // echo $returnXml;
        
        //==商户根据实际情况设置相应的处理流程，此处仅作举例=======
        
        //以log文件形式记录回调信息
        // $log_ = new Log_();
        // $log_name="./notify_url.log";//log文件路径
        // $log_->log_result($log_name,"【接收到的notify通知】:\n".$xml."\n");
        
        if ($notify->checkSign() == TRUE) {
            if ($notify->data["return_code"] == "FAIL") {
                
                //此处应该更新一下订单状态，商户自行增删操作
                addWeixinLog("【通信出错】", "微信支付");
                
                // $log_->log_result($log_name,"【通信出错】:\n".$xml."\n");
                
            } elseif ($notify->data["result_code"] == "FAIL") {
                
                //此处应该更新一下订单状态，商户自行增删操作
                //
                addWeixinLog("【业务出错】", "微信支付");
                
                // $log_->log_result($log_name,"【业务出错】:\n".$xml."\n");
                
            } else {
                
                //此处应该更新一下订单状态，商户自行增删操作
                addWeixinLog("【支付成功】", "微信支付");
                
                // $log_->log_result($log_name,"【支付成功】:\n".$xml."\n");
                
            }
            
            //商户自行增加处理流程,
            //例如：更新订单状态
            //例如：数据库操作
            //例如：推送支付完成信息
            
        }
        
        echo "success";
    }
}
?>