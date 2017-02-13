<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/21
 * Time: 10:20
 */
namespace Home\Model;
use Think\Model\RelationModel;
class PlantinfoModel extends RelationModel{
    protected $tablePrefix = 'tb_';
    protected $_link = array(
        'Risklist'=> array(
            'mapping_type'  =>  self::HAS_MANY,
            'class_name'    =>  'Risklist',
            'mapping_name'  =>  'Risklist',
            'foreign_key'   =>  'pid',
        ),
        'Riskcalpara'=> array(
            'mapping_type'  =>  self::HAS_ONE,
            'class_name'    =>  'Riskcalpara',
            'mapping_name'  =>  'Riskcalpara',
            'foreign_key'   =>  'pid',
        ),
        'Plantwallboardinfo'=> array(
            'mapping_type'  =>  self::HAS_MANY,
            'class_name'    =>  'Plantwallboardinfo',
            'mapping_name'  =>  'Plantwallboardinfo',
            'foreign_key'   =>  'pid',
        ),
        'MeasurethicknessrecordOrigin'=> array(
            'mapping_type'  =>  self::HAS_ONE,
            'class_name'    =>  'MeasurethicknessrecordOrigin',
            'mapping_name'  =>  'MeasurethicknessrecordOrigin',
            'foreign_key'   =>  'pid',
        ),
        'MeasurethicknessrecordWallOrigin'=> array(
            'mapping_type'  =>  self::HAS_MANY,
            'class_name'    =>  'MeasurethicknessrecordWallOrigin',
            'mapping_name'  =>  'MeasurethicknessrecordWallOrigin',
            'foreign_key'   =>  'pid',
        ),
        'Meathicknesslist'=> array(
            'mapping_type'  =>  self::HAS_ONE,
            'class_name'    =>  'Meathicknesslist',
            'mapping_name'  =>  'Meathicknesslist',
            'foreign_key'   =>  'pid',
        ),
        'Measurethicknessrecord'=> array(
            'mapping_type'  =>  self::HAS_MANY,
            'class_name'    =>  'Measurethicknessrecord',
            'mapping_name'  =>  'Measurethicknessrecord',
            'foreign_key'   =>  'pid',
        ),
        'Attachevaluaterecord'=> array(
            'mapping_type'  =>  self::HAS_ONE,
            'class_name'    =>  'Attachevaluaterecord',
            'mapping_name'  =>  'Attachevaluaterecord',
            'foreign_key'   =>  'pid',
        ),
        'Riskrecordlist'=> array(
            'mapping_type'  =>  self::HAS_ONE,
            'class_name'    =>  'Riskrecordlist',
            'mapping_name'  =>  'Riskrecordlist',
            'foreign_key'   =>  'pid',
        ),
        'Plantmaintance'=> array(
            'mapping_type'  =>  self::HAS_ONE,
            'class_name'    =>  'Plantmaintance',
            'mapping_name'  =>  'Plantmaintance',
            'foreign_key'   =>  'pid',
        ),
        'Plantmaintancerecord'=> array(
            'mapping_type'  =>  self::HAS_MANY,
            'class_name'    =>  'Plantmaintancerecord',
            'mapping_name'  =>  'Plantmaintancerecord',
            'foreign_key'   =>  'pid',
        ),
        'Plantinspect'=> array(
            'mapping_type'  =>  self::HAS_ONE,
            'class_name'    =>  'Plantinspect',
            'mapping_name'  =>  'Plantinspect',
            'foreign_key'   =>  'pid',
        ),
        'Plantdailymaintainance'=> array(
            'mapping_type'  =>  self::HAS_ONE,
            'class_name'    =>  'Plantdailymaintainance',
            'mapping_name'  =>  'Plantdailymaintainance',
            'foreign_key'   =>  'pid',
        ),
        'Runrecord'=> array(
            'mapping_type'  =>  self::HAS_ONE,
            'class_name'    =>  'Runrecord',
            'mapping_name'  =>  'Runrecord',
            'foreign_key'   =>  'pid',
        ),




    );
}