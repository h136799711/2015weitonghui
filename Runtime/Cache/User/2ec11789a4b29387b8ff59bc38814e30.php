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
<script src="/Public/User/js/cart/jscolor.js" type="text/javascript"></script>
<style type="text/css">
.vipcard{
margin: 0 auto;
position: relative;
height: 159px;
text-align: left;
width: 267px;
}
#cardbg{
height: 159px;
width: 267px;
position:absolute;
border-radius: 8px;
-webkit-border-radius:8px;
-moz-border-radius:8px;
box-shadow: 0 0 4px rgba(0, 0, 0, 0.6);
-moz-box-shadow:0 0 4px rgba(0, 0, 0, 0.6);
-webkit-box-shadow:0 0 8px rgba(0, 0, 0, 0.6);
top:0;
left:0;
z-index:1;
}
.vipcard .logo {
max-height:70px;
position:absolute;
top:8px;
left:5px;
z-index:2;
}
.vipcard .verify {
display:inline-block;
height:40px;
top:105px;
right:12px;
text-align:right;
line-height:24px;
color:#000;
font-size:20px;
text-shadow:0 1px rgba(255, 255, 255, 0.2);
z-index:2;
}

.vipcard h1 {
position:absolute;
right:10px;
top:7px;
text-shadow:0 1px rgba(255, 255, 255, 0.2);
color:#000;
font-size:11px;
line-height:25px;
text-align:right;
font-weight: normal;
z-index:2;
}
.vipcard .verify span {
display:inline-block;
text-align:left;
}
.vipcard .verify em {
display:block;
line-height:13px;
font-size:10px;
font-weight:normal;
font-style:normal;
}
.pdo {
position:absolute;
top:0;
left:0;
display:inline-block;
}
.userinfoArea td {
    padding: 8px 0 0px 15px;
}
#tishi{
text-align: center;display: block;
}
.banner{
display:block; width:213px;height: 278px;overflow: hidden;
}
.banner img{
display:block; width:213px; border:0;
}
.bannerbtn{ position:relative; display:block}
.bannerbtn .qiaodaobtn{ position: absolute; display:block; bottom:0}

</style>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
<div class="righttitle">
<h4 >会员卡</h4>
<div class="searchbar right hide">
</div>
<div class="clearfix"></div>
</div>
<div >
<div class="pageNavigator left"> <a href="<?php echo U('User/MemberCard/design',array('token'=>getToken()));?>" title='新增会员卡' class='btn btn-primary'><i class="mdi-content-add"></i>添加会员卡</a></div>
<div class="clearfix"></div>
</div>
<div class="">
 <div class="bg-warning tip">在这里可以添加多种级别的会员卡，比如：普通卡、银卡、金卡等，可以设置每个会员卡的最低积分要求，然会员根据不同的积分领取不同的卡</div>
<form method="post"  action="" id="info" >
<table class="table table-condensed table-bordered table-striped" border="0" cellSpacing="0" cellPadding="0" width="100%">
<thead>
<tr>
<th>名称</th>
<th width="60">会员数量</th>
<th width="65">外链代码</th>
<th class="norightborder">操作</th>
</tr>
</thead>
<tbody>
<tr></tr>
<?php if(is_array($cards)): $i = 0; $__LIST__ = $cards;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
<td><?php echo htmlspecialchars_decode($item['cardname']);?></td>
<td><?php echo ($item["usercount"]); ?></td>
<td> <a  class="green" href="###">会员卡</a></td>
<td class="norightborder">
<a class="btn btn-warning btn-sm" href="<?php echo U('User/Membercard/design',array('token'=>$token,'id'=>$item['id']));?>">设计</a> 

<a class="btn btn-warning btn-sm"  href="<?php echo U('User/MemberCard/create',array('token'=>$token,'id'=>$item['id']));?>">在线开卡</a> 

<a class="btn btn-warning btn-sm"  href="<?php echo U('User/MemberCard/exchange',array('token'=>$token,'id'=>$item['id']));?>">积分设置</a> 
<a  class="btn btn-warning btn-sm" href="<?php echo U('User/MemberCard/notice',array('token'=>$token,'id'=>$item['id']));?>">通知管理</a> 
<a class="btn btn-warning btn-sm"  href="<?php echo U('User/MemberCard/privilege',array('token'=>$token,'id'=>$item['id']));?>">特权管理</a>

 <a class="btn btn-warning btn-sm"  href="<?php echo U('User/MemberCard/coupon',array('token'=>$token,'id'=>$item['id']));?>">优惠券管理</a> 

 <a class="btn btn-warning btn-sm"  href="<?php echo U('User/MemberCard/integral',array('token'=>$token,'id'=>$item['id']));?>">礼品券管理</a> 
 
 <a class="btn btn-warning btn-sm"  href="<?php echo U('User/MemberCard/members',array('token'=>$token,'id'=>$item['id']));?>">会员管理</a>

  <a class="btn btn-warning btn-sm"  href=" <?php echo U('User/MemberCard/staff',array('token'=>$token,'id'=>$item['id']));?>">店员管理</a> 
  <a class="btn btn-warning btn-sm"  href="javascript:drop_confirm('您确定要删除吗?', '<?php echo U('User/MemberCard/delete',array('token'=>$token,'id'=>$item['id']));?>');"><i class="mdi-action-delete"></i>删除</a></td>
   
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</tbody>
</table>
</form>

</div>
<div >
<div class="pageNavigator right">
<div class="pages"></div>
</div>
<div class="clearfix"></div>
</div>
</div>
      
        <div class="clearfix"></div>
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
      </div>
    </div>
  </div>