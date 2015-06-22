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

class ApiController extends Controller {
	// public function login($username, $password) {
	// 	$where ["username"] = $username;
	// 	$where ["password"] = md5 ( $password );
	// 	$result = M ( "Admin" )->where ( $where )->find ();
	// 	if ($result) {
	// 		return $result ["username"];
	// 	}
	// }
	public function getsetting() {
		$result = M ( "Info" )->where(array('token'=>getToken()))->find ();
		if ($result) {
			return $result;
		}
	}
	public function setting($name, $notification) {
		$data ["name"] = $name;
		$data ["notification"] = $notification;
		$data['token'] = getToken();
		
		if($this->getsetting() !== false){
			$result = M ( "Info" )->add ( $data );
		}else{
			$result = M ( "Info" )->where(array('token'=>getToken()))->save ( $data );
		}


		if ($result) {
			return $result;
		}
	}
	// public function getalipay() {
	// 	$result = M ( "Alipay" )->find ();
	// 	if ($result) {
	// 		return $result;
	// 	}
	// }
	// public function setalipay($alipayname, $partner, $key) {
	// 	$select = M("Alipay")->select();
	// 	if ($select) {
	// 		$data ["id"] = 1;
	// 		$data ["alipayname"] = $alipayname;
	// 		$data ["partner"] = $partner;
	// 		$data ["key"] = $key;
			
	// 		$result = M ( "Alipay" )->save ( $data );
	// 	}else{
	// 		$data ["alipayname"] = $alipayname;
	// 		$data ["partner"] = $partner;
	// 		$data ["key"] = $key;
			
	// 		$result = M ( "Alipay" )->add ( $data );
	// 	}
		
	// 	if ($result) {
	// 		return $result;
	// 	}
	// }
	public function getarraymenu() {
		$result = M ( "Menu" )->where(array('token'=>getToken()))->select ();
		
		import ( 'Tree', APP_PATH . 'Common', '.php' );
		$tree = new \Tree (); // new 之前请记得包含tree文件!
		$tree->tree ( $result ); // 数据格式请参考 tree方法上面的注释!
		                         
		// 如果使用数组, 请使用 getArray方法
		$result = $tree->getArray ();
		
		// 下拉菜单选项使用 get_tree方法
		// $tree->get_tree();
		if ($result) {
			return $result;
		}
	}
	public function getmenu() {
		$result = M ( "Menu" )->where(array('token'=>getToken()))->select ();
		if ($result) {
			return $result;
		}
	}
	public function addmenu($parent, $name, $addmenu) {
		if ($addmenu == 0) {
			$data ["name"] = $name;
			$data ["pid"] = $parent;
			$data['token'] = getToken();
			$result = M ( "Menu" )->add ( $data );
			if ($result) {
				return $result;
			}
		} else {
			$data ["id"] = $addmenu;
			$data ["name"] = str_replace ( "│ ", "", $name );
			$data ["pid"] = $parent;
			$data['token'] = getToken();
			$result = M ( "Menu" )->save ( $data );
			if ($result) {
				return $result;
			}
		}
	}
	public function delmenu($id) {
		$result = M ( "Menu" )->where ( array (
				'id' => $id 
		) )->delete ();
		if ($result) {
			return $result;
		}
	}
	public function getmenuvalue($menu_id) {
		$result = M ( "Menu" )->where ( array (
				"id" => $menu_id 
		) )->find ();
		if ($result) {
			return $result ["name"];
		}
	}
	public function getgood() {
		$result = M ( "Good" )->where(array('token'=>getToken()))->select ();
		if ($result) {
			return $result;
		}
	}
	public function addgood($data) {

		$data['time'] = time();
		if ($data["id"]) {
			$result = M ( "Good" )->save($data);
		}else{
			$data['token'] = getToken();
			$result = M ( "Good" )->add($data);
		}
		
		if ($result) {
			return $result;
		}
		return false;
	}
	public function delgood($id) {
		$result = M ( "Good" )->where ( array (
				"id" => $id 
		) )->delete ();
		if ($result) {
			return $result;
		}
	}
	public function getorder() {

	}
	public function gettheme() {
		$m = M ( "Info" );
		$result = $m->where(array('token'=>getToken()))->find ();
		if ($result) {
			return $result;
		}
	}
	public function delorder($id) {
		$reuslt = M ( "Order" )->where ( array (
				"id" => $id 
		) )->delete ();
		if ($reuslt) {
			return $reuslt;
		}
	}
	public function publish($id) {
		$data ["id"] = $id;
		$data ["order_status"] = 1;
		$result = M ( "Order" )->save ( $data );
		if ($reuslt) {
			return $reuslt;
		}
	}
	public function payComplete($id) {
		$data ["id"] = $id;
		$data ["pay_status"] = 1;
		$result = M ( "Order" )->save ( $data );
		if ($reuslt) {
			return $reuslt;
		}
	}
	public function getuser($openid) {
		$m = M ( "User" );
		$result = $m->where(array('token'=>getToken(),'openid'=>$openid))->find ();
		if ($result) {
			return $result;
		}
	}

	
}










