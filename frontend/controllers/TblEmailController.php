<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TblEmail;
use frontend\models\TblEmailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TblEmailController implements the CRUD actions for TblEmail model.
 */
class TblEmailController extends Controller
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
     * Lists all TblEmail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblEmailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblEmail model.
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
     * Creates a new TblEmail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblEmail();

        if ($model->load(Yii::$app->request->post())) 
        {
            // upload the attachment
            $model->attachment = UploadedFile::getInstance($model, 'attachment');

            if ( $model->attachment )
            {
                $time = time();
                $model->attachment->saveAs('attachments/' .$time. '.' .$model->attachment->extension);
                $model->attachment='attachments/' .$time. '.' .$model->attachment->extension;
            }

            if( $model->attachment)
            {
                $value =  Yii::$app->mailer->compose()
                ->setFrom([Yii::$app->user->identity->email => Yii::$app->user->identity->username])
                ->setTo([$model->receiver_email])
                ->setSubject($model->subject)
                ->setHtmlBody($model->content)
                ->attach($model->attachment)
                ->send();
            }

            else
            {
                $value =  Yii::$app->mailer->compose()
                ->setFrom([Yii::$app->user->identity->email => Yii::$app->user->identity->username])
                ->setTo($model->receiver_email)
                ->setSubject($model->subject)
                ->setHtmlBody($model->content)
                ->send();                
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->email_id]);
        } 

        else 
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblEmail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->email_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblEmail model.
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
     * Finds the TblEmail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblEmail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblEmail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
