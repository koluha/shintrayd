<?php

namespace app\models;

use Yii;

class User extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'tb_user';
    }

    public function rules() {
        return [
            [['date', 'delivery'], 'safe'],
            [['username', 'password', 'fio'], 'string', 'max' => 150],
            [['phone', 'email'], 'string', 'max' => 80],
            [['auth_key', 'access_token'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'fio' => 'Fio',
            'phone' => 'Phone',
            'email' => 'Email',
            'date' => 'Date',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'delivery' => 'delivery',
        ];
    }
}
