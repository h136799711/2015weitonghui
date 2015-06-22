<?php
return array(

	/* 模板相关配置 */
	'TMPL_PARSE_STRING' => array(
		'__STATIC__' => __ROOT__ . '/Public/static', 
		'__IMG__' => __ROOT__ . '/Public/' . MODULE_NAME . '/images', 
		'__CSS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/css', 
		'__JS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
	), 
	'DEFAULT_THEME' => 'gooraye',

	'URL_MODEL' 			=>	3,					//URL访问模式

	'ALLOWIP'=> array('111.1.89.110', '127.0.0.1')
);
