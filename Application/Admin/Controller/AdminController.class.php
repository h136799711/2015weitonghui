<?php

// .-----------------------------------------------------------------------------------
// |
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\BaseController;

class AdminController extends BaseController
{
    
    protected $pid;
    protected function _initialize(){
        if(!session('?username')){
            $this -> error('非法操作', U('Index/index'));
        }

        parent :: _initialize();
        if (C('USER_AUTH_ON') && !in_array(CONTROLLER_NAME, explode(',', C('NOT_AUTH_MODULE')))){
            import('Org.RBAC');
            if (!\RBAC :: AccessDecision()){
                if (!session(C('USER_AUTH_KEY'))){
                    redirect(PHP_FILE . C('USER_AUTH_GATEWAY'));
                }
                if (C('RBAC_ERROR_PAGE')){
                    redirect(C('RBAC_ERROR_PAGE'));
                }else{
                    if (C('GUEST_AUTH_ON')){
                        $this -> assign('jumpUrl', PHP_FILE . C('USER_AUTH_GATEWAY'));
                    }
                    $this -> error(L('_VALID_ACCESS_'));
                }
            }
        }
        $this -> show_menu();
    }
    private function show_menu(){
        $this -> pid = I('get.pid',2, 'intval');
        $where['level'] = I('get.level',0, 'intval');
        $where['pid'] = $this -> pid;
        $title = rawurldecode(I('get.title'));
        $where['status'] = 1;
        $where['display'] = array('gt', 0);
        $order['sort'] = 'asc';
        $nav = M('Node') -> where($where) -> order($order) -> select();
        $this -> assign('title', $title);
        $this -> assign('nav', $nav);
    }
}
?>