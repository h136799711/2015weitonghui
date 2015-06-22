<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
    
<script src="/Public/static/gfile.js?2013"></script>
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<style>
</style>
<form action="/index.php/User/Diymen/class_add.html" method="post" target="_parent" id="realinfo_form">
    <table class="table" >
        <tbody>
            <tr>
                <td align="right" height="62" width="">父级菜单：</td>
                <td>
                    <div >
                        <select class="form-control"  name="pid" id="pid">
                            <option selected="selected" value="0">请选择菜单：</option>
                            <?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$class): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($class["id"]); ?>"><?php echo ($class["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="right" height="62" width="">主菜单名称：</td>
                <td>
                    <input id="menu_title" class="form-control" name="title" title="主菜单名称" value="" type="text">

                </td>
            </tr>
            <tr>
                <td align="right" height="62" width="">关联关键词：</td>
                <td>
                    <div ><input id="menu_keyword" class="form-control" name="keyword" title="关联关键词" value="" type="text"> <a href="###" onclick="addLink('menu_keyword',1)" class="btn btn-primary"><i class="mdi-social-group-add"></i>从功能库添加</a></div>
                </td>
            </tr>
            <tr>
                <td align="right" height="62" width="">外链接url：</td>
                <td>
                    <div ><input id="menu_key" class="form-control" name="url" title="外链接url" value="" type="text"> <br/>如无特殊需要，这里请不要填写 </div>
                </td>
            </tr>
            <tr>
                <td align="right" height="62">显示：</td>
                <td>
                    <div class="radio radio-primary">
                        <label >
                            <input type="radio" name="is_show" checked="checked" value="1">是
                        </label>
                    </div>
                    <div class="radio radio-primary">
                        <label>
                            <input type="radio" name="is_show" value="0">否
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="right" height="62">排序：</td>
                <td>
                    <div >
                        <input id="sortid" class="form-control" name="sort" title="排序" value="" type="text"></div>
                        <div class="system l"></div>
                    </td>
                </tr>
                <tr>
                    <td height="42">&nbsp;</td>
                    <td>
                        <input class="btn btn-primary" type="submit" name="submit" value="提交">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    
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