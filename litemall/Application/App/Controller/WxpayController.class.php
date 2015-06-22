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

class WxpayController extends Controller
{
    private $token;
    private $orderid;
    private $payConfig;
    /**
     *  [_initialize 初始化]
     *  @return [type] [description]
     */
    public function _initialize() {
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        // addWeixinLog($xml,"xml");
        $array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);        
        // addWeixinLog($array_data['attach'],"attach");
        $attach = json_decode($array_data["attach"]);
        $this->token = $attach -> token;
        $this->orderid = $attach -> orderid;
        //读取支付配置
        $this->payConfig = M('AlipayConfig','gooraye_')->where(array('token' => $this->token))->find();
    }
    
    /**
     *  [getPayconfig 取得支付配置]
     *  @return [type] [description]
     */
    private function getPayconfig() {
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
        // 'JS_API_CALL_URL' => urlencode($url),
        
        //异步通知url，商户根据实际开发过程设定
        // 'NOTIFY_URL' => urlencode($notify_url));
        );
        return $config;
    }

    
    /**
     *  [notify 回调通知处理方法]
     *  @return [type] [description]
     */
    public function notify() {
        addWeixinLog(getToken(),"notify token");

            //返回信息            
        import("Org.WxpayV33.WxPayPubHelper", '', ".php");
                
        $config = $this->getPayconfig();
        //使用通用通知接口
        $notify = new \Notify_pub($config);
        //存储微信的回调
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        $notify->saveData($xml);      

        // addWeixinLog($config,"config");

        //验证签名，并回应微信。
        //对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
        //微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
        //尽可能提高通知的成功率，但微信不保证通知最终能成功。
        if ($notify->checkSign() == FALSE) {
            $notify->setReturnParameter("return_code", "FAIL");
            
            //返回状态码
            $notify->setReturnParameter("return_msg", "签名失败");
            
             addWeixinLog("【签名失败】","签名失败");
            //返回信息            
            
        } else {
            $notify->setReturnParameter("return_code", "SUCCESS");            
            //设置返回码  
        }

        $returnXml = $notify->returnXml();
        echo $returnXml;
        
        //==商户根据实际情况设置相应的处理流程，此处仅作举例=======
        
        //以log文件形式记录回调信息
        if ($notify->checkSign() == TRUE) {
            if ($notify->data["return_code"] == "FAIL") {                
                addWeixinLog(serialize($xml),"【通信出错】");
                $data['pay_status'] = "-2";
               } elseif ($notify->data["result_code"] == "FAIL") {                
                addWeixinLog(serialize($xml),"【业务出错】");
                $data['pay_status'] = "-1";
            } else {
                addWeixinLog(serialize($xml),"【支付成功】");
                $data['pay_status'] = "1";
            }
            if($data){
                M('Order')->field("pay_status")->where(array('token'=>$this->token,'orderid'=>$this->orderid))->save($data);
                
            }
            
        }
    }

    

}
