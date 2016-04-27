<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblKatpermohonan;

/**
 * TblKatpermohonanSearch represents the model behind the search form about `backend\models\TblKatpermohonan`.
 */
class TblKatpermohonanSearch extends TblKatpermohonan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['katPermohonan_id'], 'integer'],
            [['katPermohonan_nama'], 'safe'],
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
        $query = TblKatpermohonan::find();

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
            'katPermohonan_id' => $this->katPermohonan_id,
        ]);

        $query->andFilterWhere(['like', 'katPermohonan_nama', $this->katPermohonan_nama]);

        return $dataProvider;
    }
}
