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
<style type="text/css">
.cLine {
    display: block;
    width: 100%;
}
.photo li{ float:left; margin:10px 10px 10px 0; position:relative;}
.photoimg{border: 1px solid #DDDDDD;
box-shadow:0 1px 2px 0 rgba(0, 0, 0, 0.15);
-moz-box-shadow:0 1px 2px 0 rgba(0, 0, 0, 0.15);
-webkit-box-shadow:0 1px 2px 0 rgba(0, 0, 0, 0.15);
-webkit-border-radius:5px 5px 5px 5pxx;
-moz-border-radius:5px 5px 10px 10px;
border-radius:5px 5px 10px 10px;
width:235px;padding: 0 0 10px;
background: url(/Public/User/images/photo/bottom.png) repeat-x scroll left bottom #FFFFFF;
background-size:2px auto;
*background:none;
}
.photoimg .cover{ width:100%;height:131px; overflow:hidden;display:block; background:url(/Public/User/images/photo/noneimg.jpg) no-repeat 0 0 #f5f5f5;
-webkit-border-radius:5px 5px 0 0;
-moz-border-radius:5px 5px 0 0;
border-radius:5px 5px 0 0;
}
.photoimg img{ width:100%;
-webkit-border-radius:5px 5px 0 0;
-moz-border-radius:5px 5px 0 0;
border-radius:5px 5px 0 0;
}
.bd h6{ font-size:14px;margin:5px 10px; font-weight:normal;overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap !important;}
.bd p{ margin:5px 10px;}
.sn{ color:#999}
.fr{ position:absolute; bottom:15px;right:10px; display:none;* display: block}
.photoimg:hover .fr{ display:block}
.userinfoArea th {
width: 200px;
}
</style>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
    <div class="righttitle">
        <h4 >相册</h4>
        <div class="searchbar right hide">
        </div>
        <div class="clearfix"></div>
    </div>
    <div class=" bgfc">
        <form method="post" action="<?php echo U('Photo/config');?>" enctype="multipart/form-data">
            <input type="hidden" name="formhash" value="7566c850">
            <table class="table" ><tbody>
                <tr>
                    <th>回复：相册 触发此功能：</th>
                    <td><strong><a href="" class="green">在回复中，系统默认第一个相册（封面，标题，筒介）为图文回复信息</a></strong></td>
                </tr>
                <tr>
                    <th>相册头部图片外链地址:</th>
                    <td><input type="text" name="picurl" id="picurl" value="<?php echo ($headpic); ?>" class="form-control" style="width:400px;">   <script src="/Public/static/gfile.js"></script><a href="###" class="btn btn-warning btn-sm" onclick="gfilePicUpload('picurl',700,420,'<?php echo ($token); ?>')" class="a_upload"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('picurl')" class="btn btn-warning btn-sm" ><i class="mdi-action-pageview"></i>预览</a> <button type="submit" name="homesubmit" value="true" class="btn btn-warning btn-sm" ><i class="mdi-editor-mode-edit"></i>修改</button></td>
                </tr></tbody></table>
            </form>
        </div>
        <div >
        <a href="<?php echo U('Photo/add',array('token'=>getToken()));?>" title="创建相册" class="btn btn-primary"><i class="mdi-content-add"></i>创建相册</a> </div>
        <div class="clearfix"></div>
    </div>
    <div class="">
        <ul class="photo">
            <?php if(is_array($photo)): $i = 0; $__LIST__ = $photo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$photo): $mod = ($i % 2 );++$i;?><li>
                <div class="photoimg">
                    <a title="<?php echo ($photo["title"]); ?>" class="cover" href="<?php echo U('Photo/list_add',array('id'=>$photo['id']));?>">
                    <img src="<?php echo ($photo["picurl"]); ?>" alt="<?php echo ($photo["title"]); ?>">
                    </a>
                    <div class="bd">
                        <h6><?php echo ($photo["title"]); ?></h6>
                        <p class="sn">有<?php echo ($photo["num"]); ?>张照片</p>
                    </div>
                    <div class="fr">
                        <a class="btn btn-warning btn-sm" href="<?php echo U('Photo/list_add',array('id'=>$photo['id']));?>"><i class="mdi-file-file-upload"></i>上传图片</a>
                        <a class="btn btn-warning btn-sm" href="<?php echo U('Photo/edit',array('token'=>session('token'),'id'=>$photo['id']));?>"><i class="mdi-editor-mode-edit"></i>编辑</a>　<a class="btn btn-warning btn-sm" href="javascript:drop_confirm('您确定要删除吗?', '<?php echo U('Photo/del',array('token'=>session('token'),'id'=>$photo['id']));?>');"><i class="mdi-action-delete"></i>删除</a>
                    </div>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div >
        <div class="pageNavigator right">
            <div class="pages"><?php echo ($page); ?></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <script>
        function checkAll(form, name) {
        for(var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if(e.name.match(name)) {
        e.checked = form.elements['chkall'].checked;
        }
        }
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