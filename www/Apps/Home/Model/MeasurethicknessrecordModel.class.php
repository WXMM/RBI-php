<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/18
 * Time: 22:26
 */
namespace Home\Model;
use Think\Model\RelationModel;
class MeasurethicknessrecordModel extends RelationModel{
    protected $tablePrefix = 'tb_';
    protected $_link = array(
        'MeasurethicknessrecordWall'=> array(
            'mapping_type'  =>  self::HAS_MANY,
            'class_name'    =>  'MeasurethicknessrecordWall',
            'mapping_name'  =>  'MeasurethicknessrecordWall',
            'foreign_key'   =>  'pid'
        )
    );
}
