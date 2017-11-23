<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\Basket;
use app\models\OrderProduct;
use app\models\Order;
use app\models\form\DeliveryPayment;
use app\models\form\ReguserForm;
use app\models\form\LoginForm;
use app\models\User;

class BasketController extends Controller {

    private $rq;
    private $basket;
    private $id_order;
    private $order;
    private $orderProduct;

    public function init() {

        $this->rq = Yii::$app->request;
        $this->basket = new Basket;
        $this->order = new Order;
        $this->orderProduct = new OrderProduct();

        $this->id_order = $this->basket->takeOrderId();  //Получить номер заказа покупателя из сессии
    }

    public function actionIndex() {
        return $this->show();
    }

    public function GetDatadasket() {
        //Получить данные с корзины если есть заказ со статусом 0
        // $id_order = $this->id_order; 
        if ($this->id_order) { //Если заказ все еще в сессии то корзина полная, найдем этот заказ в тб OrderProduct
            $list = OrderProduct::find()
                    ->where(['id_order' => $this->id_order, 'status' => 0])  //Статус 0 еще в корзине
                    ->orderBy('type')
                    ->all();
        }
        if ($list) {

            $data = [
                'list' => $list,
                'sumtotal' => $this->basket->sumTotal(),
                'count' => $this->basket->count()
            ];
        }
        return $data;
    }

    public function Show() {
        $data = $this->GetDatadasket();
        if ($data) {
            return $this->render('_ajaxbasket', ['data' => $data]);
        } elseif (!$this->id_order || !$list) {
            return $this->render('empty');
        }
    }

    public function actionAdd() {
        $data = [
            'count' => Yii::$app->request->post('data_count'),
            'id' => Yii::$app->request->post('data_id'), //id_product
            'article' => Yii::$app->request->post('data_article'),
            'brand' => Yii::$app->request->post('data_brand'),
            'nomenclature' => Yii::$app->request->post('data_nomenclature')
        ];

        $count = $data['count'];

        $basket = new Basket();
        $basket->add($data, $count);

        //  $basket->clean();
        //Обновить блок инфо корзины
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $response = [
            'count' => $basket->count(),
            'sumtotal' => $basket->sumTotal()
        ];
        return $response;
    }

    public function actionDelete() {
        $data = [
            'id' => Yii::$app->request->get('id'),
            'article' => Yii::$app->request->get('article'),
            'brand' => Yii::$app->request->get('brand'),
            'type' => Yii::$app->request->get('type')
        ];

        $basket = new Basket();
        $basket->DeleteItem($data);

        // return $this->show();
        return $this->redirect('/basket/index');
    }

    public function actionAddition() {
        $data = [
            'id' => Yii::$app->request->get('id'),
            'article' => Yii::$app->request->get('article'),
            'brand' => Yii::$app->request->get('brand'),
            'type' => Yii::$app->request->get('type')
        ];

        $basket = new Basket();
        $basket->AdditionItem($data);

        return $this->show();
    }

    public function actionSubtraction() {
        $data = [
            'id' => Yii::$app->request->get('id'),
            'article' => Yii::$app->request->get('article'),
            'brand' => Yii::$app->request->get('brand'),
            'type' => Yii::$app->request->get('type')
        ];

        $basket = new Basket();
        $basket->SubtractionItem($data);

        return $this->show();
    }

    public function actionDeliverypayment() {
        $id_order = $this->basket->takeOrderId();
        if (!$id_order) {
            return $this->redirect('/basket/index');
            exit();
        }

        //Будем добавлять к сущ-ей записи
        $order = Order::findOne([
                    'id' => $id_order
        ]);

        //Если поль-тель Авторизован то извлечем из него адрес доставки
        $user_delivery = '';
        if (!Yii::$app->user->isGuest) {
            $id_user = Yii::$app->user->id;
            $user_db = User::findOne($id_user);
            $user_delivery = $user_db->delivery;
        }



        //Чтобы заполнить форму
        $form = new DeliveryPayment();
        $form->delivery_method = ($order->d_method) ? $order->d_method : 'pickup'; //По умолчанию самовывоз



        $form->address = ($user_delivery) ? $user_delivery : $order->d_address; //Если в тб user есть запись о доставке тогда ее припишем
        $form->cash_method = $order->d_cash_method;
        $form->date = $order->d_date;
        $form->comment = $order->d_comments;

        //$form->delivery_method = 'pickup';

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            //Выбрать сценарий валидации
            $order->d_method = $form->delivery_method;
            $order->d_cash_method = $form->cash_method;
            //Если выбран самовывоз то не будем занисывать адрес доставки
            if ($form->delivery_method == 'pickup') {
                $order->d_address = '';
            } else {
                $order->d_address = $form->address;
            }
            $order->d_comments = $form->comment;
            $order->d_date = $form->date;
            $order->d_price = ($form->delivery_method == 'adres_delivery') ? Order::PriceDelivery() : NULL;

            //запись новую в user по доставке
            if (!Yii::$app->user->isGuest) {
                $user_db->delivery = $form->address;
                $user_db->save();
            }

            if ($order->save()) {
                return $this->redirect(['basket/personaldata']);
            }
        }
        return $this->render('delivery_payment', ['model' => $form]);
    }

    public function actionPersonaldata() {
        $form_reg = new ReguserForm;

        $form_reg->service_field = 'basket'; //В скрытые поля добавим что запрос идет из корзины
        $form_reg->scenario = ReguserForm::SCENARIO_ORDER_BASKET;

        //Это для изменения 
        $session = Yii::$app->session;
        $id_user = $session['user_anon'];

//Зполним форму
        if ($id_user) {
            $user_db = User::findOne($id_user);
            //Заполняем данными из базы
            $form_reg->attributes = [
                'fio' => $user_db->fio,
                'phone' => $user_db->phone,
                'email' => $user_db->email,
            ];
        }


        if ($form_reg->load(Yii::$app->request->post()) && $form_reg->validate()) {



            if ($id_user) {
                $form_reg->update($id_user);
                return $this->redirect('/basket/confirmationdata');
            } else {
                if ($form_reg->register()) {
                    return $this->redirect('/basket/confirmationdata');
                }
            }
        }

        return $this->render('personal_data', ['model_reg' => $form_reg]);
    }

    public function actionPersonaldataOld() {
        $form_reg = new ReguserForm;

        $form_log = new LoginForm;
        //В скрытые поля добавим что запрос идет из корзины
        $form_reg->service_field = 'basket';
        $form_log->service_field = 'basket';

        // 1* Форма авторизации
        if ($form_log->load(Yii::$app->request->post()) && $form_log->validate()) {
            if ($form_log->login()) {
                return $this->redirect('/basket/confirmationdata');
            }
        }

        // 2* Форма Регистрации НЕавторизированный пользователь
        if (Yii::$app->user->isGuest) {
            $form_reg->scenario = ReguserForm::SCENARIO_REGISTER;
            if ($form_reg->load(Yii::$app->request->post()) && $form_reg->validate()) {
                $form_reg->register();
                $form_log->username = $form_reg->username;
                $form_log->password = $form_reg->password;
            }
            if ($form_log->login()) {
                return $this->redirect('/basket/confirmationdata');
            }
        }

        // 3* Форма Данных Авторизированный пользователь, с возможносью изменения
        if (!Yii::$app->user->isGuest) {
            $form_reg->scenario = ReguserForm::SCENARIO_UPDATE;
            $id = Yii::$app->user->id;
            $user_db = User::findOne($id);
            //Заполняем данными из базы
            $form_reg->attributes = [
                'username' => $user_db->username,
                'fio' => $user_db->fio,
                'phone' => $user_db->phone,
                'email' => $user_db->email,
                'delivery' => $user_db->delivery,
            ];

            if ($form_reg->load(Yii::$app->request->post()) && $form_reg->validate()) {
                $form_reg->update($id);
                return $this->redirect('/basket/confirmationdata');
            }
        }

        return $this->render('personal_data', ['model_reg' => $form_reg, 'model_log' => $form_log]);
    }

    public function actionConfirmationdata() {
        //id заказа
        $id_order = $this->basket->takeOrderId();
        if (!$id_order) {
            return $this->redirect('/basket/index');
            exit();
        }

        //id пользователя если регистрация
        // $id = Yii::$app->user->id;
        //При ананимном
        $session = Yii::$app->session;
        $id = $session['user_anon'];

        //Данные корзины
        $dataBasket = $this->GetDatadasket();

        //Данные пользователя
        $user = User::findOne($id);

        //Данные доставки из заказа
        $order = Order::findOne([
                    'id' => $id_order
        ]);


        //После подтвеждения присвоить пользователя к заказу

        return $this->render('confirmation_data', ['data' => $dataBasket, 'user_ob' => $user, 'order' => $order]);
    }

    public function actionConfirmationdataOld() {
        if (!Yii::$app->user->isGuest) {
            //id заказа
            $id_order = $this->basket->takeOrderId();
            if (!$id_order) {
                return $this->redirect('/basket/index');
                exit();
            }

            //id пользователя
            $id = Yii::$app->user->id;



            //Данные корзины
            $dataBasket = $this->GetDatadasket();

            //Данные пользователя
            $user = User::findOne($id);

            //Данные доставки из заказа
            $order = Order::findOne([
                        'id' => $id_order
            ]);


            //После подтвеждения присвоить пользователя к заказу

            return $this->render('confirmation_data', ['data' => $dataBasket, 'user_ob' => $user, 'order' => $order]);
        }
    }

    public function actionFinaldesign() {
        //id заказа
        $id_order = $this->basket->takeOrderId();
        if (!$id_order) {
            return $this->redirect('/basket/index');
            exit();
        }
        //id пользователя
        // $id_user = Yii::$app->user->id;

        $session = Yii::$app->session;
        $id_user = $session['user_anon'];

        //В тб Order отредактироватать поле id_user, добавить зарегистрированного пользователя
        $order = Order::findOne([
                    'id' => $id_order
        ]);
        $order->id_user = $id_user;
        $order->order_status = 1;
        $order->update();

        //Данные пользователя
        $user = User::findOne($id_user);

        //Изменить статус у корзины на 1 т е оформлен

        Yii::$app->db->createCommand("UPDATE tb_order_product AS p 
                                        INNER JOIN tb_order AS o ON o.id = p.id_order
                                        INNER JOIN tb_user AS u ON u.id = o.id_user
                                SET p.status=:status WHERE p.id_order=:id_order AND p.status='0' AND o.id_user=:id_user")
                ->bindValue(':status', 1)
                ->bindValue(':id_order', $id_order)
                ->bindValue(':id_user', $id_user)
                ->execute();

        //Рассылка
        $this->Adminmail();
        $this->Usermail($user->email, $id_order);
        //очистим сессию  
        $this->basket->clean();

        return $this->render('final_confirmation_data', ['id_order' => $id_order]);
    }

    public function Adminmail() {
        Yii::$app->mailer->compose()
                ->setFrom('sitengines@mail.ru')
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject('У вас новый заказ в интернет-магазине шин и дисков')
                ->setTextBody('У вас новый заказ в интернет-магазине шин и дисков для просмотра перейдите в админ панель')
                ->send();
    }

    public function Usermail($email, $id_order) {
        Yii::$app->mailer->compose()
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setTo($email)
                ->setSubject('Ваш в интернет-магазине n-tyre.net шин и дисков')
                ->setTextBody("У вас заказ $id_order в интернет-магазине шин и дисков n-tyre.net,в ближайшее время мы свяжемся с Вами для подтверждения заказа")
                ->send();
    }

    public function actionClear() {
        $this->basket->clean();
    }

}
