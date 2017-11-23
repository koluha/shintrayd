<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;

class UploadFile extends Model {

    public $file;

    public function rules() {
        return [
            [['file'], 'file', 'extensions' => 'xls',
                'skipOnEmpty' => false]];
    }

}
