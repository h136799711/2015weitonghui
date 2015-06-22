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
<script src="/Public/User/js/date/WdatePicker.js"></script>
 <form class="form" method="post"   action=""  target="_top" enctype="multipart/form-data" >
        <div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
<!--活动开始-->
<div class="righttitle">
    <h4>微场景设置</h4><a href="<?php echo U('Live/index',array('token'=>$token));?>"  class="btn btn-primary" data-top ><i class="mdi-content-reply"></i>返回</a>
</div>
<div class=" bgfc">
<table class="table" ><tbody>

<tr>
  <th valign="top"><span class="red">*</span>活动名称：</th>
  <td>
  <input type="input" class="form-control" id="name" value="<?php echo ($info["name"]); ?>" name="name" style="width:400px" />
    <br />
    （请不要多于50字!）
  </td>
</tr>

<tr>
  <th valign="top"><span class="red">*</span>关键词：</th>
  <td>
	<input type="hidden" class="form-control" value="<?php echo ($info["id"]); ?>" name="id">
	<input type="input" class="form-control" id="keyword" value="<?php if($info['keyword'] == ''): echo ($lotteryTypeName); else: echo ($info["keyword"]); endif; ?>" name="keyword" style="width:400px" ><br />
  	（<span class="red">只能写一个关键词</span>，用户输入此关键词将会触发此活动。）
  </td>
</tr>

<tr>
<th valign="top">活动说明：</th>
<td><textarea  class="form-control" id="info" name="intro"  style="width:400px; height:100px" ><?php echo ($info["intro"]); ?></textarea>
</td>
</tr>

<tr>
  <th valign="top"><label for="text">背景音乐：</label></th>
  <td>
  <input type="input" class="form-control" id="music" value="<?php if($info["music"] == ''): echo ($cfg_siteUrl); ?>/Public/static/live/default/mis.mp3<?php else: echo ($info["music"]); endif; ?>" name="music" style="width:250px" value="" >  
  <script src="/Public/static/gfile.js"></script>
  <a href="###" onclick="gfilePicUpload('music',640,990,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> 
  <a href="###" class="btn btn-warning btn-sm" onclick="chooseFile('music','music')" class="btn btn-warning btn-sm"><i class="mdi-toggle-check-box"></i>选择</a> 
    &nbsp;&nbsp;
    （设置微场景的背景音乐）
	
</td>
</tr>

<tr>
  <th>首页图片：</th>
  <td>
    <input class="form-control"  name="open_pic" value="<?php if($info['open_pic'] == ''): echo ($cfg_siteUrl); ?>/Public/static/attachment/background/car/9.jpg<?php else: echo ($info["open_pic"]); endif; ?>" id="pic1" style="width:250px;"  />
      <script src="/Public/static/gfile.js"></script>
      <a href="###" onclick="gfilePicUpload('pic1',640,990,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> 
      <a href="###" class="btn btn-warning btn-sm" onclick="viewImg('pic1')"><i class="mdi-action-pageview"></i>预览</a>[640*990]&nbsp;（场景首页展示图）
  </td>
</tr>

<tr id="masking_pic">
  <th>幕布图片：</th>
  <td>
    <input class="form-control"  name="masking_pic" value="<?php if($info['masking_pic'] == ''): echo ($cfg_siteUrl); ?>/Public/static/attachment/background/car/4.jpg<?php else: echo ($info["masking_pic"]); endif; ?>" id="pic2" style="width:250px;"  />
      <script src="/Public/static/gfile.js"></script>
      <a href="###" onclick="gfilePicUpload('pic2',640,990,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> 
      <a href="###" class="btn btn-warning btn-sm" onclick="viewImg('pic2')"><i class="mdi-action-pageview"></i>预览</a>[640*990]&nbsp;（开启幕布后生效，首页需要拉开幕布才能进入场景）<br />
      幕布特效图片暂时只能使用本地图片。如果使用了远程图片，请关闭幕布以免影响使用！
    </td>
</tr>

<tr>
  <th valign="top">幕布提醒文字：</th>
  <td>
  <input type="input" class="form-control" id="warn" value="<?php if($info["warn"] == ''): ?>请用手指擦一擦<?php else: echo ($info["warn"]); endif; ?>" name="warn" style="width:250px" />&nbsp;&nbsp;&nbsp;&nbsp;
    （开启幕布出现在幕布上的提示文字）
  </td>
</tr>

<tr>
  <th>分享背景图：</th>
  <td>
    <input class="form-control"  name="share_bg" value="<?php if($info['share_bg'] == ''): echo ($cfg_siteUrl); ?>/Public/static/attachment/background/car/10.jpg<?php else: echo ($info["share_bg"]); endif; ?>" id="pic4" style="width:250px;"  />
      <script src="/Public/static/gfile.js"></script>
      <a href="###" onclick="gfilePicUpload('pic4',640,990,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> 
      <a href="###" class="btn btn-warning btn-sm" onclick="viewImg('pic4')"><i class="mdi-action-pageview"></i>预览</a>[640*990]&nbsp;（底部分享页面背景）
    </div>
    </td>
</tr>

<tr>
  <th>分享按钮：</th>
  <td>
    <input class="form-control"  name="share_button" value="<?php if($info['share_button'] == ''): echo ($cfg_siteUrl); ?>/Public/static/live/default/share-button.png<?php else: echo ($info["share_button"]); endif; ?>" id="pic5" style="width:250px;"  />
      <script src="/Public/static/gfile.js"></script>
      <a href="###" onclick="gfilePicUpload('pic5',580,100,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> 
      <a href="###" class="btn btn-warning btn-sm" onclick="viewImg('pic5')"><i class="mdi-action-pageview"></i>预览</a>[580*100]&nbsp;（底部分享按钮图片）
    </div>
    </td>
</tr>
<!--
<tr>
  <th>结束提示图片：</th>
  <td>
    <input class="form-control"  name="end_pic" value="<?php if($info['end_pic'] == ''): echo ($cfg_siteUrl); ?>/Public/static/live/default/end.png<?php else: echo ($info["end_pic"]); endif; ?>" id="pic6" style="width:250px;"  />
      <script src="/Public/static/gfile.js"></script>
      <a href="###" onclick="gfilePicUpload('pic6',580,100,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> 
      <a href="###" onclick="viewImg('pic6')"><i class="mdi-action-pageview"></i>预览</a>[640*50]&nbsp;（场景浏览结束时跳出的提示图片）
    </div>
    </td>
</tr>
-->
<tr>
  <th>是否开启幕布：</th>
  <td>
    <input type="radio" name="is_masking" class="is_masking" value="1" <?php if($info["is_masking"] != '0'): ?>checked<?php endif; ?>>开启&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="is_masking" class="is_masking" value="0" <?php if($info["is_masking"] == '0'): ?>checked<?php endif; ?>>关闭&nbsp;&nbsp;&nbsp;&nbsp;（如果开启幕布，将会打开幕布后才能进入场景）
  </td>
</tr>

<tr>
  <th>商家展示：</th>
  <td>
    <input type="radio" name="show_company" class="show_company" value="1" <?php if($info["show_company"] != '0'): ?>checked<?php endif; ?>>开启&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="show_company" class="show_company" value="0" <?php if($info["show_company"] == '0'): ?>checked<?php endif; ?>>关闭&nbsp;&nbsp;&nbsp;&nbsp;（开启后页面展示商家分支页面）
  </td>
</tr>

<tr>
  <th>场景开关：</th>
  <td>
    <input type="radio" name="is_open" class="is_open" value="1" <?php if($info["is_open"] != '0'): ?>checked<?php endif; ?>>开启&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="is_open" class="is_open" value="0" <?php if($info["is_open"] == '0'): ?>checked<?php endif; ?>>关闭&nbsp;&nbsp;&nbsp;&nbsp;（开启的应用后才能正常访问）
  </td>
</tr>
<tr>
<th>&nbsp;</th>
<td><button type="submit" class="btn btn-primary" ><i class="mdi-content-save"></i>保存</button>　<a href=""  class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a>　<span class="red"></span></td>
</tr>
</tbody>
</table>
</div>
</form>

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