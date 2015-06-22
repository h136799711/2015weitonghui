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
<style>
.span4, .span1, .option, .valid, .input-large{
	background: url(/Public/User/images/img/px.png) repeat-x scroll 0 0 #FFFFFF;
    border-color: #848484 #E0E0E0 #E0E0E0 #848484;
    border-style: solid;
    border-width: 1px;
	border-radius: 2px 2px 2px 2px;
	padding:5px;
	width: 210px;
}
#tags {
	MARGIN: 15px 0 0 0; WIDTH: 990px; PADDING-TOP: 0px; HEIGHT: 40px;BACKGROUND: url(/Public/User/images/tagbg.gif) repeat-x left bottom;
}
#tags LI {
	BACKGROUND: url(/Public/User/images/tagleft.gif) no-repeat left bottom; FLOAT: left; MARGIN-RIGHT: 3px; LIST-STYLE-TYPE: none; HEIGHT: 40px
}
#tags LI A {
	PADDING:0 20px; BACKGROUND: url(/Public/User/images/tagright.gif) no-repeat right bottom; FLOAT: left; COLOR: #999; LINE-HEIGHT: 40px; HEIGHT: 40px; TEXT-DECORATION: none; font-size:16px;
}
#tags LI.emptyTag {
	BACKGROUND: none transparent scroll repeat 0% 0%; WIDTH: 4px
}
#tags LI.selectTag {
	BACKGROUND-POSITION: left top; MARGIN-BOTTOM: -2px; POSITION: relative; HEIGHT: 40px
}
#tags LI.selectTag A {
	BACKGROUND-POSITION: right top; COLOR: #000; LINE-HEIGHT: 40px; HEIGHT: 40px
}
.cateradio {
padding-top: 20px;
}
</style>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">

<div class="righttitle">
  <h4>微喜帖信息列表</h4>
  <a href="<?php echo U('Wedding/index',array('token'=>getToken()));?>" class="btn btn-primary" data-top><i class="mdi-content-reply"></i>返回</a>
 </div>
 <div class=" form">
 <ul id="tags" class="nav nav-tabs">
			
              <li <?php if($type == 1): ?>class="active" role="presentation"<?php endif; ?>><a href="<?php echo U('Wedding/info',array('id'=>strip_tags($_GET['id']),'type'=>1));?>">赴宴名单</a> </li>
			
              <li <?php if($type == 2): ?>class="active" role="presentation"<?php endif; ?>><a href="<?php echo U('Wedding/info',array('id'=>strip_tags($_GET['id']),'type'=>2));?>">收到祝福</a> </li>
			  
              <div class="clearfix"></div>
          </ul>
 
<div id="tagcol-xs-9 col-sm-9  col-md-10 col-lg-10 ">
<div class="tagcol-xs-9 col-sm-9  col-md-10 col-lg-10  selectTag" id="tagcol-xs-9 col-sm-9  col-md-10 col-lg-10 0" style="display: block;">
<fieldset>
            <ul class="cateradio">
                <div class="">
          <form method="post" action="" id="info">
          <input name="delall" type="hidden" value="del">
           <input name="wxid" type="hidden" value="<?php echo ($wxid); ?>">
            <table class="table table-condensed table-bordered table-striped" border="0" cellspacing="0" cellpadding="0" width="100%">
				 <thead>
					<tr>
						<th>序号</th>
						<th>姓名</th>
						<th>电话</th>
						<th><?php if($type == 1): ?>赴宴人数<?php else: ?>祝福内容<?php endif; ?></th>
						<th>操作</th>
					</tr>
				</thead>
				   <tbody>
			  <?php if(is_array($wedding)): $i = 0; $__LIST__ = $wedding;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wedding): $mod = ($i % 2 );++$i;?><tr>
                  <td><?php echo ($i); ?></td>
                  <td><?php echo ($wedding["name"]); ?></td>
                  <td><?php echo ($wedding["phone"]); ?></td>
                  <td><?php if($type == 1): echo ($wedding["num"]); else: echo ($wedding["info"]); endif; ?></td>
                
                  <td class="norightborder">
					<a class="btn btn-warning btn-sm" href="javascript:drop_confirm('您确定要删除吗?', '<?php echo U('User/Wedding/infodel',array('id'=>$wedding['id']));?>');"><i class="mdi-action-delete"></i>删除</a>
				   </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                 <tr>

                </tr>
              </tbody>
				
			</table>
           </form> 
           
          </div>
            </ul>
</fieldset>
</div>
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