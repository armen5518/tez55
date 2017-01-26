<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PatientsProblems */

$this->title = Yii::t('app', 'Create Patients Problems');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients Problems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patients-problems-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
