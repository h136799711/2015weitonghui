<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width,height=device-height,maximum-scale=1.0,user-scalable=no"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black"><meta name="format-detection" content="telephone=no"><title>进入成功</title><style type="text/css">.countdown{font-weight: bold;text-align: center;}</style></head><body><p class="countdown">您已进入微信墙对话模式，您可以发送图片、照片、文字、语音消息了，<em id="cnt" style="color:red;"></em>秒后返回公众号。若不能自动返回，请点击左上角返回</p><script type="text/javascript">function close(){if(typeof(WeixinJSBridge)!="undefined"){WeixinJSBridge.call("closeWindow");}}function countdown(i){if(i == 0){close();}else{document.getElementById("cnt").innerHTML = i;setTimeout(function(){countdown(i-1)},1000);}}/*** 检测微信JsAPI* @param callback*/function detectWeixinApi(callback){if(typeof window.WeixinJSBridge == "undefined" || typeof window.WeixinJSBridge.invoke == "undefined"){setTimeout(function(){detectWeixinApi(callback);},200);}else{callback();}}detectWeixinApi(function(){countdown(0);});</script></body></html>