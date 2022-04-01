<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\Language;

/* @var $this yii\web\View */
/* @var $model backend\models\Settings */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="settings-form">
    <?php $form = ActiveForm::begin(['id'=>'settings']);//,'options' => ['enctype' => 'multipart/form-data'] ?>
    <!--<div class="row">
        <div class="col-sm-12">
            <?php /*\dvizh\gallery\widgets\Gallery::widget(
                [
                    'model' => $model,
                    'previewSize' => '450x250',
                    'fileInputPluginLoading' => true,
                    'fileInputPluginOptions' => []
                ]
            );*/ ?>
        </div>
    </div>-->
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'mykey')->textInput(['maxlength' => true]) ?>
        </div>
    </div><div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'language')->dropDownList(Language::getLanguageArray()) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Update'),
            ['class' => $model->isNewRecord ? 'btn btn-primary btn-large' : 'btn btn-success btn-large']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
