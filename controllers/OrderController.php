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

class OrderController extends Controller {

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

    public function actionList() {
        //Если авторизрван
        if (!Yii::$app->user->isGuest) {
            $id_user = Yii::$app->user->id;
            $orders = Yii::$app->db->createCommand('SELECT
                                                        p.id_order,
                                                        p.type,
                                                        p.price,
                                                        p.brand,
                                                        p.article,
                                                        p.name_product,
                                                        p.model,
                                                        p.size,
                                                        p.count,
                                                        p.img,
                                                        p.status,
                                                        u.id,
                                                        u.username
                                                    FROM tb_order_product AS p 
                                                        INNER JOIN tb_order AS o ON o.id = p.id_order
                                                        INNER JOIN tb_user AS u ON u.id = o.id_user
                                                        WHERE u.id=:id_user AND p.status=:status')
                    ->bindValue(':id_user', $id_user)
                    ->bindValue(':status', 1)
                    ->queryAll();
             return $this->render('index', ['data' => $orders]);
        }
    }

}
