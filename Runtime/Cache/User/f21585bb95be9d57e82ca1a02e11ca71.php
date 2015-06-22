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
    <div class="righttitle">
        <h4 >分类管理</h4>
        <div class="clearfix"></div>
    </div>
    <!--tab start-->
    <div class="tab">
        <ul class="list-unstyled nav nav-tabs">
            <li class="current tabli" id="tab2"><a href="<?php echo U('Store/index',array('token'=>$token));?>">商品分类管理</a></li>
            <?php if(empty($catid) != true): ?><li class="tabli" id="tab0"><a href="<?php echo U('Store/product',array('token'=>$token));?>">商品管理</a></li><?php endif; ?>
            <li class="tabli" id="tab2"><a href="<?php echo U('Store/orders',array('token'=>$token));?>">订单管理</a></li>
            <li class="tabli" id="tab5"><a href="<?php echo U('ReplyInfo/set',array('token'=>$token,'infotype'=>'Shop'));?>">商城回复配置</a></li>
        </ul>
    </div>
    <!--tab end-->
    <div >
        <a href="<?php echo U('Store/catAdd', array('token' => $token));?>" title="新增分类" class="btn btn-primary"><i class="mdi-content-add"></i>新增分类</a>
        <a href="<?php echo U('Store/setting', array('token' => $token));?>" title="商城设置" class="btn btn-primary"><i class="mdi-action-settings"></i>商城设置</a>
    </div>
    <div class="">
        <form method="post" action="" id="info">
            <input name="delall" type="hidden" value="">
            <input name="wxid" type="hidden" value="">
            <table class="table table-condensed table-bordered table-striped" border="0" cellspacing="0" cellpadding="0" width="100%">
                <thead>
                    <tr>
                        <th width="100">分类名称</th>
                        <th width="100">简介</th>
                        <th width="150">规格</th>
                        <th width="120">产品外观</th>
                        <th width="120">创建时间</th>
                        <th width="300" class="norightborder">操作</th>
                    </tr>
                </thead>
                <tbody>
                <tr></tr>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hostlist): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($hostlist["name"]); ?></td>
                    <td><?php echo ($hostlist["des"]); ?></td>
                    <td><?php echo ($hostlist["norms"]); if(empty($hostlist['norms']) != true): ?><span>&nbsp;&nbsp;<a class="btn btn-warning btn-sm" href="<?php echo U('Store/norms', array('catid'=>$hostlist['id'],'token'=>$token, 'type' => 0));?>">规格的管理</a></span><?php endif; ?></td>
                    <td><?php echo ($hostlist["color"]); if(empty($hostlist['color']) != true): ?><span>&nbsp;&nbsp;<a class="btn btn-warning btn-sm" href="<?php echo U('Store/norms', array('catid'=>$hostlist['id'],'token'=>$token, 'type' => 1));?>">外观的管理</a></span><?php endif; ?></td>
                    <td><?php echo (date("Y-m-d H:i:s",$hostlist["time"])); ?></td>
                    <td class="norightborder">
                        <a class="btn btn-warning btn-sm" href="<?php echo U('Store/catSet',array('token'=>$token,'id'=>$hostlist['id']));?>"><i class="mdi-editor-mode-edit"></i>修改</a>
                        <a class="btn btn-warning btn-sm" href="javascript:drop_confirm('您确定要删除吗?', '<?php echo U('Store/catDel',array('id'=>$hostlist['id'],'token'=>$token));?>');"><i class="mdi-action-delete"></i>删除</a>
                        <!-- <span>&nbsp;|&nbsp;<a class="btn btn-warning btn-sm" href="<?php echo U('Store/norms', array('catid'=>$hostlist['id'],'token'=>$token));?>">增加规格</a></span> -->
                        <span>&nbsp;|&nbsp;<a class="btn btn-warning btn-sm" href="<?php echo U('Store/attributes',array('catid'=>$hostlist['id'],'token'=>$token));?>">分类属性管理</a></span>
                        <span>&nbsp;|&nbsp;<a class="btn btn-warning btn-sm" href="<?php echo U('Store/product',array('catid' => $hostlist['id'],'token'=>$token));?>" >商品管理</a></span>
                        <!-- <span>&nbsp;|&nbsp;<a class="btn btn-warning btn-sm" href="<?php echo U('Store/catAdd', array('token' => $token,'parentid'=>$hostlist['id']));?>" >添加子分类</a></span> -->
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </form>
</div>
<div >
    <div class="pageNavigator right">
        <div class="pages"><?php echo ($page); ?></div>
    </div>
    <div class="clearfix"></div>
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