<?php
use yii\helpers\Html;
use common\helpers\MyUrl;
use common\helpers\Date;
use yii\helpers\HtmlPurifier;
use common\helpers\Image;

$htmlPurifierOptions = [
    'HTML.SafeIframe' => true,
    'Attr.AllowedFrameTargets' => ['_blank', '_self', '_parent', '_top'],
    'URI.SafeIframeRegexp' =>
        '%^(https?:)?//(www.youtube.com/embed/|player.vimeo.com/video/|vk.com/video)%',
];
?>
<!-- Blog Section-->
<section class="blog">
    <div class="container">
        <header class="text-center">
            <h2 class="text-uppercase"><small><?= Yii::t('app','Recent tenders') ?></small><?= Yii::t('app','Latest from the tenders') ?></h2>
        </header>
        <div class="row">
            <?php

            foreach ($blogs->models as $model) {

                $title = $slug = $annonce = "-";
                $date = date('Y-m-d H:i:s');
                if(isset($model)){
                    $title = $model->title;
                    $slug = $model->slug;
                    $annonce = HtmlPurifier::process($model->annonce, $htmlPurifierOptions);
                    $date = $model->created_at;
                }
            ?>
                <!-- post-->
                <div class="col-lg-6">
                    <div class="post post-gray d-flex align-items-center flex-md-row flex-column">
                        <div class="thumbnail d-flex-align-items-center justify-content-center"><?= Html::a(Image::getImage($model->imageRelation),MyUrl::Blog($slug)) ?></div>
                        <div class="info">
                            <h4 class="h5"> <?= Html::a($title,MyUrl::Blog($slug)) ?></h4><span class="date"><i class="fa fa-clock-o"></i><?= Date::FormatDate($date) ?></span>
                            <p><?= $annonce ?></p>
                            <?= Html::a(Yii::t('app','Read More').'<i class="fa fa-long-arrow-right"></i>',MyUrl::Blog($slug),['class'=>'read-more']) ?>
                        </div>
                    </div>
                </div>
                <!-- /end post-->
            <?php
            }
            ?>
        </div>
    </div>
</section>