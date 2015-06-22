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
<style type="text/css">
.plug-menu {
width:36px;
height:36px;
border-radius:36px;
-moz-box-shadow:0 0 0 4px #FFFFFF, 0 2px 5px 4px rgba(0, 0, 0, 0.25);
-webkit-box-shadow:0 0 0 4px #FFFFFF, 0 2px 5px 4px rgba(0, 0, 0, 0.25);
box-shadow:0 0 0 4px #FFFFFF, 0 2px 5px 4px rgba(0, 0, 0, 0.25);
background-color: FF0000;
position:relative
}
.plug-menu span {
display: block;
width:28px;
height:28px;
background: url(/Public/User/images/photo/plugmenu.png) no-repeat;
background-size: 28px 28px;
text-indent: -999px;
position:absolute;
top:4px;
left:4px;
overflow: hidden;
}
</style>
<script src="/Public/User/js/cart/jscolor.js" type="text/javascript"></script>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="righttitle">
            <h4>菜单颜色与导航 <span class="FAQ">提供一键拨号，一键导航，一键email等等快捷功能</span></h4>
        </div>
        <ul id="tags" class="nav nav-tabs">
            <li><a href="<?php echo U('Catemenu/index');?>">底部菜单分类设置</a> </li>
            <li><a href="<?php echo U('Catemenu/styleSet');?>">底部菜单风格<i class="mdi-toggle-check-box"></i>选择</a> </li>
            <li class="active" role="presentation"><a href="<?php echo U('Home/plugmenu');?>">菜单颜色与版权</a> </li>
            <div class="clearfix"></div>
        </ul>
        <table class="table" >
            <tbody>
                <tr>
                    <td width="60"><div class="plug-menu" id="plugmenucolor" style="background-color:<?php echo ($homeInfo["plugmenucolor"]); ?>"><span class="close"></span></div></td>
                    <td width="140"><strong>请选择快捷菜单的颜色：</strong></td>
                    <td width="95"><input type="text" name="plugmenucolor" id="themeStyle" value="<?php echo ($homeInfo["plugmenucolor"]); ?>" class="px color" style="width: 55px; background-image: none; background-color:<?php echo ($homeInfo["plugmenucolor"]); ?>; color: rgb(255, 255, 255);" onblur="document.getElementById('plugmenucolor').style.backgroundColor=document.getElementById('themeStyle').value;"></td>
                    <td width="536">请在手机上查看效果！</td>
                </tr>
                <?php if($userGroup["iscopyright"] == 1): ?><tr>
                    <td width="60"> </td>
                    <td><strong>设置页面版权：</strong></td>
                    <td colspan="2"><textarea class="form-control" style="width:550px; height:35px" name="copyright"><?php echo ($homeInfo["copyright"]); ?></textarea><br>例如：© 2013-2014 古睿版权所有 </td>
                </tr><?php endif; ?>
                <tr>
                    <td>
                    </td>
                    <td>
                        <button type="submit" name="batchsubmit" value="true" class="btn btn-primary"><i class="mdi-content-save"></i>保存</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<script>
                                    $(document).ready(function(){
                                    $(".checkbox").click(function(){
                                    var i=0;
                                    $("input:checked").each(function(){
                                        i++;
                                    });
                                    if(i>4){
                                    alert('最多只显示四项');
                                    }
                                    });
                                    });
</script>
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