<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Patients */

$this->title = $model->p_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patients-view">

    <h1>Patient Medical History</h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->patients_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->patients_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'patients_id',
            'ealth_tatus',
            'date',
            'description',
            'p_name',
            'p_last_name',
            'date_birth',
            'social_number',
        ],
    ]) ?>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <h1>Problems</h1>
        <?= Html::a(Yii::t('app', 'Add Problem'), ['problems/create-one', 'u_id' => $model->patients_id], ['class' => 'btn btn-primary']) ?>
        <?php Pjax::begin(); ?>    <?= GridView::widget([
            'dataProvider' => $dataProviderProblems,
//            'filterModel' => $searchModelProblems,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'problems_id',
                [
                    'label' => 'title',
                    'value' => function ($data, $model) {
                        return Html::a($data->title, \yii\helpers\Url::to(['problem-retrieval/create', 'id' => $data->problems_id, 'p_id' => Yii::$app->request->get('id')]));
                    },
                    'format' => 'raw',
                ],
                'diagnose',
                'status',
                'date',

                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{view}{update}{delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'title' => Yii::t('app', 'View'),


                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => Yii::t('app', 'Update'),
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'Delete'),
                                'data' => [
                                    'method' => 'post',
                                ],
                            ]);
                        },

                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = \yii\helpers\Url::to(['problems/view', 'id' => $model->problems_id]);
                            return $url;
                        }
                        if ($action === 'update') {
                            $url = \yii\helpers\Url::to(['problems/update', 'id' => $model->problems_id]);
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = \yii\helpers\Url::to(['problems/delete', 'id' => $model->problems_id, 'u_id' => Yii::$app->request->get('id')]);
                            return $url;
                        }
                    }
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
    <div class="col-md-6">
        <h1>Conditions</h1>
        <?=
        Html::a(Yii::t('app', 'Add Condition'), ['conditions/create-one', 'u_id' => $model->patients_id], ['class' => 'btn btn-primary'])
        ?>
        <?= GridView::widget([
            'dataProvider' => $dataProviderConditions,
//            'filterModel' => $searchModelConditions,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'conditions_id',
                [
                    'label' => 'title',
                    'value' => function ($data) {
                        return Html::a($data->title, \yii\helpers\Url::to(['condition-retrieval/update', 'id' => $data->conditions_id, 'p_id' => Yii::$app->request->get('id')]));
                    },
                    'format' => 'raw',
                ],
                'diagnose',
                'status',
                'date',

                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{view}{update}{delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'title' => Yii::t('app', 'View'),
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => Yii::t('app', 'Update'),
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'Delete'),
                                'data' => [
                                    'method' => 'post',
                                ],
                            ]);
                        },

                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = \yii\helpers\Url::to(['conditions/view', 'id' => $model->conditions_id]);
                            return $url;
                        }
                        if ($action === 'update') {
                            $url = \yii\helpers\Url::to(['conditions/update', 'id' => $model->conditions_id]);
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = \yii\helpers\Url::to(['conditions/delete', 'id' => $model->conditions_id, 'u_id' => Yii::$app->request->get('id')]);
                            return $url;
                        }
                    }
                ],


            ],
        ]); ?>
    </div>
</div>
