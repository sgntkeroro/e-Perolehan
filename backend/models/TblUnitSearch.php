<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblUnit;

/**
 * TblUnitSearch represents the model behind the search form about `backend\models\TblUnit`.
 */
class TblUnitSearch extends TblUnit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unit_id', 'bahagian_id'], 'integer'],
            [['unit_nama'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TblUnit::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'unit_id' => $this->unit_id,
            'bahagian_id' => $this->bahagian_id,
        ]);

        $query->andFilterWhere(['like', 'unit_nama', $this->unit_nama]);

        return $dataProvider;
    }
}
