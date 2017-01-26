<?php

namespace backend\controllers;

use common\models\PatientsProblems;
use Yii;
use common\models\Problems;
use backend\models\ProblemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProblemsController implements the CRUD actions for Problems model.
 */
class ProblemsController extends Controller
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
     * Lists all Problems models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProblemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Problems model.
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
     * Creates a new Problems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Problems();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model_pat_prob = new PatientsProblems();
            $model_pat_prob->problem_id =  $model->problems_id;
            $model_pat_prob->patient_id =  Yii::$app->request->get('u_id');
           if( $model_pat_prob->save()){
               return $this->redirect(['conditions/create', 'p_id' => $model->problems_id,'u_id' => Yii::$app->request->get('u_id')]);
           }else{
               return $this->goHome();
           };
       } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreateOne()
    {
        $model = new Problems();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model_pat_prob = new PatientsProblems();
            $model_pat_prob->problem_id =  $model->problems_id;
            $model_pat_prob->patient_id =  Yii::$app->request->get('u_id');
            if( $model_pat_prob->save()){
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
    /**
     * Updates an existing Problems model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->problems_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Problems model.
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
     * Finds the Problems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Problems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Problems::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
