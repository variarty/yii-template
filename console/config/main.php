<?php

return [
    'id'                    => 'Console',
    'name'                  => 'Console application',
    'bootstrap'             => ['log', 'gii'],
    'basePath'              => dirname(__DIR__),
    'controllerNamespace'   => 'console\commands',

    'controllerMap' => [
        /**
         * Change migration path
         * @see http://www.yiiframework.com/doc-2.0/yii-console-controllers-migratecontroller.html
         */
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => '@common/migrations'
        ],
    ],

    'modules' => [
        'gii' => 'yii\gii\Module',
    ],

    'params' => require 'params.php',
];
