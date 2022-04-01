<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
<?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('app','Enter your name'), 'autofocus' => false])->label(false) ?>
<?= $form->field($model, 'email')->textInput(['placeholder' => Yii::t('app','Enter your email address')])->label(false) ?>
<?= $form->field($model, 'phone')->textInput(['placeholder' => Yii::t('app','Enter your phone')])->label(false) ?>
    <div class="">
        <?= Html::submitButton(Yii::t('app','Send message'), ['class' => 'btn', 'name' => 'contact-button', 'id'=>'send-btn', 'data-mytext'=>Yii::t('app','Send message')]) ?>
    </div>
<?php ActiveForm::end(); ?>