<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblStatsah;

/**
 * TblStatsahSearch represents the model behind the search form about `frontend\models\TblStatsah`.
 */
class TblStatsahSearch extends TblStatsah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statSah_id'], 'integer'],
            [['statSah_nama'], 'safe'],
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
        $query = TblStatsah::find();

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
            'statSah_id' => $this->statSah_id,
        ]);

        $query->andFilterWhere(['like', 'statSah_nama', $this->statSah_nama]);

        return $dataProvider;
    }
}
