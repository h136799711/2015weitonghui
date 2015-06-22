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
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 " >
    <div class="righttitle"><h4>微信墙设置</h4><a href="javascript:history.go(-1);"  class="btn btn-primary" data-top ><i class="mdi-content-reply"></i>返回</a></div>
    <div class="">
        <form class="form" method="post" enctype="multipart/form-data" >
            <table style=" margin:20px 0 0 0;" border="0" cellSpacing="0" cellPadding="0" width="100%">
                <thead>
                    <tr>
                        <th valign="top"><label for="acttitle">活动名称：</label></th>
                        <td><input type="input" class="form-control" id="title"  name="title" style="width:500px"  value="<?php echo ($info["title"]); ?>" >    </td>
                    </tr>
                    <tr>
                        <th valign="top"><label for="acttitle">关键词：</label></th>
                        <td><input type="input" class="form-control" id="keyword"  name="keyword" style="width:500px"  value="<?php echo ($info["keyword"]); ?>" >    </td>
                    </tr>
                    <tr>
                        <th valign="top"><label for="text">Logo：</label></th>
                        <td><input type="input" class="form-control" id="logo" value="<?php echo ($info["logo"]); ?>" name="logo" style="width:250px" value="" >  <a href="###" onclick="chooseFile('logo','my')"  class="btn btn-warning btn-sm"><i class="mdi-toggle-check-box"></i>选择</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="gfilePicUpload('logo',400,400,'<?php echo ($token); ?>')"  class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="viewImg('logo')"   class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a> 标题前面的logo,高度最佳80px，宽度最佳不超过200px，可以不填写
                    </td>
                </tr>
                <tr>
                    <th valign="top"><label for="text">开幕背景：</label></th>
                    <td><input type="input" class="form-control" id="startbackground" value="<?php echo ($info["startbackground"]); ?>" name="startbackground" style="width:250px" value="<?php echo ($info["startbackground"]); ?>" > <script src="/Public/static/gfile.js"></script><a href="###" onclick="chooseFile('startbackground','background')"  class="btn btn-warning btn-sm"><i class="mdi-toggle-check-box"></i>选择</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="gfilePicUpload('startbackground',1500,1000,'<?php echo ($token); ?>')"  class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="viewImg('startbackground')"  class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a> 最佳尺寸宽984px,高636px
                </td>
            </tr>
            <tr>
                <th valign="top"><label for="text">背景：</label></th>
                <td><input type="input" class="form-control" id="background" value="<?php echo ($info["background"]); ?>" name="background" style="width:250px" value="<?php echo ($info["background"]); ?>" > <script src="/Public/static/gfile.js"></script><a href="###" onclick="chooseFile('background','background')"  class="btn btn-warning btn-sm"><i class="mdi-toggle-check-box"></i>选择</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="gfilePicUpload('background',1500,1000,'<?php echo ($token); ?>')"  class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="viewImg('background')"  class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>  默认为空会有更好的显示效果
            </td>
        </tr>
        <tr>
            <th valign="top"><label for="text">结束背景：</label></th>
            <td><input type="input" class="form-control" id="endbackground" value="<?php echo ($info["endbackground"]); ?>" name="endbackground" style="width:250px" value="<?php echo ($info["endbackground"]); ?>" > <script src="/Public/static/gfile.js"></script><a href="###" onclick="chooseFile('endbackground','background')"  class="btn btn-warning btn-sm"><i class="mdi-toggle-check-box"></i>选择</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="gfilePicUpload('endbackground',1500,1000,'<?php echo ($token); ?>')"  class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="viewImg('endbackground')"  class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
        </td>
    </tr>
    <tr>
        <th valign="top"><label for="text">二维码：</label></th>
        <td><input type="input" class="form-control" id="qrcode" value="<?php echo ($info["qrcode"]); ?>" name="qrcode" style="width:250px" value="" >  <a href="###" onclick="gfilePicUpload('qrcode',800,800,'<?php echo ($token); ?>')"  class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="viewImg('qrcode')"  class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
    </td>
</tr>
<tr>
    <th valign="top">内容是否需要审核</th>
    <td>
        <div class="radio radio-primary">
            <label><input id="radio_check1" class="radio" type="radio" name="needcheck" value="1"  <?php if(($info["needcheck"]) == "1"): ?>checked="checked"<?php endif; ?> /> 是
          </label>
      </div>
    <div class="radio radio-primary">
        <label><input class="radio" id="radio_check2" type="radio" name="needcheck" value="0" <?php if(($info["needcheck"]) == "0"): ?>checked="checked"<?php endif; ?> /> 否
    </label>
</div>
</td>
</tr>
<tr>
<th valign="top">状态：</th>
<td>
 <div class="radio radio-primary">
            <label>
              <input id="radio3" class="radio" type="radio" name="isopen" value="1"  <?php if(($info["isopen"]) == "1"): ?>checked="checked"<?php endif; ?> /> 开启
          </label>
      </div>
    <div class="radio radio-primary">
      <label>       
        <input class="radio" id="radio4" type="radio" name="isopen" value="0" <?php if(($info["isopen"]) == "0"): ?>checked="checked"<?php endif; ?> /> 关闭
    </label>
</div>
</td>
</tr>
<tr>
<th valign="top"><label for="text">一等奖名称：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["firstprizename"]); ?>" name="firstprizename" style="width:250px" value="" ></td>
</tr>
<tr>
<th valign="top"><label for="text">一等奖数量：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["firstprizecount"]); ?>" name="firstprizecount" style="width:50px" value="" ></td>
</tr>
<tr>
<th valign="top"><label for="text">一等奖图片：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["firstprizepic"]); ?>" id="firstprizepic" name="firstprizepic" style="width:250px" value="" >  <a href="###" onclick="gfilePicUpload('firstprizepic',600,600,'<?php echo ($token); ?>')"  class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="viewImg('firstprizepic')"  class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></td>
</tr>
<tr>
<th valign="top"><label for="text">二等奖名称：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["secondprizename"]); ?>" name="secondprizename" style="width:250px" value="" ></td>
</tr>
<tr>
<th valign="top"><label for="text">二等奖数量：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["secondprizecount"]); ?>" name="secondprizecount" style="width:50px" value="" ></td>
</tr>
<tr>
<th valign="top"><label for="text">二等奖图片：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["secondprizepic"]); ?>" id="secondprizepic" name="secondprizepic" style="width:250px" value="" >  <a href="###" onclick="gfilePicUpload('secondprizepic',600,600,'<?php echo ($token); ?>')"  class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="viewImg('secondprizepic')"  class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></td>
</tr>
<tr>
<th valign="top"><label for="text">三等奖名称：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["thirdprizename"]); ?>" name="thirdprizename" style="width:250px" value="" ></td>
</tr>
<tr>
<th valign="top"><label for="text">三等奖数量：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["thirdprizecount"]); ?>" name="thirdprizecount" style="width:50px" value="" ></td>
</tr>
<tr>
<th valign="top"><label for="text">三等奖图片：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["thirdprizepic"]); ?>" id="thirdprizepic" name="thirdprizepic" style="width:250px" value="" >  <a href="###" onclick="gfilePicUpload('thirdprizepic',600,600,'<?php echo ($token); ?>')"  class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="viewImg('thirdprizepic')"  class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></td>
</tr>
<tr style="display:none">
<th valign="top"><label for="text">四等奖名称：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["fourthprizename"]); ?>" name="fourthprizename" style="width:250px" value="" ></td>
</tr>
<tr style="display:none">
<th valign="top"><label for="text">四等奖数量：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["fourthprizecount"]); ?>" name="fourthprizecount" style="width:50px" value="" ></td>
</tr>
<tr style="display:none">
<th valign="top"><label for="text">四等奖图片：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["fourthprizepic"]); ?>" id="fourthprizepic" name="fourthprizepic" style="width:250px" value="" >  <a href="###" onclick="gfilePicUpload('fourthprizepic',600,600,'<?php echo ($token); ?>')"  class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="viewImg('fourthprizepic')"  class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></td>
</tr>
<tr style="display:none">
<th valign="top"><label for="text">五等奖名称：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["fifthprizename"]); ?>" name="fifthprizename" style="width:250px" value="" ></td>
</tr>
<tr style="display:none">
<th valign="top"><label for="text">五等奖数量：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["fifthprizecount"]); ?>" name="fifthprizecount" style="width:50px" value="" ></td>
</tr>
<tr style="display:none">
<th valign="top"><label for="text">五等奖图片：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["fifthprizepic"]); ?>" id="fifthprizepic" name="fifthprizepic" style="width:250px" value="" >  <a href="###" onclick="gfilePicUpload('fifthprizepic',0,0,'<?php echo ($token); ?>')"  class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="viewImg('fifthprizepic')"  class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></td>
</tr>
<tr style="display:none">
<th valign="top"><label for="text">六等奖名称：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["sixthprizename"]); ?>" name="sixthprizename" style="width:250px" value="" ></td>
</tr>
<tr style="display:none">
<th valign="top"><label for="text">六等奖数量：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["sixthprizecount"]); ?>" name="sixthprizecount" style="width:50px" value="" ></td>
</tr>
<tr style="display:none">
<th valign="top"><label for="text">六等奖图片：</label></th>
<td><input type="input" class="form-control" value="<?php echo ($info["sixthprizepic"]); ?>" id="sixthprizepic" name="sixthprizepic" style="width:250px" value="" >  <a href="###" onclick="gfilePicUpload('sixthprizepic',600,600,'<?php echo ($token); ?>')"  class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="viewImg('sixthprizepic')"  class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></td>
</tr>
<tr>
<th></th>
<td><input type="hidden" value="<?php echo ($info["id"]); ?>" name="id" /><button type="submit"  name="button"  class="btn btn-primary" ><i class="mdi-content-save"></i>保存</button>
</td>
</tr>
</tbody>
</table>
</form>
</div>
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