<?php

namespace app\models\base;

use Yii;
use yii\web\UploadedFile;
use app\models\base\DFileHelper;

class Disk {

    //Вернуть бренд по link_brand
    public function GetBrandUrl($url) {
        $data = Yii::$app->db->createCommand("SELECT manufacturer from tb_nomenclature_disk WHERE link_manufacturer='$url' GROUP BY manufacturer")
                ->queryScalar();
        return $data;
    }

    //Вернуть модель по link_model
    public function GetModelUrl($url) {
        $data = Yii::$app->db->createCommand("SELECT model from tb_nomenclature_disk WHERE link_model='$url' GROUP BY model")
                ->queryScalar();
        return $data;
    }

    //Получить каталог производителей Дисков
    public function BrandDisks() {
        $data = Yii::$app->db->createCommand('SELECT manufacturer,link_manufacturer from tb_nomenclature_disk GROUP BY manufacturer ORDER BY manufacturer')
                ->queryAll();
        return $data;
    }

    //Получить модели Дисков по производителю
    public function DisksModels($brand) {
        $data = Yii::$app->db->createCommand("SELECT manufacturer,model,link_manufacturer, link_model from tb_nomenclature_disk WHERE link_manufacturer='$brand' GROUP BY model")
                ->queryAll();
        return $data;
    }

    //Получить модели шин по производителю
    public function DisksModelsList($data) {
        $data = Yii::$app->db->createCommand("SELECT * from tb_nomenclature_disk WHERE link_manufacturer='{$data['link_brand']}' AND link_model='{$data['link_model']}' ORDER BY diametr")
                ->queryAll();
        return $data;
    }

    //Получить модели шин по производителю
    //[]
 //   public function getproduct($id) {
  //      $data = Yii::$app->db->createCommand("SELECT * from tb_nomenclature_disk WHERE id='{$id}'")
  //              ->queryOne();
  //      return $data;
  //  }

    //Получить продукт по артиклу и бренду
    //эту функция чтобы кол-во в корзине при добавлеении не прибавлялось
    public function getproduct($code77, $brand) {
        $data = Yii::$app->db->createCommand('SELECT * from tb_nomenclature_disk WHERE code77=:code77 AND manufacturer=:brand')
                ->bindValue(':code77', $code77)
                ->bindValue(':brand', $brand)
                ->queryOne();

        return $data;
    }

    //Получить карточку продукта по бренду, модели и артиклу
    //Для модели basket
    public function product($data) {
        $params = [
            ':brand' => $data['brand'],
            ':model' => $data['model'],
            ':code77' => $data['code77'],
        ];

        $post = Yii::$app->db->createCommand("SELECT * FROM tb_nomenclature_disk WHERE 
            manufacturer=:brand 
            AND model=:model
            AND code77=:code77 ")->bindValues($params)->queryOne();
        return $post;
    }

    //Формирует поле доп инфо для корзины 
    public function getsize($value) {


        $type = ($value['type']) ? 'Тип: ' . $this->ReverTypeDisksDr($value['type']) : '';
        $color = ($value['color']) ? ' Цвет: ' . $value['color'] : '';

        $diametr = ($value['diametr']) ? ' Диаметр: ' . $value['diametr'] : '';
        $diametr_width = ($value['diametr_width']) ? ' Ширина: ' . $value['diametr_width'] : '';
        $vilet = ($value['vilet']) ? ' Вылет ET: ' . $value['vilet'] : '';
        $pcd = ($value['pcd']) ? ' pcd: ' . $value['pcd'] : '';
        $x_pcd = ($value['x_pcd']) ? 'x ' . $value['x_pcd'] : '';
        $co = ($value['co']) ? ' ЦО: ' . $value['co'] : '';

        $text = $diametr . ' ' . $diametr_width . ' ' . $vilet . ' ' . $pcd . ' ' . $x_pcd . ' ' . $co . '|' . $type . ' ' . $color;

        return $text;
    }

    //Получить каталог производителей шин
    public function BrandDisksDr() {
        $data = Yii::$app->db->createCommand('SELECT link_manufacturer,manufacturer from tb_nomenclature_disk GROUP BY manufacturer ORDER BY manufacturer')
                ->queryAll();
        $r['ALL'] = 'Все производители';
        foreach ($data as $key => $value) {
            $r[$value['link_manufacturer']] = ucfirst(strtolower($value['manufacturer']));
        }
        return $r;
    }

    public function TypeDisksDr() {
        $r['Stalnoy'] = 'Стальной';
        $r['Litoj'] = 'Литой';
        return $r;
    }

    public function TypeDisksDrTop() {
        $r['ALL'] = '';
        $r['Stalnoy'] = 'Стальной';
        $r['Litoj'] = 'Литой';
        return $r;
    }

    public function ReverTypeDisksDr($name) {
        switch ($name) {
            case 'Stalnoy':
                return 'стальной';
                break;
            case 'Litoj':
                return 'литой';
                break;
        }
    }

    //Получить 
    public function ColorDiskDr() {
        $data = Yii::$app->db->createCommand('SELECT color from tb_nomenclature_disk GROUP BY color ORDER BY color')
                ->queryAll();

        $r[] = '';
        foreach ($data as $key => $value) {
            $r[Yii::$app->myhelper->translitUrl($value['color'])] = $value['color'];
        }
        return $r;
    }

    //Если All то ничего не возвращать
    public function ReverAll($name) {
        if ($name != 'ALL') {
            return $name;
        }
    }

    public function DiametrDiskDr() {
        $r1 = SpecifDiskHelper::P_7;
        //   $data[''] = '—';
        foreach ($r1 as $value) {
            $data[$value] = 'R' . $value;
        }
        return $data;
    }

    public function Diametr_widthDiskDr() {
        $r1 = SpecifDiskHelper::P_6;
        $data['ALL'] = 'Все';
        foreach ($r1 as $value) {
            $data[$value] = $value . 'J';
        }
        return $data;
    }

    //PCD
    public function PcdDiskDr() {
        $r1 = SpecifDiskHelper::P_1;
        //  $data[''] = '—';
        foreach ($r1 as $value) {
            $data[$value] = $value;
        }
        return $data;
    }

    //x_PCD 
    public function XpcdDiskDr() {
        $r1 = SpecifDiskHelper::P_4;
        // $data[''] = '—';
        foreach ($r1 as $value) {
            $data[$value] = $value;
        }
        return $data;
    }

    // ET-вылет
    public function EtDiskDr() {
        $r1 = SpecifDiskHelper::P_3;
        $data['ALL'] = 'Все';
        foreach ($r1 as $value) {
            $data[$value] = $value;
        }
        return $data;
    }

    // Co
    public function CoDiskDr() {
        $r1 = SpecifDiskHelper::P_2;
        $data['ALL'] = 'Все';
        foreach ($r1 as $value) {
            $data[$value] = $value;
        }
        return $data;
    }

    public function GetColorUrl($color) {
        $colors = $this->ColorDiskDr();

        foreach ($colors as $key => $value) {
            if ($color == $key) {
                $res = $value;
            }
        }
        return $res;
    }

    static function getImgDisk($model, $vendor) {
        $model = trim($model);
        $scr = '/img/db_disk/';
        $exp = '.jpg';
        $noimage = '/img/noimg.jpg';


        //Заменители
        if ($model == 'Fast Fifteen') {
            $model = 'Fast Fifteen Dark';
        }
        if ($model == 'Kendo') {
            $model = 'Kendo Black Polished';
        }

        if (($vendor == 'Legeartis Concept') || ($vendor == 'Legeartis Optima')) {
            $vendor = 'LegeArtis';
        }

        if (($vendor == 'RPLC') || ($vendor == 'RPLC-Wheels')) {
            $vendor = 'Replica';
        }


        if ($vendor == 'Top Driver') {
            $vendor = 'Replica';
        }
        if (($vendor == 'Yamato Samurai') || ($vendor == 'Yamato Segun')) {
            $vendor = 'Yamato';
        }

        if ($vendor == 'КиК') {
            $vendor = 'K&K';
        }

        if ($vendor == 'DOTZ 4X4 STAHLRADER') {
            $vendor = 'Dotz';
        }





        if ($vendor == 'Kronprinz') {
            //Название дисков отделяем и уберем первое слово
            $arr = explode(" ", $model); //Название диска на массив
            if (!$arr[1]) {
                $arr = explode("-", $model); //Название диска на массив
            }
            $model = trim($arr[1]);
        }




        $img = Yii::$app->db->createCommand('SELECT disk.img FROM db_specif_disk as disk 
                        INNER JOIN db_vendor_disk as vendor ON disk.vendor_key = vendor.id_vendor
                        WHERE name_short=:model AND vendor.vendor=:vendor')
                ->bindValue(':model', $model)
                ->bindValue(':vendor', $vendor)
                ->queryScalar();

        if ($img) {
            $image = $scr . $img . $exp;
            return $image;
        } elseif ($img == '') {

            //Попробуем отделить последний элемент в соседнем столбце
            $arr = explode(" ", $model); //Название диска на массив
            //Последний элемент
            if (count($arr) > 1) {
                //Запись последнего слова в перенную
                $strend = array_pop($arr);
                $model = implode(" ", $arr);

                $img = Yii::$app->db->createCommand('SELECT disk.img FROM db_specif_disk as disk 
                        INNER JOIN db_vendor_disk as vendor ON disk.vendor_key = vendor.id_vendor
                        WHERE name_short=:model AND vendor.vendor=:vendor AND disk.product_name LIKE \'%' . $strend . '%\'')
                        ->bindValue(':model', $model)
                        ->bindValue(':vendor', $vendor)
                        ->queryScalar();
                if ($img) {
                    $image = $scr . $img . $exp;
                    return $image;
                } else {
                    return $noimage;
                }
            } else {
                return $noimage;
            }
        }
    }

    public function search($data) {
        $params = [
            ':diametr' => $data['diametr_disk'],
            ':manufacturer' => $data['manufacturer_disk'], //all
            ':type' => $data['type_disk'],
            ':diametr_width' => $data['diametr_width_disk'], //all
            ':vilet' => $data['et_disk'], //all
            ':pcd' => $data['pcd_disk'],
            ':x_pcd' => $data['x_cd_disk'],
            ':co' => $data['co_disk'], //all
            ':color' => $this->GetColorUrl($data['color']), //all
        ];


        $params_insql = [
            'diametr' => '  diametr=:diametr',
            'type' => ' AND type=:type',
            'manufacturer' => ' AND manufacturer=:manufacturer ', //all
            'diametr_width' => ' AND diametr_width=:diametr_width', //all
            'vilet' => ' AND vilet=:vilet ', //all
            'pcd' => ' AND pcd=:pcd',
            'x_pcd' => ' AND x_pcd=:x_pcd',
            'co' => ' AND co=:co ', //all
            'color' => ' AND color=:color ', //all
        ];

        //если выбранны все производиители
        if ($data['manufacturer_disk'] == 'ALL') {
            unset($params[':manufacturer']);    //Удаляем параметр
            unset($params_insql['manufacturer']);  //Удаляем часть строки в sql
        }

        if ($data['type_disk'] == 'ALL') {
            unset($params[':type']);    //Удаляем параметр
            unset($params_insql['type']);  //Удаляем часть строки в sql
        }

        if ($data['diametr_width_disk'] == 'ALL') {
            unset($params[':diametr_width']);    //Удаляем параметр
            unset($params_insql['diametr_width']);  //Удаляем часть строки в sql
        }

        if ($data['et_disk'] == 'ALL') {
            unset($params[':vilet']);    //Удаляем параметр
            unset($params_insql['vilet']);  //Удаляем часть строки в sql
        }

        if ($data['co_disk'] == 'ALL') {
            unset($params[':co']);    //Удаляем параметр
            unset($params_insql['co']);  //Удаляем часть строки в sql
        }

        if (!$data['et_disk']) {
            unset($params[':vilet']);    //Удаляем параметр
            unset($params_insql['vilet']);  //Удаляем часть строки в sql
        }
        if (!$data['color']) {
            unset($params[':color']);    //Удаляем параметр
            unset($params_insql['color']);  //Удаляем часть строки в sql
        }



        foreach ($params_insql as $key => $val) {
            $test_sql.=$val;
        }

        $list = Yii::$app->db->createCommand("SELECT * FROM tb_nomenclature_disk WHERE $test_sql ORDER BY price_roz")
                        ->bindValues($params)->queryAll();
        return $list;
    }

}
