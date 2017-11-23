<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\base\Disk;

class DiskController extends Controller {

    private $ob_disk;
    private $rq;
    private $session;

    public function init() {
        $this->ob_disk = new Disk();
        $this->rq = Yii::$app->request;
        $this->session = Yii::$app->session;
    }

    public function actionIndex() {
        //бренды производитель->модели->карточка модели
        $brand = $this->rq->get('brand');
        $model = $this->rq->get('model');
        $code77 = $this->rq->get('code77');

        $data = [
            'link_brand' => $brand,
            'link_model' => $model,
            'brand' => $this->ob_disk->GetBrandUrl($brand),
            'model' => $this->ob_disk->GetModelUrl($model),
            'code77' => $code77
        ];

        //1-шаг Начальная страница всех бренд производителей
        if (!$brand && !$model) {
            $sw = 'manufacturers';
        }
        //2-шаг Cтраница всех моделей
        if ($brand && !$model) {
            $sw = 'models';
        }
        //3-шаг Cтраница листа выбранной модели
        if ($brand && $model && !$code77) {
            $sw = 'modification';
        }
        //4-шаг Cтраница листа выбранной модели
        if ($brand && $model && $code77) {
            $sw = 'product';
        }


        switch ($sw) {
            case 'manufacturers':
                $data_tyres = $this->ob_disk->BrandDisks();
                return $this->render('index', ['data' => $data_tyres]);
                break;

            case 'models':
                $date_models = $this->ob_disk->DisksModels($data['link_brand']);
                $res = ['brand' => $this->ob_disk->GetBrandUrl($data['link_brand']), 'date_models' => $date_models];
                return $this->render('models', ['data' => $res]); // список производ. моделей
                break;

            case 'modification':
                $date_list = $this->ob_disk->DisksModelsList($data);
                $data['list'] = $date_list;
                return $this->render('modification', ['data' => $data]); // карточка продукта каталога
                break;

            case 'product':
                $product = $this->ob_disk->product($data);
                return $this->render('product', ['data' => $product]);
        }
    }

    public function actionSearch() {
        //Получить данные с формы поиска

        $data = [
            'manufacturer_disk' => $this->rq->get('manufacturer'), //all
            'type_disk' => $this->rq->get('type'),
            'diametr_disk' => $this->rq->get('diametr'), //S or W  
            'diametr_width_disk' => $this->rq->get('diametr_width'), //all
            'et_disk' => $this->rq->get('et'), //all
            'pcd_disk' => $this->rq->get('pcd'),
            'x_cd_disk' => $this->rq->get('x_cd'),
            'co_disk' => $this->rq->get('co'), //all 
            'color' => $this->rq->get('color')  //all 
        ];

        //Записать данные  в сессию
        
        unset($this->session['search_disk']);
        $this->session['search_disk'] = new \ArrayObject;
        $this->session['search_disk']['manufacturer'] = $data['manufacturer_disk'];
        $this->session['search_disk']['type'] = $data['type_disk'];
        $this->session['search_disk']['diametr'] = $data['diametr_disk'];
        $this->session['search_disk']['diametr_width'] = $data['diametr_width_disk'];
        $this->session['search_disk']['et'] = $data['et_disk'];
        $this->session['search_disk']['pcd'] = $data['pcd_disk'];
        $this->session['search_disk']['x_cd'] = $data['x_cd_disk'];
        $this->session['search_disk']['co'] = $data['co_disk'];
        $this->session['search_disk']['color'] = $data['color'];


        $list = $this->ob_disk->search($data);


        if (count($list)) {
            return $this->render('list', ['data' => $data, 'list' => $list]);
        } else {
            return $this->render('list_empty', ['data' => $data]);
        }
    }

}
