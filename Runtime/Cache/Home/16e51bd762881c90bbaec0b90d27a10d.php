<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>跳转提示</title>
        <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <style type="text/css">
        *{ padding: 0; margin: 0; }
        body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
        .system-message{ padding: 0 0 20px;margin: 10px auto;max-width: 400px;background-color:#f8f8f8;}
        .system-message h3{ font-size: 50px; font-weight: normal; line-height: 120px; margin-bottom: 12px;border:1px solid #ccc}
        .system-message .jump{ padding-top: 10px}
        .system-message .jump a{ color: #333;}
        .system-message .success,.system-message .error{padding: 24px; line-height: 1.8em; font-size: 23px ;text-align: center;}
        .system-message .error{color: #F93434;}
        .system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
        .btn
        {	border: none;
        background: #08c;
        color: #ffffff;
        padding: 9px 12px 10px;
        line-height: 22px;
        text-decoration: none;
        text-shadow: none;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: none;
        box-shadow: none;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        cursor: pointer;
        }
        .btn:hover, .btn:focus{
        background-image:none;
        background-color: #09c;
        color: #ffffff;
        outline: none;
        -webkit-transition: 0.25s
        transition: 0.25s;
        -webkit-backface-visibility: hidden;
        }
        </style>
    </head>
    <body>
        <div class="system-message">
            <p style="padding-left:10px;line-height:35px;color:white;background:#08c;">系统提醒</p>
            <div style="padding:24px;">
<?php if(isset($message)): ?><div class="success"><span><?php echo($message); ?></span></div>
<?php else: ?>
                <div class="error"><span style="padding-top:0px;"><?php echo($error); ?></span></div><?php endif; ?>

            </div>
            <p class="detail"></p>
            <div class="jump" style="padding-right:5px;text-align:center;">
                <a id="href" class="btn"  href="<?php echo($jumpUrl); ?>" style="color:#fff;">跳转（ <b id="wait"><?php echo($waitSecond); ?></b> ）</a>
                <a id="cancel" class="btn"  href="#" style="color:#A8EB8F;" onclick="cancel();">取消</a>
            </div>
        </div>
        <script type="text/javascript">
        var timer = {};
        //取消跳转
        function cancel(){
        if(!isNaN(timer.interval)){
        clearInterval(timer.interval );
        }
        }
        function start(){
        var wait = document.getElementById('wait'),href = document.getElementById('href').href;
        timer.interval = setInterval(function(){
        var time = --wait.innerHTML;
        if(time == 0) {
        location.href = href;
        cancel();
        };

        }, 1000);
        }
        (function(){
        start();
        })();
        </script>
    </body>
</html>