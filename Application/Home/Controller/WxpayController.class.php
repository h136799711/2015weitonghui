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

class WxpayController extends Controller
{
    //微信3.3版本Native原生支付
    //
    public function native() {
        addWeixinLog(time(),'native');
        echo 'success';
    }
    
    public function notify() {

        echo 'success';
    }

    //微信3.3版本JSAPI 支付测试
    //公众号配置授权目录为 http://new.weitonghui.com/index.php/Home/Wxpay/
    // 必须/下的目录中，不包含子目录，
    // 假设http://new.weitonghui.com/index.php/Home/Wxpay/可以。已经在公众号中配置
    // 则http://new.weitonghui.com/index.php/Home/Wxpay/pay/目录下发起的请求就不可以。
    public function pay() {

        $this->assign("error",'');
        $config = array(
        
        //微信公众号身份的唯一标识。审核通过后，在微信发送的邮件中查看
        'APPID' => 'wx58aea38c0796394d',
        
        //受理商ID，身份标识
        'MCHID' => '10027619',
        
        //商户支付密钥Key。审核通过后，在微信发送的邮件中查看,patenerkey
        'KEY' => '755c9713b729cd82467ac592ded397ee',
        
        //JSAPI接口中获取openid，审核后在公众平台开启开发模式后可查看
        'APPSECRET' => '3e1404c970566df55d7314ecfe9ff437',
        
        //获取access_token过程中的跳转uri，通过跳转将code传入jsapi支付页面
        // 'JS_API_CALL_URL' => 'http://net.gooraye.net/a/gai/index.php/Home/Wxpay/pay',
        'JS_API_CALL_URL' => 'http://new.weitonghui.com/index.php/Home/Wxpay/pay',
        
        //证书路径,注意应该填写绝对路径
        'SSLCERT_PATH' => '', 'SSLKEY_PATH' => '',
        
        //异步通知url，商户根据实际开发过程设定
        'NOTIFY_URL' => 'http://new.weitonghui.com/index.php/Home/Wxpay/notify',
        
        //本例程通过curl使用HTTP POST方法，此处可修改其超时时间，默认为30秒
        'CURL_TIMEOUT' => 30);
        
        $log = new Log_();
        
        /**
         * JS_API支付demo
         * ====================================================
         * 在微信浏览器里面打开H5网页中执行JS调起支付。接口输入输出数据格式为JSON。
         * 成功调起支付需要三个步骤：
         * 步骤1：网页授权获取用户openid
         * 步骤2：使用统一支付接口，获取prepay_id
         * 步骤3：使用jsapi调起支付
         */
        import("Org.WxpayV33.WxPayPubHelper", '', ".php");
        
        //使用jsapi接口
        $jsApi = new \JsApi_pub($config);
        
        $c = (string)serialize($jsApi->getConfig());
        // $log->log_result('./pay.log', 'jsApi= ' .   (string)$c);
        try{
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
        $unifiedOrder->setParameter("body", "贡献一分钱");
        
        //商品描述
        //自定义订单号，此处仅作举例
        $timeStamp = time();
        $out_trade_no = $config['APPID'] . "$timeStamp";
        $unifiedOrder->setParameter("out_trade_no", "$out_trade_no");
        
        //商户订单号
        $unifiedOrder->setParameter("total_fee", "1");
        
        //总金额
        $unifiedOrder->setParameter("notify_url", $config['NOTIFY_URL']);
        
        //通知地址
        $unifiedOrder->setParameter("trade_type", "JSAPI");
        
        //交易类型
        //非必填参数，商户可根据实际情况选填
        //$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号
        //$unifiedOrder->setParameter("device_info","XXXX");//设备号
        //$unifiedOrder->setParameter("attach","XXXX");//附加数据
        //$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
        //$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间
        //$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记
        // $unifiedOrder->setParameter("openid","XXXX");//用户标识
        $unifiedOrder->setParameter("product_id","0001");//商品ID
        
        $prepay_id = $unifiedOrder->getPrepayId();
        //=========步骤3：使用jsapi调起支付============
        $jsApi->setPrepayId($prepay_id);
        
        $jsApiParameters = $jsApi->getParameters();
               
        	
        }catch(SDKRuntimeException $sdkexcep){
        		$error = $sdkexcep->errorMessage();
        		$this->assign("error",$error);
        }
        $this->assign("jsApiParameters",$jsApiParameters);
        //echo $jsApiParameters;
        $this->display();
        
        // var_dump($jsApiParameters);
        
    }
}

class Log_
{
    
    // 打印log
    function log_result($file, $word) {
        $fp = fopen($file, "a");
        flock($fp, LOCK_EX);
        fwrite($fp, "执行日期：" . strftime("%Y-%m-%d-%H：%M：%S", time()) . "\n" . $word . "\n\n");
        flock($fp, LOCK_UN);
        fclose($fp);
    }
}
