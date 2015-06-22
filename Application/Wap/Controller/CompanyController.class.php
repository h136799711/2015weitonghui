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
class CompanyController extends WapController{
	public $token;
	public $apikey;
	public function _initialize() {
		parent::_initialize();
		$this->token=I('get.token');
		$this->assign('token',$this->token);
		$this->apikey=C('baidu_map_api');
		$this->assign('apikey',$this->apikey);
	}
	public function map(){
		
		//店铺信息
		$company_model=M('Company');
		$where=array('token'=>$this->token);
		if (isset($_GET['companyid'])){
			$where['id']=intval($_GET['companyid']);
		}else {
			$where['isbranch']=0;
		}
		
		$thisCompany=$company_model->where($where)->find();
		
		$this->assign('thisCompany',$thisCompany);
		if (!isset($_GET['companyid'])){
		//分店信息
		$branchStores=$company_model->where(array('token'=>$this->token,'isbranch'=>1))->order('taxis ASC')->select();
		$branchStoreCount=count($branchStores);
		$this->assign('branchStoreCount',$branchStoreCount);
		$this->assign('branchStores',$branchStores);
		}
		
		$this->assign('metaTitle','地图');
		
		
		$this->display();
		
		// header('Location:http://api.map.baidu.com/marker?location='.$thisCompany['latitude'].','.$thisCompany['longitude'].'&title='.$thisCompany['name'].'&content='.$thisCompany['address'].'&output=html&src=yourComponyName|yourAppName');
	}
	public function walk($display=1){
		$company_model=M('Company');
		$where=array('token'=>$this->token);
		if (isset($_GET['companyid'])){
			$where['id']=intval($_GET['companyid']);
		}
		$thisCompany=$company_model->where($where)->find();
		$this->assign('thisCompany',$thisCompany);
		$this->assign('metaTitle','步行路线');
		if ($display){
		$this->display();
		}
	}
	public function bus(){
		$this->walk(0);
		$this->assign('metaTitle','公交地铁路线');
		$this->display('bus');
	}
	public function drive(){
		$this->walk(0);
		$this->assign('metaTitle','开车路线');
		$this->display('drive');
	}
}


?>