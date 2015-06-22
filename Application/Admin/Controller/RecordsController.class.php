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
class RecordsController extends AdminController{
	public function index(){
		$records=M('indent');
		//$db=M('Users');
		$count=$records->count();
		$page=new \Think\Page($count,25);
		$show= $page->show();
		$info=$records->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
		$this->assign('page',$show);
		$this->assign('info',$info);
		$this->display();
	}
	public function send(){
		$money=I('get.price',0,'intval');
		$data['id']=I('get.uid',0,'intval');
	//	dump($money);exit;
		if($money!=false&&$data['id']!=false){
			//dump($money);exit;
			$back=M('Users')->where($data)->setInc('money',$money);
			$status=M('Indent')->where(array('id'=>I('get.iid',0,'intval')))->setField('status',2);
			if($back!=false&&$status!=false){
				$this->success('充值成功');
			}else{
				$this->error('充值失败');
			}
		}else{
			$this->error('非法操作');
		}
	}
}