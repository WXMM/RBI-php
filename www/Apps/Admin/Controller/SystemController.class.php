<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/20
 * Time: 12:19
 */
namespace Admin\Controller;
use Think\Controller;
class SystemController extends Controller
{
public function sysInfo(){
    $data['sys']= PHP_OS;
    $data['server']= $_SERVER["SERVER_SOFTWARE"];
    $data['sapi']= php_sapi_name();
    $data['thinkVersion']= THINK_VERSION;
    $data['upload_max']= ini_get('upload_max_filesize');
    $data['time']= date("Y年n月j日");
    $data['serverName']= $_SERVER['SERVER_NAME'];
    $this->assign('data',$data);
    $this->display();
}
}