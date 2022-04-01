<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Settings */

$this->title = Yii::t('app', 'Settings').' '.$model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-view">
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h1><?php //echo $this->title; ?></h1>-->
            <div class="text-right">
                <?= Html::a('<i class="glyphicon glyphicon-list"></i>', ['index'],
                    [
                        'class' => 'btn btn-default btn-sm',
                        'title' => Yii::t('app', 'List')
                    ]); ?>
                <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->id],
                    [
                        'class' => 'btn btn-default btn-sm',
                        'title' => Yii::t('app','Update')
                    ]); ?>
                <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    [
                        'class' => 'btn btn-primary btn-sm',
                        'title' => Yii::t('app', 'Create')
                    ]); ?>
                <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id],
                    [
                        'class' => 'btn btn-danger btn-sm',
                        'title' => Yii::t('app','Delete'),
                        'data-confirm' => Yii::t('app','Are you sure to delete this item?'),
                        'data-method' => 'post',
                    ]); ?>
            </div>
        </div>
        <div class="panel-body">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'mykey',
                    'value:ntext',
                ],
            ]) ?>


        </div>
    </div>
</div>
