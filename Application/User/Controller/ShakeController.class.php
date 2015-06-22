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
class ShakeController extends UserController{
    public $shake_model;
    public $token_where;
    public $keyword_model;
    public function _initialize(){
        parent :: _initialize();
        $this -> canUseFunction('shake');
        $this -> shake_model = M('Shake');
        $this -> token_where['token'] = $this -> token;
        $this -> keyword_model = M('Keyword');
    }
    public function index(){
        $count = $this -> shake_model -> where($this -> token_where) -> count();
        $page = new \Think\Page($count, 20);
        $info = $this -> shake_model -> where($this -> token_where) -> order('id desc') -> limit($page -> firstRow . ',' . $page -> listRows) -> select();
        $this -> assign('page', $page -> show());
        $this -> assign('info', $info);
        $this -> display();
    }
    public function add(){
        if (IS_POST){
            if (!trim($_POST['title'])){
                $this -> error('请填写标题');
            }
            $fileds = array('title', 'keyword', 'thumb', 'intro', 'background', 'backgroundmusic', 'music', 'rule', 'info', 'qrcode');
            $row = array();
            foreach ($fileds as $f){
                $row[$f] = I('post.'.$f);
            }
            $intFields = array('clienttime', 'showtime', 'starttime', 'endshake', 'shownum', 'shaketype', 'isopen', 'usetime', 'isact');
            foreach ($intFields as $f){
                $row[$f] = intval(I('post.'.$f));
            }
            $row['token'] = $this -> token;
            $row['time'] = time();
            $id = $this -> shake_model -> add($row);
            if ($id){
                $this -> keyword_model -> add(array('module' => 'Shake', 'pid' => $id, 'token' => $this -> token, 'keyword' => $row['keyword']));
            }
            $this -> success('添加成功', U('Shake/index', array('token' => session('token'))));
        }else{
            $info = array();
            $info['shaketype'] = 1;
            $info['isopen'] = 1;
            $info['clienttime'] = 3;
            $info['showtime'] = 3;
            $info['starttime'] = 3;
            $info['endshake'] = 600;
            $info['shownum'] = 10;
            $info['pass'] = '';
            $this -> assign('info', $info);
            $this -> display('set');
        }
    }
    public function edit(){
        if (IS_POST){
            if (!trim($_POST['title'])){
                $this -> error('请填写标题');
            }
            $fileds = array('title', 'keyword', 'thumb', 'intro', 'background', 'backgroundmusic', 'music', 'rule', 'info', 'qrcode');
            $row = array();
            foreach ($fileds as $f){
                $row[$f] = I($f);
            }
            $intFields = array('clienttime', 'showtime', 'starttime', 'endshake', 'shownum', 'shaketype', 'isopen', 'usetime', 'isact');
            foreach ($intFields as $f){
                $row[$f] = intval(I($f));
            }
            $updateWhere = array();
            $updateWhere['token'] = $this -> token;
            $updateWhere['id'] = intval($_POST['id']);
            $rt = $this -> shake_model -> where($updateWhere) -> save($row);
            if ($rt){
                $this -> keyword_model -> where(array('module' => 'Shake', 'pid' => $updateWhere['id'])) -> save(array('keyword' => $row['keyword']));
            }
            $this -> success('修改成功', U('Shake/index', array('token' => session('token'))));
        }else{
            $where['token'] = $this -> token;
            $where['id'] = I('get.id',0, 'intval');
            $info = $this -> shake_model -> where($where) -> find();
            $this -> assign('info', $info);
            $this -> display('set');
        }
    }
    public function del(){
        $this -> token_where['id'] = intval($_GET['id']);
        $rt = $this -> shake_model -> where($this -> token_where) -> delete();
        if ($rt){
            $this -> keyword_model -> where(array('module' => 'Shake', 'pid' => $this -> token_where['id'])) -> delete();
            $this -> success('操作成功', U(CONTROLLER_NAME . '/index'));
        }
    }
    public function screen(){
        $this -> token_where['isopen'] = 1;
        $this -> token_where['id'] = intval($_GET['id']);
        $info = $this -> shake_model -> where($this -> token_where) -> find();
        if(empty($info['background'])){
            $info['background'] = __ROOT__.'/Public/static/images/shakebg.jpg';
        }

        $this -> assign('info', $info);
        $this -> display();
    }
    // public function startShake(){
    //     $result = $this -> shake_model -> where(array('token' => I('post.token'), 'id' => intval(I('post.id')))) -> save(array('isact' => '1'));
    // }
    // public function getConnectNum(){
    //     $result = M('Shake_rt') -> where(array('token' => I('post.token'), 'shakeid' => intval($_POST['id']))) -> count();
    //     echo $result;
    // }
    // public function getCount(){
    //     $result = M('Shake_rt') -> where(array('token' => I('post.token'), 'shakeid' => intval(I('post.id')))) -> limit(0, 80) -> order('count desc') -> select();
    //     $js = json_encode($result);
    //     echo $js;
    // }

    //===================NEW===========


    //返回，指定数目的用户信息
    public function getJoinUser(){
                
               $users = M('Shake_user')->where(array('token' => I('post.token'), 'shakeid' => intval(I('post.id'))))->order('jointime desc')->limit(10)->select();

               $count = M('Shake_user')->where(array('token' => I('post.token'), 'shakeid' => intval(I('post.id'))))->count();

               echo "{\"count\":\"".$count."\" ,\"users\":".json_encode($users)." }";
    }

    //开始
    public function start(){

        $result = $this -> shake_model -> where(array('token' => I('post.token'), 'id' => intval(I('post.id')))) -> save(array('isact' => '1','gameisover' => 0));

         M('Shake_user')->where(array('token' => I('post.token'), 'shakeid' => intval(I('post.id'))))->save(array("count"=>0,'signup'=>0));

        echo "{\"result\":\"1\" }";
    }

    //重新开始
    public function restart(){
        $result = $this -> shake_model -> where(array('token' => I('post.token'), 'id' => intval(I('post.id')))) -> save(array('isact' => '0','gameisover' => 0));

        M('Shake_user')->where(array('token' => I('post.token'), 'shakeid' => intval(I('post.id'))))->save(array("count"=>0,'signup'=>0));
        if($result === FALSE){                    
            echo "1";
        }else{
            echo "";
        }
    }
    

    //开始
    public function getTopUsersAndResult(){
        $users = M('Shake_user')->where(array('token' => I('post.token'), 'shakeid' => intval(I('post.id'))))->order('count desc')->limit(10)->select();        
        $shake = $this -> shake_model ->field('gameisover') -> where(array('token' => I('post.token'), 'id' => intval(I('post.id')))) -> find();
        if($shake === FALSE){            
            $shake['gameisover'] = 0;
        }
        echo "{\"gameover\":\"".$shake['gameisover']."\" ,\"users\":".json_encode($users)." }";
    }

    //获取结果
    public function getResult(){
            $result = $this -> shake_model ->field('result')->where(array('token' => I('post.token'), 'id' => intval(I('post.id'))))->find();
            if($result === FALSE){
                echo "{\"errmsg\":\"获取失败！\"}";
            }else{
                $result = unserialize($result['result']);
                $cnt = count($result);
                // $resArr[]  = array('id' =>1);
                // $resArr[]  = array('id' =>2);
                // $resArr[]  = array('id' =>3);
                // echo json_encode($resArr);
                if($cnt >= 1){
                    echo json_encode($result[$cnt-1]);
                }else{
                    echo "";
                }
            }
    }

    //获取所有轮次的结果
    public function getAllResult(){
        $result = $this -> shake_model ->field('result')->where(array('token' => I('post.token'), 'id' => intval(I('post.id'))))->find();
            if($result === FALSE){
                echo "{\"errmsg\":\"获取失败！\"}";
            }else{
                $result = unserialize($result['result']);

                echo json_encode($result);
            }
    }

     //删除最后一次结果
    public function delLastResult(){
            $result = $this -> shake_model ->field('result')->where(array('token' => I('post.token'), 'id' => intval(I('post.id'))))->find();
            if($result === FALSE){
                echo "获取失败！";
            }else{
                $result = unserialize($result['result']);
                $res = array_pop($result);
                if(!is_null($res)){
                $this-> shake_model ->where(array('id'=>intval($_POST['id']),'token'=>I('post.token')))->save(array('result'=>serialize($result)));
                }
            }
    }

    //保存此次结果
    // public function saveThisResult(){

    //     $where['token']=I('post.token');
    //     $where['id']=intval($_POST['id']);
    //     $where['gameisover']=1;
    //     $where['isact']=1;
    //     $thisShake=$this->shake_model->where($data)->find();
    //     if($thisShake){
    //     //查找前3名
    //     $top3User = M('Shake_user')->field('id,wecha_id,headurl,nickname')->where(array('shakeid'=>$where['id'],'token'=>I('post.token')))->limit(10)->order('count desc')->select();
    //     $result = $thisShake['result'];
    //      $resArr = array();

    //     if(! empty($result)){   
    //         $resArr = unserialize($result);     
    //     }
        
    //     array_push($resArr,$top3User);

    //     // $cnt = M('Shake_user')->where(array('shakeid'=>$where['id'],'wecha_id'=>I('post.wecha_id')))->count();

    //     //GAME OVER,'result'=>json_encode($resArr)

    //     $this->shake_model->where(array('id'=>intval($_POST['id']),'token'=>I('post.token')))->save(array('isact'=>1,'gameisover'=>1,'result'=>serialize($resArr)));
    //     echo "保存成功！";
    // }else{
    //     echo "保存失败！";
    // }

    // }


}
?>