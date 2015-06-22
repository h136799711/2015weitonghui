<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo ($tpl["wxname"]); ?></title>
		<base href="." />
		<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;"
		/>
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<meta name="format-detection" content="telephone=no" />
		<link href="./Public/Wap/css/109/iscroll.css" rel="stylesheet"
		type="text/css" />
		<link href="./Public/Wap/css/allcss/cate15_2.css" rel="stylesheet"
		type="text/css" />
		<!-- <link rel="stylesheet" type="text/css" href="./Public/Wap/css/114/iscroll.css"
		media="all"> -->
		<script type="text/javascript" src="./Public/Wap/css/114/iscroll.js">
		</script>
		<style>
			#cate14 .mainmenu li:last-of-type { margin-bottom: 0; } #cate14 .mainmenu
			{ margin: 50px auto;/*可修改菜单距离顶部的高度*/ bottom: auto; top:0; }
		</style>
		<!--背景音乐start-->
		<script src="/Public/Wap/js/audio.js" type="text/javascript">
		</script>
		<script type="text/javascript">
			// 两秒后模拟点击
			setTimeout(function() {
				// IE
				if (document.all) {
					document.getElementById("playbox").click();
				}
				// 其它浏览器
				else {
					var e = document.createEvent("MouseEvents");
					e.initEvent("click", true, true);
					document.getElementById("playbox").dispatchEvent(e);
				}
			},
			2000);
		</script>
		<script type="text/javascript">
			var myScroll;

			function loaded() {
				myScroll = new iScroll('wrapper', {
					snap: true,
					momentum: false,
					hScrollbar: false,
					onScrollEnd: function() {
						document.querySelector('#indicator > li.active').className = '';
						document.querySelector('#indicator > li:nth-child(' + (this.currPageX + 1) + ')').className = 'active';
					}
				});

			}

			document.addEventListener('DOMContentLoaded', loaded, false);
		</script>
	<?php echo ($zhidacode); ?></head>
	<body id="cate14">
		<!--music-->
		<?php if($homeInfo['musicurl'] != false): ?><style>
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
<div id="wrapper" style="overflow: hidden;">
<div id="scroller" style="width: <?php echo ($num*1366); ?>px; -webkit-transition: 0ms; transition: 0ms; -webkit-transform: translate3d(-382.48px, 0px, 0px) scale(1);">
<ul id="thelist">
    <?php if(is_array($flashbg)): $i = 0; $__LIST__ = $flashbg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li><p><?php echo ($so["info"]); ?></p><img src="<?php echo ($so["img"]); ?>" style="width: 1366px;"></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
</div>
<div id="nav">
<div id="prev" onclick="myScroll.scrollToPage(&#39;prev&#39;, 0,400,3);return false">← prev</div>
<ul id="indicator">
            
<?php if(is_array($flashbg)): $i = 0; $__LIST__ = $flashbg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li <?php if($i == 1): ?>class="active"<?php endif; ?> ></li><?php endforeach; endif; else: echo "" ;endif; ?>
 
</ul>
<div id="next" onclick="myScroll.scrollToPage(&#39;next&#39;, 0,400,3);return false">next →</div>
</div>
    <div class="clr"></div>
</div>
		<div class="mainmenu">
			<ul>
				<div id="insert1">
				</div>
				<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<div class="menubtn">
						<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
							<?php echo ($vo["name"]); ?>
						</a>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
				<div id="insert2">
				</div>
				<div class="clr">
				</div>
			</ul>
		</div>
		<script>
			var count = document.getElementById("thelist").getElementsByTagName("img").length;

			var count2 = document.getElementsByClassName("menuimg").length;
			for (i = 0; i < count; i++) {
				document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:" + document.body.clientWidth + "px";

			}
			document.getElementById("scroller").style.cssText = " width:" + document.body.clientWidth * count + "px";

			setInterval(function() {
				myScroll.scrollToPage('next', 0, 400, count);
			},
			3500);
			window.onresize = function() {
				for (i = 0; i < count; i++) {
					document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:" + document.body.clientWidth + "px";

				}
				document.getElementById("scroller").style.cssText = " width:" + document.body.clientWidth * count + "px";
			}
		</script>
		<div class="copyright">
<?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
<?php else: ?>
<?php echo ($siteCopyright); endif; ?>
</div>  <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
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
<!-- share -->

  </body>
</html>