<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/12
 * Time: 15:29
 */
namespace Home\Model;
use Think\Model\RelationModel;
class PlantwallboardinfoModel extends RelationModel{
    protected $tablePrefix = 'tb_';
    protected $_link = array(
        'MeasurethicknessrecordWallOrigin'=> array(
            'mapping_type'  =>  self::HAS_MANY,
            'class_name'    =>  'MeasurethicknessrecordWallOrigin',
            'mapping_name'  =>  'MeasurethicknessrecordWallOrigin',
            'foreign_key'   =>  'pid'
        )

    );

}