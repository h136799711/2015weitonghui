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

class FunctionController extends AdminController{

	public function index(){
		$map = array();
		$UserDB = D('Function');
		$count = $UserDB->where($map)->count();
		$Page       = new \Think\Page($count,30);// 实例化分页类 传入总记录数
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$nowPage = isset($_GET['p'])?$_GET['p']:1;
		$show       = $Page->show();// 分页显示输出
		$list = $UserDB->where($map)->order('id ASC')->limit($Page->firstRow.','.$Page->listRows)->select();			
		$this->assign('list',$list);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}

	public function add(){
		if(IS_POST){
			$this->all_insert();
		}else{
			$map=array('status'=>1);
			if (C('agent_version')){
				$map['agentid']=array('lt',1);
			}
			$group=D('UserGroup')->getAllGroup($map);
			$this->assign('group',$group);
			$this->display();
		}
	}
	public function edit(){
		if(IS_POST){
			$this->all_save();
		}else{
			$map=array('status'=>1);
			if (C('agent_version')){
				$map['agentid']=array('lt',1);
			}
			$id=I('get.id',0,'intval');
			if($id==0) $this->error('非法操作');
			$this->assign('tpltitle','编辑');
			$fun=M('Function')->where(array('id'=>$id))->find();
			$this->assign('info',$fun);
			$group=D('UserGroup')->getAllGroup($map);
			$this->assign('group',$group);
			$this->display('add');
		}
	}	
	public function del(){
		if(IS_POST){
			$this->all_save();
		}else{
			$id=I('get.id',0,'intval');
			if($id==0)$this->error('非法操作');
			$this->assign('tpltitle','编辑');
			$fun=M('Function')->where(array('id'=>$id))->delete();
			if($fun==false){
				$this->error('删除失败');
			}else{
				$this->success('删除成功');
			}
		}
	}
}
?>