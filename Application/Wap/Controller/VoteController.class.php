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

class VoteController extends BaseController{
	public function index(){
		$agent = $_SERVER['HTTP_USER_AGENT']; 
		if(!strpos($agent,"icroMessenger")) {
			notInWeixin();
		}
		$token		= I('get.token');
		$wecha_id	= I('get.wecha_id');
                    $id         = I('get.id');
                    $this->assign('token',$token);
                    $this->assign('wecha_id',$wecha_id);
                    $this->assign('id',$id);
                    $this -> wxuser = S('wxuser_' . $this -> token);
                    if (!$this -> wxuser){
                        $this -> wxuser = D('Wxuser') -> where(array('token' => $this -> token)) -> find();
                        S('wxuser_' . $this -> token, $this -> wxuser);
                    }
                    $this -> assign('wxuser', $this -> wxuser);

	           $t_vote		= M('Vote');
                     $t_record  = M('Vote_record');
		$where 		= array('token'=>$token,'id'=>$id);
		$vote 	= $t_vote->where($where)->find();
                    if(empty($vote)){
                        exit('非法操作');
                    }
                    $vote_item = M('Vote_item')->where(array('vid'=>$vote['id']))->order('rank DESC')->select(); 
                    $vcount =  M('Vote_item')->where(array('vid'=>$vote['id']))->sum("vcount");
                    $this->assign('count',$vcount);
                    //检查是否投票过
                    $t_item = M('Vote_item');
                    $where = array('wecha_id'=>$wecha_id,'vid'=>$id);
                    $vote_record  = $t_record->where($where)->find();
                    if($vote_record && $vote_record != NULL){
                        $arritem = trim($vote_record['item_id'],',');
                        $map['id'] = array('in',$arritem);
                        $hasitems = $t_item->where($map)->field('item')->select();
                        $this->assign('hasitems',$hasitems);
                        $this->assign('vote_record',1);
                    }else{
                        $this->assign('vote_record',0);
                    }

                    $item_count = M('Vote_item')->where('vid='.$id)->order('rank DESC')->select();
                    foreach ($item_count as $k=>$value) {
                       $vote_item[$k]['per']=(number_format(($value['vcount'] / $vcount),2))*100;
                       $vote_item[$k]['pro']=$value['vcount'];
                    } 
                    $vote['info'] = html_entity_decode($vote['info']);
                    $this->assign('total',$total);
                    $this->assign('vote_item', $vote_item);
                    $this->assign('vote',$vote);
		$this->display();
	}

	public function add_vote(){	

		$token 		=	I('post.token');
		$wecha_id	=	I('post.wecha_id');
		$tid 		=	I('post.tid');
		$chid 		= 	rtrim(I('post.chid'),',');	
		$recdata 	=	M('Vote_record');
                    $where   = array('vid'=>$tid,'wecha_id'=>$wecha_id,'token'=>$token);  
                    $recode =  $recdata->where($where)->find();
                    if($recode != '' || $wecha_id ==''){
                        if($recode != ''){
                            $arr=array('success'=>0,'info'=>'您已提交过，不能重复提交！');
                        }elseif($wecha_id == ''){
                            $arr=array('success'=>0,'info'=>'提交失败！');                            
                        }
                        echo json_encode($arr);
                        exit;
                    }
                    $data = array('item_id'=>$chid,'token'=>$token,'vid'=>$tid,'wecha_id'=>$wecha_id,'touch_time'=>time(),'touched'=>1);     
            		$ok = $recdata->add($data);
                    $map['id'] = array('in',$chid);
                    $t_item = M('Vote_item');
                    $t_item->where($map)->setInc('vcount');       
                    $arr=array('success'=>1,'token'=>$token,'wecha_id'=>$wecha_id,'tid'=>$tid,'chid'=>$chid,'arrpre'=>$per,'info'=>'提交成功！');
                    echo json_encode($arr);        
                    exit;
	}
}?>