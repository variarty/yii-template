<?php

return !YII_ENV_DEV ? [] : [
    'bootstrap' => ['debug', 'gii'],

    'modules'   => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '192.168.33.1'],
        ],
        'gii' => 'yii\gii\Module',
    ],
];
