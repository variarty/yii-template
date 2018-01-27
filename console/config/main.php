<?php

return [
    'id'                    => 'Console',
    'name'                  => 'Console application',
    'bootstrap'             => ['queue'],
    'basePath'              => dirname(__DIR__),
    'controllerNamespace'   => 'console\commands',

    'controllerMap' => [
        /**
         * Change migration path
         * @see http://www.yiiframework.com/doc-2.0/yii-console-controllers-migratecontroller.html
         */
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => null,
            'migrationNamespaces' => [
                'common\migrations',
                'yii\queue\db\migrations',
            ],
        ],
    ],

    'components' => [
        /**
         * Yii2 Queue.
         * @see https://github.com/yiisoft/yii2-queue
         */
        'queue' => require 'queue.php',
    ],

    'params' => require 'params.php',
];
