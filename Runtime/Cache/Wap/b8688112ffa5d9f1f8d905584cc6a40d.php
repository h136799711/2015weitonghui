<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>微医疗</title>
<!-- <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;"> -->

  <link rel="stylesheet" type="text/css" href="/Public/static/public-them/generated/jquery.mobile.flatui.css" />
  <script src="/Public/static/public-them/generated/js/jquery.js"></script>
  <script src="/Public/static/public-them/generated/js/jquery.mobile-1.4.0-rc.1.js"></script>
<style>
.ui-mobile [data-role=page],
.ui-mobile [data-role=dialog],
.ui-page {
  top: 0;
  left: 0;
  width: 100%;
  border: 0;
}
</style>
</head>
<body>
  <div data-role="page">


    <div data-role="header">
      <a data-iconpos="notext" data-role="button" data-icon="home" href="<?php echo U('Medical/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>" title="Home">Home</a>
      <h1><?php echo ($title); ?></h1>
      <a data-iconpos="notext" href="#panel" data-role="button" data-icon="flat-menu"></a>
    </div>

    <div data-role="content" role="main">
      <ul data-role="listview" data-inset="true">
        <li data-role="list-divider" data-theme="a"><?php echo ($about['name']); ?></li>
        <p style="text-align: center;"><img src="<?php echo ($about['logourl']); ?>" alt=""></p>
        <p style="padding: .7em 1em;vertical-align: middle;"><?php echo (trim(html_entity_decode($about['intro']))); ?></p>
        <li ><a  href="http://site.tg.qq.com/forwardToPhonePage?siteId=1&phone=<?php echo ($about['tel']); ?>"><?php echo ($about['tel']); ?></a></li>
        <li><a style="text" href="{gr-U('Wap/Map/location')}?lng=<?php echo ($about['longitude']); ?>&lat=<?php echo ($about['latitude']); ?>&title=我们的位置&info=温馨提示：医院大概位置">
    <span color="#2c2c2c">地址： <?php echo ($about['address']); ?> </span>
      </a></li>
      </ul>


       <div data-role="fieldcontain">
          <div data-role="header">
            <a data-iconpos="notext" title="Home"></a>
            <h6 style='padding:0px;margin:0'><a href="javascript:window.scrollTo(0,0);" data-role="button" data-icon="flat-cmd">返回顶部</a></h6>
            <a data-iconpos="notext"  title="Home"></a>
          </div>
      </div>
<script type="text/javascript">
window.shareData = {
            "moduleName":"Medical",
            "moduleID":"0",
            "imgUrl": "<?php echo ($cominfo['logourl']); ?>",
            "sendFriendLink": "<?php echo C('site_url'); echo U('Medical/index',array('token'=>$token));?>",
            "tTitle": "<?php echo ($title); ?>",
            "tContent": "<?php echo (mb_substr(strip_tags(html_entity_decode($cominfo['intro'])),0,89,'utf-8')); ?>..."
        };
</script>
<?php echo ($shareScript); ?>


    </div>
  </div>

  <div id="highlight"> </div>
</body>
</html>