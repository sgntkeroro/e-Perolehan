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
            [['alat_nama','alat_kuantiti', 'alat_hargaUnit', 'jk_id', 'katPelanggan_id', 'katPermohonan_id', 'alat_jenisPeruntukan', 'tahunSedia_id', 'alat_lokasi'], 'required'],
            [['permohonan_id', 'alat_kuantiti', 'jk_id', 'katPelanggan_id', 'katPermohonan_id', 'tahunSedia_id', 'bukuLog_id', 'deleteBukuLog', 'sort_order'], 'integer'],
            [['alat_hargaUnit', 'alat_jumlahHarga'], 'number'],
            [['alat_bukuLog'], 'safe'],
            [['alat_bukuLog'], 'file'],
            [['alat_nama', 'alat_kodAkaun', 'alat_tujuan', 'alat_jenisPeruntukan', 'alat_programBaru', 'alat_tahap', 'alat_pegawai', 'alat_jawatan', 'alat_lokasi'], 'string', 'max' => 200],
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
            'alat_id' => 'Alat ID',
            'permohonan_id' => 'Permohonan ID',
            'alat_nama' => 'Alat Nama',
            'alat_kodAkaun' => 'Alat Kod Akaun',
            'alat_kuantiti' => 'Alat Kuantiti',
            'alat_hargaUnit' => 'Alat Harga Unit',
            'alat_jumlahHarga' => 'Alat Jumlah Harga',
            'jk_id' => 'Jk ID',
            'katPelanggan_id' => 'Kat Pelanggan ID',
            'alat_tujuan' => 'Alat Tujuan',
            'katPermohonan_id' => 'Kat Permohonan ID',
            'alat_jenisPeruntukan' => 'Alat Jenis Peruntukan',
            'alat_programBaru' => 'Alat Program Baru',
            'alat_tahap' => 'Alat Tahap',
            'tahunSedia_id' => 'Tahun Sedia ID',
            'alat_pegawai' => 'Alat Pegawai',
            'alat_jawatan' => 'Alat Jawatan',
            'alat_lokasi' => 'Alat Lokasi',
            'alat_bukuLog' => 'Alat Buku Log',
            'bukuLog_id' => 'Buku Log ID',
            'deleteBukuLog' => 'Delete Buku Log',
            'sort_order' => 'Sort Order',
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
    public function getBukuLog()
    {
        return $this->hasOne(TblBukulog::className(), ['bukulog_id' => 'bukuLog_id']);
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
    public function getJk()
    {
        return $this->hasOne(TblJk::className(), ['jk_id' => 'jk_id']);
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
