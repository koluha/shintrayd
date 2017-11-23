<?php

namespace app\models\form;

use Yii;
use yii\base\Model;
use app\models\User;

class ReguserForm extends Model {

    public $username;
    public $password;
    public $password_;
    public $fio;
    public $phone;
    public $email;
    public $date;
    public $delivery;
    public $service_field; //служебное поле

    const SCENARIO_UPDATE = 'update';
    const SCENARIO_REGISTER = 'register';
    const SCENARIO_ORDER_BASKET = 'order';

    public function rules() {
        return [
            //Атрибуты обязательные
            [['username', 'password', 'password_', 'fio', 'phone', 'email'], 'required',
                'on' => self::SCENARIO_REGISTER, 'message' => Yii::t('app', 'Обязательное поле для заполнения')],
            [['username', 'fio', 'phone', 'email'], 'required',
                'on' => self::SCENARIO_UPDATE, 'message' => Yii::t('app', 'Обязательное поле для заполнения')],
            [['fio', 'phone', 'email'], 'required',
                'on' => self::SCENARIO_ORDER_BASKET, 'message' => Yii::t('app', 'Обязательное поле для заполнения')],
            ['username', 'validateLogin',
                'on' => self::SCENARIO_REGISTER],
            [['password', 'password_'], 'safe',
                'on' => self::SCENARIO_UPDATE],
            [['username', 'password', 'password_'], 'safe',
                'on' => self::SCENARIO_ORDER_BASKET],
            ['password_', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают'],
            // атрибут email указывает, что в переменной email должен быть корректный адрес электронной почты
            ['email', 'email', 'message' => Yii::t('app', 'Введите корректный адрес электронной почты')],
            ['email', 'validateEmail',
                'on' => self::SCENARIO_REGISTER],
            ['email', 'email', 'message' => Yii::t('app', 'Введите корректный адрес электронной почты'),
                'on' => self::SCENARIO_ORDER_BASKET],
            // password is validated by validatePassword()
            [['date', 'delivery', 'service_field'], 'safe'],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'password_' => 'Пароль еще раз',
            'fio' => 'Имя, фамилия',
            'phone' => 'Ваш контактный телефон',
            'email' => 'Email',
            'delivery' => 'Информация о доставке'
        ];
    }

    //Логин должен быть уникальным 
    public function validateLogin($attribute, $params) {
        if (!$this->hasErrors()) {
            $username = Yii::$app->db->createCommand('SELECT username FROM tb_user WHERE username=:username')
                    ->bindValue(':username', $this->username)
                    ->queryScalar();
            if (!empty($username)) {
                $this->addError($attribute, 'Такой логин уже существует, придумайте другой');
            }
        }
    }

    //Email должен быть уникальным 
    public function validateEmail($attribute, $params) {
        if (!$this->hasErrors()) {
            $email = Yii::$app->db->createCommand('SELECT email FROM tb_user WHERE email=:email')
                    ->bindValue(':email', $this->email)
                    ->queryScalar();
            if (!empty($email)) {
                $this->addError($attribute, 'Такой email уже существует, придумайте другой');
            }
        }
    }

    //Регистрация пользователя запись в бд
    public function register() {
        $user = new User;
        $user->username = $this->username;
        $user->password = \Yii::$app->getSecurity()->generatePasswordHash($this->password);
        //if (\Yii::$app->getSecurity()->validatePassword($rawUserPassword, $hash) {}
        $user->fio = $this->fio;
        $user->phone = $this->phone;
        $user->email = $this->email;
        $user->date = date("Y-m-d H:i:s");
        $user->delivery = $this->delivery;

        //Если пользователь анонимный тогда добавим в сессию последний его ID


        $save = $user->save();

        $session = Yii::$app->session;
        $session['user_anon'] = $user->id;


        return $save; //Возвращаем что удачно записались данные
    }

    public function update($id) {
        $user = User::findOne($id);
        $user->username = $this->username;
        if ($this->password) {
            $user->password = \Yii::$app->getSecurity()->generatePasswordHash($this->password);
        }
        //if (\Yii::$app->getSecurity()->validatePassword($rawUserPassword, $hash) {}
        $user->fio = $this->fio;
        $user->phone = $this->phone;
        $user->email = $this->email;
        // $user->date = date("Y-m-d H:i:s");
        $user->delivery = $this->delivery;
        $user->save();
    }

}
