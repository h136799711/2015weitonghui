<?php if (!defined('THINK_PATH')) exit();?><!Doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <link href="/Public/Wap/css/style/css/hotels.css" rel="stylesheet" type="text/css">
        <title>微信支付</title>
    </head>
    <script language="javascript">
    function callpay()
    {
    WeixinJSBridge.invoke('getBrandWCPayRequest',<?php echo ($url); ?>,function(res){
    WeixinJSBridge.log(res.err_msg);
    if(res.err_msg=='get_brand_wcpay_request:ok'){
    //支付成功
        document.getElementById('payDom').style.display='none';
        document.getElementById('successDom').style.display='';
        // setTimeout("alert('<?php echo ($returnUrl); ?>')",2000);
        setTimeout("window.location.href = '<?php echo ($returnUrl); ?>'",2000);
    }else{
        document.getElementById('payDom').style.display='none';
        document.getElementById('failDom').style.display='';

        if(res.err_msg=='get_brand_wcpay_request:cancel'){
        document.getElementById('failRt').innerHTML = "您取消了支付！";
        }else{
        document.getElementById('failRt').innerHTML=res.err_code+'|'+res.err_desc+'|'+res.err_msg;
        }
    }
    });
    }
    </script>
    <body style="padding-top:20px;">
        <div>
            <?php echo ($error); ?>
        </div>
        <style>.deploy_ctype_tip{z-index:1001;width:100%;text-align:center;position:fixed;top:50%;margin-top:-23px;left:0;}.deploy_ctype_tip p{display:inline-block;padding:13px 24px;border:solid #d6d482 1px;background:#f5f4c5;font-size:16px;color:#8f772f;line-height:18px;border-radius:3px;}
        </style>
        <div id="payDom" class="cardexplain">
            <ul class="round">
                <li class="title mb"><span class="none">支付信息</span></li>
                <li class="nob">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tr>
                            <th>商品信息</th>
                            <td><?php echo ($ordername); ?></td>
                        </tr>
                        <tr>
                            <th>订单号</th>
                            <td><?php echo ($orderid); ?></td>
                        </tr>
                        <tr>
                            <th>金额</th>
                            <td><?php echo floatval($_GET['price']);?>元</td>
                        </tr>
                    </table>
                </li>
            </ul>
            <div class="footReturn" style="text-align:center">
                <input type="button" style="margin:0 auto 20px auto;width:100%"  onclick="callpay()"  class="submit" value="使用微信支付" />
                <a href="<?php echo ($returnUrl); ?>" style="margin:0 auto 20px auto;width:100%;font-size:14px;">返回</a>
            </div>
        </div>
        <div id="failDom" style="display:none" class="cardexplain">
            <ul class="round">
                <li class="title mb"><span class="none">支付结果</span></li>
                <li class="nob">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tr>
                            <th>支付失败</th>
                            <td>
                                <div id="failRt"></div>
                            </td>
                        </tr>
                    </table>
                </li>
            </ul>
            <div class="footReturn" style="text-align:center">
                <input type="button" style="margin:0 auto 20px auto;width:100%"  onclick="callpay()"  class="submit" value="重新进行支付" />
                <a href="<?php echo ($returnUrl); ?>" style="margin:0 auto 20px auto;width:100%;font-size:14px;">返回</a>
            </div>
        </div>
        <div id="successDom" style="display:none" class="cardexplain">
            <ul class="round">
                <li class="title mb"><span class="none">支付成功</span></li>
                <li class="nob">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tr>
                            <th>您已支付成功，页面正在跳转...</th>
                        </tr>
                    </table>
                    <div id="failRt">

                    </div>
                </li>
            </ul>
        </div>
        <script type="text/javascript">
        window.shareData = {
                    "moduleName":"Wxpay",
                    "moduleID":"0",
                    "imgUrl": "",
                    "sendFriendLink": "<?php echo ($cfg_siteUrl); echo U('Index/index',array('token'=>$token));?>",
                    "tTitle": "",
                    "tContent": ""
        };
        </script>
        <?php echo ($shareScript); ?>
    </body>
</html>