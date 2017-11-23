<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\TbNomenclature as TbNomenclatureModel;

class TbNomenclature extends TbNomenclatureModel {

    public function rules() {
        return [
            [['id', 'pid'], 'integer'],
            [['nomenclature', 'product_code', 'b2b_price', 'petail_price', 'min_price', 'in'], 'safe'],
        ];
    }

    public function scenarios() {
        return Model::scenarios();
    }

    public function search($params) {
        $query = TbNomenclatureModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 200],
                       'sort' => [
                'defaultOrder' => [
                    'in' => SORT_DESC
                ]
            ],
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
            'pid' => $this->pid,
        ]);

        $query->andFilterWhere(['like', 'nomenclature', $this->nomenclature])
                ->andFilterWhere(['like', 'product_code', $this->product_code])
                ->andFilterWhere(['like', 'in', $this->in])
                ->andFilterWhere(['like', 'b2b_price', $this->b2b_price])
                ->andFilterWhere(['like', 'petail_price', $this->petail_price])
                ->andFilterWhere(['like', 'min_price', $this->min_price]);

        return $dataProvider;
    }

}
