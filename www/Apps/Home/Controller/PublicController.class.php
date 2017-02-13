<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/6
 * Time: 10:48
 */
namespace Home\Controller;
use Think\Controller;

class PublicController extends Controller
{
    public function verify()
    {
        $config = array(
            'fontSize' => 20, // 验证码字体大小
            'length' => 4, // 验证码位数
            'imageH' => 40,
            'codeSet' => '0123456789',
            'useCurve' => false,
            'useNoise' => false,
        );

        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    public function getTree()
    {
        //页面主体获取的Ztree树形菜单JSON数据格式，利用ajax方式传送
        //可能需要封装成一个函数方法，目前前部考虑，以实现功能为主
        $user=D("tb_user");
        $userWhere['id']=$_SESSION[C('USER_AUTH_KEY')];
        $userId=$user->where($userWhere)->select();

        $tableName=I('post.tableName','');
        $url=I('post.URL','');
        $factory=D('dic_factory');
        $factory=$factory->select();
        $i=0;
        foreach($factory as $a) {
            $s[$i]['name'] = $a['factoryId'];
            $fac=$s[$i]['name'];
            $s[$i]['url'] = $url."fac=$fac";
            $s[$i]['icon'] = "/Public/Home/img/factory.png";
            $s[$i]['target'] = "content";
            //查询车间信息
            $workshop = D('dic_workshop');
            $cond_1['factoryId'] = $a['factoryId'];
            if($userId[0]['workshopId']!=="总公司"){
                $cond_1['workshopId'] = $userId[0]['workshopId'];
            }
            $workshop = $workshop->where($cond_1)->select();
            $ii=0;
            foreach($workshop as $a) {
                $s[$i]['children'][$ii]['name'] = $a['workshopId'];
                $wor=$s[$i]['children'][$ii]['name'];
                $s[$i]['children'][$ii]['url'] = $url."wor=$wor & fac=$fac";
                $s[$i]['children'][$ii]['target'] = "content";
                $s[$i]['children'][$ii]['icon'] = "/Public/Home/img/workshop.png";
                //查询区域信息
                $area = D('dic_area');
                $cond_2['factoryId'] = $s[$i]['name'];
                $cond_2['workshopId'] = $s[$i]['children'][$ii]['name'];
                $area = $area->where($cond_2)->select();
                $iii=0;
                foreach($area as $a){
                    $s[$i]['children'][$ii]['children'][$iii]['name'] = $a['areaId'];
                    $area=$s[$i]['children'][$ii]['children'][$iii]['name'];
                    $s[$i]['children'][$ii]['children'][$iii]['url'] = $url."area=$area & wor=$wor & fac=$fac";
                    $s[$i]['children'][$ii]['children'][$iii]['target'] = "content";
                    $s[$i]['children'][$ii]['children'][$iii]['icon'] = "/Public/Home/img/area.png";
                    //查询区域信息
                    $plant = D($tableName);
                    $cond_3['factoryId'] = $s[$i]['name'];
                    $cond_3['workshopId'] = $s[$i]['children'][$ii]['name'];
                    $cond_3['areaId']=$s[$i]['children'][$ii]['children'][$iii]['name'];
                    $plant = $plant->where($cond_3)->select();
                    $iiii=0;
                    foreach($plant as $a){
                        //这是设备信息
                        $s[$i]['children'][$ii]['children'][$iii]['children'][$iiii]['name'] = $a['plantNO'];
                        $pl=$a['id'];
                        $s[$i]['children'][$ii]['children'][$iii]['children'][$iiii]['url'] = $url."area=$area & wor=$wor & fac=$fac & pl=$pl";
                        $s[$i]['children'][$ii]['children'][$iii]['children'][$iiii]['target'] = "content";
                        $s[$i]['children'][$ii]['children'][$iii]['children'][$iiii]['icon'] = "/Public/Home/img/plant.png";
                        $iiii++;
                    }
                    $iii++;
                }
                $ii++;
            }
            $i++;
        }
        $this->ajaxReturn($s,"JSON");
    }
    //删除信息
    public function delete(){
        $tableName=I('post.tableName','');
        if(I('post.Index', '')!==''){
        $index['id']= I('post.Index', '');
        }
        if(I('post.Index', '')!==''){
            if(I('post.IndexName', '')!==''){
                $index[I('post.IndexName', '')]=I('post.Index', '');
            }
        }
        $re=D($tableName);
        $re=$re->where($index)->delete();
        $this->ajaxReturn($re,"JSON");
    }
    //文件上传
    public function upload(){
        $add['recordId']=I('post.id','');
        $add['tableId']=I('post.tableId','');
        $add['addTime']=date('Y-m-d H:i:s');
        $upload = new \Think\Upload();// 实例化上传类
        $upload-> maxSize   =     3145728 ;// 设置附件上传大小
        $upload-> exts      =     array('jpg', 'gif', 'png', 'jpeg','txt','xlsx','xlsm','xls','doc','docx');// 设置附件上传类型
        $upload-> rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload-> savePath  =     ''; // 设置附件上传（子）目录
        $upload-> saveName  =     'time';
        // 上传文件
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $re['msg']=$upload->getError();
        }else{
        // 上传成功
            $attachment=D('tb_attachment');
            $add['filename']=$info['photo']["name"];
            $add['filePath']="Uploads/".$info['photo']["savepath"].$info['photo']["savename"];
            $attachment->add($add);
            if($attachment){
                $re['msg']="文件上传成功";
            }else{
                $re['msg']="文件上传成功（文件信息保存出错）";
            }
        }
        $this->ajaxReturn($re,"JSON");
    }
    public function deleteUpload(){
        $id=I("post.id","");
        $attachment=D('tb_attachment');
        $Attachmen=$attachment->where("id=$id")->select();
        $filePath=$Attachmen[0]['filePath'];
        if (!unlink($filePath))
        {
            $this->ajaxReturn(array(
                'statusCode' => 200,
                'msg' => '删除文件出错'
            ));
        } else {
            $re=$attachment->delete($id);
            if($re){
                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'msg' => '删除文件成功'
                ));
            }else{
                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'msg' => '删除文件成功（清楚记录失败）'
                ));
            }
        }

    }

    public function attachmentTable(){
        $data['recordId']=I('get.id','');
        $data['tableId']=I('get.tableId','');
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($data)->select();
        $this->assign('attachment',$attachment);
        $this->display();

    }
    //级联菜单的使用
    public function getLinkageMenu(){
        $tableName=I('post.tableName','');
        $value=I('post.value','');
        $valueId=I('post.valueId','');
        $re=D("$tableName");
        $where["$valueId"]=$value;
        $re=$re->where($where)->select();
        $this->ajaxReturn($re,"JSON");
    }

//    审核信息
    public function verified(){
        $id                =    I("post.id","","int");
        $table             =    I("post.tableName","");
//        $verifierLevel       =    I("post.verifierLevel","");
        $verifyResult      =    I("post.verifyResult","");
        $table=D("$table");

        $where['id']               =    $id;

//        $where['handleId']         =   $_SESSION[C('USER_AUTH_KEY')];  //当前记录操作者
//        $where['handler']          =   $_SESSION['realname'];          //当前操作者姓名
//        $where['handleType']       =   "审核";                         //当前操作类型，新增、编辑、审核
//        $where['HandleDate']       =   date("Y-m-d h:i:s",time());     //当前操作时间

        $where['verifier']         =    $_SESSION['realname'];
        $where['verifierLevel']    =    $_SESSION['roleLevel'];
        $where['verifyStage']      =    $_SESSION['userRole'];
        $where['verifyResult']     =    $verifyResult;                  //0 表示未审核 1 表示审核通过 2 表示审核未通过

        if($table->save($where)){
            $this->ajaxReturn(
                array(
                    "code" => 100,
                    "msg"  => "处理成功"
                ),"JSON"
            );
        }else{
            $this->ajaxReturn(
                array(
                    "code" => 100,
                    "msg"  => "处理出错"
                ),"JSON"
            );
        }



    }

    public function addMission(){
        $title       =   I("post.title","");
        $startDate   =   I("post.startDate","");
        $circle      =   I("post.circle",""); //0代表提醒一次 1代表每天都提醒 2代表每周提醒一次 3代表每月提醒一次 4代表每年提醒一次
        $remark      =   I("post.remark","");

//        switch($circle){
//            case 0:
//                $nextDate = $startDate;
//                break;
//            case 1:
//                $nextDate=date("Y-m-d",strtotime("$startDate   +1   day"));
//                break;
//            case 2:
//                $nextDate=date("Y-m-d",strtotime("$startDate   +1   week"));
//                break;
//            case 3:
//                $nextDate=date("Y-m-d",strtotime("$startDate   +1   month"));
//                break;
//            case 4:
//                $nextDate=date("Y-m-d",strtotime("$startDate   +1   year"));
//                break;
//        }
        $mission=D("tb_mission");
        $where['title']    =  $title;
        $where['setter']   =  $_SESSION['realname'];
        $where['setterId'] =  $_SESSION['uid'];
        $where['setDate']  =  date("Y-m-d",time());
        $where['startDate']=  $startDate;
        $where['circle']   =  $circle;
        $where['nextDate'] =  $startDate;
        $where['remark']   =  $remark;
        $Mission=$mission->add($where);
        if($Mission){
            $this->ajaxReturn(array(
                "msg"  => "新增成功",
                "code" => 1
            ));
        }else{
            $this->ajaxReture(array(
                "msg"  => "新增失败",
                "code" => 1
            ));
        }
    }
}
