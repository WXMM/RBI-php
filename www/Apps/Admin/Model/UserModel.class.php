<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/6
 * Time: 14:09
 */
namespace Admin\Model;
use Think\Model\RelationModel;
class UserModel extends RelationModel{
    protected $tablePrefix = 'tb_';
    protected $_link = array(
        'Role'=> array(
            'mapping_type'  =>  self::BELONGS_TO,
            'class_name'    =>  'Role',
            'mapping_name'  =>  'Role',
            'foreign_key'   =>  'type'
        )
    );
}