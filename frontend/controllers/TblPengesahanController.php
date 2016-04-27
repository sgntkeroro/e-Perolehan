<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TblPengesahan;
use frontend\models\TblPengesahanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\db\Command;

/**
 * TblPengesahanController implements the CRUD actions for TblPengesahan model.
 */
class TblPengesahanController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblPengesahan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblPengesahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPengesahan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $query = new Query;
        $query ->select([
            'tbl_peralatan.alat_nama as alat_nama',
            'tbl_peralatan.alat_kodAkaun as alat_kodAkaun',
            'tbl_peralatan.alat_kuantiti as alat_kuantiti',
            'tbl_peralatan.alat_hargaUnit as alat_hargaUnit',
            'tbl_peralatan.alat_jumlahHarga as alat_jumlahHarga',
            'tbl_peralatan.jk_id as jk_id',
            'tbl_peralatan.katPelanggan_id as katPelanggan_id',
            'tbl_peralatan.alat_tujuan as alat_tujuan',
            'tbl_peralatan.katPermohonan_id as katPermohonan_id',
            'tbl_peralatan.alat_jenisPeruntukan as alat_jenisPeruntukan',
            'tbl_peralatan.alat_programBaru as alat_programBaru',
            'tbl_peralatan.alat_tahap as alat_tahap',
            'tbl_peralatan.tahunSedia_id as tahunSedia_id',
            'tbl_peralatan.alat_pegawai as alat_pegawai',
            'tbl_peralatan.alat_jawatan as alat_jawatan',
            'tbl_peralatan.alat_lokasi as alat_lokasi',
            'tbl_peralatan.alat_bukuLog as alat_bukuLog',

            'tbl_tahun.tahun_tahun as tahun_tahun'
            ])
            ->from('tbl_peralatan, tbl_permohonan, tbl_tahun, tbl_pengesahan')

            ->where('tbl_pengesahan.sah_id = "'.$id.'"')          
            ->andWhere('tbl_permohonan.permohonan_id = tbl_pengesahan.permohonan_id')
            ->andWhere('tbl_peralatan.permohonan_id = tbl_permohonan.permohonan_id')           
            ->andWhere('tbl_peralatan.tahunSedia_id = tbl_tahun.tahun_id');

        $command=$query->createCommand();
        $data=$command->queryAll();

        return $this->render('view', [
            'data' => $data,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblPengesahan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPengesahan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sah_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblPengesahan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sah_id]);
        }

        return $this->render('update', [
            'model' => $this->findModel($id),
            ]);
    }

    /**
     * Deletes an existing TblPengesahan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblPengesahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPengesahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPengesahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
