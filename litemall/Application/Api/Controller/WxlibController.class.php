<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Api\Controller;
use Think\Controller;


/**
*  微信接口
*/
class WxlibController extends Controller
{

	public function _initialize(){

	}
	/**
	 *  [requestOpenid 只获取openid]
	 *  @param  [type] $redirect_uri [获取后返回链接地址]
	 *  @return [type]               [description]
	 */
	public function requestOpenid(){

		$redirect_uri = '/litemall/index.php/Api/Wxlib/requestOpenid?scope=snsapi_base';

		$appid = C('WX_APPID');
		$appsecret = C('WX_APPSECRET');
		$siteurl = C('WX_SITEURL');
		
		$oauth = new \Org\WxLib\Core\WeChatOAuth($appid,$appsecret,$siteurl);
		
	           if (!isset($_GET['code'])) {
			$oauth->getCode($redirect_uri, $state=1, 'snsapi_base');                		
		}else{
			$result = $oauth->getAccessTokenAndOpenId($_GET['code']);
		}

		if($result){
			return $result['openid'];
		}
		return false;
	}


	/**
	 *  [requestUserinfo 拉取用户信息]
	 *  @return [type] [description]
	 */
	public function requestUserinfo(){
		$redirect_uri = '/litemall/index.php/Api/Wxlib/requestUserinfo?scope=snsapi_userinfo';

		$appid = C('WX_APPID');
		$appsecret = C('WX_APPSECRET');
		$siteurl = C('WX_SITEURL');
		
		$oauth = new \Org\WxLib\Core\WeChatOAuth($appid,$appsecret,$siteurl);
		
	           if (!isset($_GET['code'])) {
			$oauth->getCode($redirect_uri, $state=1, 'snsapi_userinfo');                		
		}else{
			$result = $oauth->getAccessTokenAndOpenId($_GET['code']);
		}
		if(!$result){
			return false;
		}
		
		$userinfo = $oauth->getUserInfo($result['access_token'],$result['openid']);
		// dump($userinfo);
		if($userinfo){
			return $userinfo;
		}
		return false;
	}


}