<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>微汽车</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<meta name="keywords" content="微汽车" />
<meta name="description" content="微汽车" />
<link href="/Public/Wap/car/hmj/css.css" rel="stylesheet" media="screen" type="text/css" />
</head>
<body>

<div id="head"></div>

<div id="main">
<ul>
<li class="menu-li1"><div style="margin:5px;border: 1px solid #ccc;line-height:35px;text-indent:10px;border-radius:5px;-webkit-box-shadow: 0 1px 1px #fff;">
<a href="<?php echo U('Car/index',array('token'=>$token,'wecha_id'=>$wecha_id,'sgssz'=>'mp.weixin.qq.com'));?>" style="color:#000;display:block;line-height: 75px;vertical-align:bottom;">汽车首页</a>
</div></li>
<li class="menu-li2"><div style="margin:5px;border: 1px solid #ccc;line-height:35px;text-indent:10px;border-radius:5px;-webkit-box-shadow: 0 1px 1px #fff;">
<a href="<?php echo U('Car/brands',array('token'=>$token,'wecha_id'=>$wecha_id,'sgssz'=>'mp.weixin.qq.com'));?>" style="color:#000;display:block;line-height: 75px">经销车型</a>
</div></li>
<li class="menu-li3"><div style="margin:5px;border: 1px solid #ccc;line-height:35px;text-indent:10px;border-radius:5px;-webkit-box-shadow: 0 1px 1px #fff;">
<a href="<?php echo U('Car/salers',array('token'=>$token,'wecha_id'=>$wecha_id,'sgssz'=>'mp.weixin.qq.com'));?>" style="color:#000;display:block;line-height: 75px">销售顾问</a>
</div></li>
<li class="menu-li4"><div style="margin:5px;border: 1px solid #ccc;line-height:35px;text-indent:10px;border-radius:5px;-webkit-box-shadow: 0 1px 1px #fff;">
<a href="<?php echo U('Car/owner',array('token'=>$token,'wecha_id'=>$wecha_id,'sgssz'=>'mp.weixin.qq.com'));?>" style="color:#000;display:block;line-height: 75px">车主关怀</a>
</div></li>
<li class="menu-li5"><div style="margin:5px;border: 1px solid #ccc;line-height:35px;text-indent:10px;border-radius:5px;-webkit-box-shadow: 0 1px 1px #fff;">
<a href="<?php echo U('Car/showcar',array('token'=>$token,'wecha_id'=>$wecha_id,'sgssz'=>'mp.weixin.qq.com'));?>" style="color:#000;display:block;line-height: 75px">车型欣赏</a>
</div></li>
<li class="menu-li6"><div style="margin:5px;border: 1px solid #ccc;line-height:35px;text-indent:10px;border-radius:5px;-webkit-box-shadow: 0 1px 1px #fff;">
<a href="<?php echo U('Car/tool',array('token'=>$token,'wecha_id'=>$wecha_id,'sgssz'=>'mp.weixin.qq.com'));?>" style="color:#000;display:block;line-height: 75px">实用工具</a>
</div></li>
<li class="menu-li7"><div style="margin:5px;border: 1px solid #ccc;line-height:35px;text-indent:10px;border-radius:5px;-webkit-box-shadow: 0 1px 1px #fff;">
<a href="<?php echo U('Car/CarReserveBook',array('token'=>$token,'wecha_id'=>$wecha_id,'addtype'=>'drive','sgssz'=>'mp.weixin.qq.com'));?>" style="color:#000;display:block;line-height: 75px">预约试驾</a>
</div></li>
<li class="menu-li8"><div style="margin:5px;border: 1px solid #ccc;line-height:35px;text-indent:10px;border-radius:5px;-webkit-box-shadow: 0 1px 1px #fff;">
<a href="<?php echo U('Car/CarReserveBook',array('token'=>$token,'wecha_id'=>$wecha_id,'addtype'=>'maintain','sgssz'=>'mp.weixin.qq.com'));?>" style="color:#000;display:block;line-height: 75px">预约保养</a>
</div></li>
<li class="menu-li9"><div style="margin:5px;border: 1px solid #ccc;line-height:35px;text-indent:10px;border-radius:5px;-webkit-box-shadow: 0 1px 1px #fff;">
<a href="<?php echo U('Car/aboutus',array('token'=>$token,'wecha_id'=>$wecha_id,'sgssz'=>'mp.weixin.qq.com'));?>" style="color:#000;display:block;line-height: 75px">关于我们</a>
</div></li>
<li><div style="margin:5px;border: 1px solid #ccc;line-height:35px;text-indent:10px;border-radius:5px;background: -webkit-gradient(linear, 0 0, 0 100%, from(#fff), to(#fff));-webkit-box-shadow: 0 1px 1px #fff;">
<a href="#" style="color:#000;display:block;line-height: 75px">&nbsp;</a>
</div></li>

</ul>
</div>

<p><br><br><br><br></p>
<div id="head"></div>

</body>
</html>