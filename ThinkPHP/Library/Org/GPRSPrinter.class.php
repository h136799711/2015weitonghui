<?php
// .-----------------------------------------------------------------------------------
// | 
// | 
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

//HTTP形式
class GPRSPrinter {
    
    private static $_instance;
    
    private $time;
    private $content = "";
    private $setting = "";
    private $id = "";
    
    public $params = array();
    
    private function __construct() {
        $this->getParams();        
        $this->time = date('Y-m-d H:i:s');
    }
    
    private function __clone() {}  //覆盖__clone()方法，禁止克隆    
    
    public static function getInstance()    
    {   
        if(! (self::$_instance instanceof self) ) {    
            self::$_instance = new self();    
        }    
        
        /*
         * 验证是否为正常连接
         */
        /*
        if (!isset(self::$_instance->params['usr'])
                && !isset(self::$_instance->params['sgn'])
                && md5(self::$_instance->params['usr']) != self::$_instance->params['sgn'])
        {
            return false;
        }
        */
        return self::$_instance;    
    }    
    /*
     * 打印终端请求平台下发数据
     * 
     */
    /**
      **----------------------------------------------------------
     * 设置时间 时间不能小于2013-08-01 00:00:00 同时 时间不能于大于2030-08-01 00:00:00
      *----------------------------------------------------------
     * @param string $timestamp 时间戳
      *----------------------------------------------------------
     */
    public function setTime( $timestamp )
    {
        if ($timestamp > 1375315200 && $timestamp < 1911772800) {
            $this->time = date('Y-m-d H:i:s', $timestamp);
        }
        return $this;
    }
    
    
    /**
      *----------------------------------------------------------
     * 写入内容
      *----------------------------------------------------------
     * @param string $content 内容
      *----------------------------------------------------------
     */
    public function setContent( $content )
    {
        $this->content = strip_tags($content);
        return $this;
    }

    /**
      *----------------------------------------------------------
     * 设置打印机参数
      *----------------------------------------------------------
     * @param array $setting 设置 key(响应码) => value(内容)
      *----------------------------------------------------------
     */
    public function setSetting( $setting )  
    {
        if (!empty($setting) && is_array($setting)) {
            $this->setting = "";
            foreach ($setting as $k => $v) {
                if (is_numeric($k)) 
                {
                    $this->setting .= $k.":".strip_tags($v)."|";
                }
            }
        }
        else
        {
            $this->setting = strip_tags($setting);
        }
        return $this;
    }

    /**
      *----------------------------------------------------------
     * 设置ID
      *----------------------------------------------------------
     * @param string $id id SYD123456789
      *----------------------------------------------------------
     */
    public function setId( $id )  
    {
        $this->id = strip_tags($id);        
        return $this;
    }
    
    
    /**
      *----------------------------------------------------------
     * 传输内容是否大于最大内容长度 不能多于2000字节
      *----------------------------------------------------------
     * @return boolean  
      *----------------------------------------------------------
     */
    public function maxLength($str, $length = 2000)
    {
        if (mb_strlen($str) > 2000) 
        {
            return false;
        }
        return true;
    }

    /**
      *----------------------------------------------------------
     * 生成传输用XML 不能多于2000字节
      *----------------------------------------------------------
     * @return string xml 
      *----------------------------------------------------------
     */
    public function display() 
    {
        
        $xml = '<?xml version="1.0" encoding="GBK"?>';
        $xml .= "<r>";
        
        $xml .= "<id>".$this->id."</id>";
        $xml .= "<time>".$this->time."</time>";
        $xml .= "<content>".$this->content."</content>";
        $xml .= "<setting>".$this->setting."</setting>";
        
        $xml .= "</r>";
        
        $xml = iconv("UTF-8","GB2312//IGNORE",$xml);
        if ($this->maxLength($xml)) {
			header("Content-type: text/xml");
				 
            return $xml;
        }
        return false;
    }
    
    
     /**
      *----------------------------------------------------------
     * 解析返回参数
      *----------------------------------------------------------
     * @return array  
      *----------------------------------------------------------
     */
    public function getParams() 
    {
        $arr = array();
        
        if (isset($_REQUEST['usr'])) $arr['usr'] = $_REQUEST['usr']; // 用户IMEI号码
        if (isset($_REQUEST['ord'])) $arr['ord'] = $_REQUEST['ord']; // 本次交易的序列号，不得重复
        if (isset($_REQUEST['sgn'])) $arr['sgn'] = $_REQUEST['sgn']; // 交易签名。 MD5(usr)转大写
        
        if (isset($_REQUEST['id'])) $arr['id'] = $_REQUEST['id']; // 平台下发打印数据的ID号
        if (isset($_REQUEST['sta'])) $arr['sta'] = $_REQUEST['sta']; // 打印机状态（0为打印成功， 1为过热，3为缺纸卡纸等）
        
        $this->params = $arr;
        
        return $arr;
    }


}