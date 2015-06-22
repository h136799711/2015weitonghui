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
class ReplyInfoController extends UserController{
	public $token;
	public $ReplyInfo_model;
	Public $infoTypes;
	public function _initialize() {
		parent::_initialize();
		$this->ReplyInfo_model=M('ReplyInfo');
		$this->token=session('token');
		$this->assign('token',$this->token);
		//
		$this->infoTypes=array(

		'Groupon'=>array('type'=>'Groupon','name'=>'团购','keyword'=>'团购','url'=>U('Wap/Groupon/grouponIndex',array('token'=>$this->token))),

		'Dining'=>array('type'=>'Dining','name'=>'订餐','keyword'=>'订餐','url'=>U('Wap/Product/dining',array('dining'=>1,'token'=>$this->token))),

		'Shop'=>array('type'=>'Shop','name'=>'商城','keyword'=>'商城','url'=>U('Wap/Product/cats',array('token'=>$this->token))),

		'panorama'=>array('type'=>'panorama','name'=>'全景','keyword'=>'全景','url'=>U('Wap/Product/cats',array('token'=>$this->token))),

		'Hotels'=>array('type'=>'Hotels','name'=>'酒店','keyword'=>'酒店','url'=>U('Wap/Hotels/index',array('token'=>$this->token))),
		);
		//是否是餐饮
		if (isset($_GET['infotype'])&&$_GET['infotype']=='Dining'){
			$this->isDining=1;
		}else {
			$this->isDining=0;
		}
		$this->assign('isDining',$this->isDining);
	}
	public function set(){
		$infotype = I('get.infotype');
		$thisInfo = $this->ReplyInfo_model->where(array('infotype'=>$infotype,'token'=>$this->token))->find();
		if ($thisInfo&&$thisInfo['token']!=$this->token){
			exit();
		}

		if(IS_POST){
			$row['title']=I('post.title');
			$row['info']=I('post.info');
			$row['picurl']=I('post.picurl');
			$row['picurls1']=I('post.picurls1');
			$row['picurls2']=I('post.picurls2');
			$row['picurls3']=I('post.picurls3');
			$row['apiurl']=I('post.apiurl');
			$row['token']=I('post.token');
			$row['infotype']=I('post.infotype');
			if ($row['infotype']=='Dining'){//订餐
				$diningyuding=intval($_POST['diningyuding']);
				$diningwaimai=intval($_POST['diningwaimai']);
				if (isset($_POST['diningyuding'])){
					$row['diningyuding']=intval($_POST['diningyuding']);
				}else {
					$row['diningyuding']=0;
				}
				if (isset($_POST['diningwaimai'])){
					$row['diningwaimai']=intval($_POST['diningwaimai']);
				}else {
					$row['diningwaimai']=0;
				}
				$row['config']=serialize(array('waimaiclose'=>$diningwaimai,'yudingclose'=>$diningyuding,'yudingdays'=>intval($_POST['yudingdays'])));
			}
			if ($thisInfo){
				
				$where=array('infotype'=>$thisInfo['infotype'],'token'=>$this->token);
				$this->ReplyInfo_model->where($where)->save($row);

				$keyword_model=M('Keyword');
				$keyword_model->where(array('token'=>$this->token,'pid'=>$thisInfo['id'],'module'=>'ReplyInfo'))->save(array('keyword'=>$_POST['keyword']));
				$this->success('修改成功',U('ReplyInfo/set',$where));
						
			}else {
				$this->all_insert('ReplyInfo','/set?infotype='.$infotype);
			}
		}else{
			//
			$config=unserialize($thisInfo['config']);
			$this->assign('config',$config);
			//
			$this->assign('infoType',$this->infoTypes[$infotype]);
			$this->assign('set',$thisInfo);
			$this->display();
		}
	}
}


?>