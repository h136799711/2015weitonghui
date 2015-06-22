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

<!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>

<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">

<link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>

<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<div class="tab">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if(ACTION_NAME == 'index' OR ACTION_NAME == 'carbrand'): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Car/index',array('token'=>$token));?>">品牌管理</a></li>
<li class="<?php if(ACTION_NAME == 'series' OR ACTION_NAME == 'addseries'): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Car/series',array('token'=>$token));?>">车系管理</a></li>
<li class="<?php if(ACTION_NAME == 'carmodel' OR ACTION_NAME == 'add_carmodel'): ?>current<?php endif; ?> tabli" id="tab3"><a href="<?php echo U('Car/carmodel',array('token'=>$token));?>">车型管理</a></li>
<li class="<?php if(ACTION_NAME == 'salers' OR ACTION_NAME == 'add_saler'): ?>current<?php endif; ?> tabli" id="tab4"><a href="<?php echo U('Car/salers',array('token'=>$token));?>">销售管理</a></li>
<li class="<?php if(ACTION_NAME == 'reservation' OR ACTION_NAME == 'res_edit' OR ACTION_NAME == 'res_manage'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Car/reservation',array('token'=>$token));?>">预约管理</a></li>
<li class="<?php if(ACTION_NAME == 'carowner'): ?>current<?php endif; ?> tabli" id="tab6"><a href="<?php echo U('Car/carowner',array('token'=>$token));?>">车主关怀</a></li>
<li class="<?php if(ACTION_NAME == 'utility'): ?>current<?php endif; ?> tabli" id="tab7"><a href="<?php echo U('Car/utility',array('token'=>$token));?>">实用工具</a></li>
<li class="<?php if(ACTION_NAME == 'carnews'): ?>current<?php endif; ?> tabli" id="tab8"><a href="<?php echo U('Car/carnews',array('token'=>$token));?>">汽车文章</a></li>
<li class="<?php if(ACTION_NAME == 'carset'): ?>current<?php endif; ?> tabli" id="tab8"><a href="<?php echo U('Car/carset',array('token'=>$token));?>">回复设置</a></li>
<li class="<?php if(ACTION_NAME == 'caronwers'): ?>current<?php endif; ?> tabli" id="tab8"><a href="<?php echo U('Car/caronwers',array('token'=>$token));?>">车主</a></li>
</ul>
</div>
<script>

var editor;
KindEditor.ready(function(K) {
editor = K.create('#info', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '<?php echo U("User/GFile/kindedtiropic");?>',
items : [
'source','undo','plainpaste','wordpaste','clearhtml','quickformat','selectall','fullscreen','fontname', 'fontsize','subscript','superscript','indent','outdent','|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','hr']
});
});
</script>
<script>
   jQuery(document).ready(function(){
      jQuery("#formID").validationEngine();
    });
</script>
<div class="righttitle">
  <h4>添加车系 </h4><a href="javascript:history.go(-1);return false;" class="btn btn-primary" data-top><i class="mdi-content-reply"></i>返回</a>
 </div>
 <!--tab start-->

<!--tab end-->
    <div class=" bgfc" style="margin-top:10px;">
      <form class="form" method="post" action="" id="formID" target="_top" enctype="multipart/form-data">
  <?php if($series['id'] != ''): ?><input type="hidden" name="id" id="id" value="<?php echo ($series['id']); ?>"/><?php endif; ?>
        <table class="table" >
            <tbody>
                <tr>
                    <th width="120">品牌：</th>
                    <td>
                         <select class="form-control"  class="input-medium" name="brand">
                         <?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>@<?php echo ($vo['name']); ?>" <?php if($vo[id] == $bid): ?>selected="selected"<?php endif; ?> ><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                        </select>
                    </td>
                </tr>
               <tr>
                    <th>车系名称：</th>
                    <td>
                        <input type="text" name="name" id="name" class="input-medium px"  data-validation-engine="validate[required,minSize[1]]"
                    data-errormessage-value-missing="必填项!"  value="<?php echo ($series['name']); ?>"/>
                        <span class="maroon">*</span>
                        <span class="help-inline">请添加车系的完整名称，如“奔驰A级”</span>
                    </td>
                </tr>
                <tr>
                    <th width="120">车系简称：</th>
                    <td>
                      <input type="text" name="shortname" id="shortname" class="form-control" data-validation-engine="validate[required,minSize[1],maxSize[4]]"
                    data-errormessage-value-missing="必填项!"  data-rule-maxlength="4" value="<?php echo ($series['shortname']); ?>"/>
                      <span class="maroon">*</span>
                      <span class="help-inline">请添加车系的简称,如“A级”；手机端显示的是车系简称</span>
                    </td>
                </tr>
                <tr>
                    <th width="120">图片：</th>
                    <td>
                        <div class="controls">
                        <?php if($series['picture'] != ''): ?><img class="thumb_img" id="picture_src" src="<?php echo ($series['picture']); ?>" style="max-height: 100px;" /><?php endif; ?>
                                        <input type="text" class="form-control" id="picture" name="picture" value="<?php echo ($series['picture']); ?>" data-validation-engine="validate[required,custom[url]]"
                    data-errormessage-value-missing="必须上传图片!"  data-errormessage-custom-error="如果是手动填写外链,正确的网址,如: http://www.baidu.com/images/demo.png"/>
                                        <span class="maroon">*</span>
                                        <span class="help-inline">
                                            <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('picture',640,180,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('picture')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
                                        </span>
                                        <span class="help-inline">建议图片尺寸640*180，图片大小不超过300K</span>
                                    </div>
                    </td>
                </tr>
                <tr>
                    <th>显示顺序：</th>
                    <td>
                    <input type="text" id="sort" name="sort" value="<?php echo ((isset($series['sort']) && ($series['sort'] !== ""))?($series['sort']):1); ?>" class="form-control" data-validation-engine="validate[required,custom[integer],min[1]]" data-errormessage-value-missing="必填项" /><span class="maroon">*</span>
                        <span class="help-inline">数字越大越靠前</span>
                    </td>
                </tr>
                <tr>
                    <th width="120">车系亮点：</th>
                    <td>
 <textarea name="info" style="width:605px;height:120px"  placeholder="请用简短的文字描述该车系的亮点所在,不超过200字"  id="info"  data-rule-maxlength="200"><?php echo ($series['info']); ?></textarea>

                    </td>
                </tr>
                <th>&nbsp;</th>
                    <td>
                    <input type="hidden" name="token" value="<?php echo ($token); ?>" />
                        <button type="submit" name="button" class="btn btn-primary"><i class="mdi-content-save"></i>保存</button>
                        <a href="javascript:history.go(-1);" class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
  </div>


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