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
<link rel="stylesheet" type="text/css" href="/Public/static/default_user_com.css" media="all">
<script src="/Public/User/js/select/js/comm.js"></script>
<script src="/Public/User/js/select/js/linkagesel-min.js"></script>
<script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>

<style>

  .maroon{ color: red;
  }
</style>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">

<link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>

<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<div class="tab">
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if(ACTION_NAME == 'index' OR ACTION_NAME == 'carbrand'): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Car/index',array('token'=>$token));?>">品牌管理</a></li>
<li class="<?php if(ACTION_NAME == 'series' OR ACTION_NAME == 'addseries'): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Car/series',array('token'=>$token));?>">车系管理</a></li>
<li class="<?php if(ACTION_NAME == 'carmodel' OR ACTION_NAME == 'add_carmodel'): ?>current<?php endif; ?> tabli" id="tab3"><a href="<?php echo U('Car/carmodel',array('token'=>$token));?>">车型管理</a></li>
<li class="<?php if(ACTION_NAME == 'salers' OR ACTION_NAME == 'add_saler'): ?>current<?php endif; ?> tabli" id="tab4"><a href="<?php echo U('Car/salers',array('token'=>$token));?>">销售管理</a></li>
<li class="<?php if(ACTION_NAME == 'reservation' OR ACTION_NAME == 'res_edit' OR ACTION_NAME == 'res_manage'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Car/reservation',array('token'=>$token));?>">预约管理</a></li>
<li class="<?php if(ACTION_NAME == 'carowner'): ?>current<?php endif; ?> tabli" id="tab6"><a href="<?php echo U('Car/carowner',array('token'=>$token));?>">车主关怀</a></li>
<li class="<?php if(ACTION_NAME == 'utility'): ?>current<?php endif; ?> tabli" id="tab7"><a href="<?php echo U('Car/utility',array('token'=>$token));?>">实用工具</a></li>
<li class="<?php if(ACTION_NAME == 'carnews'): ?>current<?php endif; ?> tabli" id="tab8"><a href="<?php echo U('Car/carnews',array('token'=>$token));?>">汽车文章</a></li>
<li class="<?php if(ACTION_NAME == 'carset'): ?>current<?php endif; ?> tabli" id="tab8"><a href="<?php echo U('Car/carset',array('token'=>$token));?>">回复设置</a></li>
<li class="<?php if(ACTION_NAME == 'caronwers'): ?>current<?php endif; ?> tabli" id="tab8"><a href="<?php echo U('Car/caronwers',array('token'=>$token));?>">车主</a></li>
</ul>
</div>
<div class="righttitle">
  <h4>汽车回复配置</h4><!--a href="javascript:history.go(-1);return false;" class="btn btn-primary" data-top>返回</a-->
 </div>
 <!--tab start-->

<!--tab end-->
    <div class=" bgfc" style="margin-top:10px;">
      <form class="form" method="post" action="" target="_top" enctype="multipart/form-data"><table class="table" ><tbody>
                <tr>
                    <th width="120">触发关键词：</th>
                    <td> <input type="text" name="keyword" id="keyword"  class="form-control" schoolSet data-rule-maxlength="60" value="<?php echo ((isset($carset['keyword']) && ($carset['keyword'] !== ""))?($carset['keyword']):'汽车'); ?>"/>
                    <span class="maroon">*</span>
                    <span class="help-inline">如：汽车 或者 微汽车</span>
                    </td>
                </tr>
                <tr>
                    <th width="120">图文标题：</th>
                    <td>
                         <input type="text" name="title" id="title" value="<?php echo ($carset['title']); ?>" class="form-control" />
                         <span class="maroon">* 图文封面标题</span>
                     </td>
                </tr>

                 <tr>
                    <th width="120">标题图片：</th>
                    <td>
                     <p>
                         <img class="thumb_img" id="head_url_src" src="<?php echo ((isset($carset['head_url']) && ($carset['head_url'] !== ""))?($carset['head_url']):'/Public/User/images/car/car_title.jpg'); ?>"  style="max-height:100px;">
                         <input type="input" class="form-control" id="head_url" value="<?php echo ((isset($carset['head_url']) && ($carset['head_url'] !== ""))?($carset['head_url']):'/Public/User/images/car/car_title.jpg'); ?>"  name="head_url" >

                         <span class="help-inline">
                              <script src="/Public/static/gfile.js"></script><a href="###" onclick="gfilePicUpload('head_url',365,158,'<?php echo ($token); ?>')" class="btn btn-warning"><i class="mdi-file-file-upload"></i>上传</a> <a class="btn btn-warning btn-sm" href="###" onclick="viewImg('head_url')"><i class="mdi-action-pageview"></i>预览</a>
                              <span class="help-inline">建议图片尺寸365*158，图片大小不超过300K</span>
                         </span>
                     </p>
                    </td>
                </tr>
                <tr>
                    <th width="120">图文外链:</th>
                    <td>
                      <input type="text" name="url" id="url" value="<?php echo ($carset['url']); ?>" class="form-control" schoolSet />
                    <span class="help-block"><font color='red'>请在输入框左侧选择或这里填写网址(例如：http://baidu.com，必须有http://)</font></span>
                    </td>
                </tr>

                 <tr>
                    <th width="120">经销车型</th>
                    <td>
                         <input type="text" name="title1" id="title1" value="<?php echo ((isset($carset['title1']) && ($carset['title1'] !== ""))?($carset['title1']):'经销车型'); ?>" class="form-control" />
                         <span class="maroon">* 如 经销车型</span>
                     </td>
                </tr>
                <tr>
                    <th width="120">经销车型图片：</th>
                    <td>
                     <p>
                         <img class="thumb_img" id="head_url_1_src" src="<?php echo ((isset($carset['head_url_1']) && ($carset['head_url_1'] !== ""))?($carset['head_url_1']):'/Public/User/images/car/car_jx.jpg'); ?>" style="max-height:100px;">
                         <input type="input" class="form-control" id="head_url_1" value="<?php echo ((isset($carset['head_url_1']) && ($carset['head_url_1'] !== ""))?($carset['head_url_1']):'/Public/User/images/car/car_jx.jpg'); ?>" name="head_url_1" >

                         <span class="help-inline">
                              <a href="###" onclick="gfilePicUpload('head_url_1',365,158,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('head_url_1')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
                              <span class="help-inline">建议图片尺寸365*158，图片大小不超过100K</span>
                         </span>
                     </p>
                    </td>
                </tr>
                 <tr>
                    <th width="120">经销车型图文外链:</th>
                    <td>
                      <input type="url1" name="url1" id="url1" value="<?php echo ($carset['url1']); ?>" class="form-control" />
                    <span class="help-block">不清楚可以留空</span>
                    </td>
                </tr>
                 <tr>
                    <th width="120">销售顾问:</th>
                    <td>
                         <input type="text" name="title2" id="title2" value="<?php echo ((isset($carset['title2']) && ($carset['title2'] !== ""))?($carset['title2']):'销售顾问'); ?>" class="form-control" />
                         <span class="maroon">* 如 销售顾问</span>
                     </td>
                </tr>
                <tr>
                    <th width="120">销售顾问图片：</th>
                    <td>
                     <p>
                         <img class="thumb_img" id="head_url_2_src" src="<?php echo ((isset($carset['head_url_2']) && ($carset['head_url_2'] !== ""))?($carset['head_url_2']):'/Public/User/images/car/car_yuyue.jpg'); ?>" style="max-height:100px;">
                         <input type="input" class="form-control" id="head_url_2" value="<?php echo ((isset($carset['head_url_2']) && ($carset['head_url_2'] !== ""))?($carset['head_url_2']):'/Public/User/images/car/car_yuyue.jpg'); ?>" name="head_url_2" >

                         <span class="help-inline">
                              <a href="###" onclick="gfilePicUpload('head_url_2',365,158,'<?php echo ($token); ?>')" class="  btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('head_url_2')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
                              <span class="help-inline">建议图片尺寸365*158，图片大小不超过100K</span>
                         </span>
                     </p>
                    </td>
                </tr>
                 <tr>
                    <th width="120">销售顾问图文外链:</th>
                    <td>
                      <input type="text" name="url2" id="url2" value="<?php echo ($carset['url2']); ?>" class="form-control" />
                    <span class="help-block">不清楚可以留空</span>
                    </td>
                </tr>

                 <tr>
                    <th width="120">在线预约:</th>
                    <td>
                         <input type="text" name="title3" id="title3" value="<?php echo ((isset($carset['title3']) && ($carset['title3'] !== ""))?($carset['title3']):'在线预约'); ?>" class="form-control" />
                         <span class="maroon">* 如 在线预约</span>
                     </td>
                </tr>
                <tr>
                    <th width="120">在线预约题图片：</th>
                    <td>
                     <p>
                         <img class="thumb_img" id="head_url_3_src" src="<?php echo ((isset($carset['head_url_3']) && ($carset['head_url_3'] !== ""))?($carset['head_url_3']):'/Public/User/images/car/car_yuyue.jpg'); ?>" style="max-height:100px;">
                         <input type="input" class="form-control" id="head_url_3" value="<?php echo ((isset($carset['head_url_3']) && ($carset['head_url_3'] !== ""))?($carset['head_url_3']):'/Public/User/images/car/car_yuyue.jpg'); ?>" name="head_url_3" >

                         <span class="help-inline">
                              <a href="###" onclick="gfilePicUpload('head_url_3',365,158,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('head_url_3')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
                              <span class="help-inline">建议图片尺寸365*158，图片大小不超过100K</span>
                         </span>
                     </p>
                    </td>
                </tr>
                 <tr>
                    <th width="120">在线预约图文外链:</th>
                    <td>
                      <input type="text" name="url3" id="url3" value="<?php echo ($carset['url3']); ?>" class="form-control" />
                    <span class="help-block">不清楚可以留空</span>
                    </td>
                </tr>

                 <tr>
                    <th width="120">车主关怀：</th>
                    <td>
                         <input type="text" name="title4" id="title4" value="<?php echo ((isset($carset['title4']) && ($carset['title4'] !== ""))?($carset['title4']):'车主关怀'); ?>" class="form-control" />
                         <span class="maroon">* 如 车主关怀</span>
                     </td>
                </tr>
                <tr>
                    <th width="120">车主关怀图片：</th>
                    <td>
                     <p>
                         <img class="thumb_img" id="head_url_4_src" src="<?php echo ((isset($carset['head_url_4']) && ($carset['head_url_4'] !== ""))?($carset['head_url_4']):'/Public/User/images/car/carowner.png'); ?>" style="max-height:100px;">
                         <input type="input" class="form-control" id="head_url_4" value="<?php echo ((isset($carset['head_url_4']) && ($carset['head_url_4'] !== ""))?($carset['head_url_4']):'/Public/User/images/car/carowner.png'); ?>" name="head_url_4" >

                         <span class="help-inline">
                              <a href="###" onclick="gfilePicUpload('head_url_4',365,158,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('head_url_4')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
                              <span class="help-inline">建议图片尺寸365*158，图片大小不超过100K</span>
                         </span>
                     </p>
                    </td>
                </tr>
                 <tr>
                    <th width="120">车主关怀图文外链:</th>
                    <td>
                      <input type="text" name="url4" id="url4" value="<?php echo ($carset['url4']); ?>" class="form-control" />
                    <span class="help-block">不清楚可以留空</span>
                    </td>
                </tr>

                <tr>
                    <th width="120">实用工具:</th>
                    <td>
                         <input type="text" name="title5" id="title5" value="<?php echo ((isset($carset['title5']) && ($carset['title5'] !== ""))?($carset['title5']):'实用工具'); ?>" class="form-control" />
                         <span class="maroon">* 如 实用工具</span>
                     </td>
                </tr>
                <tr>
                    <th width="120">实用工具题图片：</th>
                    <td>
                     <p>
                         <img class="thumb_img" id="head_url_5_src" src="<?php echo ((isset($carset['head_url_5']) && ($carset['head_url_5'] !== ""))?($carset['head_url_5']):'/Public/User/images/car/tool-box-preferences.png'); ?>" style="max-height:100px;">
                         <input type="input" class="form-control" id="head_url_5" value="<?php echo ((isset($carset['head_url_5']) && ($carset['head_url_5'] !== ""))?($carset['head_url_5']):'/Public/User/images/car/tool-box-preferences.png'); ?>" name="head_url_5" >

                         <span class="help-inline">
                              <a href="###" onclick="gfilePicUpload('head_url_5',365,158,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('head_url_5')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
                              <span class="help-inline">建议图片尺寸365*158，图片大小不超过100K</span>
                         </span>
                     </p>
                    </td>
                </tr>
                 <tr>
                    <th width="120">实用工具图文外链:</th>
                    <td>
                      <input type="text" name="url5" id="url5" value="<?php echo ($carset['url5']); ?>" class="form-control" />
                    <span class="help-block">不清楚可以留空</span>
                    </td>
                </tr>

                <tr>
                    <th width="120">车型欣赏:</th>
                    <td>
                         <input type="text" name="title6" id="title6" value="<?php echo ((isset($carset['title6']) && ($carset['title6'] !== ""))?($carset['title6']):'车型欣赏'); ?>" class="form-control" />
                         <span class="maroon">* 如 车型欣赏</span>
                     </td>
                </tr>
                <tr>
                    <th width="120">车型欣赏图片：</th>
                    <td>
                     <p>
                         <img class="thumb_img" id="head_url_6_src" src="<?php echo ((isset($carset['head_url_6']) && ($carset['head_url_6'] !== ""))?($carset['head_url_6']):'/Public/User/images/car/lanbo14.jpg'); ?>" style="max-height:100px;">
                         <input type="input" class="form-control" id="head_url_6" value="<?php echo ((isset($carset['head_url_6']) && ($carset['head_url_6'] !== ""))?($carset['head_url_6']):'/Public/User/images/car/lanbo14.jpg'); ?>" name="head_url_6" >

                         <span class="help-inline">
                              <a href="###" onclick="gfilePicUpload('head_url_6',365,158,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('head_url_6')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
                              <span class="help-inline">建议图片尺寸365*158，图片大小不超过100K</span>
                         </span>
                     </p>
                    </td>
                </tr>
                 <tr>
                    <th width="120">车型欣赏图文外链:</th>
                    <td>
                      <input type="text" name="url6" id="url6" value="<?php echo ($carset['url6']); ?>" class="form-control" />
                    <span class="help-block">不清楚可以留空</span>
                    </td>
                </tr>

                  <tr>
                    <td>
                    <?php if($carset['id'] != ''): ?><input type="hidden" name="id" value="<?php echo ($carset['id']); ?>" /><?php endif; ?>
                      <input type="hidden" name="token" value="<?php echo ($token); ?>" />
                        <button type="submit" name="button" class="btn btn-primary"><i class="mdi-content-save"></i>保存</button>
                        <a href="javascript:history.go(-1);" class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
  </div>

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