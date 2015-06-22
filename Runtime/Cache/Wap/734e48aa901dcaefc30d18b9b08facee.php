<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>会员卡</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link href="/Public/Wap/card/style/style.css" rel="stylesheet" type="text/css">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
</head>

<body id="cardunion" class="mode_webapp2" >
<div class="cardexplain"> 

<ul class="round">
<li><?php if($cardsCount == 0): ?><a href="###"><span>您还没有领取任何会员卡</span></a><?php else: ?><a href="<?php echo U('Wap/Card/index',array('wecha_id'=>$wecha_id,'token'=>$token,'mycard'=>1));?>"><span>我的会员卡<em class="ok"><?php echo ($cardsCount); ?></em></span></a><?php endif; ?></li>
</ul>

<ul class="round">
<?php if($allCardsCount != 0): if(is_array($allCards)): $i = 0; $__LIST__ = $allCards;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><li class="dandanb"><a href="<?php echo U('Wap/Card/card',array('$wecha_id'=>$wecha_id,'token'=>$token,'cardid'=>$c['id']));?>"><span class="none"><img src="<?php echo ($c["logo"]); ?>"><h2><?php echo htmlspecialchars_decode($c['cardname']);?></h2>
<p><?php echo ($c["msg"]); ?></p> <?php if($c['applied']){ ?><em class="error">用卡</em><?php }else{ ?><em class="ok">领卡</em><?php } ?></span></a>
</li>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
<?php else: ?>
<li class="dandanb"><a href="###"><span>商家暂时未设置会员卡</span></a>
</li><?php endif; ?>
</ul>


<ul class="round">
<li class="tel"><a href="tel:<?php echo ($thisCompany["tel"]); ?>"><span><?php if($thisCompany["tel"] != ''): echo ($thisCompany["tel"]); else: ?>商家未设置电话<?php endif; ?></span></a></li>

<li class="address"><a href="<?php echo U('Wap/Card/companyMap',array('wecha_id'=>$wecha_id,'token'=>$token,'companyid'=>$thisCompany['id']));?>"><span><?php if($thisCompany["address"] != ''): echo ($thisCompany["address"]); else: ?>商家未设置地址<?php endif; ?></span></a></li>
<li class="detail"><a href="<?php echo U('Wap/Card/companyDetail',array('wecha_id'=>$wecha_id,'token'=>$token,'companyid'=>$thisCompany['id']));?>"><span>查看详情</span></a></li>
</ul>
</div>

<div class="footermenu">
    <ul>
    <li>
            <a href="javascript:history.go(-1);">
            <img src="/Public/Wap/card/images/return.png">
            <p>返回</p>
            </a>
        </li>
    <li>

            <a <?php if($infoType=='memberCardHome'){ ?>class="active"<?php } ?> href="<?php echo U('Wap/Card/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>">
            <img src="/Public/Wap/card/images/home.png">
            <p>会员卡首页</p>
            </a>
        </li>
        <li>
            
            <a <?php if($infoType=='companyDetail'){ ?>class="active"<?php } ?> href="<?php echo U('Wap/Card/companyDetail',array('token'=>$token,'wecha_id'=>$wecha_id,'companyid'=>$thisCompany['id']));?>">
            <img src="/Public/Wap/card/images/detaila.png">
            <p>商家详情</p>
            </a>
        </li>
        <li>
            <a <?php if($infoType=='myCard'){ ?>class="active"<?php } ?> href="<?php echo U('Wap/Card/index',array('token'=>$token,'wecha_id'=>$wecha_id,'mycard'=>1));?>">
            <span class="num2" ><?php echo ($cardsCount); ?></span><img src="/Public/Wap/card/images/my.png">
            <p>我的会员卡</p>
            </a>
        </li>
    </ul>
</div>

<script type="text/javascript">
window.shareData = {  
            "moduleName":"Card",
            "moduleID":"12",
            "imgUrl": "", 
            "sendFriendLink": "<?php echo ($cfg_siteUrl); echo U('Card/index',array('token'=>$token));?>",
            "tTitle": "会员卡",
            "tContent": ""
};
</script>
<?php echo ($shareScript); ?>
</body>
</html>