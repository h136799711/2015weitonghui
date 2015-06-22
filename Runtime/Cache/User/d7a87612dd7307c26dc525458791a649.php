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
    .shoptmpls li.active{
        background-color: #333;
    }
    .shoptmpls li{
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 7px;
    background-color: #fff;
    margin-bottom: 10px;
}
.shoptmpls li:hover {
    background-color: #CDAFAF;
    box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.15);
    color: #FFFFFF;
    position:relative;
    z-index: 999;
}
</style>
<!--鼠标移动上去效果end-->
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
    <div class="righttitle">
        <h4>商城首页模板管理 <span class="FAQ">选择适合您的商城首页模版风格，手机输入“商城”测试效果。</span></h4>
    </div>
    <div class="modal fade" id="eshoppreview" style="background:rgba(157, 182, 234, 0.89)">
        <div class="modal-dialog text-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">商城预览</h4>
                </div>
                <div class="modal-body">
                    <iframe style="width:320px;height:480px;" src="" frameborder="0" id="myeshop"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <div class=" form">
        <ul class="shoptmpls list-unstyled list-inline">
            <li <?php if(($listtpl) == "1"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate101.png" >
                <div  class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('1');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('1')">预览</button>
                </div>
            </li>
            <li <?php if(($listtpl) == "2"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate101.png" >
                <div  class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('2');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('2')">预览</button>
                </div>
            </li>
            <li <?php if(($listtpl) == "3"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate101.png" >
                <div  class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('3');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('3')">预览</button>
                </div>
            </li>
            <li <?php if(($listtpl) == "4"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate102.png" >

                <div  class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('4');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('4');">预览</button>
                </div>
            </li>
            <li <?php if(($listtpl) == "5"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate103.png" >
                <div  class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('5');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('5');">预览</button>
                </div>
            </li>
            <li <?php if(($listtpl) == "6"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate1122.png" >
                <div  class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('6');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('6');">预览</button>
                </div>
            </li>
            <li <?php if(($listtpl) == "7"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate1119.png" >
                <div class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('7');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('7');">预览</button>
                </div>
            </li>
            <li <?php if(($listtpl) == "8"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate1113.png" >
                <div class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('8');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('8');">预览</button>
                </div>
            </li>
            <li <?php if(($listtpl) == "preview('9');"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate1111.png" >
                <div class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('9');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('9');">预览</button>
                </div>
            </li>
            <li <?php if(($listtpl) == "10"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate194.png" >

                <div class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('10');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('10');">预览</button>
                </div>
            </li>
            <li <?php if(($listtpl) == "11"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate1110.png" >

                <div class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('11');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('11');">预览</button>
                </div>
            </li>
            <li <?php if(($listtpl) == "12"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate199.png" >

                <div class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('12');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('12');">预览</button>
                </div>
            </li>
            <li <?php if(($listtpl) == "13"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate187.png" >

                <div  class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('13');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('13');">预览</button>
                </div>
            </li>
            <li  <?php if(($listtpl) == "14"): ?>class="active"<?php endif; ?>>
                <img src="/Public/User/images/newshop/cate184.png" >

                <div class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="selecttmps('14');">选中</button>
                    <button class="btn btn-primary btn-sm" onclick="preview('14');">预览</button>
                </div>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
            function selecttmps(val){
                var myurl="<?php echo U('Shoptmpls/add');?>?style="+val+'&r='+Math.random();
                $.ajax({url:myurl,async:false});
                $(this).parents("li").addClass("active");
                //刷新
                window.location.reload();
            }
            function preview(val){
                var shopURL = "<?php echo U('Wap/Store/preview');?>";
                $("#myeshop").attr("src",shopURL+"?listtpl="+val);
                $("#eshoppreview").modal("show");
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