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
<script src="/Public/static/fushionCharts/JSClass/FusionCharts.js" type="text/javascript"></script>   
<!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
         
          <div class="righttitle">
              <h4 >粉丝行为统计分析</h4>
                  
              <div class="clearfix"></div>
          </div>
 <div class="cLineD">

         </div>
          <div >
    <div class="bg-warning tip" style="margin:0 auto">高级服务号才能使用此功能</div>
</div>
 <div class=" form">
<ul id="tags" class="nav nav-tabs" style="width:100%">
		<li <?php if($listinfo == '1'): ?>class="active" role="presentation"<?php endif; ?>>
				<a href="<?php echo U('WechatBehavior/statistics');?>"><?php echo ($days); ?>日行为统计分析</a> 
			</li>
			<li <?php if($listinfo != '1'): ?>class="active" role="presentation"<?php endif; ?>>
				<a href="<?php echo U('WechatBehavior/statisticsTrend');?>">趋势对比分析</a> 
			</li>
			<?php if($detail == 1): ?><li style="float:right;background:none">
				<a href="<?php echo U('WechatBehavior/statistics');?>" style="background:none"><i class="mdi-content-reply"></i>返回</a> 
			</li><?php endif; ?>
			<div class="clearfix" style="height:1px;background:#eee;margin-bottom:20px;"></div>
		</ul>
</div>

          <div class="" style="margin-top:50px;">
         <div id="chartdiv1" align="center"></div>
         <?php if($statisticsAll == 1): ?><script type="text/javascript">
					var chart = new FusionCharts("/Public/static/fushionCharts/Charts/Pie3D.swf", "ChartId", "600", "500", "0", "1");
					//chart.setTransparent("false");
					chart.setDataXML('<?php echo ($xml); ?>');
					//chart.setDataURL("data.html");
					chart.render("chartdiv1");
					</script><?php endif; ?>
         <?php if($detail == 1): ?><script type="text/javascript">
					var chart = new FusionCharts("/Public/static/fushionCharts/Charts/Bar2D.swf", "ChartId", "600", "500", "0", "1");
					chart.setDataXML('<?php echo ($xml); ?>');
					chart.render("chartdiv1");
					</script><?php endif; ?>
					<?php if($statisticsTrend == 1): ?><script type="text/javascript">
					var chart = new FusionCharts("/Public/static/fushionCharts/Charts/MSArea.swf", "ChartId", "900", "500", "0", "1");
					chart.setDataXML('<?php echo ($xml); ?>');
					chart.render("chartdiv1");
					</script><?php endif; ?>
          </div>
<?php if (!$statisticsTrend){ ?>

           <table class="table table-condensed table-bordered table-striped" border="0" cellspacing="0" cellpadding="0" width="90%">
              <thead>
                <tr>
					<th style="width:600px;">&nbsp;模块</th>
					<th>次数</th>
					<?php if($detail != 1): ?><th>详情</th><?php endif; ?>
                </tr>
              </thead>
              <tbody>
			  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                  <td>&nbsp;<?php echo ($list["name"]); ?></td>
                  <td><?php echo ($list["count"]); ?></td>
                  <?php if($detail != 1): ?><td>
						<a href="<?php echo U('WechatBehavior/statisticsOfModule',array('module'=>$list['module']));?>">详情</a>　
						
						
				   </td><?php endif; ?>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                 <tr>

                </tr>
              </tbody>
            </table>
            	<?php
}else { ?>
	<table class="table table-condensed table-bordered table-striped" border="0" cellspacing="0" cellpadding="0" width="90%">
              <thead>
                <tr>
					<th style="width:600px;">&nbsp;模块</th>
					<th align="center" style="text-align:center">上一周期</th>
					<th align="center" style="text-align:center">本周期</th>
					<th align="center" style="text-align:center">趋势</th>
                </tr>
              </thead>
              <tbody>
			  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                  <td>&nbsp;<?php echo ($list["name"]); ?></td>
                  <td align="center"><?php echo ($list["lastcount"]); ?></td>
                   <td align="center"><?php echo ($list["count"]); ?></td>
                 
                  <td align="center">
						<?php if ($list['count']>$list['lastcount']){echo '<span style="color:#f30;font-size:14px;font-weight:bold">↑</span>';}elseif ($list['count']<$list['lastcount']){echo '<span style="color:green;font-size:14px;font-weight:bold">↓</span>';}else {echo '-';}?>
				   </td>
				   
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                 <tr>

                </tr>
              </tbody>
            </table>
	<?php
} ?>
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