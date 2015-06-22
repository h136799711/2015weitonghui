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
/*
3G 汽车
*/
class CarController extends WapController{
    public $token;
    public $wecha_id;
    public $addtype;
    public function _initialize() {
        parent::_initialize();
        $this->token = I('get.token');
        $this->wecha_id =I('get.wecha_id');
        $this->addtype = I('get.addtype');
        $this->assign('token',$this->token);
        $this->assign('wecha_id',$this->wecha_id);
        $this->assign('addtype',$addtype);
    }


    public function index(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }
        $this->display();
    }

    public function brands(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }
        $token = I('get.token');
        $t_brand = M('Car');
        $brand = $t_brand->where(array('token'=>$token))->order('sort desc')->select();
        $this->assign('brand',$brand);
        $this->display();
    }

    public function carseries(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
           // echo '此功能只能在微信浏览器中使用';exit;
        }
        $bid = (int)I('get.bid');
        $token = I('get.token');
        $this->assign('title',I('get.title'));
        $t_series = M('Carseries');
        $where = array('brand_id'=>$bid,'token'=>$token);
        $series = $t_series->where($where)->order('sort desc')->select();

        $logo = M('Car')->where(array('id'=>$bid))->getField('logo');
        $this->assign('logo',$logo);
        $this->assign('series',$series);
//var_dump($series);
        // $sid = (int)I('get.sid');
        // if(I('get.getlist') ==1 && !empty($sid)){
        //     $where2 = array('s_id'=>$sid,'token'=>$token);
        //     $series_info = $t_series->where(array('id'=>$sid))->field('picture,info')->find();

        // }else{
        //     $where2 = array('token'=>$token,'s_id'=>$series[0]['id']);
        //     $series_info = $t_series->where(array('id'=>$series[0]['id']))->field('picture,info')->find();
        // }

        // $model = array();
        // foreach($series as $key=>$val){
        //     $model = M('Carmodel')->where(array('token'=>$token,'s_id'=>$val['id']))->order('id DESC')->select();
        //     $this->assign('model',$model);
        //     //var_dump($model);
        // }


        //$t_model = M('Carmodel');
        //$model = $t_model->where($where2)->order('id DESC')->select();
        //var_dump($model);
        //$this->assign('model',$model);
        //$this->assign('series_info',$series_info);
        $this->display();
    }

    public function smodelList(){
        $sid = (int)I('get.sid');
        $token = I('get.token');
        $where2 = array('s_id'=>$sid,'token'=>$token);
        $t_model = M('Carmodel');
        $model = $t_model->where($where2)->order('id DESC')->select();
        $this->assign('model',$model);
        $this->display();
    }

    public function salers(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }
        $token = I('get.token');
        $t_carsaler = M('Carsaler');
        $saler = $t_carsaler->where(array('token'=>$token))->order('sort DESC')->select();
        $this->assign('saler',$saler);
        $this->display();
    }

    //预约保养 预约试驾
    public function CarReserveBook(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }

        $addtype = I('get.addtype');
        $token   = I('get.token');
        $wecha_id = I('get.wecha_id');
        $this->assign('addtype',$addtype);
        if($addtype == 'drive'){//预约试驾
            $where = array('token'=>$token,'addtype'=>'drive');
            $this->assign('addtype','drive');
        }elseif($addtype == 'maintain'){//预约保养
            $where  =  array('token'=>$token,'addtype'=>'maintain');
            $this->assign('addtype','maintain');
        }else{//默认
            //$this->error('Sorry.请求错误！正在带您转到首页',U(MODULE_NAME.'/index',array('token'=>$token,'wecha_id'=>$wecha_id)));
            //exit;
             $where = array('token'=>$token,'addtype'=>'drive');
            $this->assign('addtype','drive');
        }
        $t_res = M('Reservation');
        $reser =  $t_res->where($where)->find();
        if($reser == null){
            $reser =  $t_res->where(array('token'=>$token,'addtype'=>'maintain'))->find();
            if($reser == null){
                exit('请在管理中心的汽车模块的->预约管理先添预约项.');
            }
        }
        $where3 = array('token'=>$token,'wecha_id'=>$wecha_id);
        //$user = M('Userinfo')->where($where3)->field('truename,tel as user_tel')->find();
        $user = M('Caruser')->where($where3)->field('car_userName as truename,brand_serise,car_no as carnum,user_tel,car_care_mileage as km,brand_serise as housetype,carmodel as choose')->find();

        if(!empty($user)){
             $reser = array_merge($reser,$user);
        }
       //var_dump($reser);
        $this->assign('reser',$reser);
        $where4 = array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>$addtype);
        $count = M('Reservebook')->where($where4)->count();
        $this->assign('count',$count);
        $this->display();
    }

     public function add(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            //exit('此功能只能在微信浏览器中使用');
        }
        $da['token']      = strval(I('get.token'));
        $da['wecha_id']   = strval(I('post.wecha_id'));
        $da['rid']        = (int)I('post.rid');
        $da['truename']   = strval($this->_post("truename"));
        $da['dateline']   = strval($this->_post("dateline"));
        $da['timepart']   = strval($this->_post("timepart"));
        $da['info']       = strval($this->_post("info"));
        $da['tel']        = strval($this->_post("tel"));
        $da['type']       = strval(I('post.type'));
        $da['housetype']  = I('post.housetype');
        $da['choose']  = I('post.choose');
        $da['booktime']   = time();
        $das['id']        = (int)I('post.id');

        if($da['type'] =='maintain'){
            $da['carnum']   = strval($this->_post("carnum"));
            $da['km']       = (int)I('post.km');
        }

        $book   =   M('Reservebook');
         $token = strval(I('get.token'));
         $wecha_id = strval(I('get.wecha_id'));
         $addtype  = strval(I('get.addtype'));
         $url ='http://'.$_SERVER['HTTP_HOST'];
         $url .= U('Car/ReserveBooking',array('token'=>$token,'wecha_id'=>$wecha_id,'addtype'=>$addtype));

        if($das['id'] != ''){
            $o = $book->where(array('id'=>$das['id']))->save($da);
            if($o){
                 $arr=array('errno'=>0,'msg'=>'修改成功','token'=>$token,'wecha_id'=>$wecha_id,'url'=>$url);
                echo json_encode($arr);
                exit;
            }else{
                 $arr=array('errno'=>1,'msg'=>'修改失败','token'=>$token,'wecha_id'=>$wecha_id,'url'=>$url);
                echo json_encode($arr);
                exit;
            }
        }
        $ok = $book->data($da)->add();
        if(!empty($ok)){
            $arr=array('errno'=>0,'msg'=>'恭喜预约成功','token'=>$token,'wecha_id'=>$wecha_id,'url'=>$url);
            echo json_encode($arr);
            exit;
        }else{
             $arr=array('errno'=>1,'msg'=>'预约失败，请重新预约','token'=>$token,'wecha_id'=>$wecha_id,'url'=>$url);
            echo json_encode($arr);
            exit;
        }

    }

    public function ReserveBooking(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }
        $token      = I('get.token');
        $wecha_id   = I('get.wecha_id');
        $type   =   I('get.addtype');
        //$this->assign('token',$token);
        //$this->assign('wecha_id',$wecha_id);
        $book   =   M('Reservebook');
        $where = array('token'=>$token,'wecha_id'=>$wecha_id,'type'=>$type);
        $books  = $book->where($where)->order('id desc')->select();
        $this->assign('books',$books);

        $data = M("Reservation");
        $where2 = array('token'=>$token,'addtype'=>$type);
        $reser = $data->where($where2)->field('headpic,addtype')->find();
        //var_dump($headpic);
        $this->assign('reser',$reser);
        $this->display();
    }


    public function func_post(){
            //$das['token']      = strval(I('get.token'));
            $das['wecha_id']   = strval(I('post.wecha_id'));
            //$da['rid']        = (int)I('post.rid');
            $da['truename']   = strval($this->_post("truename"));
            $da['tel']        = strval($this->_post("tel"));
            $da['dateline']   = strval($this->_post("dateline"));
            $da['timepart']   = strval($this->_post("timepart"));
            $da['info']       = strval($this->_post("info"));
            $da['type']       = strval(I('post.booktype'));
            $da['housetype']  = I('post.housetype');
            $da['choose']     = I('post.choose');
            $da['booktime']   = time();
            $das['id']        = (int)I('post.mid');
            if($da['type'] =='maintain'){
                $da['carnum']   = strval($this->_post("carnum"));
                $da['km']       = (int)I('post.km');
            }
            $t_book   =   M('Reservebook');
            if($das['id'] != ''){
                $o = $t_book->where(array('id'=>$das['id'],'wecha_id'=>$das['wecha_id']))->save($da);
                if($o){
                     $arr=array('errno'=>0,'msg'=>'修改成功','token'=>I('get.token'),'wecha_id'=>$das['wecha_id'],'url'=>'');
                     echo json_encode($arr);
                     exit;
                }else{
                     $arr=array('errno'=>1,'msg'=>'修改失败','token'=>I('get.token'),'wecha_id'=>$das['wecha_id'],'url'=>'');
                    echo json_encode($arr);
                    exit;
                }
            }
    }

    public function delOrder(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }

        $id = (int)I('get.id');
        $token = I('get.token');
        $wecha_id = I('get.wecha_id');
        $t_book   =   M('Reservebook');
        $check = $t_book->where(array('id'=>$id,'wecha_id'=>$wecha_id))->find();
        if($check){
            $t_book->where(array('id'=>$check['id']))->delete();
            $this->success('删除成功',U('Car/ReserveBooking',array('token'=>$token,'wecha_id'=>$wecha_id,'addtype'=>I('get.addtype'))));
             exit;
         }else{
            $this->error('非法操作！');
             exit;
         }

    }

    public function tool(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }
        $this->display();
    }


    public function aboutus(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }
        $company = M('Company');
        $token=I('get.token');
        $company_id = M('Carnews')->getField('company_id');
        $about = $company->where(array('token'=>$token,'id'=>$company_id))->find();
        $this->assign('about',$about);

        $this->display();
    }

    //车主关怀
    public function owner(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }
        $token = I('get.token');
        $owner = M('Carowner')->where(array('token'=>$token))->find();
        // /var_dump($owner);
        $this->assign('owner',$owner);
        $t_caruser = M('caruser');
        $wecha_id = I('get.wecha_id');
        $where = array('token'=>$token,'wecha_id'=>$wecha_id);
        $user = $t_caruser->where($where)->field('care_next_mileage,next_care_inspection,next_insurance_Date')->find();
        $this->assign('user',$user);

         $this->display();
    }

    //修改车信息
    public function changeCarinfo(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }
        $t_caruser = M('caruser');
        $token = I('get.token');
        $wecha_id = I('get.wecha_id');
        $where = array('token'=>$token,'wecha_id'=>$wecha_id);
        $user = $t_caruser->where($where)->find();

       if (IS_POST) {
           $data['wecha_id'] = I('post.wecha_id');
           $data['token'] = I('post.token');
           $data['brand_serise'] = I('post.brand_serise'); //如果为空
           //if(empty($data['brand_serise'])){

                if(I('post.carmodel') == ''){
                    $this->error('车型必须填写');exit;
                 }else{
                     $data['carmodel'] =  I('post.carmodel');
                }
           //}
            $data['car_buyTime'] = I('post.car_buyTime');
            $data['car_no'] =  strval(I('post.car_no'));
            $data['car_userName'] = strval(I('post.car_userName'));
            $data['car_startTime'] = I('post.car_startTime');
           // $data['car_insurance_lastDate'] = I('post.car_insurance_lastDate');
           // $data['car_insurance_lastCost'] = I('post.car_insurance_lastCost');
           // $data['car_care_mileage'] = I('post.car_care_mileage');
           // $data['car_care_lastCost'] = I('post.car_care_lastCost');
           // $data['car_care_lastDate'] = I('post.car_care_lastDate');
           $data['user_tel']     = I('post.user_tel');
           $id = (int)I('post.id');
           if(!empty($id)){
               $check =  $t_caruser->where(array('id'=>$id))->find();
               if($check != null){
                    $where2 = array('id'=>$id);
                    $t_caruser->where($where2)->save($data);
                    $this->success('修改成功',U('Car/owner',array('token'=>$token,'wecha_id'=>$wecha_id)));
                    exit;
               }
           }else{
                $ok = $t_caruser->data($data)->add();
                if($ok){
                     $this->success('保存成功',U('Car/owner',array('token'=>$token,'wecha_id'=>$wecha_id)));exit;
               }else{
                    $this->error('噢，保存出错了。');exit;

                }
           }
        }
        $this->assign('user',$user);
        $this->display();
    }

     public function get_car_brand(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }
        //品牌 和 车系
         $token = I('get.token');
         $where=array('token'=>$token);
         $t_carseries=D('Carseries');
         $arr=$t_carseries->where($where)->field('id,brand_id,brand,name')->order('id asc')->group('name')->select();
         $this->assign('carseries',$arr);
         $t_car = M('Car')->where($where)->field('id,name')->select();
         $bcount = count($t_car);
         $count = count($arr);
         $data = array();
         for($i = 0; $i<$bcount; $i++){
            $data[$i+1]['name'] = $t_car[$i]['name'];
            for($j=0;$j<$count;$j++){
                if($t_car[$i]['id'] == $arr[$j]['brand_id']){
                    $data[$i+1]['cell'][$j+1]['name'] = $arr[$j]['name'];
                    $data[$i+1]['cell'][$j+1]['s_id'] = $arr[$j]['id'];
                }
            }
         }
       header( 'Content-Type: application/json; charset=UTF-8' );
       print json_encode($data);
    }

    public function showcar(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }
        $Photo = M("Photo");
        $photo_list = M('PhotoList');
        $t_carnews = M('Carnews');
        $carnews = $t_carnews->where(array('token'=>I('get.token')))->find();
        $photo = $Photo->where(array('token'=>I('get.token'),'id'=>$carnews['album_id']))->find();
        $photolist  =$photo_list->where(array('token'=>I('get.token'),'pid'=>$photo['id']))->select();
        $this->assign('photo',$photolist);
        $this->assign('info',$photo);
        $this->display('Photo:plist');


    }

    //最新车讯
    public function news(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }
        $t_carnews = M('Carnews');
        $carnews = $t_carnews->where(array('token'=>I('get.token')))->find();
        $type  = strip_tags(trim(I('get.type')));
        $token = I('get.token');
        if($type == 'pre'){//最新优惠
            $where = array('token'=>$token,'classid'=>$carnews['pre_id']);
            $wh    = array('token'=>$token,'id'=>$carnews['pre_id']);
        }elseif($type == 'oldcar'){ //尊享二手车
            $where = array('token'=>$token,'classid'=>$carnews['usedcar_id']);
            $wh    = array('token'=>$token,'id'=>$carnews['usedcar_id']);
        }else{
            $where = array('token'=>$token,'classid'=>$carnews['news_id']);
            $wh    = array('token'=>$token,'id'=>$carnews['news_id']);
        }

        $classify = M('Classify')->where($wh)->find();
        $t_img = M('Img')->where($where)->order('id desc,createtime desc')->select();
        $this->assign('news',$t_img);
        $this->assign('classify',$classify);
        $this->display();
    }

    public function newlist(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")) {
            notInWeixin();
        }
        $token = I('get.token');
        $mid = (int)I('get.mid');
        $t_img = M('Img');
        $where = array('id'=>$mid,'token'=>$token);
        $imgtxt = $t_img->where($where)->find();
        $this->assign('imgtxt',$imgtxt);
        $this->display();
    }

}

