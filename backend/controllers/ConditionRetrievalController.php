<?php

namespace backend\controllers;

use backend\models\ProblemLogSearch;
use common\models\ProblemLog;
use Yii;
use common\models\ConditionRetrieval;
use common\models\ConditionClinicalNotes;
use backend\models\ConditionRetrievalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConditionRetrievalController implements the CRUD actions for ConditionRetrieval model.
 */
class ConditionRetrievalController extends Controller
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
     * Lists all ConditionRetrieval models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConditionRetrievalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ConditionRetrieval model.
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
     * Creates a new ConditionRetrieval model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ConditionRetrieval();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->condition_retrieval_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ConditionRetrieval model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = ConditionRetrieval::findOne(['conditions_id' => $id]);

        if(!empty($model)){

            if ($model->load(Yii::$app->request->post())) {
                $model->Last_Update_Date = date("Y-m-d H:i:s");
                 if($model->save()){

                 };
                return $this->redirect(['patients/view', 'id' => Yii::$app->request->get('p_id')]);
            } else {
                $searchModel = new ProblemLogSearch();
                $dataProviderLog = $searchModel->search(Yii::$app->request->queryParams);
                $model_log = new ProblemLog();
                return $this->render('update', [
                    'model_log' => $model_log,
                    'model' => $model,
                    'dataProviderLog' => $dataProviderLog,
                ]);
            }
        }else{
            $model = new ConditionRetrieval();
            if (Yii::$app->request->post() && Yii::$app->request->get('id')) {

                $post = Yii::$app->request->post();
                $model->Symptoms = $post['Symptoms'];
                $model->Potential_diagnose =  $post['Potential_diagnose'];
                $model->Status =  $post['Status'];
                $model->conditions_id = Yii::$app->request->get('id');
                $model->Last_Update_Date = date("Y-m-d H:i:s");
                if($model->save()){
                    return $this->redirect(['patients/view', 'id' => Yii::$app->request->get('p_id')]);
                }
                exit;

            } else {
                $searchModel = new ProblemLogSearch();
                $dataProviderLog = $searchModel->search(Yii::$app->request->queryParams);
                $model_log = new ProblemLog();
                return $this->render('update', [
                    'model_log' => $model_log,
                    'model' => $model,
                    'dataProviderLog' => $dataProviderLog,
                ]);
            }
        }

    }

    /**
     * Deletes an existing ConditionRetrieval model.
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
     * Finds the ConditionRetrieval model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ConditionRetrieval the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ConditionRetrieval::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
