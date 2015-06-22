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
<div id="artlist">
    <form id="myform" action="<?php echo U('Site/insert');?>" method="post">
        <table class="table table-condensed table-bordered table-striped"  width="100%" border="0" cellspacing="0" cellpadding="0" id="addn">
            <tr>
                <td  height="48" align="right"><strong>网站名称：</strong></td>
                <td><input type="text" name="site_name" value="<?php echo ($cfg_siteName); ?>" class="form-control empty"  /><span  class="text-warning"> </span>
            </td>
        </tr>
        <tr>
            <td  height="48" align="right"><strong>网站标题：</strong></td>
            <td><input type="text" name="site_title" value="<?php echo ($cfg_siteTitle); ?>" class="form-control empty"  /><span class="text-warning">
            请不超过80个字符</span>
        </td>
    </tr>
    <tr>
        <td  height="48" align="right"><strong>网站地址：</strong></td>
        <td><input type="text" name="site_url" value="<?php echo ($cfg_siteUrl); ?>" class="form-control empty"  /><span  class="text-warning"></span>
    </td>
</tr>
<tr>
<td  height="48" align="right"><strong>用户请求数超出提示：</strong></td>
<td><input type="text" name="connectout" value="<?php echo C('connectout');?>" class="form-control empty"  /><span></span>
</td>
</tr>
<tr>
<td  height="48" align="right"><strong>审核用户：</strong></td>
<td><input type="radio" name="ischeckuser" value="true" <?php if(C('ischeckuser')==='true')echo checked; ?> /> 注册时无需要审核 <input type="radio" name="ischeckuser" value="false" <?php if(C('ischeckuser')==='false')echo checked; ?> /> 注册时需要审核</td>
</tr>
<tr>
<td  height="48" align="right"><strong>注册需要手机号：</strong></td>
<td><input type="radio" name="reg_needmp" value="true" <?php if(C('reg_needmp')==='true')echo checked; ?> /> 需要填写手机号 <input type="radio" name="reg_needmp" value="false" <?php if(C('reg_needmp')==='false')echo checked; ?> /> 不需要填写手机号</td>
</tr>
<tr>
<td  height="48" align="right"><strong>注册后级别：</strong></td>
<td>
<select name="reg_groupid">
<?php if(is_array($groups)): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><option value="<?php echo ($g["id"]); ?>" <?php if(C('reg_groupid') == $g['id']): ?>selected<?php endif; ?>><?php echo ($g["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
<span>仅注册不需要审核的时候有效</span>
</td>
</tr>
<tr>
<td  height="48" align="right"><strong>注册后使用天数：</strong></td>
<td><input type="text" name="reg_validdays" value="<?php echo C('reg_validdays');?>" class="form-control empty"  /><span>注册后多少天过期(仅注册不需要审核的时候有效)</span>
</td>
</tr>
<tr>
<td  height="48" align="right"><strong>网站备案：</strong></td>
<td><input type="text" name="ipc" value="<?php echo C('ipc');?>" class="form-control empty"  />
</td>
</tr>
<tr>
<td  height="48" align="right"><strong>站长QQ：</strong></td>
<td><input type="text" name="site_qq" value="<?php echo ($cfg_qq); ?>" class="form-control empty"  />
</td>
</tr>
<tr>
<td  height="48" align="right"><strong>站长手机：</strong></td>
<td><input type="text" name="site_mp" value="<?php echo C('site_mp');?>" class="form-control empty"  />
</td>
</tr>
<tr>
<td  height="48" align="right"><strong>百度地图API：</strong></td>
<td><input type="text" name="baidu_map_api" value="<?php echo C('baidu_map_api');?>" class="form-control empty"  />
</td>
</tr>
<tr>
<td  height="48" align="right"><strong>站长Email：</strong></td>
<td><input type="text" name="site_email" value="<?php echo C('site_email');?>" class="form-control empty"  />
</td>
</tr>
<tr>
<td  height="48" align="right"><strong>网站关键词：</strong></td>
<td><textarea  type="text" name="keyword" class="form-control empty" style="width:450px;height:60px;margin:5px 0 5px 0;" /><?php echo ($cfg_metaKeyword); ?></textarea>
</td>
</tr>
<tr>
<td  height="48" align="right"><strong>网站描述：</strong></td>
<td><textarea  type="text" name="content" rows="5" class="form-control empty"  /><?php echo ($cfg_metaDes); ?></textarea><span>一般不超过200个字符</span>
</td>
</tr>
<tr>
<td  height="48" align="right"><strong>底部版权：</strong></td>
<td>
    <textarea  type="text" name="copyright" class="form-control empty" rows="5" /><?php echo C('copyright');?></textarea>
</td>
</tr>
<input type="hidden" name="files" value="info.php" />
<tr>
<td height="48" colspan="2">
<div id="addkey"></div>
<div style="padding-left:100px;">
<input type="submit" class="btn btn-primary" value="保存" />
</div>
</td>
</tr>
</form>
</table>
<br>
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