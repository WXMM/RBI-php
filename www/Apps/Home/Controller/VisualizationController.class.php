<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/23
 * Time: 9:31
 */
namespace Home\Controller;
use Think\Controller;

class VisualizationController extends Controller
{
    public function index(){
        $schedule=D("tb_schedule");
        $where['verifyResult']=0;
        if($_SESSION['workshopId']=="总公司"){
            $ScheduleCount=$schedule->where($where)->count();
        }else{
            $where['workshopId']=$_SESSION['workshopId'];
            $ScheduleCount=$schedule->where($where)->count();
        }

        $this->assign("ScheduleCount",$ScheduleCount);

        $this->display();
    }
    public function oneLevelMap(){
        $db     =   \Think\Db :: getInstance(C('RBAC_DB_DSN'));
        if($_SESSION['workshopId']=="总公司"){
            $sql=    'SELECT     *
                  FROM       tb_gisdata    AS  GisData
                  WHERE      GisData.level=1';
        }else{
            $sql=    'SELECT     *
                  FROM       tb_gisdata    AS  GisData
                  WHERE      GisData.level=1
                  AND        GisData.plantName="'.$_SESSION['workshopId'].'"';
        }
        $res=$db->query($sql);
        foreach($res as $key => $v ){
            $GisData[]                =    $v;
        }
        for($i=0;$i<count($GisData);$i++){


            //4.运行记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id,PlantInfo.workshopId,
                             RunRecord.handleType,RunRecord.handler,RunRecord.HandleDate AS addTime,RunRecord.isAlarm,
                             RunRecord.verifyResult
                  FROM       tb_plantinfo       AS   PlantInfo
                  LEFT JOIN  tb_runrecordlist   AS   RunRecord
                  ON         PlantInfo.id            =  RunRecord.pid
                  WHERE      PlantInfo.workshopId="'.$GisData[$i]["plantName"].'" and RunRecord.isAlarm=1  and RunRecord.isShowAlarm=1';
            $res4=$db->query($sql);
            foreach($res4 as $key => $v ){
                $schedule4[$i][]                =    $v;
                $schedule4[$i][$key]['href']    =    __MODULE__."/RunRecord/index.html?id=".$v['id'];
                $schedule4[$i][$key]['alarmSource']   =    "运行记录管理";
            }

            //5.日常维护管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id,PlantInfo.workshopId,
                             DailyRecord.handleType,DailyRecord.handler,DailyRecord.HandleDate AS addTime,DailyRecord.isAlarm,
                             DailyRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_plantdailymaintainancerecord   AS   DailyRecord
                  ON         PlantInfo.id            =  DailyRecord.pid
                  WHERE      PlantInfo.workshopId="'.$GisData[$i]["plantName"].'" and DailyRecord.isAlarm=1 and DailyRecord.isShowAlarm=1';
            $res5=$db->query($sql);
            foreach($res5 as $key => $v ){
                $schedule5[$i][]                =    $v;
                $schedule5[$i][$key]['href']    =    __MODULE__."/DailyManagement/index.html?id=".$v['id'];
                $schedule5[$i][$key]['alarmSource']   =    "日常维护管理";
            }

            //6.检验记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id,PlantInfo.workshopId,
                             TestRecord.handleType,TestRecord.handler,TestRecord.HandleDate AS addTime,TestRecord.isAlarm,
                             TestRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_planttestrecord                AS   TestRecord
                  ON         PlantInfo.id            =  TestRecord.pid
                  WHERE      PlantInfo.workshopId="'.$GisData[$i]["plantName"].'" and TestRecord.isAlarm=1 and TestRecord.isShowAlarm=1';
            $res6=$db->query($sql);
            foreach($res6 as $key => $v ){
                $schedule6[$i][]                =    $v;
                $schedule6[$i][$key]['href']    =    __MODULE__."/InspectRecord/index.html?id=".$v['id'];
                $schedule6[$i][$key]['alarmSource']   =    "检验记录管理";
            }
            //7.风险计算结果
            $sql='SELECT         PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id,PlantInfo.workshopId,
                             RiskList.isAlarm,RiskList.countDate AS   addTime
                  FROM       tb_plantinfo                        AS   PlantInfo
                  LEFT JOIN  tb_risklist                         AS   RiskList
                  ON         PlantInfo.id            =  RiskList.pid
                  WHERE      PlantInfo.workshopId="'.$GisData[$i]["plantName"].'" and RiskList.isAlarm=1 and RiskList.isShowAlarm=1';
            $res8=$db->query($sql);
            foreach($res8 as $key => $v ){
                $schedule8[$i][]                =    $v;
                $schedule8[$i][$key]['href']    =    __MODULE__."/RiskCalculation/tankCal.html?id=".$v['id'];
                $schedule8[$i][$key]['alarmSource']   =    "风险计算结果";
            }
            foreach($schedule4[$i] as $key => $v ){
                $AlertRecord[$i][]=$v;
            }
            foreach($schedule5[$i] as $key => $v ){
                $AlertRecord[$i][]=$v;
            }
            foreach($schedule6[$i] as $key => $v ){
                $AlertRecord[$i][]=$v;
            }
            foreach($schedule8[$i] as $key => $v ){
                $AlertRecord[$i][]=$v;
            }






//            $sql='SELECT    PlantAlarm.addTime,PlantAlarm.alarmSource,PlantInfo.plantNO
//                  FROM       tb_plantalarm AS  PlantAlarm
//                  RIGHT JOIN tb_plantinfo  AS PlantInfo
//                  ON         PlantInfo.id   =  PlantAlarm.plantId
//                  WHERE      PlantInfo.workshopId="'.$GisData[$i]["plantName"].'" and PlantAlarm.status=0';
//
//            $res=$db->query($sql);
//            foreach($res as $key => $v ){
//                $AlertRecord[$i][]    =    $v;
//            }


            if($AlertRecord[$i]==null){
                $GisData[$i]["alertRecordId"]=0;
                $GisData[$i]["alertRecord"]="";
            }else{
                $GisData[$i]["alertRecordId"]=1;
                $GisData[$i]["alertRecord"]=$AlertRecord[$i];
            }
        }
        $this->assign("GisData",$GisData);


        $workshop=D("dic_workshop");
        $Workshop=$workshop->field("workshopId")->select();
        $this->assign("workshop",$Workshop);

        $this->display();
    }
    public function twoLevelMap(){
        $id=I("get.id","");
        $db     =   \Think\Db :: getInstance(C('RBAC_DB_DSN'));
        $sql=    'SELECT     *
                  FROM       tb_gisdata    AS  GisData
                  WHERE      GisData.level=2 AND GisData.pid='.$id;
        $res=$db->query($sql);
        foreach($res as $key => $v ){
            $GisData[]                =    $v;
        }
        $sql=    'SELECT     *
                  FROM       tb_gisdata    AS  GisData
                  WHERE      GisData.id='.$id;
        $res=$db->query($sql);
        foreach($res as $key => $v ){
            $GisDataFa[]                =    $v;
        }
        for($i=0;$i<count($GisData);$i++){



            //4.运行记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id,PlantInfo.workshopId,
                             RunRecord.handleType,RunRecord.handler,RunRecord.HandleDate AS addTime,RunRecord.isAlarm,
                             RunRecord.verifyResult
                  FROM       tb_plantinfo       AS   PlantInfo
                  LEFT JOIN  tb_runrecordlist   AS   RunRecord
                  ON         PlantInfo.id            =  RunRecord.pid
                  WHERE      PlantInfo.areaId="'.$GisData[$i]["plantName"].'"
                  AND        RunRecord.isAlarm=1 AND RunRecord.isShowAlarm=1
                  AND        PlantInfo.workshopId="'.$GisDataFa[0]["plantName"].'"';
            $res4=$db->query($sql);

            foreach($res4 as $key => $v ){
                $schedule4[$i][]                =    $v;
                $schedule4[$i][$key]['href']    =    __MODULE__."/RunRecord/index.html?id=".$v['id'];
                $schedule4[$i][$key]['alarmSource']   =    "运行记录管理";
            }
            //5.日常维护管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id,PlantInfo.workshopId,
                             DailyRecord.handleType,DailyRecord.handler,DailyRecord.HandleDate AS addTime,DailyRecord.isAlarm,
                             DailyRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_plantdailymaintainancerecord   AS   DailyRecord
                  ON         PlantInfo.id            =  DailyRecord.pid
                  WHERE      PlantInfo.areaId="'.$GisData[$i]["plantName"].'"
                  and        DailyRecord.isAlarm=1 AND DailyRecord.isShowAlarm=1
                  AND        PlantInfo.workshopId="'.$GisDataFa[0]["plantName"].'" ';
            $res5=$db->query($sql);
            foreach($res5 as $key => $v ){
                $schedule5[$i][]                =    $v;
                $schedule5[$i][$key]['href']    =    __MODULE__."/DailyManagement/index.html?id=".$v['id'];
                $schedule5[$i][$key]['alarmSource']   =    "日常维护管理";
            }

            //6.检验记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id,PlantInfo.workshopId,
                             TestRecord.handleType,TestRecord.handler,TestRecord.HandleDate AS addTime,TestRecord.isAlarm,
                             TestRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_planttestrecord                AS   TestRecord
                  ON         PlantInfo.id            =  TestRecord.pid
                  WHERE      PlantInfo.areaId="'.$GisData[$i]["plantName"].'"
                  and        TestRecord.isAlarm=1 AND TestRecord.isShowAlarm=1
                  AND        PlantInfo.workshopId="'.$GisDataFa[0]["plantName"].'" ';
            $res6=$db->query($sql);
            foreach($res6 as $key => $v ){
                $schedule6[$i][]                =    $v;
                $schedule6[$i][$key]['href']    =    __MODULE__."/InspectRecord/index.html?id=".$v['id'];
                $schedule6[$i][$key]['alarmSource']   =    "检验记录管理";
            }
            //7.风险计算结果
            $sql='SELECT         PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id,PlantInfo.workshopId,
                             RiskList.isAlarm,RiskList.countDate AS addTime
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_risklist                       AS   RiskList
                  ON         PlantInfo.id            =  RiskList.pid
                  WHERE      PlantInfo.areaId="'.$GisData[$i]["plantName"].'"
                  and        RiskList.isAlarm=1 AND RiskList.isShowAlarm=1
                  AND        PlantInfo.workshopId="'.$GisDataFa[0]["plantName"].'" ';
            $res8=$db->query($sql);
            foreach($res8 as $key => $v ){
                $schedule8[$i][]                =    $v;
                $schedule8[$i][$key]['href']    =    __MODULE__."/RiskCalculation/tankCal.html?id=".$v['id'];
                $schedule8[$i][$key]['alarmSource']   =    "风险计算结果";
            }
            foreach($schedule4[$i] as $key => $v ){
                $AlertRecord[$i][]=$v;
            }
            foreach($schedule5[$i] as $key => $v ){
                $AlertRecord[$i][]=$v;
            }
            foreach($schedule6[$i] as $key => $v ){
                $AlertRecord[$i][]=$v;
            }
            foreach($schedule8[$i] as $key => $v ){
                $AlertRecord[$i][]=$v;
            }


//            $sql='SELECT     PlantAlarm.addTime,PlantAlarm.alarmSource,PlantInfo.plantNO
//                  FROM       tb_plantalarm AS  PlantAlarm
//                  RIGHT JOIN tb_plantinfo  AS PlantInfo
//                  ON         PlantInfo.id   =  PlantAlarm.plantId
//                  WHERE      PlantInfo.areaId="'.$GisData[$i]["plantName"].'"
//                  and        PlantAlarm.status=0
//                  AND        PlantInfo.workshopId="'.$GisDataFa[0]["plantName"].'" ';
//
//            $res=$db->query($sql);
//            foreach($res as $key => $v ){
//                $AlertRecord[$i][]    =    $v;
//            }
            if($AlertRecord[$i]==null){
                $GisData[$i]["alertRecordId"]=0;
                $GisData[$i]["alertRecord"]="";
            }else{
                $GisData[$i]["alertRecordId"]=1;
                $GisData[$i]["alertRecord"]=$AlertRecord[$i];
            }
        }
//        var_dump($GisData[1]);
        $this->assign("GisData",$GisData);

        $this->assign("GisDataFa",$GisDataFa[0]);
        $area=D("dic_area");
        $whereArea['workshopId']=$GisDataFa[0]['plantName'];
        $Area=$area->where($whereArea)->select();
        $this->assign("Area",$Area);
        $this->display();
    }

    public function threeLevelMap(){
        $id=I("get.id","");

        $db     =   \Think\Db :: getInstance(C('RBAC_DB_DSN'));
        $sql=    'SELECT     *
                  FROM       tb_gisdata    AS  GisData
                  WHERE      GisData.level=3 AND GisData.pid='.$id;
        $res=$db->query($sql);
        foreach($res as $key => $v ){
            $GisData[]                =    $v;
        }

        $sql=    'SELECT     *
                  FROM       tb_gisdata    AS  GisData
                  WHERE      GisData.id='.$id;
        $res=$db->query($sql);
        foreach($res as $key => $v ){
            $GisDataFa[]                =    $v;
        }

        $gpid=$GisDataFa[0]['pid'];
        $sql=    'SELECT     *
                  FROM       tb_gisdata    AS  GisData
                  WHERE      GisData.id='.$gpid;
        $res=$db->query($sql);
        foreach($res as $key => $v ){
            $GisDataGFa[]   =  $v;
        }
        $GisDataFa[0]['gPlantName']=$GisDataGFa[0]['plantName'];
        $this->assign("GisDateFa",$GisDataFa[0]);

        for($i=0;$i<count($GisData);$i++){



            //4.运行记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id,PlantInfo.workshopId,
                             RunRecord.handleType,RunRecord.handler,RunRecord.HandleDate AS addTime,RunRecord.isAlarm,
                             RunRecord.verifyResult
                  FROM       tb_plantinfo       AS   PlantInfo
                  LEFT JOIN  tb_runrecordlist   AS   RunRecord
                  ON         PlantInfo.id            =  RunRecord.pid
                  WHERE      PlantInfo.areaId="'.$GisDataFa[0]["plantName"].'"
                  AND        PlantInfo.workshopId="'.$GisDataGFa[0]["plantName"].'"
                  AND        PlantInfo.plantNO="'.$GisData[$i]["plantName"].'"
                  AND        RunRecord.isAlarm=1 AND RunRecord.isShowAlarm=1';
            $res4=$db->query($sql);

            foreach($res4 as $key => $v ){
                $schedule4[$i][]                =    $v;
                $schedule4[$i][$key]['href']    =    __MODULE__."/RunRecord/index.html?id=".$v['id'];
                $schedule4[$i][$key]['alarmSource']   =    "运行记录管理";
            }
            //5.日常维护管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id,PlantInfo.workshopId,
                             DailyRecord.handleType,DailyRecord.handler,DailyRecord.HandleDate AS addTime,DailyRecord.isAlarm,
                             DailyRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_plantdailymaintainancerecord   AS   DailyRecord
                  ON         PlantInfo.id            =  DailyRecord.pid
                  WHERE      PlantInfo.areaId="'.$GisDataFa[0]["plantName"].'"
                  AND        PlantInfo.workshopId="'.$GisDataGFa[0]["plantName"].'"
                  AND        PlantInfo.plantNO="'.$GisData[$i]["plantName"].'"
                  AND        DailyRecord.isAlarm=1 AND DailyRecord.isShowAlarm=1';
            $res5=$db->query($sql);
            foreach($res5 as $key => $v ){
                $schedule5[$i][]                =    $v;
                $schedule5[$i][$key]['href']    =    __MODULE__."/DailyManagement/index.html?id=".$v['id'];
                $schedule5[$i][$key]['alarmSource']   =    "日常维护管理";
            }

            //6.检验记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id,PlantInfo.workshopId,
                             TestRecord.handleType,TestRecord.handler,TestRecord.HandleDate AS addTime,TestRecord.isAlarm,
                             TestRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_planttestrecord                AS   TestRecord
                  ON         PlantInfo.id            =  TestRecord.pid
                  WHERE      PlantInfo.areaId="'.$GisDataFa[0]["plantName"].'"
                  AND        PlantInfo.workshopId="'.$GisDataGFa[0]["plantName"].'"
                  AND        PlantInfo.plantNO="'.$GisData[$i]["plantName"].'"
                  AND        TestRecord.isAlarm=1 AND TestRecord.isShowAlarm=1';
            $res6=$db->query($sql);
            foreach($res6 as $key => $v ){
                $schedule6[$i][]                =    $v;
                $schedule6[$i][$key]['href']    =    __MODULE__."/InspectRecord/index.html?id=".$v['id'];
                $schedule6[$i][$key]['alarmSource']   =    "检验记录管理";
            }
            //8.风险计算结果
            $sql='SELECT         PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id,PlantInfo.workshopId,
                             RiskList.isAlarm,RiskList.countDate AS addTime
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_risklist                       AS   RiskList
                  ON         PlantInfo.id            =  RiskList.pid
                  WHERE      PlantInfo.areaId="'.$GisDataFa[0]["plantName"].'"
                  AND        PlantInfo.workshopId="'.$GisDataGFa[0]["plantName"].'"
                  AND        PlantInfo.plantNO="'.$GisData[$i]["plantName"].'"
                  AND        RiskList.isAlarm=1 AND RiskList.isShowAlarm=1';
            $res8=$db->query($sql);
            foreach($res8 as $key => $v ){
                $schedule8[$i][]                =    $v;
                $schedule8[$i][$key]['href']    =    __MODULE__."/RiskCalculation/tankCal.html?id=".$v['id'];
                $schedule8[$i][$key]['alarmSource']   =    "风险计算结果";
            }
            foreach($schedule4[$i] as $key => $v ){
                $AlertRecord[$i][]=$v;
            }
            foreach($schedule5[$i] as $key => $v ){
                $AlertRecord[$i][]=$v;
            }
            foreach($schedule6[$i] as $key => $v ){
                $AlertRecord[$i][]=$v;
            }
            foreach($schedule8[$i] as $key => $v ){
                $AlertRecord[$i][]=$v;
            }


//            $sql='SELECT     PlantAlarm.addTime,PlantAlarm.alarmSource,PlantInfo.plantNO
//                  FROM       tb_plantalarm AS  PlantAlarm
//                  RIGHT JOIN tb_plantinfo  AS  PlantInfo
//                  ON         PlantInfo.id   =  PlantAlarm.plantId
//                  WHERE      PlantInfo.areaId="'.$GisDataFa[0]["plantName"].'"
//                  AND        PlantInfo.workshopId="'.$GisDataGFa[0]["plantName"].'"
//                  AND        PlantInfo.plantNO="'.$GisData[$i]["plantName"].'"
//                  AND        PlantAlarm.status=0';
//
//            $res=$db->query($sql);
//            foreach($res as $key => $v ){
//                $AlertRecord[$i][]    =    $v;
//            }
            if($AlertRecord[$i]==null){
                $GisData[$i]["alertRecordId"]=0;
                $GisData[$i]["alertRecord"]="";
            }else{
                $GisData[$i]["alertRecordId"]=1;
                $GisData[$i]["alertRecord"]=$AlertRecord[$i];
            }
        }
        $this->assign("GisData",$GisData);
        $this->assign("GisDataFa",$GisDataFa[0]);



        $plant=D("tb_plantinfo");
        $where['workshopId']=$GisDataGFa[0]['plantName'];
        $where['areaId']=$GisDataFa[0]['plantName'];
        $Plant=$plant->where($where)->field("plantNO")->select();
        $this->assign("Plant",$Plant);
        $this->display();
    }
    public function addNewPosition(){
        $where['pid']=intval(I("post.pid",""));
        $where['level']=intval(I("post.level",""));
        $where['plantName']=I("post.plantName","");
        $where['positionX']=intval(I("post.positionX",""));
        $where['positionY']=intval(I("post.positionY",""));
        $where['positionRadius']=intval(I("post.positionRadius",""));
        $where['remark']=I("post.remark","");
        $gisData=D("tb_gisdata");
        $data['pid']=intval(I("post.pid",""));;
        $data['plantName']=I("post.plantName","");
        $id=$gisData->where($data)->getField("id");
        if($id!==null){
            $where['id']=$id;
            $GisData=$gisData->save($where);
            if($GisData){
                $re['msg']="更新成功";
            }else{
                $re['msg']="更新失败";
            }
        }else{
            $GisData=$gisData->add($where);
            if($GisData){
                $re['msg']="添加成功";
            }else{
                $re['msg']="添加失败";
            }
        }
        $this->ajaxReturn($re);
    }
    public function getPositionInfo(){
        $level=I("post.level","");
        $pointerX=I("post.pointerX","");
        $pointerY=I("post.pointerY","");
        $re['msg']="青岛分公司";
        $this->ajaxReturn($re);
    }
    //    文件上传操作
    public function upload(){

        $add['id']=I('post.id','');
        $add['subMapName']=I('post.subMapName','');
        $config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    './Public/',
            'savePath'   =>    'Home/img/gisMap/',
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg','xlsx'),
            'autoSub'    =>    false,
            'subName'    =>    array('date','Ymd'),
        );
        $upload=new \Think\Upload($config);
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $re['msg']=$upload->getError();
        }else{
            $root=__ROOT__;
            $add['subMapUrl']=$root."/Public/".$info['file']["savepath"].$info['file']["savename"];
            $gisData=D("tb_gisdata");
            $GisData=$gisData->save($add);
            // 上传成功 获取上传文件信息
            if($GisData){
                $re['msg']="上传成功";
            }else{
                $re['msg']="上传成功（更新地图信息失败）";
            }
        }
        $this->ajaxReturn($re);
    }
}