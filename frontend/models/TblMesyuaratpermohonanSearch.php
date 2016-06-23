<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblMesyuaratpermohonan;

/**
 * TblMesyuaratpermohonanSearch represents the model behind the search form about `frontend\models\TblMesyuaratpermohonan`.
 */
class TblMesyuaratpermohonanSearch extends TblMesyuaratpermohonan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mesyPerm_id', 'permohonan_id', 'statMesyua_id'], 'integer'],
            [['mesyPerm_tarikh', 'mesyPerm_catitan'], 'safe'],
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
        $query = TblMesyuaratpermohonan::find()
        ->innerjoin ('tbl_permohonan', 'tbl_permohonan.permohonan_id = tbl_mesyuaratpermohonan.permohonan_id')
        ->where (['tbl_permohonan.statMohon_id'=>2])
        ->andWhere (['tbl_permohonan.status_id'=>1]);

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
            'mesyPerm_id' => $this->mesyPerm_id,
            'permohonan_id' => $this->permohonan_id,
            'statMesyua_id' => $this->statMesyua_id,
            'mesyPerm_tarikh' => $this->mesyPerm_tarikh,
        ]);

        $query->andFilterWhere(['like', 'mesyPerm_catitan', $this->mesyPerm_catitan]);

        return $dataProvider;
    }
}
