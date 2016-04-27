<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TblModerator;
use frontend\models\TblBhgnmod;
use frontend\models\TblBahagian;
use frontend\models\TblUnit;
use frontend\models\TblModeratorSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\db\Query;
use yii\db\Command;

/**
 * TblModeratorController implements the CRUD actions for TblModerator model.
 */
class TblModeratorController extends Controller
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
     * Lists all TblModerator models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblModeratorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblModerator model.
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
     * Creates a new TblModerator model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'noNav';
        $model = new TblModerator();
        $modelsBahagian = new TblBhgnmod();

        if ($model->load(Yii::$app->request->post()) && $modelsBahagian->load(Yii::$app->request->post())) {

            $modelsBahagian->save();
            $model->user_id = Yii::$app->user->identity->id;
            $model->mod_id = $model->user_id;
            
            $model->bm_id = $modelsBahagian->bm_id;
            $model->save();

            if ($model->save() && $modelsBahagian->save()) {
                return $this->redirect(['view', 'id' => $model->mod_id]);
            }
        }

        else {
            return $this->render('create', [
                'model' => $model,
                'modelsBahagian' => $modelsBahagian,
            ]);
        }
    }

    /**
     * Updates an existing TblModerator model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsBahagian = TblBhgnmod::find()->where(['bm_id' => $model->bm_id])->one();

        if($model->load(Yii::$app->request->post()) && $modelsBahagian->load(Yii::$app->request->post())) {
            $model->attributes = $_POST['TblModerator'];
            $modelsBahagian->attributes = $_POST['TblBhgnmod'];

            $valid=$model->validate();
            $valid=$modelsBahagian->validate() && $valid;

            if($valid){
                if($model->save()){
                    $modelsBahagian->save();
                    $this->redirect(array('view','id'=>$model->mod_id));
                }
            }
        }

        else {
            return $this->render('update', [
                'model' => $model,
                'modelsBahagian' => $modelsBahagian,
            ]);
        }
    }

    /**
     * Deletes an existing TblModerator model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionLists($id)
    {
        $countUnits = TblUnit::find()
            ->where(['bahagian_id' => $id])
            ->count();

        $units = TblUnit::find()
            ->where(['bahagian_id' => $id])
            ->all();

        if($countUnits > 0) {

            foreach($units as $unit){
                echo "<option value='".$unit->unit_id."'>".$unit->unit_nama."</option>";
            }
        }
        else{
            echo "<option> - </option>";
        }
    }

    /**
     * Finds the TblModerator model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblModerator the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblModerator::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
