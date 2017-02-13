<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2016/9/27
 * Time: 23:28
 */
namespace Home\Controller;

class ScheduleController extends CommonController
{
    public function index()
    {
        //1、如果是具有审核权限的人员则显示待审核以及该人员所在厂区的
        //2、如果是普通的设备员则显示审核以后的结果消息
        $db     =   \Think\Db :: getInstance(C('RBAC_DB_DSN'));
        $access = \Org\Util\Rbac::getControllerAccess($_SESSION[C('USER_AUTH_KEY')]);
        $Access=$access[strtoupper(MODULE_NAME)][strtoupper(CONTROLLER_NAME)];

        if($Access['VERIFIED']['id']==1){
            //如果该用户有审核权限，则查询出需要审核的$verifyResult==0的记录；

            //1、储罐基本信息
            $sql='SELECT  PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,PlantInfo.handleType,PlantInfo.verifyResult,PlantInfo.handler,
                          PlantInfo.HandleDate,PlantInfo.handleType
                  FROM    tb_plantinfo AS PlantInfo
                  WHERE   PlantInfo.workshopId="'.$_SESSION['workshopId'].'"
                  AND     PlantInfo.verifyResult= 0'  ;
            $res1=$db->query($sql);
            foreach($res1 as $key => $v ){
                $schedule1[]                =    $v;
                $schedule1[$key]['href']    =    __MODULE__."/Manage/tankInfo.html?id=".$v['id'];
                $schedule1[$key]['title']   =    "常压储罐基本信息";
            }

            //2.原始测厚记录
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,
                             ThicknessOrigin.handleType,ThicknessOrigin.handler,ThicknessOrigin.HandleDate,ThicknessOrigin.verifyResult
                  FROM       tb_plantinfo AS PlantInfo
                  LEFT JOIN  tb_measurethicknessrecord_origin AS ThicknessOrigin
                  ON         PlantInfo.id  =  thicknessOrigin.pid
                  WHERE      PlantInfo.workshopId="'.$_SESSION['workshopId'].'"
                  AND        ThicknessOrigin.verifyResult=0 ';
            $res2=$db->query($sql);
            foreach($res2 as $key => $v ){
                $schedule2[]                =    $v;
                $schedule2[$key]['href']    =    __MODULE__."/Manage/thicknessOrigin.html?id=".$v['id'];
                $schedule2[$key]['title']   =    "测厚原始记录";
                $schedule2[$key]['pid']     =    "常压储罐基本信息";
            }

            //3.定点测厚管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,
                             Thickness.handleType,Thickness.handler,Thickness.HandleDate,Thickness.verifyResult
                  FROM       tb_plantinfo AS PlantInfo
                  LEFT JOIN  tb_measurethicknessrecord AS Thickness
                  ON         PlantInfo.id  =  Thickness.pid
                  WHERE      PlantInfo.workshopId="'.$_SESSION['workshopId'].'"
                  AND        Thickness.verifyResult= 0';
            $res3=$db->query($sql);
            foreach($res3 as $key => $v ){
                $schedule3[]                =    $v;
                $schedule3[$key]['href']    =    __MODULE__."/Inspect/thickness.html?id=".$v['id'];
                $schedule3[$key]['title']   =    "定点测厚记录";
            }

            //4.运行记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,
                             RunRecord.handleType,RunRecord.handler,RunRecord.HandleDate,RunRecord.verifyResult
                  FROM       tb_plantinfo       AS   PlantInfo
                  LEFT JOIN  tb_runrecordlist   AS   RunRecord
                  ON         PlantInfo.id            =  RunRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        RunRecord.verifyResult  = 0';
            $res4=$db->query($sql);
            foreach($res4 as $key => $v ){
                $schedule4[]                =    $v;
                $schedule4[$key]['href']    =    __MODULE__."/RunRecord/index.html?id=".$v['id'];
                $schedule4[$key]['title']   =    "运行记录管理";
            }

            //5.日常维护管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,
                             DailyRecord.handleType,DailyRecord.handler,DailyRecord.HandleDate,DailyRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_plantdailymaintainancerecord   AS   DailyRecord
                  ON         PlantInfo.id            =  DailyRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        DailyRecord.verifyResult  = 0';
            $res5=$db->query($sql);
            foreach($res5 as $key => $v ){
                $schedule5[]                =    $v;
                $schedule5[$key]['href']    =    __MODULE__."/DailyManagement/index.html?id=".$v['id'];
                $schedule5[$key]['title']   =    "日常维护管理";
            }

            //6.检验记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,
                             TestRecord.handleType,TestRecord.handler,TestRecord.HandleDate,TestRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_planttestrecord                AS   TestRecord
                  ON         PlantInfo.id            =  TestRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        TestRecord.verifyResult  = 0';
            $res6=$db->query($sql);
            foreach($res6 as $key => $v ){
                $schedule6[]                =    $v;
                $schedule6[$key]['href']    =    __MODULE__."/InspectRecord/index.html?id=".$v['id'];
                $schedule6[$key]['title']   =    "检验记录管理";
            }

            //7.维修记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,
                             MaintanceRecord.handleType,MaintanceRecord.handler,MaintanceRecord.HandleDate,MaintanceRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_plantmaintancerecord           AS   MaintanceRecord
                  ON         PlantInfo.id            =  MaintanceRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        MaintanceRecord.verifyResult = 0';
            $res7=$db->query($sql);
            foreach($res7 as $key => $v ){
                $schedule7[]                =    $v;
                $schedule7[$key]['href']    =    __MODULE__."/MaintenanceRecord/index.html?id=".$v['id'];
                $schedule7[$key]['title']   =    "维修记录管理";
            }
        }else{
            //如果该用户没有审核权限则返回和他相关的审核结果

            //1、储罐基本信息
            $sql1='SELECT  PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,PlantInfo.handleType,PlantInfo.verifyResult,PlantInfo.handler,
                          PlantInfo.HandleDate,PlantInfo.handleType
                  FROM    tb_plantinfo AS PlantInfo
                  WHERE   PlantInfo.workshopId="'.$_SESSION['workshopId'].'"
                  AND     PlantInfo.handleId= '.$_SESSION[C('USER_AUTH_KEY')].'
                  AND     PlantInfo.verifyResult = 2 ';
            $res1=$db->query($sql1);
            foreach($res1 as $key => $v ){
                $schedule1[]                =    $v;
                $schedule1[$key]['href']    =    __MODULE__."/Manage/tankInfo.html?id=".$v['id'];
                $schedule1[$key]['title']   =    "常压储罐基本信息";
            }

            //2.原始测厚记录
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,
                             ThicknessOrigin.handleType,ThicknessOrigin.handler,ThicknessOrigin.HandleDate,ThicknessOrigin.verifyResult
                  FROM       tb_plantinfo AS PlantInfo
                  LEFT JOIN  tb_measurethicknessrecord_origin AS ThicknessOrigin
                  ON         PlantInfo.id  =  thicknessOrigin.pid
                  WHERE      PlantInfo.workshopId="'.$_SESSION['workshopId'].'"
                  AND        ThicknessOrigin.handleId='.$_SESSION[C('USER_AUTH_KEY')].'
                  AND        ThicknessOrigin.verifyResult = 2 ';
            $res2=$db->query($sql);
            foreach($res2 as $key => $v ){
                $schedule2[]                =    $v;
                $schedule2[$key]['href']    =    __MODULE__."/Manage/thicknessOrigin.html?id=".$v['id'];
                $schedule2[$key]['title']   =    "测厚原始记录";
                $schedule2[$key]['pid']     =    "常压储罐基本信息";
            }

            //3.定点测厚管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,
                             Thickness.handleType,Thickness.handler,Thickness.HandleDate,Thickness.verifyResult
                  FROM       tb_plantinfo AS PlantInfo
                  LEFT JOIN  tb_measurethicknessrecord AS Thickness
                  ON         PlantInfo.id  =  Thickness.pid
                  WHERE      PlantInfo.workshopId="'.$_SESSION['workshopId'].'"
                  AND        Thickness.handleId= '.$_SESSION[C('USER_AUTH_KEY')].'
                  AND        Thickness.verifyResult = 2 ';
            $res3=$db->query($sql);
            foreach($res3 as $key => $v ){
                $schedule3[]                =    $v;
                $schedule3[$key]['href']    =    __MODULE__."/Inspect/thickness.html?id=".$v['id'];
                $schedule3[$key]['title']   =    "定点测厚记录";
            }

            //4.运行记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,
                             RunRecord.handleType,RunRecord.handler,RunRecord.HandleDate,RunRecord.verifyResult
                  FROM       tb_plantinfo       AS   PlantInfo
                  LEFT JOIN  tb_runrecordlist   AS   RunRecord
                  ON         PlantInfo.id            =  RunRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        RunRecord.handleId  = '.$_SESSION[C('USER_AUTH_KEY')].'
                  AND        RunRecord.verifyResult = 2 ';
            $res4=$db->query($sql);
            foreach($res4 as $key => $v ){
                $schedule4[]                =    $v;
                $schedule4[$key]['href']    =    __MODULE__."/RunRecord/thickness.html?id=".$v['id'];
                $schedule4[$key]['title']   =    "运行记录管理";
            }

            //5.日常维护管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,
                             DailyRecord.handleType,DailyRecord.handler,DailyRecord.HandleDate,DailyRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_plantdailymaintainancerecord   AS   DailyRecord
                  ON         PlantInfo.id            =  DailyRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        DailyRecord.handleId  = '.$_SESSION[C('USER_AUTH_KEY')].'
                  AND        DailyRecord.verifyResult = 2 ';
            $res5=$db->query($sql);
            foreach($res5 as $key => $v ){
                $schedule5[]                =    $v;
                $schedule5[$key]['href']    =    __MODULE__."/DailyManagement/index.html?id=".$v['id'];
                $schedule5[$key]['title']   =    "日常维护管理";
            }

            //6.检验记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,
                             TestRecord.handleType,TestRecord.handler,TestRecord.HandleDate,TestRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_planttestrecord                AS   TestRecord
                  ON         PlantInfo.id            =  TestRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        TestRecord.handleId  = '.$_SESSION[C('USER_AUTH_KEY')].'
                  AND        TestRecord.verifyResult = 2 ';
            $res6=$db->query($sql);
            foreach($res6 as $key => $v ){
                $schedule6[]                =    $v;
                $schedule6[$key]['href']    =    __MODULE__."/InspectRecord/index.html?id=".$v['id'];
                $schedule6[$key]['title']   =    "检验记录管理";
            }

            //6.维修记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,PlantInfo.workshopId,
                             MaintanceRecord.handleType,MaintanceRecord.handler,MaintanceRecord.HandleDate,MaintanceRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_plantmaintancerecord           AS   MaintanceRecord
                  ON         PlantInfo.id            =  MaintanceRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        MaintanceRecord.handleId  ='.$_SESSION[C('USER_AUTH_KEY')].'
                  AND        MaintanceRecord.verifyResult = 2 ';
            $res7=$db->query($sql);
            foreach($res7 as $key => $v ){
                $schedule7[]                =    $v;
                $schedule7[$key]['href']    =    __MODULE__."/MaintenanceRecord/index.html?id=".$v['id'];
                $schedule7[$key]['title']   =    "维修记录管理";
            }

        }
        foreach($schedule1 as $key => $v ){
            $schedule[]=$v;
        }
        foreach($schedule2 as $key => $v ){
            $schedule[]=$v;
        }
        foreach($schedule3 as $key => $v ){
            $schedule[]=$v;
        }
        foreach($schedule4 as $key => $v ){
            $schedule[]=$v;
        }
        foreach($schedule5 as $key => $v ){
            $schedule[]=$v;
        }
        foreach($schedule6 as $key => $v ){
            $schedule[]=$v;
        }
        foreach($schedule7 as $key => $v ){
            $schedule[]=$v;
        }
        $this->assign("schedule",$schedule);
        $this->display();
    }

    public function scheduleManage(){
        $this->display();
    }

    public function missionNotice(){
        $mission=D("tb_mission");
        $Mission=$mission->where('status=1')->select();
        $nowDate=date("Y-m-d",time());
        foreach($Mission as $Mi){
            $circle=$Mi['circle'];
            switch($circle){
                case 0: //一次
                    $date=floor((strtotime($Mi['nextDate'])-strtotime($nowDate))/86400);
                    if($date<0){
                        $where0['id']      =  $Mi['id'];
                        $where0['status']  =  0;
                        $mission->save($where0);
                    }elseif($date>=0 && $date<7){
                        $notice['title'][]     =  $Mi['title'];
                        $notice['circle'][]    =  $Mi['circle'];
                        $notice['nextDate'][]  =  $Mi['nextDate'];
                        $notice['remark'][]    =  $Mi['remark'];
                    }
                    break;
                case 1: //每天
                    $where1['id']        =  $Mi['id'];
                    $where1['nextDate']  =  date("Y-m-d",strtotime("$nowDate +1 day"));
                    $mission->save($where1);

                    $notice['title'][]    =  $Mi['title'];
                    $notice['circle'][]    =  $Mi['circle'];
                    $notice['nextDate'][]  =  $nowDate;
                    $notice['remark'][]    =  $Mi['remark'];
                    break;
                case 2: //每周
                    $date        =  floor((strtotime($Mi['nextDate'])-strtotime($nowDate))/86400);
                    $nextDate    =  $Mi['nextDate'];
                    if($date>=0 && $date<=3){   //提前三天提醒
                        $notice['title'][]     =  $Mi['title'];
                        $notice['circle'][]    =  $Mi['circle'];
                        $notice['nextDate'][]  =  $Mi['nextDate'];
                        $notice['remark'][]    =  $Mi['remark'];
                    }elseif($date<0){
                        $plusDay=ceil(abs($date/7));
                        $nextDate  =  date("Y-m-d",strtotime("$nextDate +$plusDay week"));
                        $date      =  floor((strtotime($nextDate)-strtotime($nowDate))/86400);
                        //刷新巡检时间
                        $where2['id']       = $Mi['id'];
                        $where2['nextDate'] = $nextDate;
                        $mission->save($where2);

                        if($date>=0 && $date<=3) {
                            $notice['title'][]     =  $Mi['title'];
                            $notice['circle'][]    =  $Mi['circle'];
                            $notice['nextDate'][]  =  $nextDate;
                            $notice['remark'][]    =  $Mi['remark'];
                        }
                    }
                    break;
                case 3: //每月
                    $date        =  floor((strtotime($Mi['nextDate'])-strtotime($nowDate))/86400);
                    $nextDate    =  $Mi['nextDate'];
                    if($date>=0 && $date<=10){   //提前十天提醒
                        $notice['title'][]     =  $Mi['title'];
                        $notice['circle'][]    =  $Mi['circle'];
                        $notice['nextDate'][]  =  $Mi['nextDate'];
                        $notice['remark'][]    =  $Mi['remark'];
                    }elseif($date<0){
                        $plusDay=ceil(abs($date/30));
                        $nextDate  =  date("Y-m-d",strtotime("$nextDate +$plusDay month"));
                        $date      =  floor((strtotime($nextDate)-strtotime($nowDate))/86400);
                        //刷新巡检时间
                        $where3['id']       = $Mi['id'];
                        $where3['nextDate'] = $nextDate;
                        $mission->save($where3);
                        if($date>=0 && $date<=10) {
                            $notice['title'][]     =  $Mi['title'];
                            $notice['circle'][]    =  $Mi['circle'];
                            $notice['nextDate'][]  =  $nextDate;
                            $notice['remark'][]    =  $Mi['remark'];
                        }
                    }
                    break;
                case 4: //每年
                    $date        =  floor((strtotime($Mi['nextDate'])-strtotime($nowDate))/86400);
                    $nextDate    =  $Mi['nextDate'];
                    if($date>=0 && $date<=30){   //提前一个月提醒
                        $notice['title'][]     =  $Mi['title'];
                        $notice['circle'][]    =  $Mi['circle'];
                        $notice['nextDate'][]  =  $Mi['nextDate'];
                        $notice['remark'][]    =  $Mi['remark'];
                    }elseif($date<0){
                        $plusDay=ceil(abs($date/365));
                        $nextDate  =  date("Y-m-d",strtotime("$nextDate +$plusDay year"));
                        $date      =  floor((strtotime($nextDate)-strtotime($nowDate))/86400);

                        //刷新巡检时间
                        $where4['id']       = $Mi['id'];
                        $where4['nextDate'] = $nextDate;
                        $mission->save($where4);
                        if($date>=0 && $date<=30) {
                            $notice['title'][]     =  $Mi['title'];
                            $notice['circle'][]    =  $Mi['circle'];
                            $notice['nextDate'][]  =  $nextDate;
                            $notice['remark'][]    =  $Mi['remark'];
                        }
                    }
                    break;
            }
        }
        for($i=0;$i<count($notice['title']);$i++){
            $Notice[$i]['title']     =  $notice['title'][$i];
            $Notice[$i]['circle']    =  $notice['circle'][$i];
            $Notice[$i]['nextDate']  =  $notice['nextDate'][$i];
            $Notice[$i]['remark']    =  $notice['remark'][$i];
        }
        $this->assign("notice",$Notice);

        $this->display();
    }

    public function missionList(){
        $mission = D("tb_mission");
        $Mission=$mission->select();
        $this->assign("Mission",$Mission);
        $this->display();
    }
    public function deleteMission(){
        $id=I("post.id","");
        $mission = D("tb_mission");
        $Mission=$mission->delete($id);
        if($Mission){
            $this->ajaxReturn(array(
                "code" => 100,
                "msg"  => "删除成功"
            ));
        }else{
            $this->ajaxReturn(array(
                "code" => 200,
                "msg"  => "删除错误"
            ));
        }
    }

    public function handleSchedule(){
        $id=I("post.id","");
        $schedule=D("tb_schedule");
        $where['id']=$id;
        $where['verifyResult']=1;
        $Schedule=$schedule->save($where);
        if($Schedule){
            $this->ajaxReturn(array(
                "code" => 100,
                "msg"  => "处理成功"
            ));
        }else{
            $this->ajaxReturn(array(
                "code" => 200,
                "msg"  => "处理错误"
            ));
        }
    }

    public function deleteSchedule(){
        $id=I("post.id","");
        $schedule=D("tb_schedule");
        $Schedule=$schedule->delete($id);
        if($Schedule){
            $this->ajaxReturn(array(
                "code" => 100,
                "msg"  => "删除成功"
            ));
        }else{
            $this->ajaxReturn(array(
                "code" => 200,
                "msg"  => "删除失败"
            ));
        }
    }
}