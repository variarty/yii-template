<?php

return \yii\helpers\ArrayHelper::merge([
    'id'			=> 'App',
    'name'			=> 'Application',
    'basePath'      => dirname(__DIR__),

    'components'	=> [
        /**
         * Yii2 request component.
         * @see http://www.yiiframework.com/doc-2.0/yii-web-request.html
         */
        'request' => [
            'cookieValidationKey' => 'yiiTemplateValidationCookie',
        ],
        /**
         * Yii2 user component
         * @see http://www.yiiframework.com/doc-2.0/yii-web-user.html
         */
        'user' => [
            'identityClass'         => 'common\entities\user\Identity',
            'enableAutoLogin'       => true,
            'loginUrl'              => '/sign-in',
            'authTimeout'			=> 21600, // 6 hours
            'absoluteAuthTimeout'	=> 43200, // 12 hours
        ],
        /**
         * Yii2 urlManager component.
         * @see http://www.yiiframework.com/doc-2.0/yii-web-urlmanager.html
         */
        'urlManager' => require 'urlManager.php',
        /**
         * Yii2 assetManager component.
         * @see http://www.yiiframework.com/doc-2.0/yii-web-assetmanager.html
         */
        'assetManager'	=> [
            'forceCopy' => YII_ENV_DEV,
            'fileMode'  => 509, // AS 0775
            'bundles'   => require 'bundles.php'
        ],
        /**
         * Yii2 Internationalization.
         * @see http://www.yiiframework.com/doc-2.0/guide-tutorial-i18n.html
         */
        'i18n' => require 'i18n.php',
    ],
    'params' => require 'params.php',
], include 'main_dev.php');
