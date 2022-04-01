<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use common\helpers\CommonInfo;
use common\widgets\Alert;
use common\helpers\MyUrl;
?>
<section class="section pd-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="section-title-border mb-30">
                    <div class="mb-5"><?=Yii::t('app','Leave an online application')?></div>
                    <p><?=Yii::t('app','for consultation and our experts will contact you.')?></p>
                </h1>
            </div>
        </div>
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <!--<div class="col-sm-6">
                <p class="p20"><?php //echo nl2br(CommonInfo::info('main_target')) ?></p>
            </div>-->
            <div class="col-lg-offset-3 col-lg-6 col-sm-12 col-md-12 col-xs-12">
                <div class="bg-green quick-form-box">
                    <h4 class="mb-20"><?=Yii::t('app','Leave a request')?></h4>
                    <?=  $this->render('_quick_contact_form',['model'=>$model]); ?>
                </div>
            </div>
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</section>