<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/3
 * Time: 10:16
 * 维修记录列表
 */
namespace Home\Model;
use Think\Model\RelationModel;
class PlantmaintancerecordModel extends RelationModel{
    protected $tablePrefix = 'tb_';
    protected $_link = array(
        'Plantmaintancerecordwall'=> array(
            'mapping_type'  =>  self::HAS_MANY,
            'class_name'    =>  'Plantmaintancerecordwall',
            'mapping_name'  =>  'Plantmaintancerecordwall',
            'foreign_key'   =>  'pid',
        ),
    );
}