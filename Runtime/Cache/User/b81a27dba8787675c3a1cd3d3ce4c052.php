<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
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
<input type="hidden" id="catUrl" value="<?php echo U('Product/ajaxCatOptions',array('token'=>$token));?>" />
  <div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 "> 
   <div class="righttitle"> 
    <h4>360°全景设置</h4> 
    <a href="<?php echo U('Panorama/index',array('token'=>$token));?>" class="btn btn-primary btn-sm" data-top><i class="mdi-content-reply"></i>返回</a> 
   </div> 
   
   
   
   <form class="form" method="post" action="" enctype="multipart/form-data"> 
   <input type="hidden" name="token" value="<?php echo ($token); ?>" />
<?php if($isUpdate == 1): ?><input type="hidden" name="id" value="<?php echo ($set["id"]); ?>" /><?php endif; ?>
<input type="hidden" name="discount" id="discount" value="<?php echo ($set["discount"]); ?>" />
    <div class=" bgfc"> 
    <table class="table" >
              <tbody>
              	 <tr>
                    <td align="right"><label for="title">名称：</label></td>
              		 
              		 
              		<td><input type="input" class="form-control" id="name" name="name" value="<?php echo ($set["name"]); ?>" style="width:420px;"></td>
              		</tr>
              		 <tr>
                    <td align="right"><label for="title">关键词：</label></td>
              		<td><input type="input" class="form-control" id="keyword" value="<?php echo ($set["keyword"]); ?>" name="keyword" style="width:420px;"></td>
              		</tr>
              		<tr>
                    <td align="right"><label for="title">顺序数字：</label></td>
              		<td><input type="input" class="form-control" id="taxis" value="<?php echo ($set["taxis"]); ?>" name="taxis" style="width:420px;">  由小到大排列</td>
              		</tr>
                     <tr style="display:none">
                    <td align="right"><label for="title">背景音乐：</label></td>
              		<td><input type="input" class="form-control" id="music" value="<?php echo ($set["music"]); ?>" name="music" style="width:420px;"></td>
              		</tr>
                     <tr>
                       <td align="right">&nbsp;</td>
                       <td>
                       <table border="0" cellspacing="0" cellpadding="0" class="quanjing">
                         <tbody><tr>
                           <td align="center">前</td>
                           <td align="center">右</td>
                           <td align="center">后</td>
                           <td align="center">左</td>
                           <td align="center">顶部</td>
                           <td align="center">底部</td>
                         </tr>
                         <tr>
                           <td align="center"><img src="<?php echo ($set["frontpic"]); ?>" id="frontpic_src" style="width:145px;"></td>
                           <td align="center"><img src="<?php echo ($set["rightpic"]); ?>" id="rightpic_src" style="width:145px;"></td>
                           <td align="center"><img src="<?php echo ($set["backpic"]); ?>" id="backpic_src" style="width:145px;"></td>
                           <td align="center"><img src="<?php echo ($set["leftpic"]); ?>" id="leftpic_src" style="width:145px;"></td>
                           <td align="center"><img src="<?php echo ($set["toppic"]); ?>" id="toppic_src" style="width:145px;"></td>
                           <td align="center"><img src="<?php echo ($set["bottompic"]); ?>" id="bottompic_src" style="width:145px;"></td>
                         </tr>
                         <tr>
                           <td><input type="input" class="form-control" id="frontpic" value="<?php echo ($set["frontpic"]); ?>" name="frontpic" style="width:135px;"></td>
                           <td><input type="input" class="form-control" id="rightpic" value="<?php echo ($set["rightpic"]); ?>" name="rightpic" style="width:135px;"></td>
                           <td><input type="input" class="form-control" id="backpic" value="<?php echo ($set["backpic"]); ?>" name="backpic" style="width:135px;"></td>
                           <td><input type="input" class="form-control" id="leftpic" value="<?php echo ($set["leftpic"]); ?>" name="leftpic" style="width:135px;"></td>
                           <td><input type="input" class="form-control" id="toppic" value="<?php echo ($set["toppic"]); ?>" name="toppic" style="width:135px;"></td>
                           <td><input type="input" class="form-control" id="bottompic" value="<?php echo ($set["bottompic"]); ?>" name="bottompic" style="width:135px;"></td>
                         </tr>
                         <tr>
                           <td align="center"><script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('frontpic',1000,500,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('frontpic')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></td>
                           <td align="center"><a href="###" onclick="gfilePicUpload('rightpic',1000,500,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a class="btn btn-warning btn-sm" href="###" onclick="viewImg('rightpic')"><i class="mdi-action-pageview"></i>预览</a></td>
                           <td align="center"><a href="###" class="btn btn-warning btn-sm" onclick="gfilePicUpload('backpic',1000,500,'<?php echo ($token); ?>')" class="a_upload"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('backpic')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></td>
                           <td align="center"><a href="###" onclick="gfilePicUpload('leftpic',1000,500,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('leftpic')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></td>
                           <td align="center"><a href="###" onclick="gfilePicUpload('toppic',1000,500,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('toppic')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a></td>
                           <td align="center"><a href="###" onclick="gfilePicUpload('bottompic',1000,500,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a class="btn btn-warning btn-sm" href="###" onclick="viewImg('bottompic')"><i class="mdi-action-pageview"></i>预览</a></td>
                         </tr>
                       </tbody></table></td>
                     </tr>
                     
                   <tr>
                    <td align="right" valign="top"><label for="catepic">描述信息：</label></td>
              		 
              		 
              		<td><textarea name="intro" class="form-control" style="width:420px; height:150px"><?php echo ($set["intro"]); ?></textarea> </td>
              		</tr>


              	<tr>
              		<td></td>
              		<td colspan="3"><button type="submit" name="button" class="btn btn-primary"><i class="mdi-content-save"></i>保存</button>　<a href="<?php echo U('Panorama/index',array('token'=>$token));?>" class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a></td>
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