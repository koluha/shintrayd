<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\modules\admin\models\AdminIdentity;
use app\modules\admin\models\form\AdminForm;

class DefaultController extends AppAdminController {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login' ],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
            throw new \Exception('У вас нет доступа к этой странице');
        }
            ],
        ];
    }

    public function actionIndex() {
        if (Yii::$app->getModule('admin')->get('admin')->isGuest) {
            return $this->redirect('/admin/default/adminlogin');
        } else {
            return $this->render('index');
        }
    }

    public function actionAbout() {
        echo 'about';
    }

    public function actionContact() {
        echo 'contact';
    }

    public function actionAdminlogin() {
        $this->layout = 'main_login'; 
        //Если авторизован
        if (!Yii::$app->getModule('admin')->get('admin')->isGuest) {
            return $this->redirect('/admin');
        }


        $model = new AdminForm();
        if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {
            //return $this->goBack();
            return $this->redirect('/admin');
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->getModule('admin')->get('admin')->logout(FALSE);
        return $this->redirect('/admin');
    }

}
