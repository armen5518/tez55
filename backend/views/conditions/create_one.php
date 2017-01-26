<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Conditions */

$this->title = Yii::t('app', 'Create Conditions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Conditions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conditions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_one', [
        'model' => $model,
    ]) ?>

</div>
