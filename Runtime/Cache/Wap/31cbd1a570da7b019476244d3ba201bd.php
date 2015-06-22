<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="">
<title><?php echo ($Guajiang["title"]); ?></title>
<link href="/Public/Wap/css/guajiang/css/activity-style.css?<?php echo date('Y-m-d',time());?>" rel="stylesheet" type="text/css">


<script src="/Public/Wap/css/guajiang/js/jquery.js" type="text/javascript"></script>
<script src="/Public/Wap/css/guajiang/js/alert.js" type="text/javascript"></script>

<script type="text/javascript">
 function loading(canvas, options) {
            this.canvas = canvas;
            if (options) {
                this.radius = options.radius || 12;
                this.circleLineWidth = options.circleLineWidth || 4;
                this.circleColor = options.circleColor || 'lightgray';
                this.moveArcColor = options.moveArcColor || 'gray';
            } else {
                this.radius = 12;
                this.circelLineWidth = 4;
                this.circleColor = 'lightgray';
                this.moveArcColor = 'gray';
            }
        }
        loading.prototype = {
            show: function () {
                var canvas = this.canvas;
                if (!canvas.getContext) return;
                if (canvas.__loading) return;
                canvas.__loading = this;
                var ctx = canvas.getContext('2d');
                var radius = this.radius;
                var me = this;
                var rotatorAngle = Math.PI * 1.5;
                var step = Math.PI / 6;
                canvas.loadingInterval = setInterval(function () {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    var lineWidth = me.circleLineWidth;
                    var center = { x: canvas.width / 2, y: canvas.height / 2 };

                    ctx.beginPath();
                    ctx.lineWidth = lineWidth;
                    ctx.strokeStyle = me.circleColor;
                    ctx.arc(center.x, center.y + 20, radius, 0, Math.PI * 2);
                    ctx.closePath();
                    ctx.stroke();
                    //在圆圈上面画小圆   
                    ctx.beginPath();
                    ctx.strokeStyle = me.moveArcColor;
                    ctx.arc(center.x, center.y + 20, radius, rotatorAngle, rotatorAngle + Math.PI * .45);
                    ctx.stroke();
                    rotatorAngle += step;

                }, 100);
            },
            hide: function () {
                var canvas = this.canvas;
                canvas.__loading = false;
                if (canvas.loadingInterval) {
                    window.clearInterval(canvas.loadingInterval);
                }
                var ctx = canvas.getContext('2d');
                if (ctx) ctx.clearRect(0, 0, canvas.width, canvas.height);
            }
        };
</script>
<?php if($wecha_id != ''): ?><script src="/Public/Wap/css/guajiang/js/wScratchPad.js" type="text/javascript"></script><?php endif; ?>
</head>




<body data-role="page" class="activity-scratch-card-winning">





<?php if($Guajiang['usenums'] == 3): ?><div class="main">
		<div class="banner"><img src="/Public/Wap/css/guajiang/images/activity-scratch-card-end2.jpg"></div>
		<div class="content" style="margin-top:-5px">
			<div class="boxcontent boxwhite">
				<div class="box">
					<div class="title-brown">活动结束说明：</div>
					<div class="Detail">
						<p><?php echo ($Guajiang["endinfo"]); ?>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="main">
<?php if($Guajiang['usenums'] != 2): ?><div class="cover">
	<img src="/Public/Wap/css/guajiang/images/activity-scratch-card-bannerbg.png">
	<div id="prize"><?php if($Guajiang['usenums']){?>刮奖次数已用完<?php }?></div>
	<div id="scratchpad"></div>
</div><?php endif; ?>
<div class="content">
	<!--zjl start-->
	<?php if($wecha_id != ''): ?><div id="zjl" <?php if($Guajiang['usenums'] != 2 ){?>style="display:none"<?php }?> class="boxcontent boxwhite">
		<div class="box">
			<div class="title-red"><span><if condition="$Guajiang['usenums'] neq 2">恭喜你中奖了<?php else: ?>您已经中过奖了<?php endif; ?></span></div>
			<div class="Detail">
				<p>您中了：<span class="red"><?php echo ($Guajiang["winprize"]); ?></span></p>
				<p class="red"> <?php echo ($Guajiang["sttxt"]); ?> </p>
				<?php if($record["phone"] == ''): ?><p>
            <input name=""  class="px" id="tel" value="" type="text" placeholder="请输入您的<?php echo ($Guajiang["renametel"]); ?>">
            <input name=""  class="px" id="wechaname" value="" type="text" placeholder="请输入您的微信号">
            <input name=""  id="wechaid" value="<?php echo ($record["wecha_id"]); ?>" type="hidden">
            <input name=""  id="lid" value="<?php echo ($record["lid"]); ?>" type="hidden">
            <input name=""  id="winprize" value="" type="hidden">
            <input name=""  id="rid" value="<?php echo ($record["id"]); ?>" type="hidden">
            </p>
            <p>
            <input class="pxbtn" name="提 交"  id="save-btn" type="button" value="用户提交">
            </p>
            <?php else: ?>
            <?php echo ($record["phone"]); endif; ?>
            <?php if($record["sendstatus"] == 0): ?><p><input name="" class="px" id="parssword" value="" placeholder="商家输入兑奖密码" type="password"></p>
            <p><input class="pxbtn" name="提 交" id="save-btnn" value="商家提交" type="button"></p>
            <?php else: ?>
            <p>已于<?php echo (date("Y-m-d",$record["sendtime"])); ?>兑奖</p><?php endif; ?>
			</div>
		</div>
	</div><?php endif; ?>
	<!--zjl end-->
	<?php if($wecha_id == ''): ?><div class="boxcontent boxwhite">
						<div class="box">
							<div class="title-brown">友情提醒：</div>
							<div class="Detail">
				<p style="color:#f00;line-height:160%">您可能是从朋友圈等分享过的页面打开的链接，无法直接参与此活动，如需参与此活动请按照以下步骤操作：<br>1、关注微信名称“<?php echo ($wxuser["wxname"]); ?>”或者微信号“<?php echo ($wxuser["weixin"]); ?>”<br>2、输入关键词：“<?php echo ($Guajiang["keyword"]); ?>”</p>            
               </div>
</div>
</div><?php endif; ?>
			
	<div class="boxcontent boxwhite">
		<div class="box">
			<div class="title-brown"><span>奖项说明：</span></div>
			<div class="Detail">
			<p class="red">打开不刮奖视为作废</p>
			<p>每人最多有<?php echo ($Guajiang["canrqnums"]); ?>次机会<?php if($Guajiang["daynums"] != 0): ?>，每天只能抽<?php echo ($Guajiang["daynums"]); ?>次<?php endif; ?></p>
			<p>这是您第 <span class="red" id="usenums"><?php echo ($Guajiang["usecout"]); ?></span> 次刮奖</p>
			 <?php echo $prizeStr;?>
			</div>
		</div>
	</div>
	<div class="boxcontent boxwhite">
		<div class="box">
			<div class="title-brown">活动说明：</div>
			
			<div class="Detail">
			<?php if ($Guajiang['statdate']>time()){echo '<p style="color:red">活动还没有开始 :(</p>';}?>
			<?php echo ($Guajiang["info"]); ?>
				<p>活动时间:<?php echo (date("Y-m-d",$Guajiang["statdate"])); ?>至<?php echo (date("Y-m-d",$Guajiang["enddate"])); ?></p>
				<p><?php echo ($Guajiang["txt"]); ?></p>				
							
			</div>
		</div>
	</div>
</div>
<div style="clear:both;"></div>
</div>	
</if>	
<div style="height:60px;"></div>
<style type="text/css">
#txt {
	color: #000000;
}
.footFix{width:100%;text-align:center;position:fixed;left:0;bottom:0;z-index:99;}
#footReturn a, #footReturn2 a {
display: block;
line-height: 41px;
color: #fff;
text-shadow: 1px 1px #282828;
font-size: 14px;
font-weight: bold;
}
#footReturn, #footReturn2 {
z-index: 89;
display: inline-block;
text-align: center;
text-decoration: none;
vertical-align: middle;
cursor: pointer;
width: 100%;
outline: 0 none;
overflow: visible;
Unknown property name.-moz-box-sizing: border-box;
box-sizing: border-box;
padding: 0;
height: 41px;
opacity: .95;
border-top: 1px solid #181818;
box-shadow: inset 0 1px 2px #b6b6b6;
background-color: #515151;
Invalid property value.background-image: -ms-linear-gradient(top,#838383,#202020);
background-image: -webkit-linear-gradient(top,#838383,#202020);
Invalid property value.background-image: -moz-linear-gradient(top,#838383,#202020);
Invalid property value.background-image: -o-linear-gradient(top,#838383,#202020);
background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#838383),to(#202020));
Invalid property value.filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#838383',endColorstr='#202020');
Unknown property name.-ms-filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#838383',endColorstr='#202020');
}

</style>
<div class="footFix" id="footReturn"><a href="javascript:void(0)" onClick="location.href='<?php echo U('Wap/Index/index',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id']));?>';"><span>返回3G网站</span></a></div>

<style type="text/css">
.window {
	width:290px;
	position:absolute;
	display:none;
	bottom:30px;
	left:50%;
	 z-index:9999;
	margin:-50px auto 0 -145px;
	padding:2px;
	border-radius:0.6em;
	-webkit-border-radius:0.6em;
	-moz-border-radius:0.6em;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	-o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	font:14px/1.5 Microsoft YaHei,Helvitica,Verdana,Arial,san-serif;
}
.window .title {
	
	background-color: #A3A2A1;
	line-height: 26px;
    padding: 5px 5px 5px 10px;
	color:#ffffff;
	font-size:16px;
	border-radius:0.5em 0.5em 0 0;
	-webkit-border-radius:0.5em 0.5em 0 0;
	-moz-border-radius:0.5em 0.5em 0 0;
	background-image: -webkit-gradient(linear, left top, left bottom, from( #585858 ), to( #565656 )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient(#585858, #565656); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient(#585858, #565656); /* FF3.6 */
	background-image:     -ms-linear-gradient(#585858, #565656); /* IE10 */
	background-image:      -o-linear-gradient(#585858, #565656); /* Opera 11.10+ */
	background-image:         linear-gradient(#585858, #565656);
	
}
.window .content {
	/*min-height:100px;*/
	overflow:auto;
	padding:10px;
	background: linear-gradient(#FBFBFB, #EEEEEE) repeat scroll 0 0 #FFF9DF;
    color: #222222;
    text-shadow: 0 1px 0 #FFFFFF;
	border-radius: 0 0 0.6em 0.6em;
	-webkit-border-radius: 0 0 0.6em 0.6em;
	-moz-border-radius: 0 0 0.6em 0.6em;
}
.window #txt {
	min-height:30px;font-size:16px; line-height:22px;
}
.window .txtbtn {
	
	background: #f1f1f1;
	background-image: -webkit-gradient(linear, left top, left bottom, from( #DCDCDC ), to( #f1f1f1 )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffffff , #DCDCDC ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffffff , #DCDCDC ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffffff , #DCDCDC ); /* IE10 */
	background-image:      -o-linear-gradient( #ffffff , #DCDCDC ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffffff , #DCDCDC );
	border: 1px solid #CCCCCC;
	border-bottom: 1px solid #B4B4B4;
	color: #555555;
	font-weight: bold;
	text-shadow: 0 1px 0 #FFFFFF;
	border-radius: 0.6em 0.6em 0.6em 0.6em;
	display: block;
	width: 100%;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
	text-overflow: ellipsis;
	white-space: nowrap;
	cursor: pointer;
	text-align: windowcenter;
	font-weight: bold;
	font-size: 18px;
	padding:6px;
	margin:10px 0 0 0;
}
.window .txtbtn:visited {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #ffffff ), to( #cccccc )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffffff , #cccccc ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffffff , #cccccc ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffffff , #cccccc ); /* IE10 */
	background-image:      -o-linear-gradient( #ffffff , #cccccc ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffffff , #cccccc );
}
.window .txtbtn:hover {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #ffffff ), to( #cccccc )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffffff , #cccccc ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffffff , #cccccc ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffffff , #cccccc ); /* IE10 */
	background-image:      -o-linear-gradient( #ffffff , #cccccc ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffffff , #cccccc );
}
.window .txtbtn:active {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #cccccc ), to( #ffffff )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #cccccc , #ffffff ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #cccccc , #ffffff ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #cccccc , #ffffff ); /* IE10 */
	background-image:      -o-linear-gradient( #cccccc , #ffffff ); /* Opera 11.10+ */
	background-image:         linear-gradient( #cccccc , #ffffff );
	border: 1px solid #C9C9C9;
	border-top: 1px solid #B4B4B4;
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3) inset;
}

.window .title .close {
	float:right;
	background-image: url();
	width:26px;
	height:26px;
	display:block;	
}
</style>
<div class="window" id="windowcenter">
	<div id="title" class="title">消息提醒<span class="close" id="alertclose"></span></div>
	<div class="content">
	 <div id="txt"></div>
	 <input type="button" value="确定" id="windowclosebutton" name="确定" class="txtbtn">	
	</div>
</div>
 
 
<?php if($wecha_id != ''): ?><script type="text/javascript">

        //window.prize = "<?php echo ($Guajiang["winprize"]); ?>";

        var zjl ="<?php echo ($Guajiang["zjl"]); ?>";
        var num = 0;
        var goon = true;
var winprize  = "<?php echo ($Guajiang["winprize"]); ?>";

$(function () {
		var useragent = window.navigator.userAgent.toLowerCase();
            $("#scratchpad").wScratchPad({
                width: 150,
                height: 40,
                color: "#a9a9a7",
                scratchMove: function () {
                    num++;
                    if (num == 2) {
                        document.getElementById('prize').innerHTML ="<?php echo ($Guajiang["winprize"]); ?>";
                    }
                    if (zjl>0 && num > 5 && goon) {
                        //$("#zjl").fadeIn();
                        goon = false; 
                        $("#zjl").slideToggle(500);
                        //$("#outercont").slideUp(500)
                    }
					if (useragent.indexOf("android 4") > 0) {
                        if ($("#scratchpad").css("color").indexOf("51") > 0) {
                            $("#scratchpad").css("color", "rgb(50,50,50)");
                        } else if ($("#scratchpad").css("color").indexOf("50") > 0) {
                            $("#scratchpad").css("color", "rgb(51,51,51)");
                        }
                    }

                }
            });
        });
        
      

$("#save-btn").bind("click",
	function() {
		var btn 	= $(this);
		var tel 	= $("#tel").val();
		var wxname	= $("#wechaname").val();
		var wechaid = $("#wechaid").val();
		var lid 	= $("#lid").val();
		 
		if (tel == '') {
	        alert("请认真输入<?php echo ($Guajiang["renametel"]); ?>");
	        return
    	}
		if(wxname == ''){
			alert("请认真输入微信号");
			return;
		}

		var submitData = {
			/*code: $("#sncode").text(),*/
			tel 	: tel,
			wxname	: wxname,
			wechaid : wechaid,
			lid 	: <?php echo ($Guajiang["id"]); ?>,
			rid 	: <?php echo ($record["id"]); ?>,
			action 	: "add"
		};

		$.post("<?php echo U('Wap/Guajiang/add');?>", submitData,
			function(data) {
				if (data.success == true) {
					alert(data.msg);
					$("#zjl").hide("slow");
					setTimeout("window.location.href = location.href",2000);
					return
				} else { 
					//alert('失败'+data);
					return
				}
			},"json")
});



$("#save-btnn").bind("click",
function () {
	var submitData = {
		id: <?php echo ($record["lid"]); ?>,
		rid: <?php echo ($record["id"]); ?>,
		parssword: $("#parssword").val()
	};

	$.post("<?php echo U('Wap/Guajiang/exchange');?>", submitData,
	function (data) {
		if (data.success == true) {
			alert(data.msg);
			if (data.changed == true) {
				setTimeout("window.location.href = location.href",2000);
			}
			return
		} else {alert(data.msg);}
	},
	"json")
});

</script><?php endif; ?>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Guajiang",
            "moduleID":"<?php echo ($Guajiang["id"]); ?>",
            "imgUrl": "<?php echo ($Guajiang["starpicurl"]); ?>", 
            "sendFriendLink": "<?php echo ($cfg_siteUrl); echo U('Guajiang/index',array('token'=>$token,'id'=>$Guajiang['id']));?>",
            "tTitle": "<?php echo ($Guajiang["title"]); ?>",
            "tContent": "<?php echo ($Guajiang["info"]); ?>"
};
</script>
<?php echo ($shareScript); ?>
</body></html>