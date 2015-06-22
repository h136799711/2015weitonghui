<?php

// .-----------------------------------------------------------------------------------
// |
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

class Wechat
{
    
    const MSG_TYPE_TEXT = 'text';
    const MSG_TYPE_IMAGE = 'image';
    const MSG_TYPE_VOICE = 'voice';
    const MSG_TYPE_VIDEO = 'video';
    const MSG_TYPE_MUSIC = 'music';
    const MSG_TYPE_NEWS = 'news';
    const MSG_TYPE_LOCATION = 'location';
    const MSG_TYPE_LINK = 'link';
    const MSG_TYPE_EVENT = 'event';
    
    //事件类型常量
    const MSG_EVENT_SUBSCRIBE = 'subscribe';
    const MSG_EVENT_SCAN = 'SCAN';
    const MSG_EVENT_LOCATION = 'LOCATION';
    const MSG_EVENT_CLICK = 'CLICK';
    const MSG_EVENT_MASSSENDJOBFINISH = 'MASSSENDJOBFINISH';
    
    private $data = array();
    private $pc = null;
    public function __construct($token, $encodingAesKey, $appId) {
        import("Org.WxBizMsg.wxBizMsgCrypt");

        $this->pc = new \WXBizMsgCrypt(md5($token), $encodingAesKey, $appId);

        addWeixinLog('token'.$token,'before auth token');
        $this->auth($token) || exit;
        
        addWeixinLog('token'.$token,'after auth token');
        if (IS_GET) {
            ob_clean();
            addWeixinLog($_GET['echostr'],'post php:://get');
            echo ($_GET['echostr']);
            exit;
        } else {

            $xml = file_get_contents("php://input");
            addWeixinLog($xml,'post php:://input');

            if(isset($_GET['encrypt_type']) && strtolower($_GET['encrypt_type']) == 'aes' ){
                //有加密信息
                $decryptMsg = $this->decryptMsg($xml);
                if($decryptMsg === false){
                    //TODO: 解密失败下
                }else{
                    $xml = $decryptMsg;
                }
            }

            $xml = new SimpleXMLElement($xml);
            $xml || exit;
            foreach ($xml as $key => $value) {
                $this->data[$key] = strval($value);
            }
        }
    }

    /**
     *  [encryptMsg 加密消息]
     *  @param  [type] $xml            [待加密消息XML格式]
     *  @param  [type] $encodingAesKey [43位的encodingAesKey]
     *  @param  [type] $token          [token]
     *  @param  [type] $appId          [公众号APPID]
     *  @return [type]                 [false标识解密失败，否则为加密后的字符串]
     */
    private function encryptMsg($xml) {
        $timeStamp = time();
        $nonce = "gooraye";
        $encryptMsg = '';
        $errCode = $this->pc->encryptMsg($xml, $timeStamp, $nonce, $encryptMsg);
        if ($errCode == 0) {
            // print("加密后: " . $encryptMsg . "\n");            
            return $encryptMsg;
        } else {
            
            return false;
            
            // print($errCode . "\n");
            
        }
    }
    /**
     *  [decryptMsg 解密消息体]
     *  @param  [type] $encryptMsg [加密的消息体]
     *  @return [type]             [false =>解密失败，否则为解密后的消息]
     */
    private function decryptMsg($encryptMsg) {
        $xml_tree = new DOMDocument();
        $xml_tree->loadXML($encryptMsg);
        $array_e = $xml_tree->getElementsByTagName('Encrypt');
        // $array_s = $xml_tree->getElementsByTagName('MsgSignature');
        $encrypt = $array_e->item(0)->nodeValue;
        // $msg_sign = $array_s->item(0)->nodeValue;
        $format = "<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>";
        $from_xml = sprintf($format, $encrypt);
        $timeStamp = $_GET['timestamp'];
        $nonce = $_GET['nonce'];
        $msg_sign = $_GET['msg_signature'];
        // 第三方收到公众号平台发送的消息
        $msg = '';
        $errCode = $this->pc->decryptMsg($msg_sign, $timeStamp, $nonce, $from_xml, $msg);
        if ($errCode == 0) {
            //        print("解密后: " . $msg . "\n");
            return $msg;
        } else {
            return false;
            
            //            print($errCode . "\n");
            
        }
    }
    
    /**
     * 获取微信推送的数据
     * @return array 转换为数组后的数据
     */
    public function request() {
        return $this->data;
    }
    
    /**
     * * 响应微信发送的信息（自动回复）
     * @param  string $to      接收用户名
     * @param  string $from    发送者用户名
     * @param  array  $content 回复信息，文本信息为string类型
     * @param  string $type    消息类型
     * @param  string $flag    是否新标刚接受到的信息
     * @return string          XML字符串
     */
    public function response($content, $type = 'text', $flag = 0) {
        
        /* 基础数据 */
        $this->data = array('ToUserName' => $this->data['FromUserName'], 'FromUserName' => $this->data['ToUserName'], 'CreateTime' => NOW_TIME, 'MsgType' => $type,);
        
        /* 添加类型数据 */
        $this->$type($content);
        
        /* 添加状态 */
        $this->data['FuncFlag'] = $flag;
        
        /* 转换数据为XML */
        $xml = new SimpleXMLElement('<xml></xml>');
        $this->data2xml($xml, $this->data);
        $encryptXML = $xml->asXML();
        exit($this->encryptMsg($encryptXML));
    }
    
    /**
     * 回复文本信息
     * @param  string $content 要回复的信息
     */
    private function text($content) {
        $this->data['Content'] = $content;
    }
    
    /**
     * 回复音乐信息
     * @param  string $content 要回复的音乐
     */
    private function music($music) {
        
        list($music['Title'], $music['Description'], $music['MusicUrl'], $music['HQMusicUrl']) = $music;
        $this->data['Music'] = $music;
    }
    
    /**
     * 回复图文信息
     * @param  string $news 要回复的图文内容 数组
     */
    private function news($news) {
        
        // addWeixinLog($news,"news ");
        $articles = array();
        foreach ($news as $key => $value) {
            list($articles[$key]['Title'], $articles[$key]['Description'], $articles[$key]['PicUrl'], $articles[$key]['Url']) = $value;
            
            if ($key >= 9) {
                break;
            }
            
            //最多只允许10条新闻
            
            
        }
        
        $this->data['ArticleCount'] = count($articles);
        $this->data['Articles'] = $articles;
    }
    private function transfer_customer_service($content) {
        $this->data['Content'] = '';
    }
    
    private function data2xml($xml, $data, $item = 'item') {
        foreach ($data as $key => $value) {
            
            /* 指定默认的数字key */
            is_numeric($key) && $key = $item;
            
            /* 添加子元素 */
            if (is_array($value) || is_object($value)) {
                $child = $xml->addChild($key);
                $this->data2xml($child, $value, $item);
            } else {
                if (is_numeric($value)) {
                    $child = $xml->addChild($key, $value);
                } else {
                    $child = $xml->addChild($key);
                    $node = dom_import_simplexml($child);
                    $node->appendChild($node->ownerDocument->createCDATASection($value));
                }
            }
        }
    }
    
    private function auth($token) {
        
        // $signature = $_GET["signature"];
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        
        $tmpArr = array(md5($token), $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        addWeixinLog('signature'.$signature,'auth');
        addWeixinLog('timestamp'.$timestamp,'auth');
        addWeixinLog('nonce'.$signature,'nonce');

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
        return true;
    }
    
}
