<?php

namespace app\models;

use Yii;

class Order extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'tb_order';
    }

    public function rules() {
        return [
            [['id_user'], 'integer'],
            [['d_date', 'date', 'order_status'], 'safe'],
            [['d_method', 'd_comments'], 'string', 'max' => 250],
            [['d_cash_method', 'd_address'], 'string', 'max' => 255],
            [['anonymousUser'], 'string', 'max' => 350]
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'd_method' => 'D Method',
            'd_cash_method' => 'D Cash Method',
            'd_address' => 'D Address',
            'd_comments' => 'D Comments',
            'd_dated_method' => 'D Date',
            'anonymousUser' => 'Anonymous User',
            'date' => 'Date',
            'order_status'=>'Order_status',
        ];
    }
    
    
    //Возвращает цену доставки в пределах Мкад
    static function PriceDelivery(){
        $price=500;
        return $price;
    }
    
    
     //Возвращает цену доставки За Мкад
    static function PriceDelivery_z(){
        $price=35;
        return $price;
    }
    
    

}
