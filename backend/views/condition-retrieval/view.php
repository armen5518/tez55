<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ConditionRetrieval */

$this->title = $model->condition_retrieval_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Condition Retrievals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condition-retrieval-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->condition_retrieval_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->condition_retrieval_id], [
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
            'condition_retrieval_id',
            'conditions_id',
            'Symptoms',
            'Potential_diagnose',
            'Status',
            'Last_Update_Date',
        ],
    ]) ?>

</div>
