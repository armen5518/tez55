<?php

namespace backend\controllers;

use backend\models\ConditionsSearch;
use common\models\Conditions;
use common\models\Patients;
use common\models\PatientsConditions;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ConditionsController implements the CRUD actions for Conditions model.
 */
class ApiController extends Controller
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
     * Lists all Conditions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConditionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Conditions model.
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
     * Creates a new Conditions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Conditions();
        $model_pac = new Patients();
        $get_data = Yii::$app->request;
        if ($model->load(Yii::$app->request->post())
            && $model->save()
            && $model_pac->updateData($get_data->get('p_id'), $model->conditions_id, $get_data->get('u_id'))
        ) {

            return $this->redirect(['patients/view', 'id' => Yii::$app->request->get('u_id')]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

  
     public function actionCreateOne()
     {
         $model = new Conditions();

         if ($model->load(Yii::$app->request->post()) && $model->save()) {
             $model_pat_cond = new PatientsConditions();
             $model_pat_cond->condition_id =  $model->conditions_id;
             $model_pat_cond->patient_id =  Yii::$app->request->get('u_id');
             if( $model_pat_cond->save()){
                 return $this->redirect(['patients/view', 'id' => Yii::$app->request->get('u_id')]);
             }else{
                 return $this->goHome();
             };
         } else {
             return $this->render('create_one', [
                 'model' => $model,
             ]);
         }
     }
    public function actionNext()
    {
        $model = new Conditions();
        $model_pac = new Patients();
        $get_data = Yii::$app->request;
        if ( $model_pac->updateData($get_data->get('p_id'), $model->conditions_id, $get_data->get('u_id'))
        ) {

            return $this->redirect(['patients/view', 'id' => Yii::$app->request->get('u_id')]);
        } else {
            return $this->redirect('/patients/create');
        }
    }

    /**
     * Updates an existing Conditions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->conditions_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Conditions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['patients/view' ,'id' => Yii::$app->request->get('u_id')]);
    }

    /**
     * Finds the Conditions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Conditions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Conditions::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionGet()
    {
        if(Yii::$app->request->post()){
            print_r(Yii::$app->request->post());
        }
        exit;
    }
}
