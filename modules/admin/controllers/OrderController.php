<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use app\models\User;
use yii\db\ActiveRecord;

class OrderController extends AppAdminController {

    public function beforeAction($action) {
        if (Yii::$app->getModule('admin')->get('admin')->isGuest) {
            return $this->redirect('/admin/default/adminlogin');
        } else {
            return TRUE;
        }
    }

    public function actionIndex() {

        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM tb_order_product AS p 
                                                    INNER JOIN tb_order AS o ON o.id = p.id_order
                                                    INNER JOIN tb_user AS u ON u.id = o.id_user')->queryScalar();
        $sql = 'SELECT 
                        o.id as key_order,
                        u.id as id_user,
                        u.username,
                        o.id_user as key_user,
                        o.d_method,
                        o.d_cash_method,
                        o.d_address,
                        o.d_comments,
                        o.d_date,
                        o.d_price,
                        o.date,
                        o.anonymousUser,
                        u.delivery,
                        o.order_status
                FROM tb_order AS o 
                    INNER JOIN tb_user AS u ON u.id = o.id_user
                ORDER BY o.date DESC';

        $provider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'attributes' => [
                    'date'
                ],
            ],
        ]);

// возвращает массив данных
        $models = $provider->getModels();
        return $this->render('index', ['provider' => $provider]);
    }

    public function actionUser($id_user) {
        $query = User::find()->where(['id' => $id_user]);

        $provider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // возвращает массив данных
        $models = $provider->getModels();


        return $this->render('user_data', ['provider' => $provider]);
    }

    public function actionList($id_user = null, $id_order) {


        $sum = Yii::$app->db->createCommand('SELECT SUM(p.price) 
                                                      FROM tb_order_product AS p 
                                                INNER JOIN tb_order AS o ON o.id = p.id_order
                                                INNER JOIN tb_user AS u ON u.id = o.id_user
                                            WHERE p.id_order=:id_order')
                ->bindValue(':id_order', $id_order)
                ->queryScalar();

        $count = Yii::$app->db->createCommand('SELECT COUNT(*)  
                                                      FROM tb_order_product AS p 
                                                INNER JOIN tb_order AS o ON o.id = p.id_order
                                                INNER JOIN tb_user AS u ON u.id = o.id_user
                                            WHERE p.id_order=:id_order')
                ->bindValue(':id_order', $id_order)
                ->queryScalar();
        $sql = "SELECT 
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
                    u.username,
                    o.d_price as d_price
                FROM tb_order_product AS p 
       INNER JOIN tb_order AS o ON o.id = p.id_order
       INNER JOIN tb_user AS u ON u.id = o.id_user
WHERE p.id_order='$id_order'";

        $provider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'attributes' => [
                    'status'
                ],
            ],
        ]);

// возвращает массив данных
        $models = $provider->getModels();

        //цена за доставку если в пределах мкад
        if ($models[0]['d_price']) {
            $p_price = $models[0]['d_price'];
        }

        return $this->render('list_data', ['provider' => $provider, 'sum' => $sum, 'p_price' => $p_price]);
    }

}
