<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblCspi;

/**
 * TblCspiSearch represents the model behind the search form about `backend\models\TblCspi`.
 */
class TblCspiSearch extends TblCspi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cspi_id', 'user_id', 'cspi_pekerjaNo'], 'integer'],
            [['cspi_nama', 'cspi_tel'], 'safe'],
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
        $query = TblCspi::find();

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
            'cspi_id' => $this->cspi_id,
            'user_id' => $this->user_id,
            'cspi_pekerjaNo' => $this->cspi_pekerjaNo,
        ]);

        $query->andFilterWhere(['like', 'cspi_nama', $this->cspi_nama])
            ->andFilterWhere(['like', 'cspi_tel', $this->cspi_tel]);

        return $dataProvider;
    }
}
