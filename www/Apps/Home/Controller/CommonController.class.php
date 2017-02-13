<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/19
 * Time: 13:41
 */
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller
{
    Public function _initialize(){
        if (!isset($_SESSION['username'])){
            $this->error("您没有登录，请先进行登陆");
        }
        if ($_SESSION['is_login']==0){
            $this->error("您不在线上，请先进行登陆");
        }
//        $access = \Org\Util\Rbac::AccessDecision();
//        if(!$access){
//            $this->error('你没有权限');
//        }
        \Org\Util\Rbac::checkLogin();
        $access = \Org\Util\Rbac::getControllerAccess($_SESSION[C('USER_AUTH_KEY')]);
        $Access=$access[strtoupper(MODULE_NAME)][strtoupper(CONTROLLER_NAME)];
        $this->assign("Access",$Access);
    }
}