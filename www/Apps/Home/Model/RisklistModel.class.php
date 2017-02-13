<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/21
 * Time: 10:06
 */

namespace Home\Model;
use Think\Model\RelationModel;
class RisklistModel extends RelationModel{
    protected $tablePrefix = 'tb_';
    protected $_link = array(
        'Riskdetail'=> array(
            'mapping_type'  =>  self::HAS_MANY,
            'class_name'    =>  'Riskdetail',
            'mapping_name'  =>  'Riskdetail',
            'foreign_key'   =>  'pid',
        ),
        'Plantinfo' => array(
            'mapping_type'  => self::BELONGS_TO,
            'class_name'    => 'Plantinfo',
            'foreign_key'   => 'pid',
            'mapping_name'  => 'Plantinfo',
            'as_fields'     => 'factoryId,workshopId,areaId,plantNO,plantName'
        )

    );
}