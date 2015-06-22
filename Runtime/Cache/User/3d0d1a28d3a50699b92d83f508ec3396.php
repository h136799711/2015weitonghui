<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <!-- 后台主体结构框架 -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,target-densitydpi=high-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <title>微通汇管理系统</title>
        <meta http-equiv="X-UA-Compatible" content = "IE=edge,chrome=1">
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/ripples.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/material-wfont.min.css" />
        <link href="/Public/User/css/new.css?v=1.0.0" type="text/css" rel="stylesheet">
        <script src="/Public/static/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
                            (function(){
                                window.GOORAYE = {};
                                window.GOORAYE.IndexURL = "";
                            })(window);
        </script>
    </head>
    <body class='container-fluid row'>
        <div class="navbar navbar-inverse top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo U('User/Index/index');?>">
                <img  src="/Public/User/images/logo.png" alt="LOGO">
                </a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav navbar-right h3">
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="avator" src="<?php echo ($wecha["headerpic"]); ?>">
                        <span><?php echo ($wecha["wxname"]); ?> （<?php echo (session('uname')); ?>）</span>
                        <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu" >
                            <li><a href="<?php echo U('User/Index/index');?>" ><i class="mdi-action-swap-horiz"></i>切换公众号</a>
                                <li><a href="<?php echo U('User/Index/useredit');?>" ><i class="mdi-communication-vpn-key"></i>修改密码</a>
                                </li>
                            </li>
                        </ul>
                    </li>
                    <li><a class="logout" title="退出系统" href="<?php echo U('User/Index/logout');?>" ><i class="mdi-action-exit-to-app"></i></a></li>
                </ul>
            </div>
        </div>
        <!--左侧功能菜单-->
        <div  class="gr tabmenu col-xs-12 col-sm-3  col-md-2 col-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">功能模块</div>
                <div class="panel-body">
                    <?php echo ($menuhtml); ?>
                </div>
            </div>
        </div>
        <!--左侧功能菜单 END-->  
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<style type="text/css">

.userinfoArea th {
width: 100px;
}
.clr{
clear:both;
}
.yulan {
    background: url(/Public/User/images/adma/erweimabg.png) repeat scroll 0 0 #4E5359;
    color: #666666;
    font:14px/1.5  Microsoft YaHei,Helvitica,Verdana,Tohoma,Arial,san-serif;
    margin: 0;
    padding: 0;
color: #666666;
}
.yulan .main{ margin:0 auto; }
.yulan h1{ font-size:26px; color:#f5f5f5; font-weight:normal; text-align: center; margin:35px 0 25px 0; text-shadow:0 1px 3px #111111;}
.yulan .erweima{height: 301px;
    margin: 0 auto;
    width: 301px;}
.yulan .erweima img{border: medium none;
-moz-box-shadow: 0 4px 3px 2px #333333;
-webkit-box-shadow: 0 4px 3px 2px #333333;
    box-shadow: 0 4px 3px 2px #333333;
-webkit-border-radius:6px;
-moz-border-radius:6px;
border-radius:6px;
    width: 100%;}
.yulan .beizhu{ margin:15px auto 5px;text-align: center;}
.yulan .beizhu p{ line-height: 48px;}
.yulan .beizhubg{color: #B4B7BC;background: url(/Public/User/images/adma/erweima_bg2.png) repeat-x scroll 0 0 transparent;
    font-size: 12px;
    height: 48px;
    margin: 10px auto;
    width: 230px;text-shadow: 0 -1px 0 #111112;
line-height: 48px;display: inline-block;position: relative;}
.yulan .beizhuleft{background: url(/Public/User/images/adma/erweima_bg2_left.png) no-repeat scroll 0 0 transparent;
    display: block;
    float: left;
    height: 48px;
    margin-left: -26px;
    width: 26px;}
.yulan .beizhuright{ background: url(/Public/User/images/adma/erweima_bg2_right.png) no-repeat scroll 0 0 transparent;
    display: block;
    float: right;
    height: 48px;
    margin-right: -26px;
    width: 26px;}
.yulan .col-xs-9 col-sm-9  col-md-10 col-lg-10 {color: #B4B7BC; font-size:14px;padding:5px;width:300px; margin:0 auto;text-shadow: 0 -1px 0 #111112;
float:none; background-color:transparent;min-height:40px;border:0;
}
.yulan .footer {
background: url(/Public/User/images/adma/erweimabg.png) repeat scroll 0 0  transparent;
    color: #AAAAAA;
    margin:20px auto 0;
    text-shadow: 0 -1px 0 #111111;
text-align:center;
line-height: 48px;
width: 100%;
padding:0;
}
.yulan .footer p{
    background: url(/Public/User/images/adma/erweima_footer.png) no-repeat scroll center top transparent;
font-size:12px;line-height: 48px;
}
</style>

<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">

<div class="righttitle">
  <h4>微信公众号二维码推广页设置<span class="FAQ">推广之用，可以发布到QQ群微博博客论坛等等...</span></h4>
 </div>
 
         <form class="form" method="post" action="" target="_top" enctype="multipart/form-data">
         
         <div class=" bgfc">
  	 
<table class="table" ><tbody>
<tr>
<th width="120">推广页地址：</th>
<td width="430"><a href="<?php echo ($cfg_siteUrl); ?>/index.php/show/<?php echo (session('token')); ?>"  title="点击查看推广页" class="green" target="_blank"><?php echo ($cfg_siteUrl); ?>/index.php/show/<?php echo (session('token')); ?></a></td>
<td rowspan="6" valign="top" class="yulan">
<div class="main">
<h1 id="adtitle"><?php echo ($adma["title"]); ?></h1>
<div class="erweima"><img id="gzhewm" src="<?php echo ($adma["url"]); ?>"></div>
<div class="beizhu">
<div class="beizhubg">
<div class="beizhuleft"></div>
<div class="beizhuright"></div>
<p>请使用微信扫描二维码关注此公众号</p>
</div>
</div>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 " id="gzhinfo">
        <?php echo ($adma["info"]); ?>
</div>
<div class="clearfix"></div>
<div class="footer"><p id="gzhcopyright"><?php echo ($adma["copyright"]); ?></p></div>
</div>
</td>
</tr>
 <tr>
<th valign="">宣传页标题名：</th>
<td><input type="text" name="title" value="<?php echo ($adma["title"]); ?>" class="form-control" style="width:400px;" id="etitle" onblur="document.getElementById('adtitle').innerHTML=document.getElementById('etitle').value;">

</td>
</tr>	
 <tr>
<th valign="">二维码地址：</th>
<td><input type="text" name="url" value="<?php echo ($adma["url"]); ?>" class="form-control" style="width:400px;" id="ewm" onblur="document.getElementById('gzhewm').src=document.getElementById('ewm').value;"> <p style="line-height:25px;"><script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('ewm',344,344,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('ewm')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></p>

<p><span class="red">二维码边长为12CM，大小为344×344PX</span>.</p>

</td>
</tr>				
                            <tr>
<th valign="top"><br>
功能介绍：</th>
<td valign="top"><textarea class="form-control" id="info" name="info" style="width:400px; height:120px" onkeyup="DivFollowingText2()"><?php echo ($adma["info"]); ?></textarea> 
<script type="text/javascript">
function DivFollowingText2()
{
document.getElementById("gzhinfo").innerHTML=document.getElementById("info").value;
}
</script> 
<br>
请简单描述您的微信公众号可以给粉丝带来什么好处，<br>
尽量控制在<span class="red">150文字以内</span>。</td>
</tr>
<tr>
	<th width="120" valign="top">版权信息:</th>
	<td>
	<input type="text" name="copyright" value="<?php echo ($adma["copyright"]); ?>" class="form-control" style="width:400px;text-align:left;color:rgb(0, 0, 0);float:none" id="copyright" onclick="document.getElementById('gzhcopyright').innerHTML=this.value;" onkeyup="DivFollowingText3()"/>
	<script type="text/javascript">
	function DivFollowingText3()
	{
	document.getElementById("gzhcopyright").innerHTML=document.getElementById("copyright").value;
	}
	</script> 
		<br/>
		<span>例如：© 2013-2014 <?php echo ($cfg_siteName); ?>版权所有</span>
		</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><button type="submit" name="button" class="btn btn-primary"><i class="mdi-content-save"></i>保存</button>
<a href="javascript:history.go(-1);" class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a>
<a href="<?php echo ($cfg_siteUrl); ?>/show/<?php echo (session('token')); ?>" class="right btnGray vm"  style=" margin-right:20px" target="_blank">查看推广页</a>
</td>
</tr>

</tbody>
</table>
</div> 
  
 </form>
  
        </div>
<div class="IndexFoot" style="clear:both">
    <div class="foot" style="padding-top:20px;">
        <div id="copyright" >
            杭州博也网络科技有限公司<br/>
            Copyright&copy;2013-<?php echo date('Y',time());?><br/>
            <a href="http://www.miibeian.gov.cn" target="_blank" style="color:white"><?php echo C('ipc');?></a>
        </div>
        <div class="ewm2">
            <a target="_blank" href="/Public/User/images/ewm.jpg" title=" 杭州博也网络科技官方微信服务号"><img src="/Public/User/images/ewm.jpg" width="150px" height="150px"></a>
        </div>
        <div class="foot_page"  style="color:white;">
            <i class="mdi-communication-email"></i>：hzboye@163.com<br/>
            <i class="mdi-maps-local-phone" style="width:16px;"></i>：0571-88172520，<i class="mdi-hardware-phone-iphone" style="font-size: 1.6em;"></i>：13484379290<br/>
            <i class="mdi-communication-chat"  style="width:16px;"></i>：
            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($cfg_qq); ?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo ($cfg_qq); ?>:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
            &nbsp;
            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=346551990&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:346551990:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
            <br/>
        </div>
    </div>
</div>
<div style="display:none;clear:both">
    <?php echo base64_decode(C('countsz'));?>
</div>
<!-- Topbg END -->
<!-- 底部脚本区 -->
<script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/static/bootstrap/material-design/js/ripples.min.js"></script>
<script src="/Public/static/bootstrap/material-design/js/material.min.js"></script>
<script src="/Public/User/js/bottom.js"></script>
<script>
                    $(function() {
                        	$.material.init();
                        	//左侧导航
			
                    });
</script>
</body>
</html>