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
<title><?php echo ($reser['title']); ?></title>



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
        var obj = {truename:'',tel:'',dateline:'',wecha_id:'',rid:'',type:'',timepart:'',info:'',housetype:'',carnum:'',km:'',choose:''};

                if('undefined' !== typeof(form.truename)){
                    obj.truename = form.truename.value;
                    if(obj.truename != null && obj.truename.length<=0){
                        alert("请输入您的真实姓名");return;
                    }
                }
                if('undefined' !== typeof(form.tel)){
                    obj.tel = form.tel.value;
                    if(obj.tel != null && obj.tel.length<=7){
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
                if('undefined' !== typeof(form.carnum)){
                    obj.carnum = form.carnum.value;
                }
                if('undefined' !== typeof(form.km)){
                        obj.km = form.km.value;
                 }

                if('undefined' !== typeof(form.type)){
                    obj.type = form.type.value;
                }
                // if('undefined' !== typeof(form.field1)){
                //     obj.field1 = form.field1.value;
                // }

                if('undefined' !== typeof(form.timepart)){
                    obj.timepart = form.timepart.value;
                }

                if('undefined' !== typeof(form.info)){
                    obj.info = form.info.value;
                }

                if('undefined' !== typeof(form.housetype)){
                    obj.housetype = form.housetype.value;
                }

             var obj = {
                 truename: form.truename.value,
                 tel: form.tel.value,
                 dateline: form.dateline.value,
                 housetype:form.housetype.value, //品牌 系列
                 wecha_id: form.wecha_id.value,
                 rid: form.rid.value,
                 type: form.type.value,
                 carnum:form.carnum.value,
                 km:form.km.value,
                 //field1: form.field1.value,
                 timepart: form.timepart.value,
                 info: form.info.value,
                 choose:form.choose.value,
             }

        $.post("<?php echo U('Car/add',array('token'=>$token,'wecha_id'=>$wecha_id,'addtype'=>$addtype));?>", obj,
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
                            <div><label>我的订单</label></div>
                            <div class="align_right"><a href="<?php echo U('Car/ReserveBooking',array('token'=>$token,'wecha_id'=>$wecha_id,'sid'=>$vo['id'],'bid'=>$vo['brand_id'],'getlist'=>1,'title'=>$title,'addtype'=>$reser['addtype']));?>" ><?php echo ($count); ?></a></div>
                        </dd>
                    </dl>
                </div>
                <div class="pb_5 pl_10 pr_10">
                    <dl class="list_book list_book_des">
                        <dd>
                            <div><label>订单说明</label></div>
                            <div style="word-break:break-all;word-wrap:nowrap;white-space:normal;padding: 15px 0;"><?php echo (html_entity_decode($reser['info'])); ?></div>
                        </dd>
                    </dl>
                </div>
                <div class="pb_5 pl_10 pr_10">
                    <dl class="list_book list_book_contact">
                        <dd>
                            <div>
                                <a href="{gr-U('Wap/Map/location')}?lng=<?php echo ($reser['lng']); ?>&lat=<?php echo ($reser['lat']); ?>&title=<?php echo ($reser['title']); ?>&info=温馨提示：<?php echo ($reser['address']); ?>">
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
                        <!--input type="hidden" name="aid" id="aid" value="3453" /-->
                        <input type="hidden" name="type" id="type" value="<?php echo ($reser['addtype']); ?>" />
                        <!--input type="hidden" name="autoid" id="autoid" value="255" /-->
                        <dl class="list_book">
                            <dt><label>请认真填写表单</label></dt>
                            <dd class="tbox">
                                <div><label>联系人:</label></div>
                                <div><input type="text" name="truename" placeholder="请输入您的真实姓名" value="<?php echo ($reser['truename']); ?>"/></div>
                            </dd>
                            <dd class="tbox">
                                <div><label>联系电话：</label></div>
                                <div><input type="tel" name="tel" placeholder="请输入您的电话" value="<?php echo ($reser['user_tel']); ?>"/></div>
                            </dd>

                            <dd class="tbox">
                                <div><label>品牌/车系</label></div>
                                <div>
                                 <input type="text" name="housetype" id="housetype" value="<?php echo ($reser['housetype']); ?>" />
                                </div>
                            </dd>
                            <dd class="tbox">
                                <div><label>车型</label></div>
                                <div>
                                 <input type="text" name="choose" id="choose" value="<?php echo ($reser['choose']); ?>" />
                                </div>
                            </dd>

                            <?php if($addtype == 'maintain'): ?><dd class="tbox">
                                <div><label>车牌</label></div>
                                <div>
                                   <input type="text" name="carnum" id="carnum" value="<?php echo ($reser['carnum']); ?>" placeholder="如：京M 88888"/>
                                </div>
                            </dd>
                            <dd class="tbox">
                                <div><label>公里数</label></div>
                                <div>
                                  <input type="number" name="km" id="km"  value="<?php echo ($reser['km']); ?>" placeholder="请输入您的公里数"  />
                                </div>
                            </dd>
                            <?php else: ?>
                             <input type="hidden" name="carnum" id="carnum" value="w" placeholder="如：京M 88888"/>
                             <input type="hidden" name="km" id="km"  value="0" placeholder="请输入您的公里数"  /><?php endif; ?>
                            <dd class="tbox">
                                <div><label>预约日期：</label></div>
                                <div><input type="text" name="dateline" id="dateline" readonly="readonly" placeholder="" value="<?php echo ($reser['dateline']); ?>" /></div>
                            </dd>
                            <dd class="tbox">
                                <div><label>预约时间：</label></div>
                                <div>
                                    <select name="timepart">
                                    <option value="0:00-1:00">0:00-1:00</option><option value="1:00-2:00">1:00-2:00</option><option value="2:00-3:00">2:00-3:00</option><option value="3:00-4:00">3:00-4:00</option><option value="4:00-5:00">4:00-5:00</option><option value="5:00-6:00">5:00-6:00</option><option value="6:00-7:00">6:00-7:00</option><option value="7:00-8:00">7:00-8:00</option><option value="8:00-9:00">8:00-9:00</option><option value="9:00-10:00">9:00-10:00</option><option value="10:00-11:00">10:00-11:00</option><option value="11:00-12:00">11:00-12:00</option><option value="12:00-13:00">12:00-13:00</option><option value="13:00-14:00">13:00-14:00</option><option value="14:00-15:00">14:00-15:00</option><option value="15:00-16:00">15:00-16:00</option><option value="16:00-17:00" selected>16:00-17:00</option><option value="17:00-18:00">17:00-18:00</option><option value="18:00-19:00">18:00-19:00</option><option value="19:00-20:00">19:00-20:00</option><option value="20:00-21:00">20:00-21:00</option><option value="21:00-22:00">21:00-22:00</option><option value="22:00-23:00">22:00-23:00</option><option value="23:00-24:00">23:00-24:00</option></select>
                                </div>
                            </dd>
                            <dd class="tbox">
                                <div><label>备注：</label></div>
                                <div><textarea name="info" placeholder="请输入备注信息" style="height:80px;"></textarea></div>
                            </dd>
                        </dl>
                        <div style="margin:10px;text-align: center;">
                            <input type="submit" value="提交订单" class="btn_submit"  style="margin:10px auto;text-align: center;cursor:pointer">
                        </div>
</form>
                </div>
            </section>
            <!--  <footer class="nav_footer">
                <ul class="box">
                    <li><a href="javascript:history.go(-1);" >返回</a></li>
                    <li><a href="javascript:history.go(1);" >前进</a></li>
                    <li><a href="<?php echo U('Index/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>" >首页</a></li>
                    <li><a href="javascript:location.reload();" >刷新</a></li>
                </ul>
</footer> -->

    <span class="copyright" >
    <?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
    <?php else: ?>
    <?php echo ($siteCopyright); endif; ?>
    </span>
<!-- <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<?php if($radiogroup > 8): ?><br>
<br><?php endif; ?>
<script>
function displayit(n){
	for(i=0;i<4;i++){
		if(i==n){
			var id='menu_list'+n;
			if(document.getElementById(id).style.display=='none'){
				document.getElementById(id).style.display='';
				document.getElementById("plug-wrap").style.display='';
			}else{
				document.getElementById(id).style.display='none';
				document.getElementById("plug-wrap").style.display='none';
			}
		}else{
			if($('#menu_list'+i)){
				$('#menu_list'+i).css('display','none');
			}
		}
	}
}
function closeall(){
	var count = document.getElementById("top_menu").getElementsByTagName("ul").length;
	for(i=0;i<count;i++){
		document.getElementById("top_menu").getElementsByTagName("ul").item(i).style.display='none';
	}
	document.getElementById("plug-wrap").style.display='none';
}

document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
</script>   -->
<script type="text/javascript">
window.shareData = {
            "moduleName":"Car",
            "moduleID":"11",
            "imgUrl": "",
            "sendFriendLink": "<?php echo C('site_url'); echo U('Car/index',array('token'=>$token));?>",
            "tTitle": "微汽车",
            "tContent": "微汽车"
        };
</script>
<?php echo ($shareScript); ?>
        </div>

    </body>

</html>