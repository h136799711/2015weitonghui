<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>摇一摇</title>
	<style type="text/css">
		body{
			background-color: #000;
			background: url(<?php echo ($info['background']); ?>) no-repeat;
			margin: 0;
			padding: 0;
			min-height: 768px;
			min-width: 1024px;
			background-repeat: repeat;
			background-size: cover;
			overflow: hidden;
		}
		@-webkit-keyframes round{
			0{-webkit-transform:rotate(0)}
			100%{-webkit-transform:rotate(360deg)}
		}
		@-moz-keyframes round{
			0{-moz-transform:rotate(0)}100%{-moz-transform:rotate(360deg)}
		}
		@-o-keyframes round{
			0{-o-transform:rotate(0)}100%{-o-transform:rotate(360deg)}
		}
		@keyframes round{
			0{transform:rotate(0) } 100%{transform:rotate(360deg)}
		}
		.join_num{height:80px;line-height:80px;color:#fff;text-align:center;font-size:30px}
		.join_num em{color:#c63435}
		.round{border:1px solid rgba(255,255,255,0.5);margin:50px auto}
		.w300 {
			width: 298px;
			height: 298px;
			border-radius: 298px;
			margin-top: 0;
			overflow: hidden;
		}

		.w200 {
			width: 200px;
			height: 200px;
			border-radius: 200px;
		}

		.w100 {
			width: 100px;
			height: 100px;
			border-radius: 100px;
		}

		.w1 {
			width: 1px;
			height: 1px;
			border-radius: 1px;
			background-color: #fff;
			position: relative;
			top: -4px;
		}
		
		.line {
			width: 150px;
			height: 150px;
			border-left: 1px solid rgba(255,255,255,0.6);
			border-radius: 0 0 150px 0;
			background: -moz-linear-gradient(top,rgba(255,255,255,0),rgba(255,255,255,0.5));
			background: -ms-linear-gradient(top,rgba(255,255,255,0),rgba(255,255,255,0.5));
			background: -webkit-gradient(linear,40% 0,0 100%,from(rgba(255,255,255,0)),to(rgba(255,255,255,0.5)));
			position: absolute;
			left: 0;
			top: 0;
			-moz-transform: rotate(0);
			-moz-transform-origin: 0 0;
			-webkit-transform: rotate(0);
			-webkit-transform-origin: 0 0;
			-o-transform: rotate(0);
			-o-transform-origin: 0 0;
			transform: rotate(0);
			transform-origin: 0 0;
		}

		.roundMove {
			-webkit-animation: round 3s both linear infinite;
			-moz-animation: round 3s both linear infinite;
			-o-animation: round 3s both linear infinite;
			animation: round 3s both linear infinite;
		}
		
		.radar {
			width: 400px;
			height: 400px;
			overflow: hidden;
			position: absolute;
			left: 50%;
			/*margin-left: -200	px;*/
			top: 50%;
			margin-top: -185px;
			z-index: 100;
			/*display: none;*/
		}
		
		.user-item{position:absolute;left:20px;top:70px;width:50px;height:70px;overflow:hidden;text-align:center;opacity:0;}
		.user-item:nth-child(1){left:50px;top:150px}
		.user-item:nth-child(2){left:120px;top:70px}
		.user-item:nth-child(3){left:180px;top:100px}
		.user-item:nth-child(4){left:280px;top:90px}
		.user-item:nth-child(5){left:120px;top:180px}
		.user-item:nth-child(6){left:250px;top:200px}
		.user-item:nth-child(7){left:60px;top:260px}
		.user-item:nth-child(8){left:180px;top:240px}
		.user-item:nth-child(9){left:175px;top:320px}
		.user-item:nth-child(10){left:270px;top:280px}
		.user-item .user-img{width:50px;height:50px;overflow:hidden;border-radius:50px;background-color:#fff}
		.user-item .user-img img{width:44px;height:44px;border-radius:44px;overflow:hidden;display:block;margin:3px auto}
		.user-item p{height:20px;line-height:20px;overflow:hidden;text-align:center;color:#fff;font-size:12px;margin:0}

		.signup{
			position: absolute;
			left: 0;
			top: -91%;
			width: 100%;
			height: 91%;
			overflow: hidden;
			background-size: cover;
			z-index: 99999;

			top:0px;
			display: block;
			margin-left: 0px;
		}
		
		.signup .codeImg{
			display: block;
			width: 380px;
			height: 380px;
			position: absolute;
			left: 50%;
			margin-left: -190px;
			top: 50%;
			margin-top: -175px;
			z-index: 101;
			margin-left: -380px;
		}

		.start_btn{
			z-index: 999;
			position: absolute;
			width: 200px;
			height: 40px;
			line-height: 40px;
			overflow: hidden;
			text-align: center;
			font-size: 24px;
			color: #ff0;
			background-color: #c63435;
			border-radius: 3px;
			position: absolute;
			bottom: 10px;
			left: 50%;
			margin-left: -100px;
			cursor: pointer;
		}
		.top{			
			position: absolute;
			top:0px;
			height: 15%;
			width: 100%;
			margin: 0 auto;
			border-top: 1px solid rgba(255,255,255,0.5);
			border-bottom: 1px solid rgba(255,255,255,0.5);
			color: #fff;
			height: 80px;
			line-height: 80px;
			text-align: center;
			font-size: 34px;
			background-color: rgba(255,255,255,0.3);
		}
		.strong{
			color:#ffff00;
			font-weight: bold;
		}
		
		/*游戏跑道界面*/
		.gamepanel div{			
			transition: all 800ms ease-out;
			-webkit-transition: all 800ms ease-out;
		}
		.gamepanel{
			display: none;
			position: absolute;
			top: 15%;
			height:80%;
			left: 0;
			width: 90%;
			left: 50%;
			margin-left: -45%;
			transition: all 800ms ease-out;
			-webkit-transition: all 800ms ease-out;
		}
		.tracklist{
			overflow: hidden;
			width: 100%;
			position: relative;
		}
		.trackline{
			position: relative;
			width: 100%;
			background: url(/Public/static/shake/track.jpg) repeat-x;
			background-size: contain;
		}
		.track-start{
			position: absolute;
			background: url(/Public/static/shake/track_line.png) right center no-repeat;
			background-size: contain;
			top: 0;
			left: 0;
			text-align: center;
			color: #fff;
			font-family: Arial,Helvetica,sans-serif;
		}

		.track-end{
			position: absolute;
			background: url(/Public/static/shake/track_line.png) left center no-repeat;
			background-size: contain;
			top: 0;
			right: 0;
		}

		.leftfadein{
			-webkit-animation:leftfadein-keyframes .5s .2s ease both;
		}
		/* 玩家样式 */
		.player {
		position: absolute;
		width: 64px;
		height: 64px;
		overflow: visible;
		transition: all 1s;
		-webkit-transition: all .5s;
		-webkit-transition: all .5s;
		}
		.player .head {
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		left: 0;
		background: #fff no-repeat;
		background-size: contain;
		transition: all 1s;
		-webkit-transition: all .5s;
		-webkit-transition: all .5s;
		}
		.player .nickname {
		position: absolute;
		height: 70px;
		width: 200px;
		font-size: 20px;
		line-height: 70px;
		text-align: right;
		top: 50%;
		margin-top: -35px;
		left: -250px;
		color: #fff;
		}
		.shake {
		-webkit-backface-visibility: visible;
		-webkit-transform-origin: 50% 100%;
		-webkit-animation: shake_frames .3s 0 infinite ease normal none;
		}

		/* 晃动 */
		@-webkit-keyframes shake_frames{
			0{-webkit-transform:rotate(3deg)}
			24%{-webkit-transform:rotate(0)}
			49%{-webkit-transform:rotate(-3deg)}
			74%{-webkit-transform:rotate(0)}100%{-webkit-transform:rotate(3deg)}
		}
		/* 抖动 */
		@-webkit-keyframes leftfadein-keyframes{
			0{opacity:0;-webkit-transform:translateX(-100px)}
			60%{opacity:1;-webkit-transform:translateX(0)}
			80%{-webkit-transform:translateX(-10px)}
			100%{-webkit-transform:translateX(0)}
		}
		
		/*倒计时*/
		.countdown {
			position: absolute;
			width: 50%;
			height: 50%;
			top: 50%;
			left: 50%;
			display: none;
			text-align: center;
			color: #fff;
			z-index: 999;
		}
		.countdown-animation {
			-webkit-animation: cutdownan-keyframes 1000ms infinite ease both;
			-moz-animation: cutdownan-keyframes 1000ms infinite ease bot;
		}
		@-webkit-keyframes cutdownan-keyframes{
			0{opacity:0;-webkit-transform:scale(.3)}
			50%{opacity:1;-webkit-transform:scale(1.05)}
			70%{-webkit-transform:scale(.9)}
			100%{-webkit-transform:scale(6);opacity:0}
		}

		/*奖台*/
		.prizeset-masklayer{
			display: none;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0,0,0,0.6);
			z-index: 999;
		}
		.prizeset-label{
			display: none;
			text-align: center;
			width: 100%;
			height: 80px;
			line-height: 80px;
			font-size: 80px;
			position: absolute;
			left: 0;
			top: 50%;
			margin-top: -40px;
			color: #ff0;
			text-shadow: 0 0 5px #fff,0 0 10px #fff,0 0 15px #fff,0 0 40px #ffa225,0 0 70px #ffa342;
		}
		.prizeset-cup{
			display: none;
			position: absolute;
			width: 500px;
			height: 300px;
			background: url(/Public/static/shake/shake_cup.png) center bottom no-repeat;
			top: 50%;
			margin-top: -150px;
			left: 50%;
			margin-left: -250px;
			text-align: center;
		}
		.button {
			font-size: 18px;
			position: relative;
			margin: 16px 5px;
			bottom: -300px;
			color: #fff;
			display: inline-block;
			padding: 12px;
			border: 1px solid #fff;
			cursor: pointer;
			border-radius: 12px;
			-moz-border-radius: 12px;
			-webkit-border-radius: 12px;
			background-color: #4f4b4b;
			background: -moz-linear-gradient(top,#4f4b4b,#0f070a);
			background: -ms-linear-gradient(top,#4f4b4b,#0f070a);
			background: -webkit-gradient(linear,0 0,0 100%,from(#4f4b4b),to(#0f070a));
		}
		.prizeset-cup .nickname{
			display: none;
		}

		/* alert 重写后的样式 */
		 .mask{
		      width: 99999px;
		      height: 99999px;
		      background: rgba(85, 85, 85, 0.55);
		      position: absolute;
		      z-index: 10000;
		      top: 0px;

		}
		.goorayealert{
		      display: none;
		      background: #f8f8f8;
		      padding: 15px;
		      top:100px;
		      width:460px;
		      position: absolute;
		      left: 50%;
		      z-index: 15;
		      margin-left: -230px;

		}
		.alertcontent {
		      background-color: #fff;
		}
		.close:hover{
		      color:#000;
		}
		.close{
		      float: right;
		      font-size: 21px;
		      font-weight: bold;
		      line-height: 1;
		      color: #000;
		      top:-6px;
		      text-shadow: 0 1px 0 #fff;
		      opacity: .2;
		      filter: alpha(opacity=20);
		      cursor: pointer;
		      position: relative;
		}
	</style>	

	<script type="text/javascript">
		/* TODO */
window.alert = function (cont){
	cont = cont || argument[0];
      if(!$(".goorayealert") || $(".goorayealert").length == 0){
         $alert = "<div class='mask'><div class='goorayealert'><span class='alertcontent'>警告</span><button type='button' class='close' >×</button></div></div>";
        $("body").append($alert);
        $(".mask").css("width",$(window).width());
        $(".mask").click(function(ev){
                if(ev.target && ev.target.className.indexOf("mask") == -1){
                          return ;
                }
                $(".mask").hide();
                $alert.slideUp(800);
        });
        $(".goorayealert .close").click(function(ev){
                $(".mask").hide();
                $alert.slideUp(800);
                ev.stopPropagation();
        });
       $(".goorayealert .alertcontent").text(cont);
        $alert = $(".goorayealert");
        $alert.slideDown(800);

      }else{
      	$(".goorayealert .alertcontent").text(cont);
          $(".mask").show();
          $(".goorayealert").slideDown(800);
      }

        $(".goorayealert").css("top",$(window).scrollTop()+50);
    }

	</script>

	<style type="text/css">
		body{
			margin: 0px;
		}
		ul{
			list-style: none;
			padding: 0;
			margin: 0;
		}
		.result-mask{
			display: none;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.5);
			z-index: 1000;
			position: absolute;
			top: 0px;
			left: 0px;
		}
		.result-panel{
			z-index: 1001;
			position: absolute;
			width: 80%;
			height: 80%;
			left: 10%;
			background: #f8f8f8;
			top: 5%;
		}
		.result-panel .title{
			font-weight: bold;
			color: #000;
			height: 36px;
			padding: 10px;
		}
		.result-panel .close{
			width: 36px;
			height: 36px;
			font-size: 32px;
			text-align: center;
			position: absolute;
			right: 0px;
			top: 0px;
			cursor: pointer;
		}
		.result-panel .close:hover{
			background-color: #f0f0f0;
		}
		.tablist{
			background-color: #777;
			padding-left: 10px;
			padding-right: 10px;
			width: 95%;
			float:left;
		}
		.tablist  ul{
			float:left;
			list-style-type: none;
			-webkit-padding-start: 0px;
			-webkit-margin-before: 0px;
			-webkit-margin-after: 0px;
		}
		.tablist  li{
			float:left;
			padding:10px;
			color:#f8f8f8;
			cursor: pointer;
		}
		.tablist  li.active{
			font-weight: bold;
			background: #fff;
			color: #000;
		}
		.tabcontent {
			background: #fff;
			padding-left: 30px;
		}
		.tabcontent  ul li{
			float: left;
			margin: 0 70px 10px 0;
		}
		.tabcontent  li span {
			display: block;
			width: 130px;
			height: 40px;
			line-height: 40px;
			font-size: 18px;
			text-align: center;
		}
		.member-avatar {
			width: 130px;
			height: 130px;
			background: #c0bebe;
			position: relative;
		}
		
		.member-avatar img {
			width: 130px;
			height: 130px;
			position: absolute;
			top: -5px;
			left: -5px;
		}


		.clearfix:after {
			visibility: hidden;
			display: block;
			font-size: 0;
			col-xs-9 col-sm-9  col-md-10 col-lg-10 : " ";
			clear: both;
			height: 0;
		}
		.clearfix { display: inline-table; }
		/* Hides from IE-mac \*/
		* html .clearfix { height: 1%; }
		.clearfix { display: block; }

		.btns{
			position: absolute;
			left: 50%;
			margin-left: -50px;
			color: #fff;
			bottom: 10px;
		}
		.btndel{
			text-decoration: none;
			/*position: initial;*/
			background-color: #f40;
			background: -webkit-gradient(linear,0 0,0 100%,from(#f40),to(#f00));
			margin: 0px;
		}

		.disabled{
			background: #777;
			cursor: not-allowed;
		}

		.ewm{
			position: absolute;
			left: 10%;
			top: 10px;
		}

		.ewm img{
			width: 64px;
			height: 64px;
		}
	</style>
	
	<script type="text/javascript" src="http://libs.useso.com/js/jquery/1.10.2/jquery.min.js"></script>
	
	<script type="text/javascript" >

		var Shake  = {};

		Shake.goal =  <?php echo ($info["endshake"]); ?> ;
		
		Shake.playersTop = [];

		Shake.trackWidth = 640;

		Shake.trackHeight = 64;

		Shake.showplayers = <?php echo ($info["shownum"]); ?>;

		//状态 0：未开始/重新开始 1：已开始 2：进行中 3：展示结果 4：结束
		Shake.state = 0;

		//刷新频率2个像素
		Shake.velocityX = 2;

		//轮询时间
		Shake.loopGetDelta = [];

		Shake.loopGetDelta['pollingPlayers'] = 2000;
		Shake.loopGetDelta['joinuser'] = 3000;
		Shake.loopGetDelta['countdown'] = 1000;

		Shake.audio = [];

		function readyAudio(){	
			if(!Shake.audio["countdown"]){
				Shake.audio["countdown"] =document.getElementById('audio_countdown');		
			}
			if(!Shake.audio["gameover"]){
				Shake.audio["gameover"] = document.getElementById('audio_gameover');			
			}
			if(!Shake.audio['topchange']){
				Shake.audio["topchange"] = document.getElementById('audio_topchange');				
			}

		}
		Shake.audioPlayTopChange = function(){
			Shake.audio["topchange"].play();
		}
		Shake.ready = function(){ 
			Shake.state = 0;
			$('.prizeset-masklayer').hide();	
			$('.top').show();
			$('.signup').show();
			$('.gamepanel').hide();			
			pollingJoinUser();
			readyAudio();
			$('.button.btndel').removeClass("disabled").bind("click",delLastResult);
			$.ajax({
			type: "post",
			url : "<?php echo U('Shake/restart');?>",
			dataType:'text',
			data: 'token=<?php echo ($info["token"]); ?>&id=<?php echo ($info["id"]); ?>',
			}).fail(function(){
				// alert("重新开始失败，请重试！");
			}).done(function(data){
				
			});
		}

		Shake.start = function(){ 
			Shake.state = 1;
			start();
			readyAudio();
		}
		
		Shake.round = 1;

		Shake.isStart = function() { return Shake.state === 1; }

		Shake.running = function(){ Shake.state = 2; }		

		Shake.isRunning = function() { return Shake.state === 2; }

		Shake.gameover = function(){ Shake.state = 4; }

		Shake.isGameover = function() { return Shake.state === 4; }

		//
		function removeLastResult(){
			$(".tablist li").last().remove();
			$(".tabcontent >div").last().remove();
		}

		function delLastResult(){
			// $($(".tablist li").get(round)).empty();
			// $($(".tabcontent >div").get(round)).empty();

			if(window.confirm("确定删除此次结果！")){
				
			$.ajax({
				type:"post",
				url:"<?php echo U('Shake/delLastResult');?>",
				dataType:'text',
				data: '&token=<?php echo ($info["token"]); ?>&id=<?php echo ($info["id"]); ?>',
				beforeSend:function(){
					$('.button.btndel').addClass("disabled");
				}
			}).done(function(data){
				if(data){
					$('.button.btndel').removeClass("disabled");
					alert(data);
				}else{
					
					removeLastResult();
					alert("删除成功！");
				}
			}).fail(function(){
				alert("操作失败！");
			});

			}

		}
		//cache
		// Shake.cache = [];

		function initTab(){
			$(".tabcontent >div").hide();
			var index = $(".tablist li").index($(".tablist li.active"));
			$($(".tabcontent >div").get(index)).addClass("active").show();
			// if(index >= 0){
			// 	$(".btns .btndel").show().text("删除第"+ (index+1) +"轮结果").attr("data-round",index);
			// }else{
			// 	$(".btns .btndel").hide();
			// }
			$(".tablist li").click(function(){
				$(".tablist li.active").removeClass("active");
				$(this).addClass("active");
				$(".tabcontent  .active").hide().removeClass("active");
				index = $(".tablist li").index(this);
				// $(".btns .btndel").text("删除第"+(index+1)+"轮结果").attr("data-round",index);
				
				$($(".tabcontent >div").get(index)).addClass("active").show();				
			});

			$('.result-panel .close').click(function(){
				$('.result-mask').hide();
			})
		
		}
		function saveThisResult(){
			// $.ajax({
			// 	type:"post",
			// 	url:"<?php echo U('Shake/saveThisResult');?>",
			// 	dataType:'text',
			// 	data: '&token=<?php echo ($info["token"]); ?>&id=<?php echo ($info["id"]); ?>',
			// 	beforeSend:function(){
			// 		$('.button.save').addClass("disabled").unbind("click",saveThisResult);
			// 		// disabled(".save");
			// 	}
			// }).fail(function(){
			// 	alert("保存失败，请重试！");
			// }).done(function(data){
			// 	if(data){					
			// 		alert(data);

			// 		$('.button.save').bind("click",saveThisResult);
			// 		// enable(".save");
			// 	}else{
			// 		alert("保存成功！");

			// 		$('.button.save').addClass("disabled").unbind("click",saveThisResult);
			// 		// disabled(".save");
			// 	}
			// });
		}
		//展示所有的游戏结果的前三名
		function showAllResult(){

			function createRank(rank,headurl,nickname){
				var tabcontent = '<li><span>第'+rank+'名</span><div class="member-avatar"><img src="'+headurl+'"></div><span>'+nickname+'</span></li>';
				return tabcontent ;
			}
			//获取数据
			$.ajax({
				type:"post",
				url:"<?php echo U('Shake/getAllResult');?>",
				dataType:'json',
				data: 'token=<?php echo ($info["token"]); ?>&id=<?php echo ($info["id"]); ?>',
			}).fail(function(){
				alert("获取失败，请重试！");
			}).done(function(data){
				
				var prevCount = $(".result-mask .tablist ul li").length;
				// console.log(data);
				for(var i=prevCount;i<data.length;i++){
					var players = '';

					$("<li>第"+(i+1)+"轮</li>").appendTo(".result-mask .tablist ul");
					
					for(var j=0;j<data[i].length;j++){
						players += createRank(j+1,data[i][j].headurl,data[i][j].nickname);
					}
					$('<div><ul class="clearfix">'+players+"</ul></div>").appendTo(".result-mask .tabcontent ");
				}

				$(".result-mask .tablist ul li").removeClass("active");
				$(".result-mask .tablist ul li").last().addClass("active");
				initTab();
				$('.result-mask').show();
			});
			
		}

		//再玩一次

		function playAgian(){
			$.ajax({
			type: "post",
			url : "<?php echo U('Shake/restart');?>",
			dataType:'text',
			data: 'token=<?php echo ($info["token"]); ?>&id=<?php echo ($info["id"]); ?>',
			}).fail(function(){
				alert("重新开始失败，请重试！");
			}).done(function(data){

				if(data == ''){
					Shake.ready();					
				}else{
					alert("重新开始失败，请重试！");
				}
				
			});
			
		}

		//设置前三名位置
		function setPrize(clone,data){
			var len = data.length;
			$(".prizeset-cup .player").hide();
			if(len >= 1){
				var first = $(".prizeset-cup .player").get(0) || $(clone).clone().appendTo(".prizeset-cup");

				first = $(first).css({"height": "140px","width": "140px","top":"5px","left": "200px"}).show();
				$(first).attr("uid",data[0].id);
				$(".nickname",first).text(data[0].nickname);
				$(".head",first).css("background-image","url("+data[0].headurl+")");
			}
			if(len >= 2){
				var second = $(".prizeset-cup .player").get(1) || $(clone).clone().appendTo(".prizeset-cup");

				second = $(second).css({"height": "120px","width": "120px","top":"60px","left": "20px"}).show();
				$(second).attr("uid",data[1].id);
				$(".nickname",second).text(data[1].nickname);
				$(".head",second).css("background-image","url("+data[1].headurl+")");
			}
			
			if(len >= 3){
				var third = $(".prizeset-cup .player").get(2) || $(clone).clone().appendTo(".prizeset-cup");
				third = $(third).css({"height": "100px","width": " 100px","top":"100px","left": "390px"}).show();	
				$(third).attr("uid",data[2].id);
				$(".nickname",third).text(data[2].nickname);
				$(".head",third).css("background-image","url("+data[2].headurl+")");					
			}


			// var player;
			// var curIndex = 3;
			// if(len >= 4){
			// 	player	 = $(".prizeset-cup .player").get(curIndex) || $(clone).clone().appendTo(".prizeset-cup");
			// 	player = $(player).css({"height": "100px","width": " 100px","top":"80px","left": "-20px"}).show();	
			// 	$(player).attr("uid",data[curIndex].id);
			// 	$(".nickname",player).text(data[curIndex].nickname);
			// 	$(".head",player).css("background-image","url("+data[curIndex].headurl+")");	
			// }
			// curIndex++;

			// if(len >= 5){
				
			// 	player	 = $(".prizeset-cup .player").get(curIndex) || $(clone).clone().appendTo(".prizeset-cup");
			// 	player = $(player).css({"height": "90px","width": " 90px","top":"110px","left": "430px"}).show();	
			// 	$(player).attr("uid",data[curIndex].id);
			// 	$(".nickname",player).text(data[curIndex].nickname);
			// 	$(".head",player).css("background-image","url("+data[curIndex].headurl+")");	
			// }


			// curIndex++;
			// if(len >= 6){
			// 	player	 = $(".prizeset-cup .player").get(curIndex) || $(clone).clone().appendTo(".prizeset-cup");
			// 	player = $(player).css({"height": "70px","width": " 70px","top":"130px","left": "450px"}).show();	
			// 	$(player).attr("uid",data[curIndex].id);
			// 	$(".nickname",player).text(data[curIndex].nickname);
			// 	$(".head",player).css("background-image","url("+data[curIndex].headurl+")");	
				
			// }

			// curIndex++;
			// if(len >= 7){
				
			// 	player	 = $(".prizeset-cup .player").get(curIndex) || $(clone).clone().appendTo(".prizeset-cup");
			// 	player = $(player).css({"height": "50px","width": " 50px","top":"150px","left": "470px"}).show();	
			// 	$(player).attr("uid",data[curIndex].id);
			// 	$(".nickname",player).text(data[curIndex].nickname);
			// 	$(".head",player).css("background-image","url("+data[curIndex].headurl+")");	
			// }

		}

		//展示结果
		function ShowResult(){
			$.ajax({
			type: "post",
			url : "<?php echo U('Shake/getResult');?>",
			dataType:'json',
			data: 'token=<?php echo ($info["token"]); ?>&id=<?php echo ($info["id"]); ?>',
			}).fail(function(){
			}).done(function(data){
				// console.log(data);
				setPrize($("div.player").get(0),data);
			})
			//
			$('.prizeset-masklayer').slideDown(500);
			$('.prizeset-cup').show(1500);
		}


		//游戏结束
		function GameOver(){
			Shake.audio["gameover"].play();
			//展示奖台，以及重新开始一轮，保存结果
			ShowResult();
		}

		//游戏倒计时
		function countDown(cnt){
			if(cnt == -1){

				$(".countdown").hide();
				// startShake();

				Shake.running();

				pollingPlayers();
				return;
			}
			if(cnt == 0){
				$(".countdown").text("GO!");
			}else{
				$(".countdown").text(cnt).show();

				Shake.audio["countdown"].play();
			}
			cnt--;
			setTimeout(function(){countDown(cnt)},Shake.loopGetDelta['countdown']);
		}

		//更新加入的用户
		function updateJoinuser(users){
			if(!users){
				return ;
			}
			$divs = $(".users div.user-item");
			var opacity =0 ;
			for(var i=0;i<$divs.length;i++){
				 // console.log($users[i],users[i]);
				 if( i < users.length){
				 	if($($divs[i]).attr("id") == users[i].id){
				 		opacity = $($divs[i]).css("opacity");
				 		if(opacity < 0.7){		 			
							$($divs[i]).css("opacity","0.7");
				 		}else{	
							$($divs[i]).css("opacity","0.3");
						}

				 		continue;
				 	}
					$($divs[i]).attr("id",users[i].id);
					$("img",$divs[i]).prop("src",users[i].headurl);
					$("p",$divs[i]).text(users[i].nickname);
					$($divs[i]).css("opacity","0.7");
				 	
				 }else{
				 	$($divs[i]).removeAttr("id");
				 	$($divs[i]).css("opacity","0");
				 }
			}
		}

		function pollingJoinUser(){

			//向服务器请求数据，获取加入用户的信息，大于当前数据id的前几个
			//服务器返回，头像图片地址，昵称。
			$.ajax({
		 		type: "post",
		 		url : "<?php echo U('Shake/getJoinUser');?>",
		 		dataType:'json',
		 		data: 'token=<?php echo ($info["token"]); ?>&id=<?php echo ($info["id"]); ?>',
		 		success: function(data){
		 			//
		 			if(data){
		 				$(".join_num em").text(data.count);
		 				updateJoinuser(data.users);
		 			}
		 			// console.log(data);
		 		}
	 		});

			if(Shake.state === 0){
				setTimeout(pollingJoinUser,Shake.loopGetDelta['joinuser']);
			}

		}

		//开始游戏
		function start(){	
			$.ajax({
			type: "post",
			url : "<?php echo U('Shake/start');?>",
			dataType:'text',
			data: 'token=<?php echo ($info["token"]); ?>&id=<?php echo ($info["id"]); ?>',
			}).fail(function(){
				alert("开始失败，请重试！");
			}).done(function(data){
				// console.log(data);
				startShake();
				countDown(<?php echo ($info["showtime"]); ?>);
				// if(data.result == "0"){
				// 	startShake();					
				// }else{
				// 	alert(data);
				// }
				//启动成功后，才继续
			});
		}

		//创建一个div
		function createPlayer(id,qlogo,nickname){
			var div = '<div class="player" uid="'+id+'"><div class="head shake" style="background-image: url('+qlogo+');"></div><div class="nickname" >'+nickname+'</div></div>';
			return div;
		}

		//更新排名前十的玩家的信息
		function updatePlayers(players){
			$players = $(".gamepanel .player");
			if(players && players.length){
				var curPlayer = '';
				for(var i=0;i<players.length;i++){
					if(i == 0){
						if(Shake.playersTop[0] != players[i].id){							
							Shake.playersTop[0] = players[i].id;
							Shake.audioPlayTopChange();
						}
					}
					if(i < $players.length){
						$($players[i]).attr("uid",players[i].id);
						$(".nickname",$players[i]).text(players[i].nickname);
						$(".head",$players[i]).css("background-image","url("+players[i].headurl+")");
						curPlayer = $players[i];
					}else{
						var div = createPlayer(players[i].id,players[i].headurl,players[i].nickname);
						curPlayer = $(div).appendTo(".tracklist");
						$(curPlayer).css("height",Shake.trackHeight-10).css("width",Shake.trackHeight-10);

					}

					$(curPlayer).css("top",(i*Shake.trackHeight+5)+"px");

					if(Shake.isGameover()){
						$(curPlayer).css("left",(Shake.trackWidth +5 )+"px");
					}else{						
						$(curPlayer).css("left",(players[i].count*Shake.velocityX)+"px");
					}

				}
			}
			
		}

		// 轮询
		function pollingPlayers(){
			//更新位置
			// Shake.playersTopTen[0];
			//拉取10个摇次数最多的用户，记录到Shake.playersTopTen
			//记录用户id，wecha_id, 摇次数，当前位置，clone。
			$.ajax({
			type: "post",
			url : "<?php echo U('Shake/getTopUsersAndResult');?>",
			dataType:'json',
			data: 'token=<?php echo ($info["token"]); ?>&id=<?php echo ($info["id"]); ?>&top='+Shake.showplayers,
			}).fail(function(){
			}).done(function(data){
				// console.log(data);
				if(Shake.isGameover()){//防止多次gameover
					return ;
				}
				if(data.gameover == 1){
					Shake.gameover();
					GameOver();
				}
				updatePlayers(data.users);
				if(Shake.isRunning()){	
					setTimeout(pollingPlayers , Shake.loopGetDelta['pollingPlayers']);
				}
				
			}).always(function(){

			});

		}
		

		//开始摇一摇
		function startShake(){

			//Shake.start();
			$('.top').show();
			$('.signup').hide();
			$('.gamepanel').show();
			var tl = "";
			$(".tracklist").empty();
			for(var i=0;i < Shake.showplayers;i++){
			tl += '<div class="trackline"><div class="track-start" style="width: 40px; ">'+(i+1)+'</div><div class="track-end" style="width: 40px; "></div></div>';
			}

	    		$(tl).appendTo(".tracklist").hide().each(function(index,item){
   			var d=$(this);
	    window.setTimeout(function(){d.show().addClass("leftfadein")},100*index);
	    		});
			recalHeight();


		}
		
		function recalHeight(){		
			var gH = $('.gamepanel').height();
			var eachH = gH / Shake.showplayers;
			// console.log(gH);
			$('.tracklist .trackline').each(function(){
				$(this).css("height",eachH+"px");
				$(this).css("font-size",(eachH-12)+"px");
				$("div",this).css("width",eachH+"px");
				$("div",this).css("height",eachH+"px");
				$("div",this).css("line-height",eachH+"px");
			});
			var trackWidth = $('.gamepanel').width() - eachH;
			//摇一次，移动像素大小
			Shake.velocityX = trackWidth / Shake.goal ;
			Shake.trackHeight = eachH;
			Shake.trackWidth = trackWidth;
			$(".gamepanel .player").css("height",Shake.trackHeight-10).css("width",Shake.trackHeight-10);
		}
		//添加监听方法
		function addEventListener(){
			$('.start_btn').bind("click" , start);
			// window.onresize = function(){ alert(1);};
			window.onresize = recalHeight;
			$('.button.reset').click(playAgian);
			$('.button.result').click(showAllResult);
			$('.button.btndel').bind("click",delLastResult);
			// $('.button.save').bind("click",saveThisResult);
		}

		$(function(){	

			$act = <?php echo ($info["isact"]); ?>;
			gameover = <?php echo ($info["gameisover"]); ?>;
			// console.log();
			if($act == 1 && gameover == 0){
				Shake.start();
			}else{
				Shake.ready();
			}
			addEventListener();
		})
	</script>
	
</head>
<body>

<div class="top">
	微信扫一扫 发送 <span class="strong"><?php echo ($info["keyword"]); ?></span> 即可参与
	 <div class="ewm"><img src="<?php echo ($info["qrcode"]); ?>" /></div>
</div>
<!-- 倒计时 -->
<div class="countdown countdown-animation" style="margin-left: -341.5px; margin-top: -166.5px; font-size: 233.1px; line-height: 333px;"><?php echo ($info["showtime"]); ?></div>
<!-- 倒计时 END -->

<!-- 摇一摇结果 START -->
<div class="result-mask">
	<div class="result-panel">
		<div class="btns">
    			<a href="#" onclick="" class="button btndel" >删除第轮结果</a>
 		</div>
		<div class="title">
			比赛结果
			<div class="close">X</div>
		</div>
		<div class="tablist">
			<ul class="clearfix">
			</ul>
		</div>
		<!-- 标签内容 -->
		<div class="tabcontent ">
			
		</div>
	</div>
</div>
<!-- 摇一摇结果 END -->

<!-- 奖台 START -->
<div class="prizeset-masklayer">
    <div class="prizeset-cup">
        <span class="button reset">再玩一次</span>
        <!-- <span class="button save">保存结果</span> -->
        <span class="button result">查看结果</span>

        <span class="button btndel">删除结果</span>
    </div>
</div>
<!-- 奖台 END -->

<!-- 游戏进行界面  -->
<div class="gamepanel">
<!-- 跑道 开始-->
	<div class="round-num"></div>
	<div class="tracklist">
	    	
	</div>
<!-- 跑道 结束-->
</div>
<!-- 游戏进行界面  END -->

<!-- 报名界面 -->
<div class="signup" style="top:0px">
        	<img class="codeImg" src="<?php echo ($info["qrcode"]); ?>">
	<div class="radar"  >
	        <div class="join_num">已有<em>0</em>人加入</div>
	        <div class="round w300">
	            <div class="round w200">
	                <div class="round w100">
	                    <div class="round w1">
	                        <div class="line roundMove"></div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="users">
	        	 <div  class="user-item" >
	         		<div class="user-img">
	         			<img src="">
	         		</div>
	         		<p></p>
	           </div>
	            <div  class="user-item" >
	         		<div class="user-img">
	         			<img src="">
	         		</div>
	         		<p></p>
	           </div>
	            <div  class="user-item" >
	         		<div class="user-img">
	         			<img src="">
	         		</div>
	         		<p></p>
	           </div> 
	           <div  class="user-item">
	         		<div class="user-img">
	         			<img src="">
	         		</div>
	         		<p></p>
	           </div> 
	           <div  class="user-item">
	         		<div class="user-img">
	         			<img src="">
	         		</div>
	         		<p></p>
	           </div>
	           <div class="user-item">
	         		<div class="user-img">
	         			<img src="">
	         		</div>
	         		<p></p>
	           </div> 
	           <div  class="user-item">
	         		<div class="user-img">
	         			<img src="">
	         		</div>
	         		<p></p>
	           </div>
	            <div  class="user-item">
	         		<div class="user-img">
	         			<img src="">
	         		</div>
	         		<p></p>
	           </div>
	            <div  class="user-item">
	         		<div class="user-img">
	         			<img src="">
	         		</div>
	         		<p></p>
	           </div>
	            <div  class="user-item">
	         		<div class="user-img">
	         			<img src="">
	         		</div>
	         		<p></p>
	           </div>

	        </div>
	</div>
	<div class="start_btn ">开始抽奖</div>
</div>
  <!-- 报名界面 END -->

<audio autoplay src="<?php echo ($info["backgroundmusic"]); ?>" loop></audio>
<audio id="audio_topchange" src="/Public/static/shake/shake_outride.mp3" preload="preload"></audio>
<audio id="audio_countdown" src="/Public/static/shake/shake_cutdown.mp3" preload="preload"></audio>
<audio id="audio_gameover" src="/Public/static/shake/shake_gameover.mp3" preload="preload"></audio>
</body>
</html>