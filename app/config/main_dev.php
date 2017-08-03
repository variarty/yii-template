<?php

return !YII_ENV_DEV ? [] : [
    'bootstrap' => ['debug', 'gii'],

    'modules'   => [
        'debug' => 'yii\debug\Module',
        'gii'   => 'yii\gii\Module',
    ],
];
