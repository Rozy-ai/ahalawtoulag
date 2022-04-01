<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */
use yii\helpers\Html;
use yii\captcha\Captcha;
use common\helpers\CommonInfo;
use common\widgets\Alert;
use common\helpers\MyUrl;

$title = $this->title = Yii::t('app', 'Contact');
$this->params['breadcrumbs'][] = $this->title;
$description = Yii::t('app', 'Contacts with us.');
$this->registerMetaTag(['content' => Html::encode($description), 'name' => 'description']);
$this->registerMetaTag(['content' => Html::encode($description), 'name' => 'keywords']);

$this->title .= ' | '.Yii::t('app','Site name');
?>
<?=  $this->render('/layouts/breadcrumb'); ?>
<div class="container">
    <div class="row mb-40">
        <!-- BEGIN CONTENT -->
        <div class="col-md-12 col-sm-12">
            <div class="content-page content-contact">
                <?= $this->render('/layouts/title_left', ['title' => $title]); ?>
                <div class="row mb-60">
                    <!-- BEGIN INFO BLOCK -->
                    <div class="col-sm-6">
                        <div class="contact-widget-wrap">
                            <div class="widget-content mt-40">
                                <p class="p18"><?= CommonInfo::info('contact_address') ?></p>
                                <p class="p18"><?= CommonInfo::info('contact_support') ?></p>
                                <p class="p18"><?= CommonInfo::info('contact_phone') ?></p>
                                <p class="p18"><?= CommonInfo::info('contact_fax') ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="quick-form-box">
                            <h4 class="mb-20">BIZE HAT ÝOLLAŇ</h4>
                            <?=$this->render('/site/home/_quick_contact_form',['model'=>$model])?>
                        </div>
                    </div>

                    <!-- END CAROUSEL -->
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
</div>
<div class="container-fluid">
    <!-- map -->
    <div class="map-row">
        <div id="map"></div>
    </div>
</div>
<?php $this->registerJsFile('//api-maps.yandex.ru/2.1-dev/?lang=ru-RU&load=package.full',['depends' => [\yii\web\JqueryAsset::className()]]); ?>
<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/yandexmap.js?v=1.0.1',['depends' => [\yii\web\JqueryAsset::className()]]); ?>
