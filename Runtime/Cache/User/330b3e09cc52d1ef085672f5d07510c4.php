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
        <link href="/Public/User/css/new.css?v=1.0.0" type="text/css" rel="stylesheet">
        <script src="/Public/static/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
                            (function(){
                                window.GOORAYE = {};
                                window.GOORAYE.IndexURL = "";
                            })(window);
        </script>
    </head>
    <body class='container-fluid row'>
        <div class="navbar navbar-inverse top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo U('User/Index/index');?>">
                <img  src="/Public/User/images/logo.png" alt="LOGO">
                </a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav navbar-right h3">
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="avator" src="<?php echo ($wecha["headerpic"]); ?>">
                        <span><?php echo ($wecha["wxname"]); ?> （<?php echo (session('uname')); ?>）</span>
                        <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu" >
                            <li><a href="<?php echo U('User/Index/index');?>" ><i class="mdi-action-swap-horiz"></i>切换公众号</a>
                                <li><a href="<?php echo U('User/Index/useredit');?>" ><i class="mdi-communication-vpn-key"></i>修改密码</a>
                                </li>
                            </li>
                        </ul>
                    </li>
                    <li><a class="logout" title="退出系统" href="<?php echo U('User/Index/logout');?>" ><i class="mdi-action-exit-to-app"></i></a></li>
                </ul>
            </div>
        </div>
        <!--左侧功能菜单-->
        <div  class="gr tabmenu col-xs-12 col-sm-3  col-md-2 col-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">功能模块</div>
                <div class="panel-body">
                    <?php echo ($menuhtml); ?>
                </div>
            </div>
        </div>
        <!--左侧功能菜单 END-->
<!-- <link rel="stylesheet" type="text/css" href="/Public/User/css/cymain.css" /> -->
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
    <div class="righttitle"><h4>群发信息</h4></div>
    <div class=" form">
          <ul id="tags" class="nav nav-tabs" style="width:100%">
            <li >
                <a href="<?php echo U('User/Message/index');?>">发送消息（通过群发接口）</a>
            </li>
            <li class="active" role="presentation">
                <a href="<?php echo U('User/Message/index2');?>">发送消息（通过客服接口）</a>
            </li>
            <li>
                <a href="<?php echo U('User/Message/sendHistory');?>">发送记录</a>
            </li>
            <li>
                <a href="<?php echo U('User/Message/help');?>">帮助说明</a>
            </li>
            <div class="clearfix" style="height:1px;background:#eee;margin-bottom:20px;"></div>
        </ul>
    </div>
    <div class="bg-warning tip" style="margin:25px auto 5px auto;height:73px;">多媒体上传限制：图片最大128K，支持JPG格式；语音最大256K，播放长度不超过60s，支持AMR\MP3格式；视频（video）最大1MB，支持MP4格式；媒体文件在后台保存时间为3天，3天后将失效。 </div>
    <form method="post" action="<?php echo U('Message/index');?>">
        <div class=" form">
            <table class="table" >
                <tbody>
                    <tr>
                        <th>消息类型</th>
                        <td>
                            <select class="form-control"  name="msgtype">
                                <option value="text">文字消息</option>
                                <option value="image">图片消息</option>
                                <option value="voice">语音消息</option>
                                <option value="video">视频消息</option>
                                <option value="music" style="display:none">音乐消息</option>
                                <option value="news">图文消息</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>标题</th>
                        <td><input type="text" id="title" name="title" value="<?php echo ($info["title"]); ?>" class="form-control" style="width:200px;" /> 仅发送视频的时候填写</td>
                    </tr>
                    <tr>
                        <th>媒体文件</th>
                        <td><input type="input" class="form-control" id="media" name="mediasrc" style="width:250px"> <script src="/Public/static/gfile.js"></script><a href="###" onclick="chooseFile('media','background')" class="btn btn-warning btn-sm"><i class="mdi-toggle-check-box"></i>选择</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="gfilePicUpload('media',1500,1000,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> 仅发送图片消息、语音消息或视频消息的时候填写</td>
                    </tr>
                    <tr>
                        <th><span class="red"></span>文本消息/简介</th>
                        <td><textarea name="text" class="form-control" style="width:500px;height:120px;"></textarea><br />发送文本消息的时候作为文本内容，视频消息的时候作为视频简介</td>
                    </tr>
                    <tr>
                        <th valign="top"><label for="keyword">图文消息</label></th>
                        <td>
                            <script>
                            function addImgMessage(){
                            art.dialog.data('titledom', 'titledom');
                            art.dialog.data('imgids', 'imgids');

                            art.dialog.open("<?php echo U('User/Message/img');?>",{lock:true,title:'选择图文消息',width:600,height:400,resize:true,yesText:'关闭',background: '#000',opacity: 0.45});
                            }
                            function clearMessage(){
                            document.getElementById('titledom').innerHTML='';
                            document.getElementById('imgids').value='';
                            }
                            </script>

                            <style>
                          
                            body >.tips {
                            position:fixed;
                            display:none;
                            top:50%;
                            left:50%;
                            z-index:100;
                            text-align:center;
                            padding:20px;
                            width:200px;
                            }
                            .text img {
                            max-width: 100%;
                            }
                            fieldset, img {
                            border:0;
                            }
                            .left {
                            float:left
                            }
                            .right {
                            float:right
                            }
                            #activity-detail {
                            padding:15px 15px 0;
                            background:#EFEFEF;
                            }
                            
                            #news-render {
                            }
                            #news-text {
                            }
                            .keywordtext {
                            background-color: #F3F1DA;
                            height: 366px;
                            overflow: auto;
                            padding: 0;
                            width: 319px;
                            left: 33px;
                            top: 197px;
                            position: absolute;
                            }
                            .keywordtext .me {
                            margin-top:30px
                            }
                            .you {
                            float:left;
                            width:100%; /*ie6 hack*/
                            _background:none;
                            _border:none;
                            }
                            .me {
                            float:right;
                            width:100%;
                            }
                            .chatItemcol-xs-9 col-sm-9  col-md-10 col-lg-10  {
                            cursor:pointer;
                            }
                            .cloudPannel {
                            position: relative;
                            _position:static;
                            }
                            .chatItem {
                            padding:4px 0px 10px 0px;
                            _background:none;
                            _border:none;
                            }
                            .chatItem .avatar {
                            width:38px;
                            height:38px;
                            border:1px solid #ccc\9;
                            border: 1px solid #CCCCCC;
                            box-shadow: 0 1px 3px #D3D4D5;
                            border-radius:5px;
                            -moz-border-radius:5px;
                            -webkit-border-radius:5px;
                            }
                            .chatItem .cloud {
                            max-width:240px; /*border-radius:11px; border-width:1px; border-style:solid; */
                            cursor:default;
                            position: static;
                            }
                            .chatItem .cloud {/*for ie*/
                            /*position: relative;*/
                            padding: 0px;
                            margin: 0px;
                            }
                            .me .avatar {
                            float:right;
                            }
                            .me .cloud { /*position:relative;*/
                            float:right;
                            min-width:50px;
                            max-width:200px;
                            margin:0 15px 0 0;
                            }
                            .chatItem .cloudcol-xs-9 col-sm-9  col-md-10 col-lg-10  { /* position:relative;for ie*/
                            text-align:left; /*padding:2px; line-height:1.2; */
                            font-weight:normal;
                            font-size:16px;
                            min-height:20px;
                            word-wrap:break-word;
                            }
                            .me .cloudText .cloudBody {
                            -moz-border-top-colors:none;
                            -moz-border-right-colors:none;
                            -moz-border-bottom-colors:none;
                            -moz-border-left-colors:none;
                            border-color:transparent;
                            border:1px solid #AFAFAF;
                            border-radius:5px;
                            -moz-border-radius:5px;
                            -webkit-border-radius:5px;
                            box-shadow: 0px 1px 3px #D5D5D5;
                            border:1px solid #9f9f9f\9;
                            background:#ECECEC\9;
                            border-radius:6px\9;
                            margin-left:8px;
                            }
                            .me .cloudcol-xs-9 col-sm-9  col-md-10 col-lg-10  {
                            border:1px solid #eee\9;
                            border-top:1px solid #FFF;
                            border-bottom:1px solid #F2F2F2;
                            padding:13px\9;
                            border-radius:13px\9;
                            border-radius:4px;
                            -moz-border-radius:4px;
                            -webkit-border-radius:4px;
                            overflow:hidden;
                            color:#000;
                            text-shadow:none;
                            background-color:#ECECEC;
                            background:-webkit-gradient(linear,  left top, left bottom,  from(#F4F4F4), to(#E5E5E5),  color-stop(0.1, #F3F3F3), color-stop(0.3, #F1F1F1), color-stop(0.5, #ECECEC), color-stop(0.7, #E9E9E9), color-stop(0.9, #E6E6E6), color-stop(1.0, #E5E5E5));
                            background-image:-moz-linear-gradient(top, #F3F3F3 10%, #F1F1F1 30%, #ECECEC 50%, #E9E9E9 70%, #E6E6E6 90%, #E5E5E5 100%);
                            }/*.cloudText*/
                            .me .cloudText .cloudArrow {
                            position: absolute;
                            right: -10px;
                            top: 11px;
                            width: 13px;
                            height: 24px;
                            background: url(../images/bubble_right.png) no-repeat;
                            }
                            .me .cloudText .cloudcol-xs-9 col-sm-9  col-md-10 col-lg-10  {
                            background-color:#E5E5E5;
                            vertical-align: top;
                            padding:7px 10px;
                            background-color:#ECECEC\9;
                            }
                            .you .avatar {
                            float:left;
                            }
                            .you .cloud { /*position:relative;8.3*/
                            float:left;
                            min-width:50px;
                            max-width:200px;
                            margin:0 0 0 15px;
                            }
                            .you .cloudText .cloudBody {
                            -moz-border-top-colors:none;
                            -moz-border-right-colors:none;
                            -moz-border-bottom-colors:none;
                            -moz-border-left-colors:none;
                            border-color:transparent;
                            /*border-style:solid;
                            border-width:1px;
                            border-color:#7B9F45 #7B9F45 #7B9F45 #7B9F45;*/
                            border: 1px solid #7AA23F;
                            border-radius:5px;
                            -moz-border-radius:5px;
                            -webkit-border-radius:5px;
                            box-shadow: 0px 1px 3px #8DA254;
                            border:1px solid #73972a\9;
                            border-radius:6px\9;
                            /*background-color:#A1D251;

                            background:-webkit-gradient(linear, left top,left bottom, from(#C2DE8E),to(#8EBF3A),
                            color-stop(0.1,#BFDC89),color-stop(0.2,#B7D978),color-stop(0.3,#B3D870),
                            color-stop(0.4,#A8D45D),color-stop(0.5,#A2D254),color-stop(0.6,#9DCE4C),
                            color-stop(0.7,#96C742),color-stop(0.8,#92C23E),color-stop(0.9,#8FBF3B),color-stop(1.0,#8EBF3A));
                            background-image:-moz-linear-gradient(top, #C2DE8E 0%, #BFDC89 10%, #B7D978 20%, #B3D870 30%, #A8D45D 40%, #A2D254 50%, #9DCE4C 60%, #96C742 70%, #92C23E 80%, #8FBF3B 90%, #8EBF3A 100%);*/
                            background-color: #AEDC43;
                            }
                            .you .cloudText .cloudcol-xs-9 col-sm-9  col-md-10 col-lg-10  {
                            padding:5px 13px\9;
                            border-radius:13px\9;
                            border-radius:5px;
                            -moz-border-radius:5px;
                            -webkit-border-radius:5px;
                            padding:7px 10px;
                            text-shadow:none;
                            color:#030303;
                            /*border-top:1px solid #E3EFC9;
                            border-bottom:1px solid #8EBF3A;
                            border-right:1px solid #A4D257;
                            background-color:#C0DC85\9;*/
                            border-top: 1px solid #DCE6C8;
                            border-bottom: 1px solid #B9CF8B;
                            border-right: 1px solid #CCDEA3;
                            }
                            .you .cloudText .cloudArrow {
                            position: absolute;
                            left: -6px;
                            top: 11px;
                            width: 13px;
                            height: 24px;
                            background: url(../images/bubble_left.png) no-repeat;
                            }
                            /*单条多条图文*/
                            .chatPanel .media a {
                            display:block;
                            }
                            .chatPanel .media {
                            border:1px solid #cdcdcd;
                            box-shadow:0 3px 6px #999999;
                            -webkit-border-radius:12px;
                            -moz-border-radius:12px;
                            border-radius:12px;
                            width:285px;
                            background-color:#FFFFFF;
                            background:-webkit-gradient(linear,  left top, left bottom,  from(#FFFFFF), to(#FFFFFF));
                            background-image:-moz-linear-gradient(top, #FFFFFF 0%, #FFFFFF 100%);
                            margin:0px auto;
                            }
                            .chatPanel .media .mediaPanel {
                            padding:0px;
                            margin:0px;
                            }
                            .chatPanel .media .mediaImg {
                            margin: 25px 15px 15px;
                            width: 255px;
                            position: relative;
                            }
                            .chatPanel .media .mediaImg .mediaImgPanel {
                            position:relative;
                            padding:0px;
                            margin:0px;
                            max-height:164px;
                            overflow:hidden;
                            }
                            .chatPanel .media .mediaImg img {
                            /* width:100%;
                            height:164px;
                            position:absolute;
                            left:0px;*/
                            width:255px;
                            }
                            .chatPanel .media .mediaImg .mediaImgFooter {
                            position: absolute;
                            bottom: 0;
                            height:29px;
                            background-color:#000;
                            background-color:rgba(0, 0, 0, 0.4);
                            text-shadow:none;
                            color:#FFF;
                            text-align:left;
                            padding:0px 11px;
                            line-height:29px;
                            width:233px;
                            }
                            .chatPanel .media .mediaImg .mediaImgFooter a:hover p {
                            color:#B8B3B3;
                            }
                            .chatPanel .media .mediaImg .mediaImgFooter .mesgTitleTitle {
                            line-height:28px;
                            color:#FFF;
                            max-width:240px;
                            height:26px;
                            white-space:nowrap;
                            text-overflow:ellipsis;
                            -o-text-overflow:ellipsis;
                            overflow:hidden;
                            width: 240px;
                            }
                            .chatPanel .media .mesgIcon {
                            display:inline-block;
                            height:19px;
                            width:13px;
                            margin:8px 0px -2px 4px;
                            background:url(../images/mesgIcon.png) no-repeat;
                            }
                            .chatPanel .media .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  {
                            margin:0px;
                            padding:0px;
                            }
                            .chatPanel .media .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  .mediaMesg {
                            border-top:1px solid #D7D7D7;
                            padding:10px;
                            }
                            .chatPanel .media .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  .mediaMesg .mediaMesgDot {
                            display: block;
                            position:relative;
                            top: -3px;
                            left:20px;
                            height:6px;
                            width:6px;
                            -moz-border-radius: 3px;
                            -webkit-border-radius: 3px;
                            border-radius: 3px;
                            }
                            .chatPanel .media .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  .mediaMesg .mediaMesgTitle:hover p {
                            color:#1A1717;
                            }
                            .chatPanel .media .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  .mediaMesg .mediaMesgTitle a {
                            color:#707577;
                            }
                            .chatPanel .media .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  .mediaMesg .mediaMesgTitle a:hover p {
                            color:#444440;
                            }
                            .chatPanel .media .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  .mediaMesg .mediaMesgIcon {
                            }
                            .chatPanel .media .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  .mediaMesg .mediaMesgTitle p {
                            line-height:1.5em;
                            max-height: 45px;
                            max-width: 220px;
                            min-width:176px;
                            margin-top:2px;
                            color:#5D6265;
                            text-overflow:ellipsis;
                            -o-text-overflow:ellipsis;
                            overflow:hidden;
                            text-align: left;
                            text-overflow:ellipsis;
                            }
                            .chatPanel .media .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  .mediaMesg .mediaMesgIcon img {
                            height:45px;
                            width:45px;
                            }
                            /*media mesg detail*/
                            .chatPanel .media .mediaHead {
                            /*height:48px;*/
                            padding:0px 15px 4px;
                            border-bottom:0px solid #D3D8DC;
                            color:#000000;
                            font-size:20px;
                            }
                            .chatPanel .media .mediaHead .title {
                            line-height:1.2em;
                            margin-top: 22px;
                            display:block;
                            max-width:312px;
                            text-align: left;/*height:25px;
                            white-space:nowrap;
                            text-overflow:ellipsis;
                            -o-text-overflow:ellipsis;
                            overflow:hidden;*/
                            }
                            .chatPanel .mediaFullText .mediaImg {
                            width:255px;
                            padding:0;
                            margin:0 15px;
                            overflow:hidden;
                            max-height:164px;
                            }
                            .chatPanel .mediaFullText .mediaImg img {
                            /*margin-top:17px;
                            position:absolute;*/
                            }
                            .chatPanel .mediaFullText .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  {
                            padding:0 0 15px;
                            font-size:16px;
                            line-height: 1.5em;
                            text-align:left;
                            color:#222222;
                            }
                            .chatPanel .mediaFullText .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10 P {
                            margin:12px 15px 0px;
                            border-bottom:1px solid #D3D8DC;
                            }
                            .chatPanel .media .mediaHead .time {
                            margin:0px;
                            margin-top: 21px;
                            color:#8C8C8C;
                            background:none;
                            width:auto;
                            font-size:12px;
                            }
                            .chatPanel .media .mediaFooter {
                            -webkit-border-radius:0px 0px 12px 12px;
                            -moz-border-radius:0px 0px 12px 12px;
                            border-radius:0px 0px 12px 12px;
                            padding: 0 15px;
                            }
                            .chatPanel .media .mediaFooter a {
                            color:#222222;
                            font-size:16px;
                            padding:0;
                            }
                            .chatPanel .media .mediaFooter .mesgIcon {
                            margin:15px 3px 0px 0px;
                            }
                            .chatPanel .media a:hover {
                            cursor: pointer;
                            }
                            .chatPanel .media a:hover .mesgIcon {
                            }
                            .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  a:hover {
                            background-color: #F6F6F6;
                            }
                            .mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  .last:hover {
                            -webkit-border-radius:0px 0px 12px 12px;
                            -moz-border-radius:0px 0px 12px 12px;
                            border-radius:0px 0px 12px 12px;
                            background-color: #F6F6F6;
                            }
                            .mediaFullText:hover {
                            background-color: #F6F6F6;
                            background:-webkit-gradient(linear,  left top, left bottom,  from(#F6F6F6), to(#F6F6F6));
                            background-image:-moz-linear-gradient(top, #F6F6F6 0%, #F6F6F6 100%);
                            }
                            </style>
                            <div class="chatPanel" style="width:280px;">
                                <div un="item_1741035" class="chatItem you">
                                    <a target="ddd" href="###">
                                    <div class="media mediaFullText" id="titledom">
                                        <div class="mediaPanel">
                                            <div class="mediaHead"><span class="title" id="zbt">图文消息标题</span><span class="time"><?php echo date('Y-m-d',time());?></span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="mediaImg"><img id="suicaipic1" src="/Public/static/message/oid.jpg"></div>
                                            <div class="mediacol-xs-9 col-sm-9  col-md-10 col-lg-10  mediacol-xs-9 col-sm-9  col-md-10 col-lg-10 P">
                                                <p id="zinfo">消息简介</p>
                                            </div>
                                            <div class="mediaFooter">
                                                <span class="mesgIcon right"></span><span style="line-height:50px;" >查看全文</span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div style="clear:both"></div>
                            <input type="hidden" class="form-control" id="imgids" value="" name="imgids" style="width:300px" >  <br>
                            <a href="###" onclick="addImgMessage()" class="btn btn-warning btn-sm">选择图文消息</a>&nbsp;&nbsp;<a style="display:none" href="###" onclick="clearMessage()" class="a_clear btn btn-warning btn-sm">清空重选</a>

                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><button type="submit" name="button" class="btn btn-primary">发送</button>　<a href="javascript:history.go(-1);" class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </form>

</div>
<div class="IndexFoot" style="clear:both">
    <div class="foot" style="padding-top:20px;">
        <div id="copyright" >
            杭州博也网络科技有限公司<br/>
            Copyright&copy;2013-<?php echo date('Y',time());?><br/>
            <a href="http://www.miibeian.gov.cn" target="_blank" style="color:white"><?php echo C('ipc');?></a>
        </div>
        <div class="ewm2">
            <a target="_blank" href="/Public/User/images/ewm.jpg" title=" 杭州博也网络科技官方微信服务号"><img src="/Public/User/images/ewm.jpg" width="150px" height="150px"></a>
        </div>
        <div class="foot_page"  style="color:white;">
            <i class="mdi-communication-email"></i>：hzboye@163.com<br/>
            <i class="mdi-maps-local-phone" style="width:16px;"></i>：0571-88172520，<i class="mdi-hardware-phone-iphone" style="font-size: 1.6em;"></i>：13484379290<br/>
            <i class="mdi-communication-chat"  style="width:16px;"></i>：
            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($cfg_qq); ?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo ($cfg_qq); ?>:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
            &nbsp;
            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=346551990&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:346551990:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
            <br/>
        </div>
    </div>
</div>
<div style="display:none;clear:both">
    <?php echo base64_decode(C('countsz'));?>
</div>
<!-- Topbg END -->
<!-- 底部脚本区 -->
<script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/static/bootstrap/material-design/js/ripples.min.js"></script>
<script src="/Public/static/bootstrap/material-design/js/material.min.js"></script>
<script src="/Public/User/js/bottom.js"></script>
<script>
                    $(function() {
                        	$.material.init();
                        	//左侧导航
			
                    });
</script>
</body>
</html>