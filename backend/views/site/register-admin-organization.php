<?php

use kartik\file\FileInput;
use kartik\select2\Select2;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('app', 'Register Admin Organization');
?>

<h1><?= Html::encode($this->title) ?></h1>
<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
        <?= $form->field($model, 'First_Name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'Last_Name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'E_mail')->textInput(['maxlength' => true]) ?>
        <?=  $form->field($model, 'Date_Birth')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter birth date ...'],
            'pluginOptions' => [
                'autoclose'=>true
            ]
        ]);
        ?>


        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Registration') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>
    <div class="col-md-6 ">
        <?= $form->field($model, 'Phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'Postal')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'Country')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'Documents')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
        ]);
        ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
