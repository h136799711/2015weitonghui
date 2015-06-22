<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        
    <title>左侧导航</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/ripples.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/material-wfont.min.css" />        
        <link href="/Public/Admin/css/style.css" type="text/css" rel="stylesheet">
        <script src="/Public/static/jquery-1.11.1.min.js" type="text/javascript"></script>
        <!-- 非通用顶部CSS-->

    </head>
    <body>
        
        
<div class="">
    <ul class="list-group">
        <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item text-center"><a  class="btn btn-primary" href="<?php echo U($vo['name'].'/index',array('pid'=>$vo['id'],'level'=>3));?>" target="main" ><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>

       
        <!-- 底部脚本区 -->
        <script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
        <script src="/Public/static/bootstrap/material-design/js/ripples.min.js"></script>
        <script src="/Public/static/bootstrap/material-design/js/material.min.js"></script>
        <script src="/Public/Admin/js/common.js" ></script>
        <script>
                    $(document).ready(function() {
                        $.material.init();
                    });
        </script>
        <!-- 非通用底部脚本 -->
        <!-- 底部脚本结束 -->
    </body>
</html>