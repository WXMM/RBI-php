<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2016/9/19
 * Time: 9:25
 */
namespace Home\Controller;

class RunRecordController extends CommonController
{
    public function index(){
        $srcId=I("get.id","");
        $this->assign("srcId",$srcId);
        $this->display();
    }
     public function plantList(){

         //     接收左侧树形菜单的url，获取装置列表
         $plantInfo=D('Plantinfo');
         $wor=I('get.wor','');
         $area=I('get.area','');
         $pl=I('get.pl','');
         $fac=I('get.fac','');
         if(empty($wor) && empty($area) && empty($pl) && empty($fac)){
             if($_SESSION['workshopId'] == "总公司"){
                 $plant = $plantInfo->Relation("Runrecord")->select();
             }else{
                 $condition['workshopId']=$_SESSION['workshopId'];
                 $plant = $plantInfo->Relation("Runrecord")->where($condition)->select();
             }
         }else{
             $condition['factoryId']=$fac;
             if(!empty($wor)){
                 $condition['workshopId']=$wor;
             }
             if(!empty($area)){
                 $condition['areaId']=$area;
             }
             if(!empty($pl)) {
                 $condition['id'] = $pl;
             }
             $plant = $plantInfo->where($condition)->Relation("Runrecord")->select();
         }
         $this->assign('plant',$plant);
         $this->display();
     }
    public function RunRecordList(){
        $where["id"]=I("get.id");
        $plantInfo=D("Plantinfo");
        $plant= $plantInfo->where($where)->select();
        $this->assign('plant',$plant);
        $runRecordList=D("tb_runrecordlist");
        $data["pid"]=I("get.id");
        $RunRecordList=$runRecordList->where($data)->order("record_dt desc")->select();
        $this->assign('RunRecordList',$RunRecordList);
//        var_dump($RunRecordList);
        $testItemType=D("dic_content");
        $testItem=$testItemType->where("pid=37")->select();
        $this->assign('testItem',$testItem);

        $content=D("dic_content");
        $content=$content->select();
        $content['nowDate']=date("Y-m-d");
        $this->assign('content',$content);

//        储罐检查表单的具体内容
//        1、内浮顶罐罐体
        $RunRecordInput=D("dic_content");
        $RunRecordInput53=$RunRecordInput->where("pid=53")->select();
        $this->assign('RunRecordInput53',$RunRecordInput53);
//        2、内浮顶罐罐顶
        $RunRecordInput54=$RunRecordInput->where("pid=54")->select();
        $this->assign('RunRecordInput54',$RunRecordInput54);
//        3、内浮顶罐管线、集合管
        $RunRecordInput55=$RunRecordInput->where("pid=55")->select();
        $this->assign('RunRecordInput55',$RunRecordInput55);
//        4、内浮顶罐搅拌机
        $RunRecordInput56=$RunRecordInput->where("pid=56")->select();
        $this->assign('RunRecordInput56',$RunRecordInput56);
//        5、内浮顶罐静电接地
        $RunRecordInput57=$RunRecordInput->where("pid=57")->select();
        $this->assign('RunRecordInput57',$RunRecordInput57);

//        1、拱顶罐罐体
        $RunRecordInput58=$RunRecordInput->where("pid=58")->select();
        $this->assign('RunRecordInput58',$RunRecordInput58);
//        2、拱顶罐罐顶部分
        $RunRecordInput59=$RunRecordInput->where("pid=59")->select();
        $this->assign('RunRecordInput59',$RunRecordInput59);
//        3、拱顶罐管线集合线
        $RunRecordInput61=$RunRecordInput->where("pid=61")->select();
        $this->assign('RunRecordInput61',$RunRecordInput61);
//        4、拱顶罐搅拌机
        $RunRecordInput62=$RunRecordInput->where("pid=62")->select();
        $this->assign('RunRecordInput62',$RunRecordInput62);
//        5、拱顶罐静电接地
        $RunRecordInput63=$RunRecordInput->where("pid=63")->select();
        $this->assign('RunRecordInput63',$RunRecordInput63);

//        1、外浮顶罐罐体
        $RunRecordInput64=$RunRecordInput->where("pid=64")->select();
        $this->assign('RunRecordInput64',$RunRecordInput64);
//        2、外浮顶罐罐顶部分
        $RunRecordInput65=$RunRecordInput->where("pid=65")->select();
        $this->assign('RunRecordInput65',$RunRecordInput65);
//        3、外浮顶罐管线集合线
        $RunRecordInput66=$RunRecordInput->where("pid=66")->select();
        $this->assign('RunRecordInput66',$RunRecordInput66);
//        4、外浮顶罐浮盘
        $RunRecordInput67=$RunRecordInput->where("pid=67")->select();
        $this->assign('RunRecordInput67',$RunRecordInput67);
//        5、外浮顶罐气体检测
        $RunRecordInput68=$RunRecordInput->where("pid=68")->select();
        $this->assign('RunRecordInput68',$RunRecordInput68);
//        6、外浮顶罐搅拌机
        $RunRecordInput69=$RunRecordInput->where("pid=69")->select();
        $this->assign('RunRecordInput69',$RunRecordInput69);
//        7、外浮顶罐静电接地
        $RunRecordInput70=$RunRecordInput->where("pid=70")->select();
        $this->assign('RunRecordInput70',$RunRecordInput70);
//        8、外浮顶罐其他
        $RunRecordInput71=$RunRecordInput->where("pid=71")->select();
        $this->assign('RunRecordInput71',$RunRecordInput71);

        $user=D("tb_user");
        $User=$user->select();
        $this->assign('User',$User);
        $this->display();
    }
    public function RunRecordDetail(){
        $pid     =   intval(I("get.pid",""));
        $gpid    =   intval(I("get.gpid",""));
        $plantInfo=D("plantinfo");
        $PlantInfo=$plantInfo->where("id=$gpid")->select();
        $this->assign("plant",$PlantInfo[0]);

        $runRecordList=D("tb_runrecordlist");
        $RunRecordList=$runRecordList->where("id=$pid")->select();
        $this->assign("RunRecordList",$RunRecordList[0]);

        $runRecordDetail=D("tb_runrecorddetail");
        $RunRecordDetail=$runRecordDetail->where("pid=$pid")->select();
        $this->assign("RunRecordDetail",$RunRecordDetail);

        //附件信息
        $attach['recordId']=$pid;
        $attach['tableId']='tb_runrecord';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);
        $this->display();
    }
    public function RunRecordEdit(){
        $user=D("tb_user");
        $User=$user->select();
        $this->assign('User',$User);

        $content=D("dic_content");
        $content=$content->select();
        $content['nowDate']=date("Y-m-d");
        $this->assign('content',$content);

        $pid     =   intval(I("get.pid",""));
        $gpid    =   intval(I("get.gpid",""));
        $plantInfo=D("plantinfo");
        $PlantInfo=$plantInfo->where("id=$gpid")->select();
        $this->assign("plant",$PlantInfo[0]);

        $runRecordList=D("tb_runrecordlist");
        $RunRecordList=$runRecordList->where("id=$pid")->select();
        $this->assign("RunRecordList",$RunRecordList[0]);

        $runRecordDetail=D("tb_runrecorddetail");
        $RunRecordDetail=$runRecordDetail->where("pid=$pid")->select();
        $this->assign("RunRecordDetail",$RunRecordDetail);

//        附件信息
        //附件信息
        $attach['recordId']=$pid;
        $attach['tableId']='tb_runrecord';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);
        $this->display();
    }
    public function addRunRecord(){
        $runRecordList=D("tb_runrecordlist");
        $where['pid']                   =  I("post.pid","");
        $where['record_dt']             =  I("post.record_dt","");
        $where['check_dt']              =  I("post.check_dt","");
        $where['recorder']              =  I("post.recorder","");
        $where['checker']               =  I("post.checker","");
        $where['remark']                =  I("post.Remark","");


        $where['handleId']              =  $_SESSION['uid'];
        $where['handler']               =  $_SESSION['realname'];
        $where['handleType']            =  "新增";
        $where['HandleDate']            =  date("Y-m-d h:i:s",time());




        $where['verifier']         =  $_SESSION['realname'];
        $where['verifierLevel']    =  $_SESSION['roleLevel'];
        //审核阶段表示审核到那个步骤了 1表示一级设备员等 2 表示厂区主管等 3表示公司领导等
        $where['verifyStage']      =  $_SESSION['userRole'];
        //审核结果 0表示未审核  1 表示审核通过  2 表示审核不通过
        $where['verifyResult']     =  0;
        $RunRecordList=$runRecordList->add($where);
        if($RunRecordList){



            $pid          =   $RunRecordList;
            $part         =   I("post.part","");
            $partDetail   =   I("post.partDetail","");
            $checkResult  =   I("post.checkResult","");
            $remark       =   I("post.remark","");
            for($i=0;$i<count($part);$i++){
                $data[$i]["pid"]=$pid;
                $data[$i]["gPid"]=I("post.pid","");
                $data[$i]["part"]=$part[$i];
                $data[$i]["partDetail"]=$partDetail[$i];
                $data[$i]["checkResult"]=$checkResult[$i];
                $data[$i]["remark"]=$remark[$i];
            }
            $runRecordDetail=D("tb_runrecorddetail");
            $runRecordDetail=$runRecordDetail->addAll($data);

            //添加上次记录时间的信息
            $runRecord   =   D("Runrecord");
            $gPid        =    I("post.pid","");
            $RunRecordCount=$runRecord->where("pid=$gPid")->count();
            $runRecordData['last_RecordDate']  =    I("post.record_dt","");
            if($RunRecordCount==0){
                $runRecordData['pid']  =   $gPid;
                $runRecord ->add($runRecordData);
            }else{
                $runRecord ->where("pid=$gPid")->save($runRecordData);
            }

            if($runRecordDetail){

                if (in_array(0, $checkResult)) {
                    M('tb_runrecordlist')->where("id=$RunRecordList")->setField("isAlarm",1);  //1表示报警
                }

                $this->ajaxReturn(array(
                    'statusCode' =>   200,
                    'pid'        =>   $RunRecordList,
                    'gpid'       =>   I("post.pid",""),
                    'msg'        =>   '新增运行记录成功'
                ));
            }else{
                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'msg' => '新增运行记录出错'
                ));
            }
        }else{
            $this->ajaxReturn(array(
                'statusCode' => 200,
                'msg' => '新增运行记录出错'
            ));
        }

    }
    public function editRunRecord(){
        $runRecordList=D("tb_runrecordlist");
        $where['id']            =  I("post.id","");
        $where['record_dt']     =  I("post.record_dt","");
        $where['check_dt']      =  I("post.check_dt","");
        $where['recorder']      =  I("post.recorder","");
        $where['checker']       =  I("post.checker","");
        $where['handleId']      =  $_SESSION['uid'];
        $where['handler']       =  $_SESSION['realname'];
        $where['handleType']    =  "编辑";
        $where['HandleDate']    =  date("Y-m-d h:i:s",time());
        $where['remark']        =  I("post.Remark","");
        $verifyResult           =  I("post.verifyResult","");

        $where['verifyResult']  =  0;
        if($verifyResult==1){
            $this->ajaxReturn(array(
                'statusCode' => 200,
                'msg' => '已通过审核，不能再进行编辑'
            ));
        }else{
            $RunRecordList=$runRecordList->save($where);
            if($RunRecordList){
                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'msg' => '修改成功'
                ));
            }else{
                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'msg' => '修改出错'
                ));
            }
        }
    }
    public function editRunRecordDetail(){
        $pid = I("post.pid", "");
        $runRecordDetail=D("tb_runrecorddetail");
        $where['id']                =   I("post.id","");
        $where['checkResult']       =   I("post.checkResult","");
        $where['remark']            =   I("post.remark","");
        $verifyResult         =  I("post.verifyResult","");
        if($verifyResult==1){
            $this->ajaxReturn(array(
                'statusCode' => 200,
                'msg' => '已通过审核，不能再进行编辑'
            ));
        }else {
            $RunRecordDetail = $runRecordDetail->save($where);

            $whereRunRecordList['handleId']              =  $_SESSION['uid'];
            $whereRunRecordList['handler']               =  $_SESSION['realname'];
            $whereRunRecordList['handleType']            =  "编辑";
            $whereRunRecordList['HandleDate']            =  date("Y-m-d h:i:s",time());

            M('tb_runrecordlist')->where("id=$pid")->setField($whereRunRecordList);
            if ($RunRecordDetail) {
                if (I("post.checkResult", "") == 0) {
                    M('tb_runrecordlist')->where("id=$pid")->setField("isAlarm",1);  //1表示报警
                }else{
                    $runrecorddetailWhere['pid']         =$pid;
                    $runrecorddetailWhere['checkResult'] =0;
                    $runrecorddetailCount =M('tb_runrecorddetail')->where($runrecorddetailWhere)->count();
                    if($runrecorddetailCount==0){
                        M('tb_runrecordlist')->where("id=$pid")->setField("isAlarm",0);
                    }
                }




                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'msg' => "修改成功"
                ));
            } else {
                $this->ajaxReturn(array(
                    'statusCode' => 200,
                    'msg' => '修改出错'
                ));
            }
        }
    }
    public function deleteRunRecord(){
        $id=I("post.id","");
        $runRecordList=D("tb_runrecordlist");
        $RunRecordList=$runRecordList->delete($id);
        if($RunRecordList){
            $runRecordDetail=D("tb_runrecorddetail");
            $data['pid']=$id;
            $RunRecordDetail=$runRecordDetail->where($data)->delete();
            if($RunRecordDetail){
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
        }else{
            $this->ajaxReturn(array(
                'statusCode' => 200,
                'msg' => '删除失败'
            ));
        }

    }
    public function downloadUpload(){
        $id=I("get.id","");
        $attachment=D('tb_attachment');
        $Attachmen=$attachment->where("id=$id")->select();
        $filePath=$Attachmen[0]['filePath'];
        $showname=$Attachmen[0]['filename'];
        $showname = iconv('gb2312', 'utf-8', $showname);
        $http=new \Org\Net\Http();
        $http::download($filePath,"$showname");
    }
}