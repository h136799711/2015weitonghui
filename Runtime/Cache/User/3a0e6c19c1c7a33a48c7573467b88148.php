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
<script src="/Public/User/js/date/WdatePicker.js"></script>
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<link rel="stylesheet" href="/Public/static/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="/Public/static/kindeditor/plugins/code/prettify.css" />
<script src="/Public/static/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="/Public/static/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="/Public/static/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="/Public/static/gfile.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
editor = K.create('#estate_desc', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '<?php echo U("User/GFile/kindedtiropic");?>',
items : [
'source','undo','plainpaste','wordpaste','clearhtml','quickformat','selectall','fullscreen','fontname', 'fontsize','subscript','superscript','indent','outdent','|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','hr']
});
editor = K.create('#project_brief', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '<?php echo U("User/GFile/kindedtiropic");?>',
items : [
'source','undo','plainpaste','wordpaste','clearhtml','quickformat','selectall','fullscreen','fontname', 'fontsize','subscript','superscript','indent','outdent','|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','hr']
});
editor = K.create('#traffic_desc', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '<?php echo U("User/GFile/kindedtiropic");?>',
items : [
'source','undo','plainpaste','wordpaste','clearhtml','quickformat','selectall','fullscreen','fontname', 'fontsize','subscript','superscript','indent','outdent','|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','hr']
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
    <link rel="stylesheet" type="text/css" href="/Public/static/default_user_com.css" media="all">
    <div class="righttitle">
    </div>
    <div class=" bgfc">
        <form action="" method="post" class="form-horizontal form-validate" novalidate="novalidate">
            <input type="hidden" name="token" value="<?php echo ($token); ?>" />
            <?php if($es_data['id'] != ''): ?><input type="hidden" name="id" value="<?php echo ($es_data['id']); ?>" /><?php endif; ?>
            <div class="control-group">
                <label for="title" class="control-label">图文消息标题：</label>
                <div class="controls">
                    <input type="text" name="title" id="title" maxlength="10" class="span4" value="<?php echo ($es_data['title']); ?>" schoolSet><span class="maroon">*</span><span class="help-inline">触发关键词后返回图文消息标题</span>
                </div>
            </div>
            <div class="control-group">
                <label for="keyword" class="control-label">触发关键词：</label>
                <div class="controls">
                    <input type="text" name="keyword" id="keyword" class="span4" schoolSet value="<?php echo ($es_data['keyword']); ?>"><span class="maroon">*</span><span class="help-inline">只能设置一个关键字</span>
                </div>
            </div>
            <div class="control-group">
                <label for="coverurl" class="control-label">图文消息封面：</label>
                <div class="controls">
                    <?php if($es_data['cover'] != ''): ?><img class="thumb_img" id="cover_src" src="<?php echo ((isset($es_data['cover']) && ($es_data['cover'] !== ""))?($es_data['cover']):''); ?>" style="max-height:100px;"><?php endif; ?>
                    <input type="input" class="form-control" id="cover" value="<?php echo ((isset($es_data['cover']) && ($es_data['cover'] !== ""))?($es_data['cover']):''); ?>" name="cover" >
                    <span class="help-inline">
                    <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('cover',720,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('cover')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
                    <span class="help-inline">建议尺寸：宽720像素，高400像素</span>
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">楼盘头部图片：</label>
                <div class="controls">
                    <?php if($es_data['banner'] != ''): ?><img class="thumb_img" id="banner_src" src="<?php echo ((isset($es_data['banner']) && ($es_data['banner'] !== ""))?($es_data['banner']):''); ?>" style="max-height:100px;"><?php endif; ?>
                    <input type="text" id="banner" name="banner" class="form-control" value="<?php echo ((isset($es_data['banner']) && ($es_data['banner'] !== ""))?($es_data['banner']):''); ?>">
                    <span class="help-inline">
                    <a href="###" onclick="gfilePicUpload('banner',720,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('banner')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
                    <span class="help-inline">建议尺寸：宽720像素，高350像素</span>
                    </span>
                </div>
            </div>
            <div class="control-group">
                <div class="control-group">
                    <label class="control-label">户型头部图片：</label>
                    <div class="controls">
                        <?php if($es_data['house_banner']): ?><img class="thumb_img" id="house_banner_src" src="<?php echo ((isset($es_data['house_banner']) && ($es_data['house_banner'] !== ""))?($es_data['house_banner']):''); ?>" style="max-height:100px;"><?php endif; ?>
                        <input type="text" name="house_banner" id="house_banner" class="form-control" value="<?php echo ((isset($es_data['house_banner']) && ($es_data['house_banner'] !== ""))?($es_data['house_banner']):''); ?>">
                        <span class="help-inline">
                        <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('house_banner',720,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('house_banner')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
                        <span class="help-inline">建议尺寸：宽720像素，高350像素</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label for="album_title" class="control-label">全景相册名称：</label>
                <div class="controls">
                    <select class="form-control"  id="panorama_id" name="panorama_id" class="input-medium" schoolSet>
                        <option value="0">请选择360全景相册</option>
                        <?php if(is_array($panorama)): $i = 0; $__LIST__ = $panorama;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['pid']); ?>" <?php if($vo['pid'] == $es_data['panorama_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <span class="maroon">*</span>
                    <span class="help-inline">如果没有，请先到 <a href="<?php echo U('Panorama/add',array('token'=>$token));?>" class="btn btn-warning btn-sm">360°全景</a>添加</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">楼盘新闻：</label>
                <div class="controls">
                    <select class="form-control"  id="classify_id" name="classify_id" class="input-medium" schoolSet>
                        <option value="0">请选择3G楼盘新闻</option>
                        <?php if(is_array($classify)): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cid']); ?>" <?php if($vo['cid'] == $es_data['classify_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <span class="maroon">*</span>
                    <span class="help-inline">如果没有，请先到<a href="<?php echo U('Classify/add',array('token'=>$token));?>" class="btn btn-warning btn-sm">文章分类管理</a>添加</span> <span class="maroon">注意：只能添加［图文回复］的［新增图文自定义回复］！</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">预约版面：</label>
                <div class="controls">
                    <select class="form-control"  id="res_id" name="res_id" class="input-medium" schoolSet>
                        <option value="0">请选择预约版面</option>
                        <?php if(is_array($reslist)): $i = 0; $__LIST__ = $reslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['rid']); ?>" <?php if($vo['rid'] == $es_data['res_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <span class="maroon">*</span>
                    <span class="help-inline">如果没有，请先到<a href="<?php echo U('Reservation/index',array('token'=>$token));?>" class="btn btn-warning btn-sm"> 预约管理</a>添加</span>
                </div>
            </div>
            <div class="control-group">
                <label for="video" class="control-label">楼盘视频：</label>
                <div class="controls">
                    <input type="text" name="video" id="video" class="span4" style="width:480px" value="<?php echo ($es_data['video']); ?>"><p>
                    支持优酷视频地址如：http://v.youku.com/v_show/id_XNDA1ODEyNjE2.html <br>
                    腾讯fash视频地址：如http://static.video.qq.com/TPout.swf?vid=v0119s27wd5&amp;auto=0 <br>
                    也支持mp4和ogg 格式地址 http://www.w3school.com.cn/example/html5/mov_bbb.mp4 </p>
                </div>
            </div>
            <script>
            function setlatlng(longitude,latitude){
            art.dialog.data('longitude', longitude);
            art.dialog.data('latitude', latitude);
            // 此时 iframeA.html 页面可以使用 art.dialog.data('test') 获取到数据，如：
            // document.getElementById('aInput').value = art.dialog.data('test');
            art.dialog.open('<?php echo U('Map/setLatLng',array('token'=>$token,'id'=>$id));?>',{lock:false,title:'设置经纬度',width:900,height:400,resize:true,yesText:'关闭',background: '#000',opacity: 0.87});
            }
            </script>
            <div class="control-group">
                <label for="place" class="control-label">楼盘地址地址：</label>
                <div class="controls">
                    <div class="input-prepend">
                        <input type="text" id="suggestId" class="span4 px"  name="place" value="<?php echo ($es_data['place']); ?>" class="input-xlarge" schoolSet> <span class="maroon">*</span>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label for="suggestId" class="control-label">地图标识：</label>
                <div class="controls">
                    经度 <input type="text" id="longitude"  name="lng" size="14" class="form-control" value="<?php echo ($es_data['lng']); ?>" /> 纬度 <input type="text"  name="lat" size="14" id="latitude" class="form-control" value="<?php echo ($es_data['lat']); ?>" /> <a href="###" onclick="setlatlng($('#longitude').val(),$('#latitude').val())" class="btn btn-warning btn-sm"><i class="mdi-maps-pin-drop"></i>在地图中查看/设置</a>
                </div>
            </div>
            <div class="control-group">
                <label for="estate_desc" class="control-label">楼盘简介：</label>
                <div class="controls">
                    <textarea class="form-control" id="estate_desc" name="estate_desc" style="width: 605px; height: 150px;"><?php echo ($es_data['estate_desc']); ?></textarea>
                </div>
            </div>
            <div class="control-group">
                <label for="project_brief" class="control-label">项目简介：</label>
                <div class="controls">
                    <textarea class="form-control" id="project_brief" name="project_brief" style="width: 605px; height: 150px; "><?php echo ($es_data['project_brief']); ?></textarea>
                </div>
            </div>
            <div class="control-group">
                <label for="traffic_desc" class="control-label">交通配套：</label>
                <div class="controls">
                    <textarea class="form-control" id="traffic_desc" name="traffic_desc" style="width: 605px; height: 150px; "><?php echo ($es_data['traffic_desc']); ?></textarea>
                </div>
            </div>
            <?php if($es_data['id'] != ''): ?><input type="hidden" name="id" value="<?php echo ($es_data['id']); ?>" /><?php endif; ?>
            <div class="form-actions">
                <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary"><i class="mdi-content-save"></i>保存</button>　<button type="button" class="btn btn-primary" onclick="javascript:history.back(-1);">取消</button>
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