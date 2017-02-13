<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/18
 * Time: 22:50
 */
namespace Home\Model;
use Think\Model\RelationModel;
class MeasurethicknessrecordWallModel extends RelationModel{
    protected $tablePrefix = 'tb_';
    protected $_link = array(
        'Plantwallboardinfo'=> array(
            'mapping_type'  =>  self::BELONGS_TO,
            'class_name'    =>  'Plantwallboardinfo',
            'mapping_name'  =>  'Plantwallboardinfo',
            'foreign_key'   =>  'layerGpid',
            'as_fields'     =>  'namelyThickness,useDate:namelyUseDate'
        ),
        'MeasurethicknessrecordWallOrigin'=> array(
            'mapping_type'  =>  self::BELONGS_TO,
            'class_name'    =>  'MeasurethicknessrecordWallOrigin',
            'mapping_name'  =>  'MeasurethicknessrecordWallOrigin',
            'foreign_key'   =>  'layerPid',
            'as_fields'     =>  'thicknessOrigin,thicknessType'
        )
    );

}