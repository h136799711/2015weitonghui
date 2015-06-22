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
use Common\Controller\BaseController;

class RecipeController extends BaseController{
    public function _initialize(){
        parent :: _initialize();
        $type = filter_var($this -> _get('type'), FILTER_SANITIZE_STRING);
        $token = filter_var($this -> _get('token'), FILTER_SANITIZE_STRING);
        $id = filter_var($this -> _get('id'), FILTER_SANITIZE_STRING);
        $this -> assign('type', $type);
        $this -> assign('id', $id);
    }
    public function index(){
        $data = M('recipe');
        $type = filter_var($this -> _get('type'), FILTER_SANITIZE_STRING);
        $token = filter_var($this -> _get('token'), FILTER_SANITIZE_STRING);
        $id = filter_var($this -> _get('id'), FILTER_SANITIZE_STRING);
        $where = array('id' => $id, 'token' => $token, 'type' => $type, 'ishow' => 1);
        $recipe = $data -> where($where) -> order('sort desc') -> find();
        $this -> assign('recipe', $recipe);
        $this -> display();
    }
}
?>