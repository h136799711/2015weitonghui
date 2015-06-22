

(function(){
    initComponent();
})(window);


function changeapp(url1,url2,obj,token,id){
if(obj.checked==true){
   
var myurl=url1+'?token='+token+'&id='+id+'&r='+Math.random(); 
$.get(myurl,function(data){
   if(data==1){
    alert('成功开启此功能！');
  }else{
          alert(data.info);
    }
});
}else{  
var myurl= url2+'?token='+token+'&id='+id+'&r='+Math.random(); 
$.get(myurl,function(data){
    if(data==1){
    alert('成功关闭该功能！');
  }else{
          alert(data.info);
    }
});
}
}




function initComponent(){
  // fixedMenu(".fixedMenu",100);
  alertRewrite();
}

/*返回顶部js*/
function totop(){

}
/* alert 样式js */
function alertRewrite(){
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
}

/* 固定菜单 */
function fixedMenu(selector,offsetTop){
  selector = selector || ".fixedMenu";
  offsetTop = offsetTop || 100;
  $fixedMenu = $(selector);
  // console.log($fixedMenu);
  $(window).scroll(function () {     //浏览器滚动条滚动时触发的事件
        //设置你的导航条相对定位于顶部即可   
        $fixedMenu;
        if($(document).scrollTop() > offsetTop){
          $fixedMenu.css("position","fixed");
        }else{
      $fixedMenu.css("position","relative");
        }
   });
}

function drop_confirm(msg, url){
    if(confirm(msg)){
        window.location = url;
    }
}

