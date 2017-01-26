<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConditionRetrievalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Condition Retrievals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condition-retrieval-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Condition Retrieval'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'condition_retrieval_id',
            'conditions_id',
            'Symptoms',
            'Potential_diagnose',
            'Status',
            // 'Last_Update_Date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
