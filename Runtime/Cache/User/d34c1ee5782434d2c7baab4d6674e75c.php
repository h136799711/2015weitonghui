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
.chatPanel .mediaFullText .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  {
font-size: 14px;}
.chatPanel .media {
border:0px solid #D1D1D1;
box-shadow:0 0px 5px 0 rgba(0, 0, 0, 0.25);
-moz-box-shadow:0 0px 5px 0 rgba(0, 0, 0, 0.25);
-webkit-box-shadow:0 0px 5px 0 rgba(0, 0, 0, 0.25);
-webkit-border-radius:5px 5px 10px 10px;
-moz-border-radius:5px 5px 10px 10px;
border-radius:5px 5px 10px 10px;
background: url(/Public/User/images/photo/bottom.png) repeat-x scroll left bottom #FFFFFF;
background-size:2px auto;
}
.chatPanel .media .mediaHead .title {
line-height:1.2em;
font-size:16px;
display:block;
text-align: left;
margin-top:0;
padding:0;
height: auto;
}
.chatPanel .media .mediaPanel {
padding:0px;
margin:0px;
}
.chatPanel .media .mediaHead {
padding: 10px 10px 8px;
border-bottom: 0px solid #D3D8DC;
color: #000000;
font-size: 20px;
}

.chatPanel .media .mediaFooter {
padding: 0 10px;
}
.chatPanel .mediaFullText .mediaImg {
width: 265px;
margin: 0 10px;}
.chatPanel .mediaFullText .mediaImg img{
width: 100%;}
.chatPanel .mediaFullText .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10 P {
margin: 5px 10px 0px;
}
.chatPanel .mediaFullText .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10 P p{
line-height:18px
}
.chatPanel .mediaFullText .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  {
padding: 0 0 5px;
}
</style>

<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
          <div class="righttitle">
          	<h4>修改相册</h4><a href="javascript:history.go(-1);" class="btn btn-primary" data-top><i class="mdi-content-reply"></i>返回</a></div>
         
          <form method="post" action="">
         <div class=" bgfc">
            <table class="table" ><tbody>
<tr>
<th valign="top"><span class="red">*</span>相册名称：</th>
<td width="430"><input type="text" name="title" value="<?php echo ($photo["title"]); ?>" class="form-control" style="width:400px;" id="name" onkeyup="DivFollowingText1()">
<script type="text/javascript">
function DivFollowingText1()
{
document.getElementById("zname").innerHTML=document.getElementById("name").value;
document.getElementById("zname2").innerHTML=document.getElementById("name").value;
}
</script> 
<br>
尽量简单，不要超过<span class="red">20字</span>.</td>
<td width="430" rowspan="4" valign="top" class="chatPanel" style="padding:0px;">


<!--完整显示所有内容的效果-->	
<div class="chatItem you" id="photo1" style="width:350px;" <?php if($photo['isshowinfo'] == 1): ?>display:none<?php else: endif; ?>> 
  　<a target="ddd" href="">
<div class="media mediaFullText">

<div class="mediaPanel">
<div class="mediaHead"><span class="title" id="zname"><?php echo ($photo["title"]); ?></span>
</div>
<div class="mediaImg"><img id="pic_src" src="<?php echo ($photo["picurl"]); ?>"></div>
<div class="mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  mediacol-xs-9 col-sm-9  col-md-10 col-lg-10 P">
<p id="zinfo"><?php echo ($photo["info"]); ?></p>
</div>
<div class="mediaFooter">
<span class="mesgIcon right"></span><span style="line-height:50px;" >查看全文</span>
<div class="clearfix"></div>
</div>
</div>
</div>
</a>
</div>

<!--最简单的显示效果-->	
<div class="chatItem you" id="photo2" style="<?php if($photo['isshowinfo'] == 0): ?>display:none<?php else: endif; ?>"> 
  　<a target="ddd" href="">
<div class="media mediaFullText">

<div class="mediaPanel">
<div class="mediaHead" style="padding: 10px 10px 0px;">
</div>
<div class="mediaImg"><img id="zpic2" src="<?php echo ($photo["picurl"]); ?>"/></div>
<div class="mediaFooter">
<span class="mesgIcon right"></span>
<span style="line-height:50px; font-size:16px" id="zname2"><?php echo ($photo["title"]); ?></span>
<div class="clearfix"></div>
</div>
</div>
</div>
</a>
</div>


</td>

</tr>
<tr>
<th valign="top"><span class="red">*</span>相册封面图：</th><input type="hidden" name="id" value="<?php echo ($photo["id"]); ?>" />
<td width="430"><input type="text" name="picurl" value="<?php echo ($photo["picurl"]); ?>" class="form-control" style="width:400px;" id="pic" onblur="document.getElementById('pic_src').src=document.getElementById('pic').value;document.getElementById('zpic2').src=document.getElementById('pic').value;" onchange="document.getElementById('pic_src').src=document.getElementById('pic').value;document.getElementById('zpic2').src=document.getElementById('pic').value;"><br>
<script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('pic',700,420,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('pic')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></td>
</tr>
<tr>
   <th valign="top">相册介绍：</th>
	<td valign="top">
		<textarea class="form-control" id="info" name="info" style="width:400px; height:120px" onkeyup="DivFollowingText2()"><?php echo ($photo["info"]); ?></textarea><br>
			<script type="text/javascript">
			function DivFollowingText2()
			{
			document.getElementById("zinfo").innerHTML=document.getElementById("info").value;
			}
	</script> 
		请简单描述相册内容，尽量控制在<span class="red">150文字以内</span>。<br>
		<label>
			<input name="isshowinfo" <?php if($photo['isshowinfo'] == 0): ?>checked="checked"<?php endif; ?> type="radio" id="RadioGroup0_0" value="0" checked="checked" onclick="document.getElementById('photo2').style.display='none';document.getElementById('photo1').style.display='';">
			显示简介
		</label>　　
		<label>
			<input type="radio" <?php if($photo['isshowinfo'] == 1): ?>checked="checked"<?php endif; ?> name="isshowinfo" value="1" id="RadioGroup0_1" onclick="document.getElementById('photo1').style.display='none';document.getElementById('photo2').style.display='';">
			不显示简介
		</label>	
	</td>
</tr>
<tr>
<th valign="top">是否显示：</th>
	<td valign="top">
	<select class="form-control"  name="status">
	<option value="1" <?php if($photo['status'] == 1): ?>selected<?php endif; ?>>显示此相册</option>
	<option value="0" <?php if($photo['status'] == 0): ?>selected<?php endif; ?>>不显示此相册</option>
	</select>						
	                       	
	</td>
</tr>
<tr>
	<th valign="top">&nbsp;</th>
	<td>
		<button type="submit" name="button" class="btn btn-primary"><i class="mdi-content-save"></i>保存</button>
		<a href="<?php echo U('User/Photo/index',array('token'=>getToken()));?>" class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a></td>
		<td>&nbsp;
	</td>
</tr>
</tbody>
</table>
            
          </div>
          </form>
          
        </div>
				<script type="text/javascript">
var selUser = {};

function addvotetouser(obj, type) {
var liid = 'votetouser_' + type + '_' + obj.value;
var userObj = $('vote_user_'+type);
if(obj.checked) {
if($(liid) == null) {
var newli = document.createElement("li");
newli.id = liid;

//创建隐含域
try {
var InputNode = document.createElement("<input type=\"hidden\" value=\""+ obj.value +"\" name=\"votetouser["+type+"]["+obj.getAttribute('user')+"]\">");
} catch(e) {
var InputNode = document.createElement("input");
InputNode.setAttribute("name", "votetouser["+type+"][]");
InputNode.setAttribute("type", "hidden");
InputNode.setAttribute("value", obj.value);
}
newli.appendChild(InputNode);
var newspan = document.createElement("span");
newspan.innerHTML ='<p>' + obj.getAttribute('user')+'</p> <a href="javascript:;" onclick="delSelUser(\''+liid+'\', \''+obj.value+'\');" title="删除" class="deltw"><i class="mdi-action-delete"></i>删除</a>';
newli.appendChild(newspan);
userObj.appendChild(newli);
selUser[obj.value] = obj.value;
}
} else {
userObj.removeChild($(liid));
delete selUser[obj.value];
}
}
function delSelUser(lid, uid) {
delete selUser[uid];
$(lid).parentNode.removeChild($(lid));
}

function setFlag(obj, utype) {
var uids = common = '';
obj.href = ''+utype;
for(var key in selUser) {
if(parseInt(selUser[key])) {
uids = uids + common + selUser[key];
common = ',';
}
}
if(uids != '') {
obj.href += '&uids=' +  uids;
}
}
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