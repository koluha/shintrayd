<?php

namespace app\models\base;

use Yii;
use yii\web\UploadedFile;
use app\models\base\DFileHelper;

class Catalog {

    //Получить каталог производителей шин

    //Получить каталог производителей Дисков
    public function BrandDisks() {
        $data = Yii::$app->db->createCommand('SELECT manufacturer from tb_nomenclature_disk GROUP BY manufacturer ORDER BY manufacturer')
                ->queryColumn();
        return $data;
    }

    

}
