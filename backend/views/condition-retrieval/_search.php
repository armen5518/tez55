<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ConditionRetrievalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="condition-retrieval-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'condition_retrieval_id') ?>

    <?= $form->field($model, 'conditions_id') ?>

    <?= $form->field($model, 'Symptoms') ?>

    <?= $form->field($model, 'Potential_diagnose') ?>

    <?= $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Last_Update_Date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
