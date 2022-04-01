<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Testimonial */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Testimonials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-create">
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h1><?php //echo $this->title; ?> <small><?php //echo $this->params['subtitle']; ?></small></h1>-->
            <div class="text-right">
                <?= Html::a('<i class="glyphicon glyphicon-list"></i>', ['index'],
                    [
                        'class' => 'btn btn-default btn-sm',
                        'title' => Yii::t('app', 'List')
                    ]); ?>
            </div>
        </div>
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]); ?>

        </div>
    </div>
</div>
