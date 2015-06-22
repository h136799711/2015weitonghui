<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content" content ="text/html; charset=utf-8" />
<title>微通汇系统</title>
<meta http-equiv="MSThemeCompatible" content = "Yes" />
<link rel="stylesheet" type="text/css" href="/Public/User/css/style_2_common.css?BPm" />
<script src="/Public/User/js/common.js" type="text/javascript"></script>
<link href="/Public/User/css/style.css" rel="stylesheet" type="text/css" />
 <script src="/Public/static/jquery-1.4.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=<?php echo $apikey;?>"></script>
 <!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->
 <script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<style>
body{line-height:180%;}
ul.modules li{padding:4px 10px;margin:4px;background:#efefef;float:left;width:27%;}
ul.modules li div.mleft{float:left;width:40%}
ul.modules li div.mright{float:right;width:55%;text-align:right;}
</style>
</head>
<body style="background:#fff;padding:20px 20px;">
<div style="background:#fefbe4;border:1px solid #f3ecb9;color:#993300;padding:10px;margin-bottom:5px;">使用方法：点击对应内容后面的“选中”即可。<a href="<?php echo U('User/Link/insert');?>">点击这里返回模块<i class="mdi-toggle-check-box"></i>选择</a></div>

<table class="table table-condensed table-bordered table-striped" border="0" cellSpacing="0" cellPadding="0" width="100%">
<thead>
<tr>
<th>标题</th>
<th style=" width:80px;">操作 <span class="tooltips" ><img src="/Public/User/images/price_help.png" align="absmiddle" /><span>
<p>点击“选中”即可</p>
</span></span></th>
</tr>
</thead>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($m["name"]); ?></td><td class="norightborder">
<?php if($_GET['c'] != ''): ?><a class="btn btn-warning btn-sm" href="<?php echo ($m["url"]); ?>" target="_blank"><i class="mdi-action-pageview"></i>预览</a>&nbsp;&nbsp;<a href="###" class="btn btn-warning btn-sm"  onclick="returnHomepage('<?php echo ($m["url"]); ?>')">选中</a>
<?php else: ?>
	<a class="btn btn-warning btn-sm"  href="<?php echo U('User/Link/outsideLinkDetail',array('c'=>$m['code']));?>">详细列表</a><?php endif; ?>

</td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div class="footactions" style="padding-left:10px">
  <div class="pages"><?php echo ($page); ?></div>
</div>

<script>
var domid=art.dialog.data('domid');
// 返回数据到主页面
function returnHomepage(url){
	var origin = artDialog.open.origin;
	var dom = origin.document.getElementById(domid);
	dom.value=url;
	setTimeout("art.dialog.close()", 100 )
}
</script>
</body>
</html>