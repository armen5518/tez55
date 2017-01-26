<?php

use dosamigos\datetimepicker\DateTimePicker;
use kartik\color\ColorInput;
use kartik\switchinput\SwitchInput;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        


        <?= '<label>Start</label>'; ?>
        <?=
        DateTimePicker::widget([
            'model' => $model,
            'attribute' => 'start',
            'language' => 'es',
            'size' => 'ms',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-ddTHH:ii:ss',
                'todayBtn' => true
            ]
        ]); ?>
        <?= '<label>End</label>'; ?>
        <?= DateTimePicker::widget([
            'model' => $model,
            'attribute' => 'end',
            'language' => 'es',
            'size' => 'ms',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyy-mm-ddTHH:ii:ss',
                'todayBtn' => true
            ]
        ]);
        ?>
        <?= $form->field($model, 'allDay')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX
        ]); ?>
        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6 ">
        <?php
        $form->field($model, 'ranges')->textInput() ?>

        <?php
        $form->field($model, 'dow')->textInput(['maxlength' => true]) ?>


        <?php
        $form->field($model, 'className')->textInput(['maxlength' => true]) ?>

        <?php
        $form->field($model, 'editable')->textInput() ?>

        <?php
        $form->field($model, 'startEditable')->textInput(['maxlength' => true]) ?>

        <?php
        $form->field($model, 'durationEditable')->textInput(['maxlength' => true]) ?>

        <?php
        $form->field($model, 'source')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'color')->widget(ColorInput::classname(), [
            'options' => ['placeholder' => 'Select color ...'],
        ]);
        ?>
        <?= $form->field($model, 'backgroundColor')->widget(ColorInput::classname(), [
            'options' => ['placeholder' => 'Select color ...'],
        ]);
        ?>

        <?= $form->field($model, 'borderColor')->widget(ColorInput::classname(), [
            'options' => ['placeholder' => 'Select color ...'],
        ]);
        ?>

        <?= $form->field($model, 'textColor')->widget(ColorInput::classname(), [
            'options' => ['placeholder' => 'Select color ...'],
        ]);
        ?>
    </div>

    <div class=" form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
