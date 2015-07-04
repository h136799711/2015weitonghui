<?php

//if (ini_get('magic_quotes_gpc')) {
//    function stripslashesRecursive(array $array) {
//        foreach ($array as $k => $v) {
//            if (is_string($v)) {
//                $array[$k] = stripslashes($v);
//            } else if (is_array($v)) {
//                $array[$k] = stripslashesRecursive($v);
//            }
//        }
//        return $array;
//    }
//    $_GET = stripslashesRecursive($_GET);
//    $_POST = stripslashesRecursive($_POST);
//}

// define('DIR_SECURE_FILENAME', 'index.html');
// define('DIR_SECURE_CONTENT', '禁止访问！GOORAYE.');
// define('BIND_MODULE','Admin');
//define("SITE_URL","http://localhost/github/2015weitonghui/litemall");
define("SITE_URL","http://new.weitonghui.com/litemall");
define('APP_DEBUG', true);

define('APP_PATH',  './Application/');

define('PROJECT_NAME', "2015weitonghui_litemall");
/**
 * 缓存目录设置
 * 此目录必须可写，建议移动到非WEB目录
 */
// 运行时文件
define("RUNTIME_PATH","../../../Runtime/".PROJECT_NAME."/");

// 框架目录
define("THINK_PATH",realpath("../../../thinkphp/weitonghui/").'/');
// 加载
require "../../../thinkphp/weitonghui/ThinkPHP.php";

//require '../ThinkPHP/ThinkPHP.php';

?>
