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
        <h4>认证服务号渠道二维码生成与统计</h4>

    </div>

    <div  style=" padding:5px 10px; margin:0">
        <table class="table table-condensed table-bordered table-striped" border="" cellspacing="0" cellpadding="0" width="100%">
            <thead>
                <tr>
                    <th style="width:80px;">渠道ID</th>
                    <th>渠道名称</th>
                    <th>渠道使用量</th>
                    <th>触发关键词</th>
                    <th style="width:80px;">渠道二维码</th>
                    <!-- <th style="width:80px;">状态</th> -->
                    <th style=" width:100px;" class="norightborder">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                    <td style="width:80px;"><?php echo ($list["id"]); ?></td>
                    <td><?php echo ($list["title"]); ?></td>
                    <td><?php echo ($list["attention_num"]); ?></td>
                    <td><?php echo ($list["keyword"]); ?></td>
                    <td><?php if($list['code_url'] != ''): ?><a class="btn btn-warning btn-sm" href="https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=<?php echo ($list["code_url"]); ?>" target="_blank"><i class="mdi-action-visibility"></i>查看</a><?php else: ?><a class="btn btn-warning btn-sm" href="<?php echo U('Recognition/get_code',array('id'=>$list['id']));?>">获取二维码</a><?php endif; ?></td>
                    <!-- <td><?php if($list['status'] == 0): ?><i class="mdi-av-play-arrow"></i>启用<?php else: ?><i class="mdi-av-pause"></i>暂停<?php endif; ?></td> -->
                    <td class="norightborder">
                        <?php if($list['status'] == 0): ?><a class="btn btn-warning btn-sm" href="<?php echo U('Recognition/status',array('type'=>1,'id'=>$list['id']));?>"><i class="mdi-av-pause"></i>停用</a><?php else: ?><a class="btn btn-warning btn-sm" href="<?php echo U('Recognition/status',array('type'=>0,'id'=>$list['id']));?>"><i class="mdi-av-play-arrow"></i>启用</a><?php endif; ?> |
                        <a class="btn btn-warning btn-sm" href="<?php echo U('Recognition/del',array('id'=>$list['id']));?>"><i class="mdi-action-delete"></i>删除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                </tr>
            </tbody>
        </table>
        <div >
            <div class="pageNavigator right">
                <div class="pages"><?php echo ($page); ?></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <form class="form" method="post" action="" target="_top" enctype="multipart/form-data">
            <table style=" margin:20px 0 0 0;" border="0" cellspacing="0" cellpadding="0" width="100%">
                <thead>
                    <tr>
                        <th valign="top"><label for="title">渠道名称：</label></th>
                        <td><input type="input" class="form-control" required="" id="title" value="" name="title" style="width:400px"> 请认真填写生成后不可以编辑！只能删除重建<br>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <th valign="top"><label for="keyword">触发关键词：</label></th>
                    <td><input type="input" class="form-control" id="keyword" value="" name="keyword" style="width:60px"> 非必填项，建议留空（留空保留原关注时回复的内容!）<br>
                </td>
                <td>&nbsp;</td>
            </tr>
        </thead>

        <tbody>

            <tr>
                <th></th>
                <td><button type="submit" name="button" class="btn btn-primary">添加</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>

<div class="clear"></div>
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