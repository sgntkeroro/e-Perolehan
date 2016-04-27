<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblSysop;

/**
 * TblSysopSearch represents the model behind the search form about `backend\models\TblSysop`.
 */
class TblSysopSearch extends TblSysop
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sys_id', 'user_id', 'sys_pekerjaNo'], 'integer'],
            [['sys_nama', 'sys_tel'], 'safe'],
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
        $query = TblSysop::find();

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
            'sys_id' => $this->sys_id,
            'user_id' => $this->user_id,
            'sys_pekerjaNo' => $this->sys_pekerjaNo,
        ]);

        $query->andFilterWhere(['like', 'sys_nama', $this->sys_nama])
            ->andFilterWhere(['like', 'sys_tel', $this->sys_tel]);

        return $dataProvider;
    }
}
