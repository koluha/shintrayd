<?php

namespace app\assets;

use yii\web\AssetBundle;

class FrontAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css'
    ];
    public $js = [
        'js/basket.js',
        'js/command.js',
        'js/dep_drop.js',
        'js/number_format.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];

}
