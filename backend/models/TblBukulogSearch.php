<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblBukulog;

/**
 * TblBukulogSearch represents the model behind the search form about `backend\models\TblBukulog`.
 */
class TblBukulogSearch extends TblBukulog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bukulog_id', 'bukulog_size', 'sort_order'], 'integer'],
            [['bukulog_path', 'bukulog_type', 'bukulog_nama'], 'safe'],
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
        $query = TblBukulog::find();

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
            'bukulog_id' => $this->bukulog_id,
            'bukulog_size' => $this->bukulog_size,
            'sort_order' => $this->sort_order,
        ]);

        $query->andFilterWhere(['like', 'bukulog_path', $this->bukulog_path])
            ->andFilterWhere(['like', 'bukulog_type', $this->bukulog_type])
            ->andFilterWhere(['like', 'bukulog_nama', $this->bukulog_nama]);

        return $dataProvider;
    }
}
