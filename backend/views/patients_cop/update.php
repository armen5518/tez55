<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Patients */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Patients',
]) . $model->patients_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->patients_id, 'url' => ['view', 'id' => $model->patients_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patients-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
