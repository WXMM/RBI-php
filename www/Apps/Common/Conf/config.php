<?php
return array(
    //'配置项'=>'配置值'
    //让页面显示追踪日志信息
    'SHOW_PAGE_TRACE' => false,
    //数据库配置信息
    'DB_TYPE'   =>   'mysql',
    'DB_HOST'   =>   'localhost',
    'DB_NAME'   =>   'rbi_bs',     // 数据库名为rbi
    'DB_USER'   =>   'root',
    'DB_PWD'    =>   '',
    'DB_PORT'   =>   '3306',
    'DB_CHARSET'=>   'utf8',
    'DB_DEBUG'  =>   true,
    //入口文件默认绑定Admin
    'DEFAULT_MODULE' => 'Admin',


    //配置权限登录的相关参数
    'APP_AUTOLOAD_PATH'=>'@.TagLib',
    'SESSION_AUTO_START'=>true,
    'USER_AUTH_ON'              =>true,
    'USER_AUTH_TYPE'            =>2,        // 默认认证类型 1 登录认证 2 实时认证
    'USER_AUTH_KEY'             =>'uid',    // 用户认证SESSION标记
    'ADMIN_AUTH_KEY'            =>'admin',
    'USER_AUTH_MODEL'           =>'User',    // 默认验证数据表模型
    'AUTH_PWD_ENCODER'          =>'md5',    // 用户认证密码加密方式
    'USER_AUTH_GATEWAY'         =>'/Admin/Index/Index',// 默认认证网关
    'NOT_AUTH_MODULE'           =>'Admin',    // 默认无需认证模块
    'REQUIRE_AUTH_MODULE'       =>'',        // 默认需要认证模块
    'NOT_AUTH_ACTION'           =>'',        // 默认无需认证操作
    'REQUIRE_AUTH_ACTION'       =>'',        // 默认需要认证操作
    'GUEST_AUTH_ON'             =>false,    // 是否开启游客授权访问
    'GUEST_AUTH_ID'             =>0,        // 游客的用户ID
    'DB_LIKE_FIELDS'            =>'title|remark',
    'RBAC_ROLE_TABLE'           =>'tb_role',
    'RBAC_USER_TABLE'           =>'tb_role_user',
    'RBAC_ACCESS_TABLE'         =>'tb_access',
    'RBAC_NODE_TABLE'           =>'tb_node',
);