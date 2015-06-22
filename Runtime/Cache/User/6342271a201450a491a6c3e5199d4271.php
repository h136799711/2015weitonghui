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
        <h4 >订单管理（<a href="<?php echo U('Store/orders',array('token'=>$token,'handled'=>0));?>">未处理订单<span style="color:#f00"><?php echo ($unhandledCount); ?></span>个</a>） </h4>
    </div>

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
    <!--tab start-->
    <div class="tab">
        <ul class="list-unstyled nav nav-tabs">
            <li class="tabli" id="tab2"><a href="<?php echo U('Store/index',array('token'=>$token,'dining'=>$isDining));?>"><?php if($isDining != 1): ?>商品分类<?php else: ?>菜品分类<?php endif; ?>管理</a></li>
            <li class="current tabli" id="tab2"><a href="<?php echo U('Store/orders',array('token'=>$token,'dining'=>$isDining));?>">订单管理</a></li>
            <?php if($isDining == 1): ?><li class="tabli" id="tab2"><a href="<?php echo U('Store/tables',array('token'=>$token,'dining'=>1));?>">桌台管理</a></li><?php endif; ?>
            <?php if($isDining != 1): ?><li class="tabli" id="tab5"><a href="<?php echo U('ReplyInfo/set',array('token'=>$token,'infotype'=>'Shop'));?>">商城回复配置</a></li>
            <?php else: ?>
            <li class="tabli" id="tab5"><a href="<?php echo U('ReplyInfo/set',array('token'=>$token,'infotype'=>'Dining'));?>">订餐回复配置</a></li><?php endif; ?>
        </ul>
    </div>
    <!--tab end-->
    <div class="">
        <form method="post" action="" id="info">
            <div >
                <div class="pageNavigator left"> <a href="###" onclick="$('#info').submit()" title="" class="btn btn-primary"><i class="mdi-editor-border-color"></i>处理订单</a></div>
                <div class="clearfix"></div>
            </div>
            <table class="table table-condensed table-bordered table-striped" border="0" cellspacing="0" cellpadding="0" width="100%">
                <thead>
                    <tr>
                        <th class="select"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
                        <th width="70">姓名</th>
                        <th width="80">电话</th>
                        <th class="60">数量</th>
                        <th width="80">总价（元）</th>
                        <th class="160">付款状态/发货状态</th>
                        <th class="60">付款方式</th>
                        <th class="60">状态</th>
                        <th width="130">创建时间</th>

                        <th width="150" class="norightborder">操作</th>
                    </tr>
                </thead>
                <tbody>
                <tr></tr>
                <?php if(is_array($orders)): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><tr>
                    <td><input type="checkbox" value="<?php echo ($o["id"]); ?>" class="cbitem" name="id_<?php echo ($i); ?>"></td>
                    <td><?php echo ($o["truename"]); ?> <?php if($isDining == 1): ?><span style="color:#f60">[<?php if($o["diningtype"] == 1): ?>点餐<?php elseif($o["diningtype"] == 2): ?>外卖<?php elseif($o["diningtype"] == 3): ?>预定<?php else: endif; ?>]</span><?php endif; ?></td>
                    <td><?php echo ($o["tel"]); ?></td>
                    <td><?php echo ($o["total"]); ?></td>
                    <td><?php echo ($o["price"]); ?></td>
                    <td><?php if($o["paid"] == 1): ?><span style="color:green">已付款</span><?php else: ?><span style="color:red">未付款</span><?php endif; ?> / <?php if($o["sent"] == 1): ?><span style="color:green">已发货</span><?php else: ?><span style="color:red">未发货</span><?php endif; ?></td>
                    <td><?php if($o["handled"] == 1): ?><span style="color:green">已处理</span><?php else: ?><span style="color:red">未处理</span><?php endif; ?></td>
                    <td>
                        <?php if($o['paymode'] == 0): ?><span style="color:green">其他方式</span>
                        <?php elseif($o['paymode'] == 1): ?><span style="color:green">在线支付</span>
                        <?php else: ?><span style="color:green">货到付款</span><?php endif; ?>
                    </td>
                    <td><?php echo (date("Y-m-d H:i:s",$o["time"])); ?></td>
                    <td class="norightborder"><a class="btn btn-warning btn-sm" href="###" onclick="showIntroDetail(<?php echo ($o["id"]); ?>)"><i class="mdi-image-details"></i>详细</a> <a class="btn btn-warning btn-sm" href="javascript:drop_confirm('您确定要删除吗?', '<?php echo U('Store/deleteOrder',array('token'=>$token,'id'=>$o['id'],'dining'=>$isDining));?>');"><i class="mdi-action-delete"></i>删除</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <input type="hidden" name="token" value="<?php echo ($_GET['token']); ?>" />
    </form>
    <script>
    function showIntroDetail(id){
    art.dialog.open('<?php echo U('Store/orderInfo',array('token'=>$token,'dining'=>$isDining,'id'=>''));?>'+id,{lock:false,title:'订单详情',width:1000,height:620,resize:true,yesText:'关闭',background: '#000',opacity: 0.87});
    }
    </script>
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