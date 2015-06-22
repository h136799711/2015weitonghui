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
<link rel="stylesheet" href="/Public/static/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="/Public/static/kindeditor/plugins/code/prettify.css" />
<script src="/Public/static/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="/Public/static/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="/Public/static/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/User/js/formCheck/formcheck.js"> </script>
<script>
var editor;
KindEditor.ready(function(K) {
editor = K.create('#intro', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '<?php echo U("User/GFile/kindedtiropic");?>',
items : [
'source','undo','clearhtml','hr',
'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
'insertunorderedlist', '|', 'emoticons', 'image','link', 'unlink','baidumap','lineheight','table','anchor','preview','print','template','code','cut']
});
});
</script>

<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
    <!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->
<div class="tab">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if(ACTION_NAME == 'index'): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Estate/index',array('token'=>$token));?>">楼盘简介</a></li>
<li class="<?php if(ACTION_NAME == 'son'): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Estate/son',array('token'=>$token));?>">子楼盘</a></li>
<li class="<?php if(ACTION_NAME == 'housetype'): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Estate/housetype',array('token'=>$token));?>">楼盘户型</a></li>
<li class="<?php if(ACTION_NAME == 'album'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Estate/album',array('token'=>$token));?>">楼盘相册</a></li>
<li class="<?php if(ACTION_NAME == 'impress'): ?>current<?php endif; ?> tabli" id="tab5" ><a href="<?php echo U('Estate/impress',array('token'=>$token));?>" >房友印象</a></li>
<li class="<?php if(ACTION_NAME == 'expert'): ?>current<?php endif; ?> tabli" id="tab6"><a href="<?php echo U('Estate/expert',array('token'=>$token));?>">专家点评</a></li>
<li class="<?php if(ACTION_NAME == 'reservation'): ?>current<?php endif; ?> tabli" id="tab7"><a href="<?php echo U('Estate/reservation',array('token'=>$token));?>">预约管理</a></li>

<li class="<?php if(ACTION_NAME == 'aboutus'): ?>current<?php endif; ?> tabli" id="tab7"><a href="<?php echo U('Estate/aboutus',array('token'=>$token));?>">关于我们</a></li>
</ul>
</div>
    <div class="righttitle">
        <h4 >公司信息</h4>
        <div class="searchbar right hide">
            <form method="post" action="">
                <script>
                function setlatlng(longitude,latitude){
                art.dialog.data('longitude', longitude);
                art.dialog.data('latitude', latitude);
                // 此时 iframeA.html 页面可以使用 art.dialog.data('test') 获取到数据，如：
                // document.getElementById('aInput').value = art.dialog.data('test');
                art.dialog.open('<?php echo U('Map/setLatLng',array('token'=>$token,'id'=>$id));?>',{lock:false,title:'设置经纬度',width:900,height:400,resize:true,yesText:'关闭',background: '#000',opacity: 0.87});
                }
                </script>
                <?php if(($parentid != '0') and ($parentid != '')): ?><a href="<?php echo U('Product/cats',array('token'=>$token,'parentid'=>$parentCat['parentid']));?>" class="btn btn-primary" data-top>返回上</a><?php endif; ?>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    <!--tab start-->
    <div class="tab">
    </div>
    <!--tab end-->
    <div class="">
        <form class="form" method="post" id="form" name="form" action="">
            <input type="hidden" name="isbranch" id="isbranch" value="1" />
            <?php if($set["id"] != ''): ?><input type="hidden" name="id" value="<?php echo ($set["id"]); ?>" /><?php endif; ?>
            <input type="hidden" name="discount" id="discount" value="<?php echo ($set["discount"]); ?>" />
            <div class=" bgfc">
                <table class="table" >
                    <tbody>
                        <tr>
                            <th><span class="red">*</span>名称：</th>
                            <td><input type="text" id="name" name="name" value="<?php echo ($set["name"]); ?>" class="form-control" style="width:400px;" /></td>
                        </tr>
                        <tr style="display: none;">
                            <th><span class="red">*</span>简称：</th>
                            <td><input type="text" id="shortname" name="shortname" value="loupan" class="form-control" style="width:400px;" /></td>
                        </tr>
                        <tr>
                            <th><span class="red">*</span>电话：</th>
                            <td><input type="text" id="tel" name="tel" value="<?php echo ($set["tel"]); ?>" class="form-control" style="width:400px;" /></td>
                        </tr>
                        <tr>
                            <th><span class="red">*</span>手机：</th>
                            <td><input type="text" id="mp" name="mp" value="<?php echo ($set["mp"]); ?>" class="form-control" style="width:400px;" /></td>
                        </tr>
                        <tr>
                            <th><span class="red">*</span>地址：</th>
                            <td><input type="text" id="address" name="address" value="<?php echo ($set["address"]); ?>" class="form-control" style="width:400px;" /></td>
                        </tr>
                        <tr>
                            <th><span class="red">*</span>Logo地址：</th>
                            <td><input type="text" id="logourl" name="logourl" value="<?php echo ($set["logourl"]); ?>" class="form-control" style="width:400px;" /> <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('logourl',700,420,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('logourl')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></td>
                        </tr>
                        <tr>
                            <th><span class="red">*</span>经纬度：</th>
                            <td>经度 <input type="text" id="longitude"  name="longitude" size="14" class="form-control" value="<?php echo ($set["longitude"]); ?>" /> 纬度 <input type="text"  name="latitude" size="14" id="latitude" class="form-control" value="<?php echo ($set["latitude"]); ?>" /> <a href="###" onclick="setlatlng($('#longitude').val(),$('#latitude').val())" class="btn btn-warning btn-sm"><i class="mdi-maps-pin-drop"></i>在地图中查看/设置</a></td>
                        </tr>
                        <tr>
                            <th><span class="red"></span>顺序：</th>
                            <td><input type="text" id="taxis" name="taxis" value="<?php echo ($set["taxis"]); ?>" class="form-control" style="width:100px;" /></td>
                        </tr>
                        <tr>
                            <th valign="top"><label for="info">图文详细页内容：</label></th>
                            <td><textarea name="intro" id="intro"  rows="5" style="width:590px;height:360px"><?php echo ($set["intro"]); ?></textarea></td>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                            <td>

                                <input type="hidden" name="token" value="<?php echo $token;?>" />
                            <button type="submit" name="button" class="btn btn-primary"><i class="mdi-content-save"></i>保存</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </form>
    </div>
    <div >
        <div class="clearfix"></div>
    </div>
</div>
<script language="javascript">
$(function(){
$("#form").valid([
{ name:"name",simple:"名称",require:true},
{ name:"mp",type:"mobile",message:"手机号输入不正确"}

],true,true);
})
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