<?php

namespace app\models;

use Yii;

class Page extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'tb_page';
    }

    public function rules() {
        return [
            [['title', 'url', 'content'], 'required', 'message' => Yii::t('app', 'Обязательное поле для заполнения')],
            [['content'], 'string'],
            ['url', 'validateUrl'],
            [['title', 'url', 'meta_title', 'meta_keyword', 'meta_description'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'content' => 'Текст',
            'url' => 'Url',
            'meta_title' => 'Meta Title',
            'meta_keyword' => 'Meta Keyword',
            'meta_description' => 'Meta Description',
        ];
    }

    public function validateUrl($attribute, $params) {
        if (!$this->hasErrors()) {

            //Если кроме текущего id есть другие записи с таким же url тогда нельзя редактировать
           // $page = Yii::$app->db->createCommand('SELECT COUNT(*) FROM tb_page WHERE id!=:id AND url=:url')
           //         ->bindValue(':id', $this->id)
           //         ->bindValue(':url', $this->url)
           //         ->queryScalar();


           // $count = Page::find()->where(['url' => $this->url])->scalar();
            //Если новая запись
            
            //$count = Page::find()->where(['url' => 'bmw'])->andWhere(['!=','id', 16])->count();
           
            $count=FALSE;
            if ($count==FALSE) {
                $this->addError($attribute, 'Задайте другой URL, такой уже имеется.');
            }

            //Если редактируемая запись
            // Если id равно записи то редактировать можно
        }
    }

}
