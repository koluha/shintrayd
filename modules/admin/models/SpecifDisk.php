<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\DbSpecifDisk;

class SpecifDisk extends DbSpecifDisk {

    public function rules() {
        return [
            [['id', 'vendor_key'], 'integer'],
            [['code_product', 'name', 'name_short', 'product_name', 'img', 'imgs', 'p_8', 'p_9', 'p_10', 'p_1', 'p_2', 'p_3', 'p_4', 'p_5', 'p_6', 'p_7'], 'safe'],
        ];
    }

    public function scenarios() {
        return Model::scenarios();
    }

    public function search($params) {
        $query = DbSpecifDisk::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ],
           'pagination' =>['pageSize'  => 200],
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
            'vendor_key' => $this->vendor_key
        ]);

        $query->andFilterWhere(['like', 'code_product', $this->code_product])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'name_short', $this->name_short])
                ->andFilterWhere(['like', 'product_name', $this->product_name])
                ->andFilterWhere(['like', 'img', $this->img])
                ->andFilterWhere(['like', 'imgs', $this->imgs])
                ->andFilterWhere(['like', 'p_8', $this->p_8])
                ->andFilterWhere(['like', 'p_9', $this->p_9])
                ->andFilterWhere(['like', 'p_10', $this->p_10])
                ->andFilterWhere(['like', 'p_1', $this->p_1])
                ->andFilterWhere(['like', 'p_2', $this->p_2])
                ->andFilterWhere(['like', 'p_3', $this->p_3])
                ->andFilterWhere(['like', 'p_4', $this->p_4])
                ->andFilterWhere(['like', 'p_5', $this->p_5])
                ->andFilterWhere(['like', 'p_6', $this->p_6])
                ->andFilterWhere(['like', 'p_7', $this->p_7]);

        return $dataProvider;
    }

}
