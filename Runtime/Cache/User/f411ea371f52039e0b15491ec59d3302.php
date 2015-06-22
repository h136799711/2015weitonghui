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
    
<script type="text/javascript" src="/Public/static/audioplayer/inc/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/Public/static/audioplayer/inc/jquery.mb.miniPlayer.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/static/audioplayer/css/miniplayer.css" title="style" media="screen"/>
<script type="text/javascript">
                $(function () {
                    $(".audio").mb_miniPlayer({
                        width: 200,
                        inLine: false,
                        onEnd: playNext
                    });
                    function playNext(player) {
                        var players = $(".audio");
                        document.playerIDX = player.idx + 1 <= players.length - 1 ? player.idx + 1 : 0;
                        players.eq(document.playerIDX).mb_miniPlayer_play();
                    }
                });
</script>
</head>
<body style="background:#fff">
<script>
        function changeFolder(v){
        window.location.href="<?php echo U('User/Attachment/index',array('type'=>$type));?>"+"?folder="+v;
        }
</script>
<!--tab start-->
<div >
    <ul class="nav nav-tabs">
        <?php
 if ($type!='my'){ ?>
        <?php if($type == 'icon'): ?><li class="current tabli" id="tab0"><a href="<?php echo U('Attachment/index',array('type'=>'icon'));?>">图标</a></li><?php endif; ?>
        <?php if($type == 'focus'): ?><li class="current tabli" id="tab0"><a href="<?php echo U('Attachment/index',array('type'=>'focus'));?>">幻灯片</a></li><?php endif; ?>
        <?php if($type == 'background'): ?><li class="current tabli" id="tab0"><a href="<?php echo U('Attachment/index',array('type'=>'background'));?>">背景图</a></li><?php endif; ?>
        <?php if($type == 'music'): ?><li class="current tabli" id="tab0"><a href="<?php echo U('Attachment/index',array('type'=>'music'));?>">音乐</a></li><?php endif; ?>
        <?php
 }else{ ?>
        <li class="tabli" id="tab0"><a href="<?php echo U('Attachment/index',array('type'=>'icon'));?>">图标</a></li>
        <li class="tabli" id="tab0"><a href="<?php echo U('Attachment/index',array('type'=>'focus'));?>">幻灯片</a></li>
        <li class="tabli" id="tab0"><a href="<?php echo U('Attachment/index',array('type'=>'background'));?>">背景图</a></li>
        <li class="tabli" id="tab0"><a href="<?php echo U('Attachment/index',array('type'=>'music'));?>">音乐</a></li>
        <?php
 } ?>
        <li class="<?php if($type == 'my'): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Attachment/my',array('type'=>'my'));?>">我的素材</a></li>
    </ul>
</div>
<!--tab end-->
<div>
    <div>
        <?php
 if ($type!='my'){ ?>
        <div style="margin-bottom:10px;" class="form-inline"> <label for="">请选择类别：</label><div class="form-group"><select class="form-control"  onchange="changeFolder(this.value)"><?php if(is_array($folders)): $i = 0; $__LIST__ = $folders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i;?><option value="<?php echo ($f["folder"]); ?>" <?php if($f["folder"] == $folder): ?>selected<?php endif; ?>><?php echo ($f["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></div></div>
        <?php if($type != 'music'): ?><ul class="list-unstyled">
            <?php if(is_array($files)): $i = 0; $__LIST__ = $files;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li style="float:left;width:<?php echo ($height); ?>px;margin:1px;background:#ddd"><a href="###" onclick="returnHomepage('<?php echo ($siteUrl); ?>/Public/static/attachment/<?php echo ($type); ?>/<?php echo ($folder); ?>/<?php echo ($item); ?>')"><img style="width:<?php echo ($height); ?>px;height:<?php echo ($height); ?>px;" src="/Public/static/attachment/<?php echo ($type); ?>/<?php echo ($folder); ?>/<?php echo ($item); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php else: ?>
        <table class="table table-condensed table-bordered table-striped" border="0" cellSpacing="0" cellPadding="0" width="100%">
            <thead>
                <tr>
                    <th>播放</th>
                    <th>选择 <span class="tooltips" ><img src="/Public/User/images/price_help.png" align="absmiddle" /><span>
                        <p>点击歌名即可</p>
                    </span></span></th>
                </tr>
            </thead>
            <?php if(is_array($files)): $i = 0; $__LIST__ = $files;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr><td><a style="width:220px;float:left" class="audio {skin:'blue'}" href="<?php echo ($siteUrl); ?>/Public/static/attachment/<?php echo ($type); ?>/<?php echo ($folder); ?>/<?php echo ($item["file"]); ?>"><?php echo ($item["name"]); ?></a></td><td>&nbsp;&nbsp;<a href="###" onclick="returnHomepage('<?php echo ($siteUrl); ?>/Public/static/attachment/<?php echo ($type); ?>/<?php echo ($folder); ?>/<?php echo ($item["file"]); ?>')"><?php echo ($item["name"]); ?></a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table><?php endif; ?>
        <?php
 }else{ ?>
        <table class="table table-condensed table-bordered table-striped" border="0" cellSpacing="0" cellPadding="0" width="100%">
            <thead>
                <tr>
                    <th>文件</th>
                    <th>时间</th>
                    <th>选择</th>
                </tr>
            </thead>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr><td>
                <?php
 $classStr="audio {skin:'blue'}"; if (strpos($item['url'],'.mp3')){ echo '<a style="width:220px;float:left" class="'.$classStr.'" href="'.$item['url'].'">'.$item['name'].'</a>'; }else { echo '<img src="'.$item['url'].'" width="120" />'; } ?>
                </td><td><?php echo (date('Y-m-d',$item["time"])); ?></td><td>&nbsp;&nbsp;<a href="###" onclick="returnHomepage('<?php echo ($item["url"]); ?>')" class="btn btn-sm btn-warning"><i class="mdi-navigation-check"></i>选中</a>&nbsp;<a class="btn btn-sm btn-danger" href="<?php echo U('Attachment/delete',array('id'=>$item['id']));?>"><i class="mdi-action-delete"></i>删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <div class="footactions" style="padding-left:10px">
                <div class="pages"><?php echo ($page); ?></div>
            </div>
            <?php
 } ?>
        </div>
    </div>
    <div style="clear:both;height:30px;"></div>
    <script>
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