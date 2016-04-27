<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Model;
use frontend\models\TblPeralatan;
use frontend\models\TblPermohonan;
use frontend\models\TblPermohonanSearch;
use frontend\models\TblMesyuaratpermohonan;
use frontend\models\TblSuratpengesahan;
use frontend\models\TblPengesahan;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use yii\db\Query;
use yii\db\Command;

use kartik\mpdf\Pdf;

/**
 * TblPermohonanController implements the CRUD actions for TblPermohonan model.
 */
class TblPermohonanController extends Controller
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
     * Lists all TblPermohonan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblPermohonanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPermohonan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

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
            'tbl_peralatan.alat_bukuLog as alat_bukuLog'
            ])
           ->from('tbl_peralatan','tbl_permohonan')
           ->innerJoin('tbl_permohonan','tbl_peralatan.permohonan_id=tbl_permohonan.permohonan_id')
           ->where('tbl_permohonan.permohonan_id = "'.$id.'"')
           ->andWhere('tbl_peralatan.permohonan_id = tbl_permohonan.permohonan_id');
           $command=$query->createCommand();
           $data=$command->queryAll();

        return  $this->render('view' ,[
            'view'=>$data,
            'model' => $this->findModel($id),
            ]);
    }

    //function for reports
    public function actionReport()
    {
        //get your html raw content without layouts
       // $content = $this->renderPartial('view');
        //set up the kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'content'=>$this->renderPartial('view'),
            'model' => $model,
            'mode'=> Pdf::MODE_CORE,
            'format'=> Pdf::FORMAT_A3,
            'orientation'=>Pdf::ORIENT_LANDSCAPE,
            'destination'=> Pdf::DEST_BROWSER,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline'=> '.kv-heading-1{font-size:18px}',
            'options'=> ['title'=> 'Paki Properties Reports'],
            'methods'=> [
                   'setHeader'=>['Generated on: '.date("r")],
                   'setFooter'=>['|page {PAGENO}|'],
                    ]
            ]);
        return $pdf->render();
    }

    /**
     * Creates a new TblPermohonan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPermohonan;
        $modelsMesyuaratpermohonan = new TblMesyuaratpermohonan();
        $modelsSuratpengesahan = new TblSuratpengesahan();
        $modelsPengesahan = new TblPengesahan();
        $modelsPeralatan = [new TblPeralatan];

        if ($model->load(Yii::$app->request->post())) {

            $model->statMohon_id = 1;
            $model->status_id = 1;



            $modelsPeralatan = Model::createMultiple(TblPeralatan::classname());
            Model::loadMultiple($modelsPeralatan, Yii::$app->request->post());
            foreach ($modelsPeralatan as $index => $modelPeralatan) {
                $modelPeralatan->sort_order = $index;
                $modelPeralatan->alat_bukuLog = \yii\web\UploadedFile::getInstance($modelPeralatan, "[{$index}]alat_bukuLog");
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPeralatan) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsPeralatan as $modelPeralatan) {
                            $modelPeralatan->permohonan_id = $model->permohonan_id;
                            $modelPeralatan->alat_jumlahHarga = ($modelPeralatan->alat_kuantiti * $modelPeralatan->alat_hargaUnit);

                            if (($flag = $modelPeralatan->save(false)) === false) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                        $modelsMesyuaratpermohonan->permohonan_id = $model->permohonan_id;
                        $modelsMesyuaratpermohonan->statMesyua_id = 1;
                        $modelsMesyuaratpermohonan->mesyPerm_tarikh = date('Y-m-d');
                        $modelsMesyuaratpermohonan->mesyPerm_catitan = '-';
                        $modelsMesyuaratpermohonan->save();

                        $modelsSuratpengesahan->permohonan_id = $model->permohonan_id;
                        $modelsSuratpengesahan->suratSah_nama = '-';
                        $modelsSuratpengesahan->suratSah_tarikh = date('Y-m-d');
                        $modelsSuratpengesahan->suratSah_deskripsi = '-';
                        $modelsSuratpengesahan->save();

                        $modelsPengesahan->permohonan_id = $model->permohonan_id;
                        $modelsPengesahan->statSah_id = 1;
                        $modelsPengesahan->sah_tarikh = date('Y-m-d');
                        $modelsPengesahan->sah_catitan = '-';
                        $modelsPengesahan->save();
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->permohonan_id]);
                    }
                }
                catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelsMesyuaratpermohonan' => $modelsMesyuaratpermohonan,
            'modelsSuratpengesahan' => $modelsSuratpengesahan,
            'modelsPengesahan' => $modelsPengesahan,
            'modelsPeralatan' => (empty($modelsPeralatan)) ? [new TblPeralatan] : $modelsPeralatan
        ]);
    }

    /**
     * Updates an existing TblPermohonan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsPeralatan = $model->tblPeralatans;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsPeralatan, 'alat_id', 'alat_id');
            $modelsPeralatan = Model::createMultiple(TblPeralatan::classname(), $modelsPeralatan);
            Model::loadMultiple($modelsPeralatan, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPeralatan, 'alat_id', 'alat_id')));

            foreach ($modelsPeralatan as $index => $modelPeralatan) {
                $modelPeralatan->sort_order = $index;
                $modelPeralatan->alat_bukuLog = \yii\web\UploadedFile::getInstance($modelPeralatan, "[{$index}]alat_bukuLog");
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPeralatan) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {

                        if (!empty($deletedIDs)) {
                            $flag = TblPeralatan::deleteByIDs($deletedIDs);
                        }

                        if ($flag) {
                            foreach ($modelsPeralatan as $modelPeralatan) {
                                $modelPeralatan->permohonan_id = $model->permohonan_id;
                                $modelPeralatan->alat_jumlahHarga = ($modelPeralatan->alat_kuantiti * $modelPeralatan->alat_hargaUnit);
                                if (($flag = $modelPeralatan->save(false)) === false) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->permohonan_id]);
                    }

                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsPeralatan' => (empty($modelsPeralatan)) ? [new TblPeralatan] : $modelsPeralatan
        ]);
    }

    /**
     * Deletes an existing TblPermohonan model.
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
     * Finds the TblPermohonan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPermohonan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPermohonan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
