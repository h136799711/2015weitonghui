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

<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
<link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>

<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
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

<div >
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if(ACTION_NAME == 'index'): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('School/index',array('token'=>$token,'type'=>'semester'));?>">分类管理</a></li>
<li class="<?php if(ACTION_NAME == 'students'): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('School/students',array('token'=>$token));?>">学员管理</a></li>
<!-- <li class="<?php if(ACTION_NAME == 'paycost'): ?>current<?php endif; ?> tabli" id="tab2">
<a href="<?php echo U('School/paycost',array('token'=>$token));?>">缴费管理</a></li> -->
<li class="<?php if((ACTION_NAME == 'assess') OR (ACTION_NAME == 'assess_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('School/assess',array('token'=>$token));?>">教师管理</a></li>
<li class="<?php if((ACTION_NAME == 'curriculum') OR (ACTION_NAME == 'assess_course')): ?>current<?php endif; ?> tabli" id="tab3"><a href="<?php echo U('School/curriculum',array('token'=>$token));?>">课程安排</a></li>
<li class="<?php if(ACTION_NAME == 'subscribe' OR (ACTION_NAME == 'subscribe_add')): ?>current<?php endif; ?> tabli" id="tab4"><a href="<?php echo U('School/subscribe',array('token'=>$token));?>">课程预约</a></li>
<li class="<?php if(ACTION_NAME == 'scoresearch' ): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('School/scoresearch',array('token'=>$token));?>">成绩查询</a></li>
<!-- <li class="<?php if(ACTION_NAME == 'campusnews'): ?>current<?php endif; ?> tabli" id="tab6"><a href="<?php echo U('School/campusnews',array('token'=>$token));?>">校内新闻</a></li> -->
<li class="<?php if(ACTION_NAME == 'cookbook'): ?>current<?php endif; ?> tabli" id="tab6"><a href="<?php echo U('School/cookbook',array('token'=>$token));?>">食谱安排</a></li>
<li class="<?php if(ACTION_NAME == 'introduction'): ?>current<?php endif; ?> tabli" id="tab7"><a href="<?php echo U('School/introduction',array('token'=>$token));?>">菜单/回复配置</a></li>
</ul>
</div>

<div class="righttitle">
  <h4>您的位置: 分类管理 >
  <?php if($type == 'semester'): ?>学期管理|== <a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token ,'type'=>'semester'));?>">学期管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token ,'type'=>'theclass'));?>">班级管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'score'));?>">成绩管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'subject'));?>">科目管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'timeframe'));?>">时段管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'week'));?>">星期管理</a>
  <?php elseif($type == 'theclass'): ?>
   班级管理 |== <a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token ,'type'=>'semester'));?>">学期管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token ,'type'=>'theclass'));?>">班级管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'score'));?>">成绩管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'subject'));?>">科目管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'timeframe'));?>">时段管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'week'));?>">星期管理</a>
  <?php elseif($type == 'score'): ?>
  成绩管理|== <a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token ,'type'=>'semester'));?>">学期管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token ,'type'=>'theclass'));?>">班级管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'score'));?>">成绩管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'subject'));?>">科目管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'timeframe'));?>">时段管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'week'));?>">星期管理</a>
  <?php elseif($type == 'subject'): ?>
  科目管理|== <a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token ,'type'=>'semester'));?>">学期管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token ,'type'=>'theclass'));?>">班级管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'score'));?>">成绩管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'subject'));?>">科目管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'timeframe'));?>">时段管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'week'));?>">星期管理</a>
  <?php elseif($type == 'timeframe'): ?>
  时段管理|== <a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token ,'type'=>'semester'));?>">学期管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token ,'type'=>'theclass'));?>">班级管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'score'));?>">成绩管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'subject'));?>">科目管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'timeframe'));?>">时段管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'week'));?>">星期管理</a>
  <?php elseif($type == 'week'): ?>
  星期管理|== <a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token ,'type'=>'semester'));?>">学期管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token ,'type'=>'theclass'));?>">班级管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'score'));?>">成绩管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'subject'));?>">科目管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'timeframe'));?>">时段管理</a>||<a class="btn btn-warning btn-sm" href="<?php echo U('School/index',array('token'=>$token,'type'=>'week'));?>">星期管理</a><?php endif; ?>
   </h4>  <a href="javascript:window.location.reload();" class="btn btn-primary" data-top><i class="mdi-navigation-refresh"></i>刷新</a>
 </div>
 <style>
.cLine {
    overflow: hidden;
    padding: 5px 0;
  color:#000000;
}
.alert {
padding: 8px 35px 0 10px;
text-shadow: none;
-webkit-box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
-moz-box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
background-color: #f9edbe;
border: 1px solid #f0c36d;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
border-radius: 2px;
color: #333333;
margin-top: 5px;
}
.alert p {
margin: 0 0 10px;
display: block;
}
.alert .bold{
font-weight:bold;
}
 </style>
<div >
    <div class="alert">
    <p><span class="bold">使用方法：</span>
    <?php if($type == 'semester'): ?>填写学期,如 2014第一学期,2014第二学期,2015第一学期....<br/>
   <strong><font color='red'>特别提醒: 当你删除该学期项的时候,该学期项下相关的所有数据都会被删除,请谨慎操作!以免丢失数据!</font></strong>
  <?php elseif($type == 'theclass'): ?>
   填写班级,如 一年级1班,二年级2班,三年级3班....
  <?php elseif($type == 'score'): ?>
   填写成绩分类,如 第一期,第二期,第三期....
  <?php elseif($type == 'subject'): ?>
   填写科目,如 语文,数学,英语....
  <?php elseif($type == 'timeframe'): ?>
   填写时段,如 09:00-09:45 , 10:00-10:45 , 11:00-11:45....
  <?php elseif($type == 'week'): ?>
   填写星期几,如 星期一,星期二,星期三....<?php endif; ?>
    </p>
    </div>
</div>

<div class=" bgfc" style="margin-top:-10px;">
      <form class="form" method="post" action="" target="_top" enctype="multipart/form-data">
        <div class="bdrcontent ">
<div id="div_ptype">
<table class="table table-condensed table-bordered table-striped" border="0" cellspacing="0" cellpadding="0" width="100%">


<script type="text/javascript">


function addDeltbody(i) {

    if (i != 1) {
       document.getElementById("div_add_del_" + i).style.display = "none";
       document.getElementById("add" + i).style.display = "";

    }
}
function addTabody(i) {

     document.getElementById('div_add_del_' + i).style.display = "";
     document.getElementById('add' + i).style.display = "none";
     document.getElementById("addssort_" + i).value = 1;
}

function delrow(obj, tbody,objid) {
   removeElement(tbody);
   var obj = {sid:objid}
   $.post("<?php echo U('School/del_item',array('deltype'=>$type));?>", obj,function(data) {if(data.errno==1)alert('删除成功');},"json");
}

function removeElement(obj){
  var obj = document.getElementById(obj);
  var _parenElment = obj.parentNode;
  if(_parenElment){
    _parenElment.removeChild(obj);
  }
}



  </script>
<tbody>
<tr>

    <td width="260">名称</td>
    <td width="50">排序</td>
    <td class="norightborder">操作</td>
</tr>
</tbody>


<?php if($semester != ''): if(is_array($semester)): $i = 0; $__LIST__ = $semester;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ivo): $mod = ($i % 2 );++$i;?><tbody id="div_add_del_<?php echo ($i+500); ?>" name="div_add_del">
<tr>
    <input type="hidden" name="add[sid][]"   value="<?php echo ($ivo["sid"]); ?>" style="width:20px;">
    <td width="120"><input type="text" name="add[sname][]" value="<?php echo ($ivo["sname"]); ?>" class="form-control" style="width:120px;"></td>
    <td width="20"><input type="text" name="add[ssort][]" value="<?php echo ($ivo["ssort"]); ?>" style="width:20px;" class="form-control"></td>
    <td width="50" class="norightborder"><a href="javascript:;" onclick="delrow(this, 'div_add_del_<?php echo ($i+500); ?>',<?php echo ($ivo["sid"]); ?>);" class="btn btn-warning btn-sm"><i class="mdi-action-delete"></i>删除</a></td>
</tr>
 </tbody><?php endforeach; endif; else: echo "" ;endif; endif; ?>


<tbody id="div_add_del_1" name="div_add_del">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:20px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" id="addssort_1" value="1" style="width:20px;" class="form-control">
        </td>
        <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(1)" class="btn btn-warning btn-sm"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add2" onclick="addTabody(2)" class="btn btn-warning btn-sm"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_2" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:20px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value=""  id="addssort_2"  style="width:20px;" class="form-control">
        </td>
        <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(2)" class="btn btn-warning btn-sm"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add3" onclick="addTabody(3)" class="btn btn-warning btn-sm"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_3" name="div_add_del" style="display:none">
    <tr>
      <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_3" style="width:20px;" class="form-control">
        </td>

        <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(3)" class="btn btn-warning btn-sm"> <i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add4" onclick="addTabody(4)" class="btn btn-warning btn-sm"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>


<tbody id="div_add_del_4" name="div_add_del" style="display:none">
    <tr>
      <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" placeholder="请填写选项标题" value="" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_4" style="width:20px;" class="form-control">
        </td>
        <td width="50" class="norightborder"><a href="javascript:;"  class="btn btn-warning btn-sm" onclick="addDeltbody(4)"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add5" onclick="addTabody(5)" class="btn btn-warning btn-sm"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>


<tbody id="div_add_del_5" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_5" style="width:20px;" class="form-control">
        </td>
        <td width="50" class="norightborder"><a href="javascript:;" class="btn btn-warning btn-sm" onclick="addDeltbody(5)"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add6" onclick="addTabody(6)" class="btn btn-warning btn-sm"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_6" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_6" style="width:20px;" class="form-control">
        </td>
        <td width="50" class="norightborder"><a href="javascript:;" class="btn btn-warning btn-sm" onclick="addDeltbody(6)"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add7" onclick="addTabody(7)" class="btn btn-warning btn-sm"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_7" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_7" style="width:20px;" class="form-control">
        </td>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(7)" class="btn btn-warning btn-sm"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add8" onclick="addTabody(8)" class="btn btn-warning btn-sm"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>
<tbody id="div_add_del_8" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_8" style="width:20px;" class="form-control">
        </td>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(8)" class="btn btn-warning btn-sm"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add9" onclick="addTabody(9)" class="btn btn-warning btn-sm"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>
<tbody id="div_add_del_9" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_9" style="width:20px;" class="form-control">
        </td>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(9)" class="btn btn-warning btn-sm"><i class="mdi-action-delete"></i>删除</a>
          <a href="javascript:;" id="add10" onclick="addTabody(10)" class="btn btn-warning btn-sm"><i class="mdi-content-add"></i>添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_10" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="form-control" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value=""  id="addssort_10" style="width:20px;" class="form-control">
        </td>
          <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(10)" class="btn btn-warning btn-sm"><i class="mdi-action-delete"></i>删除</a>
          </td>
    </tr>
</tbody>
<tbody>
        <tr>
            <td colspan="4" class="norightborder">
                添加顶级分类
        </td></tr>
  </tbody>
  <tbody>
       <tr>
        <td>
        <button type="submit" name="button" class="btn btn-primary"><i class="mdi-content-save"></i>保存</button>
        <a href="<?php echo U('Vote/index');?>" class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a>
        </td>
        </tr>
  </tbody>
</table>

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