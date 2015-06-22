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

<script>
    jQuery(document).ready(function(){
      jQuery("#formID").validationEngine();
    });
     function checkPhone(field,rules,i,options){
        var regex = /^0\d{2,3}-?\d{6,8}\d$/;
        if(field.val() == null || !regex.test(field.val())){
            return "电话格式不对!正确格式:0771-7044333";
        }
    }
    function checkTel(field,rules,i,options){
         var regex = /^(13[0123456789]{1}\d{8}$|^15[1235689]{1}\d{8}$|^18[26789]{1}\d{8})|(0[0-9]{1,3}\-?[0-9]{7,8})$/;
        if(field.val() == null || !regex.test(field.val())){
            return "手机号码格式不对!正确格式:18619998888";
        }
    }
    </script>

<style>
.maroon{color: red;}
</style>
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
  <h4>当前位置：微学校 >> <a href="<?php echo U('School/students',array('token'=>$token));?>">学员管理</a> >> 新增学员</h4>
 </div>

    <div class=" bgfc" style="margin-top:10px;">
      <form  method="post" id="formID" action="" target="_top" enctype="multipart/form-data">

        <table class="table" >
            <tbody>
                <tr>
                    <th width="120">所属学期:</th>
                    <td>
                    <select class="form-control"  name="xq_id" id="xq_id" data-validation-engine="validate[required]"   data-errormessage-value-missing="必须选择所属学期" >
                    <option value="">请选择学期</option>
                      <?php if(is_array($li_semester)): $i = 0; $__LIST__ = $li_semester;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['sid']); ?>" <?php if($student['xq_id'] == $vo['sid']): ?>selected<?php endif; ?>><?php echo ($vo['sname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>

                    <span class="maroon">*</span>
                    </td>

                    <th width="120">所属地区:</th>
                    <td>
                    <div> <select class="form-control"   id="localdate" data-validation-engine="validate[required]"   data-errormessage-value-missing="必须选择所属地区"></select> <span class="maroon">*</span></div>
                    <input type="text"  name="area_addr" value="<?php echo ($student['area_addr']); ?>" id="tip"  class="form-control" size="50" placeholder="提示: 选择地区之后,填写该详细地址" data-validation-engine="validate[required]"   data-errormessage-value-missing="必须填写详细地址" /><span class="maroon">*</span>
                    <input type="text" class="form-control" value="<?php echo ($strdent['localdate_id']); ?>" name="localdate_id" hidden id="localdate_id">
                    <input type="text" class="form-control" value="<?php echo ($strdent['area']); ?>" name="area" hidden id="area_tip">
                  <!-- <div style="margin-top: 10px">
                    <input type="button" title="获得各级菜单所选值" value="button3" id="getValueArr2"/> 获得各级菜单所选值
                  </div> -->
        <script>
          $(document).ready(function(){
            var opts = {
                data: districtData,
                selStyle: 'margin-left: 3px;',
                select:  '#localdate',
                head: '请选择地区',
                defVal:[<?php echo ($student['localdate_id']); ?>],
                dataReader: {id: 'id', name: 'name', cell: 'cell'}
            };
            var linkageSel2 = new LinkageSel(opts);
            //districtData = opts = null; // 如果数据量大最好在创建LinkageSel实例之后清空

            $('#getValueArr2').click(function() {
              var arr = linkageSel2.getSelectedArr();
              alert(arr.join(','));
            });

            linkageSel2.onChange(function() {
              var input = $('#tip'),
                d = this.getSelectedDataArr('name'),
                //zip = this.getSelectedData('zip'),
                arr = [];
              for (var i = 0, len = d.length; i < len; i++) {
                arr.push(d[i]);
              }
              //zip = zip ? ' 邮编:' + zip : '';
              var area_tip = $('#area_tip');
              zip = " <?php echo ($student['area_addr']); ?>";
              area_tip.val(arr.join(' ') + zip);
              input.val(zip);
              var arrid = linkageSel2.getSelectedArr();
              var localdate_id = $("#localdate_id");
              localdate_id.val(arrid.join(','));
            });
          });
        </script>
                    </td>
                </tr>

                 <tr>
                    <th width="120">所属班级:</th>
                    <td>
                     <select class="form-control"  name="bj_id" id="bj_id" data-validation-engine="validate[required]"  data-errormessage-value-missing="必须选择所属班级">
                    <option value="">请选择班级</option>
                      <?php if(is_array($li_theclass)): $i = 0; $__LIST__ = $li_theclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['sid']); ?>" <?php if($student['bj_id'] == $vo['sid']): ?>selected<?php endif; ?>><?php echo ($vo['sname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <span class="maroon">*</span>
                    </td>

                    <th width="120">选择性别:</th>
                    <td>
                    <select class="form-control"  name="sex" id="sex"  data-validation-engine="validate[required]"  data-errormessage-value-missing="必须选择性别">
                      <option value="">请选择性别</option>
                      <option value="1" <?php if($student['sex'] == 1): ?>selected<?php endif; ?>>男</option>
                      <option value="2" <?php if($student['sex'] == 2): ?>selected<?php endif; ?>>女</option>
                    </select>
                    <span class="maroon">*</span>
                    </td>
                </tr>

                <tr>
                    <th width="120">学员姓名:</th>
                    <td>
                    <input type="text" value="<?php echo ($student['s_name']); ?>" name="s_name" class="form-control" id="s_name" placeholder="请输入学员姓名"
                    data-validation-engine="validate[required,minSize[2]]"
                    data-errormessage-value-missing="请输入学员姓名!" >
                    <span class="maroon">*</span>
                    </td>

                    <th width="120">出生日期:</th>
                    <td>
                    <input type="input" data-validation-engine="validate[required]"  data-errormessage-value-missing="出生日期必填" class="form-control" id="birthdate" value="<?php if($student['birthdate'] != ''): echo ($student['birthdate']); endif; ?>" onClick="WdatePicker()" name="birthdate">
                    <!-- <input type="text" value="" class="form-control" placeholder="请输入出生日期"> -->
                    <span class="maroon">*</span>
                    </td>
                </tr>

                <tr>
                    <th width="120">家庭电话:</th>
                    <td>
                    <input type="text" name="homephone" id="homephone" value="<?php echo ($student['homephone']); ?>" class="form-control"
                    data-validation-engine="validate[required,funcCall[checkPhone]]" placeholder="请输入有效的家庭电话" placeholder="请输入家庭电话">
                    <span class="maroon">*</span>
                    </td>

                    <th width="120">联系手机:</th>
                    <td>
                    <input type="text" name="mobile" id="mobile" value="<?php echo ($student['mobile']); ?>" data-validation-engine="validate[required,funcCall[checkTel]]"  class="form-control"placeholder="请输入联系人手机">
                    <span class="maroon">*</span>
                    </td>
                </tr>

                <tr>
                    <th width="120">生效时间:</th>
                    <td>
                    <input type="input"  class="form-control" id="seffectivetime" value="<?php if($student['seffectivetime'] != ''): echo ($student['seffectivetime']); endif; ?>" onClick="WdatePicker()" name="seffectivetime">

                    </td>

                    <th width="120">终止时间:</th>
                    <td>
                    <input type="text" name="stheendtime"  class="form-control" id="stheendtime" value="<?php if($student['stheendtime'] != ''): echo ($student['stheendtime']); endif; ?>" onClick="WdatePicker()"  placeholder="请输入终止时间">

                    </td>
                </tr>

                 <tr>
                    <th width="120">&nbsp;</th>
                    <td>
                   <!--  <input type="amount" name="" value="<?php echo ($student['amount']); ?>"  data-validation-engine="validate[required,custom[number],min[0.0]]" class="form-control" placeholder="请输入学费金额"> -->
                   <!-- <?php if($list['jf_statu'] == 1): ?><font color="green">已缴费</font><?php else: ?><font color="red">未缴费<?php endif; ?></font> -->
                    </td>

                    <th width="120">备注:</th>
                    <td>
                    <input type="text" name="note" id="note" value="<?php echo ($student['note']); ?>" class="form-control" placeholder="请输入备注">

                    </td>
                </tr>

                <tr>
                <th><?php if($student['id'] != ''): ?><input type="text" hidden name="id" value="<?php echo ($student['id']); ?>"><?php endif; ?></th>
                    <td>
                   <a href="<?php echo U('School/students',array('token'=>session('token')));?>" class="btn btn-primary"><i class="mdi-navigation-cancel"></i>取消</a>
                    </td>
                     <th></th>
                    <td>
                     <input   type="submit"  class="btn btn-primary" value="保存"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
  </div>
</div>

<script src="/Public/User/js/select/js/comm.js"></script>
<script src="/Public/User/js/select/js/linkagesel-min.js"></script>
<script src="/Public/User/js/select/js/district-all.js"></script>
<script src="/Public/User/js/select/js/district-level1.js"></script>

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