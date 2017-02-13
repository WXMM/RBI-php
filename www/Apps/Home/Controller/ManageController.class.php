<?php
namespace Home\Controller;
class ManageController extends CommonController
{
    public function index()
    {
//      登录跳转成功的主页面
//        1、头部菜单
//        2、右部导航菜单和主要列表内容
//        3、脚部菜单
//        初始化报警提醒


        //1、如果是具有审核权限的人员则显示待审核以及该人员所在厂区的
        //2、如果是普通的设备员则显示审核以后的结果消息
        $db     =   \Think\Db :: getInstance(C('RBAC_DB_DSN'));
        $access = \Org\Util\Rbac::getControllerAccess($_SESSION[C('USER_AUTH_KEY')]);
        $Access=$access[strtoupper(MODULE_NAME)][strtoupper(CONTROLLER_NAME)];

//        $alarm=D("tb_plantalarm");

        if($_SESSION['workshopId']=="总公司"){
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
                             Plantalarm.status
                  FROM       tb_plantinfo AS PlantInfo
                  LEFT JOIN  tb_plantalarm AS Plantalarm
                  ON         PlantInfo.id  =  Plantalarm.plantId
                  WHERE      Plantalarm.status=0';
            $res0=$db->query($sql);
        }else{
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
                             Plantalarm.status
                  FROM       tb_plantinfo AS PlantInfo
                  LEFT JOIN  tb_plantalarm AS Plantalarm
                  ON         PlantInfo.id  =  Plantalarm.plantId
                  WHERE      PlantInfo.workshopId="'.$_SESSION['workshopId'].'"
                  AND        Plantalarm.status=0';
            $res0=$db->query($sql);
        }
        $alarmCount=count($res0);
        $this->assign("alarmCount",$alarmCount);




        if($Access['VERIFIED']['id']==1){
            //如果该用户有审核权限，则查询出需要审核的$verifyResult==0的记录；

            //1、储罐基本信息
            $sql='SELECT  PlantInfo.plantNO,PlantInfo.id,PlantInfo.handleType,PlantInfo.verifyResult,PlantInfo.handler,
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
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
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
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
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
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
                             RunRecord.handleType,RunRecord.handler,RunRecord.HandleDate,RunRecord.verifyResult
                  FROM       tb_plantinfo       AS   PlantInfo
                  LEFT JOIN  tb_runrecordlist   AS   RunRecord
                  ON         PlantInfo.id            =  RunRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        RunRecord.verifyResult  = 0';
            $res4=$db->query($sql);
            foreach($res4 as $key => $v ){
                $schedule4[]                =    $v;
                $schedule4[$key]['href']    =    __MODULE__."/Inspect/thickness.html?id=".$v['id'];
                $schedule4[$key]['title']   =    "运行记录管理";
            }

            //5.日常维护管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
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
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
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
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
                             MaintanceRecord.handleType,MaintanceRecord.handler,MaintanceRecord.HandleDate,MaintanceRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_plantmaintancerecord           AS   MaintanceRecord
                  ON         PlantInfo.id            =  MaintanceRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        MaintanceRecord.verifyResult  = 0';
            $res7=$db->query($sql);
            foreach($res7 as $key => $v ){
                $schedule7[]                =    $v;
                $schedule7[$key]['href']    =    __MODULE__."/MaintenanceRecord/index.html?id=".$v['id'];
                $schedule7[$key]['title']   =    "维修记录管理";
            }
        }else{
            //如果该用户没有审核权限则返回和他相关的审核结果

            //1、储罐基本信息
            $sql1='SELECT  PlantInfo.plantNO,PlantInfo.id,PlantInfo.handleType,PlantInfo.verifyResult,PlantInfo.handler,
                          PlantInfo.HandleDate,PlantInfo.handleType
                  FROM    tb_plantinfo AS PlantInfo
                  WHERE   PlantInfo.workshopId="'.$_SESSION['workshopId'].'"
                  AND     PlantInfo.handleId= '.$_SESSION[C('USER_AUTH_KEY')].'
                  AND     PlantInfo.verifyResult  = 2';
            $res1=$db->query($sql1);
            foreach($res1 as $key => $v ){
                $schedule1[]                =    $v;
                $schedule1[$key]['href']    =    __MODULE__."/Manage/tankInfo.html?id=".$v['id'];
                $schedule1[$key]['title']   =    "常压储罐基本信息";
            }

            //2.原始测厚记录
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
                             ThicknessOrigin.handleType,ThicknessOrigin.handler,ThicknessOrigin.HandleDate,ThicknessOrigin.verifyResult
                  FROM       tb_plantinfo AS PlantInfo
                  LEFT JOIN  tb_measurethicknessrecord_origin AS ThicknessOrigin
                  ON         PlantInfo.id  =  thicknessOrigin.pid
                  WHERE      PlantInfo.workshopId="'.$_SESSION['workshopId'].'"
                  AND        ThicknessOrigin.handleId='.$_SESSION[C('USER_AUTH_KEY')].'
                  AND        ThicknessOrigin.verifyResult  = 2';
            $res2=$db->query($sql);
            foreach($res2 as $key => $v ){
                $schedule2[]                =    $v;
                $schedule2[$key]['href']    =    __MODULE__."/Manage/thicknessOrigin.html?id=".$v['id'];
                $schedule2[$key]['title']   =    "测厚原始记录";
                $schedule2[$key]['pid']     =    "常压储罐基本信息";
            }

            //3.定点测厚管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
                             Thickness.handleType,Thickness.handler,Thickness.HandleDate,Thickness.verifyResult
                  FROM       tb_plantinfo AS PlantInfo
                  LEFT JOIN  tb_measurethicknessrecord AS Thickness
                  ON         PlantInfo.id  =  Thickness.pid
                  WHERE      PlantInfo.workshopId="'.$_SESSION['workshopId'].'"
                  AND        Thickness.handleId= '.$_SESSION[C('USER_AUTH_KEY')].'
                  AND        Thickness.verifyResult  = 2';
            $res3=$db->query($sql);
            foreach($res3 as $key => $v ){
                $schedule3[]                =    $v;
                $schedule3[$key]['href']    =    __MODULE__."/Inspect/thickness.html?id=".$v['id'];
                $schedule3[$key]['title']   =    "定点测厚记录";
            }

            //4.运行记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
                             RunRecord.handleType,RunRecord.handler,RunRecord.HandleDate,RunRecord.verifyResult
                  FROM       tb_plantinfo       AS   PlantInfo
                  LEFT JOIN  tb_runrecordlist   AS   RunRecord
                  ON         PlantInfo.id            =  RunRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        RunRecord.handleId  = '.$_SESSION[C('USER_AUTH_KEY')].'
                  AND        RunRecord.verifyResult  = 2';
            $res4=$db->query($sql);
            foreach($res4 as $key => $v ){
                $schedule4[]                =    $v;
                $schedule4[$key]['href']    =    __MODULE__."/Inspect/thickness.html?id=".$v['id'];
                $schedule4[$key]['title']   =    "运行记录管理";
            }

            //5.日常维护管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
                             DailyRecord.handleType,DailyRecord.handler,DailyRecord.HandleDate,DailyRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_plantdailymaintainancerecord   AS   DailyRecord
                  ON         PlantInfo.id            =  DailyRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        DailyRecord.handleId  = '.$_SESSION[C('USER_AUTH_KEY')].'
                  AND        DailyRecord.verifyResult  = 2';
            $res5=$db->query($sql);
            foreach($res5 as $key => $v ){
                $schedule5[]                =    $v;
                $schedule5[$key]['href']    =    __MODULE__."/DailyManagement/index.html?id=".$v['id'];
                $schedule5[$key]['title']   =    "日常维护管理";
            }

            //6.检验记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
                             TestRecord.handleType,TestRecord.handler,TestRecord.HandleDate,TestRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_planttestrecord                AS   TestRecord
                  ON         PlantInfo.id            =  TestRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        TestRecord.handleId  = '.$_SESSION[C('USER_AUTH_KEY')].'
                  AND        TestRecord.verifyResult  = 2';
            $res6=$db->query($sql);
            foreach($res6 as $key => $v ){
                $schedule6[]                =    $v;
                $schedule6[$key]['href']    =    __MODULE__."/InspectRecord/index.html?id=".$v['id'];
                $schedule6[$key]['title']   =    "检验记录管理";
            }

            //7.维修记录管理
            $sql='SELECT     PlantInfo.plantNO,PlantInfo.id,
                             MaintanceRecord.handleType,MaintanceRecord.handler,MaintanceRecord.HandleDate,MaintanceRecord.verifyResult
                  FROM       tb_plantinfo                      AS   PlantInfo
                  LEFT JOIN  tb_plantmaintancerecord           AS   MaintanceRecord
                  ON         PlantInfo.id            =  MaintanceRecord.pid
                  WHERE      PlantInfo.workshopId    ="'.$_SESSION['workshopId'].'"
                  AND        MaintanceRecord.handleId  ='.$_SESSION[C('USER_AUTH_KEY')].'
                  AND        MaintanceRecord.verifyResult  = 2';
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
        $scheduleLength=count($schedule);
        $this->assign("scheduleLength",$scheduleLength);

        $nowDate=date("Y-m-d",time());
        $this->assign("nowDate",$nowDate);

        $this->display();
    }

    public function tankInfo()
    {
//      嵌套页面、包含左侧树形菜单和主体的装置设备列表

        $srcId=I("get.id","");
        $this->assign("srcId",$srcId);
        $this->display();
    }
    //新增设备
    public function add()
    {
        $plantInfo=D("tb_plantinfo");
        $add['factoryId']=I('post.factory','');
        $add['workshopId']=I('post.workshop','');
        $add['areaId']=I('post.area','');
        $add['plantNO']=I('post.plant','');
        $count=$plantInfo->where($add)->count();
        if($count>0){
            $re["status"]=0;
            $re['msg']="该设备已存在";
        }else{
            $add['submitterId']   =   $_SESSION[C('USER_AUTH_KEY')];  //记录提交者Id
            $add['submitter']     =   $_SESSION['realname'];          //记录提交者姓名
            $add['submitDate']    =   date("Y-m-d h:i:s",time());     //记录提交 时间

            $add['handleId']      =   $_SESSION[C('USER_AUTH_KEY')];  //当前记录操作者
            $add['handler']       =   $_SESSION['realname'];          //当前操作者姓名
            $add['handleType']    =   "新增";                         //当前操作类型，新增、编辑、审核
            $add['HandleDate']    =   date("Y-m-d h:i:s",time());     //当前操作时间

            $add['verifierId']    =   $_SESSION[C('USER_AUTH_KEY')];  //审核人员ID
            $add['verifier']      =   $_SESSION['realname'];          //审核人姓名
            $add['verifierLevel'] =   $_SESSION['roleLevel'];         //审核阶段表示审核到那个步骤了 1表示一级设备员等 2 表示厂区主管等 3表示公司领导等
            $add['verifyStage']   =   $_SESSION['userRole'];
            $add['verifyResult']  =   0;                              //审核结果 0表示未审核  1 表示审核通过  2 表示审核不通过
            $id=$plantInfo->add($add);
            if($id){
                $re["status"]=1;
                $re["msg"]="请继续完善该设备的其他相关信息";
                $re["id"]=$id;

//                //        添加待办事项
//                $schedule=D("tb_schedule");
//                $scheduleWhere['title']       =  "新增设备基本信息";
//                $scheduleWhere['indexHref']   =  __MODULE__."/Manage/tankInfo.html?id=".$id;
//                $scheduleWhere['plantId']     =   $id;
//                $scheduleWhere['controller']  =  "Manage";
//                $scheduleWhere['function']    =  "tankInfo";
//                $scheduleWhere['plantNO']     =  I('post.plant','');
//                $scheduleWhere['sender']      =  $_SESSION['realname'];
//                $scheduleWhere['workshopId']  =  $_SESSION['workshopId'];
//                $scheduleWhere['verifyStage'] =  "待审核";
//                $scheduleWhere['sendDate']    =  Date("Y-m-d");
//                $schedule->add($scheduleWhere);
            }
        }


        $this->ajaxReturn($re,"JSON");
    }
    public function tankInfoEdit()
    {
        //factory下拉框内容
        $factorySelect=D('dic_factory');
        $factorySelect=$factorySelect->select();
        $this->assign('factorySelect',$factorySelect);
        //workshop下拉框内容
        $workshopSelect=D('dic_workshop');
        $workshopSelect=$workshopSelect->select();
        $this->assign('workshopSelect',$workshopSelect);
        //每个select复选框的备选内容
        $bank= D('dic_content');
        $bank = $bank ->select();
        $this->assign('bank',$bank);
        //接受列表页面传递过来的相关参数获取设备的详情参数
        $id=I('get.id','');
        $plantInfo=D('Plantinfo');
        $res=$plantInfo->where("id=$id")->Relation("Plantwallboardinfo")->select();
        $this->assign('res',$res);

        //附件信息
        $attach['recordId']=$id;
        $attach['tableId']='tb_plantinfo';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);
        $this->assign('NowTime',date('Y-m-d',time()));
        $this->display();
    }
    public function tankInfoSave(){

        $plantInfo=D("Plantinfo");
        //更新数据
        $data['id'] = I('post.id','');
        $verifyResult=$plantInfo->where($data)->getField("verifyResult");
        if($verifyResult==0 || $verifyResult==2){
        $data['H'] = I('post.H', '');
        $data['D'] = I('post.D', '');
        $data['V'] = I('post.V', '');
        $data['S'] = I('post.S', '');
        $data['W'] = I('post.W', '');
        $data['plantName'] = I('post.plantName', '');
        $data['OilTankType'] = I('post.OilTankType', '');
        $data['IsMainPlant'] = I('post.IsMainPlant', '');
        $data['ERPPlantType'] = I('post.ERPPlantType', '');
        $data['fillH'] = I('post.fillH', '');
        $data['storeMedium'] = I('post.storeMedium', '');
        $data['mediumpH'] = I('post.mediumpH', '');
        $data['mediumPercentage'] = I('post.mediumPercentage', '');
        $data['mediumPoison'] = I('post.mediumPoison', '');
        $data['isMediumWater'] = I('post.isMediumWater', '');
        $data['mediumC'] = I('post.mediumC', '');
        $data['mediumDyViscosity'] = I('post.mediumDyViscosity', '');
        $data['mediumFire'] = I('post.mediumFire', '');  //介质火灾危险性等级
        $data['breakSize'] = I('post.breakSize', '');
        $data['operateTemp'] = I('post.operateTemp', '');
        $data['designTemp'] = I('post.designTemp', '');
        $data['operatePresure'] = I('post.operatePresure', '');
        $data['designPresure'] = I('post.designPresure', '');
        $data['sealType'] = I('post.sealType', '');
        $data['useStatus'] = I('post.useStatus', '');
        $data['useDate'] = I('post.useDate', '');
        $data['techniqueStatus'] = I('post.techniqueStatus', '');
        $data['installStandard'] = I('post.installStandard', '');
        $data['designStandard'] = I('post.designStandard', '');
        $data['measureAdminType'] = I('post.measureAdminType', '');
        $data['mantenanceBasis'] = I('post.mantenanceBasis', '');
        $data['sensitiveEnvironment'] = I('post.sensitiveEnvironment', '');
        $data['geographyEnvironment'] = I('post.geographyEnvironment', '');
        $data['soilFoundation'] = I('post.soilFoundation', '');
        $data['installCompany'] = I('post.installCompany', '');
        $data['installDate'] = I('post.installDate', '');
        $data['checkCompany'] = I('post.checkCompany', '');
        $data['designCompany'] = I('post.designCompany', '');
        $data['checkDate'] = I('post.checkDate', '');
        $data['yearCheckDate'] = I('post.yearCheckDate', '');
        $data['nextCheckDate'] = I('post.nextCheckDate', '');
        $data['nextYearCheckDate'] = I('post.nextYearCheckDate', '');
        $data['remark'] = I('post.remark', '');


        $data['layerCount'] = I('post.layerCount', '');
        $data['wallboardWeldCoefficient'] = I('post.wallboardWeldCoefficient', '');
        $data['isHeatTreatAfterWeld'] = I('post.isHeatTreatAfterWeld', '');
        $data['wallboardOutsideErosionType'] = I('post.wallboardOutsideErosionType', '');
        $data['wallboardProductSideErosionType'] = I('post.wallboardProductSideErosionType', '');
        $data['wallboardLinkType'] = I('post.wallboardLinkType', '');
        $data['ErosionAlarmSpeed'] = I('post.ErosionAlarmSpeed', '');
        $data['isWallboardInstallHeater'] = I('post.isWallboardInstallHeater', '');
        $data['wallboardHeaterType'] = I('post.wallboardHeaterType', '');

        $data['isWallboardKeepWarm'] = I('post.isWallboardKeepWarm', '');      //是否有保温层
        $data['wallboardKeepWarmStatus'] = I('post.wallboardKeepWarmStatus', ''); //保温层质量
        $data['wallboardKeepWarmUseDate'] = I('post.wallboardKeepWarmUseDate', ''); //保温层安装时间

        $data['isWallboardLining'] = I('post.isWallboardLining', '');  //是否有衬里
        $data['wallboardLiningStatus'] = I('post.wallboardLiningStatus', '');  //衬里质量
        $data['wallboardLiningUseDate'] = I('post.wallboardLiningUseDate', '');  //衬里安装时间

        $data['isWallboardCoating'] = I('post.isWallboardCoating', '');   //是否涂层
        $data['wallboardCoatingStatus'] = I('post.wallboardCoatingStatus', '');  //涂层质量
        $data['wallboardCoatingUseDate'] = I('post.wallboardCoatingUseDate', '');  //涂层涂装时间

        $data['topThickness'] = I('post.topThickness', '');
        $data['topMaterial'] = I('post.topMaterial', '');
        $data['topStyle'] = I('post.topStyle', '');
        $data['topStartHeight'] = I('post.topStartHeight', '');
        $data['topUseDate'] = I('post.topUseDate', '');
        $data['topReplaceDate'] = I('post.topReplaceDate', '');
        $data['isTopKeepWarm'] = I('post.isTopKeepWarm', '');
        $data['topKeepWarmMaterial'] = I('post.topKeepWarmMaterial', '');
        $data['topKeepWarmStatus'] = I('post.topKeepWarmStatus', '');
        $data['topKeepWarmUseDate'] = I('post.topKeepWarmUseDate', '');

        $data['bottomType'] = I('post.bottomType', '');
        $data['bottomMaterial'] = I('post.bottomMaterial', '');
        $data['bottomNamelyThickness'] = I('post.bottomNamelyThickness', '');
        $data['bottomLinkType'] = I('post.bottomLinkType', '');
        $data['bottomRainAbility'] = I('post.bottomRainAbility', '');
        $data['bottomEdgeMaterial'] = I('post.bottomEdgeMaterial', '');
        $data['bottomEdgeNamelyThickness'] = I('post.bottomEdgeNamelyThickness', '');
        $data['bottomEdgeMinThickness'] = I('post.bottomEdgeMinThickness ', '');
        $data['bottomMiddleNamelyThickness'] = I('post.bottomMiddleNamelyThickness', '');
        $data['bottomMiddleMaterial'] = I('post.bottomMiddleMaterial', '');
        $data['isBottomInstallLeakDectect'] = I('post.isBottomInstallLeakDectect', '');
        $data['bottomCathodeProtect'] = I('post.bottomCathodeProtect', '');
        $data['bottomCathodeProtectMethod'] = I('post.bottomCathodeProtectMethod', '');
        $data['bottomReplaceDate']    =   I('post.bottomReplaceDate', '');
        $data['bottomUseDate']        =   I('post.bottomUseDate', '');

        $data['isBottomLining'] = I('post.isBottomLining', '');
        $data['isBottomLining'] = I('post.isBottomLining', '');
        $data['bottomCoatingStatus'] = I('post.bottomCoatingStatus', '');
        $data['bottomLiningStatus'] = I('post.bottomLiningStatus', '');
        $data['bottomCoatingUseDate'] = I('post.bottomCoatingUseDate', '');
        $data['bottomLiningUseDate'] = I('post.bottomLiningUseDate', '');

        $data['bottomGasket'] = I('post.bottomGasket', '');   //基础形式
        $data['bottomGasketSoil'] = I('post.bottomGasketSoil', '');  //土壤基础形式

        $data['bottomToWaterDistance'] = I('post.bottomToWaterDistance', '');//罐底到地下水的距离
        $data['overflowPercentage'] = I('post.overflowPercentage', ''); //溢出围堰流体比(%)
        $data['overflowPercentageIn'] = I('post.overflowPercentageIn', '');  //溢出围堰但仍在罐区内，地表土壤的流体百分比(%)
        $data['overflowPercentageOut'] = I('post.overflowPercentageOut', '');  //溢出围堰且已流到罐区外，地表土壤中的流体百分比(%)
        $data['stopLoss'] = I('post.stopLoss', '');                           //停产造成的损失
        $data['failConseqenceAccept'] = I('post.failConseqenceAccept', '');  //失效后果可接受基准(万元)

        $data['tankFoundationSettlement'] = I('post.tankFoundationSettlement', '');//储罐基础沉降评价

        $data['isBottomInstallHeater'] = I('post.isBottomInstallHeater', '');
        $data['bottomHeaterType'] = I('post.bottomHeaterType', '');
        $data['isBottomInstallFireProtection'] = I('post.isBottomInstallFireProtection', '');


        $data['handleId']      =   $_SESSION[C('USER_AUTH_KEY')];  //当前记录操作者
        $data['handler']       =   $_SESSION['realname'];          //当前操作者姓名
        $data['handleType']    =   "编辑";                         //当前操作类型，新增、编辑、审核
        $data['HandleDate']    =   date("Y-m-d h:i:s",time());     //当前操作时间
        $data['verifyResult']  =    0;


        $plantInfoRes=$plantInfo->save($data);
            if($plantInfoRes){
                $msg="保存成功";
            }else{
                $msg="保存出错";
            }
        }else{
            $msg="已审核通过，不能再进行编辑";
        }
        $this->ajaxReturn($msg,"JSON");
    }
    public function addTankinfoWallboard(){
        $index=I("post.index","");
        $pid=intval(I('post.pid',''));
        $plantInfo=D("Plantinfo");
        $verifyResult=$plantInfo->where("id=$pid")->getFIeld("verifyResult");
        if($verifyResult==1){   //判断时候通过审核，已通过审核的不能再进行编辑
            $this->ajaxReturn(
                array(
                    "msg"  => "已通过审核，不能再进行修改或新增",
                    "load" => 1
                ),
                "JSON");
        }else{
            $where["pid"]=intval(I('post.pid',''));
            $where["layerNO"]=intval(I('post.layerNO',''));
            $wallboard=D("Plantwallboardinfo");
            $id=$wallboard->where($where)->getField('id');
            $where["useDate"]= I('post.useDate','');
            $where["material"]= I('post.material','');
            $where["height"]= I('post.height','');
            $where["namelyThickness"]= I('post.namelyThickness','');
            if($index==1){
                if($id==null){
                    $res=$wallboard->add($where);
                    if($res){
                        $re['msg']="新增壁板成功";
                        $re['load']=1;
                    }else{
                        $re['msg']="新增壁板出错";
                        $re['load']=1;
                    }
                }else{
                    $re['msg']="该壁板已存在,请重新填写";
                    $re['load']=0;
                }
            }elseif($index==2){
                $where['id']=intval($id);
                $res=$wallboard->save($where);
                if($res){
                    $re['msg']="修改壁板成功";
                    $re['load']=1;
                }else{
                    $re['msg']="修改壁板出错";
                    $re['load']=1;
                }
            }
            $this->ajaxReturn($re,"JSON");
        }
    }
    public function deleteTankinfoWallboard(){
        $id=I("post.id","");
        $wallboard=D("Plantwallboardinfo");
        $count=$wallboard->delete($id);
        if($count){
            $re['msg']="删除成功";
        }else{
            $re['msg']="删除出错";
        }
        $this->ajaxReturn($re,"JSON");
    }
    public function tankInfoDetail()
    {
        //接受列表页面传递过来的相关参数获取设备的详情参数
        $id=I('get.id','');
        $condition['id']=$id;
        $plantInfo=D('Plantinfo');
        $res=$plantInfo->where($condition)->Relation("Plantwallboardinfo")->select();
        $this->assign('res',$res);
        //每个select复选框的备选内容
        $bank= D('dic_content');
        $bank = $bank ->select();
        $this->assign('bank',$bank);
        //更新数据
        $info =D("Plantinfo");
        $data['id']=$_POST['id'];
        $data['plantNO']=$_POST['plant'];
        $info->save($data);
        //附件信息
        $attach['recordId']=$id;
        $attach['tableId']='tb_plantinfo';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);
        $this->display();
    }
    public function tankInfoList()
    {
        //新增储罐信息列表
        $plantInfo = D('tb_plantinfo');
//        $add['Index']=I('post.Index','');
//        $add['factoryId']=I('post.factory','');
//        $add['workshopId']=I('post.workshop','');
//        $add['areaId']=I('post.area','');
//        $add['plantNO']=I('post.plant','');
//        if($add['Index']=='1'){
//            $plantInfo->add($add);
//        }
//       factory下拉框内容
        $factorySelect=D('dic_factory');
        $factorySelect=$factorySelect->select();
        $this->assign('factorySelect',$factorySelect);

        //workshop下拉框内容
        $workshopSelect=D('dic_workshop');
        if($_SESSION['workshopId']=="总公司"){
            $workshopSelect=$workshopSelect->select();
        }else{
            $workshopSelectWhere['workshopId']=$_SESSION['workshopId'];
            $workshopSelect=$workshopSelect->where($workshopSelectWhere)->select();
        }

        $this->assign('workshopSelect',$workshopSelect);

//     接收左侧树形菜单的url，获取装置列表
        $wor=I('get.wor','');
        $area=I('get.area','');
        $pl=I('get.pl','');
        $fac=I('get.fac','');
        if(empty($wor) && empty($area) && empty($pl) && empty($fac)){
            if($_SESSION['workshopId'] == "总公司"){
                $plant = $plantInfo->select();
            }else{
                $condition['workshopId']=$_SESSION['workshopId'];
                $plant = $plantInfo->where($condition)->select();
            }
        }else{
            $condition['factoryId']=$fac;
            $condition['workshopId']=$_SESSION['workshopId'];
            if(!empty($wor)){
                $condition['workshopId']=$wor;
            }
            if(!empty($area)){
                $condition['areaId']=$area;
            }
            if(!empty($pl)) {
                $condition['id'] = $pl;
            }
            $plant = $plantInfo->where($condition)->select();
        }
        $this->assign('plant',$plant);
        $this->display();
    }
    public function thicknessOrigin(){
        $srcId=I("get.id","");
        $this->assign("srcId",$srcId);
        $this->display();
    }
    public function thicknessOriginDataList(){
        $plantInfo=D('Plantinfo');
        if(empty($wor) && empty($area) && empty($pl) && empty($fac)){
            if($_SESSION['workshopId'] == "总公司"){
                $res = $plantInfo->Relation("MeasurethicknessrecordOrigin")->select();
            }else{
                $condition['workshopId']=$_SESSION['workshopId'];
                $res = $plantInfo->Relation("MeasurethicknessrecordOrigin")->where($condition)->select();
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
            $res = $plantInfo->where($condition)->Relation("MeasurethicknessrecordOrigin")->select();
        }
        $this->assign('res',$res);
        $this->display();
    }
    public function thicknessOriginData(){
        //获取測厚测量相关信息
        $where['id']=I('get.id','');

        $whereWall['pid']=I('get.id','');
        $whereWall['part']=1;
        $boardInfo=D("MeasurethicknessrecordWallOrigin");
        $wallboardInfo=$boardInfo->where($whereWall)->Relation("Plantwallboardinfo")->order("layerNO,layerId")->select();
        $this->assign('wallboardInfo',$wallboardInfo);

        $whereWall['part']=2;
        $bottomInfo=$boardInfo->where($whereWall)->order("layerNO,layerId")->select();
        $this->assign('bottomInfo',$bottomInfo);

        $whereWall['part']=3;
        $topInfo=$boardInfo->where($whereWall)->order("layerNO,layerId")->select();
        $this->assign('topInfo',$topInfo);

        $info=D("Plantinfo");
        $res=$info->Relation("MeasurethicknessrecordOrigin")->where($where)->select();
        $this->assign('res',$res);

        //附件信息
        $attach['recordId']=I('get.id','');
        $attach['tableId']='tb_thicknessOrigin';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);
        $this->assign('NowTime',date('Y-m-d',time()));

        $this->display();
    }
//    保存測厚原始记录信息
    public function saveOriginRecord(){
        $where["pid"]=I("post.id","");

        $thicknessOriginRecord=D("Measurethicknessrecord_origin");
        $ThicknessOriginRecord=$thicknessOriginRecord->where($where)->select();
        $where["measureDate"]=I("post.measureDate","");
        $where["recordDate"]=I("post.recordDate","");
        $where["measureUserName"]=I("post.measureUserName","");
        $where["recordUserName"]=I("post.recordUserName","");
        $where["remark"]=I("post.remark","");
        if($ThicknessOriginRecord[0]['verifyResult']==1){
            $re['msg'] = "已通过审核，不能进行编辑";
        }else {
            if ($ThicknessOriginRecord[0]['id'] !== null) {
                $where["id"] = $ThicknessOriginRecord[0]['id'];
                $where['handleId'] = $_SESSION[C('USER_AUTH_KEY')];  //当前记录操作者
                $where['handler'] = $_SESSION['realname'];          //当前操作者姓名
                $where['handleType'] = "编辑";                         //当前操作类型，新增、编辑、审核
                $where['HandleDate'] = date("Y-m-d h:i:s", time());     //当前操作时间
                $where['verifyResult'] = 0;                              //处理结果
                $res = $thicknessOriginRecord->save($where);
                if ($res) {
                    $re['msg'] = "修改成功";
                } else {
                    $re['msg'] = "修改失败";
                }
            } else {
                $add['handleId'] = $_SESSION[C('USER_AUTH_KEY')];  //当前记录操作者
                $add['handler'] = $_SESSION['realname'];          //当前操作者姓名
                $add['handleType'] = "新增";                         //当前操作类型，新增、编辑、审核
                $add['HandleDate'] = date("Y-m-d h:i:s", time());     //当前操作时间

                $add['verifier'] = $_SESSION['realname'];
                $add['verifierLevel'] = $_SESSION['roleLevel'];  //审核阶段表示审核到那个步骤了 1表示一级设备员等 2 表示厂区主管等 3表示公司领导等
                $add['verifyStage'] = $_SESSION['userRole'];     //审核结果 0表示未审核  1 表示审核通过  2 表示审核不通过
                $add['verifyResult'] = 0;

                $res = $thicknessOriginRecord->add($where);
                if ($res) {
//                //        添加待办事项
//                $schedule=D("tb_schedule");
//                $scheduleWhere['title']       =  "新增设备基本信息";
//                $scheduleWhere['plantId']     =   $ThicknessOriginRecord[0]['id'];
//                $scheduleWhere['controller']  =  "Manage";
//                $scheduleWhere['function']    =  "thicknessOriginData";
//                $scheduleWhere['plantNO']     =  $ThicknessOriginRecord[0]['plantNO'];
//                $scheduleWhere['sender']      =  $_SESSION['realname'];
//                $scheduleWhere['workshopId']  =  $_SESSION['workshopId'];
//                $scheduleWhere['verifyStage'] =  "待审核";
//                $scheduleWhere['sendDate']    =  Date("Y-m-d");
//                $schedule->add($scheduleWhere);
                    $re['msg'] = "新增成功";

                } else {
                    $re['msg'] = "新增失败";
                }
            }
        }
        $this->ajaxReturn($re);
    }

    public function thicknessOriginDataEdit(){
        //获取測厚测量相关信息
        $id=I('get.id','');
        $where['id']=$id;

        $wallboard=D("Plantwallboardinfo");
        $Wallboarod=$wallboard->where("pid=$id")->order("layerNO")->select();
        $this->assign('Wallboarod',$Wallboarod);

        $whereWall['pid']=I('get.id','');
        $whereWall['part']=1;
        $boardInfo=D("MeasurethicknessrecordWallOrigin");
        $wallboardInfo=$boardInfo->where($whereWall)->Relation("Plantwallboardinfo")->order("layerNO,layerId")->select();
        $this->assign('wallboardInfo',$wallboardInfo);

        $whereWall['part']=2;
        $bottomInfo=$boardInfo->where($whereWall)->Relation("Plantwallboardinfo")->order("layerNO,layerId")->select();
        $this->assign('bottomInfo',$bottomInfo);

        $whereWall['part']=3;
        $topInfo=$boardInfo->where($whereWall)->Relation("Plantwallboardinfo")->order("layerId")->select();
        $this->assign('topInfo',$topInfo);

        $info=D("Plantinfo");
        $res=$info->Relation("MeasurethicknessrecordOrigin")->where($where)->select();
        $this->assign('res',$res);

        $user=D("tb_user");
        $User=$user->select();
        $this->assign('User',$User);

        //附件信息
        $attach['recordId']=$id;
        $attach['tableId']='tb_thicknessOrigin';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);
        $this->assign('NowTime',date('Y-m-d',time()));

        $this->display();
    }
    //    增添、修改壁板信息
    public function addThicknessOriginData(){
        $res=D("MeasurethicknessrecordWallOrigin");
        $triggerType                = I('post.triggerType','');
        $data['thicknessOrigin']    = I('post.thicknessOrigin','');
        $data['thicknessType']      = I('post.thicknessType','');
        $plantInfo      =   D("Plantinfo");
        $pid=I('post.pid','');
        $verifyResult=$plantInfo->Relation("MeasurethicknessrecordOrigin")->where("id=$pid")->select();
        if($verifyResult[0]['MeasurethicknessrecordOrigin']['verifyResult']==1){
            $data['msg']="已通过审核，不能再进行新增或编辑";
        }else{
            if($triggerType==1){
                $data['pid']=I('post.pid','');
                $data['layerPid']=I('post.layerPid','');
                $data['layerNO']=I('post.layerNO','');
                $data['layerId']=I('post.layerId','');
                $data['part']=I('post.part','');


                $res->add($data);
                $data['msg']="新增成功";
            }
            if($triggerType==2){
                if(I('post.id','')!==''){
                    $data['id']=I('post.id','');
                }
                $res->save($data);
                $data['msg']="修改成功";
            }
        }

        $this->ajaxReturn($data,"JSON");

    }
    //    删除壁板信息
    public function deleteThicknessOriginData(){
        $id=I("post.id","");
        $res=D("MeasurethicknessrecordWallOrigin");
        $res=$res->delete($id);
        if($res){
            $data['msg']="成功删除";
        }
        $this->ajaxReturn($data,"JSON");

    }

    public function save(){
        $re=D('tb_plant_new');
        $data['id'] = I('post.id','');
        $data['H'] = I('post.H', '');
        $data['D'] = I('post.D', '');
        $data['V'] = I('post.V', '');
        $data['S'] = I('post.S', '');
        $re->save($data);
    }
    public function delete()
    {
//        仅供测试使用
        $index=I('post.value','');
        $result= D("tb_plantinfo");
        $result = $result->delete($index);
        $this->ajaxReturn($result,"JSON");
    }

    public function getLinkageMenu(){
        $tableName=I('post.tableName','');
        $value=I('post.value','');
        $valueId=I('post.valueId','');
        $re=D("$tableName");
        $where["$valueId"]=$value;
        $re=$re->where($where)->select();
        $this->ajaxReturn($re,"JSON");
    }

//    修改密码
   public function alterPassword(){
       $password=I("post.password","");
       $newPassword=I("post.newPassword","");
       $reNewPassword=I("post.reNewPassword","");
       $where['username']=$_SESSION['username'];
       $user=D("tb_user");
       $User=$user->where($where)->select();

       if($password==$User[0]['password']){
           if($newPassword==$reNewPassword  && !empty($newPassword)){
               $data['id']=$User[0]['id'];
               $data['password']=$newPassword;
               if($user->save($data)){
                   $this->ajaxReturn(array(
                       'statusCode' => 200,
                       'msg' => "密码修改成功"
                   ));
               }else{
                   $this->ajaxReturn(array(
                       'statusCode' => 200,
                       'msg' => "密码修改失败"
                   ));
               };
           }else{
               $this->ajaxReturn(array(
                   'statusCode' => 100,
                   'msg' => "两次密码输入不一致或密码不能为空"
               ));
           }
       }else{
           $this->ajaxReturn(array(
               'statusCode' => 100,
               'msg' => "原密码输入错误"
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

//    新增测点图
    //文件上传
    public function upload(){
        $pid=I('post.id','');
        $pointFigPath=I('post.pointFigPath','');
        $config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    './Public/',
            'savePath'   =>    'Home/img/observationPointFig/',
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    false,
            'subName'    =>    array('date','Ymd'),
        );
        $upload = new \Think\Upload($config);// 实例化上传类
        // 上传文件
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $re['msg']=$upload->getError();
        }else{
            // 上传成功
            $measureThicknessRecordOrigin=D("tb_measurethicknessrecord_origin");
            $id=$measureThicknessRecordOrigin->where("pid=$pid")->getField('id');
            if($id){
                $where['id']=$id;
                $where['pid']=$pid;
                $where["$pointFigPath"]=__ROOT__."/Public/".$info['file']["savepath"].$info['file']["savename"];
                $measureThicknessRecordOrigin=$measureThicknessRecordOrigin->save($where);
            }else{
                $where['pid']=$pid;
                $where["$pointFigPath"]=__ROOT__."/Public/".$info['file']["savepath"].$info['file']["savename"];
                $measureThicknessRecordOrigin=$measureThicknessRecordOrigin->add($where);
            }
            if($measureThicknessRecordOrigin){
                $re['msg']="文件上传成功";
            }else{
                $re['msg']=$measureThicknessRecordOrigin;
            }
        }
        $this->ajaxReturn($re,"JSON");
    }
}