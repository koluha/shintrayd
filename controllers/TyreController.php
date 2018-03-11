<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\base\Tyre;
use yii\web\Request;

class TyreController extends Controller {

    private $ob_tyre;
    private $rq;
    private $priority_season;
    private $session;

    public function init() {
        $this->ob_tyre = new Tyre();
        $this->rq = Yii::$app->request;
        $this->session = Yii::$app->session;

        $this->priority_season = Yii::$app->params['season_tyre'];
    }

    //Каталог шин
    public function actionIndex() {
        //бренды производитель->модели->карточка модели
        $brand = $this->rq->get('brand');
        $season = $this->rq->get('season');
        $model = $this->rq->get('model');
        $param = $this->rq->get('param');
        $coefficient = $this->rq->get('coefficient');
        $code77 = $this->rq->get('code77');
        //Приходные данные 
        $col_param = $param ? $this->ob_tyre->column_param_tyre($param) : '';
        $col_coefficient = $coefficient ? $this->ob_tyre->column_coefficient_tyre($coefficient) : '';

        $data = [
            'brand' => $this->ob_tyre->GetBrandUrl($brand),
            'link_brand' => $brand,
            'model' => $this->ob_tyre->GetModelUrl($model),
            'link_model' => $model,
            'season' => $season,
            'shirina' => ($col_param[0]) ? $col_param[0] : '',
            'profil' => ($col_param[1]) ? $col_param[1] : '',
            'diametr' => ($col_param[2]) ? $col_param[2] : '',
            'k_load' => ($col_coefficient[0]) ? $col_coefficient[0] : '',
            'k_speed' => ($col_coefficient[1]) ? $col_coefficient[1] : '',
            'code77' => $code77
        ];


        if (!$season) {
            $season = $this->priority_season;
        }


        //1-шаг Начальная страница всех бренд производителей
        if (!$brand) {
            $sw = 'manufacturers';
        }
        //2-шаг Cтраница всех моделей
        if ($brand && !$model) {
            $sw = 'models';
        }
        //3-шаг Cтраница модификаций выбранной модели
        if ($brand && $season && $model) {
            $sw = 'modification';
        }

        //4-шаг Cтраница листа выбранной модели
        if ($brand && $season && $model && $param && $coefficient && $code77) {
            $sw = 'product';
        }

        switch ($sw) {
            case 'manufacturers':
                $data_tyres = $this->ob_tyre->BrandTyres();
                return $this->render('index', ['data' => $data_tyres]); // список производ.
                break;

            case 'models':
                $date_models = $this->ob_tyre->TyresModels($brand, $season);
                $res = ['brand' => $this->ob_tyre->GetBrandUrl($brand), 'date_models' => $date_models];
                return $this->render('models', ['data' => $res]); // список производ. моделей
                break;

            case 'modification':
                $date_list = $this->ob_tyre->TyresModelsList($data);
                $data['list'] = $date_list;
                return $this->render('modification', ['data' => $data]); // карточка модифик
                break;

            case 'product':
                $product = $this->ob_tyre->product($data);
                return $this->render('product', ['data' => $product]);
        }
    }

    public function actionSearch() {
        //Получить данные с формы поиска
        $data = [
            'brand' => $this->rq->get('brand'),
            'season' => $this->rq->get('season'), //S or W  
            'shirina' => $this->rq->get('shirina'),
            'profil' => $this->rq->get('profil'),
            'diametr' => $this->rq->get('diametr'),
            'spikes' => $this->rq->get('spikes'),
            'not_spikes' => $this->rq->get('not_spikes'),
            'runflat' => $this->rq->get('runflat'),
            'coef_speed' => $this->rq->get('coef_speed')
        ];

        //Записать данные  в сессию
        unset($this->session['search_tyre']);
        $this->session['search_tyre'] = new \ArrayObject;
        $this->session['search_tyre']['brand'] = $data['brand'];
        $this->session['search_tyre']['season'] = $data['season'];
        $this->session['search_tyre']['shirina'] = $data['shirina'];
        $this->session['search_tyre']['profil'] = $data['profil'];
        $this->session['search_tyre']['diametr'] = $data['diametr'];
        $this->session['search_tyre']['spikes'] = $data['spikes'];
        $this->session['search_tyre']['not_spikes'] = $data['not_spikes'];
        $this->session['search_tyre']['runflat'] = $data['runflat'];
        $this->session['search_tyre']['coef_speed'] = $data['coef_speed'];

        $list = $this->ob_tyre->search($data);

        if (count($list)) {
            return $this->render('list', ['data' => $data, 'list' => $list]);
        } else {
            return $this->render('list_empty', ['data' => $data]);
        }
    }

}
