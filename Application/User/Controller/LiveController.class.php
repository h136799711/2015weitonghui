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
class LiveController extends UserController{
    public function _initialize(){
        parent :: _initialize();
        // $this -> canUseFunction("Live");
        $company = M('Company') -> where(array('token' => $this -> token, 'isbranch' => 0)) -> find();
        if(empty($company)){
            $this -> error('您还没有添加您的公司信息', U('Company/index', array('token' => $this -> token)));
        }
    }
    public function index(){
        $search = I('search','', 'trim');
        $where = array('token' => $this -> token);
        if($search){
            $where['name|keyword'] = array('like', '%' . $search . '%');
        }
        $count = M('Live') -> where($where) -> count();
        $Page = new \Think\Page($count, 15);
        $list = M('Live') -> where($where) -> order('add_time desc') -> limit($Page -> firstRow . ',' . $Page -> listRows) -> select();
        $this -> assign('page', $Page -> show());
        $this -> assign('list', $list);
        $this -> display();
    }
    public function add(){
        $keyword_db = M('Keyword');
        $id = I('get.id',0, 'intval');
        $where = array('token' => $this -> token, 'id' => $id);
        $live_info = M('Live') -> where($where) -> find();
        if(IS_POST){
            if(D('Live') -> create()){
                if($live_info){
                    $up_where = array('token' => $this -> token, 'id' => I('id',0, 'intval'));
                    M('live') -> where($where) -> save($_POST);
                    $keyword['pid'] =  I('id',0, 'intval');
                    $keyword['module'] = 'Live';
                    $keyword['token'] = $this -> token;
                    $keyword['keyword'] = I('post.keyword','', 'trim');
                    $keyword_db -> where(array('token' => $this -> token, 'pid' => I('post.id',0, 'intval'), 'module' => 'Live')) -> save($keyword);
                    $this -> success('修改成功', U('Live/index', array('token' => $this -> token)));
                }else{
                    $_POST['token'] = $this -> token;
                    $_POST['add_time'] = time();
                    $id = M('live') -> add($_POST);
                    $keyword['pid'] = $id;
                    $keyword['module'] = 'Live';
                    $keyword['token'] = $this -> token;
                    $keyword['keyword'] = I('post.keyword','', 'trim');
                    $keyword_db -> add($keyword);
                    $this -> success('添加成功', U('Live/index', array('token' => $this -> token)));
                }
            }else{
                $this -> error(D('Live') -> getError());
            }
        }else{
            $this -> assign('info', $live_info);
            $this -> display();
        }
    }
    public function del(){
        $id = I('get.id', 0,'intval');
        $where = array('token' => $this -> token, 'id' => $id);
        if(M('Live') -> where($where) -> delete()){
            M('Live_content') -> where(array('token' => $this -> token, 'live_id' => $id)) -> delete();
            M('Live_company') -> where(array('token' => $this -> token, 'live_id' => $id)) -> delete();
            M('Keyword') -> where(array('token' => $this -> token, 'pid' => $id, 'module' => 'Live')) -> delete();
            $this -> success('删除', U('Live/index', array('token' => $this -> token)));
        }
    }
    public function content(){
        $live_id = I('get.id',0, 'intval');
        $search = I('post.search','', 'trim');
        $type = I('post.type',0, 'intval');
        $where = array('token' => $this -> token, 'live_id' => $live_id);
        if($search){
            $where['name'] = array('like', '%' . $search . '%');
        }
        if($type > 0){
            $where['type'] = $type;
        }
        $count = M('Live_content') -> where($where) -> count();
        $Page = new \Think\Page($count, 15);
        $list = M('Live_content') -> where($where) -> order('sort desc,add_time desc') -> limit($Page -> firstRow . ',' . $Page -> listRows) -> select();
        $this -> assign('list', $list);
        $this -> assign('page', $Page -> show());
        $this -> assign('live_id', $live_id);
        $this -> display();
    }
    public function content_add(){
        $live_id = I('get.live_id',0, 'intval');
        $id = I('get.id',0, 'intval');
        $info = M('Live_content') -> where(array('token' => $this -> token, 'id' => $id, 'live_id' => $live_id)) -> find();
        if(IS_POST){
            if($info){
                $where = array('token' => $this -> token, 'live_id' => I('post.live_id',0, 'intval'), 'id' => I('post.id',0, 'intval'));
                M('Live_content') -> where($where) -> save($_POST);
                $this -> success('修改成功', U('Live/content', array('token' => $this -> token, 'id' => I('post.live_id',0, 'intval'))));
            }else{
                $_POST['add_time'] = time();
                $_POST['token'] = $this -> token;
                if(M('Live_content') -> add($_POST)){
                    $this -> success('添加成功', U('Live/content', array('token' => $this -> token, 'id' => I('post.live_id',0, 'intval'))));
                }
            }
        }else{
            $this -> assign('info', $info);
            $this -> assign('live_id', $live_id);
            $this -> display();
        }
    }
    public function content_del(){
        $live_id = I('get.live_id',0, 'intval');
        $id = I('get.id',0, 'intval');
        $where = array('token' => $this -> token, 'live_id' => $live_id, 'id' => $id);
        if(M('Live_content') -> where($where) -> delete()){
            $this -> success('删除成功', U('Live/content', array('token' => $this -> token, 'id' => $live_id)));
        }
    }
    public function company(){
        $live_id = I('get.id',0, 'intval');
        $search = I('post.search','', 'trim');
        $where = array('token' => $this -> token, 'live_id' => $live_id);
        if($search){
            $where['name'] = array('like', '%' . $search . '%');
        }
        $count = M('Live_company') -> where($where) -> count();
        $Page = new \Think\Page($count, 15);
        $list = M('Live_company') -> where($where) -> order('sort desc,id desc') -> limit($Page -> firstRow . ',' . $Page -> listRows) -> select();
        $this -> assign('list', $list);
        $this -> assign('page', $Page -> show());
        $this -> assign('live_id', $live_id);
        $this -> display();
    }
    public function company_add(){
        $live_id = I('get.live_id',0, 'intval');
        $id = I('get.id',0, 'intval');
        $info = M('Live_company') -> where(array('token' => $this -> token, 'id' => $id, 'live_id' => $live_id)) -> find();
        if(IS_POST){
            if(D('Live_company') -> create()){
                if($info){
                    $where = array('token' => $this -> token, 'live_id' => I('post.live_id', 'intval'), 'id' => I('post.id',0, 'intval'));
                    M('Live_company') -> where($where) -> save($_POST);
                    $this -> success('修改成功', U('Live/company', array('token' => $this -> token, 'id' => I('post.live_id',0, 'intval'))));
                }else{
                    $_POST['token'] = $this -> token;
                    if(M('Live_company') -> add($_POST)){
                        $this -> success('添加成功', U('Live/company', array('token' => $this -> token, 'id' => I('post.live_id',0, 'intval'))));
                    }
                }
            }else{
                $this -> error(D('Live_company') -> getError());
            }
        }else{
            $this -> assign('info', $info);
            $this -> assign('live_id', $live_id);
            $this -> display();
        }
    }
    public function company_del(){
        $live_id = I('get.live_id',0, 'intval');
        $id = I('get.id',0, 'intval');
        $where = array('token' => $this -> token, 'live_id' => $live_id, 'id' => $id);
        if(M('Live_company') -> where($where) -> delete()){
            $this -> success('删除成功', U('Live/company', array('token' => $this -> token, 'id' => $live_id)));
        }
    }
    public function company_list(){
        $where = array('token' => $this -> token, 'display' => 1);
        $data = M('Company') -> where($where) -> order('id desc') -> select();
        $this -> assign('data', $data);
        $this -> display();
    }
}
?>