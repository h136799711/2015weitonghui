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
              <h4 >刮刮卡活动信息 (<?php echo ($count); ?>) 条<span class="FAQ">你本月有 <?php echo ($group["activitynum"]); ?> 次机会可免收活动创建费，已经使用了 <?php echo ($activitynum); ?> 次机会!</span></h4>
                 
          </div>
          <div >
           
  <a href='<?php echo U('Guajiang/add',array('token'=>$token));?>' title='新增刮刮卡活动' class='btn btn-primary'><i class="mdi-content-add"></i>新增刮刮卡活动</a>
              
            </div>
          
          <form method="post"  action="" id="info" >
          <input name="delall"  type="hidden" value="" />
           <input name="wxid"  type="hidden" value="" />
            <table class="table table-condensed table-bordered table-striped" border="0" cellSpacing="0" cellPadding="0" width="100%">
              <thead>
                <tr>
<th class="select">选择</th>
<th>活动名称</th>
<th>关键字</th>
<th>参与人数</th>
<th>开始时间/结束时间</th>
<th>状态</th>
<th>外链代码</th>
<th class="norightborder">操作</th>
                </tr>
              </thead>
              <tbody>
                <tr></tr>
                  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                  <td><input type="checkbox" name='del_id[]' value="842" class="checkitem"></td>
                  <td><?php echo ($list["title"]); ?></td>
                  <td><?php echo ($list["keyword"]); ?></td> 
				  <td><?php echo ($list["joinnum"]); ?></td>                
                  <td><?php echo (date('Y-m-d',$list["statdate"])); ?><br /><?php echo (date('Y-m-d',$list["enddate"])); ?></td>
                  <td>
				  <?php if($list['status'] == 0): ?><span class="red">未开始</span><?php else: ?><span class="green">已经开始</span><?php endif; ?>
				  
				 </td>
                  <td>刮刮卡 <?php echo ($list["id"]); ?></td>
                   <td class="norightborder">
           <a class="btn btn-warning btn-sm"  href="<?php echo U('User/Guajiang/sn',array('type'=>2,'id'=>$list['id']));?>"><i class="mdi-communication-vpn-key"></i>SN码管理</a> 
           <a class="btn btn-warning btn-sm"  href="<?php echo U('User/Guajiang/edit',array('type'=>5,'id'=>$list['id']));?> "><i class="mdi-editor-mode-edit"></i>编辑</a>  
           <a class="btn btn-warning btn-sm"  href="<?php echo U('User/Lottery/cheat',array('type'=>5,'id'=>$list['id']));?>"><i class="mdi-action-help"></i>作弊</a> 
  
           <a class="btn btn-warning btn-sm"  href="
           <?php if($list['status'] == 1): ?>javascript:drop_confirm('你确定要结束活动吗，结束后不可再开启本活动!', '<?php echo U('User/Guajiang/endLottery',array('id'=>$list['id']));?>');<?php else: echo U('User/Guajiang/startLottery',array('id'=>$list['id'])); endif; ?>">
           <?php if($list['status'] == 0): ?><i class="mdi-av-play-arrow"></i>开始
<?php else: ?><i class="mdi-av-stop"></i>结束<?php endif; ?>           
           </a>
          
           <a  class="btn btn-warning btn-sm"  href="<?php echo U('User/Guajiang/del',array('id'=>$list['id']));?>"><i class="mdi-action-delete"></i>删除</a></td>

                                 </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </tbody>
            </table>
           </form> 
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
            <div class="pageNavigator right">
                 <div class="pages"></div>
              </div>
  <script>

function checkAll(form, name) {
for(var i = 0; i < form.elements.length; i++) {
var e = form.elements[i];
if(e.name.match(name)) {
e.checked = form.elements['chkall'].checked;
}
}
}</script>
  <!--底部-->
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