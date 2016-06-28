<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_peralatan".
 *
 * @property integer $alat_id
 * @property integer $permohonan_id
 * @property string $alat_nama
 * @property string $alat_kodAkaun
 * @property integer $alat_kuantiti
 * @property string $alat_hargaUnit
 * @property string $alat_jumlahHarga
 * @property integer $jk_id
 * @property integer $katPelanggan_id
 * @property string $alat_tujuan
 * @property integer $katPermohonan_id
 * @property string $alat_jenisPeruntukan
 * @property string $alat_programBaru
 * @property string $alat_tahap
 * @property integer $tahunSedia_id
 * @property string $alat_pegawai
 * @property string $alat_jawatan
 * @property string $alat_lokasi
 * @property string $alat_bukuLog
 * @property integer $bukuLog_id
 * @property integer $deleteBukuLog
 * @property integer $sort_order
 *
 * @property TblMesyuaratperalatan[] $tblMesyuaratperalatans
 * @property TblBukulog $bukuLog
 * @property TblPermohonan $permohonan
 * @property TblJk $jk
 * @property TblKatpelanggan $katPelanggan
 * @property TblKatpermohonan $katPermohonan
 * @property TblTahun $tahunSedia
 */
class TblPeralatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_peralatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alat_nama','alat_kuantiti', 'alat_hargaUnit', 'jk_id', 'katPelanggan_id', 'katPermohonan_id', 'jen_id', 'tahunSedia_id', 'alat_lokasi'], 'required'],
            [['permohonan_id', 'alat_kuantiti', 'jk_id', 'katPelanggan_id', 'katPermohonan_id', 'tahunSedia_id', 'jen_id'], 'integer'],
            [['alat_hargaUnit', 'alat_jumlahHarga'], 'number'],
            [['alat_nama', 'alat_kodAkaun', 'alat_tujuan', 'alat_programBaru', 'alat_tahap', 'alat_pegawai', 'alat_jawatan', 'alat_lokasi'], 'string', 'max' => 200],
            // [['bukuLog_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblBukulog::className(), 'targetAttribute' => ['bukuLog_id' => 'bukulog_id']],
            // [['permohonan_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblPermohonan::className(), 'targetAttribute' => ['permohonan_id' => 'permohonan_id']],
            // [['jk_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblJk::className(), 'targetAttribute' => ['jk_id' => 'jk_id']],
            // [['katPelanggan_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblKatpelanggan::className(), 'targetAttribute' => ['katPelanggan_id' => 'pelanggan_id']],
            // [['katPermohonan_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblKatpermohonan::className(), 'targetAttribute' => ['katPermohonan_id' => 'katPermohonan_id']],
            // [['tahunSedia_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblTahun::className(), 'targetAttribute' => ['tahunSedia_id' => 'tahun_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'alat_id' => 'ID',
            'permohonan_id' => 'Permohonan ID',
            'alat_nama' => 'Peralatan',
            'alat_kodAkaun' => 'Kod Akaun',
            'alat_kuantiti' => 'Kuantiti',
            'alat_hargaUnit' => 'Harga Seunit',
            'alat_jumlahHarga' => 'Jumlah Harga',
            'jk_id' => 'Jawatankuasa',
            'katPelanggan_id' => 'Kategori Pelanggan',
            'alat_tujuan' => 'Tujuan',
            'katPermohonan_id' => 'Kategori Permohonan',
            'jen_id' => 'Jenis Peruntukan',
            'alat_programBaru' => 'Program Baru',
            'alat_tahap' => 'Tahap',
            'tahunSedia_id' => 'Tahun Sedia',
            'alat_pegawai' => 'Pegawai',
            'alat_jawatan' => 'Jawatan',
            'alat_lokasi' => 'Lokasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMesyuaratperalatans()
    {
        return $this->hasMany(TblMesyuaratperalatan::className(), ['alat_id' => 'alat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermohonan()
    {
        return $this->hasOne(TblPermohonan::className(), ['permohonan_id' => 'permohonan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermohonandua()
    {
        return $this->hasOne(Permohonan::className(), ['permohonan_id' => 'permohonan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJk()
    {
        return $this->hasOne(TblJk::className(), ['jk_id' => 'jk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisperuntukan()
    {
        return $this->hasOne(TblJenisperuntukan::className(), ['jen_id' => 'jen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKatPelanggan()
    {
        return $this->hasOne(TblKatpelanggan::className(), ['pelanggan_id' => 'katPelanggan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKatPermohonan()
    {
        return $this->hasOne(TblKatpermohonan::className(), ['katPermohonan_id' => 'katPermohonan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTahunSedia()
    {
        return $this->hasOne(TblTahun::className(), ['tahun_id' => 'tahunSedia_id']);
    }
}
