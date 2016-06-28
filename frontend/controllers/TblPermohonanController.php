<?php

namespace frontend\controllers;

use Yii;
use mPDF;
use frontend\models\TblPermohonan;
use frontend\models\TblPermohonanSearch;

use frontend\models\Model;
use frontend\models\TblPeralatan;
use frontend\models\TblMesyuaratpermohonan;
use frontend\models\TblMesyuaratperalatan;
use frontend\models\TblSuratpengesahan;
use frontend\models\TblPengesahan;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\JsonParser;
use yii\web\UploadedFile;
use yii\web\Response;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
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
     * Updates an existing TblModerator model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatesuratsah($id)
    {
        $model = $this->findModel($id);
        $modelsSurat = TblSuratpengesahan::find()->where(['permohonan_id' => $model->permohonan_id])->one();

        if($model->load(Yii::$app->request->post()) && $modelsSurat->load(Yii::$app->request->post())) {
            $model->attributes = $_POST['TblPermohonan'];
            $modelsSurat->attributes = $_POST['TblSuratpengesahan'];

            $image = UploadedFile::getInstance($modelsSurat, 'suratSah_nama');
            $fileName = "SuratPengesahan{$model->permohonan_id}";
            $modelsSurat->suratSah_nama = $fileName;
            $modelsSurat->suratSah_type = "Surat Pengesahan";

            $modelsSurat->suratSah_path = 'web/uploads/'.$fileName;

            if($image != '')
            {
            $image->saveAs(\Yii::$app->basePath.'/web/uploads/'.$fileName);
            $model->statMohon_id = 2;
            }

            $valid=$model->validate();
            $valid=$modelsSurat->validate() && $valid;

            if($valid){
                if($model->save()){
                    $modelsSurat->save();
                    $this->redirect(array('view','id'=>$model->permohonan_id));
                }
            }
        }

        else {
            return $this->render('updatesuratsah', [
                'model' => $model,
                'modelsSurat' => $modelsSurat,
            ]);
        }
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

    public function actionStatusselesai($id)
    {     
        // view untuk status mesyuarat bagi permohonan yang berstatus selesai (2).
        $model = $this->findModel($id);

        return $this->render('statusselesai' ,[
            'model'=>$model,
            ]);
    }

    public function actionViewselesai($id)
    {    
        // view untuk permohonan yang berstatus selesai (2).  
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

        return $this->render('viewselesai' ,[
            'view'=>$data,
            'viewAtas'=>$viewAtas,
            'viewStatus'=>$viewStatus,
            // 'viewSurat'=>$viewSurat,
            'suratSah'=>$suratSah,
            'model' => $this->findModel($id),
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
        $modelsMesyuarat = [[new TblMesyuaratperalatan]];

        if ($model->load(Yii::$app->request->post())) {
            $model->statMohon_id = 1;
            $model->status_id = 1;
            $model->user_id = Yii::$app->user->identity->id;
            $model->permohonan_tarikh = date('Y-m-d');

            $modelsPeralatan = Model::createMultiple(TblPeralatan::classname());
            Model::loadMultiple($modelsPeralatan, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPeralatan) && $valid;

            if (isset($_POST['TblMesyuaratperalatan'][0][0])) {
                foreach ($_POST['TblMesyuaratperalatan'] as $index => $mesyuarats) {
                    foreach ($mesyuarats as $indexM => $mesyuarat) {
                        $data['TblMesyuaratperalatan'] = $mesyuarat;
                        $modelMesyuarat = new TblMesyuaratperalatan;
                        $modelMesyuarat->load($data);
                        $modelsMesyuarat[$index][$indexM] = $modelMesyuarat;
                        $valid = $modelMesyuarat->validate();
                    }
                }
            }

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsPeralatan as $index => $modelPeralatan) {
                            $modelPeralatan->permohonan_id = $model->permohonan_id;
                            $modelPeralatan->alat_jumlahHarga = ($modelPeralatan->alat_kuantiti * $modelPeralatan->alat_hargaUnit);

                            if (($flag = $modelPeralatan->save(false)) === false) {
                                $transaction->rollBack();
                                break;
                            }

                            
            if ($model->kat_id = 1) {
                $model->sok_id = 1;
            }

            else {
                $model->sok_id = 2;
            }

                            $modelsMesyuaratpermohonan->permohonan_id = $model->permohonan_id;
                            $modelsMesyuaratpermohonan->mesyPerm_id = $modelsMesyuaratpermohonan->permohonan_id;
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

                            if (isset($modelsMesyuarat[$index]) && is_array($modelsMesyuarat[$index])) {
                                foreach ($modelsMesyuarat[$index] as $indexM => $modelMesyuarat) {
                                    
                                    $modelMesyuarat->mesyPerm_id = $modelPeralatan->permohonan_id;

                                    $modelMesyuarat->alat_id = $modelPeralatan->alat_id;
                                    $modelMesyuarat->mesy_kuantiti = $modelPeralatan->alat_kuantiti;
                                    $modelMesyuarat->mesy_jumlahHarga = $modelPeralatan->alat_jumlahHarga;
                                    
                                    if (!($flag = $modelMesyuarat->save(false))) {
                                        break;
                                    }
                                }
                            }
                        }
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
            'modelsPeralatan' => (empty($modelsPeralatan)) ? [new TblPeralatan] : $modelsPeralatan,
            'modelsMesyuarat' => (empty($modelsMesyuarat)) ? [[new TblMesyuaratperalatan]] : $modelsMesyuarat,
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
        $modelsMesyuarat = [];
        $oldMesyuarats = [];

        if (!empty($modelsPeralatan)) {
            foreach ($modelsPeralatan as $index => $modelPeralatan) {
                $mesyuarats = $modelPeralatan->tblMesyuaratperalatans;
                $modelsMesyuarat[$index] = $mesyuarats;
                $oldMesyuarats = ArrayHelper::merge(ArrayHelper::index($mesyuarats, 'mesy_id'), $oldMesyuarats);
            }
        }

        if ($model->load(Yii::$app->request->post())) {
            // reset
            $modelsMesyuarat = [];

            $oldIDs = ArrayHelper::map($modelsPeralatan, 'alat_id', 'alat_id');
            $modelsPeralatan = Model::createMultiple(TblPeralatan::classname(), $modelsPeralatan);
            Model::loadMultiple($modelsPeralatan, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPeralatan, 'alat_id', 'alat_id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPeralatan) && $valid;

            $mesyuaratsIDs = [];

            if (isset($_POST['TblMesyuaratperalatan'][0][0])) {
                foreach ($_POST['TblMesyuaratperalatan'] as $index => $mesyuarats) {
                    $mesyuaratsIDs = ArrayHelper::merge($mesyuaratsIDs, array_filter(ArrayHelper::getColumn($mesyuarats, 'mesy_id')));
                    foreach ($mesyuarats as $indexM => $mesyuarat) {
                        $data['TblMesyuaratperalatan'] = $mesyuarat;
                        $modelMesyuarat = (isset($mesyuarat['mesy_id']) && isset($oldMesyuarats[$mesyuarat['mesy_id']])) ? $oldMesyuarats[$mesyuarat['mesy_id']] : new TblMesyuaratperalatan;
                        $modelMesyuarat->load($data);
                        $modelsMesyuarat[$index][$indexM] = $modelMesyuarat;
                        $valid = $modelMesyuarat->validate();
                    }
                }
            }
            $oldMesyuaratsIDs = ArrayHelper::getColumn($oldMesyuarats, 'mesy_id');
            $deletedMesyuaratsIDs = array_diff($oldMesyuaratsIDs, $mesyuaratsIDs);

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {

                        if (! empty($deletedMesyuaratsIDs)) {
                            TblMesyuaratperalatan::deleteAll(['mesy_id' => $deletedMesyuaratsIDs]);
                        }

                        if (!empty($deletedIDs)) {
                            // $flag = TblPeralatan::deleteByIDs($deletedIDs);
                            TblPeralatan::deleteAll(['alat_id' => $deletedIDs]);
                        }

                        // if ($flag) {
                        //     foreach ($modelsPeralatan as $modelPeralatan) {
                        //         $modelPeralatan->permohonan_id = $model->permohonan_id;
                        //         $modelPeralatan->alat_jumlahHarga = ($modelPeralatan->alat_kuantiti * $modelPeralatan->alat_hargaUnit);
                        //         if (($flag = $modelPeralatan->save(false)) === false) {
                        //             $transaction->rollBack();
                        //             break;
                        //         }
                        //     }
                        // }

                        foreach ($modelsPeralatan as $index => $modelPeralatan) {
                            if ($flag === false) {
                                break;
                            }

                            $modelPeralatan->permohonan_id = $model->permohonan_id;
                            $modelPeralatan->alat_jumlahHarga = ($modelPeralatan->alat_kuantiti * $modelPeralatan->alat_hargaUnit);

                            if (!($flag = $modelPeralatan->save(false))) {
                                break;
                            }

                            if (isset($modelsMesyuarat[$index]) && is_array($modelsMesyuarat[$index])) {
                                foreach ($modelsMesyuarat[$index] as $indexM => $modelMesyuarat) {

                                    $modelMesyuarat->alat_id = $modelPeralatan->alat_id;
                                    $modelMesyuarat->mesyPerm_id = $modelPeralatan->permohonan_id;
                                    $modelMesyuarat->mesy_kuantiti = $modelPeralatan->alat_kuantiti;
                                    $modelMesyuarat->mesy_jumlahHarga = $modelPeralatan->alat_jumlahHarga;

                                    if (!($flag = $modelMesyuarat->save(false))) {
                                        break;
                                    }
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->permohonan_id]);
                    }
                    else {
                        $transaction->rollBack();
                    }
                }
                catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsPeralatan' => (empty($modelsPeralatan)) ? [new TblPeralatan] : $modelsPeralatan,
            'modelsMesyuarat' => (empty($modelsMesyuarat)) ? [new TblMesyuaratperalatan] : $modelsMesyuarat
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
        $alatMesyuarat = TblMesyuaratperalatan::find()->where(['mesyPerm_id' => $id])->all();

        foreach( $alatMesyuarat as $c)
            $c->delete();

        foreach( $this->findModel($id)->tblMesyuaratpermohonans as $c)
            $c->delete();

        foreach( $this->findModel($id)->tblPengesahans as $c)
            $c->delete();

        foreach( $this->findModel($id)->tblPeralatans as $c)
            $c->delete();

        foreach( $this->findModel($id)->tblSuratpengesahans as $c)
            $c->delete();

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
