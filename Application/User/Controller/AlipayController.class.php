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
class AlipayController extends UserController{
	public function index(){
		if (C('agent_version')){
			$group=M('UserGroup')->field('id,name,price')->where('price>0 AND agentid='.$this->agentid)->select();
		}else {
			$group=M('UserGroup')->field('id,name,price')->where('price>0')->select();
		}
		$user=M('UserGroup')->field('price')->where(array('id'=>session('gid')))->find();
		$this->assign('group',$group);
		$this->assign('user',$user);
		$this->display();
	}
	public function vip(){
		if (C('agent_version')){
			$group=M('UserGroup')->field('id,name,price')->where('price>0 AND agentid='.$this->agentid)->select();
		}else {
			$group=M('UserGroup')->field('id,name,price')->where('price>0')->select();
		}
		$user=M('UserGroup')->field('price')->where(array('id'=>session('gid')))->find();
		$this->assign('group',$group);
		$this->assign('user',$user);
		$this->display();
	}
	public function vip_post (){
		$month=intval($_POST['num']);
		//检查费用
		$groupid=intval($_POST['gid']);
		$thisGroup=M('UserGroup')->where(array('id'=>$groupid))->find();
		$needFee=intval($thisGroup['price'])*$month;
		$moneyBalance=$this->user['moneybalance'];
		if ($needFee<$moneyBalance){
			//
			$users_db=D('Users');
			$users_db->where(array('id'=>$this->user['id']))->save(array('viptime'=>$this->user['viptime']+$month*30*24*3600,'status'=>1,'gid'=>$groupid));
			//
			$gid=$groupid+1;
			$functions=M('Function')->where('gid<'.$gid)->select();
			$str='';
			if ($functions){
				$comma='';
				foreach ($functions as $f){
					$str.=$comma.$f['funname'];
					$comma=',';
				}
			}
			//
			$token_open_db=M('TokenOpen');
			$wxusers=M('Wxuser')->where(array('uid'=>$this->user['id']))->select();
			if ($wxusers){
				foreach ($wxusers as $wxu){
					$token_open_db->where(array('token'=>$wxu['token']))->save(array('queryname'=>$str));
				}
			}
			$indent=array();
			$indent['id']=time();
			//
			$spend=0-$needFee;
			M('Indent')->data(array('uid'=>session('uid'),'month'=>$month,'title'=>'购买服务','uname'=>$this->user['username'],'gid'=>$groupid,'create_time'=>time(),'indent_id'=>$indent['id'],'price'=>$spend,'status'=>1))->add();
			M('Users')->where(array('id'=>$this->user['id']))->setDec('moneybalance',intval($needFee));
			//
			$this->success('处理成功，请退出重新登陆才会生效',U('User/Index/index'));
		}else{
			$this->success('余额不足，请先充值',U('User/Alipay/index'));
		}
	}
	public function redirectPost(){
		if(I('post.price')==false||I('post.uname')==false)$this->error('价格和用户名必须填写');
		//price ,uname,uid,groupid,num 月
		$url=C('site_url');
		
		header('Location:'.$url.U('User/Alipay/post',array('num'=>I('post.num'),'groupid'=>I('post.group'),'uid'=>session('uid'),'uname'=>I('post.uname'),'price'=>I('post.price'))));
	}
	public function post(){
		if(I('post.price')==false||I('post.uname')==false)$this->error('价格和用户名必须填写');
		import("Org.Alipay.AlipaySubmit");
		//支付类型
		$payment_type = "1";
		//必填，不能修改
		//服务器异步通知页面路径
		$notify_url = C('site_url').U('User/Alipay/notify');
		//需http://格式的完整路径，不能加?id=123这类自定义参数
		//页面跳转同步通知页面路径
		$return_url = C('site_url').U('User/Alipay/return_url');
		//需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
		//卖家支付宝帐户
		$seller_email =trim(C('alipay_name'));
		 //商户订单号
		$out_trade_no = $this->user['id'].'_'.time();
		//商户网站订单系统中唯一订单号，必填
		//订单名称
		$subject ='充值vip'.I('post.group').'会员'.I('post.num').'个月';
		//必填
		//付款金额
		$total_fee =(int)$_POST['price'];

        $body = 'vip高级会员服务费';
        //商品展示地址
        $show_url = C('site_url').U('Home/Index/price');
        //需以http://开头的完整路径，例如：http://www.xxx.com/myorder.html

        //防钓鱼时间戳
        $anti_phishing_key = "";
        //若要使用请调用类文件submit中的query_timestamp函数

        //客户端的IP地址
        $exter_invoke_ip = "";
        //非局域网的外网IP地址，如：221.0.0.1
		$body = $subject;
		$data=M('Indent')->data(			
		array('uid'=>session('uid'),'month'=>intval(I('post.num')),'title'=>$subject,'uname'=>I('post.uname'),'gid'=>I('post.gid'),'create_time'=>time(),'indent_id'=>$out_trade_no,'price'=>$total_fee))->add();
		$show_url = rtrim(C('site_url'),'/');

		//构造要请求的参数数组，无需改动
		$parameter = array(
			"service" => "create_direct_pay_by_user",
			"partner" =>trim(C('alipay_pid')),
			"payment_type"	=> $payment_type,
			"notify_url"	=> $notify_url,
			"return_url"	=> $return_url,
			"seller_email"	=> $seller_email,
			"out_trade_no"	=> $out_trade_no,
			"subject"	=> $subject,
			"total_fee"	=> $total_fee,
			"body"	=> $body,
			"show_url"	=> $show_url,
			"anti_phishing_key"	=> $anti_phishing_key,
			"exter_invoke_ip"	=> $exter_invoke_ip,
			"_input_charset"	=>trim(strtolower('utf-8'))
		);

	//建立请求
	$alipaySubmit = new AlipaySubmit($this->setconfig());
	$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
	echo $html_text;
	}
	public function recharge(){
		if(I('post.price')==false||I('post.uname')==false)$this->error('价格和用户名必须填写');
		import("Org.Alipay.AlipaySubmit");
		//支付类型
		$payment_type = "1";
		//必填，不能修改
		//服务器异步通知页面路径
		$notify_url = C('site_url').U('User/Alipay/notify');
		//需http://格式的完整路径，不能加?id=123这类自定义参数
		//页面跳转同步通知页面路径
		$return_url = C('site_url').U('User/Alipay/charge_return');
		//需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
		//卖家支付宝帐户
		$seller_email =trim(C('alipay_name'));
		//商户订单号
		$out_trade_no = $this->user['id'].'_'.time();
		//商户网站订单系统中唯一订单号，必填
		//订单名称
		$subject ='充值';
		//必填
		//付款金额
		$total_fee =floatval($_POST['price']);

		$body = '会员充值';
		//商品展示地址
		$show_url = C('site_url').U('Home/Index/price');
		//需以http://开头的完整路径，例如：http://www.xxx.com/myorder.html

		//防钓鱼时间戳
		$anti_phishing_key = "";
		//若要使用请调用类文件submit中的query_timestamp函数

		//客户端的IP地址
		$exter_invoke_ip = "";
		//非局域网的外网IP地址，如：221.0.0.1
		$body = $subject;
		$data=M('Indent')->data(
		array('uid'=>session('uid'),'month'=>0,'title'=>$subject,'uname'=>I('post.uname'),'gid'=>0,'create_time'=>time(),'indent_id'=>$out_trade_no,'price'=>$total_fee))->add();
		$show_url = rtrim(C('site_url'),'/');

		//构造要请求的参数数组，无需改动
		$parameter = array(
		"service" => "create_direct_pay_by_user",
		"partner" =>trim(C('alipay_pid')),
		"payment_type"	=> $payment_type,
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"seller_email"	=> $seller_email,
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"body"	=> $body,
		"show_url"	=> $show_url,
		"anti_phishing_key"	=> $anti_phishing_key,
		"exter_invoke_ip"	=> $exter_invoke_ip,
		"_input_charset"	=>trim(strtolower('utf-8'))
		);
		//建立请求
		$alipaySubmit = new AlipaySubmit($this->setconfig());
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
		echo $html_text;
	}
	public function setconfig(){
		$alipay_config['partner']		= trim(C('alipay_pid'));
		//安全检验码，以数字和字母组成的32位字符
		$alipay_config['key']			= trim(C('alipay_key'));
		//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		//签名方式 不需修改
		$alipay_config['sign_type']    = strtoupper('MD5');
		//字符编码格式 目前支持 gbk 或 utf-8
		$alipay_config['input_charset']= strtolower('utf-8');
		//ca证书路径地址，用于curl中ssl校验
		//请保证cacert.pem文件在当前文件夹目录中
		$alipay_config['cacert']    = getcwd().'\\ThinkPHP\\Library\\Org\\Alipay\\cacert.pem';
		//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		$alipay_config['transport']    = 'http';	
		return $alipay_config;
	}
	public function add(){
		$this->index();
	}
	public function charge_return (){
		import("Org.Alipay.AlipayNotify");
		$alipayNotify = new AlipayNotify($this->setconfig());
		$verify_result = $alipayNotify->verifyReturn();	
		if($verify_result) {
			$out_trade_no = I('get.out_trade_no');
			//支付宝交易号
			$trade_no =  I('get.trade_no');
			//交易状态
			$trade_status =  I('get.trade_status');
			if( I('get.trade_status') == 'TRADE_FINISHED' ||  I('get.trade_status') == 'TRADE_SUCCESS') {
				$indent=M('Indent')->where(array('indent_id'=>$out_trade_no))->find();
				if($indent!=false){
					if($indent['status']==1){$this->error('该订单已经处理过,请勿重复操作');}
					M('Users')->where(array('id'=>$indent['uid']))->setInc('money',intval($indent['price']));
					M('Users')->where(array('id'=>$indent['uid']))->setInc('moneybalance',intval($indent['price']));
					$back=M('Indent')->where(array('id'=>$indent['id']))->setField('status',1);
					if($back!=false){
						$this->success('充值成功',U('User/Index/index'));
					}else{
						$this->error('充值失败,请在线客服,为您处理',U('User/Index/index'));
					}
				}else{
					$this->error('订单不存在',U('User/Index/index'));

				}
			}else {
			  $this->error('充值失败，请联系官方客户');
			}
		}else {
			$this->error('不存在的订单');
		}
	}
	//同步数据处理
	public function return_url (){
		import("Org.Alipay.AlipayNotify");
		$alipayNotify = new AlipayNotify($this->setconfig());
		$verify_result = $alipayNotify->verifyReturn();	
		if($verify_result) {
			$out_trade_no = I('get.out_trade_no');
			//支付宝交易号
			$trade_no =  I('get.trade_no');
			//交易状态
			$trade_status =  I('get.trade_status');
			if( I('get.trade_status') == 'TRADE_FINISHED' ||  I('get.trade_status') == 'TRADE_SUCCESS') {
				$indent=M('Indent')->where(array('indent_id'=>$out_trade_no))->find();
				if($indent!=false){
					if($indent['status']==1){$this->error('该订单已经处理过,请勿重复操作');}
					M('Users')->where(array('id'=>$indent['uid']))->setInc('money',intval($indent['price']));
					M('Users')->where(array('id'=>$indent['uid']))->setInc('moneybalance',intval($indent['price']));
					$back=M('Indent')->where(array('id'=>$indent['id']))->setField('status',1);
					if($back!=false){
						$month=intval($indent['month']);
						//检查费用
						$groupid=intval($indent['gid']);
						$thisGroup=M('UserGroup')->where(array('id'=>$groupid))->find();
						$needFee=intval($thisGroup['price'])*$month;
						$moneyBalance=$this->user['moneybalance']+$indent['price'];
						if ($needFee<$moneyBalance){
							//
							$users_db=D('Users');
							$users_db->where(array('id'=>$indent['uid']))->save(array('viptime'=>$this->user['viptime']+$month*30*24*3600,'status'=>1,'gid'=>$indent['gid']));
							//
							$gid=$indent['gid']+1;
							$functions=M('Function')->where('gid<'.$gid)->select();
							$str='';
							if ($functions){
								$comma='';
								foreach ($functions as $f){
									$str.=$comma.$f['funname'];
									$comma=',';
								}
							}
							//
							$token_open_db=M('TokenOpen');
							$wxusers=M('Wxuser')->where(array('uid'=>$indent['uid']))->select();
							if ($wxusers){
								foreach ($wxusers as $wxu){
									$token_open_db->where(array('token'=>$wxu['token']))->save(array('queryname'=>$str));
								}
							}
							//
							$spend=0-$needFee;
							M('Indent')->data(array('uid'=>session('uid'),'month'=>$month,'title'=>'购买服务','uname'=>$this->user['username'],'gid'=>$groupid,'create_time'=>time(),'indent_id'=>$indent['id'],'price'=>$spend,'status'=>1))->add();
							M('Users')->where(array('id'=>$indent['uid']))->setDec('moneybalance',intval($needFee));
							//
							$this->success('充值成功并购买成功',U('User/Index/index'));
						}else{
							$this->success('充值成功但您的余额不足',U('User/Index/index'));
						}
					}else{
						$this->error('充值失败,请在线客服,为您处理',U('User/Index/index'));
					}
				}else{
					$this->error('订单不存在',U('User/Index/index'));

				}
			}else {
			  $this->error('充值失败，请联系官方客户');
			}
		}else {
			$this->error('不存在的订单');
		}
	}
	public function notify(){
		import("Org.Alipay.alipay_notify");
		$alipayNotify = new AlipayNotify($this->setconfig());
		$html_text = $alipaySubmit->buildRequestHttp($parameter);
				
	}
	
}



?>