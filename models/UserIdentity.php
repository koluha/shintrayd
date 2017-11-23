<?php
namespace app\models;

//Класс работает с бд пользователей
class UserIdentity extends User implements \yii\web\IdentityInterface {

    //Передается id, по нему надо запись в бд
    public static function findIdentity($id) {
        return static::findOne($id);
    }

    //Передается token, по нему найти запись в бд
    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }

    public static function findByUsername($username) {
         return static::findOne(['username' => $username]);
    }

    public function getId() {
        return $this->id;
    }

    public function getAuthKey() {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password) {
        return \Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

}
