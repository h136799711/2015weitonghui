<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo ($tpl['wxname']); ?></title>
<base href="." />
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css" href="/Public/Wap/css/yuesh/iscroll.css" />
  <link rel="stylesheet" type="text/css" href="/Public/Wap/css/template/snower.css" media="all" />
<link rel="stylesheet" type="text/css" href="/Public/Wap/css/template/common.css" media="all" />
<link rel="stylesheet" type="text/css" href="/Public/Wap/css/template/reset.css" media="all" />
<link rel="stylesheet" type="text/css" href="/Public/Wap/css/template/home-32.css" media="all" />
<script type="text/javascript" src="/Public/Wap/src/template/maivl.js"></script>
<script type="text/javascript" src="/Public/Wap/src/jQuery.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Wap/css/template/music-left.css" media="all" />
<script src="/Public/Wap/css/1137/iscroll.js" type="text/javascript"></script>
<script src="/Public/Wap/js/yuesh/iscroll.js" type="text/javascript"></script>
        <script type="text/javascript">
            var myScroll;
            function loaded() {
                myScroll = new iScroll('wrapper', {
                    snap: true,
                    momentum: false,
                    hScrollbar: false,
                    onScrollEnd: function () {
                        document.querySelector('#indicator > li.active').className = '';
                        document.querySelector('#indicator > li:nth-child(' + (this.currPageX+1) + ')').className = 'active';
                    }
                });
 
            }
            document.addEventListener('DOMContentLoaded', loaded, false);
        </script>

<style type="text/css">
body{
	background-color:black;
}

#cate8 .wz08menu {
	display: block;
	margin: 0;
	padding: 2px;
}

#cate8 .wz08menu li {
	width: 25%;
	float: left;
	overflow: hidden;
	border-radius: 0px;
}

#cate8 .wz08menu li .wz08btn {
	text-decoration: none;
	color: #000;
	overflow: hidden;
	border-radius: 5px;
	margin: 2px;
	background-color: rgba(255, 255, 255, 0.31);
	box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.15);
	-moz-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.15);
	-webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.15);
}

#cate8 .wz08menu li a {
	padding: 0px;
	font-size: 14px;
	color: #000000;
	text-decoration: none;
	-moz-user-select: none;
	-webkit-user-select: none;
	-ms-user-select: none;
}

#cate8 .wz08menu li .wz08btn .wz08img {
	overflow: hidden;
	position: relative;
}

#cate8 .wz08menu li div img {
	border: 0;
	width: 100%;
	margin: 0;
	padding: 0;
	border-radius: 0px;
}

#cate8 .wz08menu li .menutitle {
	text-align: center;
	text-decoration: none;
	color: #A48257;
	font-size: 0.7em;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
	position: absolute;
	bottom: 5px;
	width: 100%;
	display: block;
}

#cate8 .wz08menu li:nth-child(1) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(6) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(7) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(8) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(13) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(14) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(15) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(20) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(21) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(22) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(27) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(28) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(29) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(34) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(35) {
    width: 49.9%;
}
#cate8 .wz08menu li:nth-child(36) {
    width: 49.9%;
}
html,body {
	color: #ffffff;
	font-family: Microsoft YaHei, Helvitica, Verdana, Tohoma, Arial,
		san-serif;
	margin: 0;
	padding: 0;
	text-decoration: none;
}

* {
	margin: 0;
	padding: 0;
}

li {
	list-style-type: none;
}

a{
	text-decoration:none;
}
</style>

  <style>
#iframe_screen{
    background:#fff;
    position:absolute;
    width:100%;
    height:100%;
    left:0;
    top:0;
    z-index:300000;
    overflow:hidden;
}
</style>
<?php echo ($zhidacode); ?></head>
<body>
<?php if($dh['animation'] != false): ?><!-- <iframe id="iframe_screen" src="Index_an<?php echo ($dh["animation"]); ?>.html" frameborder="0"></iframe> --><?php endif; ?> <?php if($homeInfo['musicurl'] != false): ?><style>
.btn_music {
display: inline-block;
width: 35px;
height: 35px;
background: url('/Public/Wap/images/play.png') no-repeat center center;
background-size: 100% auto;
position: absolute;
z-index: 100;
left: 15px;
top: 20px;
}
.btn_music.on {
    background-image: url("/Public/Wap/images/stop.png");
}

</style>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<script>

var playbox = (function(){
	//author:eric_wu
	var _playbox = function(){
		var that = this;
		that.box = null;
		that.player = null;
		that.src = null;
		that.on = false;
		//
		that.autoPlayFix = {
			on: true,
			//evtName: ("ontouchstart" in window)?"touchend":"click"
			evtName: ("ontouchstart" in window)?"touchstart":"mouseover"
			
		}

	}
	_playbox.prototype = {
		init: function(box_ele){
			this.box = "string" === typeof(box_ele)?document.getElementById(box_ele):box_ele;
			this.player = this.box.querySelectorAll("audio")[0];
			this.src = this.player.src;
			this.init = function(){return this;}
			this.autoPlayEvt(true);
			return this;
		},
		play: function(){
			if(this.autoPlayFix.on){
				this.autoPlayFix.on = false;
				this.autoPlayEvt(false);
			}
			this.on = !this.on;
			if(true == this.on){
				this.player.src = this.src;
				this.player.play();
			}else{
				this.player.pause();
				this.player.src = null;
			}
			if("function" == typeof(this.play_fn)){
				this.play_fn.call(this);
			}
		},
		handleEvent: function(evt){
			this.play();
		},
		autoPlayEvt: function(important){
			if(important || this.autoPlayFix.on){
				document.body.addEventListener(this.autoPlayFix.evtName, this, false);
			}else{
				document.body.removeEventListener(this.autoPlayFix.evtName, this, false);
			}
		}
	}
	//
	return new _playbox();
})();

playbox.play_fn = function(){
	this.box.className = this.on?"btn_music on":"btn_music";
}
</script>

<script type="text/javascript">
$(document).ready(function(){
	playbox.init("playbox");
	/*
	setTimeout(function() {
		// IE
		if(document.all) {
			document.getElementById("playbox").click();
		}
		// 其它浏览器
		else {
			var e = document.createEvent("MouseEvents");
			e.initEvent("click", true, true);
			document.getElementById("playbox").dispatchEvent(e);
		}
	}, 2000);
	*/
});

</script>

<span id="playbox" class="btn_music" onclick="playbox.init(this).play();"><audio id="audio" loop src="<?php echo ($homeInfo["musicurl"]); ?>"></audio></span><?php endif; ?>
	<div class="banner">
		<div id="wrapper">
			<div id="scroller">
				<ul id="thelist"> 
				<?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li><p><?php echo ($so["info"]); ?></p><a href="<?php echo ($so["url"]); ?>"><img src="<?php echo ($so["img"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		<div id="nav">
			<div id="prev" onclick="myScroll.scrollToPage('prev', 0,400,3);return false">&larr; prev</div>
			<ul id="indicator">
			<?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li   <?php if($i == 1): ?>class="active"<?php endif; ?>  ><?php echo ($i); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<div id="next" onclick="myScroll.scrollToPage('next', 0);return false">next &rarr;</div>
		</div>
		<div class="clr"></div>
	</div>
	<div id="insert1"></div>
	<!--播放器开始-->	
				<script type="text/javascript" src="/Public/Wap/js/heka/audio.js"></script>
				<script>
			window.addEventListener("DOMContentLoaded", function(){
				playbox.init("playbox");
			}, false);
		</script>
				<?php if($homeInfo["musicurl"] != false): ?><span id="playbox" class="btn_music" onclick="playbox.init(this).play();"><audio src="<?php echo ($homeInfo["musicurl"]); ?>" loop id="audio"></audio></span><?php else: endif; ?>	
        		<!--播放器结束-->
	<script>


            var count = document.getElementById("thelist").getElementsByTagName("img").length;	


            for(i=0;i<count;i++){
                document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";

            }

            document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";


            setInterval(function(){
                myScroll.scrollToPage('next', 0,400,count);
            },3500 );

            window.onresize = function(){ 
                for(i=0;i<count;i++){
                    document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";

                }

                document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";
            } 

	</script>
	<div id="insert2"></div>
	<div style="display:none"> </div>
	<div style="display:none"><script language="javascript" type="text/javascript" src=""></script></div>


<div id="cate8">
		<ul class="wz08menu">
		<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
				<div class="wz08btn">
					<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo ($vo["url"]); endif; ?>">
						<div class="wz08img">
							<img src="<?php echo ($vo["img"]); ?>" />
						</div>
					</a>
				</div>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
	</div>

	<div class="copyright" style="text-align:center; >
<?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
<?php else: ?>
<?php echo ($siteCopyright); endif; ?>
</div>
</div>              
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
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
</script>  
	<?php if($kefuonline["info"] != false): echo ($kefuonline["info"]); endif; ?> 
	<?php if(ACTION_NAME == 'index'): ?><script type="text/javascript">
			window.shareData = {  
					"moduleName":"Index",
					"moduleID": '0',
					"imgUrl": "<?php echo ($homeInfo["picurl"]); ?>", 
					"timeLineLink": "<?php echo C('site_url'); echo U(Index/ACTION_NAME,array('token'=>$_GET['token']));?>",
					"sendFriendLink": "<?php echo C('site_url'); echo U(Index/ACTION_NAME,array('token'=>$_GET['token']));?>",
					"weiboLink": "<?php echo C('site_url'); echo U(Index/ACTION_NAME,array('token'=>$_GET['token']));?>",
					"tTitle": "<?php echo ($homeInfo["title"]); ?>",
					"tContent": "<?php echo ($homeInfo["title"]); ?>"
				};
		</script>
	<?php else: ?>
		<script type="text/javascript">
			window.shareData = {  
				"moduleName":"Index",
				"moduleID": '1',
				"imgUrl": "<?php echo ($homeInfo["picurl"]); ?>", 
				"timeLineLink": "<?php echo C('site_url'); echo U(Index/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']));?>",
				"sendFriendLink": "<?php echo C('site_url'); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']));?>",
				"weiboLink": "<?php echo C('site_url'); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']));?>",
				"tTitle": "<?php echo ($homeInfo["title"]); ?>",
				"tContent": "<?php echo ($homeInfo["title"]); ?>"
			};
		</script><?php endif; ?>
<?php echo ($shareScript); ?>
</body>

<script type="text/javascript">
window.onload = function(){
	$(".wz08menu img").each(function(){
		$(this).height($(this).width());
	  });
};
</script>
</html>