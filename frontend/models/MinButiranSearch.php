<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\MinButiran;

/**
 * MinButiranSearch represents the model behind the search form about `frontend\models\MinButiran`.
 */
class MinButiranSearch extends MinButiran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['minit_bil', 'minit_tarikh', 'minit_masa', 'minit_tempat', 'minit_notakaki'], 'safe'],
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
        $query = MinButiran::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'minit_bil', $this->minit_bil])
            ->andFilterWhere(['like', 'minit_tarikh', $this->minit_tarikh])
            ->andFilterWhere(['like', 'minit_masa', $this->minit_masa])
            ->andFilterWhere(['like', 'minit_tempat', $this->minit_tempat])
            ->andFilterWhere(['like', 'minit_notakaki', $this->minit_notakaki]);

        return $dataProvider;
    }
}
