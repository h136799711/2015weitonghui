<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html >
    <head>
        <title> <?php echo ($cfg_siteTitle); ?> <?php echo ($cfg_siteName); ?></title>
        <meta name="viewport" content="width=device-width,target-densitydpi=high-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta http-equiv="content" content ="text/html; charset=utf-8" />
        <meta name="keywords" content = "<?php echo ($cfg_metaKeyword); ?>" />
        <meta name="description" content = "<?php echo ($cfg_metaDes); ?>" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/ripples.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/material-wfont.min.css" />
        <link href="/Public/User/css/new.css" rel="stylesheet" type="text/css" />
        
        <script src="/Public/static/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script>var SITEURL='';</script>
        <script type="text/javascript">
                window.GOORAYE  = {
                    IndexURL :  '' +'/index.php'
                };
        </script>
        <style type="text/css">
                    .mask{
                    width: 99999px;
                    height: 99999px;
                    background: rgba(85, 85, 85, 0.55);
                    position: absolute;
                    z-index: 10;
                    top: 0px;
                    }
                    .goorayealert{
                    display: none;
                    background: #f8f8f8;
                    padding: 15px;
                    top:100px;
                    width:460px;
                    position: absolute;
                    left: 50%;
                    z-index: 15;
                    margin-left: -230px;
                    }
                    .alertContent {
                    background-color: #fff;
                    }
                    .close:hover{
                    color:#000;
                    }
                    .close{
                    float: right;
                    font-size: 21px;
                    font-weight: bold;
                    line-height: 1;
                    color: #000;
                    top:-6px;
                    text-shadow: 0 1px 0 #fff;
                    opacity: .2;
                    filter: alpha(opacity=20);
                    cursor: pointer;
                    position: relative;
                    }
        </style>
    </head>
    <body class='container-fluid row'>
        <div class="navbar navbar-default top">
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
                <ul class="h3 nav navbar-nav navbar-right">
                    <li style="height: 60px;line-height: 60px;color: #fff;" >
                        <?php if($_SESSION[uid]==false): else: ?>
                        你好,<?php echo (session('uname')); ?>（uid:<?php echo (session('uid')); ?>）<?php endif; ?>
                    </li>
                    <li><a class="logout" title="退出系统" href="<?php echo U('Home/Index/logout');?>" ><i class="mdi-action-exit-to-app"></i></a></li>
                </ul>
            </div>
        </div>
<style type="text/css">

</style>
<!-- 右边内容 START -->
<div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 " style="padding:20px">
    <?php if($userinfo['wechat_card_num'] - $thisUser['wechat_card_num'] > 0 ): ?><a class="btn btn-primary" onclick="location.href='<?php echo U('Index/add');?>';">添加微信公众号</a>
    <span class="text-info" >您还可以创建<?php echo ($userinfo['wechat_card_num'] - $thisUser['wechat_card_num']); ?>个微信公众号</span>
    <?php else: endif; ?>
 
    <!-- 公众号列表 START-->
    <div class=" " >
        <table class="table table-condensed table-bordered table-striped" border="0" cellSpacing="0" cellPadding="0" width="100%">
            <thead>
                <tr>
                    <th>公众号名称</th>
                    <th style="text-align:center">用户组</th>
                    <th>到期时间</th>
                    <!-- <th>已定义/上限</th> -->
                    <!-- <th>请求数</th> -->
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <tr></tr>
            <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><p><a href="<?php echo U('Function/index',array('id'=>$vo['id'],'token'=>$vo['token']));?>" title="点击进入功能管理"><img src="<?php echo ($vo["headerpic"]); ?>" width="40" height="40"></a></p><p><?php echo ($vo["wxname"]); ?></p></td>
                <td align="center"><?php echo ($thisGroup["name"]); ?></td>
                <td><?php echo (date("Y-m-d",$viptime)); ?> <!-- <a href="###" onclick="alert('请联系我们，电话0575-89974522')" id="smemberss" class="btn btn-flat btn-link btn-sm text-info"><em>如何续费</em></a> --></td>
                <td class="norightborder">
                    <a class="btn btn-lg btn-primary" href="<?php echo U('Function/index',array('id'=>$vo['id'],'token'=>$vo['token']));?>" class="btn btn-primary" >进入管理</a>
                    <a target="_blank" href="<?php echo U('Home/Index/bind',array('token'=>$vo['token'],'encodingaeskey'=>$vo['encodingaeskey']));?>" class="btn btn-primary btn-sm" >绑定公众号</a>
                    <a  class="btn btn-warning btn-sm" href="<?php echo U('Index/edit',array('id'=>$vo['id']));?>"><i class="mdi-editor-mode-edit"></i>编辑</a>
                    <a   href="javascript:drop_confirm('您确定要删除吗?', '<?php echo U('Index/del',array('id'=>$vo['id']));?>');" class="btn btn-danger btn-sm"><i class="mdi-action-delete"></i>删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<!-- 公众号列表 END-->
<!-- 分页 START -->
<div class="pageNavigator right">
    <div class="pages"></div>
</div>
<!-- 分页 END-->
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