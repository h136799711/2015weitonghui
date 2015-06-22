<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Home\Controller;
use Think\Controller;

class PrinterController extends Controller{

	//设置打印机状态
	public function setPrinterStatus($sid){		
		// addWeixinLog("sid=".$sid,"printer");
		M('Printer')->where(array('printerid'=>$sid))->save(array('last_query_time'=>time()));
	}

	public function index(){

		// addWeixinLog(' stg='.$stg.' usr='.$usr.' ord='.$ord.' sid='.$sid.' sgn='.$sgn,'printer');
		// addWeixinLog("index","printer");
        		/*
		 * 采用单例模式，防止传输多个XML
		 */
		$Printer = GPRSPrinter::getInstance(); 
		//获取参数
		$Printer->getParams();

		$this->setPrinterStatus($Printer->params['usr']);
		// addWeixinLog(serialize($Printer),"printer");
		if (isset($Printer->params['id']) && isset($Printer->params['sta']))  
		// isset:检测变量是否设置
		// 设置即为打印结果
		{
			switch ($Printer->params['sta']) {
				case "0":
					//打印成功！
					M('Printqueue')->where(array("id"=>$Printer->params['id']))->save(array("status"=>1,'update_time'=>time()));
					break;	
				case "1":
					//过热
					M('Printqueue')->where(array("id"=>$Printer->params['id']))->setInc("faild_cnt");
					break;	
				case "3":
					//缺纸卡纸					
					M('Printqueue')->where(array("id"=>$Printer->params['id']))->setInc("faild_cnt");
					break;
				default:
					M('Printqueue')->where(array("id"=>$Printer->params['id']))->setInc("faild_cnt");
					echo "";
					exit();
					break;
			}
		}
		else
		{    
			$data = $this->getDataToPrint($Printer->params['usr']);
			 // addWeixinLog($data['content'],"printer data");
			if($data == ''){
				// $map['printerid'] = $Printer->params['usr'];
				// $printer = M('Printer')->where($map)->save(array('setting'=>''));
				// if(!emtpy($printer['setting'])){
				// 	echo $Printer->setId($printer['printerid']) // 设置ID
			 //            	->setTime(time()) // 设置时间
			 //            	->setContent('') // 设置content
			 //            	->setSetting($data['setting']) // 设置打印机参数等数据，具体参考协议部分文件，建议非必要不要设置，也可以为空
			 //            	->display();// 输出	
				// }else{
				echo '';
				// }				
			}else{
				// M('Printqueue')->where(array("id"=>$data['id']))->save(array("status"=>1,'update_time'=>time()));
		    		echo $Printer->setId($data['id']) // 设置ID
		            	->setTime( $data['time']) // 设置时间
		            	->setContent( $data['content']) // 设置content
		            	->setSetting($data['setting']) // 设置打印机参数等数据，具体参考协议部分文件，建议非必要不要设置，也可以为空
		            	->display();// 输出			
			}
		}
	}

	//获取用于打印的信息
	public function getDataToPrint($usr){
		if(empty($usr)){
			return '';
		}
		$map['printerid'] = $usr;
		
		$printer = M('Printer')->where($map)->find();

		//未打印过的
		$map['status'] = array('neq',1);
		//打印失败次数 < 10 次。
		//多于 10 次，则另选其它的打印
		$map['failed_cnt'] = array('lt',10);
		$printdata =  M('Printqueue')->where($map)->order(" insert_time asc ")->find();
		// $sql = M()->getLastSql();
		// addWeixinLog($sql,"printer1");
		// addWeixinLog(serialize($printdata),"printer1");
		if($printdata === FALSE){			
			if(!empty($printer['setting'])){				
				$data = array();
				$data['time'] = time();
				$data['id'] = '';
				$data['content'] = '';
				$data['setting'] = $printer['setting'];
			 	M('Printer')->where(array('printerid'=>$map['printerid']))->save(array('setting'=>''));
			 	return $data;
			}
			return '';
		}else{
			$data = array();
			$data['time'] = time();
			$data['id'] = $printdata['id'];
			$data['content'] = $printdata['data'];
			$data['setting'] = $printer['setting'];
			// addWeixinLog(serialize($data),"printer1");
			 M('Printer')->where(array('printerid'=>$map['printerid']))->save(array('setting'=>''));
			return $data;
		}
	}

}