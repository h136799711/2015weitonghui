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
/**
 * 图文回复
**/
class ImgController extends UserController{
	public function index(){
		$db=D('Img');
		//$where['uid']=session('uid');
		$where['token']=session('token');
		$count=$db->where($where)->count();
		$page=new \Think\Page($count,25);
		$info=$db->where($where)->order('usort DESC')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$page->show());
		$this->assign('info',$info);

		$this->display();
		
	}
	
	public function add(){
		$classify_db=M('Classify');

		$class=$classify_db->field("fid,id,name,concat(path,'-',id) as bpath")->order('bpath ASC')->where(array('token'=>session('token')))->select();
		foreach($class as $k=>$v){
			$total=(count(explode('-',$v['bpath']))-2)*10;
				for($i=0;$i<$total;$i++){

					$class[$k]['fg'].='-';
				}

			$id = $v['id'];
			$fidArr[] = $classify_db->field('distinct(fid)')->where(array('token'=>session('token'),"fid"=>$id))->select();
			if(!$fidArr[$k][0]['fid'] == NULL){
				$fid[] = $fidArr[$k][0]['fid'];
			}
		}

		
		if($class==false){$this->error('请先添加3G网站分类',U('Classify/index',array('token'=>session('token'))));}
		$this->assign('info',$class);
		$this->assign('fid',$fid);
		$this->display();
	}
	
	
	public function edit(){
		$db=M('Classify');
		$where['token']=session('token');

		$where['id']=I('get.id','intval');
		$where['uid']=session('uid');
		$res=D('Img')->where($where)->find();
		
		$thisClass=M('Classify')->field('id,path')->where(array('id'=>$res['classid']))->find();

		$path = $thisClass['path'].'-'.$thisClass['id'];
		$tree = explode('-',$path);
		foreach($tree as $k=>$v){
			if($v != 0){
				$name[] = $db->field("name")->where(array('token'=>session('token'),'id'=>$v))->find();
			}else{
				unset($tree[$k]);
			}
		}
		foreach ($name as $key=>$val){
			$t .= $val['name'].' >> ';
			$lastName = $val['name'];
		}

		$t = rtrim($t,' >> ');

		$this->assign('classValue',array_pop($tree).','.$lastName);
		
		$this->assign('thisClass',$thisClass);
		$this->assign('classtree',$t);
		$this->assign('fid',$fid);
		$this->assign('info',$res);
		$this->assign('class',$class);
		$this->assign('res',$class);
		$this->display();
	}
	
	
	public function del(){
		$where['id']=I('get.id','intval');
		$where['token']=$this->token;
		if(D(CONTROLLER_NAME)->where($where)->delete()){
			M('Keyword')->where(array('pid'=>I('get.id','intval'),'token'=>session('token'),'module'=>'Img'))->delete();
			$this->success('操作成功',U(CONTROLLER_NAME.'/index'));
		}else{
			$this->error('操作失败',U(CONTROLLER_NAME.'/index'));
		}
	}
	public function insert(){
		$_POST['info']=str_replace('\'','&apos;',$_POST['info']);
		$usersdata=M('Users');
		$usersdata->where(array('id'=>$this->user['id']))->setInc('diynum');
		$this->all_insert();
	}
	public function upsave(){
		$_POST['info']=str_replace('\'','&apos;',$_POST['info']);
		$this->all_save();
	}
	
	public function editClass(){
		$token = $this->token;
		$db = M('Classify');
		$id = I('get.id','intval');
		$class = $db->field('id,name,path')->where("token = '$token' AND fid = $id")->select();
		
		foreach($class as $k=>$v){
		
			$fid = $v['id'];
			$class[$k]['sub'] = $db->where("token = '$token' AND fid = $fid")->field('id,name')->select();
		}
		
				

		$this->assign('class',$class);
		
		$this->display();
	}
	
	public function editUsort(){
		$id = I('post.id','intval');
		$usort = I('post.v','intval');
		$token = I('post.token',"htmlspecialchars");
		
		if(M('Img')->where("token = '$token' AND id = $id")->setField('usort',$usort)){
			echo $usort;
		}else{
			echo 'error';
		}
	}

	public function addKeyword($pid){
		$keyword = M('Keyword');
		$data = $_POST;
		$data['module'] = 'Multimg';
		$data['token'] = getToken();
		$data['keyword'] = $_POST['title'] ? $_POST['title'] : '多图文';
		$data['pid'] = $pid;
		return $keyword->data($data)->add();
	}

	public function multi(){
		if(IS_POST){
			
			
			$data = $_POST;
			$data['keyword'] = $_POST['title'] ? $_POST['title'] : '多图文';
			$data['imgids'] = trim($_POST['imgids'],',');
			$data['token'] = getToken();
			$multimg = D('Multimg');
			if(!$multimg->create($data)){
			$this->error('操作失败,'.$multimg->getError(),U(CONTROLLER_NAME.'/multi',array('token'=>getToken())));
			}else{
				$rst = $multimg->add();
				if($rst !== FALSE){
					if($this->addKeyword($rst) !== FALSE){
					$this->success('操作成功！',U(CONTROLLER_NAME.'/multi',array('token'=>getToken())));
					}else{
				$this->error('操作失败！',U(CONTROLLER_NAME.'/multi',array('token'=>getToken())));
					}
				}else{
				$this->error('操作失败！',U(CONTROLLER_NAME.'/multi',array('token'=>getToken())));
				}
			}
		}else{
			$this->display();
		}
	}

	public function listm(){
		$token = getToken();
		$Multimg = M('Multimg'); // 实例化User对象
 		import('Org.Util.Page');// 导入分页类
		$count  = $Multimg->where(array('token'=>$token))->count();// 查询满足要求的总记录数
		$Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
	 	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Multimg->where(array('token'=>$token))->limit($Page->firstRow.','.$Page->listRows)->select();
		$db = M('Img');
		foreach($list as $k=>$v){
			$fid = $v['imgids'];
			$list[$k]['sub'] = $db->where("token = '$token' AND id in ( $fid ) ")->field('id,keyword')->select();
		}
		// var_dump($list);
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}

	public function delMulti(){
		$rst = M('Multimg')->where(array('id'=>$_GET['id']))->delete();
		if($rst !== FALSE){
			$this->success('操作成功！',U(CONTROLLER_NAME.'/multi',array('token'=>getToken())));
		}else{
			$this->error('操作失败！',U(CONTROLLER_NAME.'/multi',array('token'=>getToken())));
		}
	}
}
?>