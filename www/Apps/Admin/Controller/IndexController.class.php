<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/20
 * Time: 10:49
 */
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->display();
    }
    public function checkUser()
    {

        if (IS_POST) {
            // 实例化Login对象
            $user = M('tb_user');
            // 组合查询条件
            $where = array();
            $username             = I("post.username","");
            $_SESSION['username'] = $username;
            $where['username']    = $username;
            $res = $user->where($where)->field('id,username,password,workshopId,realname,login_ip,is_login,deviceMAC')->find();
            //当前设备物理地址
            $MacAddr=A("GetMacAddr");
            $macAddr=$MacAddr->GetMacAddr();
            $ipWhere['deviceMAC']   =  $macAddr;
            $ipWhere['is_login']    =  1;
            $IpCount=M("tb_user")->where($ipWhere)->getField('username');
            //同一ip只能登陆一个用户
            if($res['is_login']==1){
                $this->ajaxReturn(array(
                    'statusCode' => 0,
                    'msg' => '您已登陆，请先注销再进行登陆'
                ));
            }else{
               
                    //如果是管理员用户，则跳转至后台管理系统
                    $Admin=M("tb_user_admin")->where($where)->field('id,username,password,workshopId,realname,login_ip,is_login,deviceMAC')->find();
                    if($Admin){
                        if ($Admin['password'] == $_POST['password']) {
                            $id = $res['id'];
                            $saveWhere['deviceMAC']  =  $macAddr;
                            $saveWhere['login_time'] = date("Y-m-d  h:i:s", time());
                            $saveWhere['login_ip']   = $_SERVER["REMOTE_ADDR"];
                            $saveWhere['is_login']   = 1;
                            M("tb_user_admin")->where("id=$id")->save($saveWhere);
                            $this->ajaxReturn(array(
                                'statusCode' => 2,
                                'msg' => '欢迎你，超级管理员'
                            ));
                            $this->redirect("Admin/Rbac/index");
                        }else{
                            $this->ajaxReturn(array(
                                'statusCode' => 0,
                                'msg' => '密码错误'
                            ));
                        }
                    }else{
                        // 验证用户名 对比 密码
                        if ($res['password'] == $_POST['password']) {
                            $_SESSION['uid'] = $res['id'];
                            $role = \Org\Util\Rbac::getUserRole($res['id']);
                            $_SESSION['userRole'] = $role['name'];
                            $_SESSION['roleLevel'] = $role['level'];
                            $_SESSION['workshopId'] = $res['workshopId'];
                            $_SESSION['realname'] = $res['realname'];

                            $id = $res['id'];
                            $saveWhere['deviceMAC']  =  $macAddr;
                            $saveWhere['login_time'] = date("Y-m-d  h:i:s", time());
                            $saveWhere['login_ip']   = $_SERVER["REMOTE_ADDR"];
                            $saveWhere['is_login']   = 1;
                            $_SESSION['is_login']    = 1;
                            $user->where("id=$id")->save($saveWhere);

                            $this->ajaxReturn(array(
                                'statusCode' => 1,
                                'msg' => '欢迎登陆'
                            ));
                            $this->redirect("Home/Manage/index");


                        } else {
                            $this->ajaxReturn(array(
                                'statusCode' => 0,
                                'msg' => '密码错误'
                            ));
                        }
                    }
                
            }
        } else {
            $this->ajaxReturn(array(
                'statusCode' => 0,
                'msg' => '登陆出错'
            ));
        }
    }
    public function loginOut()
    {
        $id=I("post.id","");
        if($id==''){
            $where['username'] = I("post.user","");
            $where['password']  = I("post.psw","");
            $id=M('tb_user')->where($where)->getField('id');
        }
        if(M('tb_user')->where("id=$id")->setField(
            array(
                'is_login'=> 0,'deviceMAC'=> 0)
            )){
            $_SESSION['is_login']    = 0;
            $this->ajaxReturn(array(
                'statusCode' => 0,
                'msg' => '注销成功,请重新登陆'
            ));
        }else{
            $this->ajaxReturn(array(
                'statusCode' => 0,
                'msg' => '您已注销，请重新登陆'
            ));
        };
    }

    function get_client_ip($type = 0)
    {
        $type = $type ? 1 : 0;
        static $ip = NULL;
        if ($ip !== NULL) return $ip[$type];
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos = array_search('unknown', $arr);
            if (false !== $pos) unset($arr[$pos]);
            $ip = trim($arr[0]);
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = ip2long($ip);
        $ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }

}

