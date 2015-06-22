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
        
        
<div class="cr">
    <a href="<?php echo U('UserGroup/add',array('title'=>'添加前台用户组'));?>" class="btn btn-primary">添加前台用户组</a> 
</div>
<table class="table table-condensed table-bordered table-striped"  width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
    <tr>
        <td width="70">ID</td>
        <td width="150">会员组名称</td>
        <td >自义定图文条数</td>
        <td width="100">请求次数</td>
        <td width="150">是否显示版权</td>
        <td width="150">活动创建次数</td>
        <td width="70">状态</td>
        <td width="100">管理操作</td>
    </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td align='center'><?php echo ($vo["id"]); ?></td>
        <td ><?php echo ($vo["name"]); ?></td>
        <td ><?php echo ($vo["diynum"]); ?></td>
        <td align='center'><?php echo ($vo["connectnum"]); ?></td>
        <td align='center'><?php if($vo['iscopyright'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
        <td align='center'><?php echo ($vo["activitynum"]); ?></td>
        <td align='center'><?php if(($vo["status"]) == "1"): ?><font color="red">√</font><?php else: ?><font color="blue">×</font><?php endif; ?>
        </td>
        <td align='center'>
            <a href="<?php echo U('UserGroup/edit/',array('id'=>$vo['id']));?>">修改</a>
            | <?php if(($vo["username"]) == "admin"): ?><font color="#cccccc">删除</font><?php else: ?><a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('UserGroup/del/',array('id'=>$vo['id']));?>','确定删除该用户吗?')">删除</a><?php endif; ?>
        </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr bgcolor="#FFFFFF">
        <td colspan="8"><div class="listpage"><?php echo ($page); ?></div></td>
        <td></td>
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