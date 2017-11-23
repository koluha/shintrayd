<?php

namespace app\modules\admin\models\form;

use Yii;
use yii\base\Model;
use app\modules\admin\models\AdminIdentity;

class AdminForm extends Model {

    public $username;
    public $password;
    public $rememberMe = true;
    private $_user = false;

    public function rules() {
        return [
            // username and password are both required
            [['username', 'password'], 'required', 'message' => Yii::t('app', 'Обязательное поле для заполнения')],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => 'Логин администратора',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
        ];
    }

    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверное имя пользователя или пароль.');
            }
        }
    }

    public function loginAdmin() {
        if ($this->validate()) {
            return Yii::$app->getModule('admin')->get('admin')->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    public function getUser() {
        if ($this->_user === false) {
            $this->_user = AdminIdentity::findByUsername($this->username);
        }

        return $this->_user;
    }

}
