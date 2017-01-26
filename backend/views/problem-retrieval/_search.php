<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProblemRetrievalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="problem-retrieval-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'problem_retrieval_id') ?>

    <?= $form->field($model, 'problem_id') ?>

    <?= $form->field($model, 'Symptoms') ?>

    <?= $form->field($model, 'Initial_diagnose') ?>

    <?= $form->field($model, 'main_diagnose') ?>

    <?php // echo $form->field($model, 'Secondary_diagnoses') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
