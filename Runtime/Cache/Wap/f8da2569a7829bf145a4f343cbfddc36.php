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
				<a class="ico-hd arr-hd" href="javascript:history.go(-1);"></a>
				<h1>填写订单</h1>
				<a href="<?php echo U('Hotels/my',array('token' => $_GET['token'], 'wecha_id' => $wecha_id));?>" class="ico-hd ico-order">我的订单</a>
			</header>
<div class="contxt cont-artical">
	<form action="<?php echo U('Hotels/saveorder');?>" class="new_hotel_order" data-validate="true" id="new_hotel_order" method="post" novalidate="novalidate">
	<div style="margin:0;padding:0;display:inline">
	<input name="token" type="hidden" value="<?php echo ($token); ?>"></div>
	<input name="wecha_id" type="hidden" value="<?php echo ($wecha_id); ?>">
	<input name="sid" type="hidden" value="<?php echo ($sort['id']); ?>">
	<input name="cid" type="hidden" value="<?php echo ($cid); ?>">
	<input name="startdate" type="hidden" value="<?php echo ($startdate); ?>">
	<input name="enddate" type="hidden" value="<?php echo ($enddate); ?>">
	<div class="box-cont box-order-info">
		<div class="hd box-txt">
			<b>在线预订客房 <?php echo ($commpany['name']); ?></b>
			<p><span>入住日期</span><b><?php echo ($sday); ?></b></p>
			<p><span>离店日期</span><b><?php echo ($eday); ?> </b><i> <?php echo ($days); ?> 晚</i></p>
		</div>
		<div class="bd">
			<p class="table"><span class="td">总价<em id="total_price">￥<?php echo ($total); ?></em></span></p>
		</div>
	</div>
	<div class="box-cont box-form box-form-order">
		<div class="hd">
			<b><?php echo ($sort['name']); ?></b>
			<p class="box-op">				
				<a class="op-minus" id="input-minus" data-min="1">-</a>
				<input class="input-number" data-max="10" data-min="1" id="input-number" name="nums" size="30" type="text" value="1">
				<a class="op-add" id="input-add" data-max="10">+</a>
			</p>
		</div>
		<p><label>入住人姓名：</label><input id="hotel_order_name" name="name" placeholder="请输入您的姓名" size="30" type="text" value="<?php echo ($fans["truename"]); ?>"></p>
		<p><label>联系人手机：</label><input id="hotel_order_mobile" name="tel" placeholder="请输入您的电话号码" size="30" type="text" value="<?php echo ($fans["tel"]); ?>"></p>
	</div>
	<div class="box-cont box-txt">
		<p><span>支付方式：</span><b>门店支付</b></p>
		<p><span>房间预留至：</span><b>18:00</b></p>
		<p class="hide"><span>请在此时间之前取消订单：</span><b>19:00</b></p>
	</div>
	<div class="tcenter"><a class="btn btn-big submit form-submit" onclick="javascript:bookRoom();">提交订单</a></div>
</form>
<script type="text/javascript">
var price = "<?php echo ($sort['price']); ?>";
var days = '<?php echo ($days); ?>';
function bookRoom(){
    $hotel_order_name = $('#hotel_order_name');
    $hotel_order_mobile = $('#hotel_order_mobile');
    if(!$hotel_order_name || $hotel_order_name.val()==""){
      alert('姓名不能为空');
      $hotel_order_name.focus();
    }else if(!test_mobile_number($hotel_order_mobile.val()) || $hotel_order_mobile.val()==""){
      alert('手机号码格式不正确');
      $hotel_order_mobile.focus();
    }else{
      $("form").submit();
    }
}

  // 手机号码正则表达式
function test_mobile_number(mobile_number) {
    if (mobile_number == undefined) {
      return false;
    }
    var mobile_reg = /^\d{11}$/;
    if (mobile_reg.test(mobile_number)){
      return true;
    };
    return false;
}

function sum_price(qty){
    var total_price = qty * price * days;
    $('#total_price').text('￥ '+total_price);
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
            "timeLineLink": "<?php echo C('site_url') . U('Hotels/order',array('token' => $_GET['token']));?>",
            "sendFriendLink": "<?php echo C('site_url') . U('Hotels/order',array('token' => $_GET['token']));?>",
            "weiboLink": "<?php echo C('site_url') . U('Hotels/order',array('token' => $_GET['token']));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>