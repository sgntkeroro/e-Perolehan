<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblStatmohon;

/**
 * TblStatmohonSearch represents the model behind the search form about `frontend\models\TblStatmohon`.
 */
class TblStatmohonSearch extends TblStatmohon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statMohon_id'], 'integer'],
            [['statMohon_status'], 'safe'],
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
        $query = TblStatmohon::find();

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
            'statMohon_id' => $this->statMohon_id,
        ]);

        $query->andFilterWhere(['like', 'statMohon_status', $this->statMohon_status]);

        return $dataProvider;
    }
}
