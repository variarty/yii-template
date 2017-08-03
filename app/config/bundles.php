<?php

return [
	/**
     * Bootstrap plugin asset.
     * @see http://www.yiiframework.com/doc-2.0/yii-bootstrap-bootstrappluginasset.html
     */
    'yii\bootstrap\BootstrapPluginAsset' => [
        'sourcePath' => '@app/assets/dist',
    ],
    /**
     * Bootstrap asset.
     * http://www.yiiframework.com/doc-2.0/yii-bootstrap-bootstrapasset.html
     */
    'yii\bootstrap\BootstrapAsset' => [
        'sourcePath' => '@app/assets/dist',
    ],
    /**
     * jQuery asset.
     * @see http://www.yiiframework.com/doc-2.0/yii-web-jqueryasset.html
     */
    'yii\web\JqueryAsset' => [
        'js' => [YII_ENV_PROD ? 'jquery.min.js' : 'jquery.js']
    ],
];
