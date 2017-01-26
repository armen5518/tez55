<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProblemRetrieval */

$this->title = Yii::t('app', 'Create Problem Retrieval');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Problem Retrievals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-retrieval-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProviderLog' => $dataProviderLog,
        'model_log' => $model_log,
    ]) ?>

</div>
