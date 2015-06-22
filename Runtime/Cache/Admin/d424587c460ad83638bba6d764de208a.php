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
        
        
<ul class="nav nav-pills">
	<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(ACTION_NAME == $vo['name']): endif; ?>><a class="btn btn-primary" href="<?php echo U(CONTROLLER_NAME.'/'.$vo['name'],array('pid'=>6,'level'=>3));?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<script>
function changeuploadtype(v){
if(v=='local'){
document.getElementById('upload_bucket').style.display='none';
document.getElementById('upload_secret').style.display='none';
document.getElementById('upload_username').style.display='none';
document.getElementById('upload_password').style.display='none';
document.getElementById('upload_domain').style.display='none';
}else{
document.getElementById('upload_bucket').style.display='';
document.getElementById('upload_secret').style.display='';
document.getElementById('upload_username').style.display='';
document.getElementById('upload_password').style.display='';
document.getElementById('upload_domain').style.display='';
}
}
</script>
<div id="artlist">
    <form  action="<?php echo U('Site/insert');?>" method="post">
        <table class="table table-condensed table-bordered table-striped"  width="100%" border="0" cellspacing="0" cellpadding="0" id="addn">
            <tr>
                <td  height="48" align="right"><strong>保存方式：</strong></td>
                <td><select onchange="changeuploadtype(this.value)" name="upload_type" id="upload_type"><option value="local"<?php if (C('upload_type')==''||C('upload_type')=='local'){echo ' selected';}?>>保存到本服务器</option><option value="gfile"<?php if (C('upload_type')=='gfile'){echo ' selected';}?>>保存到又拍云</option></select>
            </td>
        </tr>
        <tr id="upload_bucket" class="gfile"<?php if (C('upload_type')==''||C('upload_type')=='local'){echo ' style="display:none"';}?>>
            <td  height="48" align="right"><strong>BUCKET：</strong></td>
            <td><input type="text" name="up_bucket" value="<?php echo C('up_bucket');?>" class="form-control empty" size="45" /><span></span>
        </td>
    </tr>
    <tr id="upload_secret" class="gfile"<?php if (C('upload_type')==''||C('upload_type')=='local'){echo ' style="display:none"';}?>>
        <td  height="48" align="right"><strong>FORM_API_SECRET：</strong></td>
        <td><input type="text" name="up_form_api_secret" value="<?php echo C('up_form_api_secret');?>" class="form-control empty" size="45" /><span></span>
    </td>
</tr>
<tr id="upload_username" class="gfile"<?php if (C('upload_type')==''||C('upload_type')=='local'){echo ' style="display:none"';}?>>
    <td  height="48" align="right"><strong>操作员用户名：</strong></td>
    <td><input type="text" name="up_username" value="<?php echo C('up_username');?>" class="form-control empty" size="45" /><span></span>
</td>
</tr>
<tr id="upload_password" class="gfile"<?php if (C('upload_type')==''||C('upload_type')=='local'){echo ' style="display:none"';}?>>
<td  height="48" align="right"><strong>操作员密码：</strong></td>
<td><input type="password" name="up_password" value="<?php echo C('up_password');?>" class="form-control empty" size="45" /><span></span>
</td>
</tr>
<tr id="upload_domain" class="gfile"<?php if (C('upload_type')==''||C('upload_type')=='local'){echo ' style="display:none"';}?>>
<td  height="48" align="right"><strong>云存储域名：</strong></td>
<td><input type="text" name="up_domainname" value="<?php echo C('up_domainname');?>" class="form-control empty" size="45" /><span class="text-warning">不包含http://</span>
</td>
</tr>
<tr>
<td  height="48" align="right"><strong>上传文件类型：</strong></td>
<td><input type="text" name="up_exts" value="<?php echo C('up_exts');?>" class="form-control empty" size="45" /><span class="text-warning">多类型用,隔开</span>
</td>
</tr>
<tr>
<td  height="48" align="right"><strong>上传文件大小限制：</strong></td>
<td><input type="text" name="up_size" value="<?php echo C('up_size');?>" class="form-control empty" size="45" /><span class="text-warning">Kb</span>
</td>
</tr>
<tr style="display:none">
<td  height="48" align="right"><strong>文件存储路径：</strong></td>
<td><input type="text" name="up_path" value="<?php echo C('up_path');?>" class="form-control empty" size="45" /><span  class="text-warning">例:/Public/</span>
</td>
</tr>
<tr style="display:none">
<td  height="48" align="right"><strong>微信过期提醒：</strong></td>
<td><input type="text" name="connectnum" value="<?php echo C('connectnum');?>" class="form-control empty" size="45" /><span class="text-warning">释：当微信请求超过或用户费用到期提示信息</span>
</td>
</tr>
<input type="hidden" name="files" value="upfile.php" />
<tr>
<td height="48" colspan="2">
<div id="addkey"></div>
<div style="padding-left:100px;">
<input type="submit" class="btn btn-primary" value="保存" />
</div>
</td>
</tr>
</table>
</form>
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