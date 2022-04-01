<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Services */

$this->title = Yii::t('app', '{nameAttribute}', [
'nameAttribute' => Yii::t('app', 'Category').' '.$model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="galereya-create">
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h1><?php //echo $this->title; ?> <small><?php //echo $this->params['subtitle']; ?></small></h1>-->
            <div class="text-right">
                <?= Html::a('<i class="glyphicon glyphicon-list"></i>', ['index'],
                    [
                        'class' => 'btn btn-default btn-sm',
                        'title' => Yii::t('app', 'List')
                    ]); ?>
                <?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', ['view', 'id' => $model->id],
                    [
                        'class' => 'btn btn-default btn-sm',
                        'title' => Yii::t('app','View')
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
            <?= $this->render('_form', [
                'model' => $model,
            ]); ?>
        </div>
    </div>
</div>
