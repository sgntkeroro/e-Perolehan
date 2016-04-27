<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblMesyuaratperalatan;

/**
 * TblMesyuaratperalatanSearch represents the model behind the search form about `backend\models\TblMesyuaratperalatan`.
 */
class TblMesyuaratperalatanSearch extends TblMesyuaratperalatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mesy_id', 'alat_id', 'mesy_kuantiti'], 'integer'],
            [['mesy_jumlahHarga'], 'number'],
            [['mesy_catitan'], 'safe'],
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
        $query = TblMesyuaratperalatan::find();

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
            'mesy_id' => $this->mesy_id,
            'alat_id' => $this->alat_id,
            'mesy_kuantiti' => $this->mesy_kuantiti,
            'mesy_jumlahHarga' => $this->mesy_jumlahHarga,
        ]);

        $query->andFilterWhere(['like', 'mesy_catitan', $this->mesy_catitan]);

        return $dataProvider;
    }
}
