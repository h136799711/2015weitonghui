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
        <div class="righttitle">
          <h4>3G站点底部菜单设置</h4>
        </div>
                 <ul id="tags" class="nav nav-tabs">
          <li><a href="<?php echo U('Catemenu/index');?>">底部菜单分类设置</a> </li>
          <li class="active" role="presentation"><a href="<?php echo U('Catemenu/styleSet');?>">底部菜单风格<i class="mdi-toggle-check-box"></i>选择</a> </li>
          <li><a href="<?php echo U('Home/plugmenu');?>">菜单颜色与版权</a> </li>
          <div class="clearfix"></div>
        </ul>
        <div class="righttitle" style="padding:0;margin:0"></div>
        <div class="">
        <div class="bg-warning tip" style="margin:10px 0">更换菜单样式后需要过大概五分钟才会生效</div> 
          <table class="table" >
            <tbody>
              <tr>
                <td><form id="form1" name="form1" method="post" action="">
                    <ul class="list-unstyled">
                     <li class="pull-left text-center">  
                        <label <?php if($radiogroup == 0): ?>class="active"<?php endif; ?> ><img src="/Public/User/css/catemenu-style/000.png">
                          <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="0" id="radiogroup_0" <?php if($radiogroup == 0): ?>checked<?php endif; ?>>
                          关闭底部导航
                          </label>
                          </div>
                          </label>
                     
                      </li>
                      <li  class="pull-left text-center <?php if($radiogroup == 1): ?>active<?php endif; ?> "  >
                        <label><img src="/Public/User/css/catemenu-style/001.png">
                            <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="1" id="radiogroup_1" <?php if($radiogroup == 1): ?>checked<?php endif; ?>>
                          1.左侧展开</label>
                          
                        </div>
                      </label>
                      </li>
                      <li  class="pull-left text-center <?php if($radiogroup == 2): ?>active<?php endif; ?>" >
                        <label><img src="/Public/User/css/catemenu-style/002.png">
                            <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="2" id="radiogroup_2" <?php if($radiogroup == 2): ?>checked<?php endif; ?>>
                          2.右侧展开</label>
                        </div>
                      </label>
                      </li>
                      <li class="pull-left text-center <?php if($radiogroup == 3): ?>active<?php endif; ?> ">
                        <label><img src="/Public/User/css/catemenu-style/003.png">
                            <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="3" id="radiogroup_3" <?php if($radiogroup == 3): ?>checked<?php endif; ?>>
                          3.左侧滑入</label>
                        </div>
                      </label>
                      </li>
                      <li class="pull-left text-center" <?php if($radiogroup == 4): ?>active<?php endif; ?>">
                        <label><img src="/Public/User/css/catemenu-style/004.png">
                            <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="4" id="radiogroup_4" <?php if($radiogroup == 4): ?>checked<?php endif; ?>>
                          4.右侧滑入</label>
                        </div>
                      </label>
                      </li>
                      <li class="pull-left text-center <?php if($radiogroup == 5): ?>active<?php endif; ?>">
                        <label><img src="/Public/User/css/catemenu-style/005.png">
                            <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="5" id="radiogroup_5" <?php if($radiogroup == 5): ?>checked<?php endif; ?>>
                          5.左侧底部滑入</label>
                        </div>
                      </label>
                      </li>
                      <li class="pull-left text-center <?php if($radiogroup == 6): ?>active<?php endif; ?>"> 
                        <label><img src="/Public/User/css/catemenu-style/006.png">
                            <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="6" id="radiogroup_6" <?php if($radiogroup == 6): ?>checked<?php endif; ?>>
                          6.右侧底部滑入</label>
                        </div>
                      </label>
                      </li>
                      <li class="pull-left text-center <?php if($radiogroup == 7): ?>active<?php endif; ?>">
                        <label><img src="/Public/User/css/catemenu-style/007.png">  <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="7" id="radiogroup_7" <?php if($radiogroup == 7): ?>checked<?php endif; ?>>
                          7</label>
                        </div>
                      </label>
                      </li>
                      <li class="pull-left text-center <?php if($radiogroup == 8): ?>active<?php endif; ?>">
                        <label><img src="/Public/User/css/catemenu-style/008.png">  <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="8" id="radiogroup_8" <?php if($radiogroup == 8): ?>checked<?php endif; ?>>
                          8</label>
                        </div>
                      </label>
                      </li>
                      <li class="pull-left text-center <?php if($radiogroup == 9): ?>active<?php endif; ?>">
                        <label><img src="/Public/User/css/catemenu-style/009.png">  <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="9" id="radiogroup_9" <?php if($radiogroup == 9): ?>checked<?php endif; ?>>
                          9</label>
                        </div>
                      </label>
                      </li>
                      <li class="pull-left text-center <?php if($radiogroup == 10): ?>active<?php endif; ?>">
                        <label><img src="/Public/User/css/catemenu-style/010.png">  <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="10" id="radiogroup_10" <?php if($radiogroup == 10): ?>checked<?php endif; ?>>
                          10</label>
                        </div>
                      </label>
                      </li>
                      <li class="pull-left text-center <?php if($radiogroup == 11): ?>active<?php endif; ?>">
                        <label><img src="/Public/User/css/catemenu-style/011.png">  <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="11" id="radiogroup_11" <?php if($radiogroup == 11): ?>checked<?php endif; ?>>
                          11</label>
                        </div>
                      </label>
                      </li>
                      <li class="pull-left text-center <?php if($radiogroup == 12): ?>active<?php endif; ?>" >
                        <label><img src="/Public/User/css/catemenu-style/012.png">  <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="12" id="radiogroup_12" <?php if($radiogroup == 12): ?>checked<?php endif; ?>>
                          12</label>
                        </div>
                      </label>
                      </li>
                      <li  class="pull-left text-center <?php if($radiogroup == 13): ?>active<?php endif; ?>">
                        <label><img src="/Public/User/css/catemenu-style/013.png">  <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="13" id="radiogroup_13" <?php if($radiogroup == 13): ?>checked<?php endif; ?>>
                          13</label>
                        </div>
                      </label>
                      </li>
                      <li  class="pull-left text-center <?php if($radiogroup == 14): ?>active<?php endif; ?>">
                        <label><img src="/Public/User/css/catemenu-style/014.png">  <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="14" id="radiogroup_14" <?php if($radiogroup == 14): ?>checked<?php endif; ?>>
                          14</label>
                        </div>
                      </label>
                      </li>
                      <li  class="pull-left text-center <?php if($radiogroup == 15): ?>active<?php endif; ?>">
                        <label><img src="/Public/User/css/catemenu-style/015.png">  <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="15" id="radiogroup_15" <?php if($radiogroup == 15): ?>checked<?php endif; ?>>
                          15</label>
                        </div>
                      </label>
                      </li>
                      <li  class="pull-left text-center <?php if($radiogroup == 16): ?>active<?php endif; ?>">
                        <label><img src="/Public/User/css/catemenu-style/016.png">  <div class="radio radio-primary">
                            <label>
                          <input class="radio" type="radio" name="radiogroup" value="16" id="radiogroup_16" <?php if($radiogroup == 16): ?>checked<?php endif; ?>>
                          16</label>
                        </div>
                      </label>
                      </li>
                    </ul>
                    <script>
                    $(document).ready(function(){
                      $("input.radio").click(function(ev){
                          var radiostyle=$(this).val();
                          console.log("设置成 ",radiostyle);
                          $(".cateradio li").each(function(){
                            $(this).removeClass("active");
                          });
                          $(this).parents("li").addClass("active");
                          $.ajax({
                              type:"get",
                              url:"<?php echo U('User/Catemenu/styleChange');?>"+"?radiogroup="+radiostyle,
                              dataType:"json",
                          });
                          // ev.preventDefault();
                          // ev.stopProgration
                      });
                    });
                    </script>

                  </form></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!--底部-->   </div>
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