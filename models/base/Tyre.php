<?php

namespace app\models\base;

use Yii;
use yii\web\UploadedFile;
use app\models\base\DFileHelper;

class Tyre {

    //Вернуть бренд по link_brand
    public function GetBrandUrl($url) {
        $data = Yii::$app->db->createCommand("SELECT brand from tb_nomenclature_tyre WHERE link_brand='$url' GROUP BY brand")
                ->queryScalar();
        return $data;
    }

    //Вернуть модель по link_model
    public function GetModelUrl($url) {
        $data = Yii::$app->db->createCommand("SELECT model from tb_nomenclature_tyre WHERE link_model='$url' GROUP BY model")
                ->queryScalar();
        return $data;
    }

    /* Обратное действие */

    //Вернуть из url -> текст
    public function get_brand_url($url_brand) {
        $brand = Yii::$app->db->createCommand("SELECT brand FROM tb_nomenclature_tyre WHERE link_brand='$url_brand'")->queryScalar();
        return $brand;
    }

    //Вернуть из url -> текст
    public function get_model_url($url_model) {
        $model = Yii::$app->db->createCommand("SELECT brand FROM tb_nomenclature_tyre WHERE link_model='$url_model'")->queryScalar();
        return $model;
    }

    public function getproduct($code77, $brand) {
        $data = Yii::$app->db->createCommand("SELECT * from tb_nomenclature_tyre WHERE code77=:code77 AND brand=:brand limit 1")
                ->bindValue(':code77', $code77)
                ->bindValue(':brand', $brand)
                ->queryOne();
        return $data;
    }

    //Формирует поле доп инфо для корзины 
    public function getsize($value) {

        if ($value['season'] == 'W') {
            $season = 'Сезон: зима ';
        } elseif ($value['season'] == 'S') {
            $season = 'Сезон: лето';
        }
        if ($value['spikes'] == 1) {
            $spikes = 'Шины: есть';
        } else {
            $spikes = 'Шины: нет';
        }
        if ($value['runflat'] == 1) {
            $runflat = 'Runflat: да';
        } else {
            $runflat = 'Runflat: да';
        } echo $rext;

        $k_load = ($value['k_load']) ? 'Коэффициент нагрузки:' . $this->dop_load($value['k_load']) : '';
        $k_speed = ($value['k_speed']) ? 'Коэффициент скорости::' . $value['k_speed'] : '';

        $size = $value['shirina'] . ' / ' . $value['profil'] . ' ' . $value['diametr'];

        $text = $size . '|' . $season . ' ' . $spikes . ' ' . $runflat . ' ' . $k_load . ' ' . $k_speed;

        return $text;
    }

//Сформировать url поиск парам диска 
    static function url_param_tyre($shirina, $profil, $diametr) {
        $p = $shirina . '-' . $profil . '-' . $diametr;
        return $p;
    }

    static function url_coefficient_tyre($k_load, $k_speed) {
        $p = $k_load . '-' . $k_speed;
        return $p;
    }

//вернуть ширину[0], профиль[1],диаметр[2]
    public function column_param_tyre($str_param_tyre) {
        $data = explode("-", $str_param_tyre);
        return $data;
    }

//вернуть коэфицент нагрузки[0], коэфицент скорости[1]
    public function column_coefficient_tyre($str_coefficient_tyre) {
        $data = explode("-", $str_coefficient_tyre);
        return $data;
    }

//Получить каталог производителей шин
    public function BrandTyres() {
        $data = Yii::$app->db->createCommand('SELECT link_brand,brand from tb_nomenclature_tyre GROUP BY brand ORDER BY brand')
                ->queryAll();
        return $data;
    }

//Если All то ничего не возвращать
    public function ReverAll($name) {
        if ($name != 'ALL') {
            return $name;
        }
    }

//ORDER BY FIELD(season, "W","S")';
//Получить модели шин по производителю
    public function TyresModels($brand_url, $season = '') {
        switch ($season) {
            case 'S':
                $order = 'AND season="S" GROUP BY model ';
                break;
            case 'W':
                $order = 'AND season="W" GROUP BY model ';
                break;
            case 'SW':
                $order = 'GROUP BY model ORDER BY FIELD(season, "S","W")';
                break;
            case 'WS':
                $order = 'GROUP BY model ORDER BY FIELD(season, "W","S")';
                break;
        }

        $data = Yii::$app->db->createCommand("SELECT brand,model,season,link_brand,link_model from tb_nomenclature_tyre WHERE link_brand='$brand_url' $order ")
                ->queryAll();
        return $data;
    }

//Получить модели шин по производителю
    public function TyresModelsList($data) {
        $data = Yii::$app->db->createCommand("SELECT * from tb_nomenclature_tyre WHERE link_brand='{$data['link_brand']}' AND link_model='{$data['link_model']}' ORDER BY diametr")
                ->queryAll();
        return $data;
    }

//Получить карточку продукта по параметрам
    public function product($data) {
        $params = [
            ':brand' => $data['brand'],
            ':season' => $data['season'],
            //':model' => $data['model'],  Был БАГ когда в названии плюс и поиск не проходил
            ':link_model' => $data['link_model'],
            ':shirina' => $data['shirina'],
            ':profil' => $data['profil'],
            ':diametr' => $data['diametr'],
            ':k_load' => $data['k_load'],
            ':k_speed' => $data['k_speed'],
            ':code77' => $data['code77']
        ];

        $post = Yii::$app->db->createCommand("SELECT * FROM tb_nomenclature_tyre WHERE 
brand=:brand 
AND season=:season
AND link_model=:link_model
AND shirina=:shirina
AND profil=:profil
AND diametr=:diametr
AND k_load=:k_load
AND k_speed=:k_speed 
AND code77=:code77 
")->bindValues($params)->queryOne();
        return $post;
    }

//Подготовка для Дроббокс
//Получить каталог производителей шин
    public function BrandTyresDr() {
        $data = Yii::$app->db->createCommand('SELECT link_brand,brand from tb_nomenclature_tyre GROUP BY brand ORDER BY brand')
                ->queryAll();
        $r['ALL'] = 'Все производители';
        foreach ($data as $key => $value) {
            $r[$value['link_brand']] = ucfirst(strtolower($value['brand']));
        }
        return $r;
    }

    public function TyresSeasonDr() {
        $r['S'] = 'Летние';
        $r['W'] = 'Зимние';
        return $r;
    }

    public function TyresSeasonDrTop() {
        $r['ALL'] = '';
        $r['S'] = 'Летние';
        $r['W'] = 'Зимние';
        return $r;
    }

    public function TyresShirinaDr() {
        $r1 = SpecifTireHelper::P_3;
//ключи будут значения для отправки формы   
        $data['null'] = null;
        foreach ($r1 as $value) {
            $data[$value] = $value;
        }
        return $data;
    }

    public function In_speedTyresDr() {
        $r1 = SpecifTireHelper::P_6;
//ключи будут значения для отправки формы   
        foreach ($r1 as $value) {
            $data[$value] = $value;
        }
        return $data;
    }

    public function TyresProfilDr() {
        $r1 = SpecifTireHelper::P_5;
        $data['—'] = '—';
        foreach ($r1 as $value) {
            $data[$value] = $value;
        }
        return $data;
    }

    public function TyresDiametrDr() {
        $r1 = SpecifTireHelper::P_4;
        $data['null'] = null;
        foreach ($r1 as $value) {
            $data[$value] = $value;
        }
        return $data;
    }

    //Функция для выпадающего списка какой сезон 
    function switch_drop() {
        switch (Yii::$app->params['season_tyre']) {
            case 'SW':
                return 'S';
                break;
            case 'WS':
                return 'W';
                break;
            case 'S':
                return 'S';
                break;
            case 'W':
                return 'W';
                break;
        }
    }

    //Функция какие первые выводить шины Л или З
    function SwitchSeason($season) {
        switch ($season) {
            case 'S':
                $order = 'AND season="S" ORDER BY price_roz';
                return $order;
                break;
            case 'W':
                $order = 'AND season="W" ORDER BY price_roz';
                return $order;
                break;
            case 'SW':
                $order = ' ORDER BY FIELD(season, "S","W"),price_roz';
                return $order;
                break;
            case 'WS':
                $order = 'ORDER BY FIELD(season, "W","S"),price_roz';
                return $order;
                break;
        }
    }

    static function getImgTyre($model) {
        $model = trim($model);
        $scr = '/img/db_tire/';
        $exp = '.jpg';
        $noimage = '/img/noimg.jpg';


        $img = Yii::$app->db->createCommand('SELECT imgs FROM db_specif_tire WHERE name_short=:model')
                ->bindValue(':model', $model)
                ->queryColumn();

        $strimg = explode("|", $img[0]);
        if ($strimg[0]) {




            $image = $scr . $strimg[0] . $exp;
            return $image;
        } else {
            return $noimage;
        }
    }

//Поиск по шинам
    public function search($data) {

        if ($data['season'] == 'ALL' || $data['season'] == '') {
            $order = $this->SwitchSeason(Yii::$app->params['season_tyre']);
        } else {
            $order = $this->SwitchSeason($data['season']);
        }

        ///Шипы или не шипы
        if ($data['not_spikes'] == 1) {
            $data['spikes'] = 0;
        }

        $params = [
            ':brand' => $data['brand'],
//  ':season' => $data['season'],
            ':shirina' => $data['shirina'],
            ':profil' => $data['profil'],
            ':diametr' => $data['diametr'],
            ':runflat' => $data['runflat'],
            ':spikes' => $data['spikes'],
            ':coef_speed' => $data['coef_speed']
        ];

        $params_insql = [
//   'season' => ' season=:season',
            'shirina' => ' shirina=:shirina ',
            'profil' => ' AND profil=:profil ',
            'diametr' => ' AND diametr=:diametr',
            'runflat' => ' AND runflat=:runflat',
            'spikes' => ' AND spikes=:spikes',
            'brand' => ' AND brand=:brand ',
            'coef_speed' => ' AND k_speed=:coef_speed ',
        ];

//если выбранны все производиители
        if ($data['brand'] == 'ALL') {
            unset($params[':brand']);    //Удаляем параметр
            unset($params_insql['brand']);  //Удаляем часть строки в sql
        }

        if (!isset($data['runflat'])) {
            unset($params[':runflat']);    //Удаляем параметр
            unset($params_insql['runflat']);  //Удаляем часть строки в sql
        }

        if (!isset($data['spikes']) && !isset($data['not_spikes'])) {
            unset($params[':spikes']);    //Удаляем параметр
            unset($params_insql['spikes']);  //Удаляем часть строки в sql
        }

        if (empty($data['coef_speed'])) {
            unset($params[':coef_speed']);    //Удаляем параметр
            unset($params_insql['coef_speed']);  //Удаляем часть строки в sql
        }



        foreach ($params_insql as $key => $val) {
            $test_sql.=$val;
        }

        $list = Yii::$app->db->createCommand("SELECT * FROM tb_nomenclature_tyre WHERE $test_sql $order")
                        ->bindValues($params)->queryAll();
        return $list;
    }

    public function Speed($koef) {
        $arr_speed = SpecifTireHelper::SPEED;

        foreach ($arr_speed as $key => $value) {
            if ($key == $koef) {
                return $value;
                break;
            }
        }
        return FALSE;
    }
    
    
    //из 120_50 выполнить 120_50
    public function dop_load($load){
        $r=str_replace("_", "-", $load);
        return $r;
    }

    public function Load($koef) {

        $koef = explode("/", $koef);
        $arr_load = SpecifTireHelper::LOAD;

        foreach ($arr_load as $key => $value) {
            if ($key == $koef[0]) {
                return $value;
                break;
            }
        }
        return FALSE;
    }

}
