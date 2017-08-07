<?php

return [
    'sourceLanguage'    => 'en-US',
    'language'          => 'ru-RU',
    'bootstrap'         => ['log'],
    'vendorPath'        => dirname(__DIR__) . '/../vendor',

    'components' => [
        /**
         * App Database.
         */
        'db' => require 'db.php',
        /**
         * Yii2 mailer component.
         * @see http://www.yiiframework.com/doc-2.0/yii-swiftmailer-mailer.html
         */
        'mailer' => require 'mailer.php',
        /**
         * Yii2 log component.
         * @see http://www.yiiframework.com/doc-2.0/yii-log-filetarget.html
         */
        'log' => require 'log.php',
        /**
         * Formatter array.
         * @see http://www.yiiframework.com/doc-2.0/yii-i18n-formatter.html
         */
        'formatter' => require 'formatter.php',
        /**
         * Yii2 Internationalization.
         * @see http://www.yiiframework.com/doc-2.0/guide-tutorial-i18n.html
         */
        'i18n' => require 'i18n.php',
    ],
    'params' => require 'params.php',
];
