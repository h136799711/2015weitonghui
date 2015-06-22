<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /><meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta name="format-detection" content="telephone=no"/>
<title><?php echo ($metaTitle); ?></title>
<script src="/Public/static/hotels/js/piwik.js"></script>
<script src="/Public/static/hotels/js/zepto.min.js"></script>
<script src="/Public/static/hotels/js/underscore-min.js"></script>
<script src="/Public/static/hotels/js/backbone-min.js"></script>
<script src="/Public/static/hotels/js/jquery.hammer.min.js"></script>
<script src="/Public/static/hotels/js/common.js"></script>
<script src="/Public/static/hotels/js/hotel.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/static/hotels/css/common.css" media="all" />
</head>
<body>
	<div class="html">
		<div class="main">
<header>
  <a href="<?php echo U('Hotels/selectdate',array('token' => $_GET['token'], 'wecha_id' => $wecha_id));?>" class="ico-hd arr-hd"></a>
  <h1><?php echo ($company['name']); ?></h1>
  <a href="<?php echo U('Hotels/my',array('token' => $_GET['token'], 'wecha_id' => $wecha_id));?>" class="ico-hd ico-order">我的订单</a>
</header>
<div class="contxt cont-artical">
  <div class="box-cont box-hotel">
      <div class="hotel-th">
      <span>
      <a href="">
      <img src="<?php echo ($company['logourl']); ?>">
      </a>
      </span>
      </div>
    <div class="hotel-td">
      <p><span class="ico ico-comment" ><?php echo ($company['name']); ?></span><i class="arrow arr-small"></i></p>
      <p><span class="ico ico-phone" onclick="javascript:window.location.href='tel:<?php echo ($company['tel']); ?>';"><?php echo ($company['tel']); ?></span><i class="arrow arr-small"></i></p>
    </div>
  </div>
  <div class="box-cont box-list">
		<a href="<?php echo U('Card/companyMap', array('token'=>$token, 'wecha_id'=>$wecha_id, 'companyid'=>$company['id']));?>">
			<span class="ico ico-location"><?php echo ($company['address']); ?></span>
			<span class="arrow arr-small"></span>
		</a>
		<a href="<?php echo U('Card/companyMap', array('token'=>$token, 'wecha_id'=>$wecha_id, 'companyid'=>$company['id']));?>">
			<span class="ico ico-nav">一键导航</span>
			<span class="arrow arr-small"></span>
		</a>
  </div>
  <div class="box-cont box-txt box-hotel-txt">
    <p><span>入住</span><b> <?php echo ($sday); ?></b></p>
    <p><span>离店</span><b> <?php echo ($eday); ?> （<?php echo ($days); ?> 晚）</b></p>
  </div>
  <div class="box-cont box-list-room">
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sort): $mod = ($i % 2 );++$i;?><div class="list-li">
	  <div class="table">
	    <div class="hd box-txt td">
	      <a class="box-block list-a"><span class="visuallyhidden">链接</span></a>
	      <p><span>普通价格</span><em>￥<?php echo ($sort['price']); ?></em></p>
	      <p><span>会员价格</span><em>￥<?php echo ($sort['vprice']); ?></em></p>
	    </div>
	    <div class="bd td">
	      <span><?php echo ($sort['name']); ?></span>
	    </div>
	    <div class="bd2 td">
	    	<?php if($sort['houses'] > $sort['useHouse']): ?><a class="btn btn-small" href="<?php echo U('Hotels/order',array('wecha_id' => $wecha_id, 'token' => $token, 'sid' => $sort['id'], 'startdate' => $startdate, 'enddate' => $enddate));?>">预订</a>
	    	<?php else: ?>
	    	<a class="btn btn-error btn-small">已满</a><?php endif; ?>
	        
	    </div>
	  </div>
	  <div class="ft">
	    <div class="fl">
	      <img src="<?php echo ($sort['image']); ?>">
	    </div>
	    <div class="fr">
	      <p><?php echo ($sort['note']); ?></p>
	    </div>
	  </div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <div class="tcenter"></div>
  <div class="tcenter"><div class="isloading loading" style="display: none">加载中...</div></div>
</div>
	</div>
</div>
</body>

<script type="text/javascript">
window.shareData = {  
            "moduleName":"Hotels",
            "moduleID":"<?php echo ($company[0]['id']); ?>",
            "imgUrl": "<?php echo ($company[0]['logourl']); ?>", 
            "timeLineLink": "<?php echo C('site_url') . U('Hotels/hotel',array('token' => $_GET['token']));?>",
            "sendFriendLink": "<?php echo C('site_url') . U('Hotels/hotel',array('token' => $_GET['token']));?>",
            "weiboLink": "<?php echo C('site_url') . U('Hotels/hotel',array('token' => $_GET['token']));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>