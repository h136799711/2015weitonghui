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
<!--弹出层样式-->
<style type="text/css">
body,h2{margin:0;padding:0;}
#faqbg{background-color:#666666;position:absolute;z-index:99;left:0;top:0;display:none;width:100%;height:1000px;opacity:0.5;filter:alpha(opacity=50);-moz-opacity:0.5;}
#faqdiv{position:absolute;width:600px;left:50%;top:50%;margin-left:-300px;height:auto;z-index:100;background-color:#fff;border:1px #8FA4F5 solid;padding:1px;}
#faqdiv h2{height:25px;font-size:14px;background-color:#BABABA;position:relative;padding-left:10px;line-height:25px;}
#faqdiv h2 a{position:absolute;right:5px;font-size:12px;color:#FF0000;}
#faqdiv .form{padding:10px;}
</style>
<script>
//弹出层js start
$(function(){
$(".but").click(function(){
            var messageid = $(this).attr("messageid");
//var str = "这里是信息内容，这里是信息内容！";
$(".form").html(messageid);
$("#faqbg").css({display:"block",height:$(document).height()});
var yscroll =document.documentElement.scrollTop;
$("#faqdiv").css("top","100px");
$("#faqdiv").css("display","block");
document.documentElement.scrollTop=0;
});
$(".close").click(function(){
$("#faqbg").css("display","none");
$("#faqdiv").css("display","none");
});
})
//弹出层end
$(document).ready(function(){
    $("#selected").click(function () {//反选
        $("input[name='items']").each(function(){
            if (this.checked) {
                this.checked = false;
            }
            else {
                this.checked = true;
            }
        });
    });
    
    $("#checked").click(function(){
        var chk_value =[];
        var token = $("#tokened").val();
            $('input[name="items"]:checked').each(function(){
                chk_value.push($(this).val());
        });
        if(chk_value.length==0){
            alert("你还未选择要操作的项！");
            return;
        }
        $.ajax({
            type:"get",
            url:"<?php echo U('User/Reply/checkMany');?>?token="+token+"&chk_value="+chk_value,
            success:function(result){
                $("input[name='items']").each(function(){
            if (this.checked) {
                this.checked = false;
            }
        });
                alert(result);
                window.location.reload();
            }
        });
    });
    $("#replyed").click(function(){
    
        var chk_value =[];
        var wecha_id =$("#wecha_id").val();
        //alert(wecha_id);exit;
        var checked =$("#needCheck").val();
        var token = $("#tokened").val();
            $('input[name="items"]:checked').each(function(){
                chk_value.push($(this).val());
        });
        if(chk_value.length==0){
            alert("你还未选择要操作的项！");
            return;
        }else{
            location.href="<?php echo U('User/Reply/add');?>"+"?chk_value="+chk_value+"&token="+token+"&wecha_id="+wecha_id+"&checked="+checked;
            return;
        }
    
    });
    
})
$(document).on("click","#del",function(){
    var chk_value =[];
    var token = $("#tokened").val();
        $('input[name="items"]:checked').each(function(){
            chk_value.push($(this).val());
    });
    if(chk_value.length==0){
        alert("你还未选择要操作的项！");
        return;
    }
    $.ajax({
        type:"get",
        url:"<?php echo U('User/Reply/del');?>?token="+token+"&chk_value="+chk_value,
        success:function(result){
            $("input[name='items']").each(function(){
            if (this.checked) {
                this.checked = false;
            }
        });
            alert(result);
            window.location.reload();
        }
    });
});
</script>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
    <div class="righttitle">
        <h4 >留言表单  <input type="text" name="tokened" id="tokened" value="<?php echo ($token); ?>" style="display:none;"></h4>
        <div class="searchbar right hide">
        </div>
        <div class="clearfix"></div>
    </div>
    <div >
        <span> <a href="#" title="选中审核" class="btn btn-primary" id="checked"><i class="mdi-image-edit"></i>选中审核</a></span>
        <span> <a href="#" title="选中回复" class="btn btn-primary" id="replyed"><i class="mdi-content-reply"></i>选中回复</a></span>
        <span> <a href="#" title="选中删除" class="btn btn-primary" id="del"><i class="mdi-action-delete"></i>选中删除</a></span>
        <span> <a href="<?php echo U('User/Reply/config');?>" title="留言板配置" class="btn btn-primary"><i class="mdi-action-settings"></i>留言板配置</a></span>
    </div>
    <form method="post" action="" id="info">
        <input name="wecha_id" type="hidden" id="wecha_id" value="<?php echo ($wecha_id); ?>">
        <input name="checked" type="hidden" id="needCheck" value="<?php echo ($needCheck); ?>">
        <table class="table table-condensed table-bordered table-striped" border="0" cellspacing="0" cellpadding="0" width="100%">
            <thead>
                <tr>
                    <th class="select"><input type="button" value="全选" name="button" id="selected" ></th>
                    <th width="130">昵称</th>
                    <th width="130">留言内容</th>
                    <th width="170">查看回复</th>
                    <th width="130">留言时间</th>
                    <th width="130" class="norightborder">操作</th>
                </tr>
            </thead>
            <tbody>
            <tr></tr>
            <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr >
                <td id="playlist"><input type="checkbox" name="items" value="<?php echo ($item["id"]); ?>"  class="checkitem"></td>
                <td><?php echo ($item["name"]); ?></td>
                <td><a href="###" onclick="art.dialog({col-xs-9 col-sm-9  col-md-10 col-lg-10 : '<?php echo ($item["message"]); ?>',width:300,height:200,resize:true,yesText:'关闭',background: '#000',opacity: 0.45});" class="btn btn-warning btn-sm">查看留言 <?php if($item['checked'] != 1): ?><font style="color:white;font-size:12px;">(未审核)</font><?php else: ?>
                    <font ></font><?php endif; ?>
                </a></td>
                <td><a class="btn btn-warning btn-sm" href="<?php echo U('User/Reply/reply',array('msgid'=>$item['id'],'token'=>$token,'wecha_id'=>$wecha_id));?>">查看回复<font color="#fff">(共<font color="white"><?php echo ($item["count"]); ?></font>条回复/<font style="color:white"><?php echo ($item["chkcount"]); ?></font>条新回复)</font></a></td>
                <td><?php echo (date("Y-m-d H:i:s",$item["time"])); ?></td>
                <td class="norightborder">
                    <?php if($item['checked'] != '1'): ?><a class="btn btn-warning btn-sm" href="<?php echo U('User/Reply/checkOne',array('chk_value'=>$item['id'],'token'=>$token));?>">审核</a><?php endif; ?>
                    <!--    &nbsp;&nbsp;<a href="#" messageid="<?php echo ($item["id"]); ?>" class="replyeded">回复</a>-->
                &nbsp;&nbsp;<a class="btn btn-warning btn-sm" href="javascript:drop_confirm('您确定要删除吗?', '<?php echo U('User/Reply/deled',array('chk_value'=>$item['id'],'token'=>$token));?>');"><i class="mdi-action-delete"></i>删除</a></td>
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