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
class NodeModel extends Model{
	// protected $_validate = array(
		// array('pid','number','父节点不能为空！',1),
		//array('title','','节点名称不能为空！'),
		//array('name','','节点名字不能为空！'),
		// array('level',array(1,2,3),'节点类型非法！',1,'in'), 
		// array('display',array(0,1,2),'显示类型非法！',1,'in'),
	// );
	protected $_validate	=	array(
        		array('name','checkNode','节点已经存在',0,'callback',Model:: MODEL_INSERT),
        );

    public function checkNode() {
        $map['name']	 =	 $_POST['name'];
        $map['pid']	=	isset($_POST['pid'])?$_POST['pid']:0;
        $map['status'] = 1;
        if(!empty($_POST['id'])) {
            $map['id']	=	array('neq',$_POST['id']);
        }
        $result	=	$this->where($map)->field('id')->find();
        if($result) {
            return false;
        }else{
            return true;
        }
    }
	// 获取所有节点信息
	public function getAllNode($where = '' , $order = 'sort DESC') {
		return $this->where($where)->order($order)->select();
	}

	// 获取单个节点信息
	public function getNode($where = '',$field = '*') {
		return $this->field($field)->where($where)->find();
	}

	// 删除节点
	public function delNode($where) {
		if($where){
			return $this->where($where)->delete();
		}else{
			return false;
		}
	}

	// 更新节点
	public function upNode($data) {
		if($data){
			return $this->save($data);
		}else{
			return false;
		}
	}

	// 子节点
	public function childNode($id){
		return $this->where(array('pid'=>$id))->select();
	}
}