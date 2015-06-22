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
use Common\Controller\BaseController;

class ShakeController extends BaseController{
	public $shake_model;
	public $savedTops = 10;
	public function _initialize(){
		parent::_initialize();
		$this->token		= I('get.token');
		$this->assign('token',$this->token);
		$this->wecha_id	= I('get.wecha_id');
		if (!$this->wecha_id){
			$this->wecha_id='null';
		}
		$this->assign('wecha_id',$this->wecha_id);
		$this->shake_model=M('Shake');
		$this->savedTops = 10;
	}

	// public function index(){
	// 	$info=array();
	// 	// $info['phone'] 		= I('get.phone');
	// 	$thisShake=$this->shake_model->where(array('token'=>$this->token,'id'=>intval($_GET['id']),'isopen'=>1))->find();
	// 	// var_dump(I('get.wecha_id'));
	// 	// var_dump(I('get.token'));
	// 	// var_dump($_GET['id']);
	// 	$thisShake['rule']=nl2br($thisShake['rule']);
	// 	$thisShake['info']=nl2br($thisShake['info']);
	// 	$this->assign('info',$thisShake);
	// 	// $shakeRt=M('Shake_rt')->where(array('shakeid'=>intval($_GET['id']),'wecha_id'=>$this->wecha_id))->find();
	// 	// if (!$shakeRt||!$shakeRt['phone']){
	// 	// 	exit('请先填写手机号');
	// 	// }
	// 	$this->display();
	// }
	public function shakeActivityStatus(){
		$thisShake=$this->shake_model->where(array('token'=>$this->token,'id'=>intval($_GET['id'])))->find();
		echo'{"isact":'.$thisShake['isact'].',"gameisover":"'.$thisShake['gameisover'].'"}';
		exit;
	}

 //    public function refreshScreen(){
 //    	$where=array();
 //    	$where['token']=I('post.token');
 //    	$where['id']=intval($_POST['id']);
 //    	$thisShake=$this->shake_model->where($data)->find();
	// 	if ($thisShake){
	// 		$shakeRt=M('Shake_rt')->where(array('shakeid'=>$where['id'],'wecha_id'=>I('post.wecha_id')))->find();
	// 		$data=array();
	// 		$data['token'] 		= I('post.token');
	// 		$data['wecha_id'] = I('post.wecha_id');
	// 		$data['shakeid'] = I('post.id');
	// 		$data['count']=intval($_POST['count']);
	// 		if ($shakeRt){
	// 			M('Shake_rt')->where(array('shakeid'=>$where['id'],'wecha_id'=>I('post.wecha_id')))->save($data);
	// 		}else {
	// 			M('Shake_rt')->add($data);
	// 		}
	// 	}
	// }


	//==========================================NEW=============================
public function index(){
		$info=array();
		// $info['phone'] 		= I('get.phone');
		$thisShake=$this->shake_model->where(array('token'=>$this->token,'id'=>intval($_GET['id']),'isopen'=>1))->find();
		// var_dump(I('get.wecha_id'));
		// var_dump(I('get.token'));
		// var_dump($_GET['id']);
		$thisShake['rule']=nl2br($thisShake['rule']);
		$thisShake['info']=nl2br($thisShake['info']);
		$this->assign('info',$thisShake);
		$shakeUser=M('Shake_user')->where(array('shakeid'=>intval($_GET['id']),'wecha_id'=>$this->wecha_id))->find();
		$this->assign('count',$shakeUser['count']);
		// $this->assign('prevcount',$shakeUser);
		
		$this->display();
	}

    //检测用户是否已加入，未加入转到授权页面
    public function checkJoin(){
        $wecha_id = I('get.wecha_id');
        $token = I('get.token');
        $shakeid = I('get.id');
        
        $map['wecha_id'] = I('get.wecha_id');
        $map['token'] = I('get.token');
        $map['shakeid'] = I('get.id');
        // $this->show();
        // exit();
        $user = M('Shake_user')->where($map)->find();
        if($user){
            redirect(C('site_url').U('Wap/Shake/index',array('token'=>$token,'wecha_id'=>$wecha_id,'id'=>$shakeid)));
        }else{
            import("Org.OAuth2");
            $oauth2 = new \OAuth2();
            var_dump($oauth2);
            redirect($oauth2->getLink(C('site_url').U('Home/Index/oauth2' , array('token' => $this -> token,'shakeid'=>$shakeid )),'shake'));
        }
    }

    	//刷新
   	 public function refresh(){

	    	$where=array();
	    	$where['token']=I('post.token');
	    	$where['id']=intval($_POST['id']);
	    	$thisShake=$this->shake_model->where($where)->find();
		if ($thisShake && $thisShake['gameisover'] == 0){
			$shakeRt=M('Shake_user')->where(array('shakeid'=>$where['id'],'wecha_id'=>I('post.wecha_id')))->find();
			$data=array();
			
			$data['count']=intval($_POST['count']);

			//存在并发时出错可能性
			if ($shakeRt){
				//检测数目是否达到条件
				if($data['count'] >= $thisShake['endshake']){

       					 // $this->shake_model->where(array('id'=>intval($_POST['id']),'token'=>I('post.token')))->save(array('isact'=>1,'gameisover'=>1));
					//查找前三名
					$top3User = M('Shake_user')->field('id,wecha_id,headurl,nickname')->where(array('shakeid'=>$where['id'],'token'=>I('post.token')))->limit($this->savedTops)->order('count desc')->select();
					$this->SaveResult($top3User,$thisShake['result']);
					// echo "{\"endshake\":\"".$data['endshake']."\"}";
					M('Shake_user')->where(array('shakeid'=>$where['id'],'wecha_id'=>I('post.wecha_id')))->save($data);
					echo "{\"gameisover\":\"1\"}";
					exit();
				}
				M('Shake_user')->where(array('shakeid'=>$where['id'],'wecha_id'=>I('post.wecha_id')))->save($data);
				
			}
			else{
				// M('Shake_user')->add($data);
			}

			echo "{\"gameisover\":\"0\"}";
		}else{
			// $shakeUser=M('Shake_user')->where(array('shakeid'=>$where['id'],'wecha_id'=>I('post.wecha_id')))->find();
			// $map['shakeid'] = $where['id'];
			// $map['wecha_id'] = I('post.wecha_id');


			// $map['jointime'] = array(' gt ', $shakeUser['jointime'] );
			// $map['count'] = array(' eq ', $shakeUser['count']  );

			// M('Shake_user')->where($map)->order('count desc')->count();
			echo "{\"gameisover\":\"1\"}";
		}
	}

	//保存结果
	public function SaveResult($top3User,$result){
		//二维数组
		//[[],[],[]]
		$resArr = array();
		
		if(! empty($result)){	
			$resArr = unserialize($result);		
		}

		array_push($resArr,$top3User);
		if(!empty($_POST['id'])){

		$this->shake_model->where(array('id'=>intval($_POST['id']),'token'=>I('post.token')))->save(array('isact'=>1,'gameisover'=>1,'result'=>serialize($resArr)));
		
		}
	}

}