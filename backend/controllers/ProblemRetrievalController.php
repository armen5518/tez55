<?php

namespace backend\controllers;

use backend\models\ProblemLogSearch;
use common\helpers\Helper;
use common\models\ProblemLog;
use Yii;
use common\models\ProblemRetrieval;
use backend\models\ProblemRetrievalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProblemRetrievalController implements the CRUD actions for ProblemRetrieval model.
 */
class ProblemRetrievalController extends Controller
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
     * Lists all ProblemRetrieval models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProblemRetrievalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProblemRetrieval model.
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
     * Creates a new ProblemRetrieval model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new ProblemRetrieval();
        if (empty($model::findOne(['problem_id' => Yii::$app->request->get('id')]))){

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $searchModel = new ProblemLogSearch();
                $dataProviderLog = $searchModel->search(Yii::$app->request->queryParams);
                $model_log = new ProblemLog();
                return $this->render('create', [
                    'model' => $model,
                    'model_log' => $model_log,
                    'dataProviderLog' => $dataProviderLog,
                ]);
            }
        }else{
            return $this->redirect(['update', 'id'   => Yii::$app->request->get('id'),
                                              'p_id' => Yii::$app->request->get('p_id')
                                    ]);
        }



    }

    /**
     * Updates an existing ProblemRetrieval model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = ProblemRetrieval::findOne(['problem_id' => Yii::$app->request->get('id')]);
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post()['ProblemRetrieval'];
            $model->Symptoms = $post['Symptoms'] ;
            $model->Initial_diagnose = $post['Initial_diagnose'] ;
            $model->main_diagnose = $post['main_diagnose'] ;
            $model->main_diagnose = $post['main_diagnose'] ;
            $model->Secondary_diagnoses = 1;
            $model->Status = $post['Status'];
            if($model->save()){
                Yii::$app->session->setFlash('success', "Problem saved");
                return $this->redirect(['patients/view', 'id' => Yii::$app->request->get('p_id')]);
            }else{
                Yii::$app->session->setFlash('error', "Problems are not saved");
                return $this->redirect(['patients/view', 'id' => Yii::$app->request->get('p_id')]);
            }

        } else {
            $searchModel = new ProblemLogSearch();
            $dataProviderLog = $searchModel->search(Yii::$app->request->queryParams);
            $model_log = new ProblemLog();
            return $this->render('update', [
                'model' => $model,
                'model_log' => $model_log,
                'dataProviderLog' => $dataProviderLog,
            ]);
        }


    }

    /**
     * Deletes an existing ProblemRetrieval model.
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
     * Finds the ProblemRetrieval model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProblemRetrieval the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProblemRetrieval::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
