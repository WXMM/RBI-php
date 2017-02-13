<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index()
    {
        $mess=I('get.mess','');
        $this->assign(mess,$mess);
        $this->display();
    }

    //比对密码和用户名
//    public  function check_user(){
//        if (IS_POST) {
//            // 实例化Login对象
//            $user = M('tb_user');
//            // 自动验证 创建数据集
//            if (!$data = $user->create()) {
//                // 防止输出中文乱码
//                header("Content-type: text/html; charset=utf-8");
//                exit($user->getError());
//            }
//            // 组合查询条件
//            $where = array();
//            $_SESSION['username']=$data['username'];
//            $where['username'] = $data['username'];
//            $result = $user->where($where)->field('username,password')->find();
//            // 验证用户名 对比 密码
//            if ($result['password'] == $_POST['password']) {
//                if($data['username']='admin'){
//                    $this->ajaxReturn("2","JSON");
//                }else{
//                    $this->ajaxReturn("1","JSON");
//                }
//            } else {
//                $this->ajaxReturn("0","JSON");
//            }
//        } else {
//            $this->ajaxReturn("0","JSON");
//        }
//    }
//    public function index(){
//        //...
//    }

    //用户登录处理表单
    public function check_user(){
        if(!IS_POST) halt('页面不存在，请稍后再试');
        if(session('verify') != I('param.verify','','md5')) {
            $this->error('验证码错误', U('Admin/Login/index'));
        }

        $user = I('username','','string');
        $passwd = I('password','','md5');

        $db = D('tb_user');
        $userinfo = $db->where("username = '$user' AND password = '$passwd'")->find();

        if(!$userinfo) $this->error('用户名或密码错误', U('Home/Index/index'));

        if(!$userinfo['status']) $this->error('该用户被锁定，暂时不可登录', U('Home/Index/index'));

        //更新登录信息
        $db->save(array("id"=> $userinfo["id"], "logintime"=> time(), "loginip" => get_client_ip()));

        //写入session值
        session(C("USER_AUTH_KEY"), $userinfo["id"]);
        session("username", $userinfo["username"]);
        session("logintime", $userinfo["logintime"]);
        session("loginip",$user["loginip"]);

        //如果为超级管理员，则无需验证
        if($userinfo['username'] == C('RBAC_SUPERADMIN')) {
            session(C('ADMIN_AUTH_KEY'), true);
        }

        //载入RBAC类
        import('ORG.Util.RBAC');
        //读取用户权限
        RBAC::saveAccessList();

        $this->success('登录成功', U('Home/Manage/index'));
    }

    //登出登录
    public function logOut(){
        //...
    }

    //验证码
    public function verify(){
        //...
    }
}
