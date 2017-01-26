<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ConditionRetrieval */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Condition Retrieval',
]) . $model->condition_retrieval_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Condition Retrievals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->condition_retrieval_id, 'url' => ['view', 'id' => $model->condition_retrieval_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="condition-retrieval-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_log' => $model_log,
        'dataProviderLog' => $dataProviderLog,
    ]) ?>

</div>
