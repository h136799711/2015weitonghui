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
<script type="text/javascript" src="/Public/static/audioplayer/inc/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/Public/static/audioplayer/inc/jquery.mb.miniPlayer.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/static/audioplayer/css/miniplayer.css" title="style" media="screen"/>
<script type="text/javascript">
        $(function () {
            $(".audio").mb_miniPlayer({
                width: 200,
                inLine: false,
                onEnd: playNext
            });
            function playNext(player) {
                var players = $(".audio");
                document.playerIDX = player.idx + 1 <= players.length - 1 ? player.idx + 1 : 0;
                players.eq(document.playerIDX).mb_miniPlayer_play();
            }
        });
</script>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
    <div class="righttitle">
        <h4>首页回复配置 </h4>
    </div>
    <div class=" bgfc">
        <form class="form" method="post" action="" target="_top" enctype="multipart/form-data">
            <table class="table" >
                <tbody>
                    <tr>
                        <th valign="top"><span class="red">*</span>关键词：</th>
                        <td>
                        <span class="red">首页 或者 home —— 当用户输入该关键词时，将会触发此回复。</span></td>
                    </tr>
                    <tr>
                        <th width="120">回复标题：</th>
                        <td><input type="text" name="title" value="<?php echo ($home["title"]); ?>" class="form-control" style="width:550px;"></td>
                    </tr>
                    <tr>
                        <th width="120">内容介绍：</th>
                        <td><textarea style="width:560px;height:75px" name="info" id="info" class="form-control"><?php echo ($home["info"]); ?></textarea><br/>最多填写120个字</td>
                    </tr>
                    <tr>
                        <th>回复图片：</th>
                        <td><input type="text" name="picurl" id="picurl" value="<?php echo ($home["picurl"]); ?>" class="form-control" style="width:550px;">   <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('picurl',700,420,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>
                         <a href="###" class="btn btn-warning btn-sm" onclick="viewImg('picurl')"><i class="mdi-action-pageview"></i>预览</a></td>
                    </tr>
                    <tr>
                        <th>3G网站背景：</th>
                        <td><input type="hidden" name="homeurl" id="homeurl" value="<?php echo ($home["homeurl"]); ?>" class="px " style="width:550px;"><a class="btn btn-warning btn-sm" href="<?php echo U('User/Flash/index',array('token'=>$token,'tip'=>2));?>">请在首页背景图中设置</a></td>
                    </tr>
                    <tr>
                        <th>背景音乐：</th>
                        <td>
                            <table><tr><?php if($home["musicurl"] != ''): ?><td><a style="width:120px;float:left" id="musicurl_src" class="audio {skin:'blue'}" href="<?php echo ($home["musicurl"]); ?>">音乐播放</a></td><?php endif; ?><td> <input class="form-control" name="musicurl" value="<?php echo ($home["musicurl"]); ?>" id="musicurl" style="width:200px;float:left" onchange="$('#musicurl_src').attr('href',this.value"> <a href="###" onclick="gfilePicUpload('musicurl',0,0,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a>&nbsp;<a href="###" onclick="chooseFile('musicurl','music')"  class="btn btn-warning btn-sm"><i class="mdi-toggle-check-box"></i>选择</a></td></tr></table>
                        </td>
                    </tr>
                    <tr>
                        <th>公司Logo：</th>
                        <td><input type="text" name="logo" id="logo" value="<?php echo ($home["logo"]); ?>" class="form-control" style="width:550px;">  <a href="###" onclick="gfilePicUpload('logo',1500,1000,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" class="btn btn-warning btn-sm" onclick="viewImg('logo')"><i class="mdi-action-pageview"></i>预览</a><br/> </td>
                    </tr>
                   <tr>
                        <th>外链：</th>
                        <td><input type="text" name="apiurl" value="<?php echo ($home["apiurl"]); ?>" class="form-control" style="width:550px;"><br/> 外链例如：http://www.baidu.com </td>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <td>
                            <button type="submit" name="button" class="btn btn-primary"><i class="mdi-content-save"></i>保存</button>
                            <a href="javascript:history.go(-1);" class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
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