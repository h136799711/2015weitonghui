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
              <h4 > 在线预订管理</h4>
                  <div class="searchbar right hide" style="display:none">  <form method="get" action="index.php">
                  <input type="text" id="msgSearchInput" class="form-control" placeholder="输入关键词搜索" name="keyz" value="">
                  <input type="hidden" name="ac" value="hotels-sncode">
                  <input type="hidden" name="id" value="9878">
 
                  <input type="hidden" name="tid" value="285">
                  <input type="submit" value="搜索" id="msgSearchBtn" href="" class="btn btn-default " title="搜索">
                  </form>
                  </div>
              <div class="clearfix"></div> 
          </div>
          <div class="righttitle">
            本次收集订单总数：<span class="redamount"><?php echo ($count); ?></span>个　　预订成功：<span class="redamount"><?php echo ($ok_count); ?></span>个　　预订失败：<span class="redamount"><?php echo ($lost_count); ?></span>个　　未处理订单：<span class="redamount"><?php echo ($no_count); ?></span>个 <span class="redamount">入住时间填写格式:2013-08-25 19:30</span><a href="<?php echo U('Host/index',array('token'=>$token,'id'=>$_GET['id']));?>" class="btn btn-primary"><i class="mdi-content-reply"></i>返回</a>
          </div>
          <div class="">
          <form method="post" action="" id="info">
          <input name="delall" type="hidden" value="">
           <input name="wxid" type="hidden" value="">
            <table class="table table-condensed table-bordered table-striped" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
                    <th width="30">序号</th>
                    <th width="60">预订人</th>
                    <th width="100">电话</th>
                    <th width="120">入住时间，格式2013-08-25 19:30</th>
                    <th width="80">房间类型</th>
                    <th width="120">预订时间</th>
                    <th width="40">数量</th>
                    <th width="60">价格</th>
                    <th width="80">订单状态</th>
                    <th width="80">备注</th>
                    <th width="120" class="norightborder">操作</th>
                </tr>
              </thead>
              <tbody>
<tr></tr>
<?php if(is_array($li)): $i = 0; $__LIST__ = $li;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><form action="<?php echo U('Host/admin');?>" method="post">  
<tr>
<td><?php echo ($i); ?></td>
<td><?php echo ($list["book_people"]); ?></td>
<td><?php echo ($list["tel"]); ?></td>
<td>
  
  <input type="text" style="border:1px solid" name="check_in" value="<?php if($list['check_in'] != false): echo (date("Y-m-d H:i",$list["check_in"])); else: endif; ?>"   placeholder="请手动输入入住时间"  />                

 
</td>
<td><?php echo ($list["room_type"]); ?></td>
 <td><?php echo (date("Y-m-d H:i:s",$list["book_time"])); ?></td>
 <td><?php echo ($list["book_num"]); ?></td>
 <td><?php echo ($list["price"]); ?></td>
  <td>
  <input type="hidden" name="id" value="<?php echo ($list["id"]); ?>">
    <input type="hidden" name="hid" value="<?php echo ($_GET['id']); ?>">
 <?php if($list["order_status"] == 1): ?>成功 
 <?php elseif($list["order_status"] == 2): ?> 失败 
 <?php else: ?> 
   <select class="form-control"  name="status" >    
    <option value="1">成功</option>
    <option value="2">失败</option>    
  </select><?php endif; ?>  

  </td>
  <td><?php echo ($list["remarks"]); ?></td>
<td colspan="10" class="norightborder">  

<a href="javascript:drop_confirm('您确定要删除吗?', '<?php echo U('Host/order_del',array('id'=>$list['id'],'token'=>$token));?>');" class="btn btn-warning btn-sm"><i class="mdi-action-delete"></i>删除</a>
<?php if($list["order_status"] == 1): ?>不可修改
<?php else: ?>
<button type="submit" style="cursor:pointer" class="btn btn-warning btn-sm" >修改</button><?php endif; ?>


</td>

</tr>
</form><?php endforeach; endif; else: echo "" ;endif; ?>

 
</tbody>
            </table>
           </form> 
            <div class="righttitle">
            <span class="redamount"><?php echo ($page); ?></span>
            <a href="<?php echo U('Host/index',array('token'=>$token,'id'=>$_GET['id']));?>" class="btn btn-primary"><i class="mdi-content-reply"></i>返回</a>
          </div>
           <script>
   function checkvotethis() {
var aa=document.getElementsByName('del_id[]');
var mnum = aa.length;
j=0;
for(i=0;i<mnum;i++){
if(aa[i].checked){
j++;
}
}
if(j>0) {
document.getElementById('info').submit();
} else {
alert('未选中任何文章或回复！')
}
}

   </script>
          </div>
            
 
          <div >
            <div class="pageNavigator right">
                 <div class="pages"></div>
              </div>
            <div class="clearfix"></div>
          </div>
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