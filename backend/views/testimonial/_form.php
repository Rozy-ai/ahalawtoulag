<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Testimonial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="testimonial-form">
    <?php $form = ActiveForm::begin(['id'=>'testimonial','options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-sm-12">
            <?=\dvizh\gallery\widgets\Gallery::widget(
                [
                    'model' => $model,
                    'previewSize' => '150x150',
                    'fileInputPluginLoading' => true,
                    'fileInputPluginOptions' => []
                ]
            ); ?>
        </div>
    </div>
    <!--<div class="row">
        <div class="col-sm-12">
            <?php //echo $form->field($model, 'text')->textarea(['rows' => 6]); ?>
        </div>
    </div>-->
    <div class="row">
        <div class="col-sm-12">
            <?php //echo $form->field($model, 'language')->dropDownList($model->getLanguageArray()); ?>
            <?php echo $form->field($model, 'language')->hiddenInput(['value'=>\common\helpers\Language::LANG_TM])->label(false); ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Update'),
            ['class' => $model->isNewRecord ? 'btn btn-primary btn-large' : 'btn btn-success btn-large']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
