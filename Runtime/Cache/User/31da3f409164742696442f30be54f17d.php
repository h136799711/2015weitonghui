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
    
<body style="background:#fff">
    <?php if(I('get.error',-1) == -1): ?><div class="bg-warning tip">您可直接上传本地文件或从素材库中选择已上传文件</div>
    <form enctype="multipart/form-data" action="<?php echo U('User/GFile/upload');?>" id="thumbForm" method="POST" >
        <div style="font-size:14px;">选择本地文件：<br><br>
            <input type="file" style="width:80%;border:1px solid #ddd" name="photo" />
        </div>
        <div style="padding:20px 0;text-align:center;">
            <input id="submitbtn" name="doSubmit" type="submit" class="btn btn-primary" value="上传" onclick="this.value='上传中...'" />
            <input name="btnchoose" onclick="location.href='<?php echo U('Attachment/my',array('type'=>'my'));?>'" type="button" class="btn btn-primary" value="从素材库选择" />
        </div>
        <input type="hidden" value="" id="width" name="width" />
        <input type="hidden" value="" id="height" name="height" />
    </form>
    <script>
                                if (art.dialog.data('width')) {
                                document.getElementById('width').value = art.dialog.data('width');// 获取由主页面传递过来的数据
                                document.getElementById('height').value = art.dialog.data('height');
                                };
    </script>
    <?php else: ?>
    <div class="text-center alert <?php if($_GET['error']==0){echo 'alert-info';}else{echo 'alert-warning';} ?> " >
        <?php if($_GET['error']==0){echo '上传成功';}else{echo $_GET['msg'];} ?>
        <?php if(($_GET['error']) == "1"): ?><a class="btn btn-primary" href="<?php echo U('User/GFile/upload',array('token'=>getToken()));?>">
        重新上传
        </a><?php endif; ?>
    </div><?php endif; ?>
    <script>
                                function appendImg(domid,imgsrc){
                                        var img = document.creatElement("img");
                                        img.src = imgsrc;
                                }

                                var domid=art.dialog.data('domid');
                                // 返回数据到主页面
                                function returnHomepage(url){
                                    var origin = artDialog.open.origin;
                                    var dom = origin.document.getElementById(domid);
                                    var domsrcid=domid+'_src';
                                    if(origin.document.getElementById(domsrcid)){
                                    origin.document.getElementById(domsrcid).src=url;
                                    }
                                    dom.value=url;
                                    setTimeout("art.dialog.close()", 1500 )
                                }
                                <?php if(I('get.error',-1) == 0): ?>returnHomepage("<?php echo I('msg');?>");<?php endif; ?>
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