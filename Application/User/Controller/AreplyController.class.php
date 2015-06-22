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
 *关注回复
**/
class AreplyController extends UserController{
	public function index(){
		$db=D('Areply');
		$where['uid']=session('uid');
		$where['token']=session('token');
		$res=$db->where($where)->find();
		$this->assign('areply',$res);
		$this->display();
	}
	public function insert(){
		
		$db=D('Areply');
		$where['uid']=session('uid');
		$where['token']=session('token');
		$res=$db->where($where)->find();
		if($res==false){
			$where['content']=html_entity_decode(I('post.content'));

			if(isset($_POST['keyword'])){
				$where['keyword']=I('post.keyword');
			}
			if($where['content']==false){$this->error('内容必须填写');}
			$where['createtime']=time();
			$id=$db->data($where)->add();
			if($id){
				$this->success('发布成功',U('Areply/index'));
			}else{
				$this->error('发布失败',U('Areply/index'));
			}
		}else{
			$where['id']=$res['id'];
			$where['content']=html_entity_decode(I('post.content'));
			$where['home']=intval(I('post.home'));
			$where['updatetime']=time();
			if(isset($_POST['keyword'])){
				$where['keyword']=I('post.keyword');
			}		
			if($db->save($where)){
				$this->success('更新成功',U('Areply/index'));
			}else{
				$this->error('更新失败',U('Areply/index'));
			}
		}
	}
}
?>