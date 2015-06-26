<?php
/**
 *项目公共配置
 **/
return array(
	
	'LOAD_EXT_CONFIG' 		=> 'db,info,email,safe,upfile,cache,app,tags',		
		/*Cookie配置*/
	'COOKIE_PATH'           => '/',     		// Cookie路径
    	'COOKIE_PREFIX'         => '',      		// Cookie前缀 避免冲突
	/*定义模版标签*/
	'TMPL_L_DELIM'          =>  '{gr-',            // 模板引擎普通标签开始标记
    	'TMPL_R_DELIM'          =>  '}',            // 模板引擎普通标签结束标记

	'URL_MODEL' 			=>	1,					//URL访问模式
	// 'URL_PATHINFO_DEPR'		=> '/',
	// 'URL_HTML_SUFFIX'		=>'',			//伪静态后缀
	
	'SESSION_PREFIX'  => 'weitonghui_',
	
	'SHOW_RUN_TIME'=>true,
);
?>