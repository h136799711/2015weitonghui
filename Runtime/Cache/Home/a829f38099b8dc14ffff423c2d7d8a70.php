<?php if (!defined('THINK_PATH')) exit();?><!Doctype html>
<html>
<title>绑定公众号-古睿微通汇</title><meta name="viewport" content="width=device-width,target-densitydpi=high-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<style style="text/css">
  body{
    text-align: center;

  }
  .content{
    width: 700px;
    text-align: left;
    margin: 0 auto;
  }
  .header2{
    width: 600px;
    margin: 30px 0 30px 0;
  }
</style>
<body>
<div class ="content">
    <div class="header2">
    <font color="red">
    这是配置的URL:<?php echo ($site_url); ?>/index.php/Home/api/<?php echo ($token); ?><br/>
    Token:<?php echo md5($token);?><br/> 
    EncodingAESkey:<?php echo I('get.encodingaeskey');?>
    </font>
     </div>
  <div class="header2">
       1、登录微信公众平台（http://mp.weixin.qq.com/），登录之后点击左侧菜单的“开发者中心”，如下图所示。<br/>
       <img src="/Public/static/bind/4.jpg"/> 
     </div>
     <div class="header2">
       2、进入开发者中心之后，点击下图中的“修改配置”。<br/>
       <img width="600px" src="/Public/static/bind/5.png"/> 
     </div>
     <div class="header2">
       3、跳转至填写URL、Token,EncodingAESkey界面，将本页面中的URL、Token,EncodingAESkey值粘贴至此。<font color="red">（注意避免空格的出现，导致提交失败）</font>
       <br/>
       <img width="600px" src="/Public/static/bind/7.png"/> 
     </div>
     <div class="header2">
       4、提交成功后，点击启用。若已启用，无需再次启用。<br/>
       <img width="600px" src="/Public/static/bind/5-1.jpg"/>
     </div>
     <div class="header2">
       5、绑定成功。<br/>
     </div>
</div>
</body>
</html>