<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class CaseController extends AdminController{
	public function index(){
		$db=D('Case');
		$where='';
		S('case',null);
		if (!C('agent_version')){
			$case=$db->where('status=1')->limit(32)->select();
		}else {
			$case=$db->where('status=1 AND agentid=0')->limit(32)->select();
			$where=array('agentid'=>0);
		}
		
		S('case',$case);
		$count=$db->where($where)->count();
		$page=new \Think\Page($count,25);
		$info=$db->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('info',$info);
		$this->assign('page',$page->show());
		$this->display();
	}
	public function add(){
		$this->display();
	}
	
	public function edit(){
		$id=I('get.id',0,'intval');
		$info=D('Case')->find($id);
		$this->assign('info',$info);
		$this->display('add');
	}
	
	public function del(){
		$db=D('Case');
		$id=I('get.id',0,'intval');
		if($db->delete($id)){
			$this->success('操作成功',U(CONTROLLER_NAME.'/index'));
		}else{
			$this->error('操作失败',U(CONTROLLER_NAME.'/index'));
		}
	}
	
	public function insert(){
		$thumb['width']='48';
		$thumb['height']='48';
		//$arr=$this->_upload($_FILES['img'],$dir='',$thumb);
		/*
		if($arr['error']===0){
			$_POST['img']=C('site_url').$arr['info'][0]['savepath'].$arr['info'][0]['savename'];
		}else{
			$this->error($arr['info'],U('Case/index'));
		}
		*/
		$db=D('Case');
		if($db->create()){
			if($db->add()){
				$this->success('操作成功',U('Case/index'));
			}else{
				unlink($arr['info'][0]['savepath'].$arr['info'][0]['savename']);
				$this->error('操作成功',U('Case/index'));
			}
		}else{
			$this->error($db->getError(),U('Case/index'));
		}
	}
	
	public function upsave(){
		$db=D('Case');
		/*
		if($_POST['img']!=false){
			$thumb['width']='48';
			$thumb['height']='48';
			//$arr=$this->_upload($_FILES['img'],$dir='',$thumb);
			if($arr['error']===0){
				$_POST['img']=C('site_url').$arr['info'][0]['savepath'].$arr['info'][0]['savename'];
			}else{
				$this->error($arr['info'],U('Case/index'));
			}
		}
		*/
		if($db->create()){
			if($db->save()){
				$this->success('操作成功',U('Case/index'));
			}else{
				unlink($arr['info'][0]['savepath'].$arr['info'][0]['savename']);
				$this->error('操作成功',U('Case/index'));
			}
		}else{
			$this->error($db->getError(),U('Case/index'));
		}
	}
	
}