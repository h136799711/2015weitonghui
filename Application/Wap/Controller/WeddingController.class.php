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
class WeddingController extends WapController{
	public function index(){
		if(isset($_GET['id'])){
			$data['id']=I('get.id',0,'intval');
			$data['token']=I('get.token');
		}else{
			exit('非法请求');
		}
		$wedding=D('Wedding');
		$weddingData=$wedding->where($data)->find();
		$photo=M('PhotoList')->field('id,picurl')->where(array('pid'=>$weddingData['pid']))->select();
		$this->assign('weddingData',$weddingData);
		$this->assign('photo',$photo);
		$this->display();
	}
	public function check(){
		if(isset($_GET['id'])){
			 if(IS_POST){
				$wedding=M('Wedding')->where(array('token'=>I('get.token'),'id'=>I('get.id',0,'intval')))->find();
				if($wedding['passowrd']==I('post.pwd')){
					$data=array();
					$fid=I('get.id',0,'intval');
					$type=I('get.type',0,'intval');
					if ($type==1){
						$type=2;
					}else {
						$type=1;
					}
					$count=M('Wedding_info')->where(array('fid'=>$fid,type=>$type))->count();
					$info=M('Wedding_info')->where(array('fid'=>$fid,type=>$type))->select();
					$num=0;
					if ($info){
						foreach ($info as $item){
							$num=$num+intval($item['num']);
						}
					}
					$this->assign('count',$num);
					$this->assign('wedding',$info);
					$this->assign('pic',$wedding);
					if($type==1){
						$this->display('info2');
					}else{
						$this->display('info1');
					}
				}else{
					exit('<div style="text-align:center;padding:40px;font-size:14px;">密码输入错误</div>');
				}
			}else{
				$this->display();
			}
		}else{
			exit('非法请求');
		}
		
	
		
	}
	public function info(){
		if(IS_POST){
			$wedding=D('wedding_info');
			$data['name']=I('post.name');
			$data['fid']=I('post.fid');
			$data['type']=I('post.type');
			$data['phone']=I('post.phone');
			$data['time']=time();
			if($data['type']==1){ 
				$data['num']=I('post.num');
			}else{
				$data['info']=I('post.info');
			}
			if($wedding->add($data)){
				echo '提交成功';
			
			}else{
				echo '提交失败';
			}
		}else{
			$this->error('非法操作');
		}
	}
}
?>

