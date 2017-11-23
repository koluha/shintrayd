<?php

namespace app\assets;

use yii\web\AssetBundle;

class JqueryFormAsset extends AssetBundle {

    public $sourcePath = '@vendor/jquery-form/form'; // enter path to source folder
    public $baseUrl = '@vendor';
    public $css = [
    ];
    public $js = [
        'src/jquery.form.js' // jquery-form's js files here
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    
    ];

}
