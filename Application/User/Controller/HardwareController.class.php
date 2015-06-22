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
// .-----------------------------------------------------------------------------------
// | 
// | 
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

class HardwareController extends UserController{
	//打印机
	public function printer(){
		$map['ownerid'] = getToken();
		$list = M('Printer')->where($map)->select();
		// var_dump($map);
		$this->assign("list",$list);
		$this->display();
	}
	
	//添加打印机
	public function addprinter(){
		// var_dump(getToken());
		if(IS_POST){
			$data = $_POST;
			$printer = D('Printer');
			$data['ownerid'] = getToken();
			$entity = $printer->where(array('printerid'=>$data['printerid']))->find();
			if($entity != FALSE){
				$this->error("保存失败,打印机已存在！",U('Hardware/printer',array('token'=>getToken() )));
				exit();
			}
			if($printer->create($data)){
				if($printer->add() === FALSE){
					$this->error("保存失败！",U('Hardware/printer',array('token'=>getToken() )));
				}else{
					$this->success("保存成功！",U('Hardware/printer',array('token'=>getToken() )));
				}
			}else{
				$this->error("保存失败！",U('Hardware/printer',array('token'=>getToken() )));
			}

		}else{
			$map['token'] = getToken();
			// $map['isbranch'] = 1;
			$branchs = M('Company')->where($map)->select();
			$this->assign("branchs",$branchs);
			$this->display();
		}
	}

	//删除打印机
	public function delprinter($id=0){

		$rst = M('Printer')->where(array("id"=>$id,"ownerid"=>getToken()))->delete();
		if($rst === FALSE){
			$this->error("删除失败！",U('Hardware/printer',array('token'=>getToken() )));
		}else{
			$this->error("删除成功！",U('Hardware/printer',array('token'=>getToken() )));
		}

	}

}