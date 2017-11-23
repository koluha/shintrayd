<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\form\ReguserForm;
use app\models\form\LoginForm;
use app\models\User;

class UserController extends Controller {
    /*
      public function behaviors() {
      return [
      'access' => [
      'class' => AccessControl::className(),
      'only' => ['login', 'logout', 'registration'],
      'rules' => [
      [
      'allow' => true,
      'actions' => ['login', 'registration'],
      'roles' => ['?'],
      ],
      [
      'allow' => true,
      'actions' => ['logout'],
      'roles' => ['@'],
      ],
      ],
      'denyCallback' => function ($rule, $action) {
      throw new \Exception('У вас нет доступа к этой странице');
      }
      ],
      ];
      }
     */

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionRegistration() {
        $RegForm = new ReguserForm;
        $RegForm->scenario = ReguserForm::SCENARIO_REGISTER;
        $LoginForm = new LoginForm();
        //load заполняет модель данными
        if ($RegForm->load(Yii::$app->request->post()) && $RegForm->validate()) {
            $RegForm->register();
            $LoginForm->username = $RegForm->username;
            $LoginForm->password = $RegForm->password;

            $LoginForm->login();

            //   if ($RegForm->service_field == 'basket') {
            //      return $this->redirect('/basket/confirmationdata');
            //  } else {
            return $this->goBack();
            //   }
        }
        return $this->render('reguser', ['model' => $RegForm]);
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
                if ($model->service_field == 'basket') {
                    return $this->redirect('/basket/confirmationdata');
                } else {
            return $this->goBack();
                }
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout(false);
        return $this->goHome();
    }

    public function actionProfile() {
        if (!Yii::$app->user->isGuest) {
            return $this->render('profile');
        }
    }

    public function actionUpdate() {
        if (!Yii::$app->user->isGuest) {
            $id = Yii::$app->user->id;

            $RegForm = new ReguserForm;
            $RegForm->scenario = ReguserForm::SCENARIO_UPDATE;
            $user_db = User::findOne($id);
            //Заполняем данными из базы
            $RegForm->attributes = [
                'username' => $user_db->username,
                'fio' => $user_db->fio,
                'phone' => $user_db->phone,
                'email' => $user_db->email,
                'delivery' => $user_db->delivery,
            ];

            if ($RegForm->load(Yii::$app->request->post()) && $RegForm->validate()) {
                $RegForm->update($id);
                return $this->goBack();
            }
            return $this->render('data_profile', ['model' => $RegForm]);
        }
    }

}
