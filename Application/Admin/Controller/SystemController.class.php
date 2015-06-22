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

class SystemController extends AdminController{
    public $server_url;
    public $key;
    public $topdomain;
    public $dirtype;
    public function _initialize(){
        parent :: _initialize();
        
    }
    public function index(){
        $where['display'] = 1;
        $where['status'] = 1;
        $order['sort'] = 'asc';
        $nav = M('node') -> where($where) -> order($order) -> select();
        $this -> assign('nav', $nav);
        $this -> display();
    }
    public function menu(){
        if(empty($_GET['pid'])){
            $where['display'] = 2;
            $where['status'] = 1;
            $where['pid'] = 2;
            $where['level'] = 2;
            $order['sort'] = 'asc';
            $nav = M('node') -> where($where) -> order($order) -> select();
            $this -> assign('nav', $nav);
        }
        $this -> display();
    }
    
    public function main(){
        $this -> display();
    }
   
    function curlGet($url){
        $ch = curl_init();
        $header = "Accept-Charset: utf-8";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $temp = curl_exec($ch);
        return $temp;
    }
    function getTopDomain(){
        $host = $_SERVER['HTTP_HOST'];
        $host = strtolower($host);
        if(strpos($host, '/') !== false){
            $parse = @parse_url($host);
            $host = $parse['host'];
        }
        $topleveldomaindb = array('com', 'edu', 'gov', 'int', 'mil', 'net', 'org', 'biz', 'info', 'pro', 'name', 'museum', 'coop', 'aero', 'xxx', 'idv', 'mobi', 'cc', 'me');
        $str = '';
        foreach($topleveldomaindb as $v){
            $str .= ($str ? '|' : '') . $v;
        }
        $matchstr = "[^\.]+\.(?:(" . $str . ")|\w{2}|((" . $str . ")\.\w{2}))$";
        if(preg_match("/" . $matchstr . "/ies", $host, $matchs)){
            $domain = $matchs['0'];
        }else{
            $domain = $host;
        }
        return $domain;
    }
}
function recurse_copy($src, $dst){
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ($file = readdir($dir))){
        if (($file != '.') && ($file != '..')){
            if (is_dir($src . '/' . $file)){
                recurse_copy($src . '/' . $file, $dst . '/' . $file);
            }else{
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}
function deletedir($dirname){
    $result = false;
    if(! is_dir($dirname)){
        echo " $dirname is not a dir!";
        exit(0);
    }
    $handle = opendir($dirname);
    while(($file = readdir($handle)) !== false){
        if($file != '.' && $file != '..'){
            $dir = $dirname . DIRECTORY_SEPARATOR . $file;
            is_dir($dir) ? deletedir($dir) : unlink($dir);
        }
    }
    closedir($handle);
    $result = rmdir($dirname) ? true : false;
    return $result;
}
function gooraye_getcontents($url){
    if (function_exists('curl_init')){
        $ch = curl_init();
        $header = "Accept-Charset: utf-8";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $temp = curl_exec($ch);
        $errorno = curl_errno($ch);
        if ($errorno){
            exit('curl发生错误：错误代码' . $errorno . '，如果错误代码是6，您的服务器可能无法连接我们升级服务器');
        }else{
            return $temp;
        }
    }else{
        $str = file_get_contents($url);
        return $str;
    }
}
?>