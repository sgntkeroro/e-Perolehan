<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblPermohonan;

/**
 * TblPermohonanSearch represents the model behind the search form about `frontend\models\TblPermohonan`.
 */
class TblPermohonanSearch extends TblPermohonan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['permohonan_id', 'user_id', 'statMohon_id', 'dekan_id', 'status_id'], 'integer'],
            [['permohonan_tarikh', 'permohonan_pusatKos'], 'safe'],
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
        $query = TblPermohonan::find();

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
            'permohonan_id' => $this->permohonan_id,
            'user_id' => $this->user_id,
            'permohonan_tarikh' => $this->permohonan_tarikh,
            'statMohon_id' => $this->statMohon_id,
            'dekan_id' => $this->dekan_id,
            'status_id' => $this->status_id,
        ]);

        $query->andFilterWhere(['like', 'permohonan_pusatKos', $this->permohonan_pusatKos]);

        return $dataProvider;
    }
}
