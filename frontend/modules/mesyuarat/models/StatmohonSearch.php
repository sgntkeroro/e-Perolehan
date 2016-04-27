<?php

namespace frontend\modules\mesyuarat\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\mesyuarat\models\Statmohon;

/**
 * StatmohonSearch represents the model behind the search form about `frontend\modules\mesyuarat\models\Statmohon`.
 */
class StatmohonSearch extends Statmohon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statMohon_id'], 'integer'],
            [['statMohon_status'], 'safe'],
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
        $query = Statmohon::find();

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
            'statMohon_id' => $this->statMohon_id,
        ]);

        $query->andFilterWhere(['like', 'statMohon_status', $this->statMohon_status]);

        return $dataProvider;
    }
}
