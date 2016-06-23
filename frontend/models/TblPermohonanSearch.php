<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblPermohonan;

/**
 * TblPermohonanSearch represents the model behind the search form about `frontend\models\TblPermohonan`.
 */
class TblPermohonanSearch extends TblPermohonan
{
    public $globalSearch;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['permohonan_id', 'user_id', 'statMohon_id', 'dekan_id', 'status_id'], 'integer'],
            [['permohonan_tarikh', 'globalSearch', 'permohonan_pusatKos'], 'safe'],
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
        $role = Yii::$app->user->identity->role_id;
            
        switch($role){
            case '1' :
            $query = TblPermohonan::find()
            ->where(['user_id' => Yii::$app->user->identity->id])
            ->andWhere(['status_id' => 1]);
            break;

            case '2':
            $query = TblPermohonan::find()->where(['dekan_id' => Yii::$app->user->identity->id]);
            break;

            case '3' :
            $query = TblPermohonan::find();
            break;

            case '4':
            $query = TblPermohonan::find();
            break;
        }
        
        // $query = TblPermohonan::find()->where(['user_id' => Yii::$app->user->identity->id]);

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

        //$query->joinWith('statMohon');
        //$query->joinWith('status');

        // grid filtering conditions
        $query->andFilterWhere([
            'permohonan_id' => $this->permohonan_id,
            'user_id' => $this->user_id,
            'permohonan_tarikh' => $this->permohonan_tarikh,
            'statMohon_id' => $this->statMohon_id,
            'dekan_id' => $this->dekan_id,
            'status_id' => $this->status_id,
        ]);

        $query->andFilterWhere(['like', 'permohonan_pusatKos', $this->permohonan_pusatKos]);
        //->andFilterWhere(['like', 'tbl_statmohon.statMohon_status', $this->statMohon_id])
        //->andFilterWhere(['like', 'tbl_status.status_status', $this->status_id]);

        return $dataProvider;
    }
}
