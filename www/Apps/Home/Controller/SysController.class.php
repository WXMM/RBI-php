<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/8
 * Time: 10:32
 */
namespace Home\Controller;
use Think\Controller;

class SysController extends Controller
{
    public function dic_manage ()
    {
        //获取字典类型
        $res= D('dic_type');
        $res = $res->select();
        $this->assign('res',$res);
        $this->display();
    }
    public function dic_content()
    {
        $type = I('get.type', '');
        $this->assign('type', $type);
        if (!empty($type)) {
            $condition['attachType'] = $type;
        }
        $cont = D('dic_content');
        $cont = $cont->where($condition)->select();
        $this->assign('cont', $cont);
        //修改字典类型内容
        $res = D('dic_content');
        $value=I('post.value', '');
        if(!empty($value)){
            $data['value'] = $value;
            $data['key'] = $value;
            $data['attachType'] = $type;
            $res->data($data)->add();
        }
        $this->display();
    }
    public function delete(){
         $res=D("dic_content");
         $key=I('post.value', '');
         $res=$res->delete($key);
         $this->ajaxReturn($res,"JSON");
    }
}