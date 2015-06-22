<?php

// 获取打印机状态描述
function getPrinterStatus($time) {
	//现在时间 - 最近一次访问 》 300秒则离线
	if (time() - $time > 300) {
		return "离线";
	}
	return "在线";
}

//获取accessToken
function getAccessToken($appid, $secret) {
	$url_get = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $appid . '&secret=' . $secret;
	$json    = json_decode(curlGet($url_get));
	return $json;
}
//发送文本给粉丝
function sendTextTofan($token, $openid, $text) {

	$where      = array('token' => $token);
	$thisWxUser = M('Wxuser')->where($where)->find();
	$appid      = $thisWxUser['appid'];
	$appsecret  = $thisWxUser['appsecret'];
	if ($appid && $appsecret) {
		$json = getAccessToken($appid, $appsecret);
		if (!$json->errmsg) {
			$data = '{"touser":"' . $openid . '","msgtype":"text","text":{"content":"' . $text . '"}}';
			$rt   = curlPost('https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=' . $json->access_token, $data, 0);

		}
	}
}

function curlPost($url, $data, $showError = 1) {
	$ch     = curl_init();
	$header = "Accept-Charset: utf-8";
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');

	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$tmpInfo = curl_exec($ch);
	$errorno = curl_errno($ch);
	if ($errorno) {
		return array('rt' => false, 'errorno' => $errorno);
	} else {
		$js = json_decode($tmpInfo, 1);
		if (intval($js['errcode'] == 0)) {
			return array('rt' => true, 'errorno' => 0, 'media_id' => $js['media_id'], 'msg_id' => $js['msg_id']);
		} else {
			if ($showError) {
				$this->error('发生了Post错误：错误代码' . $js['errcode'] . ',微信返回错误信息：' . $js['errmsg']);
			}
		}
	}
}

function curlGet($url) {
	$ch     = curl_init();
	$header = "Accept-Charset: utf-8";
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');

	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$temp = curl_exec($ch);
	return $temp;
}

function isAndroid() {
	if (strstr($_SERVER['HTTP_USER_AGENT'], 'Android')) {
		return 1;
	}
	return 0;
}

/*
 * 获取token
 * author 贝贝 <hebiduhebi@163.com>
 */
function getToken() {

	if (isset($_GET['token'])) {
		return $_GET['token'];
	}

	return session('token');
}

function addWeixinLog($data, $operator = '') {
	$log['ctime']    = time();
	$log['loginfo']  = is_array($data) ? serialize($data) : $data;
	$log['operator'] = $operator;
	M('WeixinLog')->add($log);
}

/*
 ** 获取彩票信息，彩票名称 ，日期
 **  其中日期格式为2014-06-18
 ** author 贝贝 <hebiduhebi@163.com>
 */
function getLotteryInfo($lottery, $date = '') {
	$supportLotter["双色球"]          = 1;
	$supportLotter["福彩3D"]           = 2;
	$supportLotter["新3D"]              = 3;
	$supportLotter["七乐彩"]          = 4;
	$supportLotter["超级大乐透"]    = 5;
	$supportLotter["大乐透"]          = 5;
	$supportLotter["乐透"]             = 5;
	$supportLotter["七星彩"]          = 6;
	$supportLotter["双色球"]          = 7;
	$supportLotter["排列5"]            = 8;
	$supportLotter["14场胜负彩"]     = 9;
	$supportLotter["任选9场"]         = 10;
	$supportLotter["四场进球"]       = 11;
	$supportLotter["六场半全场"]    = 12;
	$supportLotter["22选5"]             = 13;
	$supportLotter["十一运夺金"]    = 14;
	$supportLotter["时时彩"]          = 15;
	$supportLotter["新时时彩"]       = 16;
	$supportLotter["11选5"]             = 17;
	$supportLotter["新11选5"]          = 18;
	$supportLotter["重庆11选5"]       = 19;
	$supportLotter["上海11选5"]       = 20;
	$supportLotter["上海时时乐"]    = 21;
	$supportLotter["北京快乐8"]      = 22;
	$supportLotter["山东群英会"]    = 23;
	$supportLotter["泳坛夺金"]       = 24;
	$supportLotter["广东快乐十分"] = 25;
	$supportLotter["广西快乐十分"] = 26;
	$supportLotter["湖南快乐十分"] = 27;
	$supportLotter["重庆快乐十分"] = 28;
	$supportLotter["PK拾"]              = 29;
	$supportLotter["8选3"]              = 30;
	$supportLotter["新快3"]            = 31;
	$supportLotter["快3"]               = 32;
	$supportLotter["老快3"]            = 33;
	$supportLotter["湖南幸运赛车"] = 35;
	$supportLotter["快乐扑克3"]      = 36;

	$lotteryid = $supportLotter[$lottery];

	if (!isset($supportLotter[$lottery])) {
		$lotteryid = 1;
	}

	$appkey = C('juhe.caipiaoAppkey');#通过聚合申请到数据的appkey

	$url = 'http://v.juhe.cn/lottery/query';#请求的数据接口URL

	$params  = 'key=' . $appkey . '&dtype=json&lotteryid=' . $lotteryid . '&date=' . $date;
	$content = json_decode(juhecurl($url, $params, 0));

	// addWeixinLog($content);

	if ($content->error_code == 0) {
		return $content->result;
	}

	return "无相关彩票信息！";
}

/*
 ***请求接口，返回JSON数据
 ***@url:接口地址
 ***@params:传递的参数
 ***@ispost:是否以POST提交，默认GET
 */
function juhecurl($url, $params = false, $ispost = 0) {
	$httpInfo = array();
	$ch       = curl_init();

	curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22');
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	if ($ispost) {
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_URL, $url);
	} else {
		if ($params) {
			curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
		} else {
			curl_setopt($ch, CURLOPT_URL, $url);
		}
	}
	$response = curl_exec($ch);
	if ($response === FALSE) {
		#echo "cURL Error: " . curl_error($ch);
		return false;
	}
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	$httpInfo = array_merge($httpInfo, curl_getinfo($ch));
	curl_close($ch);
	return $response;
}

/*
 ** 获取股票信息，
 **  其中日期格式为2014-06-18
 ** author 贝贝 <hebiduhebi@163.com>
 */
function getStockInfo($lottery, $date = '') {

	$appkey = C('juhe.stockAppkey');#通过聚合申请到数据的appkey

	return "无相关股票信息！";
}
//智能聊天
function chat_robot($keyword) {
	$content = chat_xiaojo($keyword);

	return $content;
}

//小黄鸡机器人
function chat_xiaohuangji($keyword){
	return file_get_contents("http://www.xiaohuangji.com/ajax.php?para=".$name);
}

// 小九机器人
function chat_xiaojo($keyword) {

	$api_url = 'http://www.xiaojo.com/bot/chata.php?chat=' . $keyword;
	$result  = file_get_contents($api_url);

	return $result;
}

//获取视频链接
function getVideoUrl($sourceid) {

	$videoAppkey = C('juhe.videoAppkey');
	$packageName = C('juhe.packageName');
	$url         = 'http://web.juhe.cn:8080/video/vs';#请求的数据接口URL

	$params = 'appkey=' . $videoAppkey . '&&v=1.0&pname=' . $packageName . '&id=' . $sourceid;

	$content = json_decode(juhecurl($url, $params, 0));

	if ($content->error_code == 0) {
		return $content->data;
	}
	return "";
}

function getOneVideoInfo($keyword) {

	$videoAppkey = C('juhe.videoAppkey');
	$packageName = C('juhe.packageName');

	$url = 'http://web.juhe.cn:8080/video/v';#请求的数据接口URL

	$params = 'appkey=' . $videoAppkey . '&&v=1.0&pname=' . $packageName . '&keyword=' . urlencode($keyword);

	$content = json_decode(juhecurl($url, $params, 0));
	// addWeixinLog($content->data,"getOneVideoInfo".$keyword);
	if ($content->error_code == 0) {
		if (!empty($content->data)) {
			$video   = $content->data[0];
			$news[0] = $video->name;
			// $video->type
			$news[1] = '年代地区：' . $video->time . '年 ' . $video->area . '  类型：' . $video->type . "\n 介绍：" . $video->intro;
			// $news[1] = $video->intro;
			$news[2] = $video->img;
			if (count($video->source) >= 1) {
				$sourceid = $video->source[0]->id;
				$news[3]  = getVideoUrl($sourceid);
			} else {
				$news[3] = 'http://www.baidu.com';
			}
			return $news;
		}
		// 	return $content->data;
	}//end if

}

/**
 * 把一个汉字转为unicode的通用函数，不依赖任何库，和别的自定义函数，但有条件
 * 条件：本文件以及函数的输入参数应该用utf－8编码，不然要加函数转换
 * 其实亦可轻易编写反向转换的函数，甚至不局限于汉字，奇怪为什么php没有现成函数
 * @author xieye
 *
 * @param {string} $word 必须是一个汉字，或代表汉字的一个数组(用str_split切割过)
 * @return {string} 一个十进制unicode码，如4f60，代表汉字 “你”
 */
function getUnicodeFromUTF8($word) {
	//获取其字符的内部数组表示，所以本文件应用utf-8编码！
	if (is_array($word)) {
		$arr = $word;
	} else {
		$arr = str_split($word);
	}

	//定义一个空字符串存储
	$bin_str = '';
	//转成数字再转成二进制字符串，最后联合起来。
	foreach ($arr as $value) {
		$bin_str .= decbin(ord($value));
	}

	//正则截取
	$bin_str = preg_replace('/^.{4}(.{4}).{2}(.{6}).{2}(.{6})$/', '$1$2$3', $bin_str);

	return bindec($bin_str);//返回类似20320， 汉字"你"
	//return dechex(bindec($bin_str)); //如想返回十六进制4f60，用这句
}


//根据User_group 的id来获取对应的菜单
function getMenu($vipid) {
	$menus = '';
	
	switch ($vipid) {
		case 6://测试号
			$menus = getAllModule();
			break;
		case 7:// 汽车
			$menus = getAllModule();
			break;
		case 8://全功能号
			$menus = getAllModule();
			break;
		case 9://外卖
			$menus = getAllModule();
			break;
		case 10://基础版
			// $menus = getBaseModule();
			break;
		case 11://订阅号
			$menus = getAllModule();
			break;
		default:
			$menus = array(
				array(
					'name'    => '请重新登陆！',
					'display' => 1,
				));
			break;
	}
	
	return $menus;
}


//所有功能
function getAllModule() {
	$token = getToken();
	$menus =  array();
	
	array_push($menus, getBaseModule());
	array_push($menus, getSiteModule());
	array_push($menus, getEShopModule());
	array_push($menus, getLiveModule());
	array_push($menus, getIndustryModule());
	array_push($menus, getCRMModule());
	array_push($menus, getInteractiveModule());
	array_push($menus, getThridModule());

	return $menus;
}

function getBaseModule(){	
	$token = getToken();
	return array(
			'id'=>'base',
			'name'    => '基础模块',
			'class'=> 'mdi-action-dashboard',
			'subs'    => array(
				array('name' => '工具助手', 'link' => U('Function/index', array('token' => $token, 'id' => session('wxid'))),  'selectedCondition' => array('c' => 'Function')),
				array('name' => '关注回复', 'link' => U('Areply/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Areply')),
				array('name' => '默认回复', 'link' => U('Other/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Other')),
				array('name' => '自定义回复', 'link' => U('Text/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Text')),
				array('name' => 'LBS回复', 'link' => U('Company/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Company')),
				array('name' => '自定义菜单', 'link' => U('Diymen/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Diymen')),
				array('name' => '多客服设置', 'link' => U('ServiceUser/index', array('token' => $token)),  'selectedCondition' => array('c' => 'ServiceUser')),
				array('name' => '消息群发', 'link' => U('Message/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Message')),
			));
}
//微站模块
function getSiteModule(){
	$token = getToken();
	return 
		array(
			'id'=>'site',
			'name'    => '微站模块',
			'class'=>'mdi-action-home',
			'subs'    => array(
				array('name' => '首页回复配置', 'link' => U('Home/set', array('token' => $token)),  'selectedCondition' => array('c' => 'Home')),
				array('name' => '分类图文管理', 'link' => U('Classify/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Classify')),
				array('name' => '定制模板配置','target'=>'_blank',  'link' => __ROOT__.'/Other/cms/manage/index.php',  'selectedCondition' => array('c'=>'Tmpls234234324')),
				array('name' => '模板风格管理', 'link' => U('Tmpls/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Tmpls')),
				array('name' => '幻灯片管理', 'link' => U('Flash/index', array('token' => $token, 'tip' => 1)),  'selectedCondition' => array('c' => 'Flash','a'=>'index','tip'=>1)),
				array('name' => '背景图管理', 'link' => U('Flash/index', array('token' => $token, 'tip' => 2)),  'selectedCondition' => array('c' => 'Flash','a'=>'index')),
				array('name' => '底部菜单设置', 'link' => U('Catemenu/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Catemenu')),
				array('name' => '留言板配置', 'link' => U('Reply/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Reply')),
				array('name' => '论坛社区管理', 'link' => U('Forum/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Forum')),
				array('name' => '3G图集管理', 'link' => U('Photo/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Photo')),
				array('name' => '推广页管理', 'link' => U('Adma/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Adma')),
			));
}
// 场景模块
function getLiveModule(){
	$token = getToken();
	return  array(
			'id'=>'live',
			'name'    => '场景模块',
			'class'=>'mdi-image-palette',
			'subs'    => array(
			array('name'=>'Flypage场景','link'=>U('Live/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('c'=>'Live')),

				array('name' => '全景场景', 'link' => U('Panorama/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Panorama'))
		));
}
// 行业模块
function getIndustryModule(){
	$token = getToken();
	return array(
			'id'=>'industry',
			'name'    => '行业模块',
			'class'=>'mdi-action-accessibility',
			'subs'    => array(
				array('name' => '餐饮行业', 'link' => U('Repast/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Repast')),
				array('name' => '电子喜帖', 'link' => U('Wedding/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Wedding')),
				array('name' => '汽车行业', 'link' => U('Car/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Car')),
				array('name' => '房产行业', 'link' => U('Estate/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Estate')),
				array('name' => '教育行业', 'link' => U('School/index', array('token' => $token, 'type' => 'semester')),  'selectedCondition' => array('c' => 'School')),
				array('name' => '医疗行业', 'link' => U('Medical/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Medical')),
				array('name' => '酒店行业', 'link' => U('Hotels/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Hotels')),
				array('name' => '美容行业', 'link' => U('Business/index', array('token' => $token, 'type' => 'beauty')),  'selectedCondition' => array('c' => 'Business', 'type' => 'beauty')),
				array('name' => '健身行业', 'link' => U('Business/index', array('token' => $token, 'type' => 'fitness')),  'selectedCondition' => array('c' => 'Business', 'type' => 'fitness')),
				array('name' => '政府机构', 'link' => U('Business/index', array('token' => $token, 'type' => 'gover')),  'selectedCondition' => array('c' => 'Business', 'type' => 'gover')),
				array('name' => '食品行业', 'link' => U('Business/index', array('token' => $token, 'type' => 'food')),  'selectedCondition' => array('c' => 'Business', 'type' => 'food')),
				array('name' => '旅游行业', 'link' => U('Business/index', array('token' => $token, 'type' => 'travel')),  'selectedCondition' => array('c' => 'Business', 'type' => 'travel')),
				array('name' => '花店礼品', 'link' => U('Business/index', array('token' => $token, 'type' => 'flower')),  'selectedCondition' => array('c' => 'Business', 'type' => 'flower')),
				array('name' => '物业管理', 'link' => U('Business/index', array('token' => $token, 'type' => 'property')),  'selectedCondition' => array('c' => 'Business', 'type' => 'property')),
				array('name' => 'KTV行业', 'link' => U('Business/index', array('token' => $token, 'type' => 'ktv')),  'selectedCondition' => array('c' => 'Business', 'type' => 'ktv')),
				array('name' => '酒吧行业', 'link' => U('Business/index', array('token' => $token, 'type' => 'bar')),  'selectedCondition' => array('c' => 'Business', 'type' => 'bar')),
				array('name' => '装修行业', 'link' => U('Business/index', array('token' => $token, 'type' => 'fitment')),  'selectedCondition' => array('c' => 'Business', 'type' => 'fitment')),
				array('name' => '婚庆行业', 'link' => U('Business/index', array('token' => $token, 'type' => 'wedding')),  'selectedCondition' => array('c' => 'Business', 'type' => 'wedding')),
				array('name' => '宠物行业', 'link' => U('Business/index', array('token' => $token, 'type' => 'affections')),  'selectedCondition' => array('c' => 'Business', 'type' => 'affections')),
				array('name' => '家政行业', 'link' => U('Business/index', array('token' => $token, 'type' => 'housekeeper')),  'selectedCondition' => array('c' => 'Business', 'type' => 'housekeeper')),
				array('name' => '租赁行业', 'link' => U('Business/index', array('token' => $token, 'type' => 'lease')),  'selectedCondition' => array('c' => 'Business', 'type' => 'lease')),
			));
}
// 获取电商模块
function getEShopModule(){
	$token = getToken();
	return 
		array(
			'id'=>'eshop',
			'name'    => '电商模块',
			'class'=>'mdi-action-shopping-cart',
			'subs'    => array(
				array('name' => '支付系统设置', 'link' => U('AlipayConfig/index', array('token' => $token)),  'selectedCondition' => array('c' => 'AlipayConfig')),
				array('name' => '团购系统管理', 'link' => U('Groupon/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Groupon')),
				array('name' => '商城系统管理', 'link' => U('Store/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Store')),
				array('name' => '商城模板管理', 'link' => U('Shoptmpls/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Shoptmpls')),
				array('name' => '定制商城系统管理','target'=>'_blank', 'link' => __ROOT__.'/litemall?token='.$token,  'selectedCondition' => array('c' => 'Shoptmpls123213')),
				// array('name' => '第三方', 'link' => U('Api/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Api')),
			));
}
function getCRMModule(){

	$token = getToken();
	return array(
			'id'=>'fans',
			'name'    => '粉丝模块',
			'class'=>'mdi-action-account-child',
			'subs'    => array(				
				array('name' => '会员卡设置', 'link' => U('MemberCard/replyInfoSet', array('token' => $token)),  'selectedCondition' => array('c' => 'MemberCard', 'a' => 'replyInfoSet')),
				array('name' => '会员开通管理', 'link' => U('MemberCard/index', array('token' => $token)),  'selectedCondition' => array('c' => 'MemberCard')),
				array('name' => '粉丝数据管理', 'link' => U('WechatGroup/index', array('token' => $token)),  'selectedCondition' => array('c' => 'WechatGroup', 'a' => 'index')),
				// array('name' => '粉丝类别管理', 'link' => U('WechatGroup/groups', array('token' => $token)),  'selectedCondition' => array('c' => 'WechatGroup', 'a' => 'groups')),
				array('name' => '渠道二维码管理', 'link' => U('Recognition/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Recognition')),
				array('name' => '分享数据管理', 'link' => U('Share/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Share')),
				array('name' => '请求数详情', 'link' => U('Requerydata/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Requerydata')),
				array('name' => '粉丝行为分析', 'link' => U('WechatBehavior/statistics', array('token' => $token)),  'selectedCondition' => array('c' => 'WechatBehavior', 'a' => 'statistics')),
			));
}
// 获取互动模块
function getInteractiveModule(){
	$token = getToken();
	return 
		array(
			'id'=>'interactive',
			'name'    => '互动模块',
			'class'=>'mdi-av-games',

			'subs'    => array(
				array('name' => '微投票', 'link' => U('Vote/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Vote')),
				array('name' => '幸运大转盘', 'link' => U('Lottery/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Lottery')),
				array('name' => '优惠券设置', 'link' => U('Coupon/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Coupon')),
				array('name' => '手机刮刮卡', 'link' => U('Guajiang/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Guajiang')),
				array('name' => '水果达人', 'link' => U('LuckyFruit/index', array('token' => $token)),  'selectedCondition' => array('c' => 'LuckyFruit')),
				array('name' => '砸金蛋', 'link' => U('GoldenEgg/index', array('token' => $token)),  'selectedCondition' => array('c' => 'GoldenEgg')),
				array('name' => '祝福贺卡', 'link' => U('GreetingCard/index', array('token' => $token)),  'selectedCondition' => array('c' => 'GreetingCard')),
				array('name' => '现场摇一摇', 'link' => U('Shake/index', array('token' => $token)),  'test' => 0, 'selectedCondition' => array('c' => 'Shake')),
				array('name' => '微信墙', 'link' => U('Wall/index', array('token' => $token)),  'test' => 0, 'selectedCondition' => array('c' => 'Wall')),
			));
}

function getThridModule(){
	$token = getToken();
	return array(
			'id'=>'thrid',
			'name'    => '其它模块',
'class'=>'mdi-action-view-module' ,
			'subs'    => array(
				array('name'=>'百度直达号','link'=>U('Zhida/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('c'=>'Zhida','a'=>'index')),
				array('name' => '无线打印机', 'link' => U('Hardware/printer', array('token' => $token)),  'selectedCondition' => array('c' => 'Hardware', 'a' => 'printer')),
				array('name' => '自定义表单', 'link' => U('Selfform/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Selfform')),
				array('name' => '通用订单', 'link' => U('Host/index', array('token' => $token)),  'selectedCondition' => array('c' => 'Host')),
			));

}