<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Wap\Controller;
use Think\Controller;
class Greeting_cardController extends WapController{
	public function _initialize() {
		parent::_initialize();
	}
	public function index(){
		$data['id']=I('get.id',0,'intval');
		if(isset($_GET['id'])){
			$greeting=D('Greeting_card');
			$greeting_card=$greeting->where($data)->find();
			$list=D('Greeting_card')->where(array('token'=>$greeting_card['token']))->select();
			$greeting->where($data)->setInc("click");
		}else{ 
			$greeting_card['name']=I('get.name','htmlspecialchars');
			$greeting_card['info']=I('get.info','htmlspecialchars');
			$greeting_card['id']=$data['id'];
			$type=I('get.type','htmlspecialchars');
		}
		$greeting_card['type']=$this->type($type);
		$this->assign('greeting_card',$greeting_card);
		$this->assign('list',$list);
		if($type==5){ $str='donkey';}
		$this->display($str);
	}
	public function shareData(){
		 $greeting=D('Greeting_card')->where(array('id'=>intval($_GET['id'])))->setInc('num');
	}
	private function type($type){
		switch($type){
			case 1:
			$type='realLeaf';
			break;
			case 2:
			$type='snow';
			break;
			case 0:
			$type='flower_';
			case 3:
			$type='meigui';
			break;
			case 4:
			$type='meigui';
			break;
			case 5:
			$type='meigui';
			break;
		
		}
		return $type;
	}

}
?>

