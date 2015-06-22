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
class TokenController extends AdminController{
	public function index(){
		$map = array();
		$UserDB = D('Wxuser');
		if (isset($_GET['agentid'])){
			$map=array('agentid'=>intval($_GET['agentid']));
		}
		$count = $UserDB->where($map)->count();
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$nowPage = isset($_GET['p'])?$_GET['p']:1;
		$show       = $Page->show();// 分页显示输出
		$list = $UserDB->where($map)->order('id ASC')->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		foreach($list as $key=>$value){
			$user=M('Users')->field('id,gid,username')->where(array('id'=>$value['uid']))->find();
			if($user){
				$list[$key]['user']['username']=$user['username'];
				$list[$key]['user']['gid']=$user['gid']-1;
			}
		}
		//dump($list);
		$this->assign('list',$list);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
		
		
	}
	public function del(){
		$id=I('get.id',0,'intval');
		$wx=M('Wxuser')->where(array('id'=>$id))->find();
		if ($wx['agentid']){
			M('Agent')->where(array('id'=>$wx['agentid']))->setDec('wxusercount');
		}
		M('Img')->where(array('token'=>$wx['token']))->delete();
		M('Text')->where(array('token'=>$wx['token']))->delete();
		M('Lottery')->where(array('token'=>$wx['token']))->delete();
		M('Keyword')->where(array('token'=>$wx['token']))->delete();
		M('Photo')->where(array('token'=>$wx['token']))->delete();
		M('Home')->where(array('token'=>$wx['token']))->delete();
		M('Areply')->where(array('token'=>$wx['token']))->delete();
		$diy=M('Diymen_class')->where(array('token'=>$wx['token']))->delete();
		M('Wxuser')->where(array('id'=>$id))->delete();
		$this->success('操作成功');
	}
	public function edit(){
		if(IS_POST){
			$this->all_save();
		}else{
			$id=I('get.id',0,'intval');
			if($id==0)$this->error('非法操作');
			$this->assign('tpltitle','编辑');
			$fun=M('Function')->where(array('id'=>$id))->find();
			$this->assign('info',$fun);
			$group=D('UserGroup')->getAllGroup('status=1');
			$this->assign('group',$group);
			$this->display('add');
		}
	}
}
?>