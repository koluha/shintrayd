<?php

namespace app\models\base;

use Yii;

class DbSpecifTire extends \yii\db\ActiveRecord {

    private $ob_dbvendortire;
    private $db;

    const TO_PATH_FOLDER = 'img/db_tire/'; //Путь в картинкам
    const EXPANTION = '.jpg';

    public $picture;   // атрибут для хранения загружаемой файла (картинки)
    public $picture_1;   // атрибут для хранения загружаемой файла (картинки_1)
    public $picture_2;   // атрибут для хранения загружаемой файла (картинки_2)
    public $picture_3;   // атрибут для хранения загружаемой файла (картинки_3)
    public $del_img;    // атрибут для удаления уже загруженной файла (картинки) 
    public $del_img_1;    // атрибут для удаления уже загруженной файла (картинки) 
    public $del_img_2;    // атрибут для удаления уже загруженной файла (картинки) 
    public $del_img_3;    // атрибут для удаления уже загруженной файла (картинки) 
    public $list_img; //атрибут содержит основную картинку из хранилища
    public $list_imgs_1; //атрибут содержит загруженный список картинок
    public $list_imgs_2; //атрибут содержит загруженный список картинок
    public $list_imgs_3; //атрибут содержит загруженный список картинок
    public $list_img_val; //атрибут скрытый содержит value основную картинку из хранилища
    public $list_imgs_1_val; //атрибут скрытый содержит value доп картинку 1 из хранилища
    public $list_imgs_2_val; //атрибут скрытый содержит value доп картинку 2 из хранилища
    public $list_imgs_3_val; //атрибут скрытый содержит value доп картинку 3 из хранилища

    public static function tableName() {
        return 'db_specif_tire';
    }

    function init() {
        parent::init();
        $this->ob_dbvendortire = new DbVendorTire;
        $this->db = Yii::$app->db;
    }

    public function rules() {
        return [
            [['vendor_key', 'name', 'name_short', 'product_name'], 'required'],
            [['vendor_key'], 'integer'],
            [['name', 'name_short', 'product_name', 'imgs', 'list_img', 'list_imgs_1', 'list_imgs_2', 'list_imgs_3', 'list_img_val', 'list_imgs_1_val', 'list_imgs_2_val', 'list_imgs_3_val', 'p_1', 'p_2', 'p_3', 'p_4', 'p_6', 'p_7', 'p_8', 'p_9', 'p_10', 'p_11', 'p_12', 'p_5'], 'string'],
            [['code_product'], 'string', 'max' => 255],
            [['imgs'], 'string', 'max' => 200],
            [['picture'], 'file', 'extensions' => 'jpg'],
            [['picture_1'], 'file', 'extensions' => 'jpg'],
            [['picture_2'], 'file', 'extensions' => 'jpg'],
            [['picture_3'], 'file', 'extensions' => 'jpg'],
            [['del_img'], 'boolean'],
            [['del_img_1'], 'boolean'],
            [['del_img_2'], 'boolean'],
            [['del_img_3'], 'boolean'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'code_product' => 'Код товара',
            'vendor_key' => 'Производитель',
            'name' => 'Наименование',
            'name_short' => 'Наименование сокращенное',
            'product_name' => 'Наименование продукта',
            'list_img' => 'Картинка осн.',
            'list_imgs_1' => 'Картинка_1',
            'list_imgs_2' => 'Картинка_2',
            'list_imgs_3' => 'Картинка_3',
            'del_img' => 'Удалить картинку',
            'del_img_1' => 'Удалить картинку 1',
            'del_img_2' => 'Удалить картинку 2',
            'del_img_3' => 'Удалить картинку 3',
            'p_1' => 'Тип автомобиля',
            'p_2' => 'Сезонность',
            'p_3' => 'Ширина профиля',
            'p_4' => 'Диаметр',
            'p_5' => 'Высота профиля',
            'p_6' => 'Индекс скорости',
            'p_7' => 'Индекс нагрузки',
            'p_8' => 'Способ герметизации',
            'p_9' => 'Конструкция',
            'p_10' => 'Технология RunFlat',
            'p_11' => 'Шипы',
            'p_12' => 'Доп. информация',
        ];
    }

    //Получаем зависимые поле из модели vendorDisk
    public function getVendorintire($id) {
        return $this->ob_dbvendortire->getVendor_tire_id($id);
    }

    public function get_to_path_folder() {
        return self::TO_PATH_FOLDER;
    }

    public function get_expansion() {
        return self::EXPANTION;
    }

//Получить массив картинок из столбца imgs
    public function arr_imgs($imgs) {
        $data = explode('|', $imgs);
        return $data;
    }

//Получить строку картинок из массива столбца imgs
    public function str_arr_imgs($srt_imgs) {
        $data = implode('|', $srt_imgs);
        return $data;
    }

//Получить все загруженные картинки 
    static function get_img_all() {

        $data = Yii::$app->db->createCommand('SELECT id,img FROM db_specif_tire WHERE img REGEXP "^_" GROUP BY img')->queryAll();
        if ($data) {
            foreach ($data as $value) {
                $res[$value['id']] = $value['img'];
            }
        } else {
            $res = [];
        }
        return $res;
    }

    static function files_img() {
        $path = \yii\helpers\FileHelper::findFiles('img\db_tire\\', ['only' => ['*.jpg']]);

        foreach ($path as $key => $value) {
            $files[] = basename($value, ".jpg");
        }


        $s_files = $files;
        return $s_files;
    }

//Перебираем значение imgs формируем сплошной массив для допонительных картинок
    static function img_s_all() {
        $data = Yii::$app->db->createCommand('SELECT id,imgs FROM db_specif_tire WHERE imgs REGEXP "^_" GROUP BY imgs')->queryAll();
        if ($data) {
            foreach ($data as $value) {
                $imp = explode('|', $value['imgs']);
                foreach ($imp as $v) {
//$res[][$value['id']]=$v;
//$res[] = ['id' => $value['id'], 'value' => $v];
                    $res_mas[] = $v;
                }
            }
            $res = array_unique($res_mas);
        } else {
            $res = [];
        }
//Убрать 
        return $res;
    }

//Получаем зависимые поле из модели vendorDisk в статике нельзя использовать this
    static function getVendorintire_all() {
        $data = new DbVendorTire;
        return $data->all_vendor_tire();
    }

    //Возвращает значение по ключу -  параметры
    public function get_param($id, $par) {
        if (is_int($id)) {
            switch ($par) {
                case 1:
                    $p_arr = SpecifTireHelper::P_1;
                    break;
                case 2:
                    $p_arr = SpecifTireHelper::P_2;
                    break;
                case 3:
                    $p_arr = SpecifTireHelper::P_3;
                    break;
                case 4:
                    $p_arr = SpecifTireHelper::P_4;
                    break;
                case 5:
                    $p_arr = SpecifTireHelper::P_5;
                    break;
                case 6:
                    $p_arr = SpecifTireHelper::P_6;
                    break;
                case 7:
                    $p_arr = SpecifTireHelper::P_7;
                    break;
                case 8:
                    $p_arr = SpecifTireHelper::P_8;
                    break;
                case 9:
                    $p_arr = SpecifTireHelper::P_9;
                    break;
                case 10:
                    $p_arr = SpecifTireHelper::P_10;
                    break;
                case 11:
                    $p_arr = SpecifTireHelper::P_11;
                    break;
                case 12:
                    $p_arr = SpecifTireHelper::P_12;
                    break;
            }



            foreach ($p_arr as $key => $value) {
                if ($key == $id) {
                    return $value;
                    exit();
                }
            }
        } else {
            return '';
        }
    }

    //Получить список для дробокса параметры
    static function get_arr_param($in) {

        $par = strval($in);
        switch ($par) {
            case 1:
                $p_arr = SpecifTireHelper::P_1;
                return $p_arr;
                break;
            case 2:
                $p_arr = SpecifTireHelper::P_2;
                return $p_arr;
                break;
            case 3:
                $p_arr = SpecifTireHelper::P_3;
                return $p_arr;
                break;
            case 4:
                $p_arr = SpecifTireHelper::P_4;
                return $p_arr;
                break;
            case 5:
                $p_arr = SpecifTireHelper::P_5;
                return $p_arr;
                break;
            case 6:
                $p_arr = SpecifTireHelper::P_6;
                return $p_arr;
                break;
            case 7:
                $p_arr = SpecifTireHelper::P_7;
                return $p_arr;
                break;
            case 8:
                $p_arr = SpecifTireHelper::P_8;
                return $p_arr;
                break;
            case 9:
                $p_arr = SpecifTireHelper::P_9;
                return $p_arr;
                break;
            case 10:
                $p_arr = SpecifTireHelper::P_10;
                return $p_arr;
                break;
            case 11:
                $p_arr = SpecifTireHelper::P_11;
                return $p_arr;
                break;
            case 12:
                $p_arr = SpecifTireHelper::P_12;
                return $p_arr;
                break;
        }
    }

}
