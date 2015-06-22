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
/**
 *文本回复
**/
class TextController extends UserController{
	public function index(){
		$db=D('Text');
		$where['uid']=session('uid');
		$where['token']=session('token');
		$count=$db->where($where)->count();
		$page=new \Think\Page($count,25);
		$info=$db->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$page->show());
		$this->assign('info',$info);
		$this->display();
	}
	public function add(){
		$this->display();
	}
	public function edit(){
		$where['id']=I('get.id','intval');
		$where['uid']=session('uid');
		$where['token']=session('token');
		$res=D('Text')->where($where)->find();
		$this->assign('info',$res);
		$this->display();
	}
	public function del(){
		$where['id']=I('get.id','intval');
		$where['uid']=session('uid');
		if(D(CONTROLLER_NAME)->where($where)->delete()){
			M('Keyword')->where(array('pid'=>I('get.id','intval'),'token'=>session('token'),'module'=>'Text'))->delete();
			$this->success('操作成功',U(CONTROLLER_NAME.'/index'));
		}else{
			$this->error('操作失败',U(CONTROLLER_NAME.'/index'));
		}
	}
	public function insert(){
		//C('TOKEN_ON',false);
		$this->all_insert();
	}
	public function upsave(){
		$this->all_save();
	}
	public function clearKeywrods(){
		$keyword_model=M('Keyword');
		$count=$keyword_model->count();
		$keywords=$keyword_model->select();
		$i=intval($_GET['i']);
		$step=5;
		if ($i<$count){
			for ($j=0;$j<$step;$j++){
				$index=$i+$j;
				if ($keywords[$index]){
					$module_db=M($keywords[$index]['module']);
					if (!$module_db->where(array('id'=>$keywords[$index]['pid']))->find()){
						$keyword_model->where(array('id'=>$keywords[$index]['id']))->save(array('keyword'=>''));
					}
					
				}
			}
			$next=$i+$step;
			
			$this->success('正在刷新关键词 '.$i.'/'.$count,U('User/Text/clearKeywrods',array('i'=>$next)));
		}else {
			exit('操作成功了');
		}
	}
}
?>