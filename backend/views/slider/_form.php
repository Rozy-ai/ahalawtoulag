<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">
    <?php $form = ActiveForm::begin(['id'=>'slider','options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-sm-12">
            <?=\dvizh\gallery\widgets\Gallery::widget(
                [
                    'model' => $model,
                    'previewSize' => '450x250',
                    'fileInputPluginLoading' => true,
                    'fileInputPluginOptions' => []
                ]
            ); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'language')->dropDownList($model->getLanguageArray()) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'type')->dropDownList($model->getScreenArray()) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'link')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Update'),
            ['class' => $model->isNewRecord ? 'btn btn-primary btn-large' : 'btn btn-success btn-large']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
