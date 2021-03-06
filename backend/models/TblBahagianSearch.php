<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblBahagian;

/**
 * TblBahagianSearch represents the model behind the search form about `backend\models\TblBahagian`.
 */
class TblBahagianSearch extends TblBahagian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bahagian_id'], 'integer'],
            [['bahagian_nama'], 'safe'],
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
        $query = TblBahagian::find();

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
            'bahagian_id' => $this->bahagian_id,
        ]);

        $query->andFilterWhere(['like', 'bahagian_nama', $this->bahagian_nama]);

        return $dataProvider;
    }
}
