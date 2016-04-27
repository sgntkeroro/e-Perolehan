<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblPengesahan;

/**
 * TblPengesahanSearch represents the model behind the search form about `frontend\models\TblPengesahan`.
 */
class TblPengesahanSearch extends TblPengesahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sah_id', 'permohonan_id', 'statSah_id'], 'integer'],
            [['sah_tarikh', 'sah_catitan'], 'safe'],
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
        $query = TblPengesahan::find()
        ->innerjoin ('tbl_permohonan', 'tbl_permohonan.permohonan_id = tbl_pengesahan.permohonan_id')
        ->where (['tbl_permohonan.dekan_id'=>Yii::$app->user->identity->id]);

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
            'sah_id' => $this->sah_id,
            'permohonan_id' => $this->permohonan_id,
            'statSah_id' => $this->statSah_id,
            'sah_tarikh' => $this->sah_tarikh,
        ]);

        $query->andFilterWhere(['like', 'sah_catitan', $this->sah_catitan]);

        return $dataProvider;
    }
}
