<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo ($tpl["wxname"]); ?></title>
        <base href="." />
        <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="format-detection" content="telephone=no" />
<link href="/Public/Wap/css/allcss/cate<?php echo ($tpl["tpltypeid"]); ?>_<?php echo ($tpl["color_id"]); ?>.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="/Public/Wap/css/118/reset.css" media="all">
<link rel="stylesheet" type="text/css" href="/Public/Wap/css/118/font-awesome.css" media="all">
<!-- <link rel="stylesheet" type="text/css" href="/Public/Wap/css/118/home-47.css" media="all"> -->
<script type="text/javascript" src="/Public/Wap/css/116/jQuery.js"></script>
<script type="text/javascript" src="/Public/Wap/css/118/zepto.js"></script>
<script type="text/javascript" src="/Public/Wap/css/118/swipe.js"></script>

        
    <?php echo ($zhidacode); ?></head>
    <body onselectstart="return true;" ondragstart="return false;">
    <!--背景音乐-->
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
    
        <div class="body">
        <!--
    幻灯片管理
    -->
    <div style="-webkit-transform:translate3d(0,0,0);">
        <div id="banner_box" class="box_swipe" style="visibility: visible;">
            <ul style="list-style: none; width: 1350px; transition: 500ms; -webkit-transition: 500ms; -webkit-transform: translate3d(-900px, 0, 0);">
                <?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li style="width: 450px; display: table-cell; vertical-align: top;">
                                                    <a href="<?php if($so['url'] == ''): echo U('Wap/Index/flash',array('token'=>$so['token'])); else: echo (htmlspecialchars_decode($so["url"])); endif; ?>">
                                                                    <img src="<?php echo ($so["img"]); ?>"  style="width:100%;">
                                </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                   
                            </ul>
            <ol>
                                    <li class=""></li>
                                    <li class="on"></li>
                                    <li class=""></li>
                            </ol>
        </div>
    </div>
        <script>
        $(function(){
            new Swipe(document.getElementById('banner_box'), {
                speed:500,
                auto:3000,
                callback: function(){
                    var lis = $(this.element).next("ol").children();
                    lis.removeClass("on").eq(this.index).addClass("on");
                }
            });
        });
    </script>
 <section>
        <div>
            <ul class="list_ul">

                <li class="box"> 
					<?php if(is_array($info)): $i = 0; $__LIST__ = array_slice($info,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
							<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
							<dd>
								<div>
									<span ><img src="<?php echo ($vo["img"]); ?>" class="icon-smile" style="width:42px;height:42px;"></span>
								</div>
							</dd>
								<dt><?php echo ($vo["name"]); ?></dt>
							</a>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
	
                <li class="box"> 
					<?php if(is_array($info)): $i = 0; $__LIST__ = array_slice($info,3,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
							<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
							<dd>
								<div>
									<span ><img src="<?php echo ($vo["img"]); ?>" class="icon-smile" style="width:42px;height:42px;"></span>
								</div>
							</dd>
								<dt><?php echo ($vo["name"]); ?></dt>
							</a>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
	
                <li class="box"> 
					<?php if(is_array($info)): $i = 0; $__LIST__ = array_slice($info,5,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
							<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
							<dd>
								<div>
									<span ><img src="<?php echo ($vo["img"]); ?>" class="icon-smile" style="width:42px;height:42px;"></span>
								</div>
							</dd>
								<dt><?php echo ($vo["name"]); ?></dt>
							</a>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
	
                <li class="box"> 
					<?php if(is_array($info)): $i = 0; $__LIST__ = array_slice($info,8,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
							<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
							<dd>
								<div>
									<span ><img src="<?php echo ($vo["img"]); ?>" class="icon-smile" style="width:42px;height:42px;"></span>
								</div>
							</dd>
								<dt><?php echo ($vo["name"]); ?></dt>
							</a>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
                <li class="box"> 
					<?php if(is_array($info)): $i = 0; $__LIST__ = array_slice($info,10,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
							<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
							<dd>
								<div>
									<span ><img src="<?php echo ($vo["img"]); ?>" class="icon-smile" style="width:42px;height:42px;"></span>
								</div>
							</dd>
								<dt><?php echo ($vo["name"]); ?></dt>
							</a>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
	
                <li class="box"> 
					<?php if(is_array($info)): $i = 0; $__LIST__ = array_slice($info,13,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
							<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
							<dd>
								<div>
									<span ><img src="<?php echo ($vo["img"]); ?>" class="icon-smile" style="width:42px;height:42px;"></span>
								</div>
							</dd>
								<dt><?php echo ($vo["name"]); ?></dt>
							</a>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
	
                <li class="box"> 
					<?php if(is_array($info)): $i = 0; $__LIST__ = array_slice($info,15,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
							<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
							<dd>
								<div>
									<span ><img src="<?php echo ($vo["img"]); ?>" class="icon-smile" style="width:42px;height:42px;"></span>
								</div>
							</dd>
								<dt><?php echo ($vo["name"]); ?></dt>
							</a>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
	
                <li class="box"> 
					<?php if(is_array($info)): $i = 0; $__LIST__ = array_slice($info,18,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
							<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
							<dd>
								<div>
									<span ><img src="<?php echo ($vo["img"]); ?>" class="icon-smile" style="width:42px;height:42px;"></span>
								</div>
							</dd>
								<dt><?php echo ($vo["name"]); ?></dt>
							</a>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
                <li class="box"> 
					<?php if(is_array($info)): $i = 0; $__LIST__ = array_slice($info,20,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
							<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
							<dd>
								<div>
									<span ><img src="<?php echo ($vo["img"]); ?>" class="icon-smile" style="width:42px;height:42px;"></span>
								</div>
							</dd>
								<dt><?php echo ($vo["name"]); ?></dt>
							</a>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
	
                <li class="box"> 
					<?php if(is_array($info)): $i = 0; $__LIST__ = array_slice($info,23,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
							<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
							<dd>
								<div>
									<span ><img src="<?php echo ($vo["img"]); ?>" class="icon-smile" style="width:42px;height:42px;"></span>
								</div>
							</dd>
								<dt><?php echo ($vo["name"]); ?></dt>
							</a>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
	
                <li class="box"> 
					<?php if(is_array($info)): $i = 0; $__LIST__ = array_slice($info,25,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
							<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
							<dd>
								<div>
									<span ><img src="<?php echo ($vo["img"]); ?>" class="icon-smile" style="width:42px;height:42px;"></span>
								</div>
							</dd>
								<dt><?php echo ($vo["name"]); ?></dt>
							</a>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
	
                <li class="box"> 
					<?php if(is_array($info)): $i = 0; $__LIST__ = array_slice($info,28,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
							<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
							<dd>
								<div>
									<span ><img src="<?php echo ($vo["img"]); ?>" class="icon-smile" style="width:42px;height:42px;"></span>
								</div>
							</dd>
								<dt><?php echo ($vo["name"]); ?></dt>
							</a>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
	
				

                </ul>
        </div>
    </section>
   
<div class="copyright" style="text-align:center">
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
		<?php if(ACTION_NAME == 'index'): ?><script type="text/javascript">
			window.shareData = {  
					"moduleName":"Index",
					"moduleID": '10',
					"imgUrl": "<?php echo ($homeInfo["picurl"]); ?>", 
					"timeLineLink": "<?php echo C('site_url'); echo U(Index/ACTION_NAME,array('token'=>$_GET['token']));?>",
					"sendFriendLink": "<?php echo C('site_url'); echo U(Index/ACTION_NAME,array('token'=>$_GET['token']));?>",
					"weiboLink": "<?php echo C('site_url'); echo U(Index/ACTION_NAME,array('token'=>$_GET['token']));?>",
					"tTitle": "<?php echo ($homeInfo["title"]); ?>",
					"tContent": "<?php echo ($homeInfo["info"]); ?>"
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
				"tContent": "<?php echo ($homeInfo["info"]); ?>"
			};
		</script><?php endif; ?>
<?php echo ($shareScript); ?>
</body></html>