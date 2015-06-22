<?php
return array(   
	/* 模板相关配置 */
	    'TMPL_PARSE_STRING' => array(
	        '__STATIC__' => __ROOT__ . '/Public/static',
	        '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
	        '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
	        '__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
	   ),
	'DEFAULT_THEME'=>'gooraye',
	'URL_ROUTER_ON'   		=> true, 			//开启路由
	'URL_ROUTE_RULES' 		=> array( 			//定义路由规则
		'api/:token'        => 'Home/WxProxy/index',
		'show/:token'        => 'Home/Adma/index',
		'print'=>'Home/Printer/index'
	),
	
);