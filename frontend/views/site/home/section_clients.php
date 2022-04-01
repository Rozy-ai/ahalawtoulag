<?php

use yii\web\JsExpression;
use common\helpers\CommonInfo;
use common\helpers\Text;

if(count($images)>0) { ?>
    <section class="section pd-75">
        <div class="container">
            <div class="row margin-bottom-20">
                <div class="col-lg-12">
                    <h1 class="section-title-border mb-30">
                        <span><?= Yii::t('app', 'Our partners') ?></span>
                    </h1>
                </div>
            </div>
            <div class="row margin-bottom-40">
                <p class="col-sm-6 col-xs-12 p16"><?php echo $partners; ?></p>
                <div class="col-sm-6 col-xs-12"><?= $this->render('//clients/one_row_images', ['images' => $images]); ?></div>
            </div>
        </div>
    </section>
<?php } ?>