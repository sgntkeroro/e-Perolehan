<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblTahun;

/**
 * TblTahunSearch represents the model behind the search form about `backend\models\TblTahun`.
 */
class TblTahunSearch extends TblTahun
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tahun_id', 'tahun_tahun'], 'integer'],
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
        $query = TblTahun::find();

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
            'tahun_id' => $this->tahun_id,
            'tahun_tahun' => $this->tahun_tahun,
        ]);

        return $dataProvider;
    }
}
