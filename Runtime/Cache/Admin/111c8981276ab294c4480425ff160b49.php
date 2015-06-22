<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>标题</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/ripples.min.css" />
        <link type="text/css" rel="stylesheet" href="/Public/static/bootstrap/material-design/css/material-wfont.min.css" />        
        <link href="/Public/Admin/css/style.css" type="text/css" rel="stylesheet">
        <script src="/Public/static/jquery-1.11.1.min.js" type="text/javascript"></script>
        <!-- 非通用顶部CSS-->

    </head>
    <body>
        
        
<form action="<?php echo U('Node/sort');?>" method="post" class="">
    <div class="bottom">
        <span><input type="submit" class="btn btn-primary" value="排序" class="btn btn-primary"></span>
    </div>
    <table class="table table-condensed table-bordered table-striped"  width="100%" border="0" cellspacing="0"  cellpadding="0" id="alist">
        <thead>
        <tr>
            <th width="5%">排序权重</th>
            <th width="5%" class="xtit">ID</th>
            <th width="40%">菜单名称</th>
            <th width="6%">类型</th>
            <th width="6%">状态</th>
            <th width="6%">显示</th>
            <th width="24%">操作</th>
        </tr>
        </thead>
        <?php echo ($html_tree); ?>

    </table>
    
</form>

       
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