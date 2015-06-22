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
<!--鼠标移动上去效果start-->
<style>
    li .mbtip {
    display: none;
}
.tmpls li.active{
        background-color: #333;
}
.showtext{
    color: #fff;
    text-align: center;
    display: block;
    padding: 10px;
}
.tmpls li.active .showtext{
    display: block;
}
.tmpls li .showtext{
    display: none;
}
.tmpls li{
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 7px;
    background-color: #fff;
    margin-bottom: 10px;
    margin-right: 5px;
}
.tmpls li:hover {
    background-color: #CDAFAF;
    box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.15);
    color: #FFFFFF;
    position:relative;
    z-index: 999;
}
</style>
<!--鼠标移动上去效果end-->
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
    <div class="modal fade" id="tmplpreview" style="background:rgba(157, 182, 234, 0.89)">
        <div class="modal-dialog text-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">模板效果预览</h4>                  
                </div>
                <div class="modal-body">
                    <iframe style="width:480px;height:640px;" src="" frameborder="0" id="mytmpl"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <div class="righttitle">
        <h4>模板管理 <span class="bg-info h5">选择适合您的模版风格，手机输入“首页”测试效果。</span> </h4>
    </div>
    <div class="form">
        <ul id="tags" class="nav nav-tabs">
            <li class="active" role="presentation"><a onclick="selectTag('tagContent1',this)" href="javascript:void(0)">1.栏目首页模板风格</a> </li>
        </ul>
        <!--首页模板选择-->
        <link href="/Public/static/tmpls/css/product.css" rel="stylesheet" type="text/css" />
        <script src="/Public/static/tmpls/js/jquery.mixitup.min.js" type="text/javascript"></script>
        <div class="g filterBox clearfix">
            <div class="row">
                <h1>按级别选择:</h1>
                <ul class="filterBtn list-unstyled clearfix">
                    <li class="filter" data-filter="ck"><p>我选中的模版</p><i></i></li>
                    <li class="filter on active" data-filter="all"><p>全部模版</p><i></i></li>
                    <li class="filter" data-filter="sub"><p>可显示两级分类</p><i></i></li>
                    <li class="filter" data-filter="focu"><p>支持幻灯片</p><i></i></li>
                    <li class="filter" data-filter="bg"><p>支持自定义背景</p><i></i></li>
                    <li class="filter" data-filter="thumb"><p>带缩略图</p><i></i></li>
                    <li class="filter" data-filter="filt"><p>半透明版块</p><i></i></li>
                    <li class="filter" data-filter="bgs"><p>支持背景音乐</p><i></i></li>
                    <li class="filter" data-filter="slip"><p>支持横向滑动</p><i></i></li>
                </ul>
            </div>
            <div class="row">
                <h1>按行业选择:</h1>
                <ul class="filterBtn list-unstyled clearfix">
                    <li class="filter" data-filter="mix"><p>常用模板</p><i></i></li>
                    <li class="filter" data-filter="hotel"><p>酒店</p><i></i></li>
                    <li class="filter" data-filter="car"><p>汽车</p><i></i></li>
                    <li class="filter" data-filter="tour"><p>旅游</p><i></i></li>
                    <li class="filter" data-filter="restaurant"><p>餐饮</p><i></i></li>
                    <li class="filter" data-filter="estate"><p>房地产</p><i></i></li>
                    <li class="filter" data-filter="health"><p>医疗保健</p><i></i></li>
                    <li class="filter" data-filter="edu"><p>教育培训</p><i></i></li>
                    <li class="filter" data-filter="beauty"><p>健身美容</p><i></i></li>
                    <li class="filter" data-filter="wedding"><p>婚纱摄影</p><i></i></li>
                    <li class="filter" data-filter="other"><p>其他行业</p><i></i></li>
                </ul>
            </div>
        </div>
        <ul class="tmpls  list-unstyled list-inline " id="grid">
            <?php if(is_array($tpl)): $i = 0; $__LIST__ = $tpl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tpl): $mod = ($i % 2 );++$i;?><li data-toggle="tooltip" data-placement="top" title="<?php echo ((isset($tpl["tpldesinfo"]) && ($tpl["tpldesinfo"] !== ""))?($tpl["tpldesinfo"]):'暂无模板描述'); ?>" class="mix <?php echo ($tpl["attr"]); ?> <?php if($info['tpltypeid'] == $tpl['tpltypeid']): ?>ck active<?php endif; ?>" >
                <div class="" style="width:170px;height:360px;background-image:url(/Public/User/images/<?php echo ($tpl["tplview"]); ?>);">
                    <span class="showtext">当前使用模板</span>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps(this,'<?php echo ($tpl["tpltypeid"]); ?>');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('<?php echo ($tpl["tpltypeid"]); ?>');">预览</button>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>

<script>
$(function(){

    $('#grid').mixitup({layoutMode: 'grid'});
    // $(".tmpls li").tooltip({delay: { "show": 500, "hide": 100 }});
});
function selecttmps(ele,val){
    var myurl="<?php echo U('User/Tmpls/add');?>?style="+val+'&r='+Math.random();
    $.ajax({url:myurl,async:false});
    $("#grid .active").removeClass("active");
    $(ele).parents("li").addClass("active");
}
function preview(val){
    var siteURL = "<?php echo U('Wap/Index/preview',array('token'=>getToken()));?>";
    $("#mytmpl").attr("src",siteURL+"?tpl="+val);
    $("#tmplpreview").modal("show");
}
                                                                                                                                                                                                                                        
</script>
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