<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/9
 * Time: 15:53
 */
namespace Home\Controller;
class RiskStatisticsController extends CommonController
{
    public function index(){
        $this->display();
    }
    public function RiskStatisticsFig(){
        $wor      =   I('get.wor','');
        $area     =   I('get.area','');
        $pl       =   I('get.pl','');
        $fac      =   I('get.fac','');
        $plantInfo=D("Plantinfo");


        $user     =D("tb_user");
        $userWhere['id']=$_SESSION[C('USER_AUTH_KEY')];
        $userId=$user->where($userWhere)->select();
        if($userId[0]['workshopId']!=="总公司"){
            $where['workshopId'] = $userId[0]['workshopId'];
        }
        if(empty($wor) && empty($area) && empty($pl) && empty($fac)){

        }else{
            $condition['factoryId']=$fac;
            if(!empty($area)){
                $where['areaId']=$area;
            }
            if(!empty($pl)) {
                $where['id'] = $pl;
            }
        }
        $PlantInfo=$plantInfo->field('id')->where($where)->select();

        $riskStatistics=D("Risklist");
        for($i=0;$i<count($PlantInfo);$i++){
            $riskStatisticsWhere['pid']=$PlantInfo[$i]['id'];
            $Riskstatistics=$riskStatistics->where($riskStatisticsWhere)->order("countDate desc,id desc")->limit(1)->select();
            if($Riskstatistics){
            $RiskStatistics[]=$Riskstatistics[0];
            }
        }
//        var_dump($RiskStatistics);




//        默认查询条件

        $failProLevelArray=array(1,2,3,4,5);
        $consequenceLevelArray=array("A","B","C","D","E");
        $jj=0;
        for($i=0;$i<5;$i++){
            for($ii=0;$ii<5;$ii++){
                $count=0;
                foreach($RiskStatistics as $item){
                    if($item['wallFailProLevel']            ==  $failProLevelArray[$i] &
                        $item['wallConsequenceLevel']       ==  $consequenceLevelArray[$ii])
                        $count++;
                }
                $wallRiskCount[$jj]=$count;
                $jj++;
            }
        }
        $this->assign('wallRiskCount',$wallRiskCount);

        $jj=0;
        for($i=0;$i<5;$i++){
            for($ii=0;$ii<5;$ii++){
                $count=0;
                foreach($RiskStatistics as $item){
                    if($item['floorFailProLevel']            ==  $failProLevelArray[$i] &
                        $item['floorConsequenceLevel']       ==  $consequenceLevelArray[$ii])
                        $count++;
                }
                $floorRiskCount[$jj]=$count;
                $jj++;
            }
        }
        $this->assign('floorRiskCount',$floorRiskCount);

        $riskLevelArray=array("低风险","中风险","中高风险","高风险");
        foreach($riskLevelArray as $rL){
            $countWall=0;
            $countBottom=0;
            foreach($RiskStatistics as $item){
                if($item['wallRiskLevel']   ==  $rL )
                    $countWall++;
            }
            foreach($RiskStatistics as $item){
                if($item['floorRiskLevel']   ==  $rL )
                    $countBottom++;
            }
            $wallPerCount[]=$countWall;
            $floorPerCount[]=$countBottom;
        }

        $this->assign('wallPerCount',$wallPerCount);
        $this->assign('floorPerCount',$floorPerCount);
        $nowDate=date("Y",time());
        $this->assign('nowDate',$nowDate);

        foreach($RiskStatistics as $RS){
            $inspectYear_fu    = substr($RS['wallNextCheckDate'], 0, 4);
            if($inspectYear_fu){
                $inspectYear_fuWall[]=$inspectYear_fu;
            }else{
                $inspectYear_fuWall[]='';
            }
            $inspectYear_fu   = substr($RS['floorNextCheckDate'], 0, 4);
            if($inspectYear_fu){
                $inspectYear_fuBottom[]=$inspectYear_fu;
            }else{
                $inspectYear_fuBottom[]='';
            }
        }
        for($i=0;$i<5;$i++){
            $countWall      =  0;
            $countBottom    =  0;
            foreach($inspectYear_fuWall as $iY){
                if($iY*1 == ($nowDate*1+$i*1)){
                    $countWall++;
                }
            }
            foreach($inspectYear_fuBottom as $iY){
                if($iY*1 == ($nowDate*1+$i*1)){
                    $countBottom++;
                }
            }
            $inspectYear_fuWallFig[]    =  $countWall;
            $inspectYear_fuBottomFig[]  =  $countBottom;
        }
        $countWall=0;
        $countBottom=0;
        foreach($inspectYear_fuWall as $iY){
            if($iY == ''){
                $countWall++;
            }
        }
        foreach($inspectYear_fuBottom as $iY){
            if($iY == ''){
                $countBottom++;
            }
        }
        $inspectYear_fuWallFig[0]    =  $inspectYear_fuWallFig[0]+$countWall;
        $inspectYear_fuBottomFig[0]    =  $inspectYear_fuBottomFig[0]+$countBottom;


        $this->assign('inspectYear_fuWallFig',$inspectYear_fuWallFig);
        $this->assign('inspectYear_fuBottomFig',$inspectYear_fuBottomFig);

        $this->assign('RiskStatistics',$RiskStatistics);




        //        相关文件信息
        $fileWhere['tableId']="RiskList";
        $attachFile=D("tb_attachment");
        $attach=$attachFile->where($fileWhere)->order("addTime")->select();
        $this->assign('attach',$attach);
        $this->display();
    }
    public function RiskStatisticsCount(){
        $index=I("post.index","");
        $riskList=D("Risklist");
        $riskLevelArray=array("低风险","中风险","中高风险","高风险");
        $res=array();
        if($index==1){
            for($i=0;$i<count($riskLevelArray);$i++){
                $where["wallRiskLevel"]=$riskLevelArray[$i];
                $count=$riskList->where($where)->count();
                $res[]=intval($count);
            }
        }elseif($index==2){
            for($i=0;$i<count($riskLevelArray);$i++){
                $where["floorRiskLevel"]=$riskLevelArray[$i];
                $count=$riskList->where($where)->count();
                $res[]=intval($count);
            }
        }
        $this->ajaxReturn($res,"JSON");
    }
    public function riskStatisticsDetail(){
        $wor=I('get.wor','');
        $area=I('get.area','');
        $pl=I('get.pl','');
        $fac=I('get.fac','');
        if(empty($wor) && empty($area) && empty($pl) && empty($fac)){
        }else{
            $condition['factoryId']=$fac;
            if(!empty($wor)){
                $where['workshopId']=$wor;
            }
            if(!empty($area)){
                $where['areaId']=$area;
            }
            if(!empty($pl)) {
                $where['pid'] = $pl;
            }
        }


        $index=I("get.index","");
        $consequence=I("get.consequence","");
        $failPro=I("get.failPro","");
        $riskList=D("Risklist");
        $wallRiskLevel=I("get.wallRiskLevel","");
        if($wallRiskLevel!==""){
            $where["wallRiskLevel"]=$wallRiskLevel;
        }
        $floorRiskLevel=I("get.floorRiskLevel","");
        if($floorRiskLevel!==""){
            $where["floorRiskLevel"]=$floorRiskLevel;
        }
        if($index==1){
//            壁板
            $where['wallConsequenceLevel']=$consequence;
            $where['wallFailPro']=$failPro;
        }elseif($index==2){
            $where['floorConsequenceLevel']=$consequence;
            $where['floorFailPro']=$failPro;
        }

        $mark=I("get.mark","");
        if($mark==1){
            $dateFore=I("get.dateFore","");
            $dateLate=I("get.dateLate","");
            $where["countDate"]=array(array('egt',$dateFore),array('elt',$dateLate));
        }
        $res=$riskList->where($where)->order("countDate")->select();
        $this->assign('res',$res);
        $this->display();
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