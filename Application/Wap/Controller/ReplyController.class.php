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
class ReplyController extends WapController{
    public $token;
    public $needCheck;
    public $sepTime;
    public $wecha_id;
    public function _initialize(){
    		parent::_initialize();
        $this->token=I('get.token');
        $this->reply_info_model=M('reply_info');
		$thisInfoConfig = $this->reply_info_model->where(array('infotype'=>'message','token'=>$this->token))->find();
		$detailConfig=unserialize($thisInfoConfig['config']);
		//
		$this->needCheck=intval($detailConfig['needcheck']);
		//
        $this->sepTime=60;
        $this->wecha_id	= I('get.wecha_id');        
        //session('token','');
        
        $this->assign('wecha_id',$this->wecha_id);
        $this->assign('needCheck',$this->needCheck);
        $this->assign('token',$this->token);
    } 
     public function index(){ //显示数据
     	
         $leave_model =M("leave");  
         if(IS_GET){
            $where = array("token"=>$this->token,'checked'=>1);
            import('Org.Util.Page');// 导入分页类
            $count      = $leave_model->where($where)->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
            $show       = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $res = $leave_model->where($where)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
            //echo $leave_model->getLastSql();exit;
            foreach($res as $key=>$val){
                $reply_model = M("reply");
                $where = array("message_id"=>$val['id'],"checked"=>1);
                $res[$key]['vo'] = $reply_model->where($where)->order("time DESC")->select();  
            }

            $this->assign('res',$res);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->display(); // 输出模板
        }else{
			$this->error("非法请求!");
        }
     }
    public function leave(){//留言信息插入处理
        $leave_model =M("leave");
        $message=I('get.message');
        $name=I('get.name');
        $msgarr = array();
        $msgarr['checked'] = 1-intval($this->needCheck);
        $msgarr['name'] =$name;
        $msgarr['message'] = $message;
        $msgarr['wecha_id'] = $this->wecha_id; 
        $msgarr['token']=$this->token;
        $msgarr['time'] =time();

        //根据token 来确定同一用户60秒以后才能留言 
        $lasttime = $leave_model->where(array("token"=>$this->token))->getField("max(time)");//获得准备数据 是否与数据库中数据留言是同一人
        $timeres = time() - $lasttime;   
        if($timeres < $this->sepTime){
        		
            $this->error("您已留言,请60秒以后再留言");
            exit;
        }else{
            $res = $leave_model->add($msgarr);
            if($res){
                $msgarr['id']=$res;
                if($msgarr['checked'] == 1){
                    $msgarr['time'] =date("Y-m-d H:i:s",$msgarr['time']);
                    $this->success($msgarr);
                    exit;
                }else{
                    $this->error("留言成功,正在审核中");
                    exit;
                }
            }else{
                $this->error("留言失败");
                exit;
            }
        }
    }
     public function reply(){//回复信息处理
         $reply_model=M("reply");

         $message_id = I('get.message_id');
         $reply = I('get.reply');
         $replyarr = array();
         if (intval($this->needCheck)){
         	 $replyarr['checked'] = 0;
         }else {
         	 $replyarr['checked'] = 1;
         }
        
         $replyarr['wecha_id'] = $this->wecha_id;
         $replyarr['message_id'] = $message_id;
         //
          $leave_model =M("leave");
          $thisMessage=$leave_model->where(array('id'=>intval($message_id)))->find();
          if (!$thisMessage){
          		$this->ajaxReturn(array('status'=>false,'info'=>"留言不存在"));
                exit;
          }
         //
         $replyarr['reply'] = $reply;
         $replyarr['time'] =time();
         //根据wecha_id 来确定同一用户60秒以后才能回复
            $lasttime = $reply_model->where(array('message_id'=>$message_id))->getField("max(time)");//获得准备数据 是否与数据库中数据留言是同一人
            $timeres = time() - $lasttime;
            if($timeres < $this->sepTime){
          		$this->ajaxReturn(array('status'=>false,'info'=>"你已回复，请60秒以后再回复"));
                exit;
            }else{
                $res = $reply_model->add($replyarr); 
                if($res){
                    $replyarr['id']=$res;
                    if($replyarr['checked'] == 1){
                        $replyarr['time'] =date("Y-m-d H:i:s",$replyarr['time']);
		          		$this->ajaxReturn(array('status'=>true,'info'=>$replyarr));
                        exit;
                    }else{
		          		$this->ajaxReturn(array('status'=>false,'info'=>"回复成功,正在审核中"));
                        exit;
                    }
                }else{
                    $data['data'] ="";
                    $data['info'] ="回复失败";
                    $data['status'] = 0;
		          	$this->ajaxReturn(array('status'=>false,'info'=>"回复失败"));
                    exit;
                }  
            }
 
     }
}

?>
