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
<script src="/Public/User/js/date/WdatePicker.js"></script>
 <form class="form" method="post"   action=""  target="_top" enctype="multipart/form-data" >
        <div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
<!--活动开始-->
<div class="righttitle">
    <h4>编辑<?php echo ($lotteryTypeName); ?>活动开始内容</h4><a href="javascript:history.go(-1);"  class="btn btn-primary" data-top ><i class="mdi-content-reply"></i>返回</a>
</div> 
<div class=" bgfc"> 
<table class="table" ><tbody>
<tr>
  <th valign="top"><span class="red">*</span>关键词：</th>
  <td>
	<input type="hidden" class="form-control" value="4" name="type" style="width:400px" >
	<input type="input" class="form-control" id="keyword" value="<?php if($vo['keyword'] == ''): echo ($lotteryTypeName); else: echo ($vo["keyword"]); endif; ?>" name="keyword" style="width:400px" ><br />
  	<span class="red">只能写一个关键词</span>，用户输入此关键词将会触发此活动。
  </td>
  <td rowspan="7" valign="top">
	  <div style="margin-left:20px">
		<img id="pic1_src" src="<?php if($vo['starpicurl'] == ''): echo ($cfg_siteUrl); ?>/Public/static/luckyFruit/user/start.jpg<?php else: echo ($vo["starpicurl"]); endif; ?>" width="373px" >	
		<br />
		<input class="form-control"  name="starpicurl" value="<?php if($vo['starpicurl'] == ''): echo ($cfg_siteUrl); ?>/Public/static/luckyFruit/user/start.jpg<?php else: echo ($vo["starpicurl"]); endif; ?>" id="pic1" style="width:363px;"  />
		<br />
		  <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('pic1',700,420,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('pic1')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>&nbsp;活动开始图片
	  </div>
  </td>
</tr>
<tr>
  <th valign="top"><span class="red">*</span>活动名称：</th>
  <td>
	<input type="input" class="form-control" id="title" value="<?php if($vo['title'] == ''): echo ($lotteryTypeName); ?>活动开始了<?php else: echo ($vo["title"]); endif; ?>" name="title" style="width:400px" />
  	<br />
  	请不要多于50字!
  </td>
  <tr>
  	<th valign="top"><span class="red">*</span>兑奖信息：</th>
  	<td>
		<input type="input" class="form-control" id="txt" value="<?php if($vo['txt'] == ''): ?>兑奖请联系我们，电话138********<?php else: echo ($vo["txt"]); endif; ?>" name="txt" style="width:400px" />
  		<br />请不要多于100字! 这个设定但用户输入兑奖时候的显示信息!
	</td>
  </tr>
 <tr>
  	<th valign="top"><span class="red">*</span>中奖提示：</th>
  	<td><textarea class="form-control" id="sttxt"  name="sttxt" style="width:400px"  ><?php echo ($vo["sttxt"]); ?></textarea> 中奖后,提示信息
  		 </td>
</tr>
<tr>
	<th><span class="red">*</span>活动时间：</th>
	<td><input type="input" class="form-control" id="statdate" value="<?php if($vo['statdate'] != ''): echo (date("Y-m-d",$vo["statdate"])); endif; ?>" onClick="WdatePicker()" name="statdate" />                
		到
		<input type="input" class="form-control" id="enddate" value="<?php if($vo['enddate'] != ''): echo (date("Y-m-d",$vo["enddate"])); endif; ?>" name="enddate"  onClick="WdatePicker()"  /> 
	</td>
</tr>
<tr>
<th valign="top">活动说明：</th>
<td><textarea  class="form-control" id="info" name="info"  style="width:400px; height:125px" ><?php if($vo['info'] == ''): ?>亲，请点击进入<?php echo ($lotteryTypeName); ?>活动页面，祝您好运哦！<?php else: echo ($vo["info"]); endif; ?></textarea><br />换行请输入
 &lt;br&gt;
 </td>
</tr>
<tr>
<th><span class="red">*</span>重复抽奖回复：</th>
<td><input type="input" class="form-control" id="aginfo" value="<?php if($vo['aginfo'] == ''): ?>亲，继续努力哦！<?php else: echo ($vo["aginfo"]); endif; ?>" name="aginfo" style="width:400px" />备注：
如果设置只允许抽一次奖的，请写：你已经玩过了，下次再来。

如果设置可多次抽奖，请写：亲，继续努力哦！</td>
</tr>
</tbody>
</table>
  </div> 
  
<!--活动结束-->
<div class="righttitle">
          	<h4>活动结束内容</h4></div> 
<div class=" bgfc">
 
  	<table style=" margin: 0;" border="0" cellspacing="0" cellpadding="0" width="100%">
  		<tbody>
  			<tr>
  				<th valign="top"><span class="red">*</span>活动结束公告主题：</th>
  				<td><input type="input" class="form-control" id="endtite" value="<?php if($vo['endtite'] == ''): echo ($lotteryTypeName); ?>活动已经结束了<?php else: echo ($vo["endtite"]); endif; ?>" name="endtite" style="width:400px" />
  					<br />
  					请不要多于50字! </td>
  				<td rowspan="4" valign="top"><div style="margin-left:20px"><img  id="pic2_src" src="<?php if($vo['endpicurl'] == ''): echo ($cfg_siteUrl); ?>/Public/static/luckyFruit/user/end.jpg<?php else: echo ($vo["endpicurl"]); endif; ?>"  width="373px"/> <br />
  					<input class="form-control" id="pic2"  name="endpicurl" value="<?php if($vo['endpicurl'] == ''): echo ($cfg_siteUrl); ?>/Public/static/luckyFruit/user/end.jpg<?php else: echo ($vo["endpicurl"]); endif; ?>"  style="width:363px;"  />
  					<br />
  					  <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('pic2',700,420,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('pic2')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>&nbsp; 活动结束图片网址 </div></td>
  				</tr>
  			<tr>
  				<th valign="top">活动结束说明：</th>
  				<td valign="top"><textarea  class="form-control" id="endinfo" name="endinfo"  style="width:400px; height:125px" ><?php if($vo['endinfo'] == ''): ?>亲，活动已经结束，请继续关注我们的后续活动哦。<?php else: echo ($vo["endinfo"]); endif; ?></textarea><br />换行请输入
 &lt;br&gt;
  				  </td>
  				</tr>
  			</tbody>
  		</table>
  </div> 
  
  
<!--奖项设置-->
<div class="righttitle">
          	<h4>奖项设置</h4></div> 
<div class=" bgfc">

<table style=" margin: 0;" border="0" cellSpacing="0" cellPadding="0" width="100%">
<tbody>
<tr>
<th valign="top"><span class="red">*</span>一等奖奖品设置：</th>
<td><input type="input" class="form-control" id="fist"  name="fist" value="<?php echo ($vo["fist"]); ?>"  style="width:250px"/>
请不要多于50字! </td>
  <td rowspan="9" valign="top">&nbsp;</td>
</tr>
<tr>
<th valign="top"><span class="red">*</span>一等奖奖品数量：</th>
<td><input type="input" class="form-control" id="fistnums" name="fistnums"      value="<?php echo ($vo["fistnums"]); ?>" style="width:60px" />
  <span class="red">如果是100%中奖,请把一等奖的奖品数量[ 1000就代表前1000人都中奖 ]填写多点</span></td>
</tr>
<tr>
<th valign="top">二等奖奖品设置：</th>
<td><input type="input" class="form-control" id="second" name="second"     value="<?php echo ($vo["second"]); ?>"  style="width:250px"/>
请不要多于50字! </td>
</tr>
<tr>
<th valign="top">二等奖奖品数量：</th>
<td><input type="input" class="form-control" id="secondnums" name="secondnums"   value="<?php echo ($vo["secondnums"]); ?>" style="width:60px" />
</td>
</tr>
<tr>
<th valign="top">三等奖奖品设置：</th>
<td><input type="input" class="form-control" id="third" name="third"   value="<?php echo ($vo["third"]); ?>" style="width:250px" />
请不要多于50字! </td>
</tr>
<tr>
<th valign="top">三等奖奖品数量：</th>
<td><input type="input" class="form-control" id="thirdnums" name="thirdnums"     value="<?php echo ($vo["thirdnums"]); ?>" style="width:60px" />
</td>
</tr>
<tr>
<th valign="top">四等奖奖品设置：</th>
<td><input type="input" class="form-control" id="four"  name="four" value="<?php echo ($vo["four"]); ?>"  style="width:250px"/>
请不要多于50字! </td>
  <td rowspan="9" valign="top">&nbsp;</td>
</tr>
<tr>
<th valign="top">四等奖奖品数量：</th>
<td><input type="input" class="form-control" id="fournums" name="fournums"      value="<?php echo ($vo["fournums"]); ?>" style="width:60px" />
 </td>
</tr>
<tr>
<th valign="top">五等奖奖品设置：</th>
<td><input type="input" class="form-control" id="five"  name="five" value="<?php echo ($vo["five"]); ?>"  style="width:250px"/>
请不要多于50字! </td>
  <td rowspan="9" valign="top">&nbsp;</td>
</tr>
<tr>
<th valign="top">五等奖奖品数量：</th>
<td><input type="input" class="form-control" id="fivenums" name="fivenums"      value="<?php echo ($vo["fivenums"]); ?>" style="width:60px" />
 </td>
</tr>
<tr>
<th valign="top">六等奖奖品设置：</th>
<td><input type="input" class="form-control" id="six"  name="six" value="<?php echo ($vo["six"]); ?>"  style="width:250px"/>
请不要多于50字! </td>
  <td rowspan="9" valign="top">&nbsp;</td>
</tr>
<tr>
<th valign="top">六等奖奖品数量：</th>
<td><input type="input" class="form-control" id="sixnums" name="sixnums"      value="<?php echo ($vo["sixnums"]); ?>" style="width:60px" />
 </td>
</tr>
  
  </tbody>
 <tbody>
<tr>
<th valign="top"><span class="red">*</span>预计活动的人数：</th>
<td><input type="input" class="form-control" id="allpeople" name="allpeople"   value="<?php echo ($vo["allpeople"]); ?>" style="width:150px"/>  预估活动人数直接影响抽奖概率：中奖概率 = 奖品总数/(预估活动人数*每人抽奖次数) 如果要确保任何时候都100%中奖建议设置为1人参加!<span class='red'>如果要确保任何时候都100%中奖建议设置为1人参加!并且奖项只设置一等奖.</span></td>
  </tr>
                                <tr>
<th valign="top"><span class="red">*</span>每人最多允许抽奖次数：</th>
<td><input type="input" class="form-control" id="canrqnums" name="canrqnums"   value="<?php echo ($vo["canrqnums"]); ?>" style="width:150px"/>
必须1-5之间的数字</td>
 </tr>
 <tr>
<th valign="top"><span class="red"></span>每天最多抽奖次数：</th>
<td><input class="form-control" id="daynums" name="daynums" style="width:150px" value="<?php echo ($vo["daynums"]); ?>" type="input">
必须小于总抽奖次数！ 0 为不限制 抽完总数就不能抽了! 可以抽奖天数 = 总数/每天抽奖次数!</td>
</tr>                                 
<tr style="display:none">
<th valign="top">SN码生成设置：</th>
<td>
    <input class="radio" type="radio" checked name="snimport" value="0">自动生成  
    <input class="radio" type="radio" name="snimport" value="1">手动生成(SN码管理)
</td> 
</tr>
<tr>
<th valign="top"><span class="red">*</span>兑奖密码：</th>
<td><input class="form-control" id="parssword" name="parssword" value="<?php echo ($vo["parssword"]); ?>" style="width:150px" type="input">
消费确认密码长度小于15位</td>
                                        </tr>
                                                                       <tr>
<th valign="top">SN码重命名为：</th>
<td><input class="form-control" id="renamesn" name="renamesn" value="<?php if($vo.renamesn): echo ($vo["renamesn"]); else: ?>SN码<?php endif; ?>" style="width:150px" type="input"> 例如：CND码,充值密码,SN码 这个主意用于修改SN码的名称，不懂请别修改</td>
                                        </tr>
                                         <tr>
<th valign="top">手机号重命名：</th>
<td><input class="form-control" id="renametel" name="renametel" value="<?php if($vo.renametel): echo ($vo["renametel"]); else: ?>手机号<?php endif; ?>" style="width:150px" type="input"> 例如：QQ号,微信号,手机号等其他联系方式，不懂请别修改</td> 
                                        </tr>
<tr>
	<th valign="top">抽奖页面是否显示奖品数量：</th>
	<td><input class="radio" type="radio" name="displayjpnums" value="1"  <?php if($vo['displayjpnums'] == 1): ?>checked<?php endif; ?> >显示  <input class="radio" type="radio" name="displayjpnums" value="0"  <?php if($vo['displayjpnums'] == 0): ?>checked<?php endif; ?>>不显</td> 
</tr> 
<tr>
	<th valign="top">注册后才能参与：</th>
	<td><input class="radio" type="radio" name="needreg" value="1"  <?php if($vo['needreg'] == 1): ?>checked<?php endif; ?> > 需要先注册  <input class="radio" type="radio" name="needreg" value="0"  <?php if($vo['needreg'] == 0): ?>checked<?php endif; ?>> 不需要先注册</td> 
</tr> 
<tr>
<th>&nbsp;</th>
<td><button type="submit" class="btn btn-primary" ><i class="mdi-content-save"></i>保存</button>　<a href=""  class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a>　<span class="red"></span></td>
</tbody>
</table>
    



  </div> 


        </div>
</form>
      
        <div class="clearfix"></div>
      </div>
    </div>
  </div> 

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