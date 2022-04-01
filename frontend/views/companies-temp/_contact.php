<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<!-- Consultation -->
<!--<div class="mb-50">
    <h5 class="mb-20">Contact Us</h5>
    <form action="#" class="row">
        <div class="col-lg-12">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="">
        </div>
        <div class="col-lg-12">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required="">
        </div>
        <div class="col-lg-12">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
        </div>
        <div class="col-lg-12">
            <textarea name="question" id="question" class="form-control p-2" placeholder="Your Question Here..." style="height: 150px;"></textarea>
        </div>
        <div class="col-lg-12">
            <button class="btn btn-primary" type="submit" value="send"><?=Yii::t('app','Send')?></button>
        </div>
    </form>
</div>-->

<div class="mb-50">
   <!--<h3 class="mb-20"><?php //echo Yii::t('app','Contact Us')?></h3>-->
    <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_double vc_sep_pos_align_center vc_separator-has-text mb-50">
        <span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span>
        <h3>&nbsp;&nbsp;<?php echo Yii::t('app','Contact Us')?>&nbsp;&nbsp;</h3>
        <span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
    </div>
    <?php $form = ActiveForm::begin(['id' => 'company-contact-form']); ?>
    <?= $form->field($model, 'email')->hiddenInput(['value'=> $model->email])->label(false); ?>
    <div class="row">
        <div class="col-lg-4 col-sm-12 col-xs-12"><?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('app','Enter your name'), 'autofocus' => false]) ?></div>
        <div class="col-lg-4 col-sm-12 col-xs-12"><?= $form->field($model, 'title')->textInput(['readonly'=>true]) ?></div>

        <div class="col-lg-4 col-sm-12 col-xs-12"><?= $form->field($model, 'subject')->textInput(['placeholder' => Yii::t('app','Enter a message subject')]) ?></div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <?= $form->field($model, 'body')->textarea(['placeholder' => Yii::t('app','Enter your message'), 'rows' => 6]) ?>
        </div>
    </div>

    <?php /*echo $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]);*/ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app','Send message'), ['class' => 'btn btn-primary', 'name' => 'company-contact-button', 'id'=>'company-send-btn', 'data-mytext'=>Yii::t('app','Send message')]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
