<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblKatpelanggan;

/**
 * TblKatpelangganSearch represents the model behind the search form about `backend\models\TblKatpelanggan`.
 */
class TblKatpelangganSearch extends TblKatpelanggan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pelanggan_id'], 'integer'],
            [['pelanggan_nama'], 'safe'],
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
        $query = TblKatpelanggan::find();

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
            'pelanggan_id' => $this->pelanggan_id,
        ]);

        $query->andFilterWhere(['like', 'pelanggan_nama', $this->pelanggan_nama]);

        return $dataProvider;
    }
}
