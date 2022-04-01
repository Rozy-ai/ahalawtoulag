<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget as Imperavi;
use common\services\CompanyCategoryService;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Services */
/* @var $form yii\widgets\ActiveForm */

$imperaviPlugins = [
    'fontsize',
    'table',
    'fullscreen',
    'filemanager',
    'imagemanager',

];

$settings = [
    'lang' => 'ru',
    'minHeight' => 200,
    'maxHeight' => 400,
    'limiter' => 4,
    'plugins' => $imperaviPlugins,
    'imageUpload' => Url::to(['/companies/image-upload']),
    'imageManagerJson' => Url::to(['/companies/images-get']),
    'fileUpload' => Url::to(['/companies/file-upload']),
    'fileManagerJson' => Url::to(['/companies/files-get']),
];


?>

<div class="galereya-form">
    <?php $form = ActiveForm::begin(['id'=>'galereya','options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-sm-12"><h4>Türkmençe</h4><hr></div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'title_tm')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'fullname_tm')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'products_tm')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'legal_address_tm')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'description_tm')->widget(Imperavi::className(), [
                'settings' => $settings
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12"><h4>Русский</h4><hr></div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'fullname_ru')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'products_ru')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'legal_address_ru')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'description_ru')->widget(Imperavi::className(), [
                'settings' => $settings
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12"><h4>English</h4><hr></div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'fullname_en')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'products_en')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'legal_address_en')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'description_en')->widget(Imperavi::className(), [
                'settings' => $settings
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'expiration_date')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'main_page')->checkBox(); ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php echo \dvizh\gallery\widgets\Gallery::widget(
                [
                    'model' => $model,
                    //'previewSize' => '100x100',
                    'fileInputPluginLoading' => true,
                    'fileInputPluginOptions' => []
                ]
            ); ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Update'),
            ['class' => $model->isNewRecord ? 'btn btn-primary btn-large' : 'btn btn-success btn-large']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

