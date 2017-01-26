<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProblemRetrievalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Problem Retrievals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-retrieval-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Problem Retrieval'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'problem_retrieval_id',
            'problem_id',
            'Symptoms',
            'Initial_diagnose',
            'main_diagnose',
            // 'Secondary_diagnoses',
            // 'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
