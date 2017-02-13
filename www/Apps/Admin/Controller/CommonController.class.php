<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
    Public function _initialize(){
        if (!isset($_SESSION['username'])){
            $this->error('请重新登录', U('Admin/Login/signin'));
        }
        $access = \Org\Util\Rbac::AccessDecision();
        echo $access;
//        if(!$access){
//            $this->error('你没有权限');
//        }
    }
}