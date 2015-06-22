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
class AdvanceTplController extends UserController{
    public function _initialize() {
        parent::_initialize();
        //
        $this->canUseFunction('advanceTpl');
        header('Location:/cms/manage/index.php');
    }
}

