<?php

namespace app\models;

use Yii;


class OrderProduct extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'tb_order_product';
    }


    public function rules()
    {
        return [
            [['id_order', 'count', 'status'], 'integer'],
            [['article', 'name_product', 'price'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_order' => 'Id Order',
            'article' => 'Article',
            'name_product' => 'Name Product',
            'count' => 'Count',
            'price' => 'Price',
            'status' => 'Status',
        ];
    }
}
