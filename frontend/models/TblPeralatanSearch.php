<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblPeralatan;

/**
 * TblPeralatanSearch represents the model behind the search form about `frontend\models\TblPeralatan`.
 */
class TblPeralatanSearch extends TblPeralatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alat_id', 'permohonan_id', 'alat_kuantiti', 'jk_id', 'katPelanggan_id', 'katPermohonan_id', 'tahunSedia_id', 'jen_id'], 'integer'],
            [['alat_nama', 'alat_kodAkaun', 'alat_tujuan', 'alat_programBaru', 'alat_tahap', 'alat_pegawai', 'alat_jawatan', 'alat_lokasi'], 'safe'],
            [['alat_hargaUnit', 'alat_jumlahHarga'], 'number'],
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
        $query = TblPeralatan::find();

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
            'alat_id' => $this->alat_id,
            'permohonan_id' => $this->permohonan_id,
            'alat_kuantiti' => $this->alat_kuantiti,
            'alat_hargaUnit' => $this->alat_hargaUnit,
            'alat_jumlahHarga' => $this->alat_jumlahHarga,
            'jk_id' => $this->jk_id,
            'katPelanggan_id' => $this->katPelanggan_id,
            'katPermohonan_id' => $this->katPermohonan_id,
            'tahunSedia_id' => $this->tahunSedia_id,
            'jen_id' => $this->jen_id,

        ]);

        $query->andFilterWhere(['like', 'alat_nama', $this->alat_nama])
            ->andFilterWhere(['like', 'alat_kodAkaun', $this->alat_kodAkaun])
            ->andFilterWhere(['like', 'alat_tujuan', $this->alat_tujuan])
            ->andFilterWhere(['like', 'alat_programBaru', $this->alat_programBaru])
            ->andFilterWhere(['like', 'alat_tahap', $this->alat_tahap])
            ->andFilterWhere(['like', 'alat_pegawai', $this->alat_pegawai])
            ->andFilterWhere(['like', 'alat_jawatan', $this->alat_jawatan])
            ->andFilterWhere(['like', 'alat_lokasi', $this->alat_lokasi]);

        return $dataProvider;
    }
}
