<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblDekan;

/**
 * TblDekanSearch represents the model behind the search form about `backend\models\TblDekan`.
 */
class TblDekanSearch extends TblDekan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dekan_id', 'user_id', 'dekan_pekerjaNo'], 'integer'],
            [['dekan_nama', 'dekan_tel'], 'safe'],
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
        $query = TblDekan::find();

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
            'dekan_id' => $this->dekan_id,
            'user_id' => $this->user_id,
            'dekan_pekerjaNo' => $this->dekan_pekerjaNo,
        ]);

        $query->andFilterWhere(['like', 'dekan_nama', $this->dekan_nama])
            ->andFilterWhere(['like', 'dekan_tel', $this->dekan_tel]);

        return $dataProvider;
    }
}
