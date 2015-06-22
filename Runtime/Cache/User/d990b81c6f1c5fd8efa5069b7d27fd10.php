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
<script src="/Public/static/gfile.js"></script>
<script src="/Public/User/js/date/WdatePicker.js"></script>
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
    <script>
    jQuery(document).ready(function(){
      jQuery("#formID").validationEngine();
    });
    </script>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
<link rel="stylesheet" href="/Public/static/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>

<script src="/Public/User/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="/Public/static/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/static/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    .tooltips span {
display: none;
}
    .tooltips:hover span {
        text-align:left;
        display: block;
        position: absolute;
        margin:0 auto;
        width: 310px;
        border: 1px solid #CCC;
        background-color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
        border-radius: 6px;
        padding: 10px;
        font-size: 12px;
        line-height: 22px;
        color: #333;
    }

</style>

<div >
<ul class="list-unstyled nav nav-tabs">
<li class="<?php if(ACTION_NAME == 'index'): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('School/index',array('token'=>$token,'type'=>'semester'));?>">分类管理</a></li>
<li class="<?php if(ACTION_NAME == 'students'): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('School/students',array('token'=>$token));?>">学员管理</a></li>
<!-- <li class="<?php if(ACTION_NAME == 'paycost'): ?>current<?php endif; ?> tabli" id="tab2">
<a href="<?php echo U('School/paycost',array('token'=>$token));?>">缴费管理</a></li> -->
<li class="<?php if((ACTION_NAME == 'assess') OR (ACTION_NAME == 'assess_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('School/assess',array('token'=>$token));?>">教师管理</a></li>
<li class="<?php if((ACTION_NAME == 'curriculum') OR (ACTION_NAME == 'assess_course')): ?>current<?php endif; ?> tabli" id="tab3"><a href="<?php echo U('School/curriculum',array('token'=>$token));?>">课程安排</a></li>
<li class="<?php if(ACTION_NAME == 'subscribe' OR (ACTION_NAME == 'subscribe_add')): ?>current<?php endif; ?> tabli" id="tab4"><a href="<?php echo U('School/subscribe',array('token'=>$token));?>">课程预约</a></li>
<li class="<?php if(ACTION_NAME == 'scoresearch' ): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('School/scoresearch',array('token'=>$token));?>">成绩查询</a></li>
<!-- <li class="<?php if(ACTION_NAME == 'campusnews'): ?>current<?php endif; ?> tabli" id="tab6"><a href="<?php echo U('School/campusnews',array('token'=>$token));?>">校内新闻</a></li> -->
<li class="<?php if(ACTION_NAME == 'cookbook'): ?>current<?php endif; ?> tabli" id="tab6"><a href="<?php echo U('School/cookbook',array('token'=>$token));?>">食谱安排</a></li>
<li class="<?php if(ACTION_NAME == 'introduction'): ?>current<?php endif; ?> tabli" id="tab7"><a href="<?php echo U('School/introduction',array('token'=>$token));?>">菜单/回复配置</a></li>
</ul>
</div>
          <div class="righttitle">
              <h4 >当前位置：微学校 >> 菜单配置项</h4>
              <div class="clearfix"></div>
          </div>
          <div class="cLineD"></div>
          <div class="">
           <div class="bg-warning tip">请先配置好!.</div>
<form class="form" method="post" id="formID" action="" target="_top" enctype="multipart/form-data">

        <table class="table" >
            <tbody>
                <tr>
                    <th width="120">触发关键词：</th>
                    <td> <input type="text" name="keyword" id="keyword"  class="form-control" value="<?php echo ($schoolSet['keyword']); ?>" data-validation-engine="validate[required,minSize[2],maxSize[5]]"
                    data-errormessage-value-missing="必须输入出发关键词!" style="width: 400px;"/>
                    <span class="maroon">*</span>
                    <span class="help-inline">如：学校 或者 微学校</span>
                    </td>
                </tr>
                <tr>
                    <th width="120">图文标题：</th>
                    <td>
                         <input type="text" name="title" id="title" placeholder="这里可以填写简单的介绍" value="<?php echo ($schoolSet['title']); ?>" class="form-control" data-validation-engine="validate[required,minSize[5],maxSize[15]]"
                    data-errormessage-value-missing="你写的太少了" style="width: 400px;"/>
                         <span class="maroon">* 图文封面标题</span>
                     </td>
                </tr>

                 <tr>
                    <th width="120">回复图片：</th>
                    <td>
                     <p>
<?php if($schoolSet['head_url'] != ''): ?><img class="thumb_img" id="head_url_src" src="<?php echo ($schoolSet['head_url']); ?>" style="max-height:100px;"><?php endif; ?>
                         <input type="input" class="form-control" id="head_url" value="<?php echo ($schoolSet['head_url']); ?>" name="head_url" data-validation-engine="validate[required,custom[url]]"
                    data-errormessage-value-missing="必须上传回复图片!"  data-errormessage-custom-error="正确的网址,如: http://www.baidu.com/images/demo.png" style="width: 300px;">

                         <span class="help-inline">
                              <a href="###" onclick="gfilePicUpload('head_url',365,158,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm"><i class="mdi-file-file-upload"></i>上传</a> <a href="###" onclick="viewImg('head_url')" class="btn btn-warning btn-sm"><i class="mdi-action-pageview"></i>预览</a>
                              <span class="maroon">图片大小不超过300K [365*158](仅图文回复显示)</span>
                         </span>
                     </p>
                    </td>
                </tr>

                 <tr>
                    <th width="120">图文介绍：</th>
                    <td>
                    <textarea style="border: 1px solid #D8D7D7;" name="info" id="info" cols="80" placeholder="" data-validation-engine="validate[required,minSize[15],maxSize[100]]"
                    data-errormessage-value-missing="你写的太少了!"  rows="10"><?php echo ($schoolSet['info']); ?></textarea>
                        <span class="maroon">* 仅仅在图文回复里显示(100字以内)</span>
                     </td>
                </tr>

                 <tr>
                    <th width="120">首页幻灯片</th>
                    <td>
                    <select class="form-control"  id="album_id" name="album_id" data-validation-engine="validate[required]"  data-errormessage-value-missing="必须请选择相册哦,否则首页太空虚了!">
                            <option>请选择相册 [幻灯片]</option>
                                <?php if(is_array($photo)): $i = 0; $__LIST__ = $photo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>" <?php if($vo['id'] == $schoolSet['album_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                          </select>
                    <span class="maroon">首页背景幻灯片［建议最多5张，3张效果更好］最低要求尺寸(460*693)</span>
                     ，如果没有请去：<a href="<?php echo U('Photo/add',array('token'=>$token,'poid'=>$schoolSet['album_id']));?>"  class="btn btn-warning btn-sm">添加幻灯片</a>&nbsp;
                    <span class="tooltips"><img src="/tpl/Home/gooraye/common/images/price_help.png" align="absmiddle"><span><font color='red'>请到[ 3G图集 ]创建相册,然后上传图片.<br/>相册要选择[ 显示此相册 ].建议最多5张，3张效果更好.大小不要超过100KB.</font>
                </span></span>
                     </td>
                </tr>
                 <!-- <tr>
                    <th width="120">校内新闻</th>
                    <td>
                    <select class="form-control"  id="classify_id" name="classify_id" data-validation-engine="validate[required]"  data-errormessage-value-missing="必须选择新闻分类!">
                            <option value="">请选择</option>
                                <?php if(is_array($classify)): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cid']); ?>" <?php if($vo['cid'] == $schoolSet['classify_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                          </select>
                   &nbsp;不懂点我
                    <span class="tooltips"><img src="/tpl/Home/gooraye/common/images/price_help.png" align="absmiddle"><span><font color='red'>请到[ 分类管理 ] 添加分类(首页是否显示:选择不显示),然后到.<br/>[ 微信-图文回复 ]添加图文.</font>
                </span></span>
                     </td>
                </tr> -->
                <tr>
                    <th width="120">背景音乐</th>
                <td>
                    <table><tr><td><a style="width:120px;float:left" id="musicurl_src" class="audio {skin:'blue'}" href="<?php echo ((isset($schoolSet["musicurl"]) && ($schoolSet["musicurl"] !== ""))?($schoolSet["musicurl"]):'http://mp3.weiecn.com/vd.php/17647129/weiecn.mp3'); ?>">音乐播放</a></td><td> <input class="form-control" name="musicurl" value="<?php echo ((isset($schoolSet["musicurl"]) && ($schoolSet["musicurl"] !== ""))?($schoolSet["musicurl"]):'http://mp3.weiecn.com/vd.php/17647129/weiecn.mp3'); ?>" id="musicurl" style="width:200px;float:left" onchange="$('#musicurl_src').attr('href',this.value"> <a href="###" onclick="chooseFile('musicurl','music')" class="btn btn-warning btn-sm"><i class="mdi-toggle-check-box"></i>选择</a> &nbsp; 不懂点我
                    <span class="tooltips"><img src="/tpl/Home/gooraye/common/images/price_help.png" align="absmiddle"><span><font color='red'>如果不需要背景音乐,<br/>留空即可</font>
                </span></span></td></tr></table>
                     </td>
                </tr>

                <tr>
                    <th width="120">菜单列表名称：</th>
                    <td>
                     <input type="text" name="menu1" id="menu1" class="form-control" value="<?php echo ((isset($schoolSet['menu1']) && ($schoolSet['menu1'] !== ""))?($schoolSet['menu1']):'学校环境'); ?>" data-validation-engine="validate[required,minSize[2],maxSize[4]]"> &nbsp;
                     <select class="form-control"  id="menu1_id" name="menu1_id" class="input-medium" data-validation-engine="validate[required]"  data-errormessage-value-missing="亲,该项必须选择,学校得介绍一下吧." style="width: 150px;">
                                          <option value="">请选择</option>
                                            <?php if(is_array($classify)): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cid']); ?>" <?php if($vo['cid'] == $schoolSet['menu1_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                     <input type="text" name="menu2" id="menu2" value="<?php echo ((isset($schoolSet['menu2']) && ($schoolSet['menu2'] !== ""))?($schoolSet['menu2']):'教师风采'); ?>" class="form-control" data-validation-engine="validate[required,minSize[2],maxSize[4]]"> &nbsp;
                     <select class="form-control"   style="width: 150px;" disabled><option value=""><i style="font-style: italic;">读取[教师管理]数据</i></option></select>
                     <!-- <select class="form-control"  id="menu2_id" name="menu2_id" class="input-medium" data-validation-engine="validate[required]"  data-errormessage-value-missing="亲,该项必须选择,咱老师得介绍一下吧."style="width: 150px;">
                                          <option value="">请选择</option>
                                            <?php if(is_array($classify)): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cid']); ?>" <?php if($vo['cid'] == $schoolSet['menu2_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select><br> --><br>
                     <input type="text" name="menu3" id="menu3" value="<?php echo ((isset($schoolSet['menu3']) && ($schoolSet['menu3'] !== ""))?($schoolSet['menu3']):'同学天地'); ?>"class="form-control" data-validation-engine="validate[required,minSize[2],maxSize[4]]"> &nbsp;
                     <select class="form-control"  id="menu3_id" name="menu3_id" class="input-medium" data-validation-engine="validate[required]"  data-errormessage-value-missing="亲,该项必须选择."style="width: 150px;">
                                          <option value="">请选择</option>
                                            <?php if(is_array($classify)): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cid']); ?>" <?php if($vo['cid'] == $schoolSet['menu3_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                     <input type="text" name="menu4" id="menu4" value="<?php echo ((isset($schoolSet['menu4']) && ($schoolSet['menu4'] !== ""))?($schoolSet['menu4']):'课程介绍'); ?>" class="form-control" data-validation-engine="validate[required,minSize[2],maxSize[4]]"> &nbsp;
                     <select class="form-control"  id="menu4_id" name="menu4_id" class="input-medium" data-validation-engine="validate[required]"  data-errormessage-value-missing="亲,该项必须选择,咱课程得介绍一下吧."style="width: 150px;">
                                          <option value="">请选择</option>
                                            <?php if(is_array($classify)): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cid']); ?>" <?php if($vo['cid'] == $schoolSet['menu4_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select><br>
                     <input type="text" name="menu5" id="menu5" value="<?php echo ((isset($schoolSet['menu5']) && ($schoolSet['menu5'] !== ""))?($schoolSet['menu5']):'食谱安排'); ?>" class="form-control" data-validation-engine="validate[required,minSize[2],maxSize[4]]"> &nbsp;
                    <!--  <select class="form-control"  id="menu5_id" name="menu5_id" class="input-medium" style="width: 150px;">
                                          <option value="">请选择</option>
                                            <?php if(is_array($recipe)): $i = 0; $__LIST__ = $recipe;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['rid']); ?>" <?php if($vo['rid'] == $schoolSet['menu5_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select> -->
                    <select class="form-control"   style="width: 150px;" disabled><option value=""><i style="font-style: italic;">默认食谱列表[固定]</i></option></select>
                     <input type="text" name="menu6" id="menu6" value="<?php echo ((isset($schoolSet['menu6']) && ($schoolSet['menu6'] !== ""))?($schoolSet['menu6']):'校内新闻'); ?>" class="form-control" data-validation-engine="validate[required,minSize[2],maxSize[4]]"> &nbsp;
                     <select class="form-control"  id="menu6_id" name="menu6_id" class="input-medium"style="width: 150px;" >
                                          <option value="">请选择</option>
                                            <?php if(is_array($classify)): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cid']); ?>" <?php if($vo['cid'] == $schoolSet['menu6_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select><br>
                     <input type="text" name="menu7" id="menu7" value="<?php echo ((isset($schoolSet['menu7']) && ($schoolSet['menu7'] !== ""))?($schoolSet['menu7']):'成绩查询'); ?>" class="form-control" data-validation-engine="validate[required,minSize[2],maxSize[4]]"> &nbsp;
                    <input type="text" name="menu8" id="menu8" value="<?php echo ((isset($schoolSet['menu8']) && ($schoolSet['menu8'] !== ""))?($schoolSet['menu8']):'家长建议'); ?>" class="form-control" data-validation-engine="validate[required,minSize[2],maxSize[4]]"> &nbsp;


                    </td>
                </tr>

                  <tr>
                    <td>
                    <?php if($schoolSet['setid'] != ''): ?><input type="hidden" name="setid" value="<?php echo ($schoolSet['setid']); ?>" />
                    <input type="hidden" name="type" value="eidt" /><?php endif; ?>
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
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!--底部-->
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