<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\base\Disk;

class SiteController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    public function actionSearch() {
        $request = Yii::$app->request;
        $article = $request->get('article');

        if ($article) {
            $params = [
                ':code77' => $article
            ];

            $data['tyre_list'] = Yii::$app->db->createCommand("SELECT * FROM tb_nomenclature_tyre WHERE code77=:code77")
                            ->bindValues($params)->queryAll();

            $data['disk_list'] = Yii::$app->db->createCommand("SELECT * FROM tb_nomenclature_disk WHERE code77=:code77")
                            ->bindValues($params)->queryAll();



            $data['search'] = $article;
            return $this->render('search', ['data' => $data]);
        } else {
            return $this->render('search_empty');
        }
    }

    public function actionAbout() {
        return $this->render('about');
    }

//О магазине - Aboutstore
    public function actionAboutstore() {
        return $this->render('aboutstore');
    }

//Новости - News
    public function actionNews() {
        return $this->render('news');
    }

//Шиномонтаж - Mounting
    public function actionMounting() {
        return $this->render('mounting');
    }

//Доставка - Delivery
    public function actionDelivery() {
        return $this->render('delivery');
    }

//Ремонт дисков - Repair of disks
    public function actionRepairofdisks() {
        return $this->render('repairofdisks');
    }

    // Сезонное хранение seasonalstorage
    public function actionSeasonalstorage() {
        return $this->render('seasonalstorage');
    }

    // Ремонт и запрака кондиционеров refueling of air conditioners
    public function actionRefuelingairconditioners() {
        return $this->render('refuelingairconditioners');
    }

    //Промывка инжектора washinginjector
    public function actionWashinginjector() {
        return $this->render('washinginjector');
    }

    //Утилизация recycling
    public function actionRecycling() {
        return $this->render('recycling');
    }

//Услуги
    public function actionServices() {
        return $this->render('services');
    }

//Акции
    public function actionPromotions() {
        return $this->render('promotions');
    }

//Аксессуары
    public function actionAccessories() {
        return $this->render('accessories');
    }

    //Автосервис auto_service
    public function actionAutoservice() {
        return $this->render('autoservice');
    }

    //Вопросы и ответы questions_answers
    public function actionQuestions_answers() {
        return $this->render('questions_answers');
    }

    public function actionTest99() {
        $str = 'Fast Fifteen blaze';
        $arr = explode(" ", $str);

        //Последний элемент
        if (count($arr) > 1) {
            $strEnd = array_pop($arr);
            echo $strEnd;
        }
    }

}
