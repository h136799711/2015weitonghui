<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/Public/static/public-them/generated/jquery.mobile.flatui.css" />
  <script src="/Public/static/public-them/generated/js/jquery.js"></script>
  <script src="/Public/static/public-them/generated/js/jquery.mobile-1.4.0-rc.1.js"></script>
  <!-- bxSlider Javascript file -->
<script src="/Public/static/bxslider-4/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="/Public/static/bxslider-4/jquery.bxslider.css" rel="stylesheet" />
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

    <!-- <div data-role="panel" id="panel" data-position="right" data-theme="a" data-display="push"></div> -->
          <div data-role="header">
      <a data-iconpos="notext" data-role="button" data-icon="home" href="<?php echo U('Medical/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>" title="Home">Home</a>
      <h1><?php echo ($title); ?></h1>
      <a data-iconpos="notext" href="#panel" data-role="button" data-icon="flat-menu"></a>
    </div>
    <div data-role="content" role="main">
<!--      <div class="banner" > -->
  <ul class="bxslider" style="padding-left: 0px;">
    <?php if(is_array($bxslider)): $i = 0; $__LIST__ = $bxslider;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><img src="<?php echo ($vo['picurl']); ?>" style="height: 250px;border: 0px;padding: 0px;margin: 0px;" title="<?php echo ($vo['title']); ?> <?php echo ($vo['info']); ?>" /></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<!-- </div> -->

<script>
  $(document).ready(function(){
  var slider_banner = $('.bxslider').bxSlider({
      mode: 'fade',
      captions: true,
      pause: 2000,
      pager:false,

  });
  slider_banner.startAuto();
});
</script>

      <fieldset class="ui-grid-a">
        <div class="ui-block-a"><a href="<?php echo U('Medical/Introduction',array('token'=>$token,'wecha_id'=>$wecha_id));?>"><button data-icon="home" data-theme="b"><?php echo ($setIndex['menu1']); ?></button></a></div>
        <div class="ui-block-b"><a href="<?php echo U('Medical/publicListTmp',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'hotfocus'));?>"><button data-icon="flat-video" data-theme="b"><?php echo ($setIndex['menu2']); ?></button></a></div>
      </fieldset>
      <fieldset class="ui-grid-a">
        <div class="ui-block-a"><a href="<?php echo U('Medical/publicListTmp',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'experts'));?>"><button data-icon="flat-man" data-theme="b"><?php echo ($setIndex['menu3']); ?></button></a></div>
        <div class="ui-block-b"><a href="<?php echo U('Medical/publicListTmp',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'equipment'));?>"><button data-icon="flat-mail" data-theme="b"><?php echo ($setIndex['menu4']); ?></button></a></div>
      </fieldset>
      <fieldset class="ui-grid-a">
        <div class="ui-block-a"><a href="<?php echo U('Medical/publicListTmp',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'rcase'));?>"><button data-icon="flat-heart" data-theme="b"><?php echo ($setIndex['menu5']); ?></button></a></div>
        <div class="ui-block-b"><a href="<?php echo U('Medical/publicListTmp',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'technology'));?>"><button data-icon="flat-menu" data-theme="b"><?php echo ($setIndex['menu6']); ?></button></a></div>
      </fieldset>
      <fieldset class="ui-grid-a">
        <div class="ui-block-a"><a href="<?php echo U('Medical/publicListTmp',array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>'drug'));?>"><button data-icon="flat-lock" data-theme="b"><?php echo ($setIndex['menu7']); ?></button></a></div>

        <div class="ui-block-b"><a href="<?php echo U('Medical/registered',array('token'=>$token,'wecha_id'=>$wecha_id));?>"><button data-icon="flat-new" data-theme="b" data-ajax="false"><?php echo ($setIndex['menu8']); ?></button></a></div>
      </fieldset>
      <fieldset class="ui-grid">
        <div class="ui-block"><a href="tel:<?php echo ($tel); ?>"><button data-icon="flat-volume" data-theme="d"><?php echo ($tel); ?></button></a></div>
      </fieldset>

      <ul data-role="listview" data-inset="true"<?php if($setIndex['video'] == ''): ?>style="display: none;"<?php endif; ?>>
        <li data-role="list-divider" data-theme="a"></li>
        <li>
<div class="video-box tpl-video"   id="content" style="display:block;"><?php echo ($setIndex['video']); ?></div>
<script src="/Public/Wap/wedding/js/play.js" type="text/javascript"></script>
                    </li>
      </ul>


      <div data-role="collapsible-set" data-theme="b" data-content-theme="b">
        <div data-role="collapsible" data-collapsed-icon="flat-time" data-expanded-icon="flat-cross" data-collapsed="false">
          <h3>症状自查</h3>
          <ul data-role="listview" data-inset="true">
            <li data-role="list-divider" data-theme="a"><?php echo ($classify2['name']); ?></li>
            <li><?php echo ($classify2['info']); ?></li>

             <?php if(is_array($imgtxt2)): $i = 0; $__LIST__ = $imgtxt2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a style="text" href="<?php echo U('Medical/newread',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$vo['id']));?>">
                <span color="#2c2c2c"><?php echo ($vo['title']); ?> </span>
                </a></li><?php endforeach; endif; else: echo "" ;endif; ?>

          </ul>
        </div>
        <div data-role="collapsible" data-collapsed-icon="flat-calendar" data-expanded-icon="flat-cross">
          <h3>官方活动</h3>
           <ul data-role="listview" data-inset="true">
            <li data-role="list-divider" data-theme="a"><?php echo ($classify['name']); ?></li>
            <li><?php echo ($classify['info']); ?></li>

             <?php if(is_array($imgtxt)): $i = 0; $__LIST__ = $imgtxt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a style="text" href="<?php echo U('Medical/newread',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$vo['id']));?>">
                <span color="#2c2c2c"><?php echo ($vo['title']); ?> </span>
                </a></li><?php endforeach; endif; else: echo "" ;endif; ?>

          </ul>
        </div>
      </div>

   
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