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
 <script src="<?php echo RES;?>/flash/FusionCharts.js" type="text/javascript"></script>
 <script src="<?php echo RES;?>/flash/MSLine.swf" language="javascript" type="text/javascript"></script>      

<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
        	<h4 class="righttitle">选择年份<select class="form-control"  class="setting-period" name="year" id="year" onchange="doit($('#period').val())"><?php echo ($yearOption); ?></select> 选择月份&nbsp;&nbsp;<select class="form-control"  class="setting-period" name="period" id="period" onchange="doit(this.value)">
                
            <option value="1" <?php if($month == 1): ?>selected<?php endif; ?>>1月</option>
            <option value="2" <?php if($month == 2): ?>selected<?php endif; ?>>2月</option>
            <option value="3" <?php if($month == 3): ?>selected<?php endif; ?>>3月</option>
            <option value="4" <?php if($month == 4): ?>selected<?php endif; ?>>4月</option>
            <option value="5" <?php if($month == 5): ?>selected<?php endif; ?>>5月</option>
            <option value="6" <?php if($month == 6): ?>selected<?php endif; ?>>6月</option>
            <option value="7" <?php if($month == 7): ?>selected<?php endif; ?>>7月</option>
            <option value="8" <?php if($month == 8): ?>selected<?php endif; ?>>8月</option>
            <option value="9" <?php if($month == 9): ?>selected<?php endif; ?>>9月</option>
            <option value="10" <?php if($month == 10): ?>selected<?php endif; ?>>10月</option>
            <option value="11" <?php if($month == 11): ?>selected<?php endif; ?>>11月</option>
            <option value="12" <?php if($month == 12): ?>selected<?php endif; ?>>12月</option>
            </select></h4>
<script>
function doit(month){
	location.href= '<?php echo U('User/Requerydata/index',array('token'=>getToken()));?>'+'&month='+month+'&year='+$('#year').val();
}
</script>
<div class="">
       <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin:20px 0; ">
 		<tbody>
 			<tr>
 				<td align="center" bgcolor="#f9f9f9">
					<div id="chartdiv1" align="center">
					</div>
					<script type="text/javascript">
						var chart = new FusionCharts("<?php echo RES;?>/flash/MSLine.swf", "ChartId", "996", "400", "0", "1");
						//chart.setTransparent("false");
						chart.setDataXML('<?php echo ($xml); ?>');
						//chart.setDataURL("data.html");
						chart.render("chartdiv1");
					</script>
 				</td>
			</tr>
                <tr>
 				<td align="center" bgcolor="#f9f9f9">
                  <div id="chartdiv2" align="center"></div>


 				</td>
				</tr>
 			</tbody>
 		</table>
            
          </div>
          <div class="">
            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-condensed table-bordered table-striped">
 		<thead>
 			<tr>
				<th>日期</th>
 				<th style="display:none">3G网站浏览量</th>
                <th>文本请求数</th>
 				<th>图文请求数</th>
				<th>语音请求数</th>
				<th>营销/电商请求</th>
				
				<th>关注人数</th>				
				<th>取消关注人数</th> 
				<th>总请求数/日</th>
 				</tr>
 			</thead>
 		<tbody>
           </tbody>
		   <tfoot>
             <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo (date('Y-m-d',$list["time"])); ?></td>
					<td style="display:none"><?php echo ($list["3g"]); ?></td>
					<td><?php echo ($list["textnum"]); ?></td>
					<td><?php echo ($list["imgnum"]); ?></td>
					<td><?php echo ($list["videonum"]); ?></td>
					<td><?php echo ($list["other"]); ?></td>					
					<td><?php echo ($list["follownum"]); ?></td>
					<td><?php echo ($list["unfollownum"]); ?></td>											 
					<td><?php echo $list['3g']+$list['textnum']+$list['imgnum']+$list['videonum']+$list['other']?></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tfoot> 			
 		</table>            
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