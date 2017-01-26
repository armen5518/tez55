<?php
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProblemRetrieval */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Problem Retrieval',
]) . $model->Symptoms;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Problem Retrievals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->problem_retrieval_id, 'url' => ['view', 'id' => $model->problem_retrieval_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="problem-retrieval-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProviderLog' => $dataProviderLog,
        'model_log' => $model_log,
    ]) ?>


</div>
