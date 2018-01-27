<?php

return !YII_ENV_DEV ? [] : [
    'bootstrap' => ['debug', 'gii'],

    'modules'   => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['*'],
        ],
        'gii' => 'yii\gii\Module',
    ],
];
