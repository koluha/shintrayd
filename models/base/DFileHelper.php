<?php

namespace app\models\base;

use Yii;
use yii\web\UploadedFile;
use app\models\base\DFileHelper;

class DFileHelper {
        //проверка на существование файла. Если файл с таким именем уже есть, то генерируется следующее имя
    public static function getRandomFileName($path, $extension = '') {
        $extension = $extension ? '.' . $extension : '';
        do {
            $name = md5(microtime() . rand(0, 9999));
            $file = $name.$extension;
        } while (file_exists($file));

        return $name;
    }

}
