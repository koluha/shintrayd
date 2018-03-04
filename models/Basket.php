<?php

namespace app\models;

use Yii;
use app\models\OrderProduct;
use app\models\Order;
use app\models\base\Disk;
use app\models\base\Tyre;

class Basket extends \yii\db\ActiveRecord {

    private $db;
    private $ob_disk;
    private $ob_tyre;
    private $_order;

    const SESSION_KEY = 'order_id';

    function init() {

        $this->db = Yii::$app->db;
        $this->ob_disk = new Disk;
        $this->ob_tyre = new Tyre;
    }

    /* Добавление товара в корзину. Если это первый товар в корзине, 
     * то необходимо создать запись о новом заказе в таблице order. 
     * Чтобы администратор сайта мог отличать оформленные заказы от тех, 
     * которые ещё в процессе формирования, в таблице order есть поле status. 
     * Затем нужно добавить запись в таблицу order_product. Если данный продукт 
     * уже есть в корзине, новую запись создавать не нужно. Вместо этого нужно 
     * увеличить значение поля count существующей записи. */

    public function Add($data, $count) {

        //Передаем артикул товара и имя номенклатуры диск или шины
        //code77
        $product = $this->product($data['article'], $data['brand'], $data['nomenclature']);

        $link = OrderProduct::findOne([
                    'article' => $data['article'],
                    'brand' => $data['brand'],
                    'type' => $data['nomenclature'],
                    'status' => 0
        ]);

        //Если запись новая создаем ее, в корзину
        if (!$link) {
            $link = new OrderProduct();
        }



        $link->id_order = $this->getOrderId();
        $link->type = $data['nomenclature'];
        $link->brand = $product[($data['nomenclature'] == 'disk' ? 'manufacturer' : 'brand')];
        $link->article = $product['code77'];

        $link->name_product = $product['name'];
        $link->model = $product['model'];

        if ($data['nomenclature'] == 'disk') {
            $link->size = $this->ob_disk->getsize($product);
        } elseif ($data['nomenclature'] == 'tyre') {
            $link->size = $this->ob_tyre->getsize($product);
        }

        // Теперь данные с Js
        //  if (intval($product['total']) >= 4 OR preg_match('/Более/', $product['total'])) {
        //      $count = 4;
        //  } elseif (intval($product['total']) < 4) {
        //      $count = $product['total'];
        //  }
        //
        
        $link->count += $count;
        $link->price = $product['price_roz'];
        $link->status = 0;
        $link->save();
    }

    public function DeleteItem($data) {
        $link = OrderProduct::findOne([
                    'id' => $data['id'],
                    'article' => $data['article'],
                    'brand' => $data['brand'],
                    'type' => $data['type'],
                    'id_order' => $this->getOrderId()
        ]);
        if (!$link) {
            return false;
        }
        return $link->delete();
    }

    public function AdditionItem($data) {
        //Сначало найдем максимальное кол-во в прайсе, есть ли добро на увеличение кол-во

        $product = $this->product($data['article'], $data['brand'], $data['type']);

        $count = 1;
        $link = OrderProduct::findOne([
                    'id' => $data['id'],
                    'article' => $data['article'],
                    'brand' => $data['brand'],
                    'type' => $data['type'],
                    'id_order' => $this->getOrderId()
        ]);
        if (!$link) {
            return false;
        }

        //Если превышает кол-во общее с уже заданным в корзине 
        if (($link->count < intval($product['total'])) || (preg_match('/Более/', $product['total']))) {
            $link->count+= $count;
        }

        $link->update();
    }

    public function SubtractionItem($data) {
        $count = 1;
        $link = OrderProduct::findOne([
                    'id' => $data['id'],
                    'article' => $data['article'],
                    'brand' => $data['brand'],
                    'type' => $data['type'],
                    'id_order' => $this->getOrderId()
        ]);
        if (!$link) {
            return false;
        }
        if ($link->count > 1) {
            $link->count-= $count;
        }
        $link->update();
    }

    //ПОлучить все продукты - прайс диски или шины
    public function product($article, $brand, $nomenclature) {
        if ($nomenclature == 'disk') {
            $model = new Disk;
        } elseif ($nomenclature == 'tyre') {
            $model = new Tyre;
        }
        $list = $model->getproduct($article, $brand);
        return $list;
    }

    public function getOrder() {
        if ($this->_order == null) {
            $this->_order = Order::findOne(['id' => $this->getOrderId()]);
        }
        return $this->_order;
    }

    public function CreateOrder() {
        $order = new Order();
        $order->date = date("Y-m-d H:i:s");
        if ($order->save()) {
            $this->_order = $order;
            return TRUE;
        }
        return FALSE;
    }

    // В Сессию запишем id из таблице order
    private function getOrderId() {
        if (!Yii::$app->session->has(self::SESSION_KEY)) { // проверка на существование
            if ($this->createOrder()) {

                Yii::$app->session->set(self::SESSION_KEY, $this->_order->id);  // запись переменной в сессию.
            }
        }
        return Yii::$app->session->get(self::SESSION_KEY);  // получение переменной из сессии. 
    }

    //Вернуть сессию заказа без ее установки 
    public function takeOrderId() {
        if (Yii::$app->session->has(self::SESSION_KEY)) { // проверка на существование
            return Yii::$app->session->get(self::SESSION_KEY);  // получение переменной из сессии. 
        }
    }

    public function sumTotal() {
        if ($this->takeOrderId()) {
            $sum_total = Yii::$app->db->createCommand('SELECT SUM(price*count) FROM tb_order_product WHERE id_order=:id_order AND status=:status')
                    ->bindValue(':id_order', $this->takeOrderId())
                    ->bindValue(':status', 0)
                    ->queryScalar();
        }
        return ($sum_total) ? $sum_total : 0;
    }

    public function count() {
        if ($this->takeOrderId()) {
            $sum_total = Yii::$app->db->createCommand('SELECT SUM(count) FROM tb_order_product WHERE id_order=:id_order AND status=:status')
                    ->bindValue(':id_order', $this->takeOrderId())
                    ->bindValue(':status', 0)
                    ->queryScalar();
        }
        return ($sum_total) ? $sum_total : 0;
    }

    static function getd_method($key) {
        switch ($key) {
            case 'pickup':
                return "Самовывоз";
                break;
            case 'adres_delivery':
                return "В пределах МКАД " . Order::PriceDelivery() . " руб.";
                break;
            case 'adres_delivery_z':
                return "За пределы МКАД " . Order::PriceDelivery_z() . " руб = 1 км.";
                break;
            case 'transport':
                return "Транспортной компанией";
                break;
        }
    }

    static function getpay_method($key) {
        switch ($key) {
            case 'cash':
                return "Наличными в магазине";
                break;
            case 'card':
                return "Банковской картой";
                break;
            case 'account':
                return "Оплата по счету";
                break;
        }
    }

    //Подготовим массив с выпадающем списком
    static function arr_drop($count) {

        //массив вернет массив списка и активный select
        //По умолчанию 4 шт. кол-во
        $def = 4;
        //Если Более 20 шт
        $max = 30;

        $more = 0;
        $more = preg_match('/Более/', strval($count));
        if ($more) {
            $count = 'Более';
        }


        switch ($count) {

            case ((intval($count) <= 4) AND ( (intval($count) != 0))):      //Если count <= 4 
                for ($i = 1; $i <= $count; $i++) {
                    $arr[$i] = $i;
                }
                $data['items'] = $arr;
                $data['active'] = intval($count);
                return $data;
                break;

            case intval($count) > 4:  //Если count > 4 
                for ($i = 1; $i <= $count; $i++) {
                    $arr[$i] = $i;
                }
                $data['items'] = $arr;
                $data['active'] = $def;
                return $data;
                break;

            case 'Более': // более 

                for ($i = 1; $i <= $max; $i++) {
                    $arr[$i] = $i;
                }
                $data['items'] = $arr;
                $data['active'] = $def;
                return $data;
                break;

            default:
                break;
        }

        //Если count <= 4 
        //Если count = 4 
        //Если count => 4 - 
    }

    public function clean() {
        Yii::$app->session->remove(self::SESSION_KEY);
        Yii::$app->session->remove('user_anon');
    }

}
