<?php

namespace frontend\controllers;

use Yii;
use mPDF;
use frontend\models\Model;
use frontend\models\TblMesyuaratpermohonan;
use frontend\models\TblMesyuaratpermohonanSearch;
use frontend\models\TblMesyuaratperalatan;
use frontend\models\TblStatmesyua;
use frontend\models\TblPermohonan;

use yii\web\Controller;
use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

use yii\db\Query;
use yii\db\Command;

use kartik\mpdf\Pdf;
use yii\data\SqlDataProvider;

/**
 * TblMesyuaratpermohonanController implements the CRUD actions for TblMesyuaratpermohonan model.
 */
class TblMesyuaratpermohonanController extends Controller
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
     * Lists all TblMesyuaratpermohonan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblMesyuaratpermohonanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all TblMesyuaratpermohonan models.
     * @return mixed
     */
    public function actionAnalisa()
    {
        $sql =  "SELECT 
                tbl_permohonan.permohonan_id As permohonan_id, 
                user.id As id, 
                tbl_moderator.bm_id As bm_id, 
                tbl_bhgnmod.unit_kampuscawangan As unit_kampuscawangan, 
                tbl_bahagian.bahagian_nama As bahagian_nama, 
                tbl_unit.unit_nama As unit_nama

                FROM tbl_permohonan

                INNER JOIN user 
                ON tbl_permohonan.user_id=user.id

                INNER JOIN tbl_moderator 
                ON user.id=tbl_moderator.user_id

                INNER JOIN tbl_bhgnmod 
                ON tbl_moderator.bm_id=tbl_bhgnmod.bm_id

                INNER JOIN tbl_bahagian
                ON tbl_bhgnmod.bahagian_id=tbl_bahagian.bahagian_id

                INNER JOIN tbl_unit 
                ON tbl_bhgnmod.unit_id=tbl_unit.unit_id";

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            ]);

        // // grid filtering conditions
        // $sql->andFilterWhere([
        //     'permohonan_id' => $this->permohonan_id,
        //     'id' => $this->id,
        //     'bm_id' => $this->bm_id,
        // ]);

        // $sql->andFilterWhere(['like', 'unit_kampuscawangan', $this->unit_kampuscawangan])
        //     ->andFilterWhere(['like', 'bahagian_nama', $this->bahagian_nama])
        //     ->andFilterWhere(['like', 'unit_nama', $this->unit_nama]);

        // $searchModel = $sql->search();        
        // $dataProvider = $searchModel->search();

        return $this->render('analisis', [
            // 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblMesyuaratpermohonan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $statusMesyuarat = $model->statMesyua;

        $alat = new Query;
        $alat ->select([
            'tbl_peralatan.alat_nama as alat_nama',
            'tbl_peralatan.alat_kuantiti as alat_kuantiti',
            'tbl_peralatan.alat_hargaUnit as alat_hargaUnit',
            'tbl_peralatan.alat_jumlahHarga as alat_jumlahHarga',

            'tbl_mesyuaratperalatan.mesy_kuantiti as mesy_kuantiti',
            'tbl_mesyuaratperalatan.mesy_jumlahHarga as mesy_jumlahHarga',
            'tbl_mesyuaratperalatan.mesy_catitan as mesy_catitan'
        ])
        ->from('tbl_peralatan, tbl_mesyuaratperalatan')

        // ->innerJoin('tbl_mesyuaratpermohonan, tbl_mesyuaratpermohonan.mesyPerm_id')

        ->where('tbl_peralatan.permohonan_id = "'.$id.'"')
        ->andWhere('tbl_mesyuaratperalatan.alat_id = tbl_peralatan.alat_id');

        $command=$alat->createCommand();
        $dataAlat=$command->queryAll();

        $sumPermohonan = $alat->sum('alat_jumlahHarga');
        $sumMesyuarat = $alat->sum('mesy_jumlahHarga');

        $query = new Query;
        $query ->select([
        'tbl_unit.unit_nama as unit',
        'tbl_permohonan.permohonan_pusatKos as permohonan_pusatKos'
        ])
        ->from('tbl_unit, tbl_bhgnmod, tbl_moderator, tbl_permohonan, tbl_mesyuaratpermohonan')

        ->where('tbl_unit.unit_id = tbl_bhgnmod.unit_id')
        ->andWhere('tbl_bhgnmod.bm_id = tbl_moderator.bm_id')
        ->andWhere('tbl_moderator.user_id = tbl_permohonan.user_id')
        ->andWhere('tbl_permohonan.permohonan_id = tbl_mesyuaratpermohonan.permohonan_id')
        ->andWhere('tbl_mesyuaratpermohonan.mesyPerm_id = "'.$id.'"');

        $command=$query->createCommand();
        $data=$command->queryAll();

        return $this->render('view', [

            'view'=>$dataAlat,
            'sumPermohonan'=>$sumPermohonan,
            'sumMesyuarat'=>$sumMesyuarat,
            'viewUnit'=>$data,
            'model' => $model,
            'statusMesyuarat' => $statusMesyuarat,
        ]);
    }

    //function for print pdf
    public function actionTemplate1($id)
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
            'tbl_peralatan.jen_id as jen_id',
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
        $sum = $alat->sum('alat_jumlahHarga');

        $query = new Query;
        $query ->select([
        'tbl_unit.unit_nama as unit',
        'tbl_permohonan.permohonan_pusatKos as permohonan_pusatKos'
        ])
        ->from('tbl_unit, tbl_bhgnmod, tbl_moderator, tbl_permohonan, tbl_mesyuaratpermohonan')

        ->where('tbl_unit.unit_id = tbl_bhgnmod.unit_id')
        ->andWhere('tbl_bhgnmod.bm_id = tbl_moderator.bm_id')
        ->andWhere('tbl_moderator.user_id = tbl_permohonan.user_id')
        ->andWhere('tbl_permohonan.permohonan_id = tbl_mesyuaratpermohonan.permohonan_id')
        ->andWhere('tbl_mesyuaratpermohonan.mesyPerm_id = "'.$id.'"');

        $command=$query->createCommand();
        $data=$command->queryAll();

        $template1=new mPDF('c', 'A3-L');
        $template1->WriteHTML($this->renderPartial('template1', [
            'view'=>$dataAlat,
            'viewUnit'=>$data,
            'sum' => $sum,
            'model' => $this->findModel($id),
            ]));
        $template1->Output();
        exit;
    }

    //function for print pdf
    public function actionTemplate2($id)
    {
        $model = $this->findModel($id);

        $alat = new Query;
        $alat ->select([
            'tbl_peralatan.alat_nama as alat_nama',
            'tbl_peralatan.alat_kuantiti as alat_kuantiti',
            'tbl_peralatan.alat_hargaUnit as alat_hargaUnit',
            'tbl_peralatan.alat_jumlahHarga as alat_jumlahHarga',

            'tbl_mesyuaratperalatan.mesy_kuantiti as mesy_kuantiti',
            'tbl_mesyuaratperalatan.mesy_jumlahHarga as mesy_jumlahHarga',
            'tbl_mesyuaratperalatan.mesy_catitan as mesy_catitan'
        ])
        ->from('tbl_peralatan, tbl_mesyuaratperalatan')

        // ->innerJoin('tbl_mesyuaratpermohonan, tbl_mesyuaratpermohonan.mesyPerm_id')

        ->where('tbl_peralatan.permohonan_id = "'.$id.'"')
        ->andWhere('tbl_mesyuaratperalatan.alat_id = tbl_peralatan.alat_id');

        $command=$alat->createCommand();
        $dataAlat=$command->queryAll();

        $sumPermohonan = $alat->sum('alat_jumlahHarga');
        $sumMesyuarat = $alat->sum('mesy_jumlahHarga');

        $query = new Query;
        $query ->select([
        'tbl_unit.unit_nama as unit',
        'tbl_permohonan.permohonan_pusatKos as permohonan_pusatKos'
        ])
        ->from('tbl_unit, tbl_bhgnmod, tbl_moderator, tbl_permohonan, tbl_mesyuaratpermohonan')

        ->where('tbl_unit.unit_id = tbl_bhgnmod.unit_id')
        ->andWhere('tbl_bhgnmod.bm_id = tbl_moderator.bm_id')
        ->andWhere('tbl_moderator.user_id = tbl_permohonan.user_id')
        ->andWhere('tbl_permohonan.permohonan_id = tbl_mesyuaratpermohonan.permohonan_id')
        ->andWhere('tbl_mesyuaratpermohonan.mesyPerm_id = "'.$id.'"');

        $command=$query->createCommand();
        $data=$command->queryAll();

        $template2=new mPDF('c', 'A4-L');
        $template2->WriteHTML($this->renderPartial('template2', [
            'view'=>$dataAlat,
            'viewUnit'=>$data,
            'sumPermohonan'=>$sumPermohonan,
            'sumMesyuarat'=>$sumMesyuarat,
            'model' => $this->findModel($id),
            ]));
        $template2->Output();
        exit;
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
     * Creates a new TblMesyuaratpermohonan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblMesyuaratpermohonan;
        $modelsAlatmesyuarat = [new TblMesyuaratperalatan];
        
        if ($model->load(Yii::$app->request->post())) {

            $modelsAlatmesyuarat = Model::createMultipleMesyuarat(TblMesyuaratperalatan::classname());
            Model::loadMultiple($modelsAlatmesyuarat, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsAlatmesyuarat),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsAlatmesyuarat) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsAlatmesyuarat as $modelAlatmesyuarat) {
                            $modelAlatmesyuarat->mesyPerm_id = $model->mesyPerm_id;
                            if (! ($flag = $modelAlatmesyuarat->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->mesyPerm_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelsAlatmesyuarat' => (empty($modelsAlatmesyuarat)) ? [new TblMesyuaratperalatan] : $modelsAlatmesyuarat
        ]);
    }

    /**
     * Updates an existing TblMesyuaratpermohonan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsPermohonan = TblPermohonan::find()->where(['permohonan_id' => $model->permohonan_id])->one();
        $modelsAlatmesyuarat = $model->tblMesyuaratperalatans;

        if ($model->load(Yii::$app->request->post()) && $modelsPermohonan->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsAlatmesyuarat, 'mesy_id', 'mesy_id');
            $modelsAlatmesyuarat = Model::createMultipleMesyuarat(TblMesyuaratperalatan::classname(), $modelsAlatmesyuarat);
            Model::loadMultiple($modelsAlatmesyuarat, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsAlatmesyuarat, 'mesy_id', 'mesy_id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsAlatmesyuarat),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = $modelsPermohonan->validate() && $valid;
            $valid = Model::validateMultiple($modelsAlatmesyuarat) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            TblMesyuaratperalatan::deleteAll(['mesy_id' => $deletedIDs]);
                        }
                        foreach ($modelsAlatmesyuarat as $modelAlatmesyuarat) {
                            $modelAlatmesyuarat->mesyPerm_id = $model->mesyPerm_id;
                            if (! ($flag = $modelAlatmesyuarat->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                    $modelsPermohonan->save();
                    
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->mesyPerm_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsPermohonan' => $modelsPermohonan,
            'modelsAlatmesyuarat' => (empty($modelsAlatmesyuarat)) ? [new TblMesyuaratperalatan] : $modelsAlatmesyuarat
        ]);
    }

    /**
     * Deletes an existing TblMesyuaratpermohonan model.
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
     * Finds the TblMesyuaratpermohonan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblMesyuaratpermohonan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblMesyuaratpermohonan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
