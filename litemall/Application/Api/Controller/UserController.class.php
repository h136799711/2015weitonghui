<?php
namespace Api\Controller;
use Think\Controller;
class UserController extends Controller {
public function getOne($openid){
$m = M ( "User" );
$result = $m->where(array('token'=>getToken(),'openid'=>$openid))->find ();
if ($result) {
return $result;
}
}

    public function save($data){

	$m = M ( "User" );
	if ($m->save($data)) {
		return $result;
	}
	return false;
    
    }
    public function add($user){
    
	$m = M ( "User" );
	$result = $m->create($user);
	if ($result && $m->add()) {
		return $result;
	}
	return false;
    }
}