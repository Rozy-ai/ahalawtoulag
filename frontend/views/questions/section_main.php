<?php
use yii\helpers\Html;
use common\helpers\Language;
use common\helpers\CommonInfo;
?>
<section class="section pd-75" id="contact">
    <div class="container">
        <div class="row mb-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <div class="content-page content-contact">
                    <div class="mb-30">
                        <h2 class="page-title move slideInLeft"><span><?=Yii::t('app','Contact')?></span></h2>
                    </div>
                    <div class="row mb-60 move slideInUp">
                        <!-- BEGIN INFO BLOCK -->
                        <div class="col-sm-12">
                            <div class="contact-widget-wrap">
                                <div class="widget-content mt-40">
                                    <p class="p18"><?= CommonInfo::info('contact_address') ?></p>
                                    <p class="p18"><?php //echo CommonInfo::info('contact_support') ?></p>
                                    <p class="p18"><?= CommonInfo::info('contact_phone') ?></p>
                                    <p class="p18"><?= CommonInfo::info('contact_fax') ?></p>
                                </div>
                            </div>
                        </div>
<!--                         <div class="col-sm-6">
                            <div class="bg-green quick-form-box">
                                <h4 class="mb-20"><?php //echo Yii::t('app','Write us an email')?></h4>
                                <?php //echo $this->render('/site/home/_quick_contact_form',['model'=>$model])?>
                            </div>
                        </div> -->

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

</section>
