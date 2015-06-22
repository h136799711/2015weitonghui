<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html >
    <head id="Head1">
        <title>
        <?php echo ($cfg_siteName); ?>-微通汇后台管理登录
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Keywords" content="微通汇微信营销系统" />
        <meta name="Description" content="微通汇微信营销系统" />
        <link type="text/css" rel="stylesheet" href="/Public/Admin/css/reset.css" />
        <link type="text/css" rel="stylesheet" href="/Public/Admin/css/common.css" />
        <link type="text/css" rel="stylesheet" href="/Public/Admin/css/page.css" />
        <script type="text/javascript" src="/Public/static/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
                    function refresh() {
                                var randomRZ = Math.random();
                        $("#imgCheckB").attr("src", "<?php echo U('Index/verify');?>?rz=" + randomRZ);
                    }
        </script>
    </head>
    <body >
        <!--container-->
        <div class="container bc">
            <div class="loginBox">
                <div class="top clearfix">
                    <div class="tl"></div>
                    <div class="tr"></div>
                    <div class="t"></div>
                </div>
                <div class="content">
                    <form name="form1" method="post" action="<?php echo U('Index/insert');?>" id="form1" class="myform">
                        <fieldset>
                            <h1 style="text-align:center;">微通汇管理系统登录</h1>
                            <p><span><input placeholder="请输入用户名" name="username" type="text" id="username" class="username_input" /></span></p>
                            <p><span><input placeholder="请输入密码" name="password" type="password" id="pw" class="ps_input" /></span></p>
                            <p>
                            <span><input placeholder="请输入验证码" name="code" type="text" id="txtCheckCode" class="chk_input" maxlength="4" /></span>
                            <span class="chk_img"><img style="width:70px;height:30px;" src="<?php echo U('Index/verify');?>" id="imgCheckB"/></span>
                            <span class="chk_txt"><a href="javascript:refresh();" style="color: #0033CC">看不清？换一张</a></span>
                            </p>
                            <input type="submit" name="Button1" value="登录" id="Button1" class="subBtn" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <!--footer-->
        <div class="footer" style="text-align:center;">
            CopyRight &copy; 2014 www.gooraye.com All Rights Reserved <br />
        </div>
        <script src="/Public/static/bootstrap/material-design/js/ripples.min.js"></script>
        <script src="/Public/static/bootstrap/material-design/js/material.min.js"></script>
        <script>
                    $(document).ready(function() {
                        $.material.init();
                    });
        </script>
    </body>
</html>