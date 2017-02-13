<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/20
 * Time: 11:46
 */
namespace Admin\Controller;
class RbacController extends CommonController
{
    public function index(){
        $this->display();
    }
    public function admin(){
        $adminList=D('tb_user_admin');
        $adminList=$adminList->select();
        $this->assign('adminList',$adminList);

        //所属厂区
        $workshop=D("dic_workshop");
        $Workshop=$workshop->select();
        $this->assign('Workshop',$Workshop);
        $this->display();
    }
    //用户分类列表
    public function userList(){
        $userList=D('User');
        $userList=$userList->Relation("Role")->select();
        $this->assign('userList',$userList);

        //角色分类
        $roleList=D('tb_role');
        $roleList=$roleList->select();
        $this->assign('roleList',$roleList);

        //所属厂区
        $workshop=D("dic_workshop");
        $Workshop=$workshop->select();
        $this->assign('Workshop',$Workshop);
        $this->display();
    }
    //权限节点分类列表
    public function nodeList(){
        $nodeList=D('tb_node');
        $where["level"]=1;
        $NodeList=$nodeList->where($where)->select();
        $this->assign('NodeList',$NodeList);
        $this->display();
    }
    //权限子节点分类列表
    public function subNodeList(){
        $pid=I("get.pid","");
        $nodeList=D('tb_node');
        $gNodeList=$nodeList->where("id=$pid")->select();
        $this->assign('gNodeList',$gNodeList);
        $where["level"]=2;
        $where["pid"]=$pid;
        $NodeList=$nodeList->where($where)->select();
        $this->assign('NodeList',$NodeList);
        $this->display();
    }
    //权限孙子节点分类列表
    public function sSubNodeList(){
        $pid=I("get.pid","");
        $nodeList=D('tb_node');
        $gNodeList=$nodeList->where("id=$pid")->select();
        $this->assign('gNodeList',$gNodeList);
        $where["level"]=3;
        $where["pid"]=$pid;
        $NodeList=$nodeList->where($where)->select();
        $this->assign('NodeList',$NodeList);
        $this->display();
    }
    //角色分类列表
    public function roleList(){
        $nodeList=D('tb_node');
        $TNodeList=$nodeList->where("level=2")->select();
        for($i=0;$i<count($TNodeList);$i++){
            $where['pid']=$TNodeList[$i]["id"];
            $TNodeList[$i]["children"]=$nodeList->where($where)->select();
        }
        $this->assign('TNodeList',$TNodeList);

        $roleList=D('tb_role');
        $RoleList=$roleList->select();
        $this->assign('RoleList',$RoleList);
        $this->display();
    }
    //增加和编辑用户信息
    public function addUser(){
        $userList=D('tb_user');
        $userRole=D("tb_role_user");
        $data['username']   =   I('post.username','');
        $data['realname']   =   I('post.realname','');
        $data['password']   =   I('post.password','');
        $data['phone']      =   I('post.phone','');
        $data['type']       =   I('post.type','');
        $data['workshopId']  =   I('post.workshopId','');
        $data['status']     =   I('post.status','');
        $data['remark']     =   I('post.remark','');
        if(I('post.index','')==1){
            $data['id']=I('post.id','','int');

            //id不为空，因此为更新信息
            if($userList->save($data)){

                $id=I('post.id','','int');
                $userRole->where("user_id = $id")->delete();

                $userRole->add(array(
                    'role_id' => $data['type'],
                    'user_id' => $id
                ));

                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'msg' => '更新成功'
                ));
            }else{
                $this->ajaxReturn(array(
                    'statusCode' => 300,
                    'msg' => '操作失败'
                ));
            }
        }elseif(I('post.index','')==2){
            $data['create_time']=date('Y-m-d');
            $userListId=$userList->add($data);
            if($userListId){

                $userRole->add(array(
                    'role_id' => $data['type'],
                    'user_id' => $userListId
                ));

                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'msg' => '新增成功'
                ));
            }else{
                $this->ajaxReturn(array(
                    'statusCode' => 300,
                    'msg' => '操作失败'
                ));
            }
        }
    }
    //增加和编辑用户信息
    public function addAdmin(){
        $adminList=D('tb_user_admin');
        $data['username']   =   I('post.username','');
        $data['realname']   =   I('post.realname','');
        $data['password']   =   I('post.password','');
        $data['phone']      =   I('post.phone','');
        $data['type']       =   I('post.type','');
        $data['workshopId']  =   I('post.workshopId','');
        $data['status']     =   I('post.status','');
        $data['remark']     =   I('post.remark','');
        if(I('post.index','')==1){
            $data['id']=I('post.id','','int');

            //id不为空，因此为更新信息
            if($adminList->save($data)){


                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'msg' => '更新成功'
                ));
            }else{
                $this->ajaxReturn(array(
                    'statusCode' => 300,
                    'msg' => '操作失败'
                ));
            }
        }elseif(I('post.index','')==2){
            $data['create_time']=date('Y-m-d');
            $userListId=$adminList->add($data);
            if($userListId){
                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'msg' => '新增成功'
                ));
            }else{
                $this->ajaxReturn(array(
                    'statusCode' => 300,
                    'msg' => '操作失败'
                ));
            }
        }
    }
    //增加和编辑权限节点信息
    public function addNode(){
        $nodeList=D('tb_node');

        $data['level']=I('post.level','');
        $data['pid']=I('post.pid','');
        $data['name']=I('post.name','');
        $data['title']=I('post.title','');
        $data['sort']=I('post.sort','');
        $data['status']=I('post.status','');
        $data['remark']=I('post.remark','');
        if($_POST["id"]){
            $data['id']=I('post.id','');
            $NodeList=$nodeList->save($data);
            if($NodeList){
                $this->ajaxReturn(array(
                   "code" => 100,
                    "msg" => "修改成功"
                ));
            }else{
                $this->ajaxReturn(array(
                    "code" => 100,
                    "msg" => "修改失败"
                ));
            }
        }else{
            $NodeList=$nodeList->add($data);
            if($NodeList){
                $this->ajaxReturn(array(
                    "code" => 100,
                    "msg" => "新增成功"
                ));
            }else{
                $this->ajaxReturn(array(
                    "code" => 100,
                    "msg" => "新增失败"
                ));
            }
        }
    }
    //新增和编辑角色列表信息
    public function addRole(){
        $roleList=D('tb_role');
        $data['name']=I('post.name','');
        $data['level']=I('post.level','');
        $data['pid']=I('post.pid',0,"int");
        $data['status']=I('post.status','',"int");
        $data['remark']=I('post.remark','');
        if($_POST["id"]){
            $data['id']=I('post.id','');
            $data['updata_time']=date('Y-m-d H:i:s');
            $roleList=$roleList->save($data);
            if($roleList){
                $this->ajaxReturn(array(
                    "code" => 100,
                    "msg" => "修改成功"
                ));
            }else{
                $this->ajaxReturn(array(
                    "code" => 100,
                    "msg" => "修改失败"
                ));
            }
        }else{
            $data['create_time']=date('Y-m-d H:i:s');
            $roleList=$roleList->add($data);
            if($roleList){
                $this->ajaxReturn(array(
                    "code" => 100,
                    "msg" => "新增成功"
                ));
            }else{
                $this->ajaxReturn(array(
                    "code" => 100,
                    "msg" => "新增失败"
                ));
            }
        }
    }

    public function addAccess(){
        $role_id=I("post.role_id","","int");
        $node_id=I("post.node_id","");
        $level=I("post.level","");
        $module=I("post.module","");
        $access=D("tb_access");
        $access->where("role_id=$role_id")->delete();
        $data[]=Array();
        for($i = 0; $i < count($node_id); $i++){
            $data[$i]["role_id"]  =   $role_id;
            $data[$i]["node_id"]  =   $node_id[$i];
            $data[$i]["level"]    =   $level[$i];
            $data[$i]["module"]   =   $module[$i];
        }
        if($access->addAll($data)){
            $this->ajaxReturn(array(
                "code" => 100,
                "msg" => "权限分配成功"
            ));
        }else{
            $this->ajaxReturn(array(
                "code" => 100,
                "msg" => "权限分配失败"
            ),"JSON");
        }
    }
    //删除用户信息
    public function deleteAdmin(){
        $id=I('post.id','');
        $userList=D('tb_user_admin');
        if($userList->delete($id)){
            $this->ajaxReturn(array(
                'statusCode' => 200,
                'msg' => '删除成功'
            ));
        }else{
            $this->ajaxReturn(array(
                'statusCode' => 200,
                'msg' => '删除失败'
            ));
        }
    }
    //删除用户信息
    public function deleteUser(){
        $userList=D('tb_user');
        $userRole=D("tb_role_user");
        $id=I('post.id','');
        $userRole->where("user_id = $id")->delete();
        if($userList->delete($id)){
            $this->ajaxReturn(array(
                'statusCode' => 200,
                'msg' => '删除成功'
            ));
        }else{
            $this->ajaxReturn(array(
                'statusCode' => 200,
                'msg' => '删除失败'
            ));
        }
    }
    //删除权限节点信息
    public function deleteNode(){
        $nodeList=D('tb_node');
        $id=I('post.id','');
        $nodeList->delete($id);
        if($nodeList->delete($id)){
            $this->ajaxReturn(array(
                'statusCode' => 200,
                'msg' => '删除成功'
            ));
        }else{
            $this->ajaxReturn(array(
                'statusCode' => 200,
                'msg' => '删除失败'
            ));
        }
    }
    //删除角色信息
    public function deleteRole(){
        $roleList=D('tb_role');
        $id=I('post.id','');
        $roleList->delete($id);
        if($roleList->delete($id)){
            $this->ajaxReturn(array(
                'statusCode' => 200,
                'msg' => '删除成功'
            ));
        }else{
            $this->ajaxReturn(array(
                'statusCode' => 200,
                'msg' => '删除失败'
            ));
        }
    }


    public function getNode(){
        $level=I("post.level","","int");
        $level=$level*1-1;
        $nodeList=D("tb_node");
        $nodeList=$nodeList->where("level=$level")->select();
        $this->ajaxReturn($nodeList);
    }
//    判断该角色相应权限
    public function getNodeId(){
        $id=I("post.id","");
        $access=D("tb_access");
        $Access=$access->where("role_id = $id")->select();
        foreach($Access as $a){
          $res[]="node_".$a['node_id'];
        }
        $this->ajaxReturn(array(
            'statusCode' => 200,
            'msg' => $res
        ),"JSON");
    }
}