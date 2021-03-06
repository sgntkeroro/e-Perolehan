<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TblSuratpengesahan;
use frontend\models\TblSuratpengesahanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TblSuratpengesahanController implements the CRUD actions for TblSuratpengesahan model.
 */
class TblSuratpengesahanController extends Controller
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
     * Lists all TblSuratpengesahan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblSuratpengesahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblSuratpengesahan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblSuratpengesahan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblSuratpengesahan();

        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'suratSah_nama');
            $model->suratSah_nama = $image->name;

            if($image != '')
            {
            $image->saveAs(\Yii::$app->basePath.'/web/uploads/'.$image->name);
            }

            if($model->save())      
            {
                return $this->redirect(['view', 'id' => $model->suratSah_id]);
            }
        }

        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblSuratpengesahan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'suratSah_nama');
            $fileName = "SuratPengesahan{$model->permohonan_id}";
            $model->suratSah_nama = $fileName;
            $model->suratSah_type = "Surat Pengesahan";

            $model->suratSah_path = 'web/uploads/'.$fileName;

            if($image != '')
            {
            $image->saveAs(\Yii::$app->basePath.'/web/uploads/'.$fileName);
            }

            if($model->save())      
            {
                return $this->redirect(['view', 'id' => $model->suratSah_id]);
            }
        }

        else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblSuratpengesahan model.
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
     * Finds the TblSuratpengesahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblSuratpengesahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblSuratpengesahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
