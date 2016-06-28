<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Permohonan;
use frontend\models\PermohonanSearch;
use frontend\models\TblSuratpengesahan;
use frontend\models\TblMesyuaratpermohonan;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\db\Query;
use yii\db\Command;
use mPDF;

/**
 * PermohonanController implements the CRUD actions for Permohonan model.
 */
class PermohonanController extends Controller
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
     * Lists all Permohonan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PermohonanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionList($id)
    {      
        $surat = TblSuratpengesahan::find()->where(['suratSah_id' => $id])->one();

        $url = '/e-Perolehan/frontend/web/uploads/'.$surat->suratSah_nama;

        return $this->redirect($url);
    }

    public function actionStatus($id)
    {   
        // view untuk status mesyuarat bagi permohonan yang berstatus aktif (1).
        $model = $this->findModel($id);  

        $status = TblMesyuaratpermohonan::find()
        ->where(['permohonan_id' => $id])->one();

        return $this->render('status' ,[
            'model'=>$model,
            'status'=>$status,
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
            'tbl_peralatan.jen_id as jen_id',
            'tbl_peralatan.alat_programBaru as alat_programBaru',
            'tbl_peralatan.alat_tahap as alat_tahap',
            'tbl_peralatan.tahunSedia_id as tahunSedia_id',
            'tbl_peralatan.alat_pegawai as alat_pegawai',
            'tbl_peralatan.alat_jawatan as alat_jawatan',
            'tbl_peralatan.alat_lokasi as alat_lokasi',

            'tbl_tahun.tahun_tahun as tahun_tahun',
            'tbl_jenisperuntukan.jen_nama as jen_nama'
            ])
            ->from('tbl_peralatan, tbl_permohonan, tbl_tahun, tbl_jenisperuntukan')

            ->where('tbl_permohonan.permohonan_id = "'.$id.'"')           
            ->andWhere('tbl_tahun.tahun_id = tbl_peralatan.tahunSedia_id')           
            ->andWhere('tbl_jenisperuntukan.jen_id = tbl_peralatan.jen_id')
            ->andWhere('tbl_peralatan.permohonan_id = tbl_permohonan.permohonan_id');

        $command=$query->createCommand();
        $data=$command->queryAll();

        $queryAtas = new Query;
        $queryAtas ->select([
            'tbl_moderator.mod_nama as mod_nama',

            'tbl_statmohon.statMohon_status as statMohon_status',

            'tbl_status.status_status as status_status'
            ])
            ->from('tbl_permohonan, tbl_moderator, tbl_statmohon, tbl_status')

            ->where('tbl_permohonan.permohonan_id = "'.$id.'"')         
            ->andWhere('tbl_moderator.user_id = tbl_permohonan.user_id')           
            ->andWhere('tbl_statmohon.statMohon_id = tbl_permohonan.statMohon_id')        
            ->andWhere('tbl_status.status_id = tbl_permohonan.status_id');

        $command=$queryAtas->createCommand();
        $viewAtas=$command->queryAll();

        $queryStatus = new Query;
        $queryStatus ->select([
            'tbl_permohonan.permohonan_id as permohonan_id',

            'tbl_statsah.statSah_nama as statSah_nama',

            'tbl_statmohon.statMohon_status as statMohon_status',

            'tbl_statmesyua.statMesyua_status as statMesyua_status',

            'tbl_status.status_status as status_status'
            ])
            ->from('tbl_statsah, tbl_statmohon, tbl_statmesyua, tbl_status, tbl_permohonan, tbl_pengesahan, tbl_mesyuaratpermohonan')

            ->where('tbl_permohonan.permohonan_id = "'.$id.'"')         
            ->andWhere('tbl_pengesahan.permohonan_id = tbl_permohonan.permohonan_id')         
            ->andWhere('tbl_mesyuaratpermohonan.permohonan_id = tbl_permohonan.permohonan_id')

            ->andWhere('tbl_mesyuaratpermohonan.statMesyua_id = tbl_statmesyua.statMesyua_id')         
            ->andWhere('tbl_pengesahan.statSah_id = tbl_statsah.statSah_id')           
            ->andWhere('tbl_statmohon.statMohon_id = tbl_permohonan.statMohon_id')         
            ->andWhere('tbl_status.status_id = tbl_permohonan.status_id');

        $command=$queryStatus->createCommand();
        $viewStatus=$command->queryAll();

        $suratSah = $model->tblSuratpengesahans;

        return $this->render('view' ,[
            'view'=>$data,
            'viewAtas'=>$viewAtas,
            'viewStatus'=>$viewStatus,
            // 'viewSurat'=>$viewSurat,
            'suratSah'=>$suratSah,
            'model' => $this->findModel($id),
            ]);
    }

    //function for print pdf
    public function actionPdf($id)
    {
        $model = $this->findModel($id);

        $alat = new Query;
        $alat ->select([
            'tbl_peralatan.alat_nama as alat_nama',
            'tbl_peralatan.alat_kodAkaun as alat_kodAkaun',
            'tbl_peralatan.alat_kuantiti as alat_kuantiti',
            'tbl_peralatan.alat_hargaUnit as alat_hargaUnit',
            'tbl_peralatan.alat_jumlahHarga as alat_jumlahHarga',
            'tbl_peralatan.jk_id as jk_id',
            'tbl_peralatan.katPelanggan_id as katPelanggan_id',
            'tbl_peralatan.alat_tujuan as alat_tujuan',
            'tbl_peralatan.katPermohonan_id as katPermohonan_id',
            'tbl_peralatan.alat_programBaru as alat_programBaru',
            'tbl_peralatan.alat_tahap as alat_tahap',
            'tbl_peralatan.tahunSedia_id as tahunSedia_id',
            'tbl_peralatan.alat_pegawai as alat_pegawai',
            'tbl_peralatan.alat_jawatan as alat_jawatan',
            'tbl_peralatan.alat_lokasi as alat_lokasi',
            // 'count(alat_id) as count',

            'tbl_tahun.tahun_tahun as tahun_tahun',
            'tbl_jenisperuntukan.jen_nama as jen_nama'
        ])
       ->from('tbl_peralatan, tbl_tahun, tbl_jenisperuntukan')

       ->where('tbl_peralatan.tahunSedia_id = tbl_tahun.tahun_id')           
        ->andWhere('tbl_jenisperuntukan.jen_id = tbl_peralatan.jen_id')
       ->andWhere('tbl_peralatan.permohonan_id = "'.$id.'"');

       $command=$alat->createCommand();
       $dataAlat=$command->queryAll();

        $mpdf=new mPDF('c', 'A4-L');
        $mpdf->WriteHTML($this->renderPartial('print', [
            'view'=>$dataAlat,
            'model' => $this->findModel($id),
            ]));
        $mpdf->Output();
        exit;
    }

    /**
     * Creates a new Permohonan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Permohonan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->permohonan_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Permohonan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->permohonan_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Permohonan model.
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
     * Finds the Permohonan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Permohonan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Permohonan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
