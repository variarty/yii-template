<?php
namespace app\assets;

/**
 * Main application asset bundle.
 * @author Artem Rasskosov
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
