<?php

return [
    'translations' => [
        'core*' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/messages',
            'fileMap' => [
                'core' => 'core.php',
            ],
        ],
        'mail*' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/messages',
            'fileMap' => [
                'mail' => 'mail/content.php',
                'mail/subject' => 'mail/subject.php',
            ],
        ]
    ],
];
