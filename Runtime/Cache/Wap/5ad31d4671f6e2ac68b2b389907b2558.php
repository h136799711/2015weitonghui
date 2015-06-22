<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="ch" manifest="">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo ($live_info["name"]); ?></title>
	<meta charset="utf-8">
	<meta name="apple-touch-fullscreen" content="YES">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="pragram" content="no-cache">
	<link rel="stylesheet" type="text/css" href="/Public/static/live/css/copyright.css">
<link rel="stylesheet" type="text/css" href="/Public/static/live/css/main.css">
<link rel="stylesheet" type="text/css" href="/Public/static/live/css/add2home.css">
	<script type="text/javascript" src="/Public/static/live/js/offline.js"></script>	<!--移动端版本兼容 -->
	<script type="text/javascript">
		var jsVer = 24;
		var phoneWidth = parseInt(window.screen.width);
		var phoneScale = phoneWidth/640;

		var ua = navigator.userAgent;
		if (/Android (\d+\.\d+)/.test(ua)){
			var version = parseFloat(RegExp.$1);
			// andriod 2.3
			if(version>2.3){
				document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
			// andriod 2.3以上
			}else{
				document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
			}
			// 其他系统
		} else {
			document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
		}
	</script><meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">
	<!--移动端版本兼容 end -->
</head>

<body class="f-ofh pc perspective yes-3d" style="-webkit-user-select: none;">
	<!--模版加载提示-->

    	

	<section class="u-alert">
		<img style="display:none;" src="/Public/static/live/images/loading_large.gif">
		<div class="loading-animate"></div>
		<div class="alert-loading z-move" style="display:none;">
			<div class="cycleWrap">
				<span class="cycle cycle-1"></span>
				<span class="cycle cycle-2"></span>
				<span class="cycle cycle-3"></span>
				<span class="cycle cycle-4"></span>
			</div>
			<div class="lineWrap">
				<span class="line line-1"></span>
				<span class="line line-2"></span>
				<span class="line line-3"></span>
			</div>
		</div>
	</section>
	<!--模版加载提示 end-->
		
                <!-- 声音控件 -->     <section class="u-audio f-hide" data-
src="<?php echo ($live_info["music"]); ?>">         <p id="coffee_flow" class="btn_audio">
<strong class="txt_audio z-hide">关闭</strong>             <span
class="css_sprite01 audio_open"></span>         <div class="coffee-steam-box"
style="height: 100px; width: 44px; left: 60px; top: -50px; position: absolute;
overflow: hidden; z-index: 0;"></div></p>     </section>     <!-- 声音控件 end-->
<!-- 箭头指示引导 -->     <section class="u-arrow f-hide"><p
class="css_sprite01"></p></section>     <!-- 箭头指示引导 end-->

	<!-- page页面内容 -->
	<section class="p-ct transformNode-3d" style="height: 799px;">
		<!-- 旋转正面 data-open: 0->关闭， 1->开启 -->
		<div id="j-mengban" class="translate-front z-show" data-open="1" style="height: 799px;">
			<div class="mengban-warn"></div>
		<canvas style="position: fixed; left: 50%; top: 0px; width: 640px; margin-left: -320px; height: 100%; z-index: 20; background-color: transparent;" width="1600" height="753"></canvas></div>
		<!-- 旋转正面 end-->
		
		<!-- 旋转反面 -->
		<div class="translate-back f-hide z-pos" style="height: 799px;">
			<!-- 封页 1-->
		
		<!-- 擦一擦 -->
				<!-- 蒙板背景图 -->
			<div class="m-page m-fengye" data-page-type="info_pic3" data-statics="info_pic3" style="height: 799px;">
				<div class="page-con lazy-img" data-src="<?php echo ($live_info["open_pic"]); ?>" data-position="50% 50%" data-size="cover" style="background-image: url(<?php echo ($live_info["open_pic"]); ?>); background-size: cover; background-position: 50% 50%;"></div>
			</div>
			<!-- 封页 end-->
				


	<?php if(is_array($content)): $key = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content): $mod = ($key % 2 );++$key; if($content["type"] == 1): ?><!-- 大图文 3-->
			<div class="m-page m-bigTxt f-hide" data-page-type="bigTxt" data-statics="info_list" style="height: 799px;">
				<div class="page-con j-txtWrap lazy-img" data-src="<?php echo ($content["bg_pic"]); ?>" data-position="50% 50%" data-size="cover" style="background-image: url(/Public/static/live/images/loading_large.gif); ">
				</div>
			</div>
			<!-- 大图文 end-->
		<?php elseif($content["type"] == 2): ?>
			<!-- 视频 11-->
			<div class="m-page m-video f-hide" data-page-type="video" data-statics="video_list" style="height: 799px;">
				<div class="page-con lazy-img" data-src="<?php echo ($content["bg_pic"]); ?>" data-position="50% 50%" data-size="cover" style="background-image: url(/Public/static/live/images/loading_large.gif);">
					<div class="video-title" style="color:#FFFFFF;">
						<h3 class="f-tc"></h3>
					</div>
	
					<div class="video-con j-video" data-video-type="bendi" data-video-src="<?php echo ($content["movie_link"]); ?>">
						<div class="img lazy-img" data-src="<?php echo ($content["movie_pic"]); ?>" data-position="50% 50%" data-size="cover" style="background-image: url(/Public/static/live/images/loading_large.gif); ">
							<span class="css_sprite01"></span>
						</div>
						<div class="video f-hide">
							<div class="videoClose"></div>
							<div class="videoWrap">
								<!-- <video src=""></video> -->
								<!-- <div></div> -->
								<!-- <div></div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- 视频end --><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	
	<?php if($live_info["show_company"] == '1'): if(is_array($company)): $key = 0; $__LIST__ = $company;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$company): $mod = ($key % 2 );++$key;?><!-- 预定 -->
			<div class="m-page m-book f-hide" data-page-type="book" data-statics="multi_contact" style="height: 799px;">
				<div class="page-con lazy-img" data-src="<?php echo ($company["bg_pic"]); ?>" data-position="50% 50%" data-size="cover" style="background-image: url(/Public/static/live/images/loading_large.gif);">
					<div class="book-bd f-tc">
						
						<div class="bd-map j-map" data-mapindex="42625" data-detal="{&quot;sign_name&quot;:&quot;<?php echo ($company["name"]); ?>&quot;,&quot;contact_tel&quot;:&quot;<?php echo ($company["tel"]); ?>&quot;,&quot;address&quot;:&quot;<?php echo ($company["address"]); ?>&quot;}" data-longitude="<?php echo ($company["longitude"]); ?>" data-latitude="<?php echo ($company["latitude"]); ?>">
							<img class="lazy-img" data-src="<?php echo ($company["top_pic"]); ?>" src="/Public/static/live/images/loading_large.gif">
						<?php if($company["show_map"] == '1'): ?><span class="css_sprite01"></span>
							<p class="map-animate"><strong></strong><strong></strong></p><?php endif; ?>
						</div>
						
						<div class="bd-tit">
							<h3 class="f-tc"></h3>
						</div>
						<div class="bd-form">
							<p class="tel">
								<span class="css_sprite01"></span>
								<a href="tel:<?php echo ($company["tel"]); ?>"><?php echo ($company["tel"]); ?></a>
							</p>							
							<p class="email">
								<span class="css_sprite01"></span>
								<a href="tel:<?php echo ($company["mp"]); ?>"><?php echo ($company["mp"]); ?></a>
							</p>							
							<p class="wx">
								<span class="css_sprite01"></span>
								<a href="javascript:void(0)"><?php echo ($company["weixin"]); ?></a>
							</p>													
						</div>
					</div>
				</div>
			</div>
			<!-- 预定 end--><?php endforeach; endif; else: echo "" ;endif; endif; ?>
			

		
			<!-- 分享 -->
			<div class="m-page m-bigTxt f-hide" data-page-type="bigTxt" data-statics="info_list" style="height: 799px;">
				<div class="page-con j-txtWrap lazy-img" data-src="<?php echo ($live_info["share_bg"]); ?>" data-position="50% 50%" data-size="cover" style="background-image: url(/Public/static/live/images/loading_large.gif);">
				</div>
				<!-- 微信 -->
				<div class="bigTxt-btn bigTxt-btn-wx lazy-img" data-src="<?php echo ($live_info["share_button"]); ?>" data-position="50% 50%" data-size="auto" style="background-image: url(/Public/static/live/images/loading_large.gif);"><a href="javascript:void(0)"></a></div>
				<div class="bigTxt-weixin"><img src="/Public/static/live/default/share-guide.png"></div>
				<!-- 微信 end-->
			</div>
			<!-- 分享 -->
		
			
		</div>
		<!-- 旋转反面 end-->
	</section>
	<!-- 正文介绍 end-->

	<!--meeting map-->
	<div class="ylmap bigOpen">
		<!--地图插件元素-->
		<div class="bk"><span class="css_sprite01"></span></div>
	</div>
	<!--meeting map end-->
	
	<!--pageLoading-->
	<section class="u-pageLoading">
		<img src="/Public/static/live/default/load.gif" alt="loading">
	</section>
	<!--pageLoading end-->
	
	<!-- 资源传递 -->
	<!-- 模版ID -->	
	<!-- 微信分享信息 -->
	<!-- 微信分享信息 -->
	<!-- 微信分享信息 -->
	<!-- 微信分享信息 -->
	<!-- 微信分享信息 -->

	
	<!-- 资源传递 end-->


<!--脚本加载-->
<script src="/Public/static/live/js/init_mobile.js" type="text/javascript" charset="utf-8"></script>
	<!--脚本加载 end-->

<?php if($live_info["is_masking"] == '1'): ?><input id="ca-tips" type="hidden" value="<?php echo ($live_info["warn"]); ?>"><input id="r-cover" type="hidden" value="<?php echo ($live_info["masking_pic"]); ?>"><?php endif; ?>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Live",
            "moduleID":"0",
            "imgUrl": "<?php echo ($live_info["open_pic"]); ?>", 
            "timeLineLink": "<?php echo ($cfg_siteUrl); echo U('Live/index',array('token'=>$token,'id'=>$live_info['id']));?>",
            "sendFriendLink": "<?php echo ($cfg_siteUrl); echo U('Live/index',array('token'=>$token,'id'=>$live_info['id']));?>",
            "weiboLink": "<?php echo ($cfg_siteUrl); echo U('Live/index',array('token'=>$token,'id'=>$live_info['id']));?>",
            "tTitle": "<?php echo ($live_info["name"]); ?>",
            "tContent": "<?php echo ($live_info["intro"]); ?>"
};
</script>
<?php echo ($shareScript); ?>
</body>
</html>