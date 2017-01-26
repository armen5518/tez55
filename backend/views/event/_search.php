<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\EventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'allDay') ?>

    <?= $form->field($model, 'start') ?>

    <?php // echo $form->field($model, 'end') ?>

    <?php // echo $form->field($model, 'ranges') ?>

    <?php // echo $form->field($model, 'dow') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'className') ?>

    <?php // echo $form->field($model, 'editable') ?>

    <?php // echo $form->field($model, 'startEditable') ?>

    <?php // echo $form->field($model, 'durationEditable') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'backgroundColor') ?>

    <?php // echo $form->field($model, 'borderColor') ?>

    <?php // echo $form->field($model, 'textColor') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
