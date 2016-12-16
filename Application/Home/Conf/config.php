<?php
return array(
	//'配置项'=>'配置值'
	
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'voting', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'vote_', // 数据库表前缀
	'DB_CHARSET'=> 'utf8', // 字符集
	'URL_CASE_INSENSITIVE'  =>  true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
	'URL_MODEL'             =>  3, // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
	'DEFAULT_MODULE'        =>  'Home',  // 默认模块
	'DEFAULT_M_LAYER'       =>  'Model', // 默认的模型层名称
	'DEFAULT_C_LAYER'       =>  'Controller', // 默认的控制器层名称
	'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称

	'IMGROOT' => './Public/upload/images/',
	//'SHOW_PAGE_TRACE' =>true,
);