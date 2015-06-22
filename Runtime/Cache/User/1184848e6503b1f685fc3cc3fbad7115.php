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
<div class="col-xs-9 col-sm-9  col-md-10 col-lg-10 ">

    <div class="righttitle">
        <h4 >"<?php echo ($thisLottery["title"]); ?>"SN码发放管理</h4>
        <div>

            <a href="javascript:history.go(-1);" class="btn btn-primary"><i class="mdi-content-reply"></i>返回</a>

        </div>
        <div class="clearfix"></div>
    </div>

    <!-- --> <div class="righttitle">
本次活动奖品总数：<span class="redamount"><?php echo ($datacount); ?></span>个　　　中奖人数：<span class="redamount"><?php echo ($recordcount); ?> </span>个　　已发奖品：<span class="redamount"><?php echo ($sendCount); ?></span>个          </div>
<div class="bg-warning tip" style="margin:0 auto">
    <a href="<?php echo U('User/Lottery/exportSN',array('id'=>$thisLottery['id']));?>" class="btn btn-warning btn-sm">导出中奖数据</a>导出Excel后把Excel表格中的手机号等列弄宽一点就会显示真正完整的手机号等信息
</div>
<form action="/index.php/User/Guajiang/sn/type/2/id/49.html" method="post" class="form-inline">
    <div class="form-group">
        <select class="form-control" id="sendstatus"  name="sendstatus">

            <option value="2" >全部</option>
            <option value="1" <?php if($_POST['sendstatus'] == 1 ): ?>selected<?php endif; ?>  >已发奖</option>
            <option value="0" <?php if($_POST['sendstatus'] == 0 ): ?>selected<?php endif; ?>>未发奖</option>
        </select>
    </div>
    <label for="">SN码：</label>

    <div class="form-group">
    <input type="text " class="form-control" name="sncode" value="<?php echo ($_POST['sncode']); ?>" ></div>
    <button class="btn btn-warning btn-sm" type="submit" >查询</button>
</form>
<div style="margin-top:0px;">

</div>
<div style="margin-top:20px;display:none" id="import"><form enctype="multipart/form-data" action="<?php echo U('User/GFile/localUploadSNExcel');?>" id="thumbForm" method="POST" style="font-size:14px;padding:10px 20px 10px 0px;"><div>选择本地文件：<input type="file" style="width:250px;border:1px solid #ddd" name="photo"></input> <input id="submitbtn" name="doSubmit" type="submit" class="btn btn-primary" value="上传" onclick="this.value='上传中...'"></input> <a href="###" onclick="$('#import').css('display','none')" class="btnGrayS vm">取消导入</a> 注意：不支持xlsx格式</div><input type="hidden" value="<?php echo ($thisLottery["id"]); ?>" name="lid" /></form></div>
<div  style=" padding: 8px 0">
</div>
<div class="">
    <form method="post"  action="" id="info" >
        <input name="delall"  type="hidden" value="" />
        <input name="wxid"  type="hidden" value="" />
        <table class="table table-condensed table-bordered table-striped" border="0" cellSpacing="0" cellPadding="0" width="100%">
            <thead>
                <tr style="text-align: center;">
                    <th class="select">序号</th>
                    <th>SN码(中奖号)</th>
                    <th>奖项</th>
                    <th>奖品是否已发</th>
                    <th>奖品派发时间</th>
                    <th>中奖者手机号</th>
                    <!-- <th>中奖者微信码</th> -->
                    <th  >中奖时间</th>
                    <th  >操作</th>
                </tr>

            </thead>
            <tbody>
                <?php if(is_array($record)): $i = 0; $__LIST__ = $record;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record): $mod = ($i % 2 );++$i;?><tr style="line-height:30px;height: 43px;line-height: 59px;">
                    <td class="select"><?php echo ($i); ?></td>
                    <td><?php echo ($record["sn"]); ?></td>
                    <td><?php echo ($record["prize"]); ?></td>
                    <td>
                        <?php if($record['sendstatus'] == 0): ?>否<?php else: ?>是<?php endif; ?>
                    </td>
                    <td><?php if($record['sendtime'] == 0): else: echo (date('Y-m-d H:i:s',$record["sendtime"])); endif; ?>
                    </td>
                    <td><?php echo ($record["phone"]); ?></td>
                    <!-- <td><?php echo ($record["wecha_name"]); ?></td> -->
                    <td><?php if($record['time'] != 0): echo (date('Y-m-d H:i:s',$record["time"])); endif; ?></td>
                    <td>
                        <?php if($record['sendstatus'] == 0): ?><a href="<?php echo U('User/Lottery/sendprize',array('id'=>$record['id']));?>" class="btn btn-warning btn-sm">发奖</a>
                        <?php else: ?>
                        <a href="<?php echo U('User/Lottery/sendnull',array('id'=>$record['id']));?>"  class="btn btn-warning btn-sm">取消发奖</a><?php endif; ?> <!-- <a href="javascript:drop_confirm('您确定要删除吗?', '<?php echo U('Lottery/snDelete',array('token'=>$token,'id'=>$record['id']));?>');"><i class="mdi-action-delete"></i>删除</a> -->

                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </form>
    <script>
    function checkvotethis() {
    var aa=document.getElementsByName('del_id[]');
    var mnum = aa.length;
    j=0;
    for(i=0;i<mnum;i++){
    if(aa[i].checked){
    j++;
    }
    }
    if(j>0) {
    document.getElementById('info').submit();
    } else {
    alert('未选中任何文章或回复！')
    }
    }
    </script>
</div>


<div >
    <div class="pageNavigator right">
        <div class="pages"></div>
    </div>
    <div class="clearfix"></div>
</div>
</div>
<script>
function checkAll(form, name) {
for(var i = 0; i < form.elements.length; i++) {
var e = form.elements[i];
if(e.name.match(name)) {
e.checked = form.elements['chkall'].checked;
}
}
}
</script>
<!--底部-->
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