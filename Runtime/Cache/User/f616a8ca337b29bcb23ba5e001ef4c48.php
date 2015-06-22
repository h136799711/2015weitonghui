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
<link rel="stylesheet" type="text/css" href="/Public/static/default_user_com.css" media="all">
<script src="/Public/User/js/date/WdatePicker.js"></script>
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="/Public/static/daterangepicker/daterangepicker-bs3.css" />
<script type="text/javascript" src="/Public/static/daterangepicker/moment.js"></script>
<script type="text/javascript" src="/Public/static/daterangepicker/daterangepicker.js"></script>

<link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>

<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
 <script>
    jQuery(document).ready(function(){
      jQuery("#formID").validationEngine();
    });
    </script>
<style>
    .tooltips span {
display: none;
}
    .tooltips:hover span {
        text-align:left;
        display: block;
        position: absolute;
        margin:0 auto;
        width: 310px;
        border: 1px solid #CCC;
        background-color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
        border-radius: 6px;
        padding: 10px;
        font-size: 12px;
        line-height: 22px;
        color: #333;
    }

</style>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">

<!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->
<div class="tab">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if(ACTION_NAME == 'index'): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Medical/index',array('token'=>$token,'addtype'=>'medical'));?>">挂号设置</a></li>
<li class="<?php if(ACTION_NAME == 'reser_manage'): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Medical/reser_manage',array('token'=>$token));?>">预约管理</a></li>
<!-- <li class="<?php if(ACTION_NAME == 'housetype'): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Medical/searchMedical',array('token'=>$token));?>">预约查询</a></li>
<li class="<?php if(ACTION_NAME == 'album'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Medical/totalMedical',array('token'=>$token));?>">预约统计</a></li> -->
<li class="<?php if(ACTION_NAME == 'aboutus'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Medical/aboutus',array('token'=>$token));?>">医院简介</a></li>
<li class="<?php if(ACTION_NAME == 'setIndex'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Medical/setIndex',array('token'=>$token));?>">首页配置</a></li>
</ul>
</div>
<div class="righttitle">
  <h4>挂号设置</h4><a href="javascript:history.go(-1);return false;" class="btn btn-primary" data-top><i class="mdi-content-reply"></i>返回</a>
 </div>
  <div class=" bgfc">
  <form action="" method="post" id="formID" class="form-horizontal form-validate" novalidate="novalidate">
 <input type="hidden" name="rid" id="rid" value="123"/>
 <?php if($reslist['id'] != ''): ?><input type="hidden" name="id" id="id" value="<?php echo ($reslist['id']); ?>"/><?php endif; ?>
    <div class="control-group">
        <label for="title" class="control-label">图文消息标题：</label>
        <div class="controls">
           <input type="text" placeholder="请输入图文消息标题" name="title" id="title" class="span4"  data-validation-engine="validate[required,minSize[2],maxSize[25]]" data-errormessage-value-missing="必填项"  value="<?php echo ($reslist['title']); ?>" schoolSet /><span class="maroon">*</span><span class="help-inline">尽量简单，不要超过25字</span>
        </div>
    </div>

    <div class="control-group">
        <label for="coverurl" class="control-label">图文封面：</label>
       <div class="controls">
      <img class="thumb_img" id="picurl_src" src="<?php echo ((isset($reslist['picurl']) && ($reslist['picurl'] !== ""))?($reslist['picurl']):'/Public/User/images/medical_default.png'); ?>" style="max-height:100px;">
      <input id="picurl" type="text" class="span4" name="picurl" class="input-xlarge"  schoolSet  value="<?php echo ((isset($reslist['picurl']) && ($reslist['picurl'] !== ""))?($reslist['picurl']):'/Public/User/images/medical_default.png'); ?>" data-validation-engine="validate[required,custom[url]]"
                    data-errormessage-value-missing="必须上传图片!"  data-errormessage-custom-error="如果是手动填写,正确的网址,如: http://www.baidu.com/images/demo.png"/>
          <span class="help-inline">
               <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('picurl',720,400,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('picurl')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
              <span class="help-inline">建议尺寸：宽720像素，高400像素</span>
          </span>
       </div>
    </div>

      <div class="control-group">
         <label for="project_brief" class="control-label">挂号页头部图片:</label>
          <div class="controls">
             <img class="thumb_img" id="headpic_src" src="<?php echo ((isset($reslist['headpic']) && ($reslist['headpic'] !== ""))?($reslist['headpic']):'/Public/User/images/medical_default.png'); ?>" style="max-height: 100px;">
              <input id="headpic"type="text"class="input-large" name="headpic" class="span4 px"  schoolSet data-rule-url="true" value="<?php echo ((isset($reslist['headpic']) && ($reslist['headpic'] !== ""))?($reslist['headpic']):'/Public/User/images/medical_default.png'); ?>" data-validation-engine="validate[required,custom[url]]"
                    data-errormessage-value-missing="必须上传图片!"  data-errormessage-custom-error="如果是手动填写,正确的网址,如: http://www.baidu.com/images/demo.png"/>
            <span class="maroon">*</span>
            <span class="help-inline">
            <a href="###" onclick="gfilePicUpload('headpic',640,109,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('headpic')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
            <span class="help-inline">建议尺寸：宽640像素，高109像素</span>
         </div>
        <script>
function setlatlng(longitude,latitude){
  art.dialog.data('longitude', longitude);
  art.dialog.data('latitude', latitude);
  art.dialog.open('<?php echo U('Map/setLatLng',array('token'=>$token,'id'=>$id));?>',{lock:false,title:'设置经纬度',width:900,height:400,resize:true,yesText:'关闭',background: '#000',opacity: 0.87});
}
</script>
     <div class="control-group">
                                <label for="address" class="control-label">医院详细地址:</label>
                                <div class="controls">
                                    <input type="text" name="address" id="address" class="span4"  value="<?php echo ($reslist['address']); ?>" schoolSet  placeholder="请输入接待预约用户的地址" data-validation-engine="validate[required,minSize[5]]" data-errormessage-value-missing="必填项" /><span class="maroon">*</span><span class="help-inline">如合肥市政务区南二环路3818号某某医院</span>
                                </div>
                             </div>
    <div class="control-group">
    <label for="suggestId" class="control-label">地图标识：</label>
         <div class="controls">
          <span class="maroon">注意：这个只是模糊定位，准确位置请地图上标注！</span><br />
                经度 <input type="text" id="longitude"  name="lng" size="14" class="span4" value="<?php echo ($reslist['lng']); ?>" />
                纬度 <input type="text"  name="lat" size="14" id="latitude" class="span4" value="<?php echo ($reslist['lat']); ?>" />
                <a class="btn btn-warning btn-sm" href="###" onclick="setlatlng($('#longitude').val(),$('#latitude').val())"><i class="mdi-maps-pin-drop"></i>在地图中查看/设置</a>
         </div>
    </div>

<div class="control-group">
         <label for="estate_desc" class="control-label">医院电话：</label>
         <div class="controls">
             <input type="text" name="tel" id="tel" class="span4" value="<?php echo ($reslist['tel']); ?>"
             data-validation-engine="validate[required,custom[tel]]" data-errormessage-value-missing="必填项"   placeholder="请输入接收预约的电话号码"/><span class="maroon">*</span><span class="help-inline">如 0575-89974522</span>
         </div>
     </div>

     </div>
     <div class="control-group">
        <label for="traffic_desc" class="control-label">图文简介：</label>
        <div class="controls">
          <textarea class="form-control" id="info" name="info" style="width:560px;height:75px"  data-validation-engine="validate[required,minSize[5]]" data-errormessage-value-missing="必填项"  placeholder="显示在图文封面下方，文字请尽量的简洁"><?php echo ($reslist['info']); ?></textarea>
        </div>
    </div>
<div class="control-group">
      <label for="typename" class="control-label">预约信息设置：</label>
       <div class="controls">
           <input type="text" class="span4" name="typename" value="<?php echo ((isset($reslist['typename']) && ($reslist['typename'] !== ""))?($reslist['typename']):'我的挂号订单'); ?>" id="typename" schoolSet />
    <span class="maroon">*</span><span class="help-inline">修改用户手机中“我的订单”栏目的名称，您可以将其修改成诸如“挂号订单”、“我的订单”等</span>
       </div>
</div>
<div class="control-group" style="display: none;">
 <label for="typename2" class="control-label">重命名订单说明：</label>
<div class="controls">
    <input type="text" class="span4" name="typename2" value="<?php echo ((isset($reslist['typename2']) && ($reslist['typename2'] !== ""))?($reslist['typename2']):'订单说明'); ?>" id="typename2"/>
     <span class="maroon">*</span><span class="help-inline">用户修改用户手机中“订单说明”栏目的名称，您可以将其修改成诸如“预约说明”、“试驾说明”等</span>
 </div>
</div>
<div class="control-group" style="display: none;">
    <label for="typename3" class="control-label">预约信息设置：</label>
    <div class="controls">
         <input type="text" class="span4" name="typename3" value="<?php echo ((isset($reslist['typename3']) && ($reslist['typename3'] !== ""))?($reslist['typename3']):'订单电话'); ?>" id="typename3"/>
         <span class="maroon">*</span><span class="help-inline">用户修改用户手机中“订单电话”栏目的名称，您可以将其修改成诸如“预约电话”、“试驾电话”等</span>
     </div>
</div>




    <script type="text/javascript">
    $(function () {
         $("input[type='radio']").click(function () {
            var $this = $(this), $val = $this.val(), $div = $this.parents(".control-group");
            if ($val == 1) {
                $div.next().show();
                $div.next().next().hide();
                $("#type1").show();
                $("#type2").hide();
                $("#type3").hide();
            } else {
                $div.next().next().show();
                $div.next().hide();
                if($val == 2){
                    $("#type2").show();
                    $("#type1").hide();
                    $("#type3").hide();
                }else{
                    $("#type3").show();
                    $("#type1").hide();
                    $("#type2").hide();
                }
            }
         })
            </script>

<script>
function dodelit(i) {
   document.getElementById("txt" + i).value = "";
   document.getElementById("value" + i).value = "";
   if (i != 1) {
       document.getElementById("trtxt" + i).style.display = "none";
       document.getElementById("add" + i).style.display = "";
   }
}
   function doaddit(i) {

    document.getElementById('trtxt' + i).style.display = "";
   document.getElementById('add' + i).style.display = "none";
}

function sdodelit(i) {

    document.getElementById("select" + i).value = "";
    document.getElementById("svalue" + i).value = "";
    if (i != 1) {
        document.getElementById("strtxt" + i).style.display = "none";
       document.getElementById("sadd" + i).style.display = "";
    }
}
function sdoaddit(i) {

     document.getElementById('strtxt' + i).style.display = "";
     document.getElementById('sadd' + i).style.display = "none";
}
  </script>

<div class="control-group" >
        <label for="tel" class="control-label">订单内容设置：</label>
        <div class="controls">
            <span class="help-inline">填写你要收集的内容！订单默认选项不可以修改删除！<font color="red">如果手动添加的项想删除,把[字段名称]\[初始内容]里的值清空提交即可.</font></span>
<table id="listTable" class="ListProduct table table-bordered table-hover dataTable">
    <thead>
        <tr>
            <th>字段类型</th>
             <th>字段名称</th>
             <th>初始内容</th>

            <th>操作</th>
        </tr>
    </thead>
<tbody>
    <tr>
        <td>单行文字：</td>
        <td>
            <input  type="button" disabled="disabled" value="患者姓名" readonly="readonly"></td>
        <td>
            <input   type="button" disabled="disabled"  value="请输入您的名字" readonly="readonly"></td>

        <td>
            <label class="checkbox">
                <input type="checkbox"     checked="checked" name="name_show" value="1">是否显示
             </label>
        </td>
     </tr>
    <tr>
        <td>单行文字：</td>
        <td>
             <input type="button" disabled="disabled"  value="联系电话" readonly="readonly"></td>
        <td>
            <input  type="button" disabled="disabled" value="请输入您的电话" readonly="readonly"></td>

        <td>
            <label class="checkbox">
                <input type="checkbox"  checked="checked"   name="tel_show" value="1">是否显示
            </label>
        </td>
    </tr>
    <tr>
        <td>日期选择：</td>
        <td>
            <input  type="button" disabled="disabled"  value="预约日期" ></td>
        <td>
            <input  type="button" disabled="disabled" value="请输入预约日期"></td>

        <td>
            <label class="checkbox">
                <input type="checkbox"   checked="checked" name="date_show" value="1">是否显示
            </label>
         </td>
    </tr>
     <tr style="display: none;">
        <td>时间选择：</td>
        <td>
             <input name=" " type="text" disabled="disabled" class="px wizard-ignore" value="预约时间" onchange="$('odid').value='请输入'+this.value;"></td>
        <td>
            <input name="add[order][]" type="text" disabled="disabled" id="odid" class="px wizard-ignore" value="请输入预约时间"></td>

        <td>
            <label class="checkbox">
                <input type="checkbox"  checked="checked" name="time_show" value="1">是否显示
             </label>
        </td>
    </tr>
    <tr>
    <td>单行文字：</td>
    <td>
        <input type="button" disabled="disabled"   value="患者性别"></td>
    <td>
        <!--input name="value1" class="form-control" id="value1" type="text" value="<?php echo ($reslist['value1']); ?>"-->
        <select class="form-control"  name="value1" >
            <option value="1">男</option>
            <option value="2">女</option>
        </select>
    </td>

    <td>

    </td>
  </tr>
<tr    >
    <td>单行文字：</td>
    <td>
        <input type="button" disabled="disabled" value="患者年龄"></td>
    <td>
        <input disabled="disabled" type="button" value="请输入您的年龄"></td>

    <td>

    </td>
</tr>
<tr id="trtxt1" >
<td>单行文字：</td>
<td>
    <input type="text" class="form-control" name="txt3" id="txt1" value="<?php echo ($reslist['txt3']); ?>"></td>
<td>
    <input name="value3" class="form-control" id="value1" type="text" value="<?php echo ($reslist['value3']); ?>"></td>

<td>
<p><?php if($reslist['txt4'] == ''): ?><a class="btn btn-warning btn-sm" id="add2" href="javascript:doaddit(2)"><i class="mdi-content-add"></i>添加</a><?php endif; ?>　<a class="btn btn-warning btn-sm" href="javascript:dodelit(1)"><i class="mdi-action-delete"></i>删除</a><span class="tooltips"><img src="/tpl/Home/gooraye/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
</td> </tr>
                                            <tr id="trtxt2" <?php if($reslist['txt4'] == ''): ?>style="display: none"<?php endif; ?> >
                                                <td>单行文字：</td>
                                                <td>
                                                    <input type="text" class="form-control" name="txt4" id="txt2" value="<?php echo ($reslist['txt4']); ?>"></td>
                                                <td>
                                                    <input name="value4" class="form-control" id="value2" type="text" value="<?php echo ($reslist['value4']); ?>"></td>
                                                <td>
                                                    <p><?php if($reslist['txt5'] == ''): ?><a class="btn btn-warning btn-sm" id="add3" href="javascript:doaddit(3)"><i class="mdi-content-add"></i>添加</a><?php endif; ?>　<a href="javascript:dodelit(2)" class="btn btn-warning btn-sm"><i class="mdi-action-delete"></i>删除</a> <span class="tooltips"><img src="/tpl/Home/gooraye/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
                                                </td>
                                            </tr>
                                            <tr id="trtxt3"  <?php if($reslist['txt5'] == ''): ?>style="display: none"<?php endif; ?>>
                                                <td>单行文字：</td>
                                                <td>
                                                    <input type="text" class="form-control" name="txt5" id="txt3" value="<?php echo ($reslist['txt5']); ?>"></td>
                                                <td>
                                                    <input name="value5" class="form-control" id="value3" type="text" value="<?php echo ($reslist['value5']); ?>"></td>

                                                <td>
                                                    <p><a href="javascript:dodelit(3)" class="btn btn-warning btn-sm"><i class="mdi-action-delete"></i>删除</a><span class="tooltips"><img src="/tpl/Home/gooraye/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
                                                </td>
                                            </tr>
<tr>
     <td width="120">科室选择：</td>
     <td>
        <input type="text" class="form-control" name="select1" value="<?php echo ((isset($reslist['select1']) && ($reslist['select1'] !== ""))?($reslist['select1']):'预约科室'); ?>" ></td>
     <td>
         <input name="svalue1" class="form-control"  type="text" value="<?php echo ($reslist['svalue1']); ?>" placeholder="选项之间以英文“|”分割"></td>

    <td>

    </td>
</tr>
<tr >
    <td>专家选择：</td>
    <td>
         <input type="text" class="form-control" name="select2"  value="<?php echo ((isset($reslist['select2']) && ($reslist['select2'] !== ""))?($reslist['select2']):'预约专家'); ?>"></td>
    <td>
        <input name="svalue2" class="form-control"  type="text" value="<?php echo ($reslist['svalue2']); ?>" placeholder="选项之间以英文“|”分割"></td>

    <td>

    </td>
</tr>

<tr  >
    <td>病种选择：</td>
    <td>
        <input type="text" class="form-control" name="select3" value="<?php echo ((isset($reslist['select3']) && ($reslist['select3'] !== ""))?($reslist['select3']):'预约病种'); ?>"></td>
    <td>
         <input name="svalue3" class="form-control" type="text" value="<?php echo ($reslist['svalue3']); ?>" placeholder="选项之间以英文“|”分割"></td>

     <td>
         <p></p>
    </td>
 </tr>
                                            <tr id="strtxt1"  >
                                                <td>下拉框1：</td>
                                                <td>
                                                    <input type="text" class="form-control" name="select4" id="select1" value="<?php echo ($reslist['select4']); ?>"></td>
                                                <td>
                                                    <input name="svalue4" class="form-control" id="svalue" type="text" value="<?php echo ($reslist['svalue4']); ?>" placeholder="选项之间以英文“|”分割"></td>

                                                <td>
                                                    <p><?php if($reslist['select5'] == ''): ?><a class="btn btn-warning btn-sm" id="sadd2" href="javascript:sdoaddit(2)"><i class="mdi-content-add"></i>添加</a><?php endif; ?>　<a href="javascript:sdodelit(1)" class="btn btn-warning btn-sm"><i class="mdi-action-delete"></i>删除</a><span class="tooltips"><img src="/tpl/Home/gooraye/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
                                                </td>
                                            </tr>
                                            <tr id="strtxt2" <?php if($reslist['select5'] == ''): ?>style="display: none"<?php endif; ?>>
                                                <td>下拉框2：</td>
                                                <td>
                                                    <input type="text" name="select5" class="form-control" id="select2" value="<?php echo ($reslist['select5']); ?>"></td>
                                                <td>
                                                    <input name="svalue5" id="svalue2" class="form-control" type="text" value="<?php echo ($reslist['svalue5']); ?>" placeholder="选项之间以英文“|”分割"></td>

                                                <td>
                                                    <p><a href="javascript:sdodelit(2)" class="btn btn-warning btn-sm"><i class="mdi-action-delete"></i>删除</a><span class="tooltips"><img src="/tpl/Home/gooraye/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>多行文字：</td>
                                                <td>
                                                    <input name="datename" class="form-control" type="text" value="<?php echo ((isset($reslist['datename']) && ($reslist['datename'] !== ""))?($reslist['datename']):'留言信息'); ?>"></td>
                                                <td>
                                                    <input name="add[order][]" class="form-control" type="text" disabled="disabled" value="请输入备注信息" readonly="readonly"></td>

                                                <td>订单默认项</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                                </div>
                                            </div>
                                <div class="control-group" style="display:none">
                                    <label for="" class="control-label">商家通知设置：</label>
                                    <input type="hidden" name="take" value="1" />
                                    <div class="controls">
                                        <div class="row-fluid margin-bm10">
                                            订单通知邮箱：<input type="text" class="input-large" data-rule-email="true" name="email" value="<?php echo ($reslist['email']); ?>"><span class="help-inline"><label class="checkbox inline">
                                                <input type="checkbox" name="open_email" value="1" <?php if($reslist['open_email'] == 1): ?>checked="checked"<?php endif; ?>>
                                                开启
                                            </label>
                                            </span>
                                        </div><p style="margin-left:83px;">当有新订单时，发送邮件到此邮箱</p>
                                    </div>
                                     <div class="controls">
                                        <div class="row-fluid">
                                            订单短信通知：<input type="text" class="input-large" data-rule-mobile="true" name="sms" value="<?php echo ($reslist['sms']); ?>"><span class="help-inline" ><label class="checkbox inline">
                                                <input type="checkbox" name="open_sms" value="1" <?php if($reslist['open_sms'] == 1): ?>checked="checked"<?php endif; ?>>
                                                开启
                                            </label>
                                            </span>
                                        </div><p style="margin-left:83px;">当有新订单时，发送短信到此手机</p>
                                    </div>
                                </div>
                                <div class="form-actions">
            <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary"><i class="mdi-content-save"></i>保存</button>　<button type="button" class="btn btn-primary">取消</button>
        </div>
                        </div>

</form>
  </div>
 <script>
 $("#check_form").validationEngine();
 </script>

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