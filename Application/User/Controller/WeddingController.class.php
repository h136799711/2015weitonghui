<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------


namespace User\Controller;
use Think\Controller;
class WeddingController extends UserController{
	public function _initialize() {
		parent::_initialize();
		$function=M('Function')->where(array('funname'=>'wedding'))->find();
		$this->canUseFunction('wedding');
	}
	//喜帖配置
	public function index(){
		$Wedding=M('Wedding');
		$where['token']=session('token');
		$count=$Wedding->where($where)->count();
		$page=new \Think\Page($count,25);
		$list=$Wedding->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$page->show());
		$this->assign('wedding',$list);
		$this->display();
	}
	public function add(){
		if(IS_POST){
			$_POST['time']=strtotime(I('post.time'));
			$this->all_insert('Wedding','/index');
		}else{
			$photo=M('Photo')->where(array('token'=>session('token')))->select();
			$this->assign('photo',$photo);
			$this->display();
		}
	}
	public function edit(){
		$Wedding=M('Wedding')->where(array('token'=>session('token'),'id'=>I('get.id','intval')))->find();
		if(IS_POST){
			$_POST['time']=strtotime(I('post.time'));
			$_POST['id']=$Wedding['id'];
			$keyword_model=M('Keyword');
			$keyword_model->where(array('token'=>$this->token,'pid'=>$Wedding['id'],'module'=>'Wedding'))->save(array('keyword'=>$_POST['keyword']));
			$this->all_save('wedding','/index');	
		}else{
			$photo=M('Photo')->where(array('token'=>session('token')))->select();
			$this->assign('photo',$photo);
			$this->assign('wedding',$Wedding);
			$this->display('add');
		}
	
	}
	public function info(){
		$data=D('Wedding_info');
		$where['fid']=I('get.id','intval');
		$where['type']=I('get.type','intval');
		if(empty($where['type'])){
			$where['type'] = 1;
		}
		$count=$data->where($where)->count();
		$page=new \Think\Page($count,25);
		$info=$data->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('type',$where['type']);
		$this->assign('page',$page->show());
		$this->assign('wedding',$info);
		$this->display();
	}
	public function infodel(){
		$where['id']=I('get.id','intval');
		$info=M('Wedding_info')->field('fid')->where($where)->find();
		$back=M('Wedding')->where(array('token'=>session('token'),'fid'=>$info['fid']))->find();
		if($back==false){$this->error('非法操作');exit;}
		if(D('Wedding_info')->where($where)->delete()){
			$this->success('操作成功',U(CONTROLLER_NAME.'/index'));
		}else{
			$this->error('操作失败',U(CONTROLLER_NAME.'/index'));
		}
	}
	public function del(){
		$where['id']=I('get.id','intval');
		$where['token']=session('token');
		if(D('Wedding')->where($where)->delete()){
			$keyword_model=M('Keyword');
            $keyword_model->where(array('token'=>$this->token,'pid'=>I('get.id','intval'),'module'=>'Wedding'))->delete();
			$this->success('操作成功',U(CONTROLLER_NAME.'/index'));
		}else{
			$this->error('操作失败',U(CONTROLLER_NAME.'/index'));
		}
	}
}



?>