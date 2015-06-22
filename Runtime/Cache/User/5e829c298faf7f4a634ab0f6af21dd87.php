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
<link rel="stylesheet" type="text/css" href="/Public/static/default_user_com.css" media="all">
<script src="/Public/User/js/date/WdatePicker.js"></script>
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="/Public/static/daterangepicker/daterangepicker-bs3.css" />
<script type="text/javascript" src="/Public/static/daterangepicker/moment.js"></script>
<script type="text/javascript" src="/Public/static/daterangepicker/daterangepicker.js"></script>
<link rel="stylesheet" href="/Public/static/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="/Public/static/kindeditor/plugins/code/prettify.css" />
<script src="/Public/static/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="/Public/static/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="/Public/static/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
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

function setlatlng(longitude,lat){
  art.dialog.data('longitude', longitude);
  art.dialog.data('latitude', latitude);
  // 此时 iframeA.html 页面可以使用 art.dialog.data('test') 获取到数据，如：
  // document.getElementById('aInput').value = art.dialog.data('test');
  art.dialog.open("<?php echo U('Map/setLatLng',array('token'=>$token,'id'=>$id));?>",{lock:false,title:'设置经纬度',width:900,height:400,resize:true,yesText:'关闭',background: '#000',opacity: 0.87});
}

</script>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
<div class="righttitle">
  <h4>预约系统设置  ---- <?php if($addtype == 'drive'): ?>预约试驾<?php else: ?>预约保养<?php endif; ?> </h4><!--a href="javascript:history.go(-1);return false;" class="btn btn-primary" data-top>返回</a-->
 </div>
  <div class=" bgfc">
  <form action="" method="post" class="form-horizontal form-validate" novalidate="novalidate">
 <input type="hidden" name="rid" id="rid" value="123"/>
 <input type="hidden" name="addtype" value="<?php echo ($addtype); ?>"/>
<?php if($reslist['id'] != ''): ?><input type="hidden" name="id" id="id" value="<?php echo ($reslist['id']); ?>"/><?php endif; ?>
    <div class="control-group">
        <label for="title" class="control-label">图文消息标题：</label>
        <div class="controls">
           <input type="text" placeholder="请输入图文消息标题" name="title" id="title" class="span4"  value="<?php echo ($reslist['title']); ?>" schoolSet /><span class="maroon">*</span><span class="help-inline">尽量简单，不要超过20字</span>
        </div>
    </div>
    <div class="control-group">
        <label for="keyword" class="control-label">触发关键词：</label>
        <div class="controls">
            <input type="text" name="keyword" id="keyword" class="span4" schoolSet value="<?php echo ($reslist['keyword']); ?>"><span class="maroon">*</span><span class="help-inline">只能设置一个关键字</span>
        </div>
    </div>

    <div class="control-group">
        <label for="coverurl" class="control-label">图文封面：</label>
<!--试驾预约-->
    <?php if($addtype == 'drive'): ?><div class="controls">
      <img class="thumb_img" id="picurl_src" src="<?php echo ((isset($reslist['picurl']) && ($reslist['picurl'] !== ""))?($reslist['picurl']):'/Public/User/images/car/yuyue.jpg'); ?>" style="max-height:100px;">
      <input id="picurl" type="text" class="span4" name="picurl" class="input-xlarge"  schoolSet data-rule-url="true" value="<?php echo ((isset($reslist['picurl']) && ($reslist['picurl'] !== ""))?($reslist['picurl']):'/Public/User/images/car/yuyue.jpg'); ?>" />
          <span class="help-inline">
               <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('picurl',720,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('picurl')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
              <span class="help-inline">建议尺寸：宽720像素，高400像素</span>
          </span>
       </div>
<?php else: ?>
 <div class="controls">
      <img class="thumb_img" id="picurl_src" src="<?php echo ((isset($reslist['picurl']) && ($reslist['picurl'] !== ""))?($reslist['picurl']):'/Public/User/images/car/baoyang.jpg'); ?>" style="max-height:100px;">
      <input id="picurl" type="text" class="span4" name="picurl" class="input-xlarge"  schoolSet data-rule-url="true" value="<?php echo ((isset($reslist['picurl']) && ($reslist['picurl'] !== ""))?($reslist['picurl']):'/Public/User/images/car/baoyang.jpg'); ?>" />
          <span class="help-inline">
               <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('picurl',720,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('picurl')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
              <span class="help-inline">建议尺寸：宽720像素，高400像素</span>
          </span>
       </div><?php endif; ?>
    </div>
     <div class="control-group">
    <label for="address" class="control-label">预约地址：</label>
     <div class="controls">
        <input type="text" name="address" id="address" class="span4"  value="<?php echo ($reslist['address']); ?>" schoolSet  placeholder="请输入接待预约用户的地址"/><span class="maroon">*</span><span class="help-inline">如合肥市政务区南二环路3818号万达广场</span>
    </div>
 </div>
    <div class="control-group">
    <label for="suggestId" class="control-label">地图标识：</label>
         <div class="controls">

          经度 <input type="text" id="longitude"  name="lng" size="14" class="form-control" value="<?php echo ($reslist['lng']); ?>" />
          纬度 <input type="text" id="latitude" name="lat" size="14"  class="form-control" value="<?php echo ($reslist['lat']); ?>" />
          <a class="btn btn-warning btn-sm"  href="###" onclick="setlatlng($('#longitude').val(),$('#latitude').val())"><i class="mdi-maps-pin-drop"></i>在地图中查看/设置</a>
         </div>
    </div>

<div class="control-group">
         <label for="estate_desc" class="control-label">预约电话：</label>
         <div class="controls">
             <input type="text" name="tel" id="tel" class="span4" value="<?php echo ($reslist['tel']); ?>"  schoolSet  placeholder="请输入接收预约的电话号码"/><span class="maroon">*</span><span class="help-inline">如0575-89974522</span>
         </div>
     </div>
     <div class="control-group">
         <label for="project_brief" class="control-label">订单页头部图片：</label>
<!--试驾预约-->
    <?php if($addtype == 'drive'): ?><div class="controls">
             <img class="thumb_img" id="headpic_src" src="<?php echo ((isset($reslist['headpic']) && ($reslist['headpic'] !== ""))?($reslist['headpic']):'/Public/User/images/car/yuyue.jpg'); ?>" style="max-height: 100px;">
              <input id="headpic"type="text"class="input-large" name="headpic" class="span4 px"  schoolSet data-rule-url="true" value="<?php echo ((isset($reslist['headpic']) && ($reslist['headpic'] !== ""))?($reslist['headpic']):'/Public/User/images/car/yuyue.jpg'); ?>" />
            <span class="maroon">*</span>
            <span class="help-inline">
            <a href="###" onclick="gfilePicUpload('headpic',720,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a class="btn btn-warning btn-sm" href="###" onclick="viewImg('headpic')"><i class="mdi-action-pageview"></i>预览</a>
         </div>
<?php else: ?>
 <div class="controls">
             <img class="thumb_img" id="headpic_src" src="<?php echo ((isset($reslist['headpic']) && ($reslist['headpic'] !== ""))?($reslist['headpic']):'/Public/User/images/car/baoyang.jpg'); ?>" style="max-height: 100px;">
              <input id="headpic"type="text"class="input-large" name="headpic" class="span4 px"  schoolSet data-rule-url="true" value="<?php echo ((isset($reslist['headpic']) && ($reslist['headpic'] !== ""))?($reslist['headpic']):'/Public/User/images/car/baoyang.jpg'); ?>" />
            <span class="maroon">*</span>
            <span class="help-inline">
            <a href="###" onclick="gfilePicUpload('headpic',720,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" class="btn btn-warning btn-sm" onclick="viewImg('headpic')"><i class="mdi-action-pageview"></i>预览</a>
         </div><?php endif; ?>

     </div>
     <div class="control-group">
        <label for="traffic_desc" class="control-label">订单详情：</label>
        <div class="controls">
          <textarea class="input-xlarge" id="info" name="info" style="width:560px;height:75px;border:1px #000 solid"  placeholder="显示在图文封面下方，文字请尽量的简洁"><?php echo ($reslist['info']); ?></textarea>
        </div>
    </div>

                                <div class="form-actions">
            <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary"><i class="mdi-content-save"></i>保存</button>　<button type="button" class="btn btn-primary" onclick="javascript:history.back(-1)">取消</button>
        </div>
                        </div>

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