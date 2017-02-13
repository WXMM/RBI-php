<?php
namespace Home\Controller;
class InspectController extends CommonController
{
    //入口文件
    public function index()
    {
        $this->display();
    }
    //定点測厚数据列表
    public function thickness(){
        $srcId=I("get.id","");
        $this->assign("srcId",$srcId);
        $this->display();
    }
    //定点測厚数据增删改查
    public function thicknessData(){
        //设备相关信息
        $where['id']=I('get.Index','');
        $plantInfo=D('Plantinfo');
        $thicknessInfo=$plantInfo->where($where)->Relation("Meathicknesslist")->select();
        $this->assign('thicknessInfo',$thicknessInfo);
        $thicknessWallInfo=D('Measurethicknessrecord');
        $whereWall['pid']=I('get.Index','');
        $thicknessWallInfo=$thicknessWallInfo->where($whereWall)->order("Mea_dt desc")->select();
        $this->assign('thicknessWallInfo',$thicknessWallInfo);
        //測厚定点的模式

        //1、获取壁板测厚数据
        $origin=D("MeasurethicknessrecordWallOrigin");
        $whereWall['part']=1;
        $originWall=$origin->where($whereWall)->Relation("Plantwallboardinfo")->order("layerNO,layerId")->select();
        $this->assign('originWall',$originWall);

        $whereWall['part']=2;
        $originBottom=$origin->where($whereWall)->order("layerNO")->select();
        $this->assign('originBottom',$originBottom);

        $whereWall['part']=3;
        $originTop=$origin->where($whereWall)->order("layerNO")->select();
        $this->assign('originTop',$originTop);

//        测点布局图
        $pid=I('get.Index','');
        $measurethicknessrecordOrigin=D("tb_measurethicknessrecord_origin");
        $MeasurethicknessrecordOrigin=$measurethicknessrecordOrigin->where("pid=$pid")->select();
        $this->assign('PointFigPath',$MeasurethicknessrecordOrigin[0]);

        $user=D("tb_user");
        $User=$user->select();
        $this->assign('User',$User);
        $this->assign('nowTime',date("Y-m-d"));

        $this->display();
    }
    public function thicknessDataList()
    {
        //     接收左侧树形菜单的url，获取装置列表
        $plantInfo=D('Plantinfo');
        $wor=I('get.wor','');
        $area=I('get.area','');
        $pl=I('get.pl','');
        $fac=I('get.fac','');
        if(empty($wor) && empty($area) && empty($pl) && empty($fac)){
            if($_SESSION['workshopId'] == "总公司"){
                $res = $plantInfo->Relation("Meathicknesslist")->select();
            }else{
                $condition['workshopId']=$_SESSION['workshopId'];
                $res = $plantInfo->Relation("Meathicknesslist")->where($condition)->select();
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
            $res = $plantInfo->where($condition)->Relation("Meathicknesslist")->select();
        }

        $this->assign("res",$res);
        //factory下拉框内容
        $factorySelect=D('dic_factory');
        $factorySelect=$factorySelect->select();
        $this->assign('factorySelect',$factorySelect);
        $this->display();
    }
    public function thicknessDataWall(){

        $con['id']=I('get.pid','');
        $plantInfo=D('Plantinfo');
        $PlantInfo=$plantInfo->where($con)->select();
        $this->assign('PlantInfo',$PlantInfo[0]);


        $thicknessRecordInfo=D('Measurethicknessrecord');
        $con['id']=I('get.id','');
        $ThicknessRecordInfo=$thicknessRecordInfo->where($con)->order("Mea_dt desc")->select();
        $this->assign('ThicknessRecordInfo',$ThicknessRecordInfo[0]);


        $Mea_thickness=D('MeasurethicknessrecordWall');//測厚信息相关
        $where['pid']=I('get.id','');
        $where['part']=1;
        $wall=$Mea_thickness->where($where)->Relation("Plantwallboardinfo")->order("layerNO")->select();
        $where['part']=2;
        $bottom=$Mea_thickness->where($where)->order("layerNO")->select();
        $where['part']=3;
        $top=$Mea_thickness->where($where)->order("layerNO")->select();
        $this->assign('wall',$wall);
        $this->assign('bottom',$bottom);
        $this->assign('top',$top);

        //        测点布局图
        $pid=I('get.pid','');
        $measurethicknessrecordOrigin=D("tb_measurethicknessrecord_origin");
        $MeasurethicknessrecordOrigin=$measurethicknessrecordOrigin->where("pid=$pid")->select();
        $this->assign('PointFigPath',$MeasurethicknessrecordOrigin[0]);

        //附件信息
        $attach['recordId']=I('get.id','');
        $attach['tableId']='Inspect';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);
        $this->assign('NowTime',date('Y-m-d',time()));
        $this->display();
    }
    public function thicknessDataEdit(){
        $con['id']=I('get.pid','');
        $plantInfo=D('Plantinfo');
        $PlantInfo=$plantInfo->where($con)->select();
        $this->assign('PlantInfo',$PlantInfo[0]);


        $thicknessRecordInfo=D('Measurethicknessrecord');
        $con['id']=I('get.id','');
        $ThicknessRecordInfo=$thicknessRecordInfo->where($con)->order("Mea_dt desc")->select();
        $this->assign('ThicknessRecordInfo',$ThicknessRecordInfo[0]);


        $Mea_thickness=D('MeasurethicknessrecordWall');//測厚信息相关
        $where['pid']=I('get.id','');
        $where['part']=1;
        $wall=$Mea_thickness->where($where)->Relation("Plantwallboardinfo")->order("layerNO")->select();
        $where['part']=2;
        $bottom=$Mea_thickness->where($where)->order("layerNO")->select();
        $where['part']=3;
        $top=$Mea_thickness->where($where)->order("layerNO")->select();
        $this->assign('wall',$wall);
        $this->assign('bottom',$bottom);
        $this->assign('top',$top);

        $user=D("tb_user");
        $User=$user->select();
        $this->assign('User',$User);
        $this->assign('nowTime',date("Y-m-d"));

        //        测点布局图
        $pid=I('get.pid','');
        $measurethicknessrecordOrigin=D("tb_measurethicknessrecord_origin");
        $MeasurethicknessrecordOrigin=$measurethicknessrecordOrigin->where("pid=$pid")->select();
        $this->assign('PointFigPath',$MeasurethicknessrecordOrigin[0]);

        //附件信息
        $attach['recordId']=I('get.id','');
        $attach['tableId']='Inspect';
        $attachment=D('tb_attachment');
        $attachment=$attachment->where($attach)->select();
        $this->assign('attachment',$attachment);

        $this->display();
    }
    public function  addThicknessList(){
        $thicknessList=D('tb_meathicknesslist');
        $data['pid']=I('post.id','');
        $data['layerCount']=I('post.layerCount','');
        $data['remark']=I('post.remark','');
        if(I('post.Index','')==1){
            $data['verifier'] = $_SESSION['realname'];
            $data['verifierLevel'] = $_SESSION['roleLevel'];
            //审核阶段表示审核到那个步骤了 1表示一级设备员等 2 表示厂区主管等 3表示公司领导等
            $data['verifyStage'] = $_SESSION['userRole'];
            //审核结果 0表示未审核  1 表示审核通过  2 表示审核不通过
            $data['verifyResult'] = 0;
            $res=$thicknessList->add($data);
            //        添加待办事项
            $schedule=D("tb_schedule");
            $scheduleWhere['title']       =  "新增定点测厚数据";
            $scheduleWhere['plantId']     =   I('post.id','');
            $scheduleWhere['controller']  =  "Inspect";
            $scheduleWhere['function']    =  "thickness";
            $scheduleWhere['sender']      =  $_SESSION['realname'];
            $scheduleWhere['workshopId']  =  $_SESSION['workshopId'];
            $scheduleWhere['verifyStage'] =  "待审核";
            $scheduleWhere['sendDate']    =  Date("Y-m-d");
            $schedule->add($scheduleWhere);
            echo $res;
        }else if(I('post.Index','')==2){
            $data['id']=I('post.id','');
            $res=$thicknessList->save($data);
            echo $res;
        }

    }
    public function addThickness(){
        $plantInfo  =  D("Plantinfo");
        $id         =  I('post.pid', '');
        $PlantInfo  =  $plantInfo->where("id=$id")->select();

        $Mea_thickness=D('Measurethicknessrecord');//測厚信息相关
        $dataDetail['pid']              =  I("post.pid","");
        $dataDetail['workshopId']       =  $PlantInfo[0]['workshopId'];
        $dataDetail['Mea_dt']           =  I("post.Mea_dt","");
        $dataDetail['Record_dt']        =  I("post.Record_dt","");
        $dataDetail['isWallMea']        =  I("post.wallBorderBox",0);
        $dataDetail['isBottomMea']      =  I("post.bottomBorderBox",0);
        $dataDetail['isTopMea']         =  I("post.topBorderBox",0);
        $dataDetail['Mea_username']     =  I("post.Mea_username","");
        $dataDetail['Record_username']  =  I("post.Record_username","");
        $dataDetail['record_remark']    =  I("post.record_remark","");

        $dataDetail['handleId']         =   $_SESSION[C('USER_AUTH_KEY')];  //当前记录操作者
        $dataDetail['handler']          =   $_SESSION['realname'];          //当前操作者姓名
        $dataDetail['handleType']       =   "新增";                         //当前操作类型，新增、编辑、审核
        $dataDetail['HandleDate']       =   date("Y-m-d h:i:s",time());     //当前操作时间

        $dataDetail['verifier']         =  $_SESSION['realname'];
        $dataDetail['verifierLevel']    =  $_SESSION['roleLevel'];
        $dataDetail['verifyStage']      =  $_SESSION['userRole'];  //审核阶段表示审核到那个步骤了 1表示一级设备员等 2 表示厂区主管等 3表示公司领导等
        $dataDetail['verifyResult']     =  0;                      //审核结果 0表示未审核  1 表示审核通过  2 表示审核不通过

        $Mea_dtConutWhere['pid']        =  I("post.pid","");
        $Mea_dtConutWhere['Mea_dt']     =  I("post.Mea_dt","");
        $Mea_dtConut=$Mea_thickness->where($Mea_dtConutWhere)->count();
        if($Mea_dtConut==0){
            if (I("post.wallBorderBox", "") == 1 || I("post.bottomBorderBox", "") == 1 || I("post.topBorderBox", "") == 1) {

                $thicknessDetail = $Mea_thickness->add($dataDetail);
//                添加最近测量日期
                $meaThicknessList                           =   D('tb_meathicknesslist');
                $meaThicknessListWhere['LastMeasuring_dt']  =   I("post.Mea_dt","");
                if($meaThicknessList->where("pid=$id")->count()==0){
                    $meaThicknessListWhere['pid']=$id;
                    $meaThicknessList->add($meaThicknessListWhere);
                }else{
                    $meaThicknessList->where("pid=$id")->save($meaThicknessListWhere);
                }

                if ($thicknessDetail) {
                    $part      =  I("post.part", '');
                    $layerNO   =  I("post.layerNO", '');
                    $layerId   =  I("post.layerId", '');
                    $layerPid  =  I("post.layerPid", '');
                    $layerGpid =  I("post.layerGpid", '');
                    $thickness =  I("post.thickness", '');
                    //提取上一次的测量数据
                    $mea_thicknessWall = D('MeasurethicknessrecordWall');
                    $measurethicknessrecordWallOrigin=D("MeasurethicknessrecordWallOrigin");
                    for ($i = 0; $i < count($layerNO); $i++) {
                        $whereCorrosion["layerPid"]=$layerPid[$i];
                        $Mea_thicknessWall=$mea_thicknessWall->where($whereCorrosion)->Relation("Plantwallboardinfo")->order("Mea_dt desc")->select();
                        switch ($part[$i])
                        {
                            case 1:
                                $namelyThickness=$Mea_thicknessWall[0]["namelyThickness"];
                                $namelyUseDate  =$Mea_thicknessWall[0]["namelyUseDate"];
                                break;
                            case 2:
                                if($layerNO[$i]==1){
                                    $namelyThickness=$PlantInfo[0]["bottomEdgeNamelyThickness"];
                                    $namelyUseDate  =$PlantInfo[0]["bottomUseDate"];
                                }elseif($layerNO[$i]==1){
                                    $namelyThickness=$PlantInfo[0]["bottomMiddleNamelyThickness"];
                                    $namelyUseDate  =$PlantInfo[0]["bottomUseDate"];
                                };
                                break;
                            case 3:
                                $namelyThickness=$PlantInfo[0]["topThickness"];
                                $namelyUseDate  =$PlantInfo[0]["topUseDate"];
                        }

                        $dataWall[$i]["short_termCorrosion"]=$this->countCorrosion($Mea_thicknessWall[0]["thickness"],$Mea_thicknessWall[0]["Mea_dt"],$Mea_thicknessWall[1]["thickness"],$Mea_thicknessWall[1]["Mea_dt"]);

                        $dataWall[$i]["long_termCorrosion"]=$this->countCorrosion($thickness[$i],I("post.Mea_dt", ""),$namelyThickness,$namelyUseDate);

                        $measurethicknessrecordWallOriginWhere['id']=$layerPid[$i];
                        $measurethicknessrecordWallOriginWhere['short_termCorrosion']=$dataWall[$i]["short_termCorrosion"];
                        $measurethicknessrecordWallOriginWhere['long_termCorrosion']=$dataWall[$i]["long_termCorrosion"];
                        $measurethicknessrecordWallOrigin->save($measurethicknessrecordWallOriginWhere);

                        $dataWall[$i]["gpid"]        =    I('post.pid', '');
                        $dataWall[$i]["pid"]         =    $thicknessDetail;
                        $dataWall[$i]["part"]        =    $part[$i];
                        $dataWall[$i]["layerNO"]     =    $layerNO[$i];
                        $dataWall[$i]["layerId"]     =    $layerId[$i];
                        $dataWall[$i]["layerPid"]    =    $layerPid[$i];
                        $dataWall[$i]["layerGpid"]   =    $layerGpid[$i];
                        $dataWall[$i]["thickness"]   =    $thickness[$i];
                        $dataWall[$i]["Mea_dt"]      =    I("post.Mea_dt", "");
                        $dataWall[$i]["Last_Thickness"] = $Mea_thicknessWall[0]['thickness'];
                        $dataWall[$i]["Last_Mea_dt"] = $Mea_thicknessWall[0]['Mea_dt'];
                    }


//                    添加报警信息
//                    foreach($dataWall as $data){
//                        $dataWallCorrosion[]=$data['long_termCorrosion'];
//                    }
//                    foreach($dataWall as $data){
//                        $dataWallCorrosion[]=$data['short_termCorrosion'];
//                    }
//                    $maxDataWallCorrosion=floatval(max($dataWallCorrosion));
//                    if($maxDataWallCorrosion > floatval($PlantInfo[0]['ErosionAlarmSpeed'])){
//                        $plantAlarm                      =  D("tb_plantalarm");
//                        $plantAlarmWhere['plantId']      =  $id;
//                        $plantAlarmWhere['state']        =  1;
//                        $plantAlarmWhere['status']       =  0;
//                        $plantAlarmWhere['addTime']      =  date("Y-m-d h:i:s",time());
//                        $plantAlarmWhere['alarmSource']  =  "腐蚀速率";
//                        $plantAlarmWhere['alarmSourceRecordId']  =  $thicknessDetail;
//                        $plantAlarm->add($plantAlarmWhere);
//                    }


//                    //        添加待办事项
//                    $schedule=D("tb_schedule");
//                    $scheduleWhere['title']       =  "新增设备定点测厚信息";
//                    $scheduleWhere['plantId']     =   $id;
//                    $scheduleWhere['controller']  =  "Inspect";
//                    $scheduleWhere['function']    =  "thickness";
//                    $scheduleWhere['plantNO']     =  $PlantInfo[0]['plantNO'];
//                    $scheduleWhere['sender']      =  $_SESSION['realname'];
//                    $scheduleWhere['workshopId']  =  $_SESSION['workshopId'];
//                    $scheduleWhere['verifyStage'] =  "待审核";
//                    $scheduleWhere['sendDate']    =  Date("Y-m-d");
//                    $schedule->add($scheduleWhere);


                    $thicknessWall = $mea_thicknessWall->addAll($dataWall);
                    if ($thicknessWall) {
                        $res['status'] = 1;
                        $res['msg'] = "測厚数据保存成功";
                        $res['id'] = $thicknessDetail;
                        $res['pid'] = $id;

                    } else {
                        $res['status'] = 1;
                        $res['msg'] = "保存出错(测量信息)";
                    }
                } else {
                    $res['status'] = 1;
                    $res['msg'] = "保存出错(记录信息)";
                };
            } else {
                $res['status'] = 0;
                $res['msg'] = "请至少选择一个测量部位";
            }
        }else{
            $res['status'] = 0;
            $res['msg'] = "不能在同一天进行两次测量";
        };

//        $res['msg'] = $dataWallCorrosion;
        $this->ajaxReturn($res,"JSON");

    }

    public function editThickness(){
        $pid=I("post.pid","");
        $thinknessRecord=D("tb_measurethicknessrecord");
        $verifyResult=$thinknessRecord->where("id=$pid")->getField("verifyResult");
        if($verifyResult==1){
            $re['msg']="已通过审核，不能再进行修改";
        }else{
            $where["id"]=I("post.id","");
            $where["thickness"]=I("post.thickness","");
            $thicknessWall = D('MeasurethicknessrecordWall');
            $ThicknessWall = $thicknessWall->save($where);

            M("tb_measurethicknessrecord")-> where("id=$pid")->setField('verifyResult',0);
            if($ThicknessWall){
                $re['msg']="修改成功";
            }else{
                $re['msg']="修改出错";
            }
        }
        $this->ajaxReturn($re,"JSON");
    }
    public function deleteThickness(){
        $id=I("post.id","");
        $Mea_thickness=D('Measurethicknessrecord');
        $Mea_thicknessWall=D('MeasurethicknessrecordWall');
        $res=$Mea_thickness->delete($id);
        if($res){
            $where['pid']=I("post.id","");
            $count=$Mea_thicknessWall->where($where)->delete();
            if($count){
                $re["msg"]="删除成功（含壁板）";
            }else{
                $re["msg"]="删除壁板測厚信息失败";
            }
        }else{
            $re["msg"]="删除成功（不含壁板）";
        }
        $this->ajaxReturn($re);
    }

    public function countCorrosion($thickness,$date,$lastThickness,$lastDate){
        $data=strtotime($date);
        $lastDate=strtotime($lastDate);
        $Y=($data-$lastDate)/31536000;
        $corrosion=abs(round(($lastThickness-$thickness)/$Y,2));
        return $corrosion;
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