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
<!--link rel="stylesheet" href="/Public/static/vote/style.css" /-->
<script src="/Public/static/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="/Public/static/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="/Public/static/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/vote/common.js" type="text/javascript"></script>
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default" type="text/javascript"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js" type="text/javascript"></script>

<script type="text/javascript">

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
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">

<div class="righttitle">
  <h4> <?php if($vo['type'] == 'img' OR ($type == 'img')): ?>图片<?php else: ?>文本<?php endif; ?>投票设置 </h4><a href="<?php echo U('Vote/index');?>" class="btn btn-primary" data-top><i class="mdi-content-reply"></i>返回</a>
 </div>

         <div class=" bgfc">
<form class="form" method="post" action="" target="_top" enctype="multipart/form-data">
<?php if($vo['id'] != ''): ?><input type="hidden" name="id" value="<?php echo ($vo['id']); ?>"><?php endif; ?>
<table class="table" ><tbody><tr>
<th width="120">关键词：</th>
<td><input type="text" name="keyword" value="<?php if($vo['keyword'] == ''): ?>投票<?php else: echo ($vo["keyword"]); endif; ?>" class="form-control" style="width:550px;"><br><span class="red">只能写一个关键词,功能面板必须开启投票</span></td>
</tr>
                            <tr>
<th width="120">投票标题：</th>
<td><input type="text" name="title" value="<?php echo ($vo["title"]); ?>" class="form-control" style="width:550px;"></td>
</tr>
<tr>
<th>投票图片：</th>
<td>
<?php if($reslist['picurl'] != ''): ?><img class="thumb_img" id="picurl_src" src="<?php echo ($reslist['picurl']); ?>" style="max-height:100px;"><?php endif; ?>
<input type="text" name="picurl" value="<?php echo ($vo["picurl"]); ?>" class="form-control" onclick="document.getElementById('picurl_src').src=this.value;" id="picurl" style="width:300px;">
 <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('picurl',700,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('picurl')"  class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>&nbsp;填写图片外链地址，大小为720x400</td>
</tr>
<tr>
<th>图片显示：</th>
<td><label>
<input type="radio" name="showpic" value="1" checked="checked" id="showpic2">
显示在投票页面</label>
<label>
<input name="showpic" type="radio" id="showpic1" value="0">
不显示在投票页面</label>
</td>
</tr>
<tr>
<th valign="top">投票说明：</th>
<td valign="top"><textarea class="form-control" id="info" name="info" style="width: 560px; height: 120px; display: ;"><?php echo html_entity_decode(htmlspecialchars_decode($vo['info'])); ?></textarea></td>
</tr>
<tr>
<th valign="top">投票选项：</th>
<td valign="top"><div class="bdrcontent ">
<div id="div_ptype">
<table class="table table-condensed table-bordered table-striped" border="0" cellspacing="0" cellpadding="0" width="100%">

<script type="text/javascript">


function addDeltbody(i) {

    //document.getElementById("div_add_del_" + i).value = "";
    //document.getElementById("svalue" + i).value = "";
    if (i != 1) {
       document.getElementById("div_add_del_" + i).style.display = "none";
       document.getElementById("add" + i).style.display = "";
    }
}
function addTabody(i) {

     document.getElementById('div_add_del_' + i).style.display = "";
     document.getElementById('add' + i).style.display = "none";
}

function delrow(obj, tbody,objid) {

  $$(tbody).removeChild(obj.parentNode.parentNode);

   var obj = {id:objid}
        $.post("<?php echo U('Vote/del_tab');?>", obj,
            function(data) {

            },
        "json");
}



  </script>
<tbody>
<tr>

    <td width="260">选项标题</td>
    <td width="50">排序</td>
     <td width="50">票数</td>
    <?php if($vo['type'] == 'img' OR $type == 'img'): ?><td width="260">图片外链地址</td>
    <td width="260">图片跳转地址以http://开头</td><?php endif; ?>
    <td class="norightborder"></td>
</tr>
</tbody>
<?php if($items != ''): if(is_array($items)): $i = 0; $__LIST__ = $items;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ivo): $mod = ($i % 2 );++$i;?><tbody id="div_add_del_<?php echo ($i+50); ?>" name="div_add_del">
<tr>
    <input type="hidden" name="add[id][]"   value="<?php echo ($ivo["id"]); ?>" style="width:20px;">
    <td width="120"><input type="text" name="add[item][]" value="<?php echo ($ivo["item"]); ?>" class="form-control" style="width:120px;"></td>
    <td width="20"><input type="text" name="add[rank][]" value="<?php echo ($ivo["rank"]); ?>" style="width:20px;" class="form-control"></td>
    <td width="20"><input type="text" name="add[vcount][]" value="<?php echo ($ivo["vcount"]); ?>" style="width:20px;" class="form-control"></td>
    <?php if($vo['type'] == 'img' OR $type == 'img'): ?><td width="200">
<?php if($ivo['startpicurl'] != ''): ?><img class="thumb_img" id="startpicurl_<?php echo ($i+50); ?>_src" src="<?php echo ($ivo['startpicurl']); ?>" style="max-height:100px;display: none;"><?php endif; ?>
      <input type="text" name="add[startpicurl][]" value="<?php echo ($ivo["startpicurl"]); ?>" class="form-control" onclick="document.getElementById('startpicurl_<?php echo ($i+50); ?>_src').src=this.value;" id="startpicurl_<?php echo ($i+50); ?>" style="width:130px;">
<a href="###" onclick="gfilePicUpload('startpicurl_<?php echo ($i+50); ?>',700,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="### " class="btn btn-warning btn-sm" onclick="viewImg('startpicurl_<?php echo ($i+50); ?>')"><i class="mdi-action-pageview"></i>预览</a>
</td>
    <td width="260"><input type="text" name="add[tourl][]" value="<?php echo ($ivo["tourl"]); ?>" style="width:100px;" class="form-control"></td><?php endif; ?>

    <td width="50" class="norightborder"><a class="btn btn-warning btn-sm" href="javascript:;" onclick="delrow(this, 'div_add_del_<?php echo ($i+50); ?>',<?php echo ($ivo["id"]); ?>);"><i class="mdi-action-delete"></i>删除</a></td>
</tr>
 </tbody><?php endforeach; endif; else: echo "" ;endif; endif; ?>

<tbody id="div_add_del_1" name="div_add_del">
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:20px;" >
        <td width="120">
            <input type="text" name="add[item][]" value="" placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="form-control">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="form-control">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_1_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" placeholder="图片[http://]" value="" class="form-control"
          onclick="document.getElementById('startpicurl_1_src').src=this.value;" id="startpicurl_1" style="width:130px;">
          <a href="###" onclick="gfilePicUpload('startpicurl_1',700,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>
          <a href="###" onclick="viewImg('startpicurl_1')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
            <!--input type="text" name="add[startpicurl][]" id="startpicurl_1" value="<?php echo ($ivo["startpicurl"]); ?>" class="form-control"  style="width:50px;"-->
        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="form-control" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" class="btn btn-warning btn-sm" onclick="addDeltbody(1)"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add2" onclick="addTabody(2)" class="btn btn-warning btn-sm"><i class="mdi-content-add">添加</i></a></td>
    </tr>
</tbody>

<tbody id="div_add_del_2" name="div_add_del" style="display:none">
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:20px;" >
        <td width="120">
            <input type="text" name="add[item][]" value="" placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="form-control">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="form-control">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_2_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片[http://]" class="form-control"
          onclick="document.getElementById('startpicurl_2_src').src=this.value;" id="startpicurl_2" style="width:130px;">
          <a href="###" onclick="gfilePicUpload('startpicurl_2',700,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>
          <a href="###" class="btn btn-warning btn-sm" onclick="viewImg('startpicurl_2')"><i class="mdi-action-pageview"></i>预览</a>

        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="form-control" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" class="btn btn-warning btn-sm" onclick="addDeltbody(2)"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" class="btn btn-warning btn-sm" id="add3" onclick="addTabody(3)"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_3" name="div_add_del" style="display:none">
    <tr >
      <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value="" placeholder="请填写选项标题"  class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="form-control">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="form-control">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_3_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="form-control"
          onclick="document.getElementById('startpicurl_3_src').src=this.value;" id="startpicurl_3" style="width:130px;">
          <a href="###" onclick="gfilePicUpload('startpicurl_3',700,400,'<?php echo ($token); ?>')" class="a_upload" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>
          <a href="###" onclick="viewImg('startpicurl_3')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>

        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="form-control" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a class="btn btn-warning btn-sm" href="javascript:;" onclick="addDeltbody(3)"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add4" class="btn btn-warning btn-sm" onclick="addTabody(4)"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>


<tbody id="div_add_del_4" name="div_add_del" style="display:none">
    <tr >
      <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]"  placeholder="请填写选项标题" value="" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="form-control">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="form-control">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_4_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value=""  placeholder="图片外链须加[http://]" class="form-control"
          onclick="document.getElementById('startpicurl_4_src').src=this.value;" id="startpicurl_4" style="width:130px;">
          <a href="###" onclick="gfilePicUpload('startpicurl_4',700,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>
          <a href="###" onclick="viewImg('startpicurl_4')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>

        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="form-control" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a class="btn btn-warning btn-sm" href="javascript:;" onclick="addDeltbody(4)"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add5" class="btn btn-warning btn-sm" onclick="addTabody(5)"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>


<tbody id="div_add_del_5" name="div_add_del" style="display:none">
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value=""  placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="form-control">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="form-control">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_5_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="form-control"
          onclick="document.getElementById('startpicurl_5_src').src=this.value;" id="startpicurl_5" style="width:130px;">
          <a href="###" onclick="gfilePicUpload('startpicurl_5',700,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>
          <a href="###" onclick="viewImg('startpicurl_5')"  class="btn btn-warning btn-sm"> <i class="mdi-action-pageview"></i>预览</a>

        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="form-control" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(5)" class="btn btn-warning btn-sm"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add6" class="btn btn-warning btn-sm" onclick="addTabody(6)"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_6" name="div_add_del" style="display:none">
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value=""  placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="form-control">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="form-control">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_6_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="form-control"
          onclick="document.getElementById('startpicurl_6_src').src=this.value;" id="startpicurl_6" style="width:130px;">
          <a href="###" onclick="gfilePicUpload('startpicurl_6',700,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>
          <a href="###" onclick="viewImg('startpicurl_6')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>

        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="form-control" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" class="btn btn-warning btn-sm" onclick="addDeltbody(6)"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" class="btn btn-warning btn-sm" id="add7" onclick="addTabody(7)"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_7" name="div_add_del" style="display:none">
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value=""  placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="form-control">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="form-control">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_7_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="form-control"
          onclick="document.getElementById('startpicurl_7_src').src=this.value;" id="startpicurl_7" style="width:130px;">
          <a href="###" onclick="gfilePicUpload('startpicurl_7',700,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>
          <a href="###" class="btn btn-warning btn-sm" onclick="viewImg('startpicurl_7')"><i class="mdi-action-pageview"></i>预览</a>

        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="form-control" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a class="btn btn-warning btn-sm" href="javascript:;" onclick="addDeltbody(7)"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add8" onclick="addTabody(8)"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>
<tbody id="div_add_del_8" name="div_add_del" style="display:none">
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value=""  placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="form-control">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="form-control">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_8_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="form-control"
          onclick="document.getElementById('startpicurl_8_src').src=this.value;" id="startpicurl_8" style="width:130px;">
          <a href="###" onclick="gfilePicUpload('startpicurl_8',700,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm" ><i class="mdi-file-file-upload"></i>上传</a>
          <a href="###" onclick="viewImg('startpicurl_8')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>

        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="form-control" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" class="btn btn-warning btn-sm" onclick="addDeltbody(8)"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add9" class="btn btn-warning btn-sm" onclick="addTabody(9)"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>
<tbody id="div_add_del_9" name="div_add_del" style="display:none">
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value=""  placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="form-control">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="form-control">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_9_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="form-control"
          onclick="document.getElementById('startpicurl_9_src').src=this.value;" id="startpicurl_9" style="width:130px;">
          <a href="###" onclick="gfilePicUpload('startpicurl_9',700,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>
          <a href="###" onclick="viewImg('startpicurl_9')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>

        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="px " style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" class="btn btn-warning btn-sm" onclick="addDeltbody(9)"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" class="btn btn-warning btn-sm" id="add10" onclick="addTabody(10)"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_10" name="div_add_del" style="display:none">
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value=""  placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="form-control">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="form-control">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_10_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片[http://]" class="form-control"
          onclick="document.getElementById('startpicurl_10_src').src=this.value;" id="startpicurl_10" style="width:130px;">
          <a href="###" onclick="gfilePicUpload('startpicurl_10',700,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>
          <a href="###" class="btn btn-warning btn-sm" onclick="viewImg('startpicurl_10')"><i class="mdi-action-pageview"></i>预览</a>

        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="form-control" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a class="btn btn-warning btn-sm" href="javascript:;" onclick="addDeltbody(10)"><i class="mdi-action-delete"></i>删除</a>
          </td>
    </tr>
</tbody>
<tbody>
        <tr>
            <td colspan="4" class="norightborder">
              排序默认为1，票数默认为0，如果是图片投票必须添加图片,图片跳转地址没有可以不填写。

        </tr>

  </tbody>
</table>

</div>
</div>

</td>
</tr>
<tr>
<th>单选/多选：</th>
<td>
  <p style="width: 120px; float: left; display: block; line-height: 32px; height: 32px;">
    <select class="form-control"  name="cknums" class="input-medium">
      <option value="1" <?php if($vo['cknums'] == 1): ?>selected<?php endif; ?>>单选</option>
      <option value="2" <?php if($vo['cknums'] == 2): ?>selected<?php endif; ?>>多选</option>
    </select>

</p>
</td>
</tr>

<tr>
<th>截至时间：</th>
<td><input type="input" class="form-control" id="statdate" value="<?php if($vo['statdate'] != ''): echo (date("Y-m-d",$vo["statdate"])); endif; ?>" onClick="WdatePicker()" name="statdate">
到
<input type="input" class="form-control" id="enddate" value="<?php if($vo['enddate'] != ''): echo (date("Y-m-d",$vo["enddate"])); endif; ?>" name="enddate" onClick="WdatePicker()"></td>
</tr>
<!--
<tr>
<th>投票结果：</th>
<td>
<label>
<input name="display" type="radio" <?php if($vo['display'] == 1): ?>checked<?php endif; ?>  value="1" id="RadioGroup2_1">
投票前可见</label>
<label>
<input name="display" type="radio" <?php if($vo['display'] == 0): ?>checked <?php else: ?> checked<?php endif; ?> id="RadioGroup2_0" value="0">
投票后可见</label>
<label>
<input name="display" type="radio" <?php if($vo['display'] == 2): ?>checked<?php endif; ?>id="RadioGroup2_2" value="2">
投票结束可见</label>

</td>
</tr>

-->
<tr>
<th>&nbsp;</th>
<td><button type="submit" name="button" class="btn btn-primary"><i class="mdi-content-save"></i>保存</button>
<a href="<?php echo U('Vote/index');?>" class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a>
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