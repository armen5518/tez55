<?php

use kartik\file\FileInput;
use kartik\select2\Select2;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('app', 'Register  Organization');
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
        <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'Registration_Number')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'Street')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'Address')->textInput(['maxlength' => true]) ?>


        <?= $form->field($model, 'Type')->widget(Select2::classname(), [
            'data' => [' PHC', 'Hospital', 'Insurance Company'],
            'language' => 'en',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Registration') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>
    <div class="col-md-6 ">
        <?= $form->field($model, 'City')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'Postal')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'Country')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'Documents')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
        ]);
        ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
