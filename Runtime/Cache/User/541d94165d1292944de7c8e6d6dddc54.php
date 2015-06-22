<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <!-- 后台主体结构框架 -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,target-densitydpi=high-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <title>微通汇管理系统</title>
        <meta http-equiv="X-UA-Compatible" content = "IE=edge,chrome=1">
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/ripples.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/material-wfont.min.css" />
        <link href="/Public/User/css/new.css" type="text/css" rel="stylesheet">

        <script src="/Public/static/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
        <script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
        <style type="text/css">
                        a.nav-header{background:url(/Public/static/images/arrow_click.png) center right no-repeat;cursor:pointer}
                        a.nav-header-current{background:url(/Public/static/images/arrow_unclick.png) center right no-repeat;}
        </style>
        <script type="text/javascript">
                    
                    (function(){
                        window.GOORAYE = {};
                        window.GOORAYE.IndexURL = "";
                    })(window);
        </script>
    </head>
    
<meta charset="utf-8" />
<script type="text/javascript" src="/Public/User/js/tplSilder.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/User/css/tplSilder.css" media="all" />
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<style>
.tplinfo{
color:black;
font:12px/1.5 Microsoft YaHei,Helvitica,Verdana,Arial,san-serif
}

</style>
<?php if($_GET['type'] == 1): ?><div style="background:#fefbe4;border:1px solid #f3ecb9;color:#993300;padding:10px;margin-bottom:5px;font-size:13px;">
    使用方法：点击两侧的箭头可以翻页浏览更多的模板，直接点击对应的模板既可选中
</div>
<div class="list_carousel">
    <div class="caroufredsel_wrapper" style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 960px; height: 383px; margin: 0px; overflow: hidden;">
        <ul id="foo2" style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 11040px; height: 383px; z-index: auto;">

            <?php if(is_array($tpl)): $i = 0; $__LIST__ = $tpl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tpl): $mod = ($i % 2 );++$i;?><li>
                <a style="margin-bottom:5px;" href="javascript:void(0);" onclick="returnHomepage(<?php echo ($tpl["tpltypeid"]); ?>)" title="模板 <?php echo ($tpl["tpltypeid"]); ?>     <?php echo ($tpl["tpldesinfo"]); ?>">
                <!-- <img src="/Public/User/images/<?php echo ($tpl["tplview"]); ?>" /> -->
                <span style="display: block;height: 300px;background-image:url(/Public/User/images/<?php echo ($tpl["tplview"]); ?>);"></span>
                </a>
                <span class="tplinfo">模板 <?php echo ($tpl["tpltypeid"]); ?></span>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>

    </div>

    <div class="clearfix"></div>
    <a id="prev2" class="prev" href="#" style="display: block;"></a>
    <a id="next2" class="next" href="#" style="display: block;"></a>
</div>
<script type="text/javascript">
$(document).ready(function(){
$('#foo2').carouFredSel({
auto: false,
prev: '#prev2',
next: '#next2',
pagination: "#pager2",
mousewheel: true,
swipe: {
onMouse: true,
onTouch: true
}

});
});
var domid=art.dialog.data('domid');
var domid2=art.dialog.data('domid2');
// 返回数据到主页面
function returnHomepage(url){
var origin = artDialog.open.origin;
var dom = origin.document.getElementById(domid);
var dom2 = origin.document.getElementById(domid2);
dom.value=url;
dom2.value='已选择模板 '+url;
setTimeout("art.dialog.close()", 100 )
}
</script>


<?php elseif($_GET['type'] == 2): ?>
<style>
#viewTpl {
width:170px;
height:353px;
background:url(/Public/User/images/img/radio_iphone.png) no-repeat;
margin:auto;
}
</style>
<div id="viewTpl"><img src="/Public/User/images/<?php echo ($info["tplview"]); ?>" /></div>

<?php elseif($_GET['type'] == 3): ?>
<div style="background:#fefbe4;border:1px solid #f3ecb9;color:#993300;padding:10px;margin-bottom:5px;font-size:13px;">
    使用方法：点击两侧的箭头可以翻页浏览更多的模板，直接点击对应的模板既可选中
</div>
<div class="list_carousel2">
    <div class="caroufredsel_wrapper2" style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 960px; height: 383px; margin: 0px; overflow: hidden;">
        <ul id="foo3" style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 11040px; height: 383px; z-index: auto;">

            <?php if(is_array($contTpl)): $i = 0; $__LIST__ = $contTpl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$contTpl): $mod = ($i % 2 );++$i;?><li>
                <a style="margin-bottom:5px;" href="javascript:void(0);" onclick="returnHomepage(<?php echo ($contTpl["tpltypeid"]); ?>)" title="模板 <?php echo ($contTpl["tpltypeid"]); ?>     <?php echo ($contTpl["tpldesinfo"]); ?>">
                <img src="/Public/User/images/<?php echo ($contTpl["tplview"]); ?>" />
                </a>
                <span class="tplinfo">模板 <?php echo ($contTpl["tpltypeid"]); ?></span>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>

    </div>

    <div class="clearfix2"></div>
    <a id="prev3" class="prev2" href="#" style="display: block;"></a>
    <a id="next3" class="next2" href="#" style="display: block;"></a>
</div>

<script type="text/javascript">
$(document).ready(function(){
$('#foo3').carouFredSel({
auto: false,
prev: '#prev3',
next: '#next3',
pagination: "#pager3",
mousewheel: true,
swipe: {
onMouse: true,
onTouch: true
}

});
});


var domid=art.dialog.data('domid');
var domid2=art.dialog.data('domid2');
// 返回数据到主页面
function returnHomepage(url){
var origin = artDialog.open.origin;
var dom = origin.document.getElementById(domid);
var dom2 = origin.document.getElementById(domid2);
dom.value=url;
dom2.value='已选择模板 '+url;
setTimeout("art.dialog.close()", 100 )
}
</script>


<?php else: ?>
<style>
#viewTpl2 {
width:170px;
height:353px;
background:url(/Public/User/images/img/radio_iphone.png) no-repeat;
margin:auto;
}
</style>
<div id="viewTpl2"><img src="/Public/User/images/<?php echo ($info["tplview2"]); ?>" /></div><?php endif; ?>