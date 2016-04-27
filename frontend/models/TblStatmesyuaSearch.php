<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblStatmesyua;

/**
 * TblStatmesyuaSearch represents the model behind the search form about `frontend\models\TblStatmesyua`.
 */
class TblStatmesyuaSearch extends TblStatmesyua
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statMesyua_id'], 'integer'],
            [['statMesyua_status'], 'safe'],
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
        $query = TblStatmesyua::find();

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
            'statMesyua_id' => $this->statMesyua_id,
        ]);

        $query->andFilterWhere(['like', 'statMesyua_status', $this->statMesyua_status]);

        return $dataProvider;
    }
}
