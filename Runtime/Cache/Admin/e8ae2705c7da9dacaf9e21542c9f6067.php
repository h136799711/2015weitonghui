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
        
        

<div class="bottom">
<input type="submit" value="排序" class="btn btn-primary" />
</div>
<form action="<?php echo U('Group/role_sort');?>" method="post">
<table class="table table-condensed table-bordered table-striped"  width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
	<tr>
		<td width="70">排序权重</td>
		<td width="70">ID</td>
		<td width="350">角色名称</td>
		<td >角色描述</td>
		<td width="70">状态</td>
		<td width="200">管理操作</td>
	</tr>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td align='center'>
				<input type='text' value='<?php echo ($vo["sort"]); ?>' size='3' name='sort[<?php echo ($vo["id"]); ?>]'></td>
			<td align='center'><?php echo ($vo["id"]); ?></td>
			<td ><?php echo ($vo["name"]); ?></td>
			<td ><?php echo ($vo["remark"]); ?></td>
			<td align='center'><?php if(($vo["status"]) == "1"): ?><font color="red">√</font><?php else: ?><font color="blue">×</font><?php endif; ?> 
			</td>
			<td align='center'>
				<a href="javascript:setting_access(<?php echo ($vo["id"]); ?>, '<?php echo ($vo["name"]); ?>')">权限设置</a>
				| <a href="<?php echo U('Group/edit/',array('id'=>$vo['id']));?>">修改</a>
				| <a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('Group/del/',array('id'=>$vo['id']));?>','确定删除该角色吗?')">删除</a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
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
        
	
<script type="text/javascript">
//权限设置
function setting_access(id, name) {
	window.top.art.dialog.open('<?php echo U("Group/access");?>'+'?roleid='+id,{title: name+'权限设置', width: 600, height: 500});
}
</script>

        <!-- 底部脚本结束 -->
    </body>
</html>