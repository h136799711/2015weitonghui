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

class ReservationController extends UserController{
    public $addtype;
   // public $wecha_id;
    public function _initialize() {
        parent::_initialize();
        $this->addtype = I('get.addtype');

        $this->assign('addtype',$this->addtype);


    }

    public function index(){
        if(session('gid')==1){
            $this->error('vip0无法使用预约管理,请充值后再使用',U('Home/Index/price'));
        }

        $data = M("Reservation");
        // $car = I('get.car');
        // if($car == 'car'){
        //     $where = "`token`='".session('token')."' AND (`addtype`='drive' OR `addtype`='maintain')";

        // }else{
        //    $where = array('token'=>session('token'));
        // }
       $where = array('token'=>session('token'),'addtype'=>'house_book');
        //$reslist =  $data->where($where)->select();
        $count      = $data->where($where)->count();
        $Page       = new \Think\Page($count,12);
        $show       = $Page->show();
        $reslist = $data->where($where)->limit($Page->firstRow.','.$Page->listRows)->select(); 
        
        $this->assign('page',$show);
        $this->assign('reslist',$reslist);
        $this->display();

    }

    public function add(){

        if(session('gid')==1){
           $this->error('vip0无法使用预约管理,请充值后再使用',U('Home/Index/price'));
        }
        $addtype = I('get.addtype');
        if(IS_POST){
            $data=D('Reservation');
            $_POST['token']=session('token');
            $_POST['addtype'] = 'house_book';
            if($data->create()!=false){
                if($id=$data->data($_POST)->add()){
                    $data1['pid']=$id;
                    $data1['module']='Reservation';
                    $data1['token']=session('token');
                    $data1['keyword']=trim($_POST['keyword']);
                    M('Keyword')->add($data1);
                    //$user=M('Users')->where(array('id'=>session('uid')))->setInc('activitynum');
                    if($addtype == 'drive'){
                        $this->success('添加成功',U('Car/drive',array('token'=>session('token'))));
                    }elseif($addtype == 'maintain'){
                        $this->success('添加成功',U('Car/maintain',array('token'=>session('token'))));
                    }else{
                        $this->success('添加成功',U('Reservation/index',array('token'=>session('token'))));
                    }
                }else{
                    $this->error('服务器繁忙,请稍候再试');
                }
            }else{
                $this->error($data->getError());
            }
        }else{
            $this->display();
        }


    }

    public function edit(){

         if(IS_POST){
            $data=D('Reservation');
            $where=array('id'=>(int)I('post.id'),'token'=>session('token'));
            $check=$data->where($where)->find();
            
            if($check==false)$this->error('非法操作');


            if($data->create()){
                $_POST['addtype'] = 'house_book';
                if($data->where($where)->save($_POST)){
                    $data1['pid']=(int)I('post.id');
                    $data1['module']='Reservation';
                    $data1['token']=session('token');

                    $da['keyword']=trim($_POST['keyword']);
                    M('Keyword')->where($data1)->save($da);
                    $this->success('修改成功',U('Reservation/index',array('token'=>session('token'))));
                }else{
                    $this->error('操作失败');
                }
            }else{
                $this->error($data->getError());
            }
        }else{
            $id=I('get.id');
            $where=array('id'=>$id,'token'=>session('token'));
            $data=M('Reservation');
            $check=$data->where($where)->find();
            if($check==false)$this->error('非法操作');
            $reslist=$data->where($where)->find();
            $this->assign('reslist',$reslist);
            $this->display('add');
        }
    }

    public function del(){
        $id = (int)I('get.id');
        $res = M('Reservation');
        $find = array('id'=>$id,'token'=>I('get.token'));
        $result = $res->where($find)->find();
         if($result){
            $res->where('id='.$result['id'])->delete();
            $where = array('pid'=>$result['id'],'module'=>'Reservation','token'=>session('token'));
            M('Keyword')->where($where)->delete();
            $this->success('删除成功',U('Reservation/index',array('token'=>session('token'))));
             exit;
         }else{
            $this->error('非法操作！');
             exit;
         }
    }

    public function manage(){
        $t_reservebook = M('Reservebook');
        $rid = (int)I('get.id');
        //预约类型，根据addtype类型判断
        $addtype = strval(I('get.addtype'));
        if($addtype == 'drive'){
            $where = array('token'=>session('token'),'rid'=>$rid,'type'=>$addtype);
        }elseif($addtype =='maintain'){
            $where = array('token'=>session('token'),'rid'=>$rid,'type'=>$addtype);
        }else{ //保持在最后
            $where = array('token'=>session('token'),'rid'=>$rid,'type'=>'house_book');
        }

       // $books = $t_reservebook->where($where)->select();
        $count      = $t_reservebook->where($where)->count();
        $Page       = new \Think\Page($count,12);
        $show       = $Page->show();
        $books = $t_reservebook->where($where)->limit($Page->firstRow.','.$Page->listRows)->select(); 
        $this->assign('page',$show);
        //var_dump($books);
        $this->assign('books',$books);
        $this->assign('count',$t_reservebook->count());
        $this->assign('ok_count',$t_reservebook->where('remate=1')->count());
        $this->assign('lose_count',$t_reservebook->where('remate=2')->count());
        $this->assign('call_count',$t_reservebook->where('remate=0')->count());
        $this->display();
    }

    public function reservation_uinfo(){
        $id = I('get.id');
        $token = I('get.token');
        $where = array('id'=>$id,'token'=>$token);
        $t_reservebook = M('Reservebook');
        $userinfo = $t_reservebook->where($where)->find();
        $this->assign('userinfo',$userinfo);
       // var_dump($userinfo);
        if(IS_POST){
            //var_dump($_POST);
            $id = I('post.id');
            $token = session('token');
            $where =  array('id'=>$id,'token'=>$token);
            $ok = $t_reservebook->where($where)->save($_POST);
            if($ok){
                $this->assign('ok',1);
                //$this->success('成功',U('Reservation/manage',array('token'=>session('token'))));
            }else{
                     $this->assign('ok',2);
            }

        }
        $this->display();


    }

    public function manage_del(){

        $id = I('get.id');
        $t_reservebook = M('Reservebook');
        $where = array('id'=>$id,'token'=>I('get.token'));
        $check  = $t_reservebook->where($where)->find();
        $car = I('get.car');
        if(!empty($check)){
            $t_reservebook->where(array('id'=>$check['id']))->delete();
            if($car == 'car'){
                $this->success('删除成功',U('Car/reservation',array('token'=>session('token'))));
                exit;
            }else{
                $this->success('删除成功',U('Reservation/index',array('token'=>session('token'))));
                exit;
            }
            
        }else{
            $this->error('非法操作！');
            exit;
        }
    }

     

    public  function total(){
        $this->display();
    }


}?>