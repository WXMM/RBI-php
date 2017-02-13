<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/23
 * Time: 23:37
 */
namespace Admin\Controller;
use Think\Controller;
class DictionaryController extends Controller
{
    public function factoryList(){
        $factory=D("dic_factory");
        $factory=$factory->select();
        $this->assign('factory',$factory);
        $this->display();
    }
    public function workshopList(){
        //select选框内容
        $factory=D("dic_factory");
        $factory=$factory->select();
        $this->assign('factory',$factory);
        //车间列表
        $workshop=D('dic_workshop');
        $workshop=$workshop->select();
        $this->assign('workshop',$workshop);
        $this->display();
    }
    public function areaList(){
        //select选框内容
        $factory=D("dic_factory");
        $factory=$factory->select();
        $this->assign('factory',$factory);

        $workshop=D('dic_workshop');
        $workshop=$workshop->select();
        $this->assign('workshop',$workshop);
        //区域列表
        $area=D('dic_area');
        $area=$area->select();
        $this->assign('area',$area);
        $this->display();
    }
    public function dicList(){
        //select选框内容
        $data['pid']=I('get.pid','');
        $this->assign('index',I('get.pid',''));
        $dicType=D("dic_type");
        $dicType=$dicType->where($data)->select();
        $this->assign('dicType',$dicType);
        //区域列表
        $area=D('dic_area');
        $area=$area->select();
        $this->assign('area',$area);
        $this->display();
    }
    public function dicDetail(){
        //select选框内容
        $data['id']=I('get.id','');
        $data['pid']=I('get.pid','');
        $this->assign('data',$data);
        $content=D("dic_type");
        $content=$content->join('dic_content on dic_type.id=dic_content.pid')->select();
        $this->assign('content',$content);
        $this->display();
    }
    public function addFactory(){
        $factory=D("dic_factory");
        $data['factoryId']=I('post.factoryId','');
        if(I('post.index','')==1){
            $data['id']=I('post.id','');
            $factory=$factory->save($data);
            if($factory){
                echo 1;
            }else{
                echo 10;
            }
        }else if(I('post.index','')==2){
            $factory=$factory->add($data);
            if($factory){
                echo 2;
            }else{
                echo 20;
            }
        }
    }
    public function addWorkshop(){
        $workshop=D('dic_workshop');
        if(I('post.factoryId','')!==''){
        $data['factoryId']=I('post.factoryId','');
        }
        $data['workshopId']=I('post.workshopId','');
        if(I('post.index','')==1){
            $data['id']=I('post.id','');
            $workshop=$workshop->save($data);
            if($workshop){
                echo 1;
            }else{
                echo 10;
            }
        }else if(I('post.index','')==2){
            $factory=$workshop->add($data);
            if($factory){
                echo 2;
            }else{
                echo 20;
            }
        }
    }
    public function addArea(){
        $area=D('dic_area');
        if(I('post.factoryId','')!==''){
            $data['factoryId']=I('post.factoryId','');
        }
        if(I('post.workshopId','')!==''){
            $data['workshopId']=I('post.workshopId','');
        }
        $data['areaId']=I('post.areaId','');
        if(I('post.index','')==1){
            $data['id']=I('post.id','');
            $area=$area->save($data);
            if($area){
                echo 1;
            }else{
                echo 10;
            }
        }else if(I('post.index','')==2){
            $factory=$area->add($data);
            if($factory){
                echo 2;
            }else{
                echo 20;
            }
        }
    }
    public function addDicList(){
        $type=D('dic_type');
        if(I('post.type','')!==''){
            $data['type']=I('post.type','');
            $data['value']=I('post.type','');
        }
        $data['remark']=I('post.remark','');
        if(I('post.index','')==1){
            $data['id']=I('post.id','');
            $type=$type->save($data);
            if($type){
                echo 1;
            }else{
                echo 10;
            }
        }else if(I('post.index','')==2){
            $data['pid']=I('post.pid','');
            $type=$type->add($data);
            if($type){
                echo 2;
            }else{
                echo 20;
            }
        }
    }
    public function addDicDetail(){
        $type=D('dic_content');
        if(I('post.key','')!==''){
            $data['key']=I('post.key','');
            if(I('post.value','')==""){
                $data['value']=I('post.key','');
            }else{
                $data['value']=I('post.value','');
            }
        }
        $data['remark']=I('post.remark','');
        if(I('post.index','')==1){
            $data['id']=I('post.id','');
            $type=$type->save($data);
            if($type){
                echo 1;
            }else{
                echo 10;
            }
        }else if(I('post.index','')==2){
            $data['pid']=I('post.pid','');
            $type=$type->add($data);
            if($type){
                echo 2;
            }else{
                echo 20;
            }
        }
    }
    public function deleteFactory(){
        $factory=D("dic_factory");
        $id=I('post.id','');
        $factory=$factory->delete($id);
        $this->ajaxReturn($factory,'json');
    }
    public function deleteWorkshop(){
        $workshop=D("dic_workshop");
        $id=I('post.id','');
        $workshop=$workshop->delete($id);
        $this->ajaxReturn($workshop,'json');

    }
    public function deleteArea(){
        $area=D("dic_area");
        $id=I('post.id','');
        $area=$area->delete($id);
        $this->ajaxReturn($area,'json');
    }
    public function deleteDicList(){
        $area=D("dic_type");
        $id=I('post.id','');
        $area=$area->delete($id);
        $this->ajaxReturn($area,'json');
    }
    public function deleteDicDetail(){
        $area=D("dic_content");
        $index=I('post.index','');
        $data[$index]=I('post.indexValue','');
        $area=$area->where($data)->delete();
        $this->ajaxReturn($area,'json');
    }

}