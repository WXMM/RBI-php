<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/18
 * Time: 15:11
 */
namespace Home\Model;
use Think\Model\RelationModel;
class MeasurethicknessrecordWallOriginModel extends RelationModel{
    protected $tablePrefix = 'tb_';
    protected $_link = array(
        'Plantwallboardinfo'=> array(
            'mapping_type'  =>  self::BELONGS_TO,
            'class_name'    =>  'Plantwallboardinfo',
            'mapping_name'  =>  'Plantwallboardinfo',
            'foreign_key'   =>  'layerPid',
            'as_fields'     =>  'height,namelyThickness,useDate:namelyUseDate'
        )
    );

}