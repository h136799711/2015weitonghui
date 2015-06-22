<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<title>LiteMall后台管理</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<!-- basic styles -->
		
		<link href="/litemall/Public/static/style/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/litemall/Public/static/style/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="/litemall/Public/static/style/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- ace styles -->

		<link rel="stylesheet" href="/litemall/Public/static/style/css/ace.min.css" />
		<link rel="stylesheet" href="/litemall/Public/static/style/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/litemall/Public/static/style/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/litemall/Public/static/style/css/ace-ie.min.css" />
		<![endif]-->

		<!-- ace settings handler -->

		<script src="/litemall/Public/static/style/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/litemall/Public/static/style/js/html5shiv.js"></script>
		<script src="/litemall/Public/static/style/js/respond.min.js"></script>
		<![endif]-->
		
		<!-- javascript footer -->
				<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='/litemall/Public/static/style/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 	window.jQuery || document.write("<script src='/litemall/Public/static/style/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/litemall/Public/static/style/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/litemall/Public/static/style/js/bootstrap.min.js"></script>
		<script src="/litemall/Public/static/style/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="/litemall/Public/static/style/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="/litemall/Public/static/style/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/litemall/Public/static/style/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/litemall/Public/static/style/js/jquery.slimscroll.min.js"></script>
		<script src="/litemall/Public/static/style/js/jquery.easy-pie-chart.min.js"></script>
		<script src="/litemall/Public/static/style/js/jquery.sparkline.min.js"></script>
		<script src="/litemall/Public/static/style/js/flot/jquery.flot.min.js"></script>
		<script src="/litemall/Public/static/style/js/flot/jquery.flot.pie.min.js"></script>
		<script src="/litemall/Public/static/style/js/flot/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->

		<script src="/litemall/Public/static/style/js/ace-elements.min.js"></script>
		<script src="/litemall/Public/static/style/js/ace.min.js"></script>
	</head>
	<body>


<div class="col-sm-6 widget-container-span">
    <div class="widget-box transparent">
        <div class="widget-header">
            <div class="widget-toolbar no-border">
                <ul class="nav nav-tabs" id="myTab2">
                    <li class="active"><a data-toggle="tab" href="#home1">商城设置</a></li>
                    <!-- <li><a data-toggle="tab" href="#home2">支付宝设置</a></li> -->
                </ul>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main padding-12 no-padding-left no-padding-right">
                <div class="tab-content padding-4">
                    <div id="home1" class="tab-pane in active">
                        <div class="row">
                            <div class="col-xs-12">
                                <form class="form-horizontal" role="form" action="<?php echo U('Admin/Index/setting');?>" method="post">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right"
                                        for="form-field-1"> 商城名称： </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1"
                                            value="<?php echo ($info["name"]); ?>" name="name" class="col-xs-10 col-sm-6">
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right"
                                        for="form-field-2"> 商城公告： </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-2"
                                            value="<?php echo ($info["notification"]); ?>" name="notification" class="col-xs-10 col-sm-6">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right"
                                        for="form-field-2"> 商城地址： </label>
                                        <div class="h3 col-sm-9">
                                            <span id="content">http://<?php echo ($_SERVER['HTTP_HOST']); echo U('App/Index/index',array('token'=>getToken()));?></span>
                                            <button type="button" data-clipboard-target="content" class="btn btn-primary"  id="copyurl" >复制地址</button>
                                            <div>
                                            请使用微信扫码
                                            <img src="http://new.weitonghui.com/index.php/Home/Qrcode/index?text=http://<?php echo ($_SERVER['HTTP_HOST']); echo U('App/Index/index',array('token'=>getToken()));?>" class="thumbnail" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn btn-info" type="submit">
                                            <i class="icon-ok bigger-110"></i> 提交
                                            </button>
                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" type="reset">
                                            <i class="icon-undo bigger-110"></i> 取消
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <div id="home2" class="tab-pane in">
                        <div class="row">
                            <div class="col-xs-12">
                                <form class="form-horizontal" role="form" action="<?php echo U('Admin/Index/setalipay');?>" method="post">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right"
                                        for="form-field-1"> 支付宝账号： </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1"
                                            value="<?php echo ($alipay["alipayname"]); ?>" name="alipayname" class="col-xs-10 col-sm-6">
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right"
                                        for="form-field-2"> 合作身份者ID： </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-2"
                                            value="<?php echo ($alipay["partner"]); ?>" name="partner" class="col-xs-10 col-sm-6">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right"
                                        for="form-field-2"> 安全检验码KEY： </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-2"
                                            value="<?php echo ($alipay["key"]); ?>" name="key" class="col-xs-10 col-sm-6">
                                        </div>
                                    </div>
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn btn-info" type="submit">
                                            <i class="icon-ok bigger-110"></i> 提交
                                            </button>
                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" type="reset">
                                            <i class="icon-undo bigger-110"></i> 取消
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/litemall/Public/static/zeroclipboard-2.1.6/ZeroClipboard.js"></script>

<script type="text/javascript">
$(function(){
	// window.ZeroClipboard.setMoviePath( "/litemall/Public/static/zeroclipboard-2.1.6/ZeroClipboard.swf" );
	ZeroClipboard.config( { swfPath: '/litemall/Public/static/zeroclipboard-2.1.6/ZeroClipboard.swf' } );
	var clip = new ZeroClipboard(document.getElementById("copyurl"));
	clip.on("ready", function(){ 

		// 当触发copy事件时，设置用于复制的文本数据
		// clip.on("copy", function(e){
		//     e.clipboardData.setData("text/plain", "这里是用于复制的纯文本数据")
		// });
		// 当触发copy事件时，设置用于复制的文本数据
		clip.on("aftercopy", function(e){
			alert("复制成功！");
		});

	});

	
});
</script>