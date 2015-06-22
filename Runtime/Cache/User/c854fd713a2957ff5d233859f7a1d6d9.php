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
<div class="righttitle"><h4>摇一摇设置</h4><a href="javascript:history.go(-1);"  class="btn btn-primary" data-top ><i class="mdi-content-reply"></i>返回</a></div> 
<div class="">
<form class="form" method="post" enctype="multipart/form-data" >
<table style=" margin:20px 0 0 0;" border="0" cellSpacing="0" cellPadding="0" width="100%">
  <thead>
<tr>
  <th valign="top"><label for="acttitle">活动名称：</label></th>
  <td><input type="input" class="form-control" id="title"  name="title" style="width:500px"  value="<?php echo ($info["title"]); ?>" >    </td>
  <td>&nbsp;</td>
</tr>
<tr>
  <th valign="top"><label for="acttitle">关键词：</label></th>
  <td><input type="input" class="form-control" id="keyword"  name="keyword" style="width:500px"  value="<?php echo ($info["keyword"]); ?>" >    </td>
  <td>&nbsp;</td>
</tr>
 <tr> 
        <th>图文回复图片：</th>
        <td><input type="text" name="thumb" value="<?php echo ($info["thumb"]); ?>" class="form-control" id="thumb" style="width:400px;" />  <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('thumb',700,420,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('thumb')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></td> 
       </tr>
<tr style="display:none"> 
        <th><span class="red"></span>简介：</th> 
        <td><textarea name="intro" class="form-control" style="width:400px;height:80px;"><?php echo ($info["intro"]); ?></textarea></td> 
       </tr>
<tr style="display:none">
  <th valign="top">类型：</th>
  <td><label for="radio1"><input id="radio1" class="radio" type="radio" name="shaketype" value="1"  <?php if(($info["shaketype"]) == "1"): ?>checked="checked"<?php endif; ?> /> 以手机竖直中轴线垂直地面的为临界点，左右摇省力</label><br /><label for="radio2"><input class="radio" id="radio2" type="radio" name="shaketype" value="2" <?php if(($info["shaketype"]) == "2"): ?>checked="checked"<?php endif; ?> /> 以手机摇晃时达到一定的加速度值为一次来计算，较费力，但不用考虑方向</label></td>
</tr>
<tr>
  <th valign="top">状态：</th>
  <td><label for="radio3"><input id="radio3" class="radio" type="radio" name="isopen" value="1"  <?php if(($info["isopen"]) == "1"): ?>checked="checked"<?php endif; ?> /> 开启</label><br /><label for="radio4"><input class="radio" id="radio4" type="radio" name="isopen" value="0" <?php if(($info["isopen"]) == "0"): ?>checked="checked"<?php endif; ?> /> 关闭</label></td>
</tr>
<tr style="display:none;">
  <th valign="top">活动开始：</th>
  <td><label for="radio5">
    <input id="radio5" class="radio" type="radio" name="isact" value="1"  <?php if(($info["isact"]) == "1"): ?>checked="checked"<?php endif; ?> /> 开始</label><br /><label for="radio6"><input class="radio" id="radio6" type="radio" name="isact" value="0" checked="checked" <?php if(($info["isact"]) == "0"): ?>checked="checked"<?php endif; ?> /> 关闭</label></td>
</tr>
</thead>
  <tbody>
<tr  style="display:none">
  <th valign="top"><label for="text">手机端传输间隔：</label></th>
  <td><input type="input" class="form-control" id="clienttime"  name="clienttime" style="width:50px" value="<?php echo ($info["clienttime"]); ?>" >  数字越大大屏幕上更新的越慢!
 

</td>
  <td rowspan="2" valign="top"></td>
</tr> 
<tr  style="display:none">
  <th valign="top"><label for="text">大屏幕页面传输间隔：</label></th>
  <td><input type="input" class="form-control" id="showtime"  name="showtime" style="width:50px" value="<?php echo ($info["showtime"]); ?>" >  数字越大大屏幕上更新的越慢!
</td>
  <td rowspan="2" valign="top"></td>
</tr>
<tr>
  <th valign="top"><label for="text">游戏开始倒数计时：</label></th>
  <td><input type="input" class="form-control" id="starttime"  name="starttime" style="width:50px" value="<?php echo ($info["starttime"]); ?>" > 
 

</td>
  <td rowspan="2" valign="top"></td>
</tr>
<tr  style="display:none">
  <th valign="top"><label for="text">摇晃时间：</label></th>
  <td><input type="input" class="form-control" id="usetime"  name="usetime" style="width:50px" value="<?php echo ($info["usetime"]); ?>" > 秒  每个用户只能摇约定秒数，尽量设置时间长一点。
</td>
  <td rowspan="2" valign="top"></td>
</tr>
<tr>
  <th valign="top"><label for="text">最多次数：</label></th>
  <td><input type="input" class="form-control" id="endshake"  name="endshake" style="width:50px" value="<?php echo ($info["endshake"]); ?>" > 下  第一个用户达到这个数字时活动就停止。
</td>
  <td rowspan="2" valign="top"></td>
</tr>
<tr>
  <th valign="top"><label for="text">大屏幕页面展示人数：</label></th>
  <td><input type="input" class="form-control" id="shownum"  name="shownum" style="width:100px" value="<?php echo ($info["shownum"]); ?>" >  摇晃成绩在大屏幕上显示最前面的人数
 

</td>
  <td rowspan="2" valign="top"></td>
</tr>
<tr>
  <th valign="top"><label for="text">大屏幕背景：</label></th>
  <td><input type="input" class="form-control" id="background" value="<?php echo ($info["background"]); ?>" name="background" style="width:250px" value="<?php echo ($info["background"]); ?>" > <script src="/Public/static/gfile.js"></script><a href="###"  onclick="chooseFile('background','background')" class="btn btn-warning btn-sm"><i class="mdi-toggle-check-box"></i>选择</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="gfilePicUpload('background',1500,1000,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="viewImg('background')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a> 
 
<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
</td>
  <td rowspan="2" valign="top"></td>
</tr>

<tr>
  <th valign="top"><label for="text">大屏幕背景音乐：</label></th>
  <td><input type="input" class="form-control" id="backgroundmusic" value="<?php echo ($info["backgroundmusic"]); ?>" name="backgroundmusic" style="width:250px" value="" >  <a href="###" onclick="chooseFile('backgroundmusic','music')" class="btn btn-warning btn-sm"><i class="mdi-toggle-check-box"></i>选择</a> 定义大屏幕背景音乐，为URL地址
 

</td>
  <td rowspan="2" valign="top"></td>
</tr>
<tr  style="display:none;">
  <th valign="top"><label for="text">客户端起始音效：</label></th>
  <td><input type="input" class="form-control" id="music" value="<?php echo ($info["music"]); ?>" name="music" style="width:250px" value="" > <a href="###" onclick="chooseFile('music','music')" class="btn btn-warning btn-sm"><i class="mdi-toggle-check-box"></i>选择</a> 提醒用户开始摇一摇的音效效果
 

</td>
  <td rowspan="2" valign="top"></td>
</tr>
<tr>
  <th valign="top"><label for="text">二维码图片地址：</label></th>
  <td><input type="input" class="form-control" id="qrcode" value="<?php echo ($info["qrcode"]); ?>" name="qrcode" style="width:250px" value="" >  <a href="###" onclick="chooseFile('qrcode','my')" class="btn btn-warning btn-sm"><i class="mdi-toggle-check-box"></i>选择</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="gfilePicUpload('qrcode',1500,1000,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="viewImg('qrcode')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a> 大屏幕显示的二维码
 

</td>
  <td rowspan="2" valign="top"></td>
</tr>
<tr style="display:none;"> 
        <th><span class="red"></span>规则说明：</th> 
        <td><textarea name="rule" class="form-control" style="width:400px;height:80px;"><?php echo ($info["rule"]); ?></textarea></td> 
       </tr>    
<tr> 
        <th><span class="red"></span>活动介绍：</th> 
        <td><textarea name="info" class="form-control" style="width:400px;height:80px;"><?php echo ($info["info"]); ?></textarea></td> 
       </tr>
<tr>
  <th></th>
  <td><button type="submit"  name="button"  class="btn btn-primary" ><i class="mdi-content-save"></i>保存</button>　
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