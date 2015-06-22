<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <!-- 后台主体结构框架 -->
        <meta charset="UTF-8">
        
    <title>微通汇后台管理系统</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/ripples.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/material-wfont.min.css" />        
        <link href="/Public/Admin/css/style.css" type="text/css" rel="stylesheet">
        
<style type="text/css">
            .logo{
                background: url(/Public/static/logo.png) no-repeat;
            }
</style>

        <script src="/Public/static/jquery-1.11.1.min.js" type="text/javascript"></script>
    </head>
    <body>

        <div class="container-fluid nosmallsize">
        <!-- 顶部导航 -->
        <div class="topbar navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="javascript:void(0)">&nbsp;</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav_val): $mod = ($i % 2 );++$i;?><li class="nav" id="link<?php echo ($nav_val['id']); ?>">
                        <a href="#" class="btn btn-default" onClick="JumpleftFrame('<?php echo U('System/menu',array('pid'=>$nav_val['id'],'level'=>2,'title'=>rawurlencode ($nav_val['title'])));?>',<?php echo ($nav_val['id']); ?>);"><?php echo ($nav_val['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right userinfo">
                    <li><i class="mdi-action-perm-identity"></i>
                    <span><?php echo (session('username')); ?></span></li>
                    <li ><a  href="<?php echo U('Index/logout');?>"><i class="mdi-action-exit-to-app"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- 顶部导航 END -->
	<!-- 左 START-->
        <div class="left">
            <IFRAME frameBorder="0" id="left" name="left" scrolling="auto" src="<?php echo U('System/menu');?>" style="HEIGHT:100%;width: 100%;Z-INDEX:2" allowtransparency="true"></IFRAME>
        </div>
	<!-- 左 END-->

	<!-- 右 START-->
	
        <div class="main">
            <IFRAME id="main" name="main" style="width: 100%; HEIGHT: 100%" src="<?php echo U('System/main');?>" frameBorder=0></IFRAME>
        </div>
	<!-- 右 END-->

        <div class="footer">
            <p class="text-center">Copyright &copy; 2013-2014 古睿(Gooraye)版权所有</p>
        </div>
        </div>
        <!-- 底部脚本区 -->

        <script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
        <script src="/Public/static/bootstrap/material-design/js/ripples.min.js"></script>
        <script src="/Public/static/bootstrap/material-design/js/material.min.js"></script>        
        <script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
        <script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
        <script src="/Public/Admin/js/common.js" type=text/javascript></script>
        <script>
                    $(document).ready(function() {
                        $.material.init();
                        // console.log($(window).width());
                        $(window).resize(function(){
                            var mainHeight = $(".main").height();
                            var minusHeight = $(".topbar").outerHeight();
                            var screenHeight = $(window).height();
                            var computeMainHeight = screenHeight - minusHeight-60;
                            // console.log(mainHeight,screenHeight);
                            $(".main").height(computeMainHeight);
                            $(".left").height(computeMainHeight);

                        });
                        $(window).resize();
                    });
        </script>
        
    </body>
</html>