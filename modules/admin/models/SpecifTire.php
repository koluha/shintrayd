<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\DbSpecifTire;

class SpecifTire extends DbSpecifTire {

    public function rules() {
        return [
            [['id', 'vendor_key'], 'integer'],
            [['code_product', 'name', 'name_short', 'product_name', 'img', 'imgs', 'p_1', 'p_2', 'p_3', 'p_4', 'p_6', 'p_7', 'p_8', 'p_9', 'p_10', 'p_11', 'p_12', 'p_5'], 'safe'],
        ];
    }

    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params) {
        $query = DbSpecifTire::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ],
            'pagination' => ['pageSize' => 200],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'vendor_key' => $this->vendor_key,
            'img' => $this->img,
        ]);

        $query->andFilterWhere(['like', 'code_product', $this->code_product])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'name_short', $this->name_short])
                ->andFilterWhere(['like', 'product_name', $this->product_name])
                ->andFilterWhere(['like', 'imgs', $this->imgs])
                ->andFilterWhere(['like', 'p_1', $this->p_1])
                ->andFilterWhere(['like', 'p_2', $this->p_2])
                ->andFilterWhere(['like', 'p_3', $this->p_3])
                ->andFilterWhere(['like', 'p_4', $this->p_4])
                ->andFilterWhere(['like', 'p_6', $this->p_6])
                ->andFilterWhere(['like', 'p_7', $this->p_7])
                ->andFilterWhere(['like', 'p_8', $this->p_8])
                ->andFilterWhere(['like', 'p_9', $this->p_9])
                ->andFilterWhere(['like', 'p_10', $this->p_10])
                ->andFilterWhere(['like', 'p_11', $this->p_11])
                ->andFilterWhere(['like', 'p_12', $this->p_12])
                ->andFilterWhere(['like', 'p_5', $this->p_5]);

        return $dataProvider;
    }

}
