<?php
use dmstr\widgets\Alert;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Doctor Dashboard';


//$Event = new \yii2fullcalendar\models\Event();
//$Event->id = 2;
//$Event->dow = [1, 3, 5];
//$Event->description = 'Text';
//$Event->description = 'Text';
//$Event->color = 'red';
//$Event->start = date('Y-m-d\TH:i:s\Z', strtotime('tomorrow 6am'));
//$events[] = $Event;
//
//$Event = new \yii2fullcalendar\models\Event();
//$Event->id = 3;
//$Event->title = 'Testing2';
//$Event->start = date('Y-m-d\TH:i:s\Z', strtotime('tomorrow 8am'));
//$events[] = $Event;
//
//$Event = new \yii2fullcalendar\models\Event();
//$Event->id = 3;
//$Event->title = 'Testing2';
//$Event->start = date('2016.07.18');
//$Event->end = date('2016.07.21');
//$Event->color = 'blue';
//$events[] = $Event;
//
//$Event = new \yii2fullcalendar\models\Event();
//$Event->id = 3;
//$Event->title = 'Testing2';
//$Event->start = date('2016.07.23');
//$Event->end = date('2016.07.25');
//$Event->color = 'black';
//$events[] = $Event;
//
//$Event = new \yii2fullcalendar\models\Event();
//$Event->id = 3;
//$Event->title = 'Testing2';
//$Event->start = date('2016.07.1');
//$Event->end = date('2016.07.5');
//$Event->color = 'red';
//$events[] = $Event;
//
//$Event = new \yii2fullcalendar\models\Event();
//$Event->id = 3;
//$Event->title = 'Testing2';
//$Event->start = date('2016.07.7');
//$Event->end = date('2016.07.7');
//$Event->color = 'green ';
//$events[] = $Event;
//
//$Event = new \yii2fullcalendar\models\Event();
//$Event->id = 3;
//$Event->title = 'Testing2';
//$Event->start = date('2016.07.7');
//$Event->end = date('2016.08.8');
//$Event->color = 'brown';
//$events[] = $Event;
?>
<section class="content-header">
    <div class="row">
        <div class="col-lg-10 col-lg-10 col-sm-10 col-xs-10">
            <?php if (isset($this->blocks['content-header'])) { ?>
                <h1><?= $this->blocks['content-header'] ?></h1>
            <?php } else { ?>
                <h1>
                    <?php
                    if ($this->title !== null) {
                        echo \yii\helpers\Html::encode($this->title);
                    } else {
                        echo \yii\helpers\Inflector::camel2words(
                            \yii\helpers\Inflector::id2camel($this->context->module->id)
                        );
                        echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                    } ?>
                </h1>
                <p>
                    <?= Html::a(Yii::t('app', 'Create Event'), ['event/create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a(Yii::t('app', 'All Events'), ['/event'], ['class' => 'btn btn-success']) ?>
                </p>
            <?php } ?>

            <?=
            Breadcrumbs::widget(
                [
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]
            ) ?>

        </div>
        <div  class="col-lg-2 col-lg-2 col-sm-2 col-xs-2">
            <h2>Notification</h2>
        </div>

    </div>
</section>

<div class="row">
    <div class="col-lg-10 col-lg-10 col-sm-10 col-xs-10" style="border-right: steelblue solid 1px">

        <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
            'events' => $events,
            'header' => [
                'center' => 'title',
                'left' => 'prev,next today',
                'right' => 'month,agendaWeek,agendaDay'
            ]
        )); ?>
    </div>
    <div class="col-lg-2 col-lg-2 col-sm-2 col-xs-2">
        <h2>Notification</h2>
        <div style="border-bottom: darkblue solid 1px">
            text

        </div>
        <div style="border-bottom: darkblue solid 1px">
            text
        </div>
        <div style="border-bottom: darkblue solid 1px">
            text
        </div>
        <div style="border-bottom: darkblue solid 1px">
            text
        </div>
    </div>

</div>


