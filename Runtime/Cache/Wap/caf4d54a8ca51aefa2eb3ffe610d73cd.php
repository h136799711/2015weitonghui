<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8" />
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css" href="/Public/Wap/car/css/reset.css" media="all" />
<link rel="stylesheet" type="text/css" href="/Public/Wap/car/css/common.css" media="all" />
<link rel="stylesheet" type="text/css" href="/Public/Wap/car/css/datepicker_car.css" media="all" />
<script src="/Public/User/js/select/js/jquery.js"></script>
<script src="/Public/User/js/select/js/comm.js"></script>
<script src="/Public/User/js/select/js/linkagesel-min.js"></script>
<script type="text/javascript" src="/Public/Wap/car/js/jquery_ui.js"></script>
<script type="text/javascript" src="/Public/Wap/car/js/category.js"></script>
<script type="text/javascript" src="/Public/Wap/car/js/bootstrap-datepicker.js"></script>
<title><?php echo ($reser['title']); ?>-<?php echo ($reser['typename']); ?></title>

        <style>
            img{width:100%!important;}
        </style>
    </head>
    <body onselectstart="return true;" ondragstart="return false;">
                <style>
            #bookBody .pb_5{
                padding-bottom:10px!important;
            }
        </style>
        
        <script>
            $().ready(function(){
                var nowTemp = new Date();
                var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
                var ndate = $('#dateline').datepicker({
                        format:"yyyy-mm-dd",
                        onRender: function(date) {
                           return date.valueOf() < now.valueOf() ? 'disabled' : '';
                        }
                }).on("changeDate", function(date){
                        ndate.datepicker('hide');
                });
            });

    function submit(){
        var form = document.getElementById("form1");
        var obj = {truename:'',utel:'',dateline:'',wecha_id:'',rid:'',type:'',field1:'',sex:'',uinfo:'',age:'',txt33:'',txt44:'',txt55:'',yyks:'',yyzj:'',yybz:'',yy4:'',yy5:''};

                if('undefined' !== typeof(form.truename)){
                    obj.truename = form.truename.value;
                    if(obj.truename != null && obj.truename.length<=0){
                        alert("请输入您的真实姓名");return;
                    }
                }
                if('undefined' !== typeof(form.utel)){
                    obj.utel = form.utel.value;
                    if(obj.utel != null && obj.utel.length<=7){
                        alert("请输入正确的电话号码");return;
                    }
                }
                if('undefined' !== typeof(form.dateline)){
                    obj.dateline = form.dateline.value;
                    if(obj.dateline != null && obj.dateline.length<=7){
                        alert("请输入预约日期");return;
                    }
                }
                if('undefined' !== typeof(form.wechatid)){
                    obj.wecha_id = form.wecha_id.value;
                }

                if('undefined' !== typeof(form.type)){
                    obj.type = form.type.value;
                }
                if('undefined' !== typeof(form.uinfo)){
                    obj.uinfo = form.uinfo.value;
                }

                if('undefined' !== typeof(form.age)){
                    obj.age = form.age.value;
                }

             var obj = {
                 truename: form.truename.value,
                 utel: form.utel.value,
                 dateline: form.dateline.value,
                 wecha_id: form.wecha_id.value,
                 rid: form.rid.value,
                 type: form.type.value,
                 uinfo: form.uinfo.value,

                 sex:form.sex.value,
                 age:form.age.value,
                 txt33: form.txt33.value,
                 txt44: form.txt44.value,
                 txt55: form.txt55.value,
                 yyks:form.yyks.value,
                 yyzj:form.yyzj.value,
                 yybz:form.yybz.value,
                 yy4:form.yy4.value,
                 yy5:form.yy5.value
             }

        $.post("<?php echo U('Medical/add',array('token'=>$token,'wecha_id'=>$wecha_id,'addtype'=>$addtype));?>", obj,
            function(data) {
                //alert(data.msg+'--'+data.housetype);
                if (0 == data.errno) {
                    alert(data.msg);
                    var count = $(".ok").text();
                    count = 1+ parseInt(count);
                    $(".ok").text(count);
                    setTimeout(function(){
                        jumpurl(data.url);
                    },1500);
                    return;
                } else {
                    alert(data.msg);
                }
            },
        "json");

    }

function jumpurl(url){
    window.location.href = url;
}

        </script>
    <body onselectstart="return true;" ondragstart="return false;">
            <div id="bookBody" class="body">
            <header>
                <ul>
                    <li><img src="<?php echo ($reser['headpic']); ?>" style="width:100%;" /></li>
                </ul>
            </header>
            <section>
                <div class="pt_5 pb_5 pl_10 pr_10">
                    <dl class="list_book list_book_my">
                        <dd class="tbox">
                            <div><label><?php echo ((isset($reser['typename']) && ($reser['typename'] !== ""))?($reser['typename']):'我的订单'); ?></label></div>
                            <div class="align_right"><a href="<?php echo U('Medical/ReserveBooking',array('token'=>$token,'wecha_id'=>$wecha_id,'sid'=>$vo['id'],'bid'=>$vo['brand_id'],'getlist'=>1,'title'=>$title,'addtype'=>$reser['addtype']));?>" ><?php echo ((isset($count) && ($count !== ""))?($count):0); ?></a></div>
                        </dd>
                    </dl>
                </div>
                <div class="pb_5 pl_10 pr_10">
                    <dl class="list_book list_book_des">
                        <dd>
                            <div><label>订单说明</label></div>
                            <div style="word-break:break-all;word-wrap:nowrap;white-space:normal;padding: 15px 0;"><?php echo ($reser['info']); ?></div>
                        </dd>
                    </dl>
                </div>
                <div class="pb_5 pl_10 pr_10">
                    <dl class="list_book list_book_contact">
                        <dd>
                            <div>
                                <a href="{gr-U('Wap/Map/location')}?lng=<?php echo ($reser['lng']); ?>&lat=<?php echo ($reser['lat']); ?>&title=来院路线&info=温馨提示：<?php echo ($reser['address']); ?>">
                                    <span>地址：<?php echo ($reser['address']); ?></span>
                                </a></div>
                            <div style="padding-top: 3px;"><a href="tel:<?php echo ($reser['tel']); ?>"><span>订单电话： <?php echo ($reser['tel']); ?></span></a></div>
                        </dd>
                    </dl>
                </div>

                <div class="pb_5 pl_10 pr_10" <?php if($reser['truename'] != ''): ?>style="display:none;"<?php endif; ?>>
                    <dl class="list_book list_book_my">
                        <dd class="round roundyellow">
                            <div >
                                <a href="<?php echo U('Car/changeCarinfo',array('token'=>$token,'wecha_id'=>$wecha_id));?>"><span>请完善个人资料再填表单</span></a>
                            </div>
                        </dd>
                    </dl>
                </div>
                <div class="pb_5 pl_10 pr_10">
<form id="form1" action="javascript:submit();" method="post" >
                        <input type="hidden" name="wecha_id" id="wecha_id" value="<?php echo ($wecha_id); ?>" />
                        <input type="hidden" name="rid" id="rid" value="<?php echo ($reser['id']); ?>" />
                        <input type="hidden" name="type" id="type" value="<?php echo ($reser['addtype']); ?>" />
                        <dl class="list_book">
                            <dt><label>请认真填写表单</label></dt>
                            <dd class="tbox">
                                <div><label>患者姓名:</label></div>
                                <div><input type="text" name="truename" placeholder="请输入您的真实姓名" value="<?php echo ($reser['truename']); ?>"/></div>
                            </dd>
                            <dd class="tbox">
                                <div><label>联系电话：</label></div>
                                <div><input type="tel" name="utel" placeholder="请输入您的电话" value="<?php echo ($reser['utel']); ?>"/></div>
                            </dd>
                            <dd class="tbox">
                                <div><label>预约日期：</label></div>
                                <div><input type="text" name="dateline" placeholder="请选择预约日期" id="dateline" readonly="readonly"  value="<?php echo ($reser['dateline']); ?>" /></div>
                            </dd>

                            <dd class="tbox">
                                <div><label>患者性别：</label></div>
                                <div>
                                    <select name="sex">
                                <option value="1" <?php if($reser['sex'] == 1): ?>selected="selected"<?php endif; ?>>男</option>
                                <option value="2"<?php if($reser['sex'] == 2): ?>selected="selected"<?php endif; ?>>女</option>
                                    </select>
                                </div>
                            </dd>
                              <dd class="tbox">
                                <div><label>患者年龄:</label></div>
                                <div>
                                  <input type="number" name="age" id="age"  value="<?php echo ($reser['age']); ?>" placeholder="请输入您的年龄"  />
                                </div>
                            </dd>
                            <dd class="tbox"<?php if($reser['txt3'] == ''): ?>style="display:none;"<?php endif; ?>>
                                <div><label><?php echo ($reser['txt3']); ?></label></div>
                                <div>
                                  <input type="text" name="txt33" id="txt33" value="" placeholder="<?php echo ($reser['value3']); ?>"  />
                                </div>
                            </dd>
                            <dd class="tbox"<?php if($reser['txt4'] == ''): ?>style="display:none;"<?php endif; ?>>
                                <div><label><?php echo ($reser['txt4']); ?></label></div>
                                <div>
                                  <input type="text" name="txt44" id="txt44" value="" placeholder="<?php echo ($reser['value4']); ?>"  />
                                </div>
                            </dd>
                             <dd class="tbox"<?php if($reser['txt5'] == ''): ?>style="display:none;"<?php endif; ?>>
                                <div><label><?php echo ($reser['txt5']); ?></label></div>
                                <div>
                                  <input type="text" name="txt55" id="txt55" value="" placeholder="<?php echo ($reser['value5']); ?>"  />
                                </div>
                            </dd>

                             <dd class="tbox">
                                <div><label><?php echo ((isset($reser['select1']) && ($reser['select1'] !== ""))?($reser['select1']):'预约科室'); ?>：</label></div>
                                <div>
                                    <select name="yyks">
                                    	<?php if(is_array($svalue1)): $i = 0; $__LIST__ = $svalue1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>
                            </dd>
                            <dd class="tbox">
                                <div><label><?php echo ((isset($reser['select2']) && ($reser['select2'] !== ""))?($reser['select2']):'预约专家'); ?>：</label></div>
                                <div>
                                    <select name="yyzj">
                                        <?php if(is_array($svalue2)): $i = 0; $__LIST__ = $svalue2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>
                            </dd>
                             <dd class="tbox">
                                <div><label><?php echo ((isset($reser['select3']) && ($reser['select3'] !== ""))?($reser['select3']):'预约病种'); ?>：</label></div>
                                <div>
                                    <select name="yybz">
                                        <?php if(is_array($svalue3)): $i = 0; $__LIST__ = $svalue3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>
                            </dd>
                             <dd class="tbox" <?php if($reser['select4'] == ''): ?>style="display: none;"<?php endif; ?>>
                                <div><label><?php echo ($reser['select4']); ?>：</label></div>
                                <div>
                                    <select name="yy4">
                                        <?php if(is_array($svalue4)): $i = 0; $__LIST__ = $svalue4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>
                            </dd>
                             <dd class="tbox" <?php if($reser['select5'] == ''): ?>style="display: none;"<?php endif; ?>>
                                <div><label><?php echo ($reser['select5']); ?>：</label></div>
                                <div>
                                    <select name="yy5">
                                        <?php if(is_array($svalue5)): $i = 0; $__LIST__ = $svalue5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>
                            </dd>
                            <dd class="tbox">
                                <div><label><?php echo ((isset($reser['datename']) && ($reser['datename'] !== ""))?($reser['datename']):'备注信息'); ?>：</label></div>
                                <div><textarea name="uinfo" placeholder="请输入备注信息" style="height:80px;"></textarea></div>
                            </dd>
                        </dl>
                        <div style="margin:10px;text-align: center;">
                            <input type="submit" value="提交订单" class="btn_submit"  style="margin:10px auto;text-align: center;cursor:pointer">
                        </div>
</form>
                </div>
            </section>
            
        </div>

    </body>             
   
</html>