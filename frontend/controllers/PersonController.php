<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

use frontend\models\Modelperkara;
use frontend\models\House;
use frontend\models\Room;
use frontend\models\Person;
use frontend\models\PersonSearch;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends Controller
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
     * Lists all Person models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Person model.
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
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelPerson = new Person;
        $modelsHouse = [new House];
        $modelsRoom = [[new Room]];

        if ($modelPerson->load(Yii::$app->request->post())) {

            $modelsHouse = Modelperkara::createMultiple(House::classname());
            Modelperkara::loadMultiple($modelsHouse, Yii::$app->request->post());

            // validate person and houses models
            $valid = $modelPerson->validate();
            $valid = Modelperkara::validateMultiple($modelsHouse) && $valid;

            if (isset($_POST['Room'][0][0])) {
                foreach ($_POST['Room'] as $indexHouse => $rooms) {
                    foreach ($rooms as $indexRoom => $room) {
                        $data['Room'] = $room;
                        $modelRoom = new Room;
                        $modelRoom->load($data);
                        $modelsRoom[$indexHouse][$indexRoom] = $modelRoom;
                        $valid = $modelRoom->validate();
                    }
                }
            }

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelPerson->save(false)) {
                        foreach ($modelsHouse as $indexHouse => $modelHouse) {

                            if ($flag === false) {
                                break;
                            }

                            $modelHouse->person_id = $modelPerson->id;

                            if (!($flag = $modelHouse->save(false))) {
                                break;
                            }

                            if (isset($modelsRoom[$indexHouse]) && is_array($modelsRoom[$indexHouse])) {
                                foreach ($modelsRoom[$indexHouse] as $indexRoom => $modelRoom) {
                                    $modelRoom->house_id = $modelHouse->id;
                                    if (!($flag = $modelRoom->save(false))) {
                                       break;
                                    }

                                    //$modelRoom->save();
                                    //$modelRoom = new Room();
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelPerson->id]);
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

        return $this->render('create', [
            'modelPerson' => $modelPerson,
            'modelsHouse' => (empty($modelsHouse)) ? [new House] : $modelsHouse,
            'modelsRoom' => (empty($modelsRoom)) ? [[new Room]] : $modelsRoom,
        ]);
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelPerson = $this->findModel($id);

        $modelsHouse = $modelPerson->houses;

        $modelsRoom = [];

        $oldRooms = [];


        if (!empty($modelsHouse)) {

            foreach ($modelsHouse as $indexHouse => $modelHouse) {

                $rooms = $modelHouse->rooms;

                $modelsRoom[$indexHouse] = $rooms;

                $oldRooms = ArrayHelper::merge(ArrayHelper::index($rooms, 'id'), $oldRooms);

            }

        }


        if ($modelPerson->load(Yii::$app->request->post())) {


            // reset

            $modelsRoom = [];


            $oldHouseIDs = ArrayHelper::map($modelsHouse, 'id', 'id');

            $modelsHouse = Modelperkara::createMultiple(House::classname(), $modelsHouse);

            Modelperkara::loadMultiple($modelsHouse, Yii::$app->request->post());

            $deletedHouseIDs = array_diff($oldHouseIDs, array_filter(ArrayHelper::map($modelsHouse, 'id', 'id')));


            // validate person and houses models

            $valid = $modelPerson->validate();

            $valid = Modelperkara::validateMultiple($modelsHouse) && $valid;


            $roomsIDs = [];

            if (isset($_POST['Room'][0][0])) {

                foreach ($_POST['Room'] as $indexHouse => $rooms) {

                    $roomsIDs = ArrayHelper::merge($roomsIDs, array_filter(ArrayHelper::getColumn($rooms, 'id')));

                    foreach ($rooms as $indexRoom => $room) {

                        $data['Room'] = $room;

                        $modelRoom = (isset($room['id']) && isset($oldRooms[$room['id']])) ? $oldRooms[$room['id']] : new Room;

                        $modelRoom->load($data);

                        $modelsRoom[$indexHouse][$indexRoom] = $modelRoom;

                        $valid = $modelRoom->validate();

                    }

                }

            }


            $oldRoomsIDs = ArrayHelper::getColumn($oldRooms, 'id');

            $deletedRoomsIDs = array_diff($oldRoomsIDs, $roomsIDs);


            if ($valid) {

                $transaction = Yii::$app->db->beginTransaction();

                try {

                    if ($flag = $modelPerson->save(false)) {


                        if (! empty($deletedRoomsIDs)) {

                            Room::deleteAll(['id' => $deletedRoomsIDs]);

                        }


                        if (! empty($deletedHouseIDs)) {

                            House::deleteAll(['id' => $deletedHouseIDs]);

                        }


                        foreach ($modelsHouse as $indexHouse => $modelHouse) {


                            if ($flag === false) {

                                break;

                            }


                            $modelHouse->person_id = $modelPerson->id;


                            if (!($flag = $modelHouse->save(false))) {

                                break;

                            }


                            if (isset($modelsRoom[$indexHouse]) && is_array($modelsRoom[$indexHouse])) {

                                foreach ($modelsRoom[$indexHouse] as $indexRoom => $modelRoom) {

                                    $modelRoom->house_id = $modelHouse->id;

                                    if (!($flag = $modelRoom->save(false))) {

                                        break;

                                    }

                                }

                            }

                        }

                    }


                    if ($flag) {

                        $transaction->commit();

                        return $this->redirect(['view', 'id' => $modelPerson->id]);

                    } else {

                        $transaction->rollBack();

                    }

                } catch (Exception $e) {

                    $transaction->rollBack();

                }

            }

        }


        return $this->render('update', [

            'modelPerson' => $modelPerson,

            'modelsHouse' => (empty($modelsHouse)) ? [new House] : $modelsHouse,

            'modelsRoom' => (empty($modelsRoom)) ? [[new Room]] : $modelsRoom

        ]);
    }

    /**
     * Deletes an existing Person model.
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
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Person the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
