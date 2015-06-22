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
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
    <h4>添加多图文回复</h4>
    <div class=" form">
        <a class="btn btn-primary" href="<?php echo U('User/Img/listm',array('token'=>getToken()));?>"><i class="mdi-content-reply"></i>返回</a>
    </div>
    <div class="bg-warning tip">点击“添加图文消息”按钮来选择已经添加过的图文消息</div>
    <form method="post" action="<?php echo U('Img/multi',array('token'=>getToken()));?>">
        <div class=" form">
            <table class="table" >
                <tbody>
                    <tr>
                        <th>关键词</th>
                        <td><input type="text" id="title" name="title" value="" class="form-control" style="width:200px;" /></td>
                    </tr>
                    <tr>
                        <th valign="top"><label for="keyword">图文消息</label></th>
                        <td> <a href="###" onclick="addImgMessage()" class="btn btn-warning btn-sm">添加图文消息</a>&nbsp;&nbsp;<a href="###" onclick="clearMessage()" >清空重选</a>
                            <script>
                                                        function addImgMessage(){
                                                        art.dialog.data('titledom', 'titledom');
                                                        art.dialog.data('imgids', 'imgids');
                                                        art.dialog.data('multinews', 'multinews');
                                                        art.dialog.data('singlenews', 'singlenews');
                                                        art.dialog.data('js_appmsg_preview', 'js_appmsg_preview');
                                                        art.dialog.data('multione', 'multione');
                                                        art.dialog.open("<?php echo U('User/Message/img');?>",{lock:true,title:'选择图文消息',width:600,height:400,resize:true,yesText:'关闭',background: '#000',opacity: 0.45});
                                                        }
                                                        function clearMessage(){
                                                        document.getElementById('titledom').innerHTML='';
                                                        document.getElementById('imgids').value='';
                                                        document.getElementById('js_appmsg_preview').innerHTML='<div class="appmsg_info"><em class="appmsg_date"></em></div><div class="cover_appmsg_item" id="multione"></div>';
                                                        document.getElementById('multinews').style.display='none';
                                                        document.getElementById('singlenews').style.display='';
                                                        }
                            </script>
                            <style>
                                                        html, body {
                                                        /*position:relative;
                                                        height:100%;*/
                                                        color:#222;
                                                        font-family:Microsoft YaHei, Helvitica, Verdana, Tohoma, Arial, san-serif;
                                                        background-color:#ffffff;
                                                        margin:0;
                                                        padding: 0;
                                                        text-decoration: none;
                                                        }
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
                                                        body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, code, form, fieldset, legend, input, textarea, p, blockquote, th, td {
                                                        margin:0;
                                                        padding:0;
                                                        }
                                                        table {
                                                        border-collapse:collapse;
                                                        border-spacing:0;
                                                        }
                                                        .text img {
                                                        max-width: 100%;
                                                        }
                                                        fieldset, img {
                                                        border:0;
                                                        }
                                                        address, caption, cite, code, dfn, em, th, var {
                                                        font-style:normal;
                                                        font-weight:normal;
                                                        }
                                                        ol, ul {
                                                        list-style: none outside none;
                                                        margin:0;
                                                        padding: 0;
                                                        }
                                                        caption, th {
                                                        text-align:left;
                                                        }
                                                        a {
                                                        color:#000000;
                                                        text-decoration: none;
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
                                                        .clr {
                                                        display:block;
                                                        clear:both;
                                                        height:1px;
                                                        overflow:hidden;
                                                        }
                                                        /*文本*/
                                                        #iphone {
                                                        background:url(../images/iPhone-render.png) no-repeat 0 0;
                                                        height: 743px;
                                                        position:relative;
                                                        margin: 0 auto;
                                                        overflow:hidden;
                                                        width: 380px;
                                                        }
                                                        #iphone #activity-detail {
                                                        height: 414px;
                                                        left: 33px;
                                                        overflow: auto;
                                                        padding: 0;
                                                        position: absolute;
                                                        top: 197px;
                                                        width: 319px;
                                                        background:#EFEFEF;
                                                        }
                                                        #iphone .nickname {
                                                        color: #CCCCCC;
                                                        display: block;
                                                        font-weight: bold;
                                                        line-height: 45px;
                                                        position: absolute;
                                                        text-align: center;
                                                        text-shadow: 0 1px 3px #000000;
                                                        top: 152px;
                                                        left: 33px;
                                                        width: 320px;
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
                                                        .you .cloud {
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
                                                        border: 1px solid #7AA23F;
                                                        border-radius:5px;
                                                        -moz-border-radius:5px;
                                                        -webkit-border-radius:5px;
                                                        box-shadow: 0px 1px 3px #8DA254;
                                                        border:1px solid #73972a\9;
                                                        border-radius:6px\9;
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
                            <div class="chatPanel" style="width:280px;" id="singlenews">
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
                            <style>
                            .appmsg{position:relative;overflow:hidden;margin-bottom:20px;border:1px solid #d3d3d3;background-color:#fff;box-shadow:0 1px 0 rgba(0,0,0,0.1);-moz-box-shadow:0 1px 0 rgba(0,0,0,0.1);-webkit-box-shadow:0 1px 0 rgba(0,0,0,0.1);border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px}.appmsg_info{font-size:13px;line-height:20px;padding-bottom:6px}.appmsg_date{font-weight:400;font-style:normal}.appmsg_col-xs-9 col-sm-9  col-md-10 col-lg-10 {padding:0 14px;border-bottom:1px solid #d3d3d3;position:relative;*zoom:1}.appmsg_title{font-weight:400;font-style:normal;font-size:16px;padding-top:6px;line-height:28px;max-height:56px;overflow:hidden;white-space:pre-wrap;word-wrap:normal;word-break:normal}.appmsg_title a{display:block;color:#222}.appmsg_thumb_wrp{height:160px;overflow:hidden}.appmsg_thumb{width:100%}.appmsg_desc{padding:5px 0 10px;white-space:pre-wrap;word-wrap:normal;word-break:normal}.appmsg_opr{background-color:#f4f4f4}.appmsg_opr ul{overflow:hidden;*zoom:1}.appmsg_opr_item{float:left;line-height:44px;height:44px}.appmsg_opr_item a{display:block;border-right:1px solid #d3d3d3;box-shadow:1px 0 0 0 #fff;-moz-box-shadow:1px 0 0 0 #fff;-webkit-box-shadow:1px 0 0 0 #fff;text-align:center;line-height:20px;margin-top:12px}.appmsg_opr_item a.no_extra{border-right-width:0}.appmsg_item{*zoom:1;position:relative;padding:12px 14px;border-top:1px solid #d3d3d3}.appmsg_item:after{col-xs-9 col-sm-9  col-md-10 col-lg-10 :"\200B";display:block;height:0;clear:both}.appmsg_item .appmsg_title{line-height:24px;max-height:48px;overflow:hidden;*zoom:1;margin-top:14px}.appmsg_item .appmsg_thumb{float:right;width:78px;height:78px;margin-left:14px}.multi .appmsg_info{padding-top:4px;padding-left:14px;padding-right:14px}.multi .appmsg_col-xs-9 col-sm-9  col-md-10 col-lg-10 {padding:0}.multi .appmsg_title{font-size:14px;padding-top:0}.cover_appmsg_item{position:relative;margin:0 14px 14px}.cover_appmsg_item .appmsg_title{position:absolute;bottom:0;left:0;width:100%;background:rgba(0,0,0,0.6)!important;filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#99000000',endcolorstr = '#99000000')}.cover_appmsg_item .appmsg_title a{padding:0 4px;color:#fff}.appmsg_mask{display:none;position:absolute;top:0;left:0;width:100%;height:100%;background-color:#000;filter:alpha(opacity = 60);-moz-opacity:.6;-khtml-opacity:.6;opacity:.6;z-index:1}.appmsg .icon_appmsg_selected{display:none;position:absolute;top:50%;left:50%;margin-top:-30px;margin-left:-33px;line-height:999em;overflow:hidden;z-index:1}.dialog_wrp .appmsg:hover{cursor:pointer}.appmsg:hover .appmsg_mask{display:block}.appmsg.selected .appmsg_mask{display:block}.appmsg.selected .icon_appmsg_selected{display:inline-block}.icon_appmsg_selected{background:transparent url(/mpres/htmledition/images/icon/media/icon_appmsg_selected1ccaec.png) no-repeat 0 0;width:75px;height:60px;vertical-align:middle;display:inline-block}.appmsg_thumb.default{display:block;color:#c0c0c0;text-align:center;line-height:160px;font-weight:400;font-style:normal;background-color:#ececec;font-size:22px}.appmsg_item .appmsg_thumb.default{line-height:78px;font-size:16px}.appmsg_edit_mask{display:none;position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(229,229,229,0.85)!important;filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#d9e5e5e5',endcolorstr = '#d9e5e5e5');text-align:center}.appmsg_item .appmsg_edit_mask{line-height:102px}.cover_appmsg_item .appmsg_edit_mask{line-height:160px}.appmsg_edit_mask a{margin-left:8px;margin-right:8px}.editing .cover_appmsg_item:hover .appmsg_edit_mask,.editing .appmsg_item:hover .appmsg_edit_mask{display:block}.editing .appmsg_thumb{display:none}.editing .appmsg_thumb.default{display:block}.editing .has_thumb .appmsg_thumb{display:block}.editing .has_thumb .appmsg_thumb.default{display:none}.editing .appmsg_col-xs-9 col-sm-9  col-md-10 col-lg-10 {box-shadow:none;-moz-box-shadow:none;-webkit-box-shadow:none;border-bottom-width:0}.editing.multi .appmsg_col-xs-9 col-sm-9  col-md-10 col-lg-10 {border-bottom-width:1px}.appmsg_add{text-align:center;padding:12px 14px;line-height:72px}.appmsg_add a{display:block;font-size:0;text-decoration:none;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;border:3px dotted #b8b8b8;height:72px}.appmsg_add a i{*vertical-align:baseline}.tab_col-xs-9 col-sm-9  col-md-10 col-lg-10  .appmsg{width:320px}.appmsg_list{text-align:justify;text-justify:distribute-all-lines;text-align-last:justify;font-size:0;padding-top:38px;margin:0 46px;letter-spacing:-4px}.appmsg_list:after{display:inline-block;width:100%;height:0;font-size:0;margin:0;padding:0;overflow:hidden;col-xs-9 col-sm-9  col-md-10 col-lg-10 :"."}.appmsg_col{display:inline-block;*display:inline;*zoom:1;vertical-align:top;width:48%;font-size:14px;text-align:left;font-size:14px;letter-spacing:normal}.media_dialog.appmsg_list{position:relative;padding:28px 140px;height:340px;margin-bottom:0;overflow-y:scroll}.page_appmsg_edit .tool_area{clear:both;margin:0;padding:20px 0}.page_appmsg_edit .tool_bar{margin-left:0;margin-right:0}.page_appmsg_edit .appmsg{min-height:180px}.page_appmsg_edit .upload_file_box{top:22px;left:-12px;width:377px;border-color:#d3d3d3;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0}.page_appmsg_edit .upload_preview img{max-width:100px;max-height:100px}.media_preview_area{float:left;width:320px;margin-right:14px}.media_edit_area{display:table-cell;vertical-align:top;float:none;width:auto;*display:block;*zoom:1}.media_edit_area:after{col-xs-9 col-sm-9  col-md-10 col-lg-10 :" . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . ";visibility:hidden;clear:both;height:0!important;display:block;line-height:0}.edui_editor_wrp{position:relative;z-index:0}.appmsg_edit_item{padding-bottom:1em}.editor_extra_info{text-align:right;padding-top:6px}.editor_extra_info a{color:#a3a3a3}.editor_extra_info a:hover{color:#2e7dc6}
                            </style>
                            <div class="media_preview_area" id="multinews" style="display:none">
                                <div class="appmsg multi editing">
                                    <div id="js_appmsg_preview" class="appmsg_col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
                                        <div id="appmsgItem1" data-fileid="" data-id="1" class="js_appmsg_item ">
                                            <div class="appmsg_info">
                                                <em class="appmsg_date"></em>
                                            </div>
                                            <div class="cover_appmsg_item" id="multione"></div>
                                        </div>
                                    </div></div>
                                </div>
                                <div style="clear:both"></div>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <th>
                            </th>
                            <td><button type="submit" name="button" class="btn btn-primary"><i class="mdi-content-save"></i>保存</button>　<a href="javascript:history.go(-1);" class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a></td>
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