<?php
return array(
	//'配置项'=>'配置值'
	/* 模板相关配置 */
	    'TMPL_PARSE_STRING' => array(
	        '__STATIC__' => __ROOT__ . '/Public/static',
	        '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
	        '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
	        '__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
	   ),
	'DEFAULT_THEME'=>'gooraye',

	//微信服务号APPID
	'WX_SITEURL'=>'http://new.weitonghui.com/',
	'WX_APPID'=>'wx58aea38c0796394d',
	'WX_APPSECRET'=>'3e1404c970566df55d7314ecfe9ff437',
	'WX_PAYURL'=>'http://new.weitonghui.com/index.php/Home/Weixin/unionpay',
	'WX_PAYNOTIFYURL'=>'http://new.weitonghui.com/litemall/index.php/App/Wxpay/notify',
);