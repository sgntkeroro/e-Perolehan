<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblSuratpengesahan;

/**
 * TblSuratpengesahanSearch represents the model behind the search form about `backend\models\TblSuratpengesahan`.
 */
class TblSuratpengesahanSearch extends TblSuratpengesahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['suratSah_id', 'permohonan_id', 'suratSah_size'], 'integer'],
            [['suratSah_path', 'suratSah_type', 'suratSah_nama', 'suratSah_tarikh', 'suratSah_deskripsi'], 'safe'],
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
        $query = TblSuratpengesahan::find();

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
            'suratSah_id' => $this->suratSah_id,
            'permohonan_id' => $this->permohonan_id,
            'suratSah_size' => $this->suratSah_size,
            'suratSah_tarikh' => $this->suratSah_tarikh,
        ]);

        $query->andFilterWhere(['like', 'suratSah_path', $this->suratSah_path])
            ->andFilterWhere(['like', 'suratSah_type', $this->suratSah_type])
            ->andFilterWhere(['like', 'suratSah_nama', $this->suratSah_nama])
            ->andFilterWhere(['like', 'suratSah_deskripsi', $this->suratSah_deskripsi]);

        return $dataProvider;
    }
}
