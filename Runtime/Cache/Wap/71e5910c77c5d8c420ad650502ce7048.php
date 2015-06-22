<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>

<title>微医疗</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

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

   <!--  <div data-role="panel" id="panel" data-position="right" data-theme="a" data-display="push"></div> -->

     <div data-role="header">
      <a data-iconpos="notext" data-role="button" data-icon="home" href="<?php echo U('Medical/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>" title="Home">Home</a>
      <h1><?php echo ($title); ?></h1>
      <a data-iconpos="notext" href="#panel" data-role="button" data-icon="flat-menu"></a>
    </div>

    <div data-role="content" role="main">
      <ul data-role="listview" data-inset="true">
        <li data-role="list-divider" data-theme="a"><?php echo ($classify['name']); ?></li>
        <li><img src="<?php echo ($classify['img']); ?>" alt=""><?php echo ($classify['info']); ?></li>
        <?php if(is_array($imgtxt)): $i = 0; $__LIST__ = $imgtxt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-role="list-divider" data-theme="a"></li>
        <li><a style="text" href="<?php echo U('Medical/newread',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$vo['id']));?>">
          <span color="#2c2c2c"><?php echo ($vo['title']); ?> </span>
          </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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