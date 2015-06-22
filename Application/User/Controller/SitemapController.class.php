<?php

// .-----------------------------------------------------------------------------------
// |
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace User\Controller;
use Think\Controller;

class SitemapController extends Controller
{
    
    public function testGrab() {
        $token = 'caspcu1403054302';
        $this->grab(C('site_url') . U('Wap/Index/index', array('token' => $token)));
    }
    
    //
    public function grab($url = '', $pattern = '/<a.*?href=\"(.*?)\"/i') {
        
        if (function_exists('file_get_contents')) {
            $file_contents = file_get_contents($url);
        } else {
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $file_contents = curl_exec($ch);
            curl_close($ch);
        }
        preg_match_all($pattern, $file_contents, $matches);
        if (count($matches) > 1) {
            
            // var_dump($matches[1]);
            return $matches[1];
        }
        
        return false;
    }
    
    public function index() {
        
        $token = I('get.token');
        $changefreq = I('get.freq');
        $sitemapURL = __ROOT__ . '/Public/Sitemap/' . $token . ".xml";
        header('Content-Type: text/xml');
        header("Pragma: no-cache");
        if ($this->needCreate($token)) {
            
            $indexURL = C('site_url') . U('Wap/Index/index', array('token' => $token));
            $aLinks = $this->grab($indexURL, '/<a.*?href=\"(.*?)\"/i');
            
            $data = array('0' => array('loc' => $indexURL,'lastmod'=>date('Y-m-d',time()), 'changefreq' => $changefreq, 'priority' => '1.0'));
            
            $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xml.= "<urlset>";
            if ($aLinks !== false) {
                for ($i = 0; $i < count($aLinks); $i++) {
                    $url = array('loc' => $aLinks[$i], 'changefreq' => $changefreq, 'priority' => '0.9');
                    if (strpos($aLinks[$i], 'http') !== 0) {
                        $url['loc'] = C('site_url') . $aLinks[$i];
                    }
                    array_push($data, $url);
                }
            }
            $xml.= data_to_xml($data, 'url', '');
            
            $xml.= "</urlset>";
            $serverPath = $_SERVER['DOCUMENT_ROOT'];;
            
            $this->saveToFile($serverPath . $sitemapURL, $xml);
        }
        
        // $this->downloadFile($serverPath . $sitemapURL);
        redirect($sitemapURL);
        // echo $xml;
        
    }
    
    /**
     *  [downloadFile 下载文件]
     *  @param  [type] $url [本地链接]
     *  @return [type]      [description]
     */
    private function downloadFile($url) {

        if (!file_exists($url)) {
             //判断文件是否存在
            echo "文件不存在";
            exit();
        }
        
        $file_size = filesize($url);
         //判断文件大小
        //返回的文件
        header("Content-type: application/octet-stream");
        
        //按照字节格式返回
        header("Accept-Ranges: bytes");
        
        //返回文件大小
        header("Accept-Length: " . $file_size);
        
        //弹出客户端对话框，对应的文件名
        // Header("Content-Disposition: attachment; filename=".$file_name);
        //防止服务器瞬时压力增大，分段读取
        $buffer = 1024;
        while (!feof($fp)) {
            $file_data = fread($fp, $buffer);
            echo $file_data;
        }
        
        //关闭文件
        fclose($fp);
    }
    
    /**
     *  [needCreate 是否需要重新创建sitemap]
     *  @param  [type] $token [description]
     *  @return [type]        [description]
     */
    private function needCreate($token, $sitemapURL) {
        if (is_file($sitemapURL)) {
            $filectime = filemtime($sitemapURL);
            if ($filectime - time() < 24 * 3600) {
                return false;
            }
        }
        return true;
    }
    
    /**
     *  [saveToFile 保存内容到文件]
     *  @param  [type] $filePath [文件完整路径]
     *  @param  [type] $xml      [description]
     *  @return [type]           [description]
     */
    private function saveToFile($filePath, $content) {
        
        // var_dump($filePath);
        $fp = fopen($filePath, 'w');
        fwrite($fp, $content);
        fclose($fp);
        return true;
    }
}
