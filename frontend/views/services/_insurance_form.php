<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$template = [
    'template' => "{label}\n{input}\n{hint}\n{error}",
    'labelOptions' => [ 'class' => 'field-label' ]
];

?>

<?php $form = ActiveForm::begin(['id' => 'insurance-form', 'options' => [ 'class' => 'mb-60']]); ?>
<?= $form->field($model, 'subject')->hiddenInput(['value'=> $model->subject])->label(false); ?>
<div class="formSection">
    <div class="row">
        <div class="form-group col-sm-12 col-xs-12">
            <div class="caption"><?=Yii::t('app','Leave an online application')?></div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-xs-12">
            <?= $form->field($model, 'name', $template)->textInput(['autofocus' => false, 'class'=>'field-input']) ?>
        </div>
        <div class="form-group col-sm-6 col-xs-12">
            <?= $form->field($model, 'phone', $template)->textInput(['class'=>'field-input']) ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12 col-xs-12">
            <?= $form->field($model, 'email', $template)->textInput(['class'=>'field-input']) ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12 col-xs-12">
            <?= $form->field($model, 'body', $template)->textarea(['rows' => 3, 'class'=>'field-input']) ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12 mb0">
            <?= Html::submitButton(Yii::t('app','Send message'), ['class' => 'btn btn-primary', 'name' => 'contact-button', 'id'=>'send-btn', 'data-mytext'=>Yii::t('app','Send message')]) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>