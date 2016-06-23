<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\MinPerkara;

/**
 * MinPerkaraSearch represents the model behind the search form about `frontend\models\MinPerkara`.
 */
class MinPerkaraSearch extends MinPerkara
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'min_id'], 'integer'],
            [['perkara_bil', 'perkara_tajuk', 'perkara_isi', 'perkara_maklumat'], 'safe'],
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
        $query = MinPerkara::find();

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
            'min_id' => $this->min_id,
        ]);

        $query->andFilterWhere(['like', 'perkara_bil', $this->perkara_bil])
            ->andFilterWhere(['like', 'perkara_tajuk', $this->perkara_tajuk])
            ->andFilterWhere(['like', 'perkara_isi', $this->perkara_isi])
            ->andFilterWhere(['like', 'perkara_maklumat', $this->perkara_maklumat]);

        return $dataProvider;
    }
}
