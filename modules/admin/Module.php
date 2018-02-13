<?php

namespace app\modules\admin;

use yii;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init() {
        parent::init();

        //Yii::$app->getModule('admin')->get('admin')->setIdentity();
        //Yii::app()->user->setStateKeyPrefix("_{$this->id}");

        parent::init();

    }

}
