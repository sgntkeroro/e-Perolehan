<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblUnitkc;

/**
 * TblUnitkcSearch represents the model behind the search form about `backend\models\TblUnitkc`.
 */
class TblUnitkcSearch extends TblUnitkc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ukc_id', 'unit_id'], 'integer'],
            [['ukc_unit'], 'safe'],
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
        $query = TblUnitkc::find();

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
            'ukc_id' => $this->ukc_id,
            'unit_id' => $this->unit_id,
        ]);

        $query->andFilterWhere(['like', 'ukc_unit', $this->ukc_unit]);

        return $dataProvider;
    }
}
