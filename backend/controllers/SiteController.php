<?php
namespace backend\controllers;

use backend\models\RegisterAdminOrganization;
use common\helpers\Helper;
use common\models\Event;
use common\models\LoginForm;
use backend\models\RegisterOrganization;
use backend\models\User;
use common\models\ProblemRetrieval;
use yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use linslin\yii2\curl;
use yii\httpclient\Client;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */


    /**
     * @inheritdoc
     */
    public function actions()
    {
//        Yii::$app->response->redirect('/doc/backend/web/site/login');
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {

        


//
//        $client = new Client();
//        $response = $client->createRequest()
//            ->setMethod('post')
//            ->setHeaders([
//                'X-Auth-Username' => 'yemanasyan',
//                'X-Auth-Password' => 't9Cjs0tqD8g2G78w'
//                ]
//            )
//            ->setUrl('http://169.50.20.4:8080/login')
////            ->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
//            ->send();
////        if ($response->isOk) {
////            $newUserId = $response->data['id'];
////        }
//        var_dump($response->getHeaders()["x-auth-token"]); exit;
//      $res =   Yii::$app->httpclient->post(
//            'http://169.50.20.4:8080/login', // URL
//            '', // Body
//            [], // Options
//            true // Detect Mime Type?
//        );
//        print_r($res); exit;
////        Yii::$app->cu
////        //Init curl
//        $curl = new curl\Curl();
////
////        //get http://example.com/
////        $response = $curl->get('http://example.com/');
////        exit;
////        $curl = new curl\Curl();
////
////
////        //post http://example.com/
//        $response = $curl->setOption(
//            CURLOPT_HTTPHEADER,
//            array(
//                    'X-Auth-Username' => 'username',
//                    'X-Auth-Password' => 'password'
//                )
//            )
//            ->post('http://169.50.20.4:8080/login');
//
//        print_r($response); exit;
        $models = new Event();
        $models = $models->find()->all();
        $events = [];
        if(!empty($models)) {
            foreach ($models as $model) {


                $Event = new \yii2fullcalendar\models\Event();
                $Event->id = $model->id;
                $Event->title = $model->title;
                $Event->start = $model->start;
                $Event->description = $model->description;
                $Event->allDay = $model->allDay;
                $Event->start = $model->start;
                $Event->end = $model->end;
                $Event->ranges = $model->ranges;
                $Event->dow = $model->dow;
                $Event->url = Yii::$app->params['domain'].'/event/view?id='.$model->id;
                $Event->className = $model->className;
                $Event->editable = $model->editable;
                $Event->startEditable = $model->startEditable;
                $Event->durationEditable = $model->durationEditable;
                $Event->source = $model->source;
                $Event->color = $model->color;
                $Event->backgroundColor = $model->backgroundColor;
                $Event->borderColor = $model->borderColor;
                $Event->textColor = $model->textColor;

                $events[] = $Event;
            }
        }
//        Helper::out($models);
        return $this->render('index', [
            'events' => $events
        ]);
    }

    public function actionProfil()
    {
        $model = new User();
        $model = $model->findOne(Yii::$app->user->id);
//        print_r(Yii::$app->user->id);

        return $this->render('profil', [
            'user' => $model,
        ]);
    }

    public function actionMessage()
    {

        $model = new User();
        $model = $model->findOne(Yii::$app->user->id);
//        print_r(Yii::$app->user->id);

        return $this->render('message', [
            'user' => $model,
        ]);
    }
    public function actionLogin()
    {
        if (!yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionLogout1()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionRegisterOrganization()
    {
        $model = new RegisterOrganization();
        return $this->render('register-organization',[
            'model' => $model
        ]);
    }

    public function actionRegisterAdminOrganization()
    {
        $model = new RegisterAdminOrganization();
        return $this->render('register-admin-organization',[
            'model' => $model
        ]);
    }
    public  function actionApi(){

        if(Yii::$app->request->post()){
            print_r(Yii::$app->request->post());
        }
exit;
        $model = new ProblemRetrieval();
        $model->problem_id = 144;
        $model->Status = 'ok';
        echo 'mta.<br>';



        echo 'hela.<br>';
        $model->save();

        $model->on(yii\db\ActiveRecord::EVENT_BEFORE_INSERT  ,function($event){
            echo ' es Save exa.<br>';
        });


    }
}
