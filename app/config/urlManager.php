<?php

return [
    'enablePrettyUrl'		=> true,
    'showScriptName'		=> false,
    'enableStrictParsing'	=> true,
    /**
     * Application routes settings
     * @see http://www.yiiframework.com/doc-2.0/yii-web-urlmanager.html#$rules-detail
     */
    'rules' => [
        // Site section
        'sign-up' => 'site/sign-up',
        'sign-in' => 'site/sign-in',
        'password-reset-request' => 'site/password-reset-request',
        'password-reset/<token:\w+>' => 'site/password-reset',

        // Home section
        '' => 'home/index',
        'sign-out' => 'home/sign-out',
    ]
];
