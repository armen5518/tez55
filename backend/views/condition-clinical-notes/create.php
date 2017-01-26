<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ConditionClinicalNotes */

$this->title = Yii::t('app', 'Create Condition Clinical Notes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Condition Clinical Notes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condition-clinical-notes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
