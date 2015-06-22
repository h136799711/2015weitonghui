<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" type="text/css" href="/Public/Wap/car/css/reset.css" media="all" />
<link rel="stylesheet" type="text/css" href="/Public/Wap/car/css/common.css" media="all" />

<title>实用工具</title>
        <style>
            img{width:100%!important;}
        </style>
    </head>
    <body onselectstart="return true;" ondragstart="return false;">
        <!--script type="text/javascript">/*<![CDATA[*/var isTablet = false;/*]]>*/</script-->
<body class="portrait">
    <div class="header">
        <div class="logo">
            <img src="/Public/Wap/car/tool-box-preferences.png" width="120" height="100" alt="" style="width:auto!important;max-width:250px;"/>
        </div>
        <div style="clear: both;"></div>
    </div>
    <span class="gradient_h_wbw"></span>
    <div class="top">
        <div id="roundabout_container" class="relative">

        </div>
        <span class="gradient_h_wbw"></span>

    </div>
        <div class="main" style="padding-top: 10px;">
            <ul class="list_ul_common">
                                <li>
                    <a href="http://car.m.yiche.com/qichedaikuanjisuanqi/">
                        <div>
                            <p>车贷计算器</p>
                        </div>
                    </a>
                </li>
                                                <li>
                    <a href="http://car.m.yiche.com/qichebaoxianjisuan/">
                        <div>
                            <p>保险计算</p>
                        </div>
                    </a>
                </li>
                                                <li>
                    <a href="http://car.m.yiche.com/gouchejisuanqi/">
                        <div>
                            <p>全款计算</p>
                        </div>
                    </a>
                </li>
                                                <li>
                    <a href="http://car.m.yiche.com/chexingduibi/?carIDs=102501">
                        <div>
                            <p>车型比较</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="http://www.shjtaq.com/zwfg/dzjc_new.asp">
                        <div>
                            <p>违章查询</p>
                        </div>
                    </a>
                </li>
                </ul> 
        </div>
       
        <!--  <footer class="nav_footer">
                <ul class="box">
                    <li><a href="javascript:history.go(-1);" >返回</a></li>
                    <li><a href="javascript:history.go(1);" >前进</a></li>
                    <li><a href="<?php echo U('Index/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>" >首页</a></li>
                    <li><a href="javascript:location.reload();" >刷新</a></li>
                </ul>
</footer> -->

    <span class="copyright" >
    <?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
    <?php else: ?>
    <?php echo ($siteCopyright); endif; ?>
    </span>
<!-- <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<?php if($radiogroup > 8): ?><br>
<br><?php endif; ?>
<script>
function displayit(n){
	for(i=0;i<4;i++){
		if(i==n){
			var id='menu_list'+n;
			if(document.getElementById(id).style.display=='none'){
				document.getElementById(id).style.display='';
				document.getElementById("plug-wrap").style.display='';
			}else{
				document.getElementById(id).style.display='none';
				document.getElementById("plug-wrap").style.display='none';
			}
		}else{
			if($('#menu_list'+i)){
				$('#menu_list'+i).css('display','none');
			}
		}
	}
}
function closeall(){
	var count = document.getElementById("top_menu").getElementsByTagName("ul").length;
	for(i=0;i<count;i++){
		document.getElementById("top_menu").getElementsByTagName("ul").item(i).style.display='none';
	}
	document.getElementById("plug-wrap").style.display='none';
}

document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
</script>   -->
<script type="text/javascript">
window.shareData = {
            "moduleName":"Car",
            "moduleID":"11",
            "imgUrl": "",
            "sendFriendLink": "<?php echo C('site_url'); echo U('Car/index',array('token'=>$token));?>",
            "tTitle": "微汽车",
            "tContent": "微汽车"
        };
</script>
<?php echo ($shareScript); ?>
    </body>             <div mark="stat_code" style="width:0px; height:0px; display:none;">
                    </div>
    </body>
</html>