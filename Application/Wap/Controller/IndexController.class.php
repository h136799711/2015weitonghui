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
use Think\Controller;
function strExists($haystack, $needle) {
    return !(strpos($haystack, $needle) === FALSE);
}
class IndexController extends WapController
{
    private $tpl;
     //微信公共帐号信息
    private $info;
     //分类信息
    public $wecha_id;
    public $copyright;
    public $company;
    public $token;
    public $weixinUser;
    public $homeInfo;
    public function _initialize() {
        parent::_initialize();
        $where['token'] = $this->token;
        $tpl = $this->wxuser;
        $this->weixinUser = $tpl;
        if (isset($_GET['wecha_id']) && $_GET['wecha_id']) {
            $_SESSION['wecha_id'] = $_GET['wecha_id'];
        }
        
        //父类信息
        $allClasses = M('Classify')->where(array('token' => I('token'), 'status' => 1))->order('sorts desc')->select();
                
        $allClasses = $this->convertLinks($allClasses);
         //加外链等信息
        
        $info = array();
        if ($allClasses) {
            $classByID = array();
            $firstGradeCatCount = 0;
            foreach ($allClasses as $c) {
                $classByID[$c['id']] = $c;
                if ($c['fid'] == 0) {
                    $c['sub'] = array();
                    $info[$c['id']] = $c;
                    $firstGradeCatCount++;
                }
            }
            
            usort($allClasses, 'sortBySorts');
            foreach ($allClasses as $c) {
                if ($c['fid'] > 0 && $info[$c['fid']]) {
                    array_push($info[$c['fid']]['sub'], $c);
                }
            }
            
            //
            if ($info) {
                foreach ($info as $c) {
                    $info[$c['id']]['key'] = $firstGradeCatCount--;
                }
            }
        }
        $homeInfo = $this->homeInfo;
        $this->info = $info;
        $tpl['color_id'] = intval($tpl['color_id']);
        $this->tpl = $tpl;
    }
    private function sortBySorts($a, $b) {
        if ($a['sorts'] == $b['sorts']) {
            return 0;
        } else {
            return $a['sorts'] > $b['sorts'] ? 1 : -1;
        }
    }

    public function classify() {
        $this->assign('info', $this->info);
        $this->display($this->tpl['tpltypename']);
    }
    
    //预览
    public function preview() {
        
        //是否是高级模板
        if ($this->homeInfo['advancetpl']) {
            echo '<script>window.location.href="/cms/index.php?token=' . $this->token . '&wecha_id=' . $this->wecha_id . '";</script>';
            exit();
        }
        
        //token
        $where['token'] = $this->token;
        
        //
        $allflash = M('Flash')->where($where)->select();
        $allflash = $this->convertLinks($allflash);
        
        //
        $flash = array();
        $flashbg = array();
        foreach ($allflash as $af) {
            if ($af['url'] == '') {
                $af['url'] = 'javascript:void(0)';
            }
            if ($af['tip'] == 1) {
                array_push($flash, $af);
            } elseif ($af['tip'] == 2) {
                array_push($flashbg, $af);
            }
        }
        //幻灯片
        $this->assign('flashbg', $flashbg);
        if (!$flashbg && $this->homeInfo['homeurl']) {
            $flash_db = M('Flash');
            $arr = array();
            $arr['token'] = $this->token;
            $arr['img'] = $this->homeInfo['homeurl'];
            $arr['url'] = '';
            $arr['info'] = '';
            $arr['tip'] = 2;
            if ($arr['img']) {
                $flash_db->add($arr);
            }
        }
        $info = $this->info;
        
        //$info = $this->convertLinks($info);
        $tpldata = $this->wxuser;
        $tpldata['tpltypeid'] = I('get.tpl',0,'intval');
        $tpldata['color_id'] = intval(0);
        
        //获取模板信息
        include ('./ThinkPHP/Library/Org/index.Tpl.php');
        
        foreach ($tpl as $k => $v) {
            if ($v['tpltypeid'] == $tpldata['tpltypeid']) {
                $tplinfo = $v;
            }
        }
        
        $tpldata['tpltypeid'] = $tplinfo['tpltypeid'];
        $tpldata['tpltypename'] = $tplinfo['tpltypename'];
        
        foreach ($info as $k => $v) {            
            if ($info[$k]['url'] == '') {
                $info[$k]['url'] = U('Index/lists', array('classid' => $v['id'], 'token' => $where['token'], 'wecha_id' => $this->wecha_id));
            }
        }
        
        if ($tpldata['tpltypename'] == 'ktv_list' || $tpldata['tpltypename'] == 'yl_list') {
            
            //控制模板中的不同字段
            foreach ($info as $key => $val) {
                $info[$key]['title'] = $val['name'];
                $info[$key]['pic'] = $val['img'];
                if ($info[$key]['url'] == '') {
                    $info[$key]['url'] = U('Index/lists', array('classid' => $val['id'], 'token' => $where['token'], 'wecha_id' => $this->wecha_id));
                }
                
                $info[$key]['info'] = strip_tags(htmlspecialchars_decode($val['info']));
            }
        }
        
        $count = count($flash);
        $this->assign('flash', $flash);
        $this->assign('homeInfo', $this->homeInfo);
        $this->assign('info', $info);
        $this->assign('num', $count);
        $this->assign('flashbgcount', count($flashbg));
        $this->assign('tpl', $tplinfo);
        $this->assign('copyright', $this->copyright);
        $this->display($tpldata['tpltypename']);
    }

    //首页
    public function index() {
        
        //是否是高级模板
        if ($this->homeInfo['advancetpl']) {
            echo '<script>window.location.href="/cms/index.php?token=' . $this->token . '&wecha_id=' . $this->wecha_id . '";</script>';
            exit();
        }

        //
        $where['token'] = $this->token;
        
        //
        $allflash = M('Flash')->where($where)->select();
        $allflash = $this->convertLinks($allflash);
        
        //
        $flash = array();
        $flashbg = array();
        foreach ($allflash as $af) {
            if ($af['url'] == '') {
                $af['url'] = 'javascript:void(0)';
            }
            if ($af['tip'] == 1) {
                array_push($flash, $af);
            } elseif ($af['tip'] == 2) {
                array_push($flashbg, $af);
            }
        }
        $this->assign('flashbg', $flashbg);
        if (!$flashbg && $this->homeInfo['homeurl']) {
            $flash_db = M('Flash');
            $arr = array();
            $arr['token'] = $this->token;
            $arr['img'] = $this->homeInfo['homeurl'];
            $arr['url'] = '';
            $arr['info'] = '';
            $arr['tip'] = 2;
            if ($arr['img']) {
                $flash_db->add($arr);
            }
        }
        $info = $this->info;
        
        //$info = $this->convertLinks($info);
        $tpldata = $this->wxuser;
        $tpldata['color_id'] = intval($tpldata['color_id']);
        
        //获取模板信息
        include ('./ThinkPHP/Library/Org/index.Tpl.php');
        
        foreach ($tpl as $k => $v) {
            if ($v['tpltypeid'] == $tpldata['tpltypeid']) {
                $tplinfo = $v;
            }
        }
        
        $tpldata['tpltypeid'] = $tplinfo['tpltypeid'];
        $tpldata['tpltypename'] = $tplinfo['tpltypename'];
        
        foreach ($info as $k => $v) {
            
            if ($info[$k]['url'] == '') {
                $info[$k]['url'] = U('Index/lists', array('classid' => $v['id'], 'token' => $where['token'], 'wecha_id' => $this->wecha_id));
            }
        }
        
        if ($tpldata['tpltypename'] == 'ktv_list' || $tpldata['tpltypename'] == 'yl_list') {
            
            //控制模板中的不同字段
            foreach ($info as $key => $val) {
                $info[$key]['title'] = $val['name'];
                $info[$key]['pic'] = $val['img'];
                if ($info[$key]['url'] == '') {
                    $info[$key]['url'] = U('Index/lists', array('classid' => $val['id'], 'token' => $where['token'], 'wecha_id' => $this->wecha_id));
                }
                
                $info[$key]['info'] = strip_tags(htmlspecialchars_decode($val['info']));
            }
        }
        
        $count = count($flash);
        $this->assign('flash', $flash);
        $this->assign('homeInfo', $this->homeInfo);
        $this->assign('info', $info);
        $this->assign('num', $count);
        $this->assign('flashbgcount', count($flashbg));
        $this->assign('tpl', $this->tpl);
        $this->assign('copyright', $this->copyright);
        $this->display($this->tpl['tpltypename']);
    }
    
    public function lists() {
        
        $token = $this->token;
        $classid = I('classid', 0, 'intval');
        $where['token'] = I('token', '', 'trim');
        $classify = M('classify');

        //本分类信息
        $info = $classify->where("id = $classid AND token = '$token'")->find();
        
        //是否有子类
        $sub = $classify->where("fid = $classid AND token = '$token'")->order("sorts desc")->select();
        $sub = $this->convertLinks($sub);
        $tpldata = D('Wxuser')->where($where)->find();
        $tpldata['color_id'] = intval($tpldata['color_id']);
        
        //获取模板信息
        include ('./ThinkPHP/Library/Org/index.Tpl.php');
        foreach ($tpl as $k => $v) {
            if ($v['tpltypeid'] == $info['tpid']) {
                $tplinfo = $v;
            }
        }
        
        $tpldata['tpltypeid'] = $tplinfo['tpltypeid'];
        $tpldata['tpltypename'] = $tplinfo['tpltypename'];
        if (empty($tpldata['tpltypename'])) {
            $tpldata['tpltypename'] = 'ktv_list';
        }
        
        $imgdata = M('Img')->field('id')->where("classid = $classid")->find();
        
        if (!empty($sub) AND empty($imgdata)) {
            
            //有子类
            
            //幻灯片
            $allflash = M('Flash')->where($where)->select();
            $allflash = $this->convertLinks($allflash);
            
            $flash = array();
            $flashbg = array();
            foreach ($allflash as $af) {
                if ($af['tip'] == 1) {
                    array_push($flash, $af);
                } elseif ($af['tip'] == 2) {
                    array_push($flashbg, $af);
                }
            }
            $this->assign('flashbg', $flashbg);
            if (!$flashbg && $this->homeInfo['homeurl']) {
                $flash_db = M('Flash');
                $arr = array();
                $arr['token'] = $this->token;
                $arr['img'] = $this->homeInfo['homeurl'];
                $arr['url'] = '';
                $arr['info'] = '';
                $arr['tip'] = 2;
                if ($arr['img']) {
                    $flash_db->add($arr);
                }
            }
            
            if ($tpldata['tpltypename'] == 'ktv_list' || $tpldata['tpltypename'] == 'yl_list') {
                
                //控制模板中的不同字段
                foreach ($sub as $key => $val) {
                    $sub[$key]['title'] = $val['name'];
                    $sub[$key]['pic'] = $val['img'];
                    if ($sub[$key]['url'] == '') {
                        $sub[$key]['url'] = U('Index/lists', array('classid' => $val['id'], 'token' => $where['token'], 'wecha_id' => $this->wecha_id));
                    }
                    $sub[$key]['info'] = strip_tags(htmlspecialchars_decode($val['info']));
                }
            }
            foreach ($sub as $ke => $va) {
                $subpid = $va['id'];
                $sub[$ke]['sub'] = M('Classify')->where("fid = $subpid")->select();
                if ($sub[$ke]['url'] == '') {
                    $sub[$ke]['url'] = U('Index/lists', array('classid' => $va['id'], 'token' => $where['token'], 'wecha_id' => $this->wecha_id));
                }
            }
            
            $count = count($flash);
            $this->assign('flash', $flash);
            $this->assign('num', $count);
            $this->assign('flashbgcount', count($flashbg));
            $this->assign('info', $sub);
            $this->assign('tpl', $tpldata);
            $this->assign('copyright', $this->copyright);
            $this->display($tpldata['tpltypename']);
        } else {
            
            //无子类 在模板中显示内容列表
            $where['token'] = $this->token;
            $where['classid'] = I('classid', 0, 'intval');
            $db = D('Img');
            
            //多数模板没有分页，这里取消分页功能
            $res = $db->where($where)->order('usort DESC')->select();
            $res = $this->convertLinks($res);
            
            //控制模板中的不同字段
            foreach ($res as $key => $val) {
                $res[$key]['name'] = $val['title'];
                $res[$key]['img'] = $val['pic'];
                if ($res[$key]['url'] == '') {
                    $res[$key]['url'] = U('Index/content', array('id' => $val['id'], 'classid' => $val['classid'], 'token' => $where['token'], 'wecha_id' => $this->wecha_id));
                }
                $res[$key]['info'] = strip_tags(htmlspecialchars_decode($val['info']));
            }
            
            //当列表页只有一篇内容的时候，直接显示内容
            $listNum = count($res);
            
            if ($listNum == 1) {
                $contid = $res[0]['id'];
                $cid = $res[0]['classid'];
                $this->content($contid, $cid);
                exit;
            }
            
            //幻灯片
            $allflash = M('Flash')->where(array('token'=>$where['token']))->select();
            $allflash = $this->convertLinks($allflash);
            
            $flash = array();
            $flashbg = array();
            foreach ($allflash as $af) {
                if ($af['tip'] == 1) {
                    array_push($flash, $af);
                } elseif ($af['tip'] == 2) {
                    array_push($flashbg, $af);
                }
            }
            $this->assign('flashbg', $flashbg);
            if (!$flashbg && $this->homeInfo['homeurl']) {
                $flash_db = M('Flash');
                $arr = array();
                $arr['token'] = $this->token;
                $arr['img'] = $this->homeInfo['homeurl'];
                $arr['url'] = '';
                $arr['info'] = '';
                $arr['tip'] = 2;
                if ($arr['img']) {
                    $flash_db->add($arr);
                }
            }
            
            $count = count($flash);
            $this->assign('flash', $flash);
            $this->assign('num', $count);
            $this->assign('flashbgcount', count($flashbg));
            
            $this->assign('info', $res);
            $this->assign('tpl', $tpldata);
            $this->assign('copyright', $this->copyright);
            
            //
            if ($listNum == 1) {
                $this->content($res[0]['id']);
                exit();
            }
            
            $this->display($tpldata['tpltypename']);
        }
    }
    
    public function content($contid = '', $cid = '') {
        $token = $this->token;
        $class = M('Classify');
        $img = M('Img');
        
        //从模板直接浏览，或在列表方法中调用
        if ($contid == '' AND $cid == '') {
            $id = I('id', 0, 'intval');
            $classid = I('classid', 0, 'intval');
        } else {
            
            $id = $contid;
            $classid = $cid;
        }
        $res = $img->where("id = " . intval($id) . " AND token = '$token'")->find();
        
        if ($classid == '') {
            $classid = $res['classid'];
        }
        
        //增加浏览量
        $img->where("token = '$token' AND id = " . intval($id) . "")->setInc('click');
        
        $classinfo = $class->where("id = $classid AND token = '$token'")->field('conttpid')->find();
        $tplinfo = D('Wxuser')->where("token = '$token'")->find();
        
        //获取模板
        include ('./ThinkPHP/Library/Org/cont.Tpl.php');
        foreach ($contTpl as $k => $v) {
            if ($v['tpltypeid'] == $classinfo['conttpid']) {
                $tpldata = $v;
            }
        }
        
        $tplinfo['tpltypeid'] = $tpldata['tpltypeid'];
        $tplinfo['tpltypename'] = $tpldata['tpltypename'];
        
        $lists = $img->where("classid = $classid AND token = '$token' AND id != $id")->limit(5)->order('uptatetime')->select();
        
        $this->assign('info', $this->info);
         //分类信息
        $this->assign('copyright', $this->copyright);
         //版权是否显示
        $this->assign('res', $res);
        $this->assign('lists', $lists);
        $this->assign('tpl', $tplinfo);
        $this->display($tplinfo['tpltypename']);
    }
    
    public function flash() {
        $where['token'] = I('token', 'trim');
        $flash = M('Flash')->where($where)->select();
        $count = count($flash);
        $flash = $this->convertLinks($flash);
        $this->assign('flash', $flash);
        $this->assign('info', $this->info);
        $this->assign('num', $count);
        $this->display('ty_index');
    }
    
    /**
     * 获取链接
     *
     * @param unknown_type $url
     * @return unknown
     */
    public function getLink($url) {
        $url = $url ? $url : 'javascript:void(0)';
        $urlArr = explode(' ', $url);
        $urlInfoCount = count($urlArr);
        if ($urlInfoCount > 1) {
            $itemid = intval($urlArr[1]);
        }
        
        //会员卡 刮刮卡 团购 商城 大转盘 优惠券 订餐 商家订单 表单
        if (strExists($url, '刮刮卡')) {
            
            $link = U('Wap/Guajiang/index', array('wecha_id' => $this->wecha_id, 'token' => $this->token));
            if ($itemid) {
                $link.= '?id=' . $itemid;
            }
        } elseif (strExists($url, '大转盘')) {
            
            $link = U('Wap/Lottery/index', array('wecha_id' => $this->wecha_id, 'token' => $this->token));
            if ($itemid) {
                $link.= '?id=' . $itemid;
            }
        } elseif (strExists($url, '优惠券')) {
            
            $link = U('Wap/Coupon/index', array('wecha_id' => $this->wecha_id, 'token' => $this->token));
            if ($itemid) {
                $link.= '?id=' . $itemid;
            }
        } elseif (strExists($url, '商家订单')) {
            if ($itemid) {
                $link = U('Wap/Host/index', array('hid' => $itemid, 'wecha_id' => $this->wecha_id, 'token' => $this->token));
            } else {
                $link = U('Wap/Host/Detail', array('wecha_id' => $this->wecha_id, 'token' => $this->token));
            }
        } elseif (strExists($url, '万能表单')) {
            if ($itemid) {
                $link = U('Wap/Selfform/index', array('id' => $itemid, 'wecha_id' => $this->wecha_id, 'token' => $this->token));
            }
        } elseif (strExists($url, '相册')) {
            
            $link = U('Wap/Photo/index', array('wecha_id' => $this->wecha_id, 'token' => $this->token));
            if ($itemid) {
                $link = U('Wap/Photo/plist', array('id' => $itemid, 'wecha_id' => $this->wecha_id, 'token' => $this->token));
            }
        } elseif (strExists($url, '全景')) {
            
            $link = U('Wap/Panorama/index', array('wecha_id' => $this->wecha_id, 'token' => $this->token));
            
            if ($itemid) {
                
                $link = U('Wap/Panorama/item', array('id' => $itemid, 'wecha_id' => $this->wecha_id, 'token' => $this->token));
            }
        } elseif (strExists($url, '会员卡')) {
            
            $link = U('Wap/Card/index', array('wecha_id' => $this->wecha_id, 'token' => $this->token));
        } elseif (strExists($url, '商城')) {
            
            $link = U('Wap/Product/index', array('wecha_id' => $this->wecha_id, 'token' => $this->token));
        } elseif (strExists($url, '订餐')) {
            
            $link = U('Wap/Product/dining', array("dining" => 1, 'wecha_id' => $this->wecha_id, 'token' => $this->token));
        } elseif (strExists($url, '团购')) {
            
            $link = U('Wap/Groupon/grouponIndex', array('wecha_id' => $this->wecha_id, 'token' => $this->token));
        } elseif (strExists($url, '首页')) {
            
            $link = U('Wap/Index/index', array('wecha_id' => $this->wecha_id, 'token' => $this->token));
        } elseif (strExists($url, '网站分类')) {
            $link = U('Wap/Index/lists', array('wecha_id' => $this->wecha_id, 'token' => $this->token));
            if ($itemid) {
                $link = U('Wap/Index/lists', array('classid' => $itemid, 'wecha_id' => $this->wecha_id, 'token' => $this->token));
            }
        } elseif (strExists($url, '图文回复')) {
            if ($itemid) {
                
                $link = U('Wap/Index/index', array('id' => $itemid, 'wecha_id' => $this->wecha_id, 'token' => $this->token));
            }
        } elseif (strExists($url, 'LBS信息')) {
            
            $link = U('Wap/Company/map', array('id' => $itemid, 'wecha_id' => $this->wecha_id, 'token' => $this->token));
            
            if ($itemid) {
                $link = U('Wap/Company/map', array('companyid' => $itemid, 'wecha_id' => $this->wecha_id, 'token' => $this->token));
            }
        } elseif (strExists($url, 'DIY宣传页')) {
            $link = '/index.php/show/' . $this->token;
        } elseif (strExists($url, '婚庆喜帖')) {
            if ($itemid) {
                $link = U('Wap/Wedding/index', array('id' => $itemid, 'wecha_id' => $this->wecha_id, 'token' => $this->token));
            }
        } elseif (strExists($url, '投票')) {
            if ($itemid) {
                $link = U('Wap/Vote/index', array('id' => $itemid, 'wecha_id' => $this->wecha_id, 'token' => $this->token));
            }
        } else {
            $link = str_replace(array('{wechat_id}', '{siteUrl}', '&amp;'), array($this->wecha_id, C('site_url'), '&'), $url);
            if (!!(strpos($url, 'tel') === false) && $url != 'javascript:void(0)' && !strpos($url, 'wecha_id=')) {
                if (strpos($url, '?')) {
                    $link = $link . '&wecha_id=' . $this->wecha_id;
                } else {
                    $link = $link . '?wecha_id=' . $this->wecha_id;
                }
            }
        }
        return $link;
    }
    public function convertLinks($arr) {
        $i = 0;
        foreach ($arr as $a) {
            if ($a['url']) {
                $arr[$i]['url'] = $this->getLink($a['url']);
            }
            $i++;
        }
        return $arr;
    }
    public function _getPlugMenu() {
        $company_db = M('company');
        $this->company = $company_db->where(array('token' => $this->token, 'isbranch' => 0))->find();
        $plugmenu_db = M('site_plugmenu');
        $plugmenus = $plugmenu_db->where(array('token' => $this->token, 'display' => 1))->order('taxis ASC')->limit('0,4')->select();
        if ($plugmenus) {
            $i = 0;
            foreach ($plugmenus as $pm) {
                switch ($pm['name']) {
                    case 'tel':
                        if (!$pm['url']) {
                            $pm['url'] = 'tel:/' . $this->company['tel'];
                        } else {
                            $pm['url'] = 'tel:/' . $pm['url'];
                        }
                        break;

                    case 'memberinfo':
                        if (!$pm['url']) {
                            $pm['url'] = U('Wap/Userinfo/index', array('token' => $this->token, 'wecha_id' => $this->wecha_id));
                        }
                        break;

                    case 'nav':
                        if (!$pm['url']) {
                            $pm['url'] = U('Wap/Company/map', array('token' => $this->token, 'wecha_id' => $this->wecha_id));
                        }
                        break;

                    case 'message':
                        break;

                    case 'share':
                        break;

                    case 'home':
                        if (!$pm['url']) {
                            
                            $pm['url'] = U('Wap/Index/index', array('token' => $this->token, 'wecha_id' => $this->wecha_id));
                        }
                        break;

                    case 'album':
                        if (!$pm['url']) {
                            
                            $pm['url'] = U('Wap/Photo/index', array('token' => $this->token, 'wecha_id' => $this->wecha_id));
                        }
                        break;

                    case 'email':
                        $pm['url'] = 'mailto:' . $pm['url'];
                        break;

                    case 'shopping':
                        if (!$pm['url']) {
                            $pm['url'] = U('Wap/Product/index', array('token' => $this->token, 'wecha_id' => $this->wecha_id));
                        }
                        break;

                    case 'membercard':
                        $card = M('member_card_create')->where(array('token' => $this->token, 'wecha_id' => $this->wecha_id))->find();
                        if (!$pm['url']) {
                            if ($card == false) {
                                $pm['url'] = rtrim(C('site_url'), '/') . U('Wap/Card/index', array('token' => $this->token, 'wecha_id' => $this->wecha_id));
                            } else {
                                $pm['url'] = rtrim(C('site_url'), '/') . U('Wap/Card/index', array('token' => $this->token, 'wecha_id' => $this->wecha_id));
                            }
                        }
                        break;

                    case 'activity':
                        $pm['url'] = $this->getLink($pm['url']);
                        break;

                    case 'weibo':
                        break;

                    case 'tencentweibo':
                        break;

                    case 'qqzone':
                        break;

                    case 'wechat':
                        $pm['url'] = 'weixin://addfriend/' . $this->weixinUser['wxid'];
                        break;

                    case 'music':
                        break;

                    case 'video':
                        break;

                    case 'recommend':
                        $pm['url'] = $this->getLink($pm['url']);
                        break;

                    case 'other':
                        $pm['url'] = $this->getLink($pm['url']);
                        break;
                }
                $plugmenus[$i] = $pm;
                $i++;
            }
        } else {
             //默认的
            $plugmenus = array();
        }
        return $plugmenus;
    }
}

