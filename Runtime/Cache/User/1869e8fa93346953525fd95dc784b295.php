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
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
    <div class="righttitle"><h4>编辑文本自定义内容</h4><a href="javascript:history.go(-1);"  class="btn btn-primary" data-top ><i class="mdi-content-reply"></i>返回</a></div>
    <div class="">
        <form class="form" method="post"   action="<?php echo U('Text/upsave');?>"  target="_top" enctype="multipart/form-data" >
            <table style=" margin:20px 0 0 0;" border="0" cellSpacing="0" cellPadding="0" width="100%">
                <thead>
                    <tr>
                        <th valign="top"><label for="keyword">关键词：</label></th>
                        <td><input type="input" class="form-control" id="keyword" value="<?php echo ($info["keyword"]); ?>" name="keyword" style="width:500px" ><br /> </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr style="display:none">
                        <th valign="top">是否匹配关键词：</th>
                        <td><label for="radio1">
                            <input id="radio1" class="radio" type="radio" name="type" value="1" <?php if($info['type'] == 1): ?>checked="checked"<?php endif; ?>/>是</label>
                            <br /><label for="radio2"><input class="radio" id="radio2" type="radio" name="type" value="2" <?php if($info['type'] == 2): ?>checked="checked"<?php endif; ?>/>否</label></td>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
                        <tr>
                            <th valign="top"><label for="text">内容或简介：</label></th>
                            <td><textarea  class="form-control" id="Hfcol-xs-9 col-sm-9  col-md-10 col-lg-10 " name="text" style="width:500px; height:150px"><?php echo ($info["text"]); ?></textarea><br />请不要多于1000字否则无法发送!

                            </td>
                            <td rowspan="2" valign="top"></td>

                            <tr>
                                <th></th>
                                <td><button type="submit"  name="button"  class="btn btn-primary" ><i class="mdi-content-save"></i>保存</button>
                                    <a href="javascript:history.go(-1);"  class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a><span>点击下面表情，添加到内容之后</span>
                                    <div class="clearfix" style="margin-right:10px"  >
                                        <ul class="list-unstyled">
                                            <li class="biaoqing">
                                                <ul class="list-unstyled col-md-8 col-lg-8 clearfix">
                                                    <li><img src="/Public/User/images/face/0.gif" alt="微笑" onclick="jsbq('微笑')"></li>
                                                    <li><img src="/Public/User/images/face/1.gif" alt="撇嘴" onclick="jsbq('撇嘴')"></li>
                                                    <li><img src="/Public/User/images/face/2.gif" alt="色" onclick="jsbq('色')"></li>
                                                    <li><img src="/Public/User/images/face/3.gif" alt="发呆" onclick="jsbq('发呆')"></li>
                                                    <li><img src="/Public/User/images/face/4.gif" alt="得意" onclick="jsbq('得意')"></li>
                                                    <li><img src="/Public/User/images/face/5.gif" alt="流泪" onclick="jsbq('流泪')"></li>
                                                    <li><img src="/Public/User/images/face/6.gif" alt="害羞" onclick="jsbq('害羞')"></li>
                                                    <li><img src="/Public/User/images/face/7.gif" alt="闭嘴" onclick="jsbq('闭嘴')"></li>
                                                    <li><img src="/Public/User/images/face/8.gif" alt="睡" onclick="jsbq('睡')"></li>
                                                    <li><img src="/Public/User/images/face/9.gif" alt="大哭" onclick="jsbq('大哭')"></li>
                                                    <li><img src="/Public/User/images/face/10.gif" alt="尴尬" onclick="jsbq('尴尬')"></li>
                                                    <li><img src="/Public/User/images/face/11.gif" alt="发怒" onclick="jsbq('发怒')"></li>
                                                    <li><img src="/Public/User/images/face/12.gif" alt="调皮" onclick="jsbq('调皮')"></li>
                                                    <li><img src="/Public/User/images/face/13.gif" alt="呲牙" onclick="jsbq('呲牙')"></li>
                                                    <li><img src="/Public/User/images/face/14.gif" alt="惊讶" onclick="jsbq('惊讶')"></li>
                                                    <li><img src="/Public/User/images/face/15.gif" alt="难过" onclick="jsbq('难过')"></li>
                                                    <li><img src="/Public/User/images/face/16.gif" alt="酷" onclick="jsbq('酷')"></li>
                                                    <li><img src="/Public/User/images/face/17.gif" alt="冷汗" onclick="jsbq('冷汗')"></li>
                                                    <li><img src="/Public/User/images/face/18.gif" alt="抓狂" onclick="jsbq('抓狂')"></li>
                                                    <li><img src="/Public/User/images/face/19.gif" alt="吐" onclick="jsbq('吐')"></li>
                                                    <li><img src="/Public/User/images/face/20.gif" alt="偷笑" onclick="jsbq('偷笑')"></li>
                                                    <li><img src="/Public/User/images/face/21.gif" alt="可爱" onclick="jsbq('可爱')"></li>
                                                    <li><img src="/Public/User/images/face/22.gif" alt="白眼" onclick="jsbq('白眼')"></li>
                                                    <li><img src="/Public/User/images/face/23.gif" alt="傲慢" onclick="jsbq('傲慢')"></li>
                                                    <li><img src="/Public/User/images/face/24.gif" alt="饥饿" onclick="jsbq('饥饿')"></li>
                                                    <li><img src="/Public/User/images/face/25.gif" alt="困" onclick="jsbq('困')"></li>
                                                    <li><img src="/Public/User/images/face/26.gif" alt="惊恐" onclick="jsbq('惊恐')"></li>
                                                    <li><img src="/Public/User/images/face/27.gif" alt="流汗" onclick="jsbq('流汗')"></li>
                                                    <li><img src="/Public/User/images/face/28.gif" alt="憨笑" onclick="jsbq('憨笑')"></li>
                                                    <li><img src="/Public/User/images/face/29.gif" alt="大兵" onclick="jsbq('大兵')"></li>
                                                    <li><img src="/Public/User/images/face/30.gif" alt="奋斗" onclick="jsbq('奋斗')"></li>
                                                    <li><img src="/Public/User/images/face/31.gif" alt="咒骂" onclick="jsbq('咒骂')"></li>
                                                    <li><img src="/Public/User/images/face/32.gif" alt="疑问" onclick="jsbq('疑问')"></li>
                                                    <li><img src="/Public/User/images/face/33.gif" alt="嘘" onclick="jsbq('嘘')"></li>
                                                    <li><img src="/Public/User/images/face/34.gif" alt="晕" onclick="jsbq('晕')"></li>
                                                    <li><img src="/Public/User/images/face/35.gif" alt="折磨" onclick="jsbq('折磨')"></li>
                                                    <li><img src="/Public/User/images/face/36.gif" alt="衰" onclick="jsbq('衰')"></li>
                                                    <li><img src="/Public/User/images/face/37.gif" alt="骷髅" onclick="jsbq('骷髅')"></li>
                                                    <li><img src="/Public/User/images/face/38.gif" alt="敲打" onclick="jsbq('敲打')"></li>
                                                    <li><img src="/Public/User/images/face/39.gif" alt="再见" onclick="jsbq('再见')"></li>
                                                    <li><img src="/Public/User/images/face/40.gif" alt="擦汗" onclick="jsbq('擦汗')"></li>
                                                    <li><img src="/Public/User/images/face/41.gif" alt="抠鼻" onclick="jsbq('抠鼻')"></li>
                                                    <li><img src="/Public/User/images/face/42.gif" alt="鼓掌" onclick="jsbq('鼓掌')"></li>
                                                    <li><img src="/Public/User/images/face/43.gif" alt="糗大了" onclick="jsbq('糗大了')"></li>
                                                    <li><img src="/Public/User/images/face/44.gif" alt="坏笑" onclick="jsbq('坏笑')"></li>
                                                    <li><img src="/Public/User/images/face/45.gif" alt="左哼哼" onclick="jsbq('左哼哼')"></li>
                                                    <li><img src="/Public/User/images/face/46.gif" alt="右哼哼" onclick="jsbq('右哼哼')"></li>
                                                    <li><img src="/Public/User/images/face/47.gif" alt="哈欠" onclick="jsbq('哈欠')"></li>
                                                    <li><img src="/Public/User/images/face/48.gif" alt="鄙视" onclick="jsbq('鄙视')"></li>
                                                    <li><img src="/Public/User/images/face/49.gif" alt="委屈" onclick="jsbq('委屈')"></li>
                                                    <li><img src="/Public/User/images/face/50.gif" alt="快哭了" onclick="jsbq('快哭了')"></li>
                                                    <li><img src="/Public/User/images/face/51.gif" alt="阴险" onclick="jsbq('阴险')"></li>
                                                    <li><img src="/Public/User/images/face/52.gif" alt="亲亲" onclick="jsbq('亲亲')"></li>
                                                    <li><img src="/Public/User/images/face/53.gif" alt="吓" onclick="jsbq('吓')"></li>
                                                    <li><img src="/Public/User/images/face/54.gif" alt="可怜" onclick="jsbq('可怜')"></li>
                                                    <li><img src="/Public/User/images/face/55.gif" alt="菜刀" onclick="jsbq('菜刀')"></li>
                                                    <li><img src="/Public/User/images/face/56.gif" alt="西瓜" onclick="jsbq('西瓜')"></li>
                                                    <li><img src="/Public/User/images/face/57.gif" alt="啤酒" onclick="jsbq('啤酒')"></li>
                                                    <li><img src="/Public/User/images/face/58.gif" alt="篮球" onclick="jsbq('篮球')"></li>
                                                    <li><img src="/Public/User/images/face/59.gif" alt="乒乓" onclick="jsbq('乒乓')"></li>
                                                    <li><img src="/Public/User/images/face/60.gif" alt="咖啡" onclick="jsbq('咖啡')"></li>
                                                    <li><img src="/Public/User/images/face/61.gif" alt="饭" onclick="jsbq('饭')"></li>
                                                    <li><img src="/Public/User/images/face/62.gif" alt="猪头" onclick="jsbq('猪头')"></li>
                                                    <li><img src="/Public/User/images/face/63.gif" alt="玫瑰" onclick="jsbq('玫瑰')"></li>
                                                    <li><img src="/Public/User/images/face/64.gif" alt="凋谢" onclick="jsbq('凋谢')"></li>
                                                    <li><img src="/Public/User/images/face/65.gif" alt="示爱" onclick="jsbq('示爱')"></li>
                                                    <li><img src="/Public/User/images/face/66.gif" alt="爱心" onclick="jsbq('爱心')"></li>
                                                    <li><img src="/Public/User/images/face/67.gif" alt="心碎" onclick="jsbq('心碎')"></li>
                                                    <li><img src="/Public/User/images/face/68.gif" alt="蛋糕" onclick="jsbq('蛋糕')"></li>
                                                    <li><img src="/Public/User/images/face/69.gif" alt="闪电" onclick="jsbq('闪电')"></li>
                                                    <li><img src="/Public/User/images/face/70.gif" alt="炸弹" onclick="jsbq('炸弹')"></li>
                                                    <li><img src="/Public/User/images/face/71.gif" alt="刀" onclick="jsbq('刀')"></li>
                                                    <li><img src="/Public/User/images/face/72.gif" alt="足球" onclick="jsbq('足球')"></li>
                                                    <li><img src="/Public/User/images/face/73.gif" alt="瓢虫" onclick="jsbq('瓢虫')"></li>
                                                    <li><img src="/Public/User/images/face/74.gif" alt="便便" onclick="jsbq('便便')"></li>
                                                    <li><img src="/Public/User/images/face/75.gif" alt="月亮" onclick="jsbq('月亮')"></li>
                                                    <li><img src="/Public/User/images/face/76.gif" alt="太阳" onclick="jsbq('太阳')"></li>
                                                    <li><img src="/Public/User/images/face/77.gif" alt="礼物" onclick="jsbq('礼物')"></li>
                                                    <li><img src="/Public/User/images/face/78.gif" alt="拥抱" onclick="jsbq('拥抱')"></li>
                                                    <li><img src="/Public/User/images/face/79.gif" alt="强" onclick="jsbq('强')"></li>
                                                    <li><img src="/Public/User/images/face/80.gif" alt="弱" onclick="jsbq('弱')"></li>
                                                    <li><img src="/Public/User/images/face/81.gif" alt="握手" onclick="jsbq('握手')"></li>
                                                    <li><img src="/Public/User/images/face/82.gif" alt="胜利" onclick="jsbq('胜利')"></li>
                                                    <li><img src="/Public/User/images/face/83.gif" alt="抱拳" onclick="jsbq('抱拳')"></li>
                                                    <li><img src="/Public/User/images/face/84.gif" alt="勾引" onclick="jsbq('勾引')"></li>
                                                    <li><img src="/Public/User/images/face/85.gif" alt="拳头" onclick="jsbq('拳头')"></li>
                                                    <li><img src="/Public/User/images/face/86.gif" alt="差劲" onclick="jsbq('差劲')"></li>
                                                    <li><img src="/Public/User/images/face/87.gif" alt="爱你" onclick="jsbq('爱你')"></li>
                                                    <li><img src="/Public/User/images/face/88.gif" alt="NO" onclick="jsbq('NO')"></li>
                                                    <li><img src="/Public/User/images/face/89.gif" alt="OK" onclick="jsbq('OK')"></li>
                                                    <li><img src="/Public/User/images/face/90.gif" alt="爱情" onclick="jsbq('爱情')"></li>
                                                    <li><img src="/Public/User/images/face/91.gif" alt="飞吻" onclick="jsbq('飞吻')"></li>
                                                    <li><img src="/Public/User/images/face/92.gif" alt="跳跳" onclick="jsbq('跳跳')"></li>
                                                    <li><img src="/Public/User/images/face/93.gif" alt="发抖" onclick="jsbq('发抖')"></li>
                                                    <li><img src="/Public/User/images/face/94.gif" alt="怄火" onclick="jsbq('怄火')"></li>
                                                    <li><img src="/Public/User/images/face/95.gif" alt="转圈" onclick="jsbq('转圈')"></li>
                                                    <li><img src="/Public/User/images/face/96.gif" alt="磕头" onclick="jsbq('磕头')"></li>
                                                    <li><img src="/Public/User/images/face/97.gif" alt="回头" onclick="jsbq('回头')"></li>
                                                    <li><img src="/Public/User/images/face/98.gif" alt="跳绳" onclick="jsbq('跳绳')"></li>
                                                    <li><img src="/Public/User/images/face/99.gif" alt="挥手" onclick="jsbq('挥手')"></li>
                                                    <li><img src="/Public/User/images/face/100.gif" alt="激动" onclick="jsbq('激动')"></li>
                                                    <li><img src="/Public/User/images/face/101.gif" alt="街舞" onclick="jsbq('街舞')"></li>
                                                    <li><img src="/Public/User/images/face/102.gif" alt="献吻" onclick="jsbq('献吻')"></li>
                                                    <li><img src="/Public/User/images/face/103.gif" alt="左太极" onclick="jsbq('左太极')"></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        </div><div class="clearfix"></div>
                                        <script type="text/javascript">
                                        function jsbq(srt){
                                        document.getElementById("Hfcol-xs-9 col-sm-9  col-md-10 col-lg-10 ").value=document.getElementById("Hfcol-xs-9 col-sm-9  col-md-10 col-lg-10 ").value+"/"+srt;
                                        }
                                    </script></td>
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