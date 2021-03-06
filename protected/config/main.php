<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'微信',
    'language'=>'zh_cn',
    'timeZone' => 'Asia/Shanghai',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),

    'modules'=>array(
        // uncomment the following to enable the Gii tool

        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'admin',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),

        // import jjsg module
        'jjsg'=>array(
        ),

    ),

    // application components
    'components'=>array(
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'caseSensitive'=>false,
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),

        // uncomment the following to use a MySQL database
        'db'=>array(
            'connectionString' => 'mysql:host=127.0.0.1;port=3306;dbname=wechat_test',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8mb4',
        ),
        'gameadm'=>array(
            'connetcionString' => 'mysql:host=10.1.2.254;prot=3306;dbname=gameadm',
            'emulatePrepare' => true,
            'username' => 'game',
            'password' => 'game',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
        ),

        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning, debug, trace',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'neilzhou@123u.com',
    ),
);