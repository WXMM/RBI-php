<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/7
 * Time: 17:10
 */
namespace Home\Controller;
class InspectRecordController extends CommonController
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
                $plant = $plantInfo->Relation("Plantinspect")->select();
            }else{
                $condition['workshopId']=$_SESSION['workshopId'];
                $plant = $plantInfo->Relation("Plantinspect")->where($condition)->select();
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
            $plant = $plantInfo->where($condition)->Relation("Plantinspect")->select();
        }

        $this->assign('plant',$plant);
        $this->display();
    }
    public function InspectRecordList(){
        $where["id"]=I("get.id");
        $plantInfo=D("Plantinfo");
        $plant= $plantInfo->where($where)->Relation("Plantwallboardinfo")->select();
        $this->assign('plant',$plant);
        $plantInspectRecord=D("tb_planttestrecord");
        $data["pid"]=I("get.id");
        $PlantInspectRecord=$plantInspectRecord->where($data)->order("testDate desc,id desc")->select();
        $this->assign('PlantInspectRecord',$PlantInspectRecord);

        $testItemType=D("dic_content");
        $testItem=$testItemType->where("pid=37")->select();
        $this->assign('testItem',$testItem);

        $content=D("dic_content");
        $content=$content->select();
        $content['nowDate']=date("Y-m-d");
        $this->assign('content',$content);
        $this->display();
    }
    public function InspectRecordDetail(){
        //        设备的相关信息
        $pid=I("get.pid");
        $gpid=I("get.gpid");
        $plantInfo=D("Plantinfo");
        $plant= $plantInfo->where("id=$gpid")->Relation("Plantwallboardinfo")->select();
        $this->assign('plant',$plant);
//        检验的基本信息
        $plantinspectRecord=D("tb_planttestrecord");
        $PlantInspectRecord=$plantinspectRecord->where("id=$pid")->select();
        $this->assign('PlantInspectRecord',$PlantInspectRecord);

//        壁板检验的相关信息
        $plantInspectRecordWall=D("tb_planttestrecordwall");
        $PlantInspectRecordWall=$plantInspectRecordWall->where("pid=$pid")->order("layerNO")->select();
        $this->assign('PlantInspectRecordWall',$PlantInspectRecordWall);
//        检查结果相关信息
        $checkResult=D("tb_planttestrecord_checkresult");
        $checkResult=$checkResult->where("pid=$pid")->select();
        $this->assign('checkResult',$checkResult);
//附件信息
        $attach['recordId']=I("get.pid");
        $attach['tableId']='InspectRecord';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);

        $testItemType=D("dic_content");
        $testItem=$testItemType->where("pid=37")->select();
        $this->assign('testItem',$testItem);
        $this->display();
    }
    public function InspectRecordEdit(){
        $where["id"]=I("get.gpid");
        $plantInfo=D("Plantinfo");
        $plant= $plantInfo->where($where)->Relation("Plantwallboardinfo")->select();
        $this->assign('plant',$plant);

        $plantInspectRecord=D("tb_planttestrecord");
        $where["id"]=I("get.pid");
        $PlantInspectRecord=$plantInspectRecord->where($where)->select();
        $this->assign('PlantInspectRecord',$PlantInspectRecord[0]);

        $plantTestRecordWall=D("tb_planttestrecordwall");
        $plantInspectRecordWallWhere['pid']=I("get.pid");
        $PlantTestRecordWall=$plantTestRecordWall->where($plantInspectRecordWallWhere)->order("layerNO")->select();
        $this->assign('PlantTestRecordWall',$PlantTestRecordWall);

        $plantTestRecordCheckResult=D("tb_planttestrecord_checkresult");
        $PlantTestRecordCheckResult=$plantTestRecordCheckResult->where($plantInspectRecordWallWhere)->select();
        $this->assign('PlantTestRecordCheckResult',$PlantTestRecordCheckResult);
        $testItemType=D("dic_content");
        $testItem=$testItemType->where("pid=37")->select();
        $this->assign('testItem',$testItem);

        //壁板层数
        $id=I("get.gpid");
        $wallBoard=M("tb_plantwallboardinfo")->where("pid=$id")->select();
        $this->assign('wallBoard',$wallBoard);

        //附件信息
        $attach['recordId']=I("get.pid");
        $attach['tableId']='InspectRecord';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);
//         select备选
        $testItemType=D("dic_content");
        $testItem=$testItemType->where("pid=37")->select();
        $this->assign('testItem',$testItem);

        $content=D("dic_content");
        $content=$content->select();
        $content['nowDate']=date("Y-m-d");
        $this->assign('content',$content);

        $this->display();
    }
    public function addInspectRecord(){
        $where['pid']=I("post.id","");
        $where["testCompany"]=I("post.testCompany","");
        $where["testDate"]=I("post.testDate","");
        $where["nextTestDate"]=I("post.nextTestDate","");
        $where["testType"]=I("post.testType","");
        $where["testRemark"]=I("post.remark","");
        $where["isWallTest"]=I("post.wallBorderBox","");
        $where["isBottomTest"]=I("post.bottomBorderBox","");
        $where["isTopTest"]=I("post.topBorderBox","");

        $where['handleId']       =   $_SESSION[C('USER_AUTH_KEY')];  //当前记录操作者
        $where['handler']        =   $_SESSION['realname'];          //当前操作者姓名
        $where['handleType']     =   "新增";                         //当前操作类型，新增、编辑、审核
        $where['HandleDate']     =   date("Y-m-d h:i:s",time());     //当前操作时间


        $where['verifier']       =    $_SESSION['realname'];
        $where['verifierLevel']  =    $_SESSION['roleLevel'];
        //审核阶段表示审核到那个步骤了 1表示一级设备员等 2 表示厂区主管等 3表示公司领导等
        $where['verifyStage']    =    $_SESSION['userRole'];
        //审核结果 0表示未审核  1 表示审核通过  2 表示审核不通过
        $where['verifyResult']   =    0;


        $wallBorderBox=I("post.wallBorderBox","");
        $bottomBorderBox=I("post.bottomBorderBox","");
        $topBorderBox=I("post.topBorderBox","");
        if($bottomBorderBox==1){
            $where["testDate_bottom"]=I("post.testDate_bottom","");
            $where["testType_bottom"]=I("post.testType_bottom","");
            $where["testBasicSettle_bottom"]=I("post.testBasicSettle_bottom","");
            $where["testMinThickness1_bottom"]=I("post.testMinThickness1_bottom","");
            $where["testMinThickness2_bottom"]=I("post.testMinThickness2_bottom","");
            $where["testMethod_bottom"]=I("post.testMethod_bottom","");
            $where["testRate_bottom"]=I("post.testRate_bottom","");
        }
        if($topBorderBox==1){
            $where["testDate_top"]=I("post.testDate_top","");
            $where["testMethod_top"]=I("post.testMethod_top","");
            $where["testMinThickness_top"]=I("post.testMinThickness_top","");
            $where["testRate_top"]=I("post.testRate_top","");
        }
        $plantInspectRecord=D("tb_planttestrecord");
        $pid=$plantInspectRecord->add($where);
        if($pid){

            //添加下次检验时间
            $plantInspect   =   D("tb_plantinspect");
            $plantInspectgPid           =    I("post.id","");
            $plantInspectCount=$plantInspect->where("pid=$plantInspectgPid")->count();
            $plantInspectData['nextTestDate']  =  I("post.nextTestDate","");
            if($plantInspectCount==0){
                $plantInspectData['pid']  =   $plantInspectgPid;
                $plantInspect ->add($plantInspectData);
            }else{
                $plantInspect ->where("pid=$plantInspectgPid")->save($plantInspectData);
            }

            $checkItem      =   I("post.checkItem","");
            $checkResult    =   I("post.checkResult","");
            $remark         =   I("post.checkResultRemark","");
            if(count($checkItem)>0) {
                for ($i = 0; $i < count($checkItem); $i++) {
                    $checkResultWhere[$i]['pid'] = $pid;
                    $checkResultWhere[$i]['checkItem'] = $checkItem[$i];
                    $checkResultWhere[$i]['checkResult'] = $checkResult[$i];
                    $checkResultWhere[$i]['remark'] = $remark[$i];
                }
                $plantInspectRecordWall = D("tb_planttestrecord_checkresult");
                $plantInspectRecordWall->addAll($checkResultWhere);
                if (in_array(0, $checkResult)) {
                    $res['test']   =   "有报警";
                    M('tb_planttestrecord')->where("id=$pid")->setField("isAlarm",1);  //1表示报警
                }

                if ($wallBorderBox !== "") {
                    $layerNO = I("post.layerNO", "");
                    $testDate = I("post.testDateWall", "");
                    $testMethod = I("post.testMethod", "");
                    $testRate = I("post.testRate", "");
                    $minThickness = I("post.minThickness", "");
                    for ($i = 0; $i < count($layerNO); $i++) {
                        $wall[$i]['gpid'] = I("post.id", "");;
                        $wall[$i]['pid'] = $pid;
                        $wall[$i]['layerNO'] = $layerNO[$i];
                        $wall[$i]['testDate'] = $testDate[$i];
                        $wall[$i]['testMethod'] = $testMethod[$i];
                        $wall[$i]['testRate'] = $testRate[$i];
                        $wall[$i]['minThickness'] = $minThickness[$i];
                    }
                    $plantInspectRecordWall = D("tb_planttestrecordwall");
                    $res = $plantInspectRecordWall->addAll($wall);
                    if ($res) {
                        $re['msg']     =    "保存成功";
                        $re['pid']     =    $pid;
                        $re['gpid']    =    I("post.id","");
                    } else {
                        $re['msg'] = "保存成功（壁板维修信息保存出错）";
                        $re['pid']     =    $pid;
                        $re['gpid']    =    I("post.id","");
                    }
                } else {
                    $re['msg'] = "保存成功（没有进行壁板检验）";
                    $re['pid']     =    $pid;
                    $re['gpid']    =    I("post.id","");
                }
            }
        }else{
            $re['msg']="保存出错";
        }
        $this->ajaxReturn($re);

    }
    public function editInspectRecord(){
        $where['id']=I("post.id","");
        $where["testCompany"]=I("post.testCompany","");
        $where["testDate"]=I("post.testDate","");
        $where["nextTestDate"]=I("post.nextTestDate","");
        $where["testType"]=I("post.testType","");
        $where["testRemark"]=I("post.remark","");
        $where["isWallTest"]=I("post.wallBorderBox",'0');
        $where["isBottomTest"]=I("post.bottomBorderBox",'0');
        $where["isTopTest"]=I("post.topBorderBox",'0');

        $where['handleId']       =   $_SESSION[C('USER_AUTH_KEY')];  //当前记录操作者
        $where['handler']        =   $_SESSION['realname'];          //当前操作者姓名
        $where['handleType']     =   "编辑";                         //当前操作类型，新增、编辑、审核
        $where['HandleDate']     =   date("Y-m-d h:i:s",time());     //当前操作时间
        $where['verifyResult']   =    0;                             //审核结果 0表示未审核  1 表示审核通过  2 表示审核不通过


        $bottomBorderBox=I("post.bottomBorderBox",'');
        if($bottomBorderBox!==""){
            $where["isBottomTest"]=I("post.wallBorderBox","");
            $where["testDate_bottom"]=I("post.testDate_bottom","");
            $where["testType_bottom"]=I("post.testType_bottom","");
            $where["testBasicSettle_bottom"]=I("post.testBasicSettle_bottom","");
            $where["testMinThickness1_bottom"]=I("post.testMinThickness1_bottom","");
            $where["testMinThickness2_bottom"]=I("post.testMinThickness2_bottom","");
            $where["testMethod_bottom"]=I("post.testMethod_bottom","");
            $where["testRate_bottom"]=I("post.testRate_bottom","");
        }
        $topBorderBox=I("post.topBorderBox",'');
        if($topBorderBox!==""){
            $where["isTopTest"]=I("post.wallBorderBox","");
            $where["testDate_top"]=I("post.testDate_top","");
            $where["testMethod_top"]=I("post.testMethod_top","");
            $where["testMinThickness_top"]=I("post.testMinThickness_top","");
            $where["testRate_top"]=I("post.testRate_top","");
        }

        $verifyResult=I("post.verifyResult",'0');
        if($verifyResult==1){
            $re['msg']="已通过审核，不能再进行编辑";
        }else{
            $plantInspectRecord=D("tb_planttestrecord");
            $pid=$plantInspectRecord->save($where);
            if($pid){
                $re['msg']="修改成功";
            }else{
                $re['msg']="修改出错";
            }
        }

        $re['where']=$where;
        $this->ajaxReturn($re,"JSON");

    }
    public function deleteInspectRecord(){
        $id=I("post.id","");
        $plantInspectRecord=D("tb_planttestrecord");
        $cont=$plantInspectRecord->delete($id);
        if($cont==1){
            $where['pid']=I("post.id","");
            $checkResult=D("tb_planttestrecord_checkresult");
            $checkResult=$checkResult->where($where)->delete();
            if($checkResult>0){
                $plantInspectRecordWall=D("tb_planttestrecordwall");
                $res=$plantInspectRecordWall->where($where)->delete();
                if($res){
                    $re['msg']="删除成功";
                }else{
                    $re['msg']="删除成功(壁板检验数据为空或者壁板维修数据删除错误)";
                }
            }else{
                $re['msg']="检查结果信息删除失败";
            }

        }else{
            $re['msg']="删除失败";
        }
        $this->ajaxReturn($re);
    }

    public function editInspectRecordWall(){
        $id=I("post.id","");
        $where['layerNO']=I("post.layerNO","");
        $where['testDate']=I("post.testDate","");
        $where['testMethod']=I("post.testMethod","");
        $where['testRate']=I("post.testRate","");
        $where['minThickness']=I("post.minThickness","");
        $verifyResult=I("post.verifyResult",'0');
        if($verifyResult==1){
            $re['msg']="已通过审核，不能再进行编辑或新增";
        }else {
            $plantTestRecordWall = D("tb_planttestrecordwall");
            if ($id !== '') {
                $where['id'] = $id;
                $PlantTestRecordWall = $plantTestRecordWall->save($where);
                if ($PlantTestRecordWall) {
                    $re['msg'] = "修改成功";
                } else {
                    $re['msg'] = "修改出错";

                }
            } else {
                $where['pid'] = I("post.pid", "");
                $PlantTestRecordWall = $plantTestRecordWall->add($where);
                if ($PlantTestRecordWall) {
                    $re['msg'] = "新增成功";
                } else {
                    $re['msg'] = "新增出错";

                }
            }
        }
        $this->ajaxReturn($re);
    }
    public function deleteInspectRecordWall(){
        $id=I("post.id","");
        $plantTestRecordWall=D("tb_planttestrecordwall");
        $PlantTestRecordWall=$plantTestRecordWall->delete($id);
        if($PlantTestRecordWall){
            $re['msg']="删除成功";
        }else{
            $re['msg']="删除出错";

        }
        $this->ajaxReturn($re);
    }
    public function editInspectRes(){
        $pid                    =   I("post.pid", "");
        $where['id']            =   I("post.id","");
        $where['checkResult']   =   I("post.checkResult","");
        $where['remark']        =   I("post.remark","");
        $verifyResult=I("post.verifyResult",'0');
        if($verifyResult==1){
            $re['msg']="已通过审核，不能再进行编辑或新增";
        }else {
            $plantTestRecordCheckResult = D("tb_planttestrecord_checkresult");
            $PlantTestRecordCheckResult = $plantTestRecordCheckResult->save($where);


            $whereRunRecordList['handleId']              =  $_SESSION['uid'];
            $whereRunRecordList['handler']               =  $_SESSION['realname'];
            $whereRunRecordList['handleType']            =  "编辑";
            $whereRunRecordList['HandleDate']            =  date("Y-m-d h:i:s",time());
            M('tb_planttestrecord')->where("id=$pid")->setField($whereRunRecordList);


            if ($PlantTestRecordCheckResult) {

                if (I("post.checkResult", "") == 0) {
                    M('tb_planttestrecord')->where("id=$pid")->setField("isAlarm",1);  //1表示报警
                }else{
                    $checkresultWhere['pid']         =$pid;
                    $checkresultWhere['checkResult'] =0;
                    $checkresultCount =M('tb_planttestrecord_checkresult')->where($checkresultWhere)->count();
                    if($checkresultCount==0){
                        M('tb_planttestrecord')->where("id=$pid")->setField("isAlarm",0);
                    }
                }

                $re['msg'] = "修改成功";
            } else {
                $re['msg'] = "修改出错";
            }
        }
        $this->ajaxReturn($re);
    }
    public function getLayerSelect(){
        $where['pid']=I("post.pid","");
        $wallboard=D("Plantwallboardinfo");
        $res['wallboard']=$wallboard->where($where)->field("layerNO")->order("layerNO")->select();
        if($res['wallboard']==''){
            $res['msg']  =  "该设备没有添加壁板，请前往基本信息管理添加设备壁板";
        }
        $contentWhere['pid']=I("post.contentId","");
        $content=D("dic_content");
        $res['testMethod']  =  $content->where($contentWhere)->select();
        $res['nowDate']     =  date('Y-m-d',time());


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