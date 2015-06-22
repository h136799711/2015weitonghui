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
class MedicalController extends WapController{
    public $token;
    public $wecha_id;
    public function _initialize(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent, "icroMessenger")){
        }
        parent :: _initialize();
        $data = M('company');
        $token = filter_var(I('get.token'), FILTER_SANITIZE_STRING);
        $where = array('token' => $token, 'shortname' => 'Medical');
        $cominfo = $data -> where($where) -> find();
        $this -> token = I('get.token');
        $this -> wecha_id = I('get.wecha_id');
        $this -> assign('token', $token);
        $this -> assign('wecha_id', $this -> wecha_id);
        $this -> assign('title', $cominfo['name']);
        $this -> assign('cominfo', $cominfo);
    }
    public function index(){
        $data = M('Medical_set');
        $where = array('token' => I('get.token'));
        $setIndex = $data -> where($where) -> find();
        $bxslider = M('PhotoList') -> where(array('pid' => $setIndex['album_id'])) -> order('sort DESC') -> select();
        $this -> assign('bxslider', $bxslider);
        $this -> assign('setIndex', $setIndex);
        $where2 = array('token' => I('get.token'), 'shortname' => 'Medical');
        $this -> assign('tel', M('Company') -> where($where2) -> getField('tel'));
        $cid = M("Medical_set") -> where($where) -> field('evants_id,symptoms_id') -> find();
        if($cid != null){
            $t_classify = M('Classify');
            $where = array('token' => $this -> token, 'id' => $cid['evants_id']);
            $classify = $t_classify -> where($where) -> find();
            $where3 = array('token' => $this -> token, 'id' => $cid['symptoms_id']);
            $classify2 = $t_classify -> where($where3) -> find();
        }
        $t_img = M('Img');
        $where = array('classid' => $classify['id'], 'token' => I('get.token'));
        $imgtxt = $t_img -> where($where) -> field('id,title,pic,createtime') -> select();
        $where4 = array('classid' => $classify2['id'], 'token' => I('get.token'));
        $imgtxt2 = $t_img -> where($where4) -> field('id,title,pic,createtime') -> select();
        $this -> assign('imgtxt', $imgtxt);
        $this -> assign('classify', $classify);
        $this -> assign('imgtxt2', $imgtxt2);
        $this -> assign('classify2', $classify2);
        $this -> display();
    }
    public function Introduction(){
        $company = M('Company');
        $token = I('get.token');
        $about = $company -> where(array('token' => $token, 'shortname' => 'Medical')) -> find();
        $this -> assign('about', $about);
        $this -> display();
    }
    public function Messages(){
        $this -> display();
    }
    public function publicListTmp(){
        $data = M("Medical_set");
        $this -> token = I('get.token');
        $where = array('token' => $this -> token);
        $type = strval(I('get.type'));
        if($type == 'hotfocus'){
            $cid = $data -> where($where) -> getField('hotfocus_id');
        }elseif($type == 'experts'){
            $cid = $data -> where($where) -> getField('experts_id');
        }elseif($type == 'equipment'){
            $cid = $data -> where($where) -> getField('ceem_id');
        }elseif($type == 'rcase'){
            $cid = $data -> where($where) -> getField('Rcase_id');
        }elseif($type == 'technology'){
            $cid = $data -> where($where) -> getField('technology_id');
        }elseif($type == 'drug'){
            $cid = $data -> where($where) -> getField('drug_id');
        }
        if($cid != null){
            $t_classify = M('Classify');
            $where = array('token' => $this -> token, 'id' => $cid);
            $classify = $t_classify -> where($where) -> find();
        }
        $t_img = M('Img');
        $where = array('classid' => $classify['id'], 'token' => I('get.token'));
        $imgtxt = $t_img -> where($where) -> field('id,title,pic,createtime') -> select();
        $this -> assign('imgtxt', $imgtxt);
        $this -> assign('classify', $classify);
        $this -> display();
    }
    public function newread(){
        $token = I('get.token');
        $id = (int)I('get.id');
        $t_img = M('Img');
        $where = array('id' => $id, 'token' => $token);
        $imgtxt = $t_img -> where($where) -> find();
        $this -> assign('imgtxt', $imgtxt);
        $this -> display();
    }
    public function registered(){
        $data = M('Reservation');
        $where = array('token' => I('get.token'), 'addtype' => 'medical');
        $reser = $data -> where($where) -> find();
        $mdt_user = M('Medical_user');
        $where2 = array('token' => I('get.token'), 'wecha_id' => I('get.wecha_id'));
        $user = $mdt_user -> where($where2) -> find();
        $count = M('Medical_user') -> where($where2) -> count();
        $this -> assign('count', $count);
        if(!empty($user)){
            $reser = array_merge($reser, $user);
            $this -> assign('reser', $reser);
        }else{
            $this -> assign('reser', $reser);
        }
        $svalue1 = explode('|', trim($reser['svalue1'], '|'));
        $svalue2 = explode('|', trim($reser['svalue2'], '|'));
        $svalue3 = explode('|', trim($reser['svalue3'], '|'));
        $svalue4 = explode('|', trim($reser['svalue4'], '|'));
        $svalue5 = explode('|', trim($reser['svalue5'], '|'));
        $this -> assign('svalue1', $svalue1);
        $this -> assign('svalue2', $svalue2);
        $this -> assign('svalue3', $svalue3);
        $this -> assign('svalue4', $svalue4);
        $this -> assign('svalue5', $svalue5);
        $this -> display();
    }
    public function add(){
        if(IS_POST){
            $da['token'] = strval(I('get.token'));
            $da['wecha_id'] = strval($this -> _post('wecha_id'));
            $da['rid'] = intval($this -> _post('rid'));
            $da['truename'] = strval($this -> _post("truename"));
            $da['dateline'] = strval($this -> _post("dateline"));
            $da['uinfo'] = strval($this -> _post("uinfo"));
            $da['utel'] = strval($this -> _post("utel"));
            $da['type'] = strval($this -> _post('type'));
            $da['sex'] = intval($this -> _post('sex'));
            $da['age'] = intval($this -> _post('age'));
            $da['txt33'] = strval($this -> _post('txt33'));
            $da['txt44'] = strval($this -> _post('txt44'));
            $da['txt44'] = strval($this -> _post('txt44'));
            $da['yyks'] = strval($this -> _post('yyks'));
            $da['yyzj'] = strval($this -> _post('yyzj'));
            $da['yybz'] = strval($this -> _post('yybz'));
            $da['yy4'] = strval($this -> _post('yy4'));
            $da['yy5'] = strval($this -> _post('yy5'));
            $da['booktime'] = time();
            $book = M('Medical_user');
            $token = strval(I('get.token'));
            $wecha_id = strval(I('get.wecha_id'));
            $url = 'http://' . $_SERVER['HTTP_HOST'];
            $url .= U('Medical/ReserveBooking', array('token' => $token, 'wecha_id' => $wecha_id));
            $ok = $book -> data($da) -> add();
            if(!empty($ok)){
                $arr = array('errno' => 0, 'msg' => '恭喜预约成功', 'token' => $token, 'wecha_id' => $wecha_id, 'url' => $url);
                echo json_encode($arr);
                exit;
            }else{
                $arr = array('errno' => 1, 'msg' => '预约失败，请重新预约', 'token' => $token, 'wecha_id' => $wecha_id, 'url' => $url);
                echo json_encode($arr);
                exit;
            }
        }else{
            $arr = array('errno' => 1, 'msg' => '预约失败，请重新预约', 'token' => $token, 'wecha_id' => $wecha_id, 'url' => $url);
            echo json_encode($arr);
            exit;
        }
    }
    public function ReserveBooking(){
        $token = I('get.token');
        $wecha_id = I('get.wecha_id');
        $this -> assign('token', $token);
        $this -> assign('wecha_id', $wecha_id);
        $book = M('Medical_user');
        $where = array('token' => $token, 'wecha_id' => $wecha_id, 'type' => 'medical');
        $books = $book -> where($where) -> order('iid DESC') -> select();
        $this -> assign('books', $books);
        $this -> display();
    }
    function del(){
        $iid = (int)I('get.iid');
        if(!is_int($iid)){
            exit('请求类型错误.');
        }
        $token = I('get.token');
        $wecha_id = I('get.wecha_id');
        $t_book = M('Medical_user');
        $check = $t_book -> where(array('iid' => $iid, 'wecha_id' => $wecha_id)) -> find();
        if($check){
            $t_book -> where(array('iid' => $check['iid'])) -> delete();
            $this -> success('删除成功', U('Medical/ReserveBooking', array('token' => $token, 'wecha_id' => $wecha_id, 'addtype' => I('get.addtype'))));
            exit;
        }else{
            $this -> error('非法操作！');
            exit;
        }
    }
}
?>