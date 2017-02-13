<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/4
 * Time: 16:53
 */
namespace Home\Controller;
class AlertRecordManageController extends CommonController
{
    public function index(){
        $this->display();
    }
    public function AlertRecordList(){
        $area = I('get.area','');
        $pl   = I('get.pl','');
        $db     =   \Think\Db :: getInstance(C('RBAC_DB_DSN'));

        if($_SESSION['workshopId']=="总公司"){
            $where=    'AND      PlantInfo.factoryId="燃料油总公司"';
        }else{
            $where=    'AND      PlantInfo.workshopId="'.$_SESSION['workshopId'].'"';
        }
        if(I('get.fac','')!==''){
            $where=    'AND      PlantInfo.workshopId="'.$_SESSION['workshopId'].'"
            ';
        }
        if(I('get.wor','')!==''){
            $where=    'AND     PlantInfo.workshopId="'.$_SESSION['workshopId'].'"
            ';
        }
        if(I('get.area','')!=='') {
            $where=    'AND      PlantInfo.workshopId="'.$_SESSION['workshopId'].'"
                        AND        PlantInfo.areaId="'.$area.'"
                             ';
        }
        if(I('get.pl','')!==''){
            $where=    'AND      PlantInfo.id="'.$pl.'"
                             ';

        }

        //4.运行记录管理
        $sql='SELECT     PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id AS pid,PlantInfo.workshopId,
                             RunRecord.handleType,RunRecord.handler,RunRecord.HandleDate,RunRecord.isShowAlarm,
                             RunRecord.verifyResult,RunRecord.id
                  FROM       tb_plantinfo       AS   PlantInfo
                  LEFT JOIN  tb_runrecordlist   AS   RunRecord
                  ON         PlantInfo.id            =  RunRecord.pid
                  WHERE      RunRecord.isAlarm  = 1 '.$where;
        $res4=$db->query($sql);
        foreach($res4 as $key => $v ){
            $schedule4[]                      =    $v;
            $schedule4[$key]['href']          =    __MODULE__."/RunRecord/index.html?id=".$v['pid'];
            $schedule4[$key]['tableName']     =   "tb_runrecordlist";
            $schedule4[$key]['alarmSource']   =    "运行记录管理";
        }

        //5.日常维护管理
        $sql='SELECT     PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id AS pid,PlantInfo.workshopId,
                             DailyRecord.handleType,DailyRecord.handler,DailyRecord.HandleDate,DailyRecord.isShowAlarm,
                             DailyRecord.verifyResult,DailyRecord.id
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_plantdailymaintainancerecord   AS   DailyRecord
                  ON         PlantInfo.id            =  DailyRecord.pid
                  WHERE      DailyRecord.isAlarm  = 1 '.$where;
        $res5=$db->query($sql);
        foreach($res5 as $key => $v ){
            $schedule5[]                      =    $v;
            $schedule5[$key]['href']          =    __MODULE__."/DailyManagement/index.html?id=".$v['pid'];
            $schedule5[$key]['tableName']     =   "tb_plantdailymaintainancerecord";
            $schedule5[$key]['alarmSource']   =    "日常维护管理";
        }

        //6.检验记录管理
        $sql='SELECT     PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id AS pid,PlantInfo.workshopId,
                             TestRecord.handleType,TestRecord.handler,TestRecord.HandleDate,TestRecord.isShowAlarm,
                             TestRecord.verifyResult,TestRecord.id
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_planttestrecord                AS   TestRecord
                  ON         PlantInfo.id            =  TestRecord.pid
                  WHERE      TestRecord.isAlarm  = 1 '.$where;
        $res6=$db->query($sql);
        foreach($res6 as $key => $v ){
            $schedule6[]                      =    $v;
            $schedule6[$key]['href']          =    __MODULE__."/InspectRecord/index.html?id=".$v['pid'];
            $schedule6[$key]['tableName']     =   "tb_planttestrecord";
            $schedule6[$key]['alarmSource']   =    "检验记录管理";
        }
        //7.风险计算结果
        $sql='SELECT         PlantInfo.plantNO,PlantInfo.areaId,PlantInfo.plantName,PlantInfo.id AS pid,PlantInfo.workshopId,
                             RiskList.isShowAlarm,RiskList.id,RiskList.countDate AS HandleDate
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_risklist                       AS   RiskList
                  ON         PlantInfo.id            =  RiskList.pid
                  WHERE      RiskList.isAlarm = 1 '.$where;

        $res8=$db->query($sql);
        foreach($res8 as $key => $v ){
            $schedule8[]                =    $v;
            $schedule8[$key]['href']    =    __MODULE__."/RiskCalculation/tankCal.html?id=".$v['pid'];
            $schedule8[$key]['tableName']     =   "tb_risklist";
            $schedule8[$key]['alarmSource']   =    "风险计算结果";
        }
        foreach($schedule4 as $key => $v ){
            $AlertRecord[]=$v;
        }
        foreach($schedule5 as $key => $v ){
            $AlertRecord[]=$v;
        }
        foreach($schedule6 as $key => $v ){
            $AlertRecord[]=$v;
        }
        foreach($schedule8 as $key => $v ){
            $AlertRecord[]=$v;
        }
//        var_dump($AlertRecord);
        $AlertRecord = $this->my_sort($AlertRecord,'isShowAlarm',SORT_DESC,SORT_STRING);
//        $AlertRecord = $this->my_sort($AlertRecord,'HandleDate',SORT_DESC,SORT_STRING);
        $this->assign("AlertRecord",$AlertRecord);
        $this->display();
    }

    public function deleteAlertRecord(){
        $id=I("post.id","");
        $plantAlarm=D("tb_plantalarm");
        $PlantAlarm=$plantAlarm->delete($id);
        if($PlantAlarm){
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
    public function relieveAlertRecord(){
        $id         = I("post.id","");
        $tableName  = I("post.tableName","");
        $status     = I("post.status","");
        $PlantAlarm=M("$tableName")->where("id=$id")->setField("isShowAlarm",$status);
        if($PlantAlarm){
            if(I("post.status","")==0){
                $this->ajaxReturn(array(
                    "code" => 100,
                    "msg"  => "关闭报警"
                ));
            }else{
                $this->ajaxReturn(array(
                    "code" => 100,
                    "msg"  => "开启报警"
                ));
            }

        }else{
            $this->ajaxReturn(array(
                    "code" => 200,
                    "msg"  => "处理报警出错"
            ));

        }
    }
    //对二维数组进行排序
    function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC ){
        if(is_array($arrays)){
            foreach ($arrays as $array){
                if(is_array($array)){
                    $key_arrays[] = $array[$sort_key];
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
        array_multisort($key_arrays,$sort_order,$sort_type,$arrays);
        return $arrays;
    }

}