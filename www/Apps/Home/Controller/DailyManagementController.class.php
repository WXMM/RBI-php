<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/20
 * Time: 10:24
 */
namespace Home\Controller;

class DailyManagementController extends CommonController {
    public function index(){
        $srcId=I("get.id","");
        $this->assign("srcId",$srcId);
        $this->display();
    }
    public function PlantList(){
        //     接收左侧树形菜单的url，获取装置列表
        $plantInfo=D('Plantinfo');
        $wor=I('get.wor','');
        $area=I('get.area','');
        $pl=I('get.pl','');
        $fac=I('get.fac','');
        if(empty($wor) && empty($area) && empty($pl) && empty($fac)){
            if($_SESSION['workshopId'] == "总公司"){
                $plant = $plantInfo->Relation("Plantdailymaintainance")->select();
            }else{
                $condition['workshopId']=$_SESSION['workshopId'];
                $plant = $plantInfo->Relation("Plantdailymaintainance")->where($condition)->select();
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
            $plant = $plantInfo->where($condition)->Relation("Plantdailymaintainance")->select();
        }

        $this->assign('plant',$plant);
        $this->display();
    }
    public function DailyManagementRecordList(){
        $where["id"]=I("get.id");
        $plantInfo=D("Plantinfo");
        $plant= $plantInfo->where($where)->Relation("Plantwallboardinfo")->select();
        $this->assign('plant',$plant);

        $plantmaintanceRecord=D("tb_plantdailymaintainancerecord");
        $data["pid"]=I("get.id");
        $PlantmaintanceRecord=$plantmaintanceRecord->where($data)->order("maintainanceDate desc, id desc")->select();
        $this->assign('PlantmaintanceRecord',$PlantmaintanceRecord);

        $content=D("dic_content");
        $content=$content->select();
        $this->assign('content',$content);
        $this->assign('nowTime',date("Y-m-d"));
        $this->display();
    }
    public function DailyManagementRecordDetail(){
        //        设备的相关信息
        $pid=I("get.pid");
        $gpid=I("get.gpid");
        $plantInfo=D("Plantinfo");
        $plant= $plantInfo->where("id=$gpid")->Relation("Plantwallboardinfo")->select();
        $this->assign('plant',$plant);

        $plantDailyMaintainanceRecord=D("tb_plantdailymaintainancerecord");
        $PlantDailyMaintainanceRecord=$plantDailyMaintainanceRecord->where("id=$pid")->select();
        $this->assign('PlantDailyMaintainanceRecord',$PlantDailyMaintainanceRecord[0]);

        $plantDailyMaintainanceDetail=D("tb_plantdailymaintainancedetail");
        $PlantDailyMaintainanceDetail=$plantDailyMaintainanceDetail->where("pid=$pid")->select();
        $this->assign('PlantDailyMaintainanceDetail',$PlantDailyMaintainanceDetail);

        //附件信息
        $attach['recordId']=I("get.pid");
        $attach['tableId']='dailyRecord';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);
        $this->display();
    }
    public function DailyManagementRecordEdit(){
        //        设备的相关信息
        $pid=I("get.pid");
        $gpid=I("get.gpid");
        $plantInfo=D("Plantinfo");
        $plant= $plantInfo->where("id=$gpid")->Relation("Plantwallboardinfo")->select();
        $this->assign('plant',$plant);

        $plantDailyMaintainanceRecord=D("tb_plantdailymaintainancerecord");
        $PlantDailyMaintainanceRecord=$plantDailyMaintainanceRecord->where("id=$pid")->select();
        $this->assign('PlantDailyMaintainanceRecord',$PlantDailyMaintainanceRecord[0]);

        $plantDailyMaintainanceDetail=D("tb_plantdailymaintainancedetail");
        $PlantDailyMaintainanceDetail=$plantDailyMaintainanceDetail->where("pid=$pid")->select();
        $this->assign('PlantDailyMaintainanceDetail',$PlantDailyMaintainanceDetail);

        $content=D("dic_content");
        $content=$content->select();
        $this->assign('content',$content);

        //附件信息
        $attach['recordId']=I("get.pid");
        $attach['tableId']='dailyRecord';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);

        $this->display();
    }
    public function addDailyManagementRecord(){
        $where['pid']=I("post.id","");
        $where["maintainanceUser"]     =  I("post.maintainanceUser","");
        $where["maintainanceDate"]     =  I("post.maintainanceDate","");
        $where["maintainanceType"]     =  I("post.maintainanceType","");
        $where["maintainanceArea"]     =  I("post.maintainanceArea","");
        $where["maintainanceNextDate"] =  I("post.maintainanceNextDate","");

        $where['handleId']      =   $_SESSION[C('USER_AUTH_KEY')];  //当前记录操作者
        $where['handler']       =   $_SESSION['realname'];          //当前操作者姓名
        $where['handleType']    =   "新增";                         //当前操作类型，新增、编辑、审核
        $where['HandleDate']    =   date("Y-m-d h:i:s",time());     //当前操作时间

        $where['verifier']             =  $_SESSION['realname'];
        $where['verifierLevel']        =  $_SESSION['roleLevel'];
        $where['verifyStage']          =  $_SESSION['userRole'];    //审核阶段表示审核到那个步骤了 1表示一级设备员等 2 表示厂区主管等 3表示公司领导等
        $where['verifyResult']         =  0;                      //审核结果 0表示未审核  1 表示审核通过  2 表示审核不通过
        $where["remark"]               =  I("post.remark","");
        $plantDailyMaintainanceRecord=D("tb_plantdailymaintainancerecord");
        $PlantDailyMaintainanceRecord=$plantDailyMaintainanceRecord->add($where);
        if($PlantDailyMaintainanceRecord){

            //添加上次记录时间的信息
            $plantdailymaintainance   =   D("tb_plantdailymaintainance");
            $gPid        =    I("post.id","");
            $plantdailymaintainanceCount=$plantdailymaintainance->where("pid=$gPid")->count();
            $plantdailymaintainanceData['lastCheckDate']  =    I("post.maintainanceDate","");
            $plantdailymaintainanceData['lastCheckType']  =    I("post.maintainanceType","");
            if($plantdailymaintainanceCount==0){
                $plantdailymaintainanceData['pid']  =   $gPid;
                $plantdailymaintainance ->add($plantdailymaintainanceData);
            }else{
                $plantdailymaintainance ->where("pid=$gPid")->save($plantdailymaintainanceData);
            }

            $checkTypeDetail=I("post.checkTypeDetail","");
            $checkItem=I("post.checkItem","");
            $checkResult=I("post.checkResult","");
            $checkManage=I("post.checkManage","");
            for($i=0;$i<count($checkItem);$i++){
                $data[$i]['pid']            = $PlantDailyMaintainanceRecord;
                $data[$i]['checkType']      = I("post.maintainanceType","");
                $data[$i]['checkTypeDetail']= $checkTypeDetail[$i];
                $data[$i]['checkItem']      = $checkItem[$i];
                $data[$i]['checkResult']    = $checkResult[$i];
                $data[$i]['checkManage']    = $checkManage[$i];
            }
            $plantDailyMaintainanceDetail=D("tb_plantdailymaintainancedetail");
            $PlantDailyMaintainanceDetail=$plantDailyMaintainanceDetail->addAll($data);
            if($PlantDailyMaintainanceDetail){
                //增添报警信息
                if (in_array(0, $checkResult)) {
                    M('tb_plantdailymaintainancerecord')->where("id=$PlantDailyMaintainanceRecord")->setField("isAlarm",1);  //1表示报警
                }

                $re['msg']        =    "保存成功";
                $re['gpid']       =    I("post.id","");
                $re['pid']        =    $PlantDailyMaintainanceRecord;

            }else{
                $re['msg']="保存失败（检查详情保存失败）";
            }
        }else{
            $re['msg']="保存出错";
        }
        $this->ajaxReturn($re,"JSON");
    }
    public function editDailyManagementRecord(){
        $where["id"]=I("post.id","");
        $where["maintainanceUser"]=I("post.maintainanceUser","");
        $where["maintainanceArea"]=I("post.maintainanceArea","");
        $where["maintainanceDate"]=I("post.maintainanceDate","");
        $where["maintainanceNextDate"]=I("post.maintainanceNextDate","");

        $where['handleId']      =   $_SESSION[C('USER_AUTH_KEY')];  //当前记录操作者
        $where['handler']       =   $_SESSION['realname'];          //当前操作者姓名
        $where['handleType']    =   "编辑";                         //当前操作类型，新增、编辑、审核
        $where['HandleDate']    =   date("Y-m-d h:i:s",time());     //当前操作时间

        $where['verifyResult']  =   0;
        $where["remark"]=I("post.remark","");
        //判断是否通过审核，如果通过审核则不能进行编辑
        $verifyResult = I("post.verifyResult","");
        if($verifyResult==1){
            $re['msg']="已通过审核，不能再进行编辑";
        }else{
            $plantDailyMaintainanceRecord=D("tb_plantdailymaintainancerecord");
            $PlantDailyMaintainanceRecord=$plantDailyMaintainanceRecord->save($where);
            if($PlantDailyMaintainanceRecord){
                $re['msg']="修改成功";
            }else{
                $re['msg']="修改失败";
            }
        }

        $this->ajaxReturn($re,"JSON");
    }
    public function editDailyManagementCheckItem(){

        $pid = I("post.pid", "");
        $where["id"]=I("post.id","");
        $where["checkResult"]=I("post.checkResult","");
        $where["checkManage"]=I("post.checkManage","");//判断是否通过审核，如果通过审核则不能进行编辑
        $verifyResult = I("post.verifyResult","");
        if($verifyResult==1){
            $re['msg']="已通过审核，不能再进行编辑";
        }else {
            $plantDailyMaintainanceDetail = D("tb_plantdailymaintainancedetail");
            $PlantDailyMaintainanceDetail = $plantDailyMaintainanceDetail->save($where);
            //对操作者进行记录
            $whereRunRecordList['handleId']              =  $_SESSION['uid'];
            $whereRunRecordList['handler']               =  $_SESSION['realname'];
            $whereRunRecordList['handleType']            =  "编辑";
            $whereRunRecordList['HandleDate']            =  date("Y-m-d h:i:s",time());
            M('tb_plantdailymaintainancerecord')->where("id=$pid")->setField($whereRunRecordList);

            if ($PlantDailyMaintainanceDetail) {
                if (I("post.checkResult", "") == 0) {
                    M('tb_plantdailymaintainancerecord')->where("id=$pid")->setField("isAlarm",1);  //1表示报警
                }else{
                    $maintainancedetailWhere['pid']         =$pid;
                    $maintainancedetailWhere['checkResult'] =0;
                    $maintainancedetailCount =M('tb_plantdailymaintainancedetail')->where($maintainancedetailWhere)->count();
                    if($maintainancedetailCount==0){
                        M('tb_plantdailymaintainancerecord')->where("id=$pid")->setField("isAlarm",0);
                    }
                }
                $re['msg'] = "修改成功";
            } else {
                $re['msg'] = "修改失败";
            }
        }
        $this->ajaxReturn($re,"JSON");
    }
    public function deleteDailyManagementRecord(){
        $id=I("post.id","");
        $plantDailyMaintainanceRecord=D("tb_plantdailymaintainancerecord");
        $PlantDailyMaintainanceRecord=$plantDailyMaintainanceRecord->delete($id);
        if($PlantDailyMaintainanceRecord){
            $where['pid']=$id;
            $plantDailyMaintainanceDetail=D("tb_plantdailymaintainancedetail");
            $PlantDailyMaintainanceDetail=$plantDailyMaintainanceDetail->where($where)->delete();
            if($PlantDailyMaintainanceDetail){
                $re['msg']="删除成功";
            }else{
                $re['msg']="删除失败(检查详情删除失败)";
            }
        }else{
            $re['msg']="删除失败";
        }
        $this->ajaxReturn($re,"JSON");
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