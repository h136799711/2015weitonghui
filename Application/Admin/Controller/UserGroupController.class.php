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


	class UserGroupController extends AdminController{
	
		public function index(){			
			$map = array();
			if (C('agent_version')){
				$map['agentid']=array('lt',1);
			}
			$UserDB = D('UserGroup');
			$count = $UserDB->where($map)->count();
			$Page       = new \Think\Page($count);// 实例化分页类 传入总记录数
			// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
			$nowPage = isset($_GET['p'])?$_GET['p']:1;
			$show       = $Page->show();// 分页显示输出
			$list = $UserDB->where($map)->order('id ASC')->page($nowPage.','.C('PAGE_NUM'))->select();		
			if ($list){
				$i=1;
				foreach ($list as $item){
					$UserDB->where(array('id'=>$item['id']))->save(array('taxisid'=>$i));
					$i++;
				}
			}
			$this->assign('list',$list);
			$this->assign('page',$show);// 赋值分页输出
			$this->display();
		}
		public function add(){
			if(IS_POST){
				$this->all_insert();
			}else{
				$this->display();
			}			
		}
		public function edit(){
			if(IS_POST){
				$this->all_save();
			}else{
				$id = I('get.id',0,'intval');
				if(!$id)$this->error('参数错误!');
				$info = D('UserGroup')->getGroup(array('id'=>$id));
				$this->assign('tpltitle','编辑');				
				$this->assign('info',$info);
				$this->display('add');			
			}			
		}
		public function del(){
			$id=I('get.id',0,'intval');
			if($id==0)$this->error('非法操作');
			$map['id'] = $id; 
			$info = M('UserGroup')->where($map)->delete();
			
			if($info !== false){
				$this->success('操作成功');		
			}else{
				$this->error('操作失败');
			}
		}
	
	
	}
?>