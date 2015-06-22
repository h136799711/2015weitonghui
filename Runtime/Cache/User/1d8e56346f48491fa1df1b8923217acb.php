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
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
    <div class="righttitle">
        <h4>商城设置</h4>
        <a href="<?php echo U('Store/index',array('token'=>$token));?>" class="btn btn-primary btn-sm" data-top><i class="mdi-content-reply"></i>返回</a>
    </div>
    <form class="form-horizontal " method="post" action="">
        <input type="hidden" name="id" value="<?php echo ($setting["id"]); ?>" />
        <input type="hidden" name="token" value="<?php echo ($token); ?>" />
        <div class="form-group">
            <label class="control-label col-lg-2 col-md-2"><span class="text-warning">*</span>免邮设置</label>
            <div class="col-lg-5 col-md-8">满<input type="text" style="width:60px" name="price" value="<?php echo ($setting["price"]); ?>" class="form-control pull-inline"/>元免邮
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-2 col-md-2"><span class="text-warning">*</span>积分兑换</label>
            <div class="col-lg-5 col-md-8">
                <input type="text" name="score" value="<?php echo ($setting["score"]); ?>" class="form-control  pull-inline"/>积分=1元
                <span class="help-block">(注：写0表示积分不可兑换)</span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-2 col-md-2"><span class="text-warning">*</span>是否支持货到付款</label>
            <div class="col-lg-5 col-md-8">
                <div class="radio radio-primary col-lg-4 col-md-5">
                    <label>
                        <input type="radio" name="paymode" value="0" id="paymode_0" <?php if($setting['paymode'] == 0): ?>checked<?php endif; ?> />
                        不支持
                    </label>
                </div>
                <div class="radio radio-primary col-lg-4 col-md-5">
                    <label>
                        <input type="radio" name="paymode" value="1" id="paymode_1" <?php if($setting['paymode'] == 1): ?>checked<?php endif; ?> />
                        支持
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-2 col-md-2">&nbsp;</label>
            <div class="col-lg-5 col-md-8">
                <button type="submit" name="button" class="btn btn-primary"><i class="mdi-content-save"></i>保存</button> &nbsp; <a href="<?php echo U('Store/index',array('token' => $token));?>" class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a>
            </div>
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