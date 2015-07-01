<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model{

	protected $_validate =array(
		array('title','require','标题不能为空',1),
		array('imgs','require','封面不能为空',1),
	);
	
	protected $_auto = array (
		array('uid','getuser',self::MODEL_INSERT,'callback'),
		array('imgs','saveimg',self::MODEL_UPDATE,'callback'),
		array('createtime','time',self::MODEL_INSERT,'function'),
		array('updatetime','time',self::MODEL_BOTH,'function'),
	);
	
	function getuser(){
		return session('?uid')?session('uid'):0;
	}
	
	function saveimg(){
		$id=I('post.id','intval');
		$imgs=I('post.imgs','trim');
		$img=$this->field('imgs')->find($id);
		if(strcmp($imgs,$img['imgs'])!==0&&$imgs!=false&&$img['imgs']!=false){
			$original_img = explode(',',$img['imgs']);
			$newimgs=explode(',',$imgs);
			foreach($original_img as $val){
				if(!in_array($val,$newimgs)){
					//删除旧的图片
				}
			}
		}
		return $_POST['imgs'];
	}
	
}