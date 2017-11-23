<?php

namespace app\models\form;

use Yii;
use yii\base\Model;
use yii\jui\DatePicker;

class DeliveryPayment extends Model {

    public $delivery_method; //Способ доставки
    public $address; //Адрес доставки
    public $cash_method; //Способ оплата
    public $date; //Удобная дата доставки
    public $comment; //комментарий 

    const SCENARIO_PICKUP = 'pickup';
    const SCENARIO_ADRES_DELIVERY = 'adres_delivery';

    public function rules() {
        return [
            [['delivery_method', 'cash_method', 'date'], 'required', 'message' => Yii::t('app', 'Обязательное поле для заполнения')],
            [['date', 'comment', 'address'], 'safe'],
//            [['delivery_method', 'cash_method', 'date'], 'required', 'on' => self::SCENARIO_PICKUP, 'message' => Yii::t('app', 'Обязательное поле для заполнения')],

        ];
    }

    public function attributeLabels() {
        return [
            'delivery_method' => 'Способ доставки',
            'cash_method' => 'Способ оплаты',
            'address' => 'Адрес доставки',
            'date' => 'Удобная дата самовывоза',
            'comment' => 'Комментарий'
        ];
    }

}
