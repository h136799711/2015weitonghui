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
<!-- <link rel="stylesheet" href="/Public/User/css/diymen/tipswindown.css" type="text/css" media="all" />
<script type="text/javascript" src="/Public/User/css/diymen/tipswindown.js"></script> -->
<script type="text/javascript">
$(function() {
    $("#iframe1").click(function(){
        showmodal("添加菜单","<?php echo C('site_url'); echo U('User/Diymen/class_add');?>");
        // tipsWindown("添加菜单","iframe:<?php echo C('site_url'); echo U('User/Diymen/class_add');?>","760","480","true","","true","leotheme");
    });

});
function showmodal(title,src){
    $("#myModalLabel").text(title);
    
    $("#myFrame").attr("src",src);
    
    // $("#myModal .ajaxcontent").html("");
    
    // $.ajax({url:src,before:function(){
    //         $("#myModal .loading").show();
    // }}).always(function(){ $("#myModal .loading").hide(); })
    // .done(function(data){
    //     $("#myModal .ajaxcontent").html(data);
    // }).fail(function(){
    //     $("#myModal .ajaxcontent").html("载入失败！");
    // });

    $("#myModal").modal('show');
    
}
</script>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
    <!-- Modal Start -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <!-- <div class="loading"><img src="/Public/User/css/loading.gif" alt="loading"></div>
                    <div class="ajaxcontent">
                        
                    </div> -->
                    <iframe id="myFrame" src="" frameborder="0" style="width:100%;height: 640px;">
                        
                    </iframe>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
    <!-- MOdal -->
    <div class="righttitle">
        <h1 class="text-warning">注意：1级菜单最多只能开启3个，2级子菜单最多开启5个，未认证订阅号无法创建自定义菜单！</h1>
    </div>
    <div >
        <form enctype="multipart/form-data" action="" class="form-horizontal" method="post">
            <div class="form-group">
                <label for="" class="control-label col-lg-2 col-md-2">AppId</label>
                <div class="col-lg-5 col-md-6">
                    <input type="text" size="20" tabindex="1" class="form-control" value="<?php echo ($diymen["appid"]); ?>" id="appid" name="appid">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-lg-2 col-md-2">
                    AppSecret
                </label>
                <div class="col-lg-5 col-md-6">
                    <input type="text" size="20" tabindex="2" class="form-control" value="<?php echo ($diymen["appsecret"]); ?>" id="appsecret" name="appsecret">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-lg-2 col-md-2">
                    &nbsp;
                </label>
                <div class="col-lg-5 col-md-6">
                    <button class="btn btn-primary btn-small" value="true" name="appidsubmit" type="submit"><i class="mdi-content-save"></i>保存</button>
                </div>
            </div>
        </form>
    </div>
    <form enctype="multipart/form-data" action="" method="post"><input type="hidden" value="" name="anchor">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-condensed table-bordered table-striped">
        <thead>
            <tr>
                <th style=" width:60px;">显示顺序</th>
                <th style=" width:220px;">主菜单名称</th>
                <th style=" width:170px;">关联关键词</th>
                <th>外链URL</th>
                <th class="norightborder" style=" width:160px;">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$class): $mod = ($i % 2 );++$i;?><tr class="hover">
                <td class="td25">
                    <span><?php echo ($class["sort"]); ?></span>
                </td>
                <td>
                    <div>
                        <span><?php echo ($class["title"]); ?></span>
                    </div>
                </td>
                <td><span><?php echo ($class["keyword"]); ?></span></td>
                <td><span><?php if($class['url'] == false): ?>无链接地址<?php else: echo ($class["url"]); endif; ?></span></td>
                <td>
                    <a class="btn btn-warning btn-sm" href='javascript:showmodal("修改菜单","<?php echo C('site_url'); echo U('Diymen/class_edit',array('id'=>$class['id']));?>");' title="修改主菜单"><i class="mdi-editor-mode-edit"></i>修改</a>
                    <a class="btn btn-warning btn-sm " href="javascript:drop_confirm('您确定要删除吗?', '<?php echo U('Diymen/class_del',array('id'=>$class['id']));?>');"><i class="mdi-action-delete"></i>删除</a>
                </td>
            </tr>
            <?php if(is_array($class['class'])): $i = 0; $__LIST__ = $class['class'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$class1): $mod = ($i % 2 );++$i;?><tr class="td29">
                <td class="td25" >
                    <span><?php echo ($class1["sort"]); ?></span>
                </td>
                <td >
                    <div class="board">
                        <span><?php echo ($class1["title"]); ?></span>
                    </div>
                </td>
                <td >
                    <span><?php echo ($class1["keyword"]); ?></span>
                </td>
                <td><span><?php if($class1['url'] == false): ?>无链接地址<?php else: echo ($class1["url"]); endif; ?></span></td>
                <td >
                    <a class="btn btn-warning btn-sm" href='javascript:showmodal("修改菜单","<?php echo C('site_url'); echo U('Diymen/class_edit',array('id'=>$class['id']));?>");' ><i class="mdi-editor-mode-edit"></i>修改</a>
                <a class="btn btn-warning btn-sm" href="javascript:drop_confirm('您确定要删除吗?', '<?php echo U('Diymen/class_del',array('id'=>$class1['id']));?>');"><i class="mdi-action-delete"></i>删除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
            <tr class="hover">
                <td class="td25" colspan="5">
                    <?php if($class != false): ?><a class="btn btn-primary btn-lg" onclick="drop_confirm('自定义菜单最多勾选3个，每个菜单的子菜单最多5个，请确认!', '<?php echo U('Diymen/class_send',array());?>');" title=""><i class="mdi-notification-sync"></i>生成自定义菜单</a><?php endif; ?>
                    <a class="btn btn-primary" href="javascript:drop_confirm('您确定要删除吗?', '<?php echo U('Diymen/delete');?>');"><i class="mdi-action-delete"></i>清空菜单</a>
                    <button data-top class="btn btn-primary" id="iframe1" type="button"><i class="mdi-content-add"></i>添加一个菜单</button>
                    <div class="bg-warning">
                        官方说明：修改后，需要重新关注，或者最迟隔天才会看到修改后的效果！<br>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
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