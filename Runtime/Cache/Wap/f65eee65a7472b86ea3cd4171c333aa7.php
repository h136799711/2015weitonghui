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
	<a href="<?php echo U('Hotels/order',array('token' => $_GET['token'], 'wecha_id' => $wecha_id));?>" class="ico-hd arr-hd"></a>
	<h1>我的订单</h1>
	<a href="<?php echo U('Hotels/index',array('token' => $_GET['token'], 'wecha_id' => $wecha_id));?>" class="ico-hd ico-order">首页</a>
</header>
<div class="contxt cont-artical">
	<div class="box-cont box-list-order page-cont">
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><div class="list-li" onclick="javascript:showOrder('<?php echo ($order['id']); ?>')">
	<div class="hd box-txt">
		<b>在线预订客房<?php echo ($company['name']); ?></b>
		<p><span>入住日期</span><b><?php echo ($order['startdate']); ?></b></p>
		<p><span>离店日期</span><b><?php echo ($order['enddate']); ?></b></p>
		<p><span>状态</span><?php if($order['status'] == 1): ?><b>完成入住</b><?php else: ?><b>未完成</b><?php endif; ?></p>
	</div>
	<div class="bd">
		<span class="arrow arr-small"><em>￥<?php echo ($order['price']); ?></em><br><i><?php echo ($order['day']); ?>晚</i></span>
	</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<?php if($totalpage > 1): ?><div class="tcenter"><a href="javascript:void(0);" class="loading" data-remote="true" id="more_loading" rel="next">点击查看更多...</a></div><?php endif; ?>
<div class="tcenter"><div class="isloading loading" style="display: none">加载中...</div></div>
</div>

<script>
var page = 2;
$(document).ready(function(){
	$("#more_loading").click(function(){
		$(".isloading").css("display",'');
		$("#more_loading").css("display","none");
		$.get("<?php echo U('Hotels/ajaxorder',array('token' => $_GET['token'], 'wecha_id' => $wecha_id));?>&page=" + page, function(response) {
			if (response.page == 0) {
				$("#more_loading").hide();
			} else {
				page = response.page;
				$("#more_loading").css("display","block");
			}
			var html = '';
			$.each(response.data, function(i, v){
			    html += '<div class="list-li" onclick="javascript:showOrder(' + v.id + ')">';
			    html += '<div class="hd box-txt">';
			    html += '<b>在线预订客房' + v.hotelname + '</b>';
			    html += '<p><span>入住日期</span><b>' + v.startdate + '</b></p>';
			    html += '<p><span>离店日期</span><b>' + v.enddate + '</b></p>';
			    html += '<p><span>状态</span><b>未完成</b></p>';
			    html += '</div>';
			    html += '<div class="bd">';
			    html += '<span class="arrow arr-small"><em>￥' + v.price + '</em><br><i>' + v.day + '晚</i></span></div></div>';
			});
			$(".box-cont").append(html);
			$(".isloading").css("display",'none');
		}, 'json');
	});
});


$( document ).ajaxStart(function() {
	$(".isloading").css("display",'');
	$("#more_loading").css("display","none");
});

$( document ).ajaxStop(function() {
	$(".isloading").css("display",'none');
	$("#more_loading").css("display","block");
});

function showOrder(order_id){
	window.location.href = "<?php echo U('Hotels/detail',array('token' => $token, 'wecha_id' => $wecha_id));?>&oid=" + order_id;
}
</script>

		</div>
	</div>
</body>

<script type="text/javascript">
window.shareData = {  
            "moduleName":"Hotels",
            "moduleID":"<?php echo ($company[0]['id']); ?>",
            "imgUrl": "<?php echo ($company[0]['logourl']); ?>", 
            "timeLineLink": "<?php echo C('site_url') . U('Hotels/my',array('token' => $_GET['token']));?>",
            "sendFriendLink": "<?php echo C('site_url') . U('Hotels/my',array('token' => $_GET['token']));?>",
            "weiboLink": "<?php echo C('site_url') . U('Hotels/my',array('token' => $_GET['token']));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>