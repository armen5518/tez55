<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\widgets\Select2;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use kartik\widgets\DatePicker;
?>
<div class="condition-retrieval-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'Symptoms')->textarea(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'Potential_diagnose')->dropDownList([
                '0' => 'text1',
                '1' => 'text2',
                '2' => 'text3'
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="Clinical-Notes">
            
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'Last_Update_Date')->textInput(['maxlength' => true,'readonly' => true]) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <h1>Problem Log</h1>
            <?php Modal::begin([
                'header' => '<h2>Add  problem Log</h2>',
                'toggleButton' => ['label' => 'Add problem log','class' => 'btn btn-primary'],
            ]);

            echo '<div class="problem-log-form">';


            $form = ActiveForm::begin();


            echo $form->field($model_log, 'data')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter birth date ...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]);
            echo $form->field($model_log, 'text')->textInput(['maxlength' => true]);



            echo'<div class="form-group">';
            echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
            echo '</div>';

            ActiveForm::end();

            echo '</div>';

            Modal::end();?>


            <?= GridView::widget([
                'dataProvider' => $dataProviderLog,
//            'filterModel' => $searchModelProblems,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                'problems_id',
//                    [
//                        'label' => 'title',
//                        'value' => function ($data, $model) {
//                            return Html::a($data->title, \yii\helpers\Url::to(['problem-retrieval/update', 'id' => $data->problems_id, 'p_id' => Yii::$app->request->get('id')]));
//                        },
//                        'format' => 'raw',
//                    ],
                    'data',
                    'text',


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
                                $url = \yii\helpers\Url::to(['problem-log/view', 'id' => $model->id]);
                                return $url;
                            }
                            if ($action === 'update') {
                                $url = \yii\helpers\Url::to(['problem-log/update', 'id' => $model->id]);
                                return $url;
                            }
                            if ($action === 'delete') {
                                $url = \yii\helpers\Url::to(['problem-log/delete', 'id' => $model->id, 'u_id' => Yii::$app->request->get('id')]);
                                return $url;
                            }
                        }
                    ],
                ],
            ]); ?>
        </div>
        <div class="col-md-6">
            <h1>Clinical Notes </h1>
            <?php Modal::begin([
                'header' => '<h2>Add  clinical notes </h2>',
                'toggleButton' => ['label' => 'Add clinical notes','class' => 'btn btn-primary'],
            ]);

            echo '<div class="problem-log-form">';


            $form = ActiveForm::begin();


            echo $form->field($model_log, 'data')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter birth date ...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]);
            echo $form->field($model_log, 'text')->textInput(['maxlength' => true]);



            echo'<div class="form-group">';
            echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
            echo '</div>';

            ActiveForm::end();

            echo '</div>';

            Modal::end();?>


            <?= GridView::widget([
                'dataProvider' => $dataProviderLog,
//            'filterModel' => $searchModelProblems,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                'problems_id',
//                    [
//                        'label' => 'title',
//                        'value' => function ($data, $model) {
//                            return Html::a($data->title, \yii\helpers\Url::to(['problem-retrieval/update', 'id' => $data->problems_id, 'p_id' => Yii::$app->request->get('id')]));
//                        },
//                        'format' => 'raw',
//                    ],
                    'data',
                    'text',


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
                                $url = \yii\helpers\Url::to(['problem-log/view', 'id' => $model->id]);
                                return $url;
                            }
                            if ($action === 'update') {
                                $url = \yii\helpers\Url::to(['problem-log/update', 'id' => $model->id]);
                                return $url;
                            }
                            if ($action === 'delete') {
                                $url = \yii\helpers\Url::to(['problem-log/delete', 'id' => $model->id, 'u_id' => Yii::$app->request->get('id')]);
                                return $url;
                            }
                        }
                    ],
                ],
            ]); ?></div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
