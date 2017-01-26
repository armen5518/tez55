<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ConditionClinicalNotes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Condition Clinical Notes',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Condition Clinical Notes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="condition-clinical-notes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
