<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/20
 * Time: 8:50
 */
namespace Home\Controller;
use Think\Controller;

class AttachmentEvaluationController extends Controller
{
    public function index(){
        $this->display();
    }
    public function AttachEvaList(){
        //     接收左侧树形菜单的url，获取装置列表
        $res=D('Plantinfo');
        $wor=I('get.wor','');
        $area=I('get.area','');
        $pl=I('get.pl','');
        $fac=I('get.fac','');
        if(empty($wor) && empty($area) && empty($pl) && empty($fac)){
            $res = $res->Relation("Attachevaluaterecord")->select();
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
            $res = $res->where($condition)->Relation("Attachevaluaterecord")->select();
        }
//        var_dump($res);
        $this->assign("res",$res);
        $this->display();
    }
    public function AttachEvaDetail(){
        $info=D('Plantinfo');
        $condition['id']=I("get.id");
        $res = $info->where($condition)->Relation("Attachevaluaterecord")->select();
        $this->assign("res",$res);
        $this->display();
    }
}