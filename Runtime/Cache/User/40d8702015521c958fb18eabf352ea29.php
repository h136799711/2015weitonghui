<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html >
    <head>
        <title> <?php echo ($cfg_siteTitle); ?> <?php echo ($cfg_siteName); ?></title>
        <meta name="viewport" content="width=device-width,target-densitydpi=high-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta http-equiv="content" content ="text/html; charset=utf-8" />
        <meta name="keywords" content = "<?php echo ($cfg_metaKeyword); ?>" />
        <meta name="description" content = "<?php echo ($cfg_metaDes); ?>" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/ripples.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/material-wfont.min.css" />
        <link href="/Public/User/css/new.css" rel="stylesheet" type="text/css" />
        
        <script src="/Public/static/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script>var SITEURL='';</script>
        <script type="text/javascript">
                window.GOORAYE  = {
                    IndexURL :  '' +'/index.php'
                };
        </script>
        <style type="text/css">
                    .mask{
                    width: 99999px;
                    height: 99999px;
                    background: rgba(85, 85, 85, 0.55);
                    position: absolute;
                    z-index: 10;
                    top: 0px;
                    }
                    .goorayealert{
                    display: none;
                    background: #f8f8f8;
                    padding: 15px;
                    top:100px;
                    width:460px;
                    position: absolute;
                    left: 50%;
                    z-index: 15;
                    margin-left: -230px;
                    }
                    .alertContent {
                    background-color: #fff;
                    }
                    .close:hover{
                    color:#000;
                    }
                    .close{
                    float: right;
                    font-size: 21px;
                    font-weight: bold;
                    line-height: 1;
                    color: #000;
                    top:-6px;
                    text-shadow: 0 1px 0 #fff;
                    opacity: .2;
                    filter: alpha(opacity=20);
                    cursor: pointer;
                    position: relative;
                    }
        </style>
    </head>
    <body class='container-fluid row'>
        <div class="navbar navbar-default top">
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
                <ul class="h3 nav navbar-nav navbar-right">
                    <li style="height: 60px;line-height: 60px;color: #fff;" >
                        <?php if($_SESSION[uid]==false): else: ?>
                        你好,<?php echo (session('uname')); ?>（uid:<?php echo (session('uid')); ?>）<?php endif; ?>
                    </li>
                    <li><a class="logout" title="退出系统" href="<?php echo U('Home/Index/logout');?>" ><i class="mdi-action-exit-to-app"></i></a></li>
                </ul>
            </div>
        </div>
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 " >
    <div class="righttitle"><h4></h4></div>
    <form method="post" class="form-horizontal" action="<?php echo U('User/Index/insert');?>" enctype="multipart/form-data">
        <fieldset>
            <legend>微信公众号表单</legend>
            <input type="hidden" name="encodingaeskey" value="<?php echo ($encodingAESKey); ?>">
            <input type="hidden" name="token" value="<?php echo ($tokenvalue); ?>">
            <!--  分类 -->
            <input type="hidden" name="type" value="0,默认">

            <div class="form-group">
                <label for="" class="control-label col-lg-2 col-md-2">*公众号名称</label>
                <div class="col-lg-10 col-md-10">
                    <input type="text"  class="form-control" name="wxname" value="" tabindex="1">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-lg-2 col-md-2">*公众号原始id</label>
                <div class="col-lg-10 col-md-10">
                    <input type="text" class="form-control" name="wxid" value=""  tabindex="2" >
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-lg-2 col-md-2">*微信号</label>
                <div class="col-lg-10 col-md-10">
                    <input type="text" class="form-control" name="weixin" value=""  tabindex="3" >
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-lg-2 col-md-2">*头像地址（url）</label>
                <div class="col-lg-10 col-md-10"><input id="pic" class="form-control" name="headerpic" value="/Public/User/images/portrait.jpg">  <script src="/Public/static/gfile.js"></script><a href="#" onclick="gfilePicUpload('pic',200,200,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('pic')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-lg-2 col-md-2">AppID</label>
            <div class="col-lg-10 col-md-10">
                <input type="text" name="appid" value="" class="form-control" tabindex="1" size="25">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-lg-2 col-md-2">AppSecret</label>
            <div class="col-lg-10 col-md-10">
                <input type="text" class="form-control" name="appsecret" value=""  tabindex="3" >
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-lg-2 col-md-2">微信号类型</label>
            <div class="col-lg-10 col-md-10">
                <select class="form-control"  id="winxintype" name="winxintype">
                    <option value="1">订阅号</option>
                    <option value="2">服务号</option>
                    <option value="3">高级服务号</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-lg-2 col-md-2">地区</label>
            <div class="col-lg-10 col-md-10">
                <input type="text" class="form-control" id="province" value="<?php echo ($province); ?>" name="province" tabindex="1" > 省  <input id="city" value="<?php echo ($city); ?>" type="text" name="city" class="form-control" tabindex="1" > 市
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-lg-2 col-md-2">&nbsp;</label>
            <div class="col-lg-10 col-md-10">
                <button type="submit" class="btn btn-primary " id="saveSetting" style="margin-right:5px;"><i class="mdi-content-save"></i>保存</button>
                <a href="<?php echo U('User/Index/index');?>"  class="btn btn-primary "><i class="mdi-content-reply"></i>返回</a>
            </div>
        </div>
    </fieldset>
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