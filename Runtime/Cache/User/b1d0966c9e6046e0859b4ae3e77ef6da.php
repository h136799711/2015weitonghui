<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
    
<style>
body{line-height:180%;}
ul.modules li{padding:4px 10px;margin:4px;background:#efefef;float:left;width:27%;}
ul.modules li div.mleft{float:left;width:40%}
ul.modules li div.mright{float:right;width:55%;text-align:right;}
</style>
<body style="background:#fff;padding:20px 20px;">
<div class="bg-warning tip">使用方法：点击“选中”直接选中对应分类，或者点击“详细”进入对应分类的子分类，如果分类下有子分类请慎用“选中”，选中后子分类以及子分类下的内容将不能被显示</div>
<h4>请选择分类：</h4>



<table class="table table-condensed table-bordered table-striped" border="0" cellSpacing="0" cellPadding="0" width="100%">
<thead>
<tr>
<th>标题</th>
<th style=" width:120px;">操作</th>
</tr>
</thead>
<?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($c["name"]); ?></td><td class="norightborder"><?php if($c['sub'] == NULL): ?><a href="###" onclick="returnHomepage(<?php echo ($c["id"]); ?>,'<?php echo ($c["name"]); ?>')" class="btn btn-primary btn-sm">选中</a><?php else: ?><a href="###" onclick="returnHomepage(<?php echo ($c["id"]); ?>,'<?php echo ($c["name"]); ?>')"  class="btn btn-primary btn-sm">选中</a> &nbsp; <a href="<?php echo U('User/Img/editClass',array('id'=>$c['id']));?>"  class="btn btn-primary btn-sm">详情</a><?php endif; ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>


<script>
var domid=art.dialog.data('domid');
var domid2=art.dialog.data('domid2');
// 返回数据到主页面
function returnHomepage(url,n){
	var origin = artDialog.open.origin;
	var dom = origin.document.getElementById(domid);
	var dom2 = origin.document.getElementById(domid2);
	dom.value=url+','+n;
	dom2.innerHTML=n;
	setTimeout("art.dialog.close()", 100 )
}
</script>


 <!-- 底部脚本区 -->
<script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/static/bootstrap/material-design/js/ripples.min.js"></script>
<script src="/Public/static/bootstrap/material-design/js/material.min.js"></script>
<script src="/Public/User/js/bottom.js"></script>
<script>
            $(document).ready(function() {
                $.material.init();
            });
</script>
</body>
</html>