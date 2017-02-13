<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/25
 * Time: 13:36
 */
namespace Home\Controller;
class RiskCalculationController extends CommonController
{
    public function tankCal(){
        $srcId=I("get.id","");
        $this->assign("srcId",$srcId);
        $this->display();
    }
    public function riskCalList(){
        //     接收左侧树形菜单的url，获取装置列表
        $plantInfo=D('Plantinfo');
        $wor=I('get.wor','');
        $area=I('get.area','');
        $pl=I('get.pl','');
        $fac=I('get.fac','');
        if(empty($wor) && empty($area) && empty($pl) && empty($fac)){
            if($_SESSION['workshopId'] == "总公司"){
                $plant = $plantInfo->Relation("Riskrecordlist")->select();
            }else{
                $condition['workshopId']=$_SESSION['workshopId'];
                $plant = $plantInfo->Relation("Riskrecordlist")->where($condition)->select();
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
            $plant = $plantInfo->where($condition)->Relation("Riskrecordlist")->select();
        }

        $this->assign('plant',$plant);
        $this->display();
    }
    public function riskBasedInfo(){
        //接受列表页面传递过来的相关参数获取设备的详情参数
        $rId         =    I("get.rId","");
        $plantId     =    I('get.id','');
        $dataWall['pid']=I('get.id','');
        $dataBottom['pid']=I('get.id','');

        $lastMea=D("Measurethicknessrecord");
        $dataWall["isWallMea"]=1;
        $Mea_dt=$lastMea->where($dataWall)->max("Mea_dt");
        $dataWall["Mea_dt"]= $Mea_dt;
        $id=$lastMea->where($dataWall)->getField("id");
        $whereWall['pid']=$id;
        $whereWall['gpid']=I('get.id','');
        $dataBottom["isBottomMea"]=1;
        $Mea_dt=$lastMea->where($dataBottom)->max("Mea_dt");
        $dataBottom["Mea_dt"]= $Mea_dt;
        $id=$lastMea->where($dataBottom)->getField("id");
        $whereBottom['pid']=$id;
        $whereBottom['gpid']=I('get.id','');
        $measurethicknessrecordWall=D("MeasurethicknessrecordWall");

        $whereWall['part']=1;
        $wall=$measurethicknessrecordWall->Relation("Plantwallboardinfo")->where($whereWall)->order("layerNO")->select();
        $whereBottom['part']=2;
        $bottom=$measurethicknessrecordWall->where($whereBottom)->order("layerNO")->select();
        $this->assign('wall',$wall);
        $this->assign('bottom',$bottom);
//        设备基本信息
        $info=D("Plantinfo");
        $con['id']=I('get.id','');
        $res=$info->Relation("Risklist")->where($con)->select();
        $this->assign('res',$res);

//        损伤机理数据
        $riskCalPara=D('Riskcalpara');
        $where['pid']=I('get.id','');
        $riskCalPara=$riskCalPara->where($where)->select();
        $this->assign('riskCalPara',$riskCalPara[0]);

//       风险相关信息
        $risklist=D('Risklist');
        $RiskList=$risklist->where("pid=$plantId")->order("countDate desc,id desc")->select();
        $this->assign('RiskList',$RiskList);

        $data1['pid']=I('get.id','');
        if($rId!==""){
            $data1['id']=$rId;
        }
        $riskDetail=$risklist->where($data1)->order("countDate desc,id desc")->select();
        $this->assign('riskDetail',$riskDetail);


        $riskWallList=D("Riskdetail");
//        if($rId==""){
//            $data1["countDate"]=$risklist->where($data1)->max("countDate");
//            $riskListId=$risklist->where($data1)->getField("id");
//            $riskWallListWhere['pid']=$riskListId;
//        }else{
//            $riskWallListWhere['pid']=$rId;
//        }

        $riskWallListWhere['pid']=$riskDetail[0]['id'];
        $riskWallListWhere['part']=1;
        $riskWallList=$riskWallList->where($riskWallListWhere)->order("layerId")->select();
        $this->assign('riskWallList',$riskWallList);

//        选项参数
        $bank=D("dic_content");
        $bank=$bank->select();
        $this->assign('bank',$bank);

        $this->display();
    }
    public function riskDetail(){
        $riskDetail=D('Risklist');
        $data['id']=I('post.id','');
        $riskDetail=$riskDetail->Relation("Riskdetail")->where($data)->select();
        $this->ajaxReturn($riskDetail[0],'JSON');
    }
    public function test(){
        $data=array(
            array("invid"=>"6","invdate"=>"3","amount"=>"6","tax"=>"6","total"=>"6","note"=>"9"),
            array("invid"=>"6","invdate"=>"3","amount"=>"6","tax"=>"6","total"=>"6","note"=>"9"),
            array("invid"=>"6","invdate"=>"3","amount"=>"6","tax"=>"6","total"=>"6","note"=>"9"),
            array("invid"=>"6","invdate"=>"3","amount"=>"6","tax"=>"6","total"=>"6","note"=>"9"),
            array("invid"=>"6","invdate"=>"3","amount"=>"6","tax"=>"6","total"=>"6","note"=>"9"),
            array("invid"=>"6","invdate"=>"3","amount"=>"6","tax"=>"6","total"=>"6","note"=>"9")
                    );

        $this->ajaxReturn($data,'JSON');
    }

    public function getRiskFigPara(){
        $id                                 =  I("post.id","");
        $riskList                           =  D("Risklist");
        $RiskList                           =  $riskList->where("id=$id")->select();
        $data['wallDamageFactor_trendYear'] = explode(",",$RiskList[0]['wallDamageFactor_trendYear']);

        $wallDamageFactor_trend     = explode(",",$RiskList[0]['wallDamageFactor_trend']);
        for($i=0;$i<count($wallDamageFactor_trend);$i++)
        {$data['wallDamageFactor_trend'][$i] = intval($wallDamageFactor_trend[$i]);}
        $floorDamageFactor_trend    = explode(",",$RiskList[0]['floorDamageFactor_trend']);
        for($i=0;$i<count($floorDamageFactor_trend);$i++)
        {$data['floorDamageFactor_trend'][$i] = intval($floorDamageFactor_trend[$i]);}
        $this->ajaxReturn($data,'JSON');

    }
}