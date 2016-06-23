<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Modelmesyuarat;
use frontend\models\MinKehadiran;
use frontend\models\MinPerkara;
use frontend\models\MinButiran;
use frontend\models\MinButiranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use mPDF;

/**
 * MinButiranController implements the CRUD actions for MinButiran model.
 */
class MinButiranController extends Controller
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
     * Lists all MinButiran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MinButiranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MinButiran model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $modelsHadir = $model->minKehadirans;
        $modelsPerkara = $model->minPerkaras;

        $nombor = 1;
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelsHadir' => $modelsHadir,
            'modelsPerkara' => $modelsPerkara,
            'nombor' => $nombor,
        ]);
    }

    //function for print pdf
    public function actionPdf($id)
    {
        $model = $this->findModel($id);
        $modelsHadir = $model->minKehadirans;
        $modelsPerkara = $model->minPerkaras;

        $nombor = 1;

        $mpdf=new mPDF('c', 'A4-P');
        $mpdf->WriteHTML($this->renderPartial('print', [
            'model' => $this->findModel($id),
            'modelsHadir' => $modelsHadir,
            'modelsPerkara' => $modelsPerkara,
            'nombor' => $nombor,
            ]));
        $mpdf->Output();
        exit;
    }

    /**
     * Creates a new MinButiran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MinButiran;
        $modelsHadir = new MinKehadiran();
        $modelsPerkara = [new MinPerkara];
        if ($model->load(Yii::$app->request->post())) {

            $modelsPerkara = Modelmesyuarat::createMultiple(MinPerkara::classname());
            Modelmesyuarat::loadMultiple($modelsPerkara, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsPerkara),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Modelmesyuarat::validateMultiple($modelsPerkara) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsPerkara as $modelPerkara) {
                            $modelPerkara->min_id = $model->id;
                            if (! ($flag = $modelPerkara->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                        $modelsHadir->min_id = $model->id;
                        $modelsHadir->hadir_nama = "Nama";
                        $modelsHadir->hadir_jawatan = "Jawatan";
                        $modelsHadir->hadir_peranan = "Pengerusi";
                        $modelsHadir->save();
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelsPerkara' => (empty($modelsPerkara)) ? [new MinPerkara] : $modelsPerkara
        ]);
    }

    /**
     * Updates an existing MinButiran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsPerkara = $model->minPerkaras;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsPerkara, 'id', 'id');
            $modelsPerkara = Modelmesyuarat::createMultiple(MinPerkara::classname(), $modelsPerkara);
            Modelmesyuarat::loadMultiple($modelsPerkara, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPerkara, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsPerkara),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Modelmesyuarat::validateMultiple($modelsPerkara) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            MinPerkara::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsPerkara as $modelPerkara) {
                            $modelPerkara->min_id = $model->id;
                            if (! ($flag = $modelPerkara->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsPerkara' => (empty($modelsPerkara)) ? [new MinPerkara] : $modelsPerkara
        ]);
    }

    /**
     * Updates an existing MinButiran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatekehadiran($id)
    {
        $model = $this->findModel($id);
        $modelsHadir = $model->minKehadirans;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsHadir, 'id', 'id');
            $modelsHadir = Modelmesyuarat::createMultiple(MinKehadiran::classname(), $modelsHadir);
            Modelmesyuarat::loadMultiple($modelsHadir, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsHadir, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsHadir),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Modelmesyuarat::validateMultiple($modelsHadir) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            MinKehadiran::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsHadir as $modelHadir) {
                            $modelHadir->min_id = $model->id;
                            if (! ($flag = $modelHadir->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update-kehadiran', [
            'model' => $model,
            'modelsHadir' => (empty($modelsHadir)) ? [new MinKehadiran] : $modelsHadir
        ]);
    }

    /**
     * Deletes an existing MinButiran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        foreach( $this->findModel($id)->minKehadirans as $c)
            $c->delete();

        foreach( $this->findModel($id)->minPerkaras as $c)
            $c->delete();

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MinButiran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MinButiran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MinButiran::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
