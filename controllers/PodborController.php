<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\base\Podbor;

class PodborController extends Controller {

    private $db;
    private $rq;
    private $session;
    private $ob_podbor;

    public function init() {
        $this->db = Yii::$app->db;
        $this->rq = Yii::$app->request;


        $this->session = Yii::$app->session;
        $this->ob_podbor = new Podbor;
    }

    public function actionMark($data_name, $data_act) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        //Проверяем какая из форм была отправлена и по ней запомним сессию
        if ($data_act == 'act-tyre') {
            $data_act = '1';
        } elseif ($data_act == 'act-disk') {
            $data_act = '2';
        }

        $params = [':vendor' => $data_name];

        unset($this->session['vendor_id_' . $data_act . '']);
        $this->session->set('vendor_id_' . $data_act . '', $data_name);
        unset($this->session['mark_id_' . $data_act . '']);
        unset($this->session['year_id_' . $data_act . '']);
        unset($this->session['modification_id_' . $data_act . '']);

        $marks = $this->db->createCommand('SELECT DISTINCT car FROM podbor_shini_i_diski WHERE vendor=:vendor ORDER BY car ASC')
                ->bindValues($params)
                ->queryAll();

        $response[] = 'Выберете марку';


        foreach ($marks as $mark) {
            $response[$mark['car']] = $mark['car'];
        }

        return $response;
    }

    public function actionYear($data_name, $data_act) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if ($data_act == 'act-tyre') {
            $data_act = '1';
        } elseif ($data_act == 'act-disk') {
            $data_act = '2';
        }

        $params = [
            ':vendor' => $this->session->get('vendor_id_' . $data_act . ''),
            ':car' => $data_name
        ];

        $this->session->set('mark_id_' . $data_act . '', $data_name);
        unset($this->session['year_id_' . $data_act . '']);
        unset($this->session['modification_id_' . $data_act . '']);

        $years = $this->db->createCommand('SELECT DISTINCT year FROM podbor_shini_i_diski WHERE vendor=:vendor AND car=:car ORDER BY year ASC')
                ->bindValues($params)
                ->queryAll();

        $response[] = 'Выберете год выпуска';
        foreach ($years as $year) {
            $response[$year['year']] = $year['year'];
        }


        return $response;
    }

    public function actionModification($data_name, $data_act) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if ($data_act == 'act-tyre') {
            $data_act = '1';
        } elseif ($data_act == 'act-disk') {
            $data_act = '2';
        }

        $params = [
            ':vendor' => $this->session->get('vendor_id_' . $data_act . ''),
            ':car' => $this->session->get('mark_id_' . $data_act . ''),
            ':year' => $data_name
        ];

        $this->session->set('year_id_' . $data_act . '', $data_name);
        unset($this->session['modification_id_' . $data_act . '']);
        //Еще один post должен быть 

        $modifications = $this->db->createCommand('SELECT DISTINCT modification FROM podbor_shini_i_diski WHERE vendor=:vendor AND car=:car AND year=:year   ORDER BY modification ASC')
                ->bindValues($params)
                ->queryAll();

        $response[] = 'Выберете модификацию';
        foreach ($modifications as $modification) {
            $response[$modification['modification']] = $modification['modification'];
        }


        return $response;
    }

    public function actionLast($data_name, $data_act) {
        if ($data_act == 'act-tyre') {
            $data_act = '1';
        } elseif ($data_act == 'act-disk') {
            $data_act = '2';
        }
        $this->session->set('modification_id_' . $data_act . '', $data_name);
    }

    public function actionSearch() {
        $data = [
            'vendor' => $this->rq->get('vendor'),
            'mark' => $this->rq->get('mark'),
            'year' => $this->rq->get('year'),
            'modification' => $this->rq->get('modification'),
            'season_tyre' => Yii::$app->params['season_tyre'],
        ];

        if ($this->rq->get('form') == 'tyre') {
            try {
                $params = $this->ob_podbor->LastPodbor($data);
                return $this->render('index', ['data' => $data, 'params' => $params]);
            } catch (Exception $ex) {
                
            }
        }elseif ($this->rq->get('form') == 'disk') {
             $params = $this->ob_podbor->LastPodbor($data);
             return $this->render('index_d', ['data' => $data, 'params' => $params]);
        }
    }

}
