<?php

return [
    'translations' => [
        'app*' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@app/messages',
            'fileMap' => [
                'app' => 'app.php',
                'app/msg' => 'msg.php',
                'app/error' => 'error.php',
            ],
        ],
    ],
];
