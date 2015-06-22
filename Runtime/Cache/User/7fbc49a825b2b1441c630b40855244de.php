<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content" content ="text/html; charset=utf-8" />
<title> 微通汇系统</title>
<meta http-equiv="MSThemeCompatible" content = "Yes" />
<script src="/Public/User/js/common.js" type="text/javascript"></script>
 <script src="/Public/static/jquery-1.11.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=<?php echo $apikey;?>"></script>
 <script src="/Public/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/static/artDialog/plugins/iframeTools.js"></script>
<style type="text/css">
body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;}
#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;}
#l-map{height:100%;width:78%;float: left;border-right:2px solid #bcbcbc;}
#r-result{height:100%;width:20%;float:left;}
.search{
	padding: 6px;
	font-size: 14px;
	margin: 5px;
	color: #993300;
}
.search a{
	background-color: #5d5d5d;
	color: #fff;
	margin-left: 5px;
	border-radius: 3px;
	padding: 5px;
}
.searchkeyword{
	border: #606060 2px solid;
	padding: 5px;

}
</style>
</head>
<body id="nv_member">
<input type="hidden" id="longitude" value="0" />
<input type="hidden" id="latitude" value="0" />

<div class="search" style="margin:0">全国范围内搜索：<input type="text" id="keyword" class="searchkeyword"  /><a href="#" onclick="searchLoc();return false;">搜索</a> <a id="ok" style="float:none;background-color:#f40" href="###" >设定好就点我吧</a> 把跳动的点[拖动到或点击]你的公司地址或其它地址。</div>
<div id="l-map"></div>
<div id="r-result">搜索结果展示</div>
<script type="text/javascript">
function G(id) {
    return document.getElementById(id);
}
if (art.dialog.data('longitude')) {
	G('longitude').value = art.dialog.data('longitude');// 获取由主页面传递过来的数据
	G('latitude').value = art.dialog.data('latitude');
};

// 关闭并返回数据到主页面
document.getElementById('ok').onclick = function () {
	var origin = artDialog.open.origin;
	var longitudeinput = origin.document.getElementById('longitude');
	var latitudeinput = origin.document.getElementById('latitude');
	longitudeinput.value = $('#longitude').attr('value');
	latitudeinput.value = $('#latitude').attr('value');
	art.dialog.close();
};


var map = new BMap.Map("l-map");
var myCity = new BMap.LocalCity();
myCity.get(createAniMarker);

var point = new BMap.Point($('#longitude').val(),$('#latitude').val());
map.centerAndZoom(point,12);
map.enableScrollWheelZoom();                            //启用滚轮放大缩小

//右键菜单
var menu = new BMap.ContextMenu();
var txtMenuItem = [
  {
   text:'卫星视图',
   callback:function(){ map.setMapType(BMAP_HYBRID_MAP);}
  }
 ];


 for(var i=0; i < txtMenuItem.length; i++){
  menu.addItem(new BMap.MenuItem(txtMenuItem[i].text,txtMenuItem[i].callback,100));
 }
 
 map.addContextMenu(menu);
//搜索

var local = new BMap.LocalSearch("全国", {
  renderOptions: {
    map: map,
    panel : "r-result",
    autoViewport: true,
    selectFirstResult: false

  },
  onSearchComplete:searchComplete
});
function searchLoc(keyword){
	$key = (arguments[0] ) || G("keyword").value;
	local.search($key);
}

function searchComplete(){
	var result = local.getResults();
	if(result && result.getPoi(0) ){
	var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
	// console.log(pp);
        	map.centerAndZoom(pp, 18);
        	
    	map.clearOverlays(); 
          	marker = new BMap.Marker(pp);
        	map.addOverlay(marker);    //添加标注
	marker.setAnimation(BMAP_ANIMATION_BOUNCE);
	$('#longitude').attr('value',pp.lng);
	$('#latitude').attr('value',pp.lat);
	}
}

//创建标注
var marker = {};
function createAniMarker(result){

    	// map.clearOverlays(); 
	if(result){
		var cityName = result.name;
	}
	if($('#longitude').val()==0||$('#longitude').val()==''){
		if(cityName){
			map.setCenter(cityName);
		}
		p = new BMap.Point(result.center.lng,result.center.lat);
	}else{
		p = new BMap.Point($('#longitude').val(),$('#latitude').val());
	}	
	marker = new BMap.Marker(p);
	marker.enableDragging();
	map.addOverlay(marker);
	marker.setAnimation(BMAP_ANIMATION_BOUNCE);
	marker.addEventListener("dragend", function(e){
		$('#longitude').attr('value',e.point.lng)
		$('#latitude').attr('value',e.point.lat)
	})

}



//点击事件
map.addEventListener("click",function(e){	
	map.removeOverlay(marker);
	$("#longitude").attr("value",e.point.lng);
	$("#latitude").attr("value",e.point.lat);
	createAniMarker();
//    alert(e.point.lng + "," + e.point.lat);
});

//智能提示
var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
    {"input" : "keyword"
    ,"location" : map
});

ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
var str = "";
    var _value = e.fromitem.value;
    var value = "";
    if (e.fromitem.index > -1) {
        value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
    }    
    str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;
    
    value = "";
    if (e.toitem.index > -1) {
        _value = e.toitem.value;
        value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
    }    
    str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
    // G("searchResultPanel").innerHTML = str;
});

var myValue;
ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
var _value = e.item.value;
    myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
    // G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;
    
    setPlace();
});
//设置地点
function setPlace(){
    map.clearOverlays();    //清除地图上所有覆盖物
 //    function myFun(){
 //        	var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
 //        	map.centerAndZoom(pp, 18);
 //       	marker = new BMap.Marker(pp);
 //        	map.addOverlay(marker);    //添加标注
	// marker.setAnimation(BMAP_ANIMATION_BOUNCE);
 //    }

	searchLoc(myValue);
}
//console.log(marker);


</script>
</body>
</html>