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
        
        
<div id="artlist">
    <div class="ksearch">
        <div class="fl"><b class="kserico">快速搜索：</b>
            <form class=" form-inline " action="<?php echo U('Users/search');?>" method="post">
                <div class="form-group">
                    <label class="sr-only" for="searchType">搜索类型：</label>
                    <select name="type" id="searchType" class="form-group"  >
                        <option value="1">用户名</option>
                        <option value="2">用户ID</option>
                        <option value="3">用户邮箱</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="name">Password</label>
                    <input name="name" class="form-control " id="name" type="text" value="">
                </div>
                <input type="submit" class="btn btn-primary " value="提交">
            </form>
            </div>
    </div>
<a href="<?php echo U('Users/add');?>" class="btn btn-sm btn-default">添加</a>
</div>
<table class="table table-condensed table-bordered table-striped"  width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
<tr>
    <td width="70">ID</td>
    <td width="150">用户名称</td>
    <td width="150">所在组</td>
    <td width="100">最后登录IP</td>
    <td width="150">最后登录时间</td>
    <td width="70">状态</td>
    <td width="100">管理操作</td>
</tr>
<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    <td align='center'><?php echo ($vo["id"]); ?></td>
    <td ><?php echo ($vo["username"]); ?></td>
    <td ><?php echo ($group[$vo['gid']]); ?></td>
    <td align='center'><?php echo ($vo["lastip"]); ?></td>
    <td align='center'><?php echo date('Y-m-d H:i:s', $vo['lasttime']) ?></td>
    <td align='center'><?php if(($vo["status"]) == "1"): ?><font color="red">√</font><?php else: ?><font color="blue">×</font><?php endif; ?>
    </td>
    <td align='center'>
        <a href="<?php echo U('Users/edit/',array('id'=>$vo['id']));?>">修改</a>
        | <?php if(($vo["username"]) == "admin"): ?><font color="#cccccc">删除</font><?php else: ?><a href="javascript:void(0)" onclick="if(confirm('确定删除吗')){location.href='<?php echo U('Users/del/',array('id'=>$vo['id']));?>'}">删除</a><?php endif; ?>
    </td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
<tr bgcolor="#FFFFFF">
    <td colspan="8"><div class="listpage"><?php echo ($page); ?></div></td>
</tr>

</table>

       
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