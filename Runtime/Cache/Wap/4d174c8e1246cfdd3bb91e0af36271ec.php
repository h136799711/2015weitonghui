<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
<script type="text/javascript" src="/Public/Wap/car/js/jquery152_min.js"></script>
<title>销售管理</title>
        <style>
            img{width:100%!important;}
        </style>
    </head>
    <body onselectstart="return true;" ondragstart="return false;">

    <body onselectstart="return true;" ondragstart="return false;">
        <style>
            #book_new, #book_list{
                display:none;
            }
            #book_new.on, #book_list.on{
                display:inherit;
            }
            .list_book{
                border-radius:0;
                border:0;
                background:#f2f4f3;
            }
            .list_book dt{
                background:#fff;
                line-height: 35px;
                text-align:center;
            }
            .list_book dt div:first-of-type{
                margin-right:10px;
            }
            .list_book dt div a{
                display:block;
                height:100%;
                background:#777777;
                color:#fff;
            }
            .book_list {
                border:0!important;
            }
            #nav_contact{
                border:5px 5px 0 0;
                overflow: hidden;
            }
            #nav_contact a{
                color:#000;
                display:block;
                text-align:center;
            }
            #nav_contact div:first-of-type{
                margin-right:10px;
            }
            #nav_contact div{
                line-height:35px;
                border-radius:5px 5px 0 0;
                background:#f2f4f3;
                overflow:hidden;
            }
            #nav_contact div a.on{
                color:#fff;
                background-color:#777777;
            }
        </style>
        <div class="body">

            <section class="p_10">
                <nav id="nav_contact">
                    <dt class="box">
                        <!--div><a id="book_new_a" href="javascript:$('#book_list, #book_list_a, #book_new, #book_new_a').toggleClass('on');">售前客服</a></div-->
                        <div><a id="book_list_a" href="#" class="on">售前/售后客服</a></div>
                    </dt>
                </nav>
                <div id="book_new" class="on">
                    <dl class="list_book">
                        <ul class="list_contact">
                        <?php if(is_array($saler)): $i = 0; $__LIST__ = $saler;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="tbox">
                                <div><img src="<?php echo ($vo['picture']); ?>" style="width: 60px!important;" /></div>
                                <div>
                                    <p><?php echo ($vo['name']); ?></p> <p><a style="padding:1px;" href="tel:<?php echo ($vo['mobile']); ?>"><?php if($vo['salestype'] == 1): ?>售前 <?php elseif($vo['salestype'] == 2): ?>售后<?php else: ?>售前/售后<?php endif; ?></a></p>
                                    <div><?php echo (html_entity_decode($vo['info'])); ?></div>
                                    <p><a href="tel:<?php echo ($vo['mobile']); ?>"><?php echo ($vo['mobile']); ?></a></p>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </dl>
                </div>
                <div id="book_list">
                    <dl class="list_book">
                        <ul class="list_contact">
                            <?php if(is_array($saler)): $i = 0; $__LIST__ = $saler;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="tbox">
                                <div><img src="<?php echo ($vo['picture']); ?>" style="width: 60px!important;"/></div>
                                <div>
                                     <p><?php echo ($vo['name']); ?></p>
                                    <div><?php echo ($vo['info']); ?></div>
                                    <p><a href="tel:<?php echo ($vo['mobile']); ?>"><?php echo ($vo['mobile']); ?></a></p>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </dl>
                </div>

            </section>
            <p><br /><br /><br /><br /><br /><br /></p>

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
    </body>
                <div mark="stat_code" style="width:0px; height:0px; display:none;">
                    </div>
    </body>
</html>