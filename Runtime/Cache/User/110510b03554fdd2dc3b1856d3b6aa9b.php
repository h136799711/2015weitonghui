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
<link rel="stylesheet" href="/Public/static/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="/Public/static/kindeditor/plugins/code/prettify.css" />
<script src="/Public/static/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="/Public/static/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="/Public/static/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
editor = K.create('#info', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '<?php echo U("User/GFile/kindedtiropic");?>',
items : [
'source','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'music', 'video']
});
});
</script>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
    <div class="righttitle"><h4>编辑图文自定义内容</h4><a href="javascript:history.go(-1);"  class="btn btn-primary" data-top ><i class="mdi-content-reply"></i>返回</a></div>

    <form method="post"   action="<?php echo U('Img/upsave');?>"  enctype="multipart/form-data" >
        <div class=" form">
            <table class="table" >
                <thead>
                    <tr>
                        <th style="width:120px" valign="top"><label for="keyword">关键词：</label></th>
                        <td><input type="input" class="form-control" id="keyword" value="<?php echo ($info["keyword"]); ?>"  name="keyword" style="width:580px;"><br />
                    例如: 企业电话 </td>
                </tr>
                <tr style="display:none">
                    <th valign="top">关键词类型：</th>
                    <td>
                        <label for="radio1"><input id="radio1" class="radio" type="radio" name="type" value="2"  <?php if(($info["type"]) == "2"): ?>checked="checked"<?php endif; ?> /> 完全匹配  用户输入的和此关键词一样才会触发!</label>
                        <br />
                        <label for="radio2"><input class="radio" id="radio2" type="radio" name="type" value="1" <?php if(($info["type"]) == "1"): ?>checked="checked"<?php endif; ?> /> 包含匹配 (只要用户输入的文字包含本关键词就触发!v2用户才生效)</label></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><span class="red">*</span><label for="title">标题：</label></th>
                        <td><input type="input" class="form-control" id="title" value="<?php echo ($info["title"]); ?>"    name="title" style="width:580px;"> </td>
                    </tr>
                    <tr>
                        <th valign="top"><label for="text">简介：</label></th>
                        <td><textarea  class="form-control" id="Hfcol-xs-9 col-sm-9  col-md-10 col-lg-10 "     name="text" style="width:580px;  height:100px"><?php echo ($info["text"]); ?></textarea><br />限制200字内
                        </td>
                    </tr>
                    <tr>
                        <th valign="top"><label for="classid">文章所属类别：</label></th>
                        <td>
                            <div id="classname" style="padding:5px;"><?php echo ($classtree); ?></div>
                            <input type="hidden" id="classid" value="<?php echo ($classValue); ?>" name="classid" />
                            <a href="###" onclick="editClass('classid','classname',0)" class="btn btn-warning btn-sm">
                            <i class="mdi-toggle-check-box"></i>选择所属分类</a>
                            <a href="<?php echo U('Classify/add');?>" class="btn btn-warning btn-sm" style="margin-left:10px;" target="ddd" ><i class="mdi-content-add"></i>添加分类</a>
                        </td>
                    </tr>
                    <tr>
                        <th valign="top"><label for="pic">封面图片地址：</label></th>
                        <td><input class="form-control" id="pic"  name="pic" value="<?php echo ($info["pic"]); ?>" style="width:580px;"  />  <script src="/Public/static/gfile.js?2013"></script><a href="###" onclick="gfilePicUpload('pic',700,420,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('pic')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
                    </td>
                </tr>
                <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
                <tr>
                    <th valign="top"><label for="showpic">详细页是否显示封面：</label></th>
                    <td>
                        是<input class="radio" type="radio" name="showpic" value="1" <?php if(($info["showpic"]) == "1"): ?>checked="checked"<?php endif; ?> />
                        否<input class="radio" type="radio" name="showpic" value="0" <?php if(($info["showpic"]) == "0"): ?>checked="checked"<?php endif; ?> />

                    </td>
                </tr>
                <tr>
                    <th valign="top"><label for="info">图文详细页内容：</label></th>
                    <td><textarea name="info" id="info"  rows="5" style="width:590px;height:360px"><?php echo ($info["info"]); ?></textarea></td>
                </tr>
                <tr>
                    <th valign="top"><label for="url">图文外链网址：</label></th>
                    <td><input type="input" class="form-control" id="url" value="<?php echo ($info["url"]); ?>" name="url" style="width:280px;">  <a href="###" onclick="addLink('url',0)" class="btn btn-warning btn-sm"><i class="mdi-social-group-add"></i>从功能库添加</a><br /><span class="red">如需跳转到其他网址，请在输入框右侧选择或这里填写网址(例如：http://baidu.com，记住如果填写必须有http://)</span>如果填写了图文详细内容，这里请留空，不要设置！</td>
                </tr>
                <tr>
                    <th valign="top"><label for="usort">排序：</label></th>
                    <td>
                        <input type="input" class="form-control" id="usort" value="<?php echo ($info["usort"]); ?>" name="usort" >
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="保存" name="sbmt" class="btn btn-primary">　<a href="<?php echo U('Img/index');?>"  class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a></td>
                </tr>
            </tbody>
        </table>

    </div>
</form>

</div>

<div class="clearfix"></div>
</div>
</div>
</div>
<!--底部-->
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