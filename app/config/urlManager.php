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
        '' => 'home/index',

        // Site section
        'sign-up' => 'site/sign-up',
        'sign-in' => 'site/sign-in',
        'password-recovery' => 'site/password-recovery',
        'password-change/<token:\w+>' => 'site/password-change',
    ]
];
