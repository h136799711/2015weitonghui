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
    
<body >
    <div class="bg-info">使用方法：点击对应内容后面的“选中”即可。</div>
    <h4><?php echo ($moduleName); ?>列表</h4>
    <table class="table-responsive table table-condensed table-bordered table-striped" border="0" cellSpacing="0" cellPadding="0" width="100%">
        <thead>
            <tr>
                <th class="col-lg-8 col-md-8 ">标题</th>
                <th class="col-lg-4 col-md-4 ">操作</th>
            </tr>
        </thead>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($m["name"]); ?></td><td class="norightborder"><a class="btn btn-primary btn-sm" href="###" onclick="returnHomepage(<?php echo ($m["id"]); ?>,'<?php echo ($m["name"]); ?>','<?php echo ($m["pic"]); ?>','<?php echo ($m["info"]); ?>')">选中</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <div class="footactions" style="padding-left:10px">
        <div class="pages"><?php echo ($page); ?></div>
    </div>
    <script>
        var titledom=art.dialog.data('titledom');
        var imgids=art.dialog.data('imgids');
        // 返回数据到主页面
        function returnHomepage(id,title,pic,info){
        var origin = artDialog.open.origin;
        var dom = origin.document.getElementById(titledom);
        var imgidsdom = origin.document.getElementById(imgids);
        var multinews= origin.document.getElementById(art.dialog.data('multinews'));
        var singlenews= origin.document.getElementById(art.dialog.data('singlenews'));
        var multione= origin.document.getElementById(art.dialog.data('multione'));
        var js_appmsg_preview= origin.document.getElementById(art.dialog.data('js_appmsg_preview'));
        //dom.value+=','+url;
        imgCount=imgidsdom.value.split(',').length-1;
        //
    dom.innerHTML='<div class="mediaPanel"><div class="mediaHead"><span class="title" id="zbt">'+title+'</span><span class="time"><?php echo date('Y-m-d',time());?></span><div class="clearfix"></div></div><div class="mediaImg"><img id="suicaipic1" src="'+pic+'"></div><div class="mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  mediacol-xs-9 col-sm-9  col-md-10 col-lg-10 P"><p id="zinfo">'+info+'</p></div><div class="mediaFooter"><span class="mesgIcon right"></span><span style="line-height:50px;" >查看全文</span><div class="clearfix"></div></div></div>';
    if(multione && multione.innerHTML==''){
    if(singlenews){
    singlenews.style.display="";
    }
    if(multinews){
    multinews.style.display="none";
    }
    multione.innerHTML=' <h4 class="appmsg_title"><a href="javascript:void(0);" onClick="return false;" target="_blank">'+title+'</a></h4><div class="appmsg_thumb_wrp"><img style="border:1px solid #ddd" class="js_appmsg_thumb appmsg_thumb" src="'+pic+'"><i class="appmsg_thumb default" style="background:url('+pic+');background-size:100% 100%">&nbsp;</i></div>';
    }else{
    if(singlenews){
    singlenews.style.display="none";
    }
    if(multinews){
    multinews.style.display="";
    }
    if(js_appmsg_preview ){
    js_appmsg_preview.innerHTML=js_appmsg_preview.innerHTML+'<div id="appmsgItem4" data-fileid="" data-id="4" class="appmsg_item js_appmsg_item "><img class="js_appmsg_thumb appmsg_thumb" src="'+pic+'"><i class="appmsg_thumb default" style="background:url('+pic+');background-size:100% 100%">&nbsp;</i><h4 class="appmsg_title"><a onClick="return false;" href="javascript:void(0);" target="_blank">'+title+'</a></h4></div>';
    }
    }
    dom.style.display="";
    imgidsdom.value+=','+id;
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