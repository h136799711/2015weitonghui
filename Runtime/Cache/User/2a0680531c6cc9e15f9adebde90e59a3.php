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
<!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
<div class="righttitle">
<h4 >订单管理(<?php echo ($page); ?>) </h4>
<div class="searchbar right hide">
<!-- <form method="post" action="">
<input type="text" id="msgSearchInput" class="form-control" placeholder="输入订购人名字搜索" name="searchkey" value="">
<input type="hidden" name="ac" value="hotels-list">
<input type="hidden" name="id" value="9878">
<input type="hidden" name="wxid" value="<?php echo ($wxid); ?>">
<input type="submit" value="搜索" id="msgSearchBtn" href="" class="btn btn-default " title="搜索">
</form> -->
<script>
function selectall(name) {
	var checkItems=$('.cbitem');
	if ($("#check_box").attr('checked')==false) {
		$.each(checkItems, function(i,val){
			val.checked=false;
		});
		
	} else {
		$.each(checkItems, function(i,val){
			val.checked=true;
		});
	}
}
</script>
</div>
<div class="clearfix"></div>
</div>
<!--tab start-->
<div class="tab">
<ul class="list-unstyled nav nav-tabs">
<li class="tabli" id="tab0"><a href="<?php echo U('Repast/company', array('token' => $token,'cid' => $cid));?>">餐厅管理</a></li>
<li class="tabli" id="tab1"><a href="<?php echo U('Repast/index', array('token' => $token,'cid' => $cid));?>">餐台管理</a></li>
<li class="current tabli" id="tab2"><a href="<?php echo U('Repast/detail', array('token' => $token,'cid' => $cid));?>">餐台预定情况</a></li>
<li class="tabli" id="tab2"><a href="<?php echo U('Repast/sort', array('token' => $token,'cid' => $cid));?>">分类管理</a></li>
<li class="tabli" id="tab3"><a href="<?php echo U('Repast/dish', array('token' => $token,'cid' => $cid));?>">菜品管理</a></li>
<li class="tabli" id="tab4"><a href="<?php echo U('Repast/orders', array('token' => $token,'cid' => $cid));?>">订单管理</a></li>
<?php if($ischild != 1): ?><li class="tabli" id="tab5"><a href="<?php echo U('ReplyInfo/set', array('token'=>$token,'infotype'=>'Dining'));?>">订餐回复配置</a></li><?php endif; ?>
</ul>
</div>
<!--tab end-->
<div class="">
<form method="post" action="" id="info">
<div >
<!-- <a href="###" onclick="$('#info').submit()" title="" class="btn btn-primary"><img src="/Public/User/images/product/arrow_switch.png" class="vm">处理订单</a></div> -->
查看时间：
<select class="form-control"  onchange="change(this);">
	<?php if(is_array($dates)): $i = 0; $__LIST__ = $dates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?><option value="<?php echo ($d['k']); ?>"><?php echo ($d['v']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
<div class="clearfix"></div>
</div>

<table class="table table-condensed table-bordered table-striped" border="0" cellspacing="0" cellpadding="0" width="100%">
<thead>
<tr>
<th width="300">餐桌号</th>
<th width="400">预定用餐时间</th>
<th class="60">是否已经使用</th>
</tr>
</thead>
<tbody>
<tr></tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><tr>
<td><?php echo ($o["name"]); ?></td>
<td><?php echo (date("Y-m-d H:i:s",$o["reservetime"])); ?></td> 
<td><?php if($o["isuse"] == 1): ?><span style="color:green">已使用</span><?php else: ?><span style="color:red">未使用</span><?php endif; ?></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</tbody>
</table>
<input type="hidden" name="token" value="<?php echo ($_GET['token']); ?>" />
</form>
</div>
</div>

<script>
function change(obj) {
	location.href = "<?php echo U('Repast/detail',array('token' => $token, 'cid' => $cid));?>&time=" + $(obj).val();
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