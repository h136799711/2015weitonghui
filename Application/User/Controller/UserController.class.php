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
use Think\Route;
use Common\Controller\BaseController;

class UserController extends BaseController
{
    
    public $userGroup;
    public $token;
    public $user;
    public $userFunctions;
    protected function _initialize() {
        
        parent::_initialize();
        $userinfo = M('UserGroup')->where(array('id' => session('gid')))->find();
        $this->userGroup = $userinfo;
        $users = M('Users')->where(array('id' => session('uid')))->find();
        $this->user = $users;
        $this->assign('thisUser', $users);
        $this->assign('viptime', $users['viptime']);
        if (session('uid')) {
            // dump($users);
            if ($users['viptime'] < time()) {
                session(null);
                session_destroy();
                $this->error('您的帐号已经到期，请联系0575-89974522续费！');
            }
        }
        $wecha = M('Wxuser')->field('wxname,weixin,wxid,headerpic')->where(array('token' => session('token'), 'uid' => session('uid')))->find();
        
        //当前微信公众号信息
        $this->assign('wecha', $wecha);
        if ($wecha) {
            $this->assign('wxid', $wecha['wxid']);
        }
        $this->token = session('token');
        $this->assign('token', $this->token);
        $token_open = M('token_open')->field('queryname')->where(array('token' => $this->token))->find();
        $this->userFunctions = explode(',', $token_open['queryname']);
        $this->assign('userinfo', $userinfo);
        
        if (session('uid') == false) {
            if (CONTROLLER_NAME != 'GFile') {
                $this->redirect('Home/Index/login');
            }
        }
        
        if (session('companyLogin') == 1 && !in_array(CONTROLLER_NAME, array('Attachment', 'Repast', 'GFile', 'Hotels'))) {
            $this->redirect(U('User/Repast/index', array('cid' => session('companyid'))));
        }
        
        $token = session('token');
        if (!$token) {
            if (isset($_GET['token'])) {
                $token = I('get.token');
            } else {
                $token = 'admin';
            }
        }
        $options = array();
        $now = time();
        
        $menuhtml = $this->createMenus();
        
        $this->assign('menuhtml', $menuhtml);
    }
    public function canUseFunction($funname) {
        
        // $token_open = M('TokenOpen')->field('queryname')->where(array('token' => $this->token))->find();
        // if (C('agent_version') && $this->agentid) {
        //     $function = M('AgentFunction')->where(array('funname' => $funname, 'agentid' => $this->agentid))->find();
        // } else {
        //     $function = M('Function')->where(array('funname' => $funname))->find();
        // }
        // if (intval($this->user['gid']) < intval($function['gid']) || strpos($token_open['queryname'], $funname) === false) {
        //     $this->error('您还没有开启该模块的使用权,请到功能模块中添加', U('Function/index', array('token' => $this->token)));
        // }
        
    }
    
    //菜单
    public function createMenus() {
        
        // $menus = S('gr_menus');
        // if(empty($menus)){
        $vipid = $this->userGroup['id'];
        
        if (session('companyLogin') == 1) {
            
            $menus = array(array('id' => 'Industry', 'name' => '行业模块', 'display' => 0, 'subs' => array(array('name' => '订餐（无线打印）', 'link' => U('Repast/index', array('token' => getToken(), 'cid' => I('get.cid'))), 'new' => 0, 'selectedCondition' => array('m' => 'Repast')), array('name' => '酒店宾馆', 'link' => U('Hotels/index', array('token' => getToken(), 'cid' => I('get.cid'))), 'new' => 0, 'selectedCondition' => array('m' => 'Hotels')),)));
        } else {
            
            $menus = getMenu($vipid);
        }
        
        //     S('gr_menus',$menus);
        // }
        $menuhtml = $this->createTabsMenu($menus);
        return $menuhtml;
    }
    
    //组织菜单的html
    public function createTabsMenu($menus) {
        $html = '';
        $i = 0;
        
        //获得查询参数
        $parmsArr = array('m' => MODULE_NAME, 'c' => CONTROLLER_NAME, 'a' => ACTION_NAME);
        
        //查询当前激活菜单
        $subMenus = array();
        $t = 0;
        $currentMenuID = 0;
        $currentParentMenuID = 0;
        foreach ($menus as $m) {
            $loopContinue = 1;
            if ($m['subs']) {
                $st = 0;
                foreach ($m['subs'] as $s) {
                    
                    $includeArr = 1;
                    if ($s['selectedCondition']) {
                        foreach ($s['selectedCondition'] as $key => $condition) {
                            if ($key == 'm' || $key == 'c' || $key == 'a') {
                                if ($condition != $parmsArr[$key]) {
                                    $includeArr = 0;
                                    break;
                                }
                            } elseif ($condition != I($key)) {
                                $includeArr = 0;
                                break;
                            }
                        }
                    }
                    
                    //
                    if ($includeArr) {
                        $currentMenuID = $st;
                        $currentParentMenuID = $t;
                        $loopContinue = 0;
                        break;
                    }
                    $st++;
                }
                
                //
                if ($loopContinue == 0) {
                    break;
                }
            }
            $t++;
        }
        
        //
        /*
        echo $currentMenuID;
        echo $currentParentMenuID;
        */
        $tabs = '<ul class=" nav nav-tabs">';
        
        $tabContents = '<div class="tab-content">';
        
        //
        foreach ($menus as $m) {
            
            //
            $displayStr = '';
            if ($currentParentMenuID == $i) {
                $displayStr = ' active ';
            }
            $iClass = '';
            if (isset($m['class'])) {
                $iClass = '<i class="' . $m['class'] . '"></i>';
            }
            $tabs.= '<li class="' . $displayStr . '"><a href="#' . $m['id'] . '" id="' . $m['id'] . '-tab" data-toggle="tab" >' . $iClass . $m['name'] . '</a></li>';
            
            if ($m['subs']) {
                
                $j = 0;
                $tabContents.= '<div class="tab-pane ' . $displayStr . '" id="' . $m['id'] . '"><ul class="list-group">';
                
                foreach ($m['subs'] as $s) {
                    
                    $selectedClassStr = '';
                    if ($currentParentMenuID == $i && $j == $currentMenuID) {
                        $selectedClassStr = 'active';
                    }
                    
                    $target = '';
                    if (isset($s['target'])) {
                        $target = $s['target'];
                    }

                    $tabContents.= '<li class="list-group-item ' . $selectedClassStr . '"> <a href="' . $s['link'] . '" target="'.$target.'" >' . $s['name'] . '</a>' . '</li>';
                    
                    $j++;
                }
                $tabContents.= '</ul></div>';
            }
            
            $i++;
        }
        $tabs.= '</ul>';
        $tabContents.= '</div>';
        return $tabs . $tabContents;
    }
    
    //组织菜单的html
    public function createHTMLMenu($menus) {
        $html = '';
        $i = 0;
        
        //获得查询参数
        $parmsArr = array('m' => MODULE_NAME, 'c' => CONTROLLER_NAME, 'a' => ACTION_NAME);
        
        //查询当前激活菜单
        $subMenus = array();
        $t = 0;
        $currentMenuID = 0;
        $currentParentMenuID = 0;
        foreach ($menus as $m) {
            $loopContinue = 1;
            if ($m['subs']) {
                $st = 0;
                foreach ($m['subs'] as $s) {
                    
                    $includeArr = 1;
                    if ($s['selectedCondition']) {
                        foreach ($s['selectedCondition'] as $key => $condition) {
                            if ($key == 'm' || $key == 'c' || $key == 'a') {
                                if ($condition != $parmsArr[$key]) {
                                    $includeArr = 0;
                                    break;
                                }
                            } elseif ($condition != I($key)) {
                                $includeArr = 0;
                                break;
                            }
                        }
                    }
                    
                    //
                    if ($includeArr) {
                        $currentMenuID = $st;
                        $currentParentMenuID = $t;
                        $loopContinue = 0;
                        break;
                    }
                    $st++;
                }
                
                //
                if ($loopContinue == 0) {
                    break;
                }
            }
            $t++;
        }
        
        //
        /*
        echo $currentMenuID;
        echo $currentParentMenuID;
        */
        
        //
        foreach ($menus as $m) {
            
            //
            $displayStr = '';
            if ($currentParentMenuID != 0 || 0 != $currentMenuID) {
                $m['display'] = 0;
            }
            if (!$m['display']) {
                $displayStr = ' style="display:none"';
            }
            if ($currentParentMenuID == $i) {
                $displayStr = '';
            }
            $aClassStr = '';
            if ($displayStr) {
                $aClassStr = ' nav-header-current';
            }
            $html.= '<a class="nav-header' . $aClassStr . '">' . $m['name'] . '</a><ul class="ckit"' . $displayStr . '>';
            if ($m['subs']) {
                $j = 0;
                foreach ($m['subs'] as $s) {
                    $selectedClassStr = 'subCatalogList';
                    if ($currentParentMenuID == $i && $j == $currentMenuID) {
                        $selectedClassStr = 'selected';
                    }
                    $newStr = '';
                    if ($s['test']) {
                        
                        //测试中的功能
                        $newStr.= '<span class="test"></span>';
                    } else {
                        if ($s['new']) {
                            
                            //新开发功能
                            $newStr.= '<span class="new"></span>';
                        }
                    }
                    
                    $html.= '<li class="' . $selectedClassStr . '"> <a href="' . $s['link'] . '">' . $s['name'] . '</a>' . $newStr . '</li>';
                    
                    $j++;
                }
            }
            $html.= '</ul>';
            $i++;
        }
        
        return $html;
    }
}
