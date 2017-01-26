<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProblemRetrieval */

$this->title = $model->problem_retrieval_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Problem Retrievals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-retrieval-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->problem_retrieval_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->problem_retrieval_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'problem_retrieval_id',
            'problem_id',
            'Symptoms',
            'Initial_diagnose',
            'main_diagnose',
            'Secondary_diagnoses',
            'Status',
        ],
    ]) ?>

</div>
