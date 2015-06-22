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
        
        

<div id="artlist" >
<?php if(($info["id"]) > "0"): ?><form action="<?php echo U('User/edit');?>" method="post" name="form" id="myform">
			<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
			
		<?php else: ?>
			<form action="<?php echo U('User/add');?>" method="post" name="form" id="myform">
			对不起，系统目前只支持一个管理员操作<?php endif; ?>
		
			<table class="table table-condensed table-bordered table-striped"  width="100%" border="0" cellspacing="0" cellpadding="0" id="addn" <?php if(($info["id"]) > "0"): else: ?>style="display:none"<?php endif; ?>>

				 <tr>
					<th colspan="4"><?php echo ($title); ?></th>
				</tr>
				<tr>
					<td height="48" align="right"><strong>用户名称：</strong></td>
					<td colspan="3" class="lt">
						<input type="text" name="username" class="form-control empty" size="45" value="<?php echo ($info["username"]); ?>" <?php if(($info["username"]) == "admin"): ?>readonly="readonly"<?php endif; ?>>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>密　　码：</strong></td>
					<td colspan="3" class="lt">
						<input type="password" name="password" class="form-control empty" size="45" value="">
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>确认密码：</strong></td>
					<td colspan="3" class="lt">
						<input type="password" name="repassword" class="form-control empty" size="45"/>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>用户角色：</strong></td>
					<td colspan="3" class="lt">
						<select name="role" style="width:136px">
							<?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if(($vo["id"]) == $info["role"]): ?>selected=""<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>用户状态：</strong></td>
					<td colspan="3" class="lt">
						<div class="radio radio-primary">
							<label >
								<input type="radio" class="radio" class="form-control empty" value="1" name="status" id="status1" <?php if(($info["status"] == 1) OR ($info['status'] == '') ): ?>checked=""<?php endif; ?> >
								启用
							</label>
						</div>
						<div class="radio radio-primary">
							<label >
								<input type="radio" class="radio" class="form-control empty"  value="0" name="status" id="status2" <?php if(($info["status"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
							</label>
						</div>
							
							
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>备注说明：</strong></td>
					<td colspan="3" class="lt">
						<input type="text" name="remark" class="form-control empty" size="45" value="<?php echo ($info["remark"]); ?>"/>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong></strong></td>
					
					</td>
				</tr>
	<tr>
		<td colspan="4">
			<?php if(($info["id"]) > "0"): ?><input class="btn btn-primary"  type="submit" name="dosubmit" value="修 改" >
				<?php else: ?>
				<input class="btn btn-primary" type="submit" name="dosubmit" value="添 加"><?php endif; ?>
			&nbsp;
			<input class="btn btn-primary" type="button" onclick="javascript:history.back(-1);" value="返 回" ></td>
	</tr>
</table>
</form>
<br />
<br />
<br />

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