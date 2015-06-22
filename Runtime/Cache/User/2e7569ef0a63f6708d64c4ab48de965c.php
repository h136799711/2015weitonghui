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
      <?php if($type == 'fitness'): ?><link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

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

<div class="tab" id="myClas">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'fitness'));?>">健身中心简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'fitness'));?>">健身房设置</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'fitness'));?>">健身项目</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'fitness'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'fitness'));?>">客户点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'fitness'));?>">订单管理</a></li>
</ul>
</div>
      <?php elseif($type == 'gover'): ?>
          <link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>

<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

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

<div class="tab" id="myClas">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'gover'));?>">政务部门简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'gover'));?>">服务窗口设置</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'gover'));?>">服务类型</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'gover'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'gover'));?>">领导点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'gover'));?>">订单管理</a></li>
</ul>
</div>
      <?php elseif($type == 'food'): ?>
          <link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->

<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

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

<div class="tab" id="myClas">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'food'));?>">食品公司简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'food'));?>">销售门店</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'food'));?>">食品分类</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'food'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'food'));?>">客户点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'food'));?>">订单管理</a></li>
</ul>
</div>
      <?php elseif($type == 'travel'): ?>
          <link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->

<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

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

<div class="tab" id="myClas">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'travel'));?>">旅游区简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'travel'));?>">景区</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'travel'));?>">景点</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'travel'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'travel'));?>">专家点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'travel'));?>">订单管理</a></li>
</ul>
</div>
      <?php elseif($type == 'flower'): ?>
          <link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->

<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

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

<div class="tab" id="myClas">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'flower'));?>">花店公司简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'flower'));?>">花店分店</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'flower'));?>">特色鲜花</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'flower'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'flower'));?>">客户点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'flower'));?>">订单管理</a></li>
</ul>
</div>
      <?php elseif($type == 'property'): ?>
          <link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->

<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

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

<div class="tab" id="myClas">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'property'));?>">物业公司简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'property'));?>">小区</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'property'));?>">业主服务</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'property'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'property'));?>">专家点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'property'));?>">订单管理</a></li>
</ul>
</div>
      <?php elseif($type == 'ktv'): ?>
          <link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->

<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
#myClas ul li {
    margin-left: 5px;
}

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
<div class="tab" id="myClas">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'ktv'));?>">KTV简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'ktv'));?>">KTV分店</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'ktv'));?>">KTV包厢</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'ktv'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'ktv'));?>">客户家点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'ktv'));?>">订单管理</a></li>
</ul>
</div>
      <?php elseif($type == 'bar'): ?>
          <link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

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

<div class="tab" id="myClas">
<ul class="list-unstyled nav navs-tab">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'bar'));?>">酒吧简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'bar'));?>">酒吧分店</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'bar'));?>">酒水特色</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'bar'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'bar'));?>">客户点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'bar'));?>">订单管理</a></li>
</ul>
</div>
      <?php elseif($type == 'fitment'): ?>
          <link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

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

<div class="tab" id="myClas">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'fitment'));?>">装修公司简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'fitment'));?>">装修分店</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'fitment'));?>">装修套餐</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'fitment'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'fitment'));?>">客户点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'fitment'));?>">订单管理</a></li>
</ul>
</div>
      <?php elseif($type == 'wedding'): ?>
          <link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->

<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

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

<div class="tab" id="myClas">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'wedding'));?>">婚庆公司简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'wedding'));?>">分店设置</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'wedding'));?>">服务项目</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'wedding'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'wedding'));?>">客户点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'wedding'));?>">订单管理</a></li>
</ul>
</div>
      <?php elseif($type == 'affections'): ?>
          <link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

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

<div class="tab" id="myClas">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'affections'));?>">宠物店简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'affections'));?>">宠物分店</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'affections'));?>">宠物起居</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'affections'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'affections'));?>">客户点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'affections'));?>">订单管理</a></li>
</ul>
</div>
      <?php elseif($type == 'housekeeper'): ?>
          <link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->

<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

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

<div class="tab" id="myClas">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'housekeeper'));?>">家政公司简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'housekeeper'));?>">分店设置</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'housekeeper'));?>">服务项目</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'housekeeper'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'housekeeper'));?>">客户点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'housekeeper'));?>">订单管理</a></li>
</ul>
</div>
      <?php elseif($type == 'lease'): ?>
          <link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->

<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

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

<div class="tab" id="myClas">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'lease'));?>">租赁公司简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'lease'));?>">分店设置</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'lease'));?>">租赁类型</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'lease'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'lease'));?>">客户点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'lease'));?>">订单管理</a></li>
</ul>
</div>
      <?php elseif($type == 'beauty'): ?>
          <link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

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

<div class="tab" id="myClas">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if((ACTION_NAME == 'index') OR (ACTION_NAME == 'index_add')): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Business/index',array('token'=>$token,'type'=>'beauty'));?>">美容公司简介</a></li>
<li class="<?php if(ACTION_NAME == 'classify' OR (ACTION_NAME == 'classify_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/classify',array('token'=>$token,'type'=>'beauty'));?>">分店设置</a></li>
<li class="<?php if(ACTION_NAME == 'project' OR (ACTION_NAME == 'project_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/project',array('token'=>$token,'type'=>'beauty'));?>">美容套餐</a></li>
<li class="<?php if(ACTION_NAME == 'poster' OR (ACTION_NAME == 'poster_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/poster',array('token'=>$token,'type'=>'beauty'));?>">宣传海报/相册</a></li>
<li class="<?php if(ACTION_NAME == 'comments' OR (ACTION_NAME == 'comments_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/comments',array('token'=>$token,'type'=>'beauty'));?>">客户点评</a></li>
<li class="<?php if(ACTION_NAME == 'orders' OR (ACTION_NAME == 'orders_list')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Business/orders',array('token'=>$token,'type'=>'beauty'));?>">订单管理</a></li>
</ul>
</div><?php endif; ?>
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
      <?php if($type == 'fitness'): ?><div class="righttitle">
    <h4>设置健身中心相关内容</h4>
    <div >
        <div class="alert">
            <p><span class="bold">使用方法：</span>
            <strong><font color='red'>设置健身中心相关内容,注意：第一次使用，请点击添加健身中心等相关设置，并点击保存 </font></strong>
            </p>
        </div>
    </div>
</div>
      <?php elseif($type == 'gover'): ?>
          
    <div class="righttitle">
        <h4>设置政务部门相关内容</h4>
        <div >
            <div class="alert">
                <p><span class="bold">使用方法：</span>
                <strong><font color='red'>请设置政务部门相关内容,注意：第一次使用，请点击添加政务部门等相关设置，并点击保存</font></strong>
                </p>
            </div>
        </div>
    </div>
      <?php elseif($type == 'food'): ?>
          <div class="righttitle">
    <h4>请设置食品公司相关内容</h4>
    <div >
        <div class="alert">
            <p><span class="bold">使用方法：</span>
            <strong><font color='red'>请设置食品公司相关内容,注意：第一次使用，请点击添加食品公司简介等相关设置，并点击保存</font></strong>
            </p>
        </div>
    </div>
</div>
      <?php elseif($type == 'travel'): ?>
          <div class="righttitle">
    <h4>请设置旅游区相关内容</h4>
    <div >
        <div class="alert">
            <p><span class="bold">使用方法：</span>
            <strong><font color='red'>请设置旅游区相关内容,注意：第一次使用，请点击添加旅游区简介等相关设置，并点击保存</font></strong>
            </p>
        </div>
    </div>
</div>
      <?php elseif($type == 'flower'): ?>
          <div class="righttitle">
    <h4>请设置花店相关内容</h4>
    <div >
        <div class="alert">
            <p><span class="bold">使用方法：</span>
            <strong><font color='red'>请设置花店相关内容,注意：第一次使用，请点击添加花店相关设置，并点击保存</font></strong>
            </p>
        </div>
    </div>
</div>
      <?php elseif($type == 'property'): ?>
          <div class="righttitle">
    <h4>设置婚庆公司相关内容</h4>
    <div >
        <div class="alert">
            <p><span class="bold">使用方法：</span>
            <strong><font color='red'>设置婚庆公司相关内容,注意：第一次使用，请点击添加婚庆公司等相关设置，并点击保存 </font></strong>
            </p>
        </div>
    </div>
</div>
      <?php elseif($type == 'ktv'): ?>
          <div class="righttitle">
    <h4>请设置KTV相关内容</h4>
    <div >
        <div class="alert">
            <p><span class="bold">使用方法：</span>
            <strong><font color='red'>请设置KTV相关内容,注意：第一次使用，请点击添KTV简介等相关设置，并点击保存</font></strong>
            </p>
        </div>
    </div>
</div>
      <?php elseif($type == 'bar'): ?>
          
  <div class="righttitle">
    <h4>请设置酒吧相关内容</h4>
    <div >
    <div class="alert">
    <p><span class="bold">使用方法：</span>
   <strong><font color='red'>请设置酒吧相关内容,注意：第一次使用，请点击添酒吧简介等相关设置，并点击保存</font></strong>
    </p>
    </div>
   </div>
</div>

      <?php elseif($type == 'fitment'): ?>
          <div class="righttitle">
    <h4>请设置装修相关内容</h4>
    <div >
        <div class="alert">
            <p><span class="bold">使用方法：</span>
            <strong><font color='red'>请设置装修相关内容,注意：第一次使用，请点击添加装修相关设置，并点击保存</font></strong>
            </p>
        </div>
    </div>
</div>
      <?php elseif($type == 'wedding'): ?>
          <div class="righttitle">
    <h4>设置婚庆公司相关内容</h4>
    <div >
        <div class="alert">
            <p><span class="bold">使用方法：</span>
            <strong><font color='red'>设置婚庆公司相关内容,注意：第一次使用，请点击添加婚庆公司等相关设置，并点击保存 </font></strong>
            </p>
        </div>
    </div>
</div>
      <?php elseif($type == 'affections'): ?>
          
  <div class="righttitle">
    <h4>请设置宠物公司相关内容</h4>
    <div >
    <div class="alert">
    <p><span class="bold">使用方法：</span>
   <strong><font color='red'>请设置宠物公司相关内容,注意：第一次使用，请点击添宠物公司简介等相关设置，并点击保存</font></strong>
    </p>
    </div>
   </div>
</div>
      <?php elseif($type == 'housekeeper'): ?>
          <div class="righttitle">
    <h4>设置家政公司相关内容</h4>
    <div >
        <div class="alert">
            <p><span class="bold">使用方法：</span>
            <strong><font color='red'>设置家政公司相关内容,注意：第一次使用，请点击添加家政公司等相关设置，并点击保存 </font></strong>
            </p>
        </div>
    </div>
</div>
      <?php elseif($type == 'lease'): ?>
          <div class="righttitle">
    <h4>设置租赁公司相关内容</h4>
    <div >
        <div class="alert">
            <p><span class="bold">使用方法：</span>
            <strong><font color='red'>设置租赁公司相关内容,注意：第一次使用，请点击添加租赁公司等相关设置，并点击保存 </font></strong>
            </p>
        </div>
    </div>
</div>
      <?php elseif($type == 'beauty'): ?>
          <div class="righttitle">
    <h4>设置美容公司相关内容</h4>
    <div >
        <div class="alert">
            <p><span class="bold">使用方法：</span>
            <strong><font color='red'>设置美容公司相关内容,注意：第一次使用，请点击添加美容公司等相关设置，并点击保存 </font></strong>
            </p>
        </div>
    </div>
</div><?php endif; ?>
    <div class="cLineC" style="line-height: 32px;"> <a href="<?php echo U('Business/comments_add',array('token'=>$token,'type'=>$type));?>" class="btn btn-primary">添加点评</a>　 </div>
    <div class=" form">
        <div class="bdrcontent ">
            <div id="div_ptype">
                <table class="table table-condensed table-bordered table-striped" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width:100px;">标题</th>
                            <th style="width:100px;">
                                <?php if($type == 'fitness'): ?>健身公司
                                <?php elseif($type == 'gover'): ?>
                                政务部门
                                <?php elseif($type == 'food'): ?>
                                食品公司
                                <?php elseif($type == 'travel'): ?>
                                旅游公司
                                <?php elseif($type == 'flower'): ?>
                                花店公司
                                <?php elseif($type == 'property'): ?>
                                物业公司
                                <?php elseif($type == 'ktv'): ?>
                                KTV
                                <?php elseif($type == 'bar'): ?>
                                酒 吧
                                <?php elseif($type == 'fitment'): ?>
                                装修公司
                                <?php elseif($type == 'wedding'): ?>
                                婚庆公司
                                <?php elseif($type == 'affections'): ?>
                                宠物公司
                                <?php elseif($type == 'housekeeper'): ?>
                                家政公司
                                <?php elseif($type == 'lease'): ?>
                                租赁公司
                                <?php elseif($type == 'beauty'): ?>
                                美容公司<?php endif; ?>
                            </th>
                            <th style="width:100px;">姓名</th>
                            <th style="width:100px;">职位</th>
                            <th style="width:100px;">照片</th>
                            <th style="width:120px;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($vo["title"]); ?></td>
                            <td><?php echo ($vo["0"]); ?></td>
                            <td><?php echo ($vo["name"]); ?></td>
                            <td><?php echo ($vo["position"]); ?></td>
                            <td><div class="cateimg"><img src="<?php echo ($vo['face_picurl']); ?>" class="cateimg_small"></div></td>
                            <td>
                                <a href="<?php echo U('Business/comments_add',array('cid'=>$vo['cid'],'type'=>$vo['type']));?>" class="btn btn-warning btn-sm" ><i class="mdi-editor-mode-edit"></i>编辑</a>
                                <a href="<?php echo U('Business/comments_del',array('cid'=>$vo['cid'],'type'=>$vo['type']));?>" onclick="return(confirm('确定要删除吗？'))" class="btn btn-warning btn-sm" ><i class="mdi-action-delete"></i>删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="footactions" style="padding-left:10px">
            <div class="pages"><?php echo ($page); ?></div>
        </div>
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