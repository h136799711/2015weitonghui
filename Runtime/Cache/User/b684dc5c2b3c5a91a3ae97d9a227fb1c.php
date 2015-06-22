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
<style type="text/css">
	.display-table-tr{
		border: 1px solid #fee;
	}
	.display-table-tr > div{
	  display: inline-block;
	}
</style>
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">
	<div class="righttitle">
		<h4>
			上传图片
		</h4>
		<a href="javascript:history.go(-1);" class="btn btn-primary" data-top>
			<i class="mdi-content-reply">
			</i>返回
		</a>
	</div>
	<div class="righttitle">
		<div class="pageNavigator left">
			<strong>此相册地址：
				<a target="_blank" href="<?php echo U('Wap/Photo/plist',array('token'=>$token,'id'=>I('get.id')));?>" class="green">
					<?php echo U('Wap/Photo/plist',array('token'=>$token,'id'=>I('get.id')));?>
				</a>
			</strong>
		</div>
	</div>
	<div class=" form">
		<input type="hidden" name="formhash" value="">
		<input type="hidden" name="wxid" value="">
		<div class="bdrcontent ">
			<div id="div_ptype">
					<div class="table table-condensed table-bordered table-striped" >
						<div class="display-table-tr">
							<div class="display-table-cell" style=" width:120px;display:table-">
								名称
							</div>
							<div style=" width:70px;">
								显示顺序
							</div>
							<div>
								图片外链地址（宽720够了，高不限制）
							</div>
							<div>
								图片简单说明（可不填）
							</div>
							<div style=" width:80px;">
								显示
							</div>
							<div style=" width:100px;" class="norightborder">
								操作
							</div>
						</div>

						<form method="post" action="/index.php/User/Photo/list_add/id/6.html" >
						<div class="display-table-tr">
							<div>
								<input type="text" name="title" value=""  class="form-control"/>
							</div>
							<div>
								<input type="text" name="sort" value="0"  class="form-control" style="width:50px;" />
							</div>
							<div>
								<div class="cateimg">
								</div>
								<input class="form-control" style="width:250px;" type="text" name="picurl" id="picurl" value=""  />
								<script src="/Public/static/gfile.js"></script>
								<a href="###" onclick="gfilePicUpload('picurl',1500,1000,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm">
									<i class="mdi-file-file-upload">
									</i>上传
								</a>
								<a href="###" onclick="viewImg('picurl')" class="btn btn-warning btn-sm">
									<i class="mdi-action-pageview">
									</i>预览
								</a>
								<input type="hidden"   name="pid" value="<?php echo ($_GET['id']); ?>"  />
							</div>
							<div>
								<input class="form-control" type="text"  style="width:250px;"  name="info" value=""  />
							</div>
							<div>
								<input class="checkbox" type="checkbox" name="status" value="1"  checked >
							</div>
							<div class="norightborder">
								<button type="submit" id="vtype" class="btn btn-warning btn-sm" >
									添加
								</button>　
							</div>
						</div>
							
						</form>
					</div>
						<div colspan="6">
							<div class="righttitle">
								<h4>
									图片列表
								</h4>
							</div>
						</div>
						<div class="table">
						<div class="display-table-tr">
							<div style=" width:120px;">
								名称
							</div>
							<div style=" width:70px;">
								显示顺序
							</div>
							<div>
								图片外链地址
							</div>
							<div>
								图片简单说明（可不填）
							</div>
							<div style=" width:80px;">
								显示
							</div>
							<div style=" width:100px;" class="norightborder">
								操作
							</div>
						</div>
					<?php if(is_array($photo)): $i = 0; $__LIST__ = $photo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$photo): $mod = ($i % 2 );++$i;?><form method="post" action="<?php echo U('Photo/list_edit',array('token'=>session('token')));?>" >
						<div class="display-table-tr">
								<div>
									<input type="text" name="title" value="<?php echo ($photo["title"]); ?>"  class="form-control"    />
								</div>
								<div>
									<input type="text" name="sort" value="<?php echo ($photo["sort"]); ?>"  class="form-control" style="width:50px;" />
								</div>
								<div>
									<div class="cateimg">
									</div>
									<input class="form-control"  style="width:250px;"   type="text"   name="picurl" id="picurl<?php echo ($i); ?>" value="<?php echo ($photo["picurl"]); ?>"  />
									<script src="/Public/static/gfile.js"></script>
									<a href="###" onclick="gfilePicUpload('picurl<?php echo ($i); ?>',1500,1000,'<?php echo ($token); ?>')" class="btn btn-warning btn-sm">
										<i class="mdi-file-file-upload">
										</i>上传
									</a>
									<a href="###" class="btn btn-warning btn-sm" onclick="viewImg('picurl<?php echo ($i); ?>')">
										<i class="mdi-action-pageview">
										</i>预览
									</a>
								</div>
								<div>
									<input class="form-control" type="text"  style="width:250px;"  name="info" value="<?php echo ($photo["info"]); ?>"  />
								</div>
								<div>
									<input class="checkbox" type="checkbox" name="status" value="1"  <?php if($photo['status'] == 1): ?>checked<?php endif; ?> >
									<input type="hidden"   name="id" value="<?php echo ($photo["id"]); ?>"  />
								</div>
								<div class="norightborder">
									<button type="submit" name="edit" value="true" class="btn btn-warning btn-sm" >
										<i class="mdi-editor-mode-edit">
										</i>修改
									</button>
									<a class="btn btn-warning btn-sm" href="<?php echo U('Photo/list_del',array('id'=>$photo['id'],'token'=>session('token')));?>">
										<i class="mdi-action-delete">
										</i>删除
									</a>
								</div>
						</div>
						</form>
						</tbody><?php endforeach; endif; else: echo "" ;endif; ?>

						</div>
			</div>
			<!-- END OF div_type -->
		</div>
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