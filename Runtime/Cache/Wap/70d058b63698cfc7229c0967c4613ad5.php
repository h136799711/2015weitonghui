<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" type="text/css" href="/Public/Wap/car/css/reset.css" media="all" />
<link rel="stylesheet" type="text/css" href="/Public/Wap/car/css/common.css"></script>
<script type="text/javascript" src="/Public/Wap/car/js/jQuery.js"></script>
<script type="text/javascript" src="/Public/Wap/car/js/jquery_easing.js"></script>
<script type="text/javascript" src="/Public/Wap/car/js/com_clanmo_gallery_min.js"></script>
<title>车主关怀</title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

        <style>
            img{width:100%!important;}
        </style>
    </head>
    <body onselectstart="return true;" ondragstart="return false;">
        <style>
.masklayer{display:none;}
.on {z-index: 1999;position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0,0,0,0.3);text-align: right;display:block;}
</style>
<body class="portrait">
    <div class="top">
        <div class="stage_container relative">
            <div class="ofh relative">
                    
                    <ul class="">
                        <li>
                            <img alt="" src="<?php echo ($owner['head_url']); ?>" style="width:100%;max-height:480px;"/>
                        </li>
                    </ul>
                    <ol style="position:absolute;line-height:25px;bottom:0;z-index:10;width:100%;background:rgba(0,0,0,0.2);padding:5px 10px;color:#fff;">
                        <p><?php echo ($owner['title']); ?></p>
                    </ol>
                                    </div>
            </div>
        </div>
    </div>
        <div class="main" style="padding-top: 10px;">
            <ul class="car_detail">
            <div style="background: -webkit-gradient(linear, 0 0, 0 100%, from(#fff), to(#fff));padding: 5px;">
                  
                       <?php echo (trim(html_entity_decode($owner['info']))); ?>   
                </div>
                <div style="margin:5px;border: 1px solid #ccc;line-height:35px;text-indent:10px;border-radius:5px;background: -webkit-gradient(linear, 0 0, 0 100%, from(#fff), to(#eee));-webkit-box-shadow: 0 1px 1px #fff;">
                    <a href="<?php echo U('Car/changeCarinfo',array('token'=>$token,'wecha_id'=>$wecha_id,'addtype'=>'changeCar'));?>" style="color:#666;display:block;text-align:center;">修改(查看)您的爱车信息</a>
                </div>
                <div>
                    <ul class="list3">
                        <li>
                            <div>
                                <p>保养公里</p>
                                <p><img src="/Public/Wap/car/images/ok-day.jpg" /></p>
                                <p><?php echo ($user['care_next_mileage']); ?>公里</p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>保险到期</p>
                                <p><img src="/Public/Wap/car/images/ok-next.jpg" /></p>
                                <p><?php echo ($user['next_insurance_Date']); ?></p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>下次年检</p>
                                <p><img src="/Public/Wap/car/images/ok-360.png" /></p>
                                <p><?php echo ($user['next_care_inspection']); ?></p>
                            </div>
                        </li>
                    </ul>
                </div>
                                <li class="box group_btn">
                    <div><a href="<?php echo U('Car/salers',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="gray">联系销售</a></div>
                    <div><a href="<?php echo U('Car/CarReserveBook',array('token'=>$token,'wecha_id'=>$wecha_id,'sid'=>$vo['id'],'addtype'=>'maintain'));?>" class="gray">预约保养</a></div>
                </li>
            </ul>
        </div>
        <p><br><br><br><br></p>
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
    </body>
</html>