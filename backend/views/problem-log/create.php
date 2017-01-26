<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProblemLog */

$this->title = Yii::t('app', 'Create Problem Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Problem Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
