<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2016/10/14
 * Time: 10:45
 */
namespace Home\Model;
use Think\Model\RelationModel;
class PlanttestrecordModel extends RelationModel{
    protected $tablePrefix = 'tb_';
    protected $_link = array(
        'Planttestrecordwall'=> array(
            'mapping_type'  =>  self::HAS_MANY,
            'class_name'    =>  'Planttestrecordwall',
            'mapping_name'  =>  'Planttestrecordwall',
            'foreign_key'   =>  'pid',
        ),
    );
}