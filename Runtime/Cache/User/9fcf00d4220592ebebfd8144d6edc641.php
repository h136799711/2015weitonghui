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
		<h4>房间分类操作</h4> 
		<a href="<?php echo U('Hotels/index',array('token' => $token,'cid'=>$cid));?>" class="btn btn-primary btn-sm" data-top><i class="mdi-content-reply"></i>返回</a> 
	</div> 
<?php if($ischild != 1): ?><div class="bg-warning tip">此处只显示总店信息，连锁店订单及菜品请进入相应平台进行管理，连锁店登录账号密码及登录地址请在LBS里设置查看</div><?php endif; ?>
<form method="post" action="" id="formID">
<input type="hidden" name="id" value="<?php echo ($tableData["id"]); ?>" />
<input type="hidden" name="cid" value="<?php echo ($cid); ?>" />
    <div class=" bgfc"> 
     <table class="table" > 
      <tbody> 
       <tr> 
        <th><span class="red">*</span>名称：</th> 
        <td>
        <input type="text" name="name" id="name" value="<?php echo ($tableData["name"]); ?>" class="form-control" style="width:400px;" />
        </td> 
       </tr> 
       <tr> 
        <th><span class="red">*</span>普通价格：</th> 
        <td>
        <input type="text" name="price" id="price" value="<?php echo ($tableData["price"]); ?>" class="form-control" style="width:100px;" />
        </td> 
       </tr> 
       <tr> 
        <th><span class="red">*</span>会员价格：</th> 
        <td>
        <input type="text" name="vprice" id="vprice" value="<?php echo ($tableData["vprice"]); ?>" class="form-control" style="width:100px;" />
        </td> 
       </tr> 
       <tr> 
        <th><span class="red">*</span>容纳人数：</th> 
        <td>
        <input type="text" name="num" id="num" value="<?php echo ($tableData["num"]); ?>" class="form-control" style="width:100px;" />
        </td> 
       </tr> 
       <tr> 
        <th>展示图片：</th>
        <td><input type="text" name="image" value="<?php echo ($tableData["image"]); ?>" class="form-control" id="pic" style="width:400px;" />  <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('pic',700,700,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" class="btn btn-warning btn-sm" onclick="viewImg('pic')"><i class="mdi-action-pageview"></i>预览</a></td> 
       </tr>
       <tr> 
        <th>描述：</th> 
        <td><textarea name="note" class="form-control" style="width:400px;height:80px;"><?php echo ($tableData["note"]); ?></textarea></td> 
       </tr>
       <tr>   
       <th>&nbsp;</th>
       <td>
       <button type="submit" name="submit" class="btn btn-primary" id="save"><i class="mdi-content-save"></i>保存</button> &nbsp; <a href="<?php echo U('Hotels/index',array('token' => $token, 'cid' => $cid));?>" class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a></td> 
       </tr> 
      </tbody> 
     </table> 
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