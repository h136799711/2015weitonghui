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
 * 通用模板管理
 *
 */
class ShoptmplsController extends UserController
{
    
    public function index() {
        $db = D('Wxuser');
        $where['token'] = session('token');
        $where['uid'] = session('uid');
        $info = $db->where($where)->find();
        $listtpl = '0';
        
        if (isset($info['config'])) {
            
            $listtpl = unserialize($info['config']);
            $listtpl = $listtpl['store']['listtpl'];
        }
        
        $this->assign('listtpl', $listtpl);
        $this->assign('info', $info);
        
        //
        $this->display();
    }
    
    /**
     * 保存商城模板配置
     * @return false,操作失败 | 影响行数
     */
    public function saveTplConfig($tplid) {
        
        $wxuser = M('wxuser');
        $map['token'] = session('token');
        $obj = $wxuser->where($map)->find();
        $conifg = unserialize($obj['config']);
        
        if (empty($config)) {
            $config = array();
        }
        
        if (!isset($config['store'])) {
            $config['store'] = array();
        }
        
        $config['store']['listtpl'] = $tplid;
        
        return $wxuser->where($map)->save(array('config' => serialize($config)));
    }
    
    public function add() {
        $gets = I('get.style');
        $db = M('Wxuser');
        $data['shoptpltypeid']  = $gets;
        // switch ($gets) {
        //     case 1:
        //         $data['shoptpltypeid'] = 3;
        //         $data['shoptpltypename'] = 'index_3';
        //         break;

        //     case 2:
        //         $data['shoptpltypeid'] = 4;
        //         $data['shoptpltypename'] = 'index_4';
        //         break;

        //     case 3:
        //         $data['shoptpltypeid'] = 5;
        //         $data['shoptpltypename'] = 'index_5';
        //         break;

        //     case 4:
        //         $data['shoptpltypeid'] = 6;
        //         $data['shoptpltypename'] = 'index_6';
        //         break;

        //     case 5:
        //         $data['shoptpltypeid'] = 7;
        //         $data['shoptpltypename'] = 'index_7';
        //         break;

        //     case 6:
        //         $data['shoptpltypeid'] = 8;
        //         $data['shoptpltypename'] = 'index_8';
        //         break;

        //     case 7:
        //         $data['shoptpltypeid'] = 9;
        //         $data['shoptpltypename'] = 'index_9';
        //         break;

        //     case 8:
        //         $data['shoptpltypeid'] = 10;
        //         $data['shoptpltypename'] = 'index_10';
        //         break;

        //     case 9:
        //         $data['shoptpltypeid'] = 11;
        //         $data['shoptpltypename'] = 'index_11';
        //         break;

        //     case 10:
        //         $data['shoptpltypeid'] = 12;
        //         $data['shoptpltypename'] = 'index_12';
        //         break;

        //     case 11:
        //         $data['shoptpltypeid'] = 13;
        //         $data['shoptpltypename'] = 'index_13';
        //         break;

        //     case 12:
        //         $data['shoptpltypeid'] = 14;
        //         $data['shoptpltypename'] = 'index_14';
        //         break;

        //     case 13:
        //         $data['shoptpltypeid'] = 15;
        //         $data['shoptpltypename'] = 'index_15';
        //         break;

        //     case 14:
        //         $data['shoptpltypeid'] = 16;
        //         $data['shoptpltypename'] = 'index_16';
        //         break;

        //     case 15:
        //         $data['shoptpltypeid'] = 17;
        //         $data['shoptpltypename'] = 'index_17';
        //         break;

        //     case 16:
        //         $data['shoptpltypeid'] = 18;
        //         $data['shoptpltypename'] = 'index_18';
        //         break;
        // }
        $this->saveTplConfig($data['shoptpltypeid']);
        
        $this->success('设置成功', U('User/Shoptmpls/index', array('token' => $this->token)));
    }
}
?>