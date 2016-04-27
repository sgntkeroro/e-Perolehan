<?php

namespace frontend\modules\mesyuarat\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\mesyuarat\models\Jk;

/**
 * JkSearch represents the model behind the search form about `frontend\modules\mesyuarat\models\Jk`.
 */
class JkSearch extends Jk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jk_id'], 'integer'],
            [['jk_nama'], 'safe'],
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
        $query = Jk::find();

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
            'jk_id' => $this->jk_id,
        ]);

        $query->andFilterWhere(['like', 'jk_nama', $this->jk_nama]);

        return $dataProvider;
    }
}
