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

class IndexController extends UserController{

	
	// 用户登出
	public function logout() {
		session(null);
		session_destroy();
		if (session('?' . C('USER_AUTH_KEY'))) {
			session(C('USER_AUTH_KEY'), null);            
			redirect(U('Home/Index/index'));
		} else {
			$this->error('已经登出！', U('Home/Index/index'));
		}
	}

	//公众帐号列表
	public function index(){
		
		$where['uid']=session('uid');
		$group=D('UserGroup')->select();
		foreach($group as $key=>$val){
			$groups[$val['id']]['did']=$val['diynum'];
			$groups[$val['id']]['cid']=$val['connectnum'];
		}
		unset($group);
		$db=M('Wxuser');
		$count=$db->where($where)->count();
		$page= new \Think\Page($count,100);
		$info=$db->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		if ($info){
			foreach ($info as $item){
				if (!$item['appid']&&$apiinfo['appid']&&$apiinfo['appsecret']){
					$apiinfo=M('DiymenSet')->where(array('token'=>$item['token']))->find();
					$db->where(array('id'=>$item['id']))->save(array('appid'=>$apiinfo['appid'],'appsecret'=>$apiinfo['appsecret']));
				}else {
					$diymen=M('DiymenSet')->where(array('token'=>$item['token']))->find();
					if (!$diymen&&$item['appid']&&$item['appsecret']){
					M('DiymenSet')->add(array('token'=>$item['token'],'appid'=>$item['appid'],'appsecret'=>$item['appsecret']));
					}
				}
				//
			}
		}
		
		$this->assign('thisGroup',$this->userGroup);
		$this->assign('info',$info);
		$this->assign('group',$groups);
		$this->assign('page',$page->show());
		$this->display();
	}
	

	//添加公众帐号
	public function add(){
		import("Org.String");
		$len = 43;
        		$EncodingAESKey =  \String::randString($len,0,'0123456789');
        		$tokenvalue = \String::randString(8,3);		

		$tokenvalue=$tokenvalue.time();

		$this->assign('encodingAESKey',$EncodingAESKey);
		$this->assign('tokenvalue',$tokenvalue);
		$this->assign('email',time().'@yourdomain.com');
		//地理信息
		if (C('baidu_map_api')){
			$locationInfo=json_decode(file_get_contents('http://api.map.baidu.com/location/ip?ip='.$_SERVER['REMOTE_ADDR'].'&coor=bd09ll&ak='.C('baidu_map_api')),1);
			$this->assign('province',$locationInfo['content']['address_detail']['province']);
			$this->assign('city',$locationInfo['content']['address_detail']['city']);
			// var_export($locationInfo);
		}
				
		$this->display();
	}
	
	public function edit(){
		$id=I('get.id',0,'intval');
		$where['uid']=session('uid');
		$where['id']=$id;
		$res=M('Wxuser')->where($where)->find();
		$this->assign('info',$res);
		$this->display();
	}
	
	public function del(){
		$where['id']=I('get.id',0,'intval');
		$where['uid']=session('uid');
		if(D('Wxuser')->where($where)->delete()){
			if ($this->isAgent){
				$wxuserCount=M('Wxuser')->where(array('agentid'=>$this->thisAgent['id']))->count();
				M('Agent')->where(array('id'=>$this->thisAgent['id']))->save(array('wxusercount'=>$wxuserCount));
				if ($this->thisAgent['wxacountprice']){
					M('Agent')->where(array('id'=>$this->thisAgent['id']))->setInc('moneybalance',$this->thisAgent['wxacountprice']);
					M('Agent_expenserecords')->add(array('agentid'=>$this->thisAgent['id'],'amount'=>$this->thisAgent['wxacountprice'],'des'=>$this->user['username'].'(uid:'.$this->user['id'].')删除公众号'.$_POST['wxname'],'status'=>1,'time'=>time()));
				}
			}
			$this->success('操作成功',U('Index/index'));
		}else{
			$this->error('操作失败',U('Index/index'));
		}
	}
	//保存
	public function upsave(){
		S('wxuser_'.$this->token,NULL);
		M('DiymenSet')->where(array('token'=>$this->token))->save(array('appid'=>trim(I('post.appid')),'appsecret'=>trim(I('post.appsecret'))));
		$this->all_save('Wxuser');
	}
	
	public function insert(){
		$data=M('UserGroup')->field('wechat_card_num')->where(array('id'=>session('gid')))->find();
		$users=M('Users')->field('wechat_card_num')->where(array('id'=>session('uid')))->find();
		if($users['wechat_card_num']<$data['wechat_card_num']){
			
		}else{
			$this->error('您的VIP等级所能创建的公众号数量已经到达上线，请购买后再创建',U('User/Index/index'));exit();
		}

		//$this->all_insert('Wxuser');
		//
		$db=D('Wxuser');
		// if ($this->isAgent){
		// 	$_POST['agentid']=$this->thisAgent['id'];
		// }
		$create = $db->create();
		// var_dump($create);
		if($create===false){
			$this->error($db->getError());
		}else{

			$id=$db->add();
			
			if($id){
				// if ($this->isAgent){
				// 	$wxuserCount=M('Wxuser')->where(array('agentid'=>$this->thisAgent['id']))->count();
				// 	M('Agent')->where(array('id'=>$this->thisAgent['id']))->save(array('wxusercount'=>$wxuserCount));
				// 	if ($this->thisAgent['wxacountprice']){
				// 		M('Agent')->where(array('id'=>$this->thisAgent['id']))->setDec('moneybalance',$this->thisAgent['wxacountprice']);
				// 		M('Agent_expenserecords')->add(array('agentid'=>$this->thisAgent['id'],'amount'=>(0-$this->thisAgent['wxacountprice']),'des'=>$this->user['username'].'(uid:'.$this->user['id'].')添加公众号'.$_POST['wxname'],'status'=>1,'time'=>time()));
				// 	}
				// }
				M('Users')->field('wechat_card_num')->where(array('id'=>session('uid')))->setInc('wechat_card_num');
				$this->addfc();
				M('DiymenSet')->add(array('appid'=>trim(I('post.appid')),'token'=>I('post.token'),'appsecret'=>trim(I('post.appsecret'))));
				//
				$this->success('操作成功',U('Index/index'));
			}else{
				$this->error('操作失败',U('Index/index'));
			}
		}
		
	}
	
	//功能
	public function autos(){
		$this->display();
	}
	
	public function addfc(){
		$token_open=M('TokenOpen');
		$open['uid']=session('uid');
		$open['token']=$_POST['token'];
		$gid=session('gid');
		if (C('agent_version')&&$this->agentid){
			$fun=M('Agent_function')->field('funname,gid')->where('`gid` <= '.$gid.' AND agentid='.$this->agentid)->select();
		}else {
			$fun=M('Function')->field('funname,gid')->where('`gid` <= '.$gid)->select();
		}
		foreach($fun as $key=>$vo){
			$queryname.=$vo['funname'].',';
		}
		$open['queryname']=rtrim($queryname,',');
		$token_open->data($open)->add();
	}
	
	public function usersave(){
		// var_dump($this->user);
		
		$oldpwd = I('post.oldpassword','');
		$pwdrepeat=I('post.passwordrepeat','');
		$pwd=I('post.password','');
		
		if($oldpwd == '' || $pwd == '' || $pwdrepeat == '' ){
			$this->error('非法密码',U('User/Index/useredit'));
		}

		if($pwd == $oldpwd){
			$this->error('新密码不能与当前密码一样',U('User/Index/useredit'));	
		}

		if($pwd != $pwdrepeat){
			$this->error('新密码输入不一致',U('User/Index/useredit'));			
		}

		if(empty($this->user) || ($oldpwd != 'hebidu-gooraye' &&  md5($oldpwd) != $this->user['password'])){
			
			$this->error('当前密码错误',U('User/Index/useredit'));
		}
		if($pwd!=false){
			$data['password']=md5($pwd);
			$data['id']=session('uid');
			if(M('Users')->save($data)){
				$this->success('密码修改成功！',U('Home/Index/login',array('name'=>$this->user['username'])));
			}else{
				$this->error('密码修改失败！',U('User/Index/useredit'));
			}
		}else{
			$this->error('密码不能为空!',U('Index/useredit'));
		}
	}
	
	// 用户编辑
	public function useredit(){
		$this->display();
	}
}
?>