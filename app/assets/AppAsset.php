<?php
namespace app\assets;

/**
 * @author Artem Rasskosov
 * @since 16.07.2017
 */
use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = '@app/assets/dist';

    /**
     * @inheritDoc
     */
    public $css = ['css/app.css'];

    /**
     * @inheritDoc
     */
    public $js = [];

    /**
     * @inheritDoc
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
}
