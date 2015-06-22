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
class RequerydataController extends UserController{
	public $token;
	public $mysql;
	public function _initialize(){
		parent::_initialize();
		$this->token=session('token');
		$this->mysql=M('Requestdata');
	
	}
	public function index(){
		if(I('get.month')==false){
			$month=date('m');
		}else{
			$month=I('get.month');
		}
		$thisYear=date('Y');
		if(I('get.year')==false){
			$year=$thisYear;
		}else{
			$year=I('get.year');
		}
		$this->assign('month',$month);
		$this->assign('year',$year);
		$lastyear=$thisYear-1;
		if ($year==$lastyear){
			$yearOption='<option value="'.$lastyear.'" selected>'.$lastyear.'</option><option value="'.$thisYear.'">'.$thisYear.'</option>';
		}else {
			$yearOption='<option value="'.$lastyear.'">'.$lastyear.'</option><option value="'.$thisYear.'" selected>'.$thisYear.'</option>';
		}
		$this->assign('yearOption',$yearOption);
		$where=array('token'=>$this->token,'month'=>$month,'year'=>$year);
		$list=$this->mysql->where($where)->limit(31)->order('id desc')->select();
		$this->assign('list',$list);
		//
		$xml='<chart caption="'.$month.'月统计图" xAxisName="日期" yAxisName="" labelStep="" showNames="" showValues="" rotateNames="" showColumnShadow="1" animation="1" showAlternateHGridColor="0" AlternateHGridColor="ff5904" divLineColor="D0DCE4" divLineAlpha="100" alternateHGridAlpha="5"   formatNumberScale="0"  baseFontColor="666666" baseFont="宋体" baseFontSize="12" outCnvBaseFontSize="12"  canvasBorderThickness="1" canvasBorderColor="D0DCE4"  bgColor="FFFFFF" bgAlpha="0"  showBorder="0"  lineColor="0F6FCF" lineThickness="3"  anchorBorderColor="FFFFFF" anchorBorderThickness="2" anchorBgColor="0F6FCF"   numDivLines="2" numVDivLines="3"><categories>';
		
		$fansCountSet='';
		$imgRequryCountSet='';
		$list_reverse=array_reverse($list);
		foreach ($list_reverse as $li){
			$day=$li['day'];
			$xml.='<category label="'.$day.'"/>';
			$fansCountSet.='<set value="'.$li['follownum'].'"/>';
			$imgRequryCountSet.='<set value="'.$li['textnum'].'"/>';
		}
		$xml.='</categories><dataset seriesName="关注数" color="1D8BD1" anchorBorderColor="1D8BD1" anchorBgColor="1D8BD1">'.$fansCountSet.'</dataset><dataset seriesName="文本请求数" color="2AD62A" anchorBorderColor="2AD62A" anchorBgColor="2AD62A">'.$imgRequryCountSet.'</dataset><styles><definition><style name="CaptionFont" type="font" size="12"/></definition><application><apply toObject="CAPTION" styles="CaptionFont"/><apply toObject="SUBCAPTION" styles="CaptionFont"/></application></styles></chart>';
		$this->assign('xml',$xml);
		$this->display();
	}
}


?>