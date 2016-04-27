<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblModerator;

/**
 * TblModeratorSearch represents the model behind the search form about `backend\models\TblModerator`.
 */
class TblModeratorSearch extends TblModerator
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mod_id', 'user_id', 'mod_pekerjaNo', 'bm_id'], 'integer'],
            [['mod_nama', 'mod_tel'], 'safe'],
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
        $query = TblModerator::find();

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
            'mod_id' => $this->mod_id,
            'user_id' => $this->user_id,
            'mod_pekerjaNo' => $this->mod_pekerjaNo,
            'bm_id' => $this->bm_id,
        ]);

        $query->andFilterWhere(['like', 'mod_nama', $this->mod_nama])
            ->andFilterWhere(['like', 'mod_tel', $this->mod_tel]);

        return $dataProvider;
    }
}
