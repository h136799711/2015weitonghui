<?php

// .-----------------------------------------------------------------------------------
// |
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
namespace Common\Controller;
use Think\Controller;

class BaseController extends Controller
{
    public $isAgent;
    public $reg_needCheck;
    public $minGroupid;
    public $reg_validDays;
    public $reg_groupid;
    public $thisAgent;
    public $agentid;
    public $adminMp;
    protected function _initialize() {
        $this->assign('action', ACTION_NAME);
        
        $this->isAgent = 0;
        
        $this->agentid = 0;
        if (!C('site_logo')) {
            $cfg_logo = 'Public/static/logo.png';
        } else {
            $cfg_logo = C('site_logo');
        }
        $cfg_siteName = C('SITE_NAME');
        $cfg_siteTitle = C('SITE_TITLE');
        $cfg_metaKeyword = C('keyword');
        $cfg_metaDes = C('content');
        $cfg_qq = C('site_qq');
        $cfg_qrcode = 'Public/Home/images/ewm2.jpg';
        $cfg_siteUrl = C('site_url');
        $cfg_regNeedMp = C('reg_needmp') == 'true' ? 1 : 0;
        $this->reg_needCheck = C('ischeckuser') == 'false' ? 1 : 0;
        $this->minGroupid = 1;
        $this->reg_validDays = C('reg_validdays');
        $this->reg_groupid = C('reg_groupid');
        $this->adminMp = C('site_mp');
        
        $this->assign('cfg_logo', $cfg_logo);
        $this->assign('cfg_siteName', $cfg_siteName);
        $this->assign('cfg_siteTitle', $cfg_siteTitle);
        $this->assign('cfg_metaKeyword', $cfg_metaKeyword);
        $this->assign('cfg_metaDes', $cfg_metaDes);
        $this->assign('cfg_qq', $cfg_qq);
        $this->assign('cfg_qrcode', $cfg_qrcode);
        $this->assign('cfg_siteUrl', $cfg_siteUrl);
        $this->assign('cfg_regNeedMp', $cfg_regNeedMp);
    }
    
    protected function all_insert($name = '', $back = '/index') {
        
        $name = $name ? $name : CONTROLLER_NAME;
        $db = D($name);
        if ($db->create() === false) {
            $this->error($db->getError());
        } else {
            $id = $db->add();
            if ($id) {
                $m_arr = array('Img', 'Text', 'Voiceresponse', 'Ordering', 'Lottery', 'Host', 'Product', 'Selfform', 'Panorama', 'Wedding', 'Vote', 'Estate', 'Reservation', 'GreetingCard');
                if (in_array($name, $m_arr)) {
                    $data['pid'] = $id;
                    $data['module'] = $name;
                    $data['token'] = session('token');
                    $data['keyword'] = $_POST['keyword'];
                    M('Keyword')->add($data);
                }
                $this->success('操作成功', U(CONTROLLER_NAME . $back));
            } else {
                $this->error('操作失败', U(CONTROLLER_NAME . $back));
            }
        }
    }
    protected function insert($name = '', $back = '/index') {
        $name = $name ? $name : CONTROLLER_NAME;
        $db = D($name);
        if ($db->create() === false) {
            $this->error($db->getError());
        } else {
            $id = $db->add();
            if ($id == true) {
                $this->success('操作成功', U(CONTROLLER_NAME . $back));
            } else {
                $this->error('操作失败', U(CONTROLLER_NAME . $back));
            }
        }
    }
    protected function save($name = '', $back = '/index') {
        $name = $name ? $name : CONTROLLER_NAME;
        $db = D($name);
        if ($db->create() === false) {
            $this->error($db->getError());
        } else {
            $id = $db->save();
            if ($id == true) {
                $this->success('操作成功', U(CONTROLLER_NAME . $back));
            } else {
                $this->error('操作失败', U(CONTROLLER_NAME . $back));
            }
        }
    }
    
    protected function all_save($name = '', $back = '/index') {
        $name = $name ? $name : CONTROLLER_NAME;
        $db = D($name);
        
        if ($db->create() === false) {
            $this->error($db->getError());
        } else {
            $id = $db->save();
            if ($id) {
                $m_arr = array('Img', 'Text', 'Voiceresponse', 'Ordering', 'Lottery', 'Host', 'Product', 'Selfform', 'Panorama', 'Wedding', 'Vote', 'Estate', 'Reservation', 'Carowner', 'Carset');
                if (in_array($name, $m_arr)) {
                    $data['pid'] = $_POST['id'];
                    $data['module'] = $name;
                    $data['token'] = session('token');
                    $da['keyword'] = $_POST['keyword'];
                    M('Keyword')->where($data)->save($da);
                }
                $this->success('操作成功', U(CONTROLLER_NAME . $back));
            } else {
                $this->error('操作失败', U(CONTROLLER_NAME . $back));
            }
        }
    }
    protected function del_id($name = '', $jump = '') {
        $name = $name ? $name : CONTROLLER_NAME;
        $jump = empty($name) ? CONTROLLER_NAME . '/index' : $jump;
        $db = D($name);
        $where['id'] = $this->_get('id', 'intval');
        $where['token'] = session('token');
        if ($db->where($where)->delete()) {
            $this->success('操作成功', U($jump));
        } else {
            $this->error('操作失败', U(CONTROLLER_NAME . '/index'));
        }
    }
    protected function all_del($id, $name = '', $back = '/index') {
        $name = $name ? $name : CONTROLLER_NAME;
        $db = D($name);
        if ($db->delete($id)) {
            $this->ajaxReturn('操作成功', U(CONTROLLER_NAME . $back));
        } else {
            $this->ajaxReturn('操作失败', U(CONTROLLER_NAME . $back));
        }
    }
    
    /* 空操作，用于输出404页面 */
    public function _empty() {
        redirect(__ROOT__ . '/Public/404.html', 0, '请求资源不存在！');
    }
}
