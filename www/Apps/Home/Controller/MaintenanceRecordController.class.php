<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/2
 * Time: 17:08
 * 维修记录管理
 */
namespace Home\Controller;

class MaintenanceRecordController extends CommonController
{
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
                $plant = $plantInfo->Relation("Plantmaintance")->select();
            }else{
                $condition['workshopId']=$_SESSION['workshopId'];
                $plant = $plantInfo->Relation("Plantmaintance")->where($condition)->select();
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
            $plant = $plantInfo->where($condition)->Relation("Plantmaintance")->select();
        }

        $this->assign('plant',$plant);
        $this->display();
    }
    public function MaintenanceRecordList(){
        $where["id"]=I("get.id");
        $plantInfo=D("Plantinfo");
        $plant= $plantInfo->where($where)->Relation("Plantwallboardinfo")->select();
        $this->assign('plant',$plant);
        $plantmaintanceRecord=D("Plantmaintancerecord");
        $data["pid"]=I("get.id");
        $PlantmaintanceRecord=$plantmaintanceRecord->where($data)->order("maintanceDate desc")->select();
        $this->assign('PlantmaintanceRecord',$PlantmaintanceRecord);

        $testItemType=D("dic_content");
        $testItem=$testItemType->where("pid=37")->select();
        $this->assign('testItem',$testItem);

        $content=D("dic_content");
        $content=$content->select();
        $content['nowDate']=date("Y-m-d");
        $this->assign('content',$content);

        $user=D("tb_user");
        $User=$user->select();
        $this->assign('User',$User);
        $this->display();
    }
    public function MaintenanceRecordDetail(){
//        设备的相关信息
        $where["id"]=I("get.gpid");
        $plantInfo=D("Plantinfo");
        $plant= $plantInfo->where($where)->Relation("Plantwallboardinfo")->select();
        $this->assign('plant',$plant);
//        维修的基本信息
        $plantmaintanceRecord=D("Plantmaintancerecord");
        $data["pid"]=I("get.gpid");
        $data["id"]=I("get.pid");
        $PlantmaintanceRecord=$plantmaintanceRecord->Relation("Plantmaintancerecordwall")->where($data)->select();
        $this->assign('PlantmaintanceRecord',$PlantmaintanceRecord);

//附件信息
        $attach['recordId']=I("get.pid");
        $attach['tableId']='MaintenanceRecord';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);

        $this->display();

    }
    public function MaintenanceRecordEdit(){
        $where["id"]=I("get.gpid");
        $plantInfo=D("Plantinfo");
        $plant= $plantInfo->where($where)->Relation("Plantmaintancerecord")->select();
        $this->assign('plant',$plant);
        $plantmaintanceRecord=D("Plantmaintancerecord");
        $data["id"]=I("get.pid");
        $PlantmaintanceRecord=$plantmaintanceRecord->where($data)->select();
        $this->assign('PlantmaintanceRecord',$PlantmaintanceRecord);
//        维修壁板相关的数据
        $plantmaintanceWallRecord=D("Plantmaintancerecordwall");
        $dataWall["pid"]=I("get.pid");
        $plantmaintanceWallRecord=$plantmaintanceWallRecord->where($dataWall)->order("layerNO")->select();
        $this->assign('plantmaintanceWallRecord',$plantmaintanceWallRecord);

        //附件信息
        $attach['recordId']=I("get.pid");
        $attach['tableId']='MaintenanceRecord';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);

        //壁板层数
        $id=I("get.gpid");
        $wallBoard=M("tb_plantwallboardinfo")->where("pid=$id")->select();
        $this->assign('wallBoard',$wallBoard);

        $content=D("dic_content");
        $content=$content->select();
        $content['nowDate']=date("Y-m-d");
        $this->assign('content',$content);

        $user=D("tb_user");
        $User=$user->select();
        $this->assign('User',$User);

        $this->display();
    }
    public function editMaintenanceRecord(){
        $where["id"]=I("post.id","");
        $where["maintanceDate"]=I("post.maintanceDate","");
        $where["Record_dt"]=I("post.Record_dt","");
        $where["maintanceCompany"]=I("post.maintanceCompany","");
        $where["Record_username"]=I("post.Record_username","");
        $where["remark"]=I("post.remark","");

        $where['handleId']      =   $_SESSION[C('USER_AUTH_KEY')];  //当前记录操作者
        $where['handler']       =   $_SESSION['realname'];          //当前操作者姓名
        $where['handleType']    =   "编辑";                         //当前操作类型，新增、编辑、审核
        $where['HandleDate']    =   date("Y-m-d h:i:s",time());     //当前操作时间
        $where['verifyResult']  =   0;

        $where["isWall"]=I("post.wallBorderBox","0");
        $where["isBottom"]=I("post.bottomBorderBox","0");
        $where["isTop"]=I("post.topBorderBox","0");
        $wallBorderBox=I("post.wallBorderBox","");

        if($wallBorderBox!==""){
            $where["isInsidePaint_side"]=I("post.isInsidePaint_side","");
            $where["insidePaintDate_side"]=I("post.insidePaintDate_side","");
            $where["insidePaintQuality_side"]=I("post.insidePaintQuality_side","");
            $where["isOutsidePaint_side"]=I("post.isOutsidePaint_side","");
            $where["outsidePaintDate_side"]=I("post.outsidePaintDate_side","");
            $where["outsidePaintQuality_side"]=I("post.outsidePaintQuality_side","");
            $where["isInstallLining_side"]=I("post.isInstallLining_side","");
            $where["liningType_side"]=I("post.liningType_side","");
            $where["installLiningDate_side"]=I("post.installLiningDate_side","");
            $where["liningQuality_side"]=I("post.liningQuality_side","");
            $where["liningCheckDate_side"]=I("post.liningCheckDate_side","");
        }
        $bottomBorderBox=I("post.bottomBorderBox","");
        if($bottomBorderBox!==""){
            $where["isChange_bottom"]=I("post.isChange_bottom","");
            $where["changeDate_bottom"]=I("post.changeDate_bottom","");
            $where["isInsidePaint_bottom"]=I("post.isInsidePaint_bottom","");
            $where["insidePaintDate_bottom"]=I("post.insidePaintDate_bottom","");
            $where["insidePaintQuality_bottom"]=I("post.insidePaintQuality_bottom","");
            $where["isInstallLining_bottom"]=I("post.isInstallLining_bottom","");
            $where["liningType_bottom"]=I("post.liningType_bottom","");
            $where["installLiningDate_bottom"]=I("post.installLiningDate_bottom","");
            $where["liningType_bottom"]=I("post.liningType_bottom","");
            $where["liningQuality_bottom"]=I("post.liningQuality_bottom","");
            $where["liningCheckDate_bottom"]=I("post.liningCheckDate_bottom","");
        }
        $topBorderBox=I("post.topBorderBox","");
        if($topBorderBox!==""){
            $where["isChange_top"]=I("post.isChange_top","");
            $where["changeDate_top"]=I("post.changeDate_top","");
            $where["isInsidePaint_top"]=I("post.isInsidePaint_top","");
            $where["insidePaintDate_top"]=I("post.insidePaintDate_top","");
            $where["insidePaintQuality_top"]=I("post.insidePaintQuality_top","");
            $where["isOutsidePaint_top"]=I("post.isOutsidePaint_top","");
            $where["outsidePaintDate_top"]=I("post.outsidePaintDate_top","");
            $where["outsidePaintQuality_top"]=I("post.outsidePaintQuality_top","");
        }
        $verifyResult=I("post.verifyResult","");
        if($verifyResult==1){
            $re['msg']="已通过审核，不能再进行编辑";
        }else{
            $plantMaintanceRecord=D("Plantmaintancerecord");
            $pid=$plantMaintanceRecord->save($where);
            if($pid){
                $re['msg']="修改成功";
            }else{
                $re['msg']="修改失败";
            }
        }


        $this->ajaxReturn($re);
    }

//    public function deleteMaintenanceRecord(){
//        $id=I("post.id","");
//        $plantMaintanceRecord=D("tb_plantmaintancerecord");
//        $PlantMaintanceRecord=$plantMaintanceRecord->delete($id);
//        if($PlantMaintanceRecord===false){
//            $this->ajaxReturn(
//                array(
//                    "msg" => "删除失败",
//                    "code" => 100
//                ),
//                "JSON"
//            );
//        }else{
//            $this->ajaxReturn(
//                array(
//                    "msg" => "删除成功",
//                    "code" => 200
//                ),
//                "JSON"
//            );
//        }
//    }

    public function editMaintenanceRecordWall(){
        $id                 =   intval(I("post.id",""));
        $where['layerNO']   =   intval(I("post.layerNO",""));
        $where['pid']       =   intval(I("post.pid",""));
        $verifyResult       =   I("post.verifyResult","");
        if($verifyResult==1){
            $re['msg']="已通过审核，不能再进行编辑或新增";
        }else {
            $plantMaintanceRecordWall = D("Plantmaintancerecordwall");
            $count = $plantMaintanceRecordWall->where($where)->count();
            $where['isChange'] = I("post.isChange", "");
            $where['changeDate'] = I("post.changeDate", "");
            if ($id == "") {
                if ($count > 0) {
                    $re['mark'] = 1;
                    $re['msg'] = "壁板已存在";
                } else {
                    $where['gpid'] = I("post.gpid", "");
                    $PlantMaintanceRecordWall = $plantMaintanceRecordWall->add($where);
                    if ($PlantMaintanceRecordWall) {
                        $re['msg'] = "新增成功";
                    } else {
                        $re['msg'] = "新增失败";
                    }
                    $re['mark'] = 0;
                }

            } else {
                $where['id'] = $id;
                $PlantMaintanceRecordWall = $plantMaintanceRecordWall->save($where);
                if ($PlantMaintanceRecordWall) {
                    $re['msg'] = "修改成功";
                } else {
                    $re['msg'] = "修改失败";
                }
            }
        }

        $this->ajaxReturn($re,"JSON");
    }
    public function deleteMaintenanceRecordWall(){
        $id=I("post.id","");
        $plantMaintanceRecordWall=D("Plantmaintancerecordwall");
        $count=$plantMaintanceRecordWall->delete($id);
        if($count){
            $re['msg']="删除成功";
        }else{
            $re['msg']="删除失败";
        }
        $this->ajaxReturn($re,"JSON");
    }
    public function addMaintenanceRecord(){
        $where['pid']=I("post.id","");
        $where["maintanceDate"]=I("post.maintanceDate","");
        $where["Record_dt"]=I("post.Record_dt","");
        $where["maintanceCompany"] =  I("post.maintanceCompany","");
        $where["Record_username"]  =  I("post.Record_username","");

        $where['handleId']      =   $_SESSION[C('USER_AUTH_KEY')];  //当前记录操作者
        $where['handler']       =   $_SESSION['realname'];          //当前操作者姓名
        $where['handleType']    =   "新增";                         //当前操作类型，新增、编辑、审核
        $where['HandleDate']    =   date("Y-m-d h:i:s",time());     //当前操作时间

        $where['verifier']             =  $_SESSION['realname'];
        $where['verifierLevel']        =  $_SESSION['roleLevel'];
        //审核阶段表示审核到那个步骤了 1表示一级设备员等 2 表示厂区主管等 3表示公司领导等
        $where['verifyStage']          =  $_SESSION['userRole'];
        //审核结果 0表示未审核  1 表示审核通过  2 表示审核不通过
        $where['verifyResult']         =  0;
        $where["remark"]=I("post.remark","");
        $wallBorderBox=I("post.wallBorderBox","");
        if($wallBorderBox!==""){
            $where["isWall"]=I("post.wallBorderBox","");
            $where["isInsidePaint_side"]=I("post.isInsidePaint_side","");
            $where["insidePaintDate_side"]=I("post.insidePaintDate_side","");
            $where["insidePaintQuality_side"]=I("post.insidePaintQuality_side","");
            $where["isOutsidePaint_side"]=I("post.isOutsidePaint_side","");
            $where["outsidePaintDate_side"]=I("post.outsidePaintDate_side","");
            $where["outsidePaintQuality_side"]=I("post.outsidePaintQuality_side","");
            $where["isInstallLining_side"]=I("post.isInstallLining_side","");
            $where["liningType_side"]=I("post.liningType_side","");
            $where["installLiningDate_side"]=I("post.installLiningDate_side","");
            $where["liningQuality_side"]=I("post.liningQuality_side","");
            $where["liningCheckDate_side"]=I("post.liningCheckDate_side","");
        }
        $bottomBorderBox=I("post.bottomBorderBox","");
        if($bottomBorderBox!==""){
            $where["isBottom"]=I("post.wallBorderBox","");
            $where["isChange_bottom"]=I("post.isChange_bottom","");
            $where["changeDate_bottom"]=I("post.changeDate_bottom","");
            $where["isInsidePaint_bottom"]=I("post.isInsidePaint_bottom","");
            $where["insidePaintDate_bottom"]=I("post.insidePaintDate_bottom","");
            $where["insidePaintQuality_bottom"]=I("post.insidePaintQuality_bottom","");
            $where["isInstallLining_bottom"]=I("post.isInstallLining_bottom","");
            $where["liningType_bottom"]=I("post.liningType_bottom","");
            $where["installLiningDate_bottom"]=I("post.installLiningDate_bottom","");
            $where["liningType_bottom"]=I("post.liningType_bottom","");
            $where["liningQuality_bottom"]=I("post.liningQuality_bottom","");
            $where["liningCheckDate_bottom"]=I("post.liningCheckDate_bottom","");
        }
        $topBorderBox=I("post.topBorderBox","");
        if($topBorderBox!==""){
            $where["isTop"]=I("post.wallBorderBox","");
            $where["isChange_top"]=I("post.isChange_top","");
            $where["changeDate_top"]=I("post.changeDate_top","");
            $where["isInsidePaint_top"]=I("post.isInsidePaint_top","");
            $where["insidePaintDate_top"]=I("post.insidePaintDate_top","");
            $where["insidePaintQuality_top"]=I("post.insidePaintQuality_top","");
            $where["isOutsidePaint_top"]=I("post.isOutsidePaint_top","");
            $where["outsidePaintDate_top"]=I("post.outsidePaintDate_top","");
            $where["outsidePaintQuality_top"]=I("post.outsidePaintQuality_top","");
        }
        $plantMaintanceRecord=D("Plantmaintancerecord");
        $pid=$plantMaintanceRecord->add($where);
        if($pid){

            //   添加下次维修时间
            $id=I("post.id","");
            $findIsHaveId=M("tb_plantmaintance")->where("pid=$id")->getField("id");
            if($findIsHaveId){
                $plantMaintanceWhere['id']=$findIsHaveId;
                $plantMaintanceWhere['Last_plantMaintance']=I("post.maintanceDate","");
                M("tb_plantmaintance")->save($plantMaintanceWhere);
            }else{
                $plantMaintanceWhere['pid']=$id;
                $plantMaintanceWhere['Last_plantMaintance']=I("post.maintanceDate","");
                M("tb_plantmaintance")->add($plantMaintanceWhere);
            }

            if($wallBorderBox!==""){
                $layerNO=I("post.layerNO","");
                $isChange=I("post.isChange","");
                $changeDate=I("post.changeDate","");
                for($i=0;$i<count($layerNO);$i++){
                    $wall[$i]['gpid']=I("post.id","");
                    $wall[$i]['pid']=$pid;
                    $wall[$i]['layerNO']=$layerNO[$i];
                    $wall[$i]['isChange']=$isChange[$i];
                    $wall[$i]['changeDate']=$changeDate[$i];
                }
                $plantMaintanceRecordWall=D("Plantmaintancerecordwall");
                $res=$plantMaintanceRecordWall->addAll($wall);


                if($res){

                    $re['msg']      =      "保存成功";
                    $re['pid']      =      $pid;
                    $re['gpid']     =      I("post.id","");
                }else{
                    $re['msg']      =      "保存成功（壁板维修信息保存出错）";
                    $re['pid']      =      $pid;
                    $re['gpid']     =      I("post.id","");
                }
            }else{
                $re['msg']          =      "保存成功（没有进行壁板更换）";
                $re['pid']          =      $pid;
                $re['gpid']         =      I("post.id","");
            }

        }else{
            $re['msg']="保存出错";
        }
        $this->ajaxReturn($re);
    }
    public function deleteMaintenanceRecord(){
        $id=I("post.id","");
        $plantMaintanceRecord=D("Plantmaintancerecord");
        $cont=$plantMaintanceRecord->delete($id);
        if($cont==1){
            $plantMaintanceRecordWall=D("Plantmaintancerecordwall");
            $where['pid']=I("post.id","");
            $res=$plantMaintanceRecordWall->where($where)->delete();
            if($res){
                $re['msg']="删除成功";
            }else{
                $re['msg']="删除成功(壁板维修数据为空或者壁板维修数据删除错误)";
            }
        }else{
            $re['msg']="删除失败";
        }
        $this->ajaxReturn($re);
    }
//    文件上传操作
    public function upload(){
        $add['recordId']=I('post.id','');
        $add['tableId']=I('post.tableId','');
        $add['addTime']=date('Y-m-d H:i:s');
        $config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    './Uploads/',
            'savePath'   =>    '',
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg','xlsx'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd'),
        );
        $upload=new \Think\Upload($config);
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $re['msg']="上传出错";
        }else{
        // 上传成功 获取上传文件信息
            $attachment=D('tb_attachment');
            $add['filename']=$info['file']["name"];
            $add['filePath']="./Uploads/".$info['file']["savepath"].$info['file']["savename"];
            $res=$attachment->add($add);
            if($res){
                $re['msg']="保存成功";
            }
        }
        $this->ajaxReturn($re);
    }
//    删除对应文件
     public function deleteAttachFile(){
         $id=I("post.id","");
         $filePath=I("post.filePath","");
         if(is_file($filePath)){
             if (!unlink($filePath))
             {
                 $re['msg']="删除文件出错";
             }
             else
             {
                 $attach=D("tb_attachment");
                 $res=$attach->delete($id);
                 if($res){
                     $re['msg']="删除文件成功";
                 }else{
                     $re['msg']="删除文件成功(文件记录信息删除错误)";
                 }
             }
         }else{
             $re['msg']="文件目录不存在";
         }
//         $re['msg']=$filePath;
         $this->ajaxReturn($re,"JSON");
     }
    public function downloadFile(){
        $file=I("post.filePath","");
        if(is_file($file)) {
            header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; filename=".basename($file));
            readfile($file);
        }else{
            $re['msg']="文件不存在";
            $this->ajaxReturn($re,"JSON");
        }
    }
    public function getLayerSelect(){
        $where['pid']=I("post.pid","");
        $wallboard=D("Plantwallboardinfo");
        $res=$wallboard->where($where)->field("layerNO")->order("layerNO")->select();
        $this->ajaxReturn($res,"JSON");
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
