<?php
use yii\helpers\Html;
use common\helpers\Language;
use common\helpers\Text;
use common\helpers\Image;
use yii\web\NotFoundHttpException;
use common\helpers\Date;
use yii\helpers\HtmlPurifier;
use common\helpers\MyUrl;

    $htmlPurifierOptions = [
        'HTML.SafeIframe' => true,
        'Attr.AllowedFrameTargets' => ['_blank', '_self', '_parent', '_top'],
        'URI.SafeIframeRegexp' =>
            '%^(https?:)?//(www.youtube.com/embed/|player.vimeo.com/video/|vk.com/video)%',
    ];

    $title = $slug= $annonce = $address = $user = $date= $language = "-";
    if(isset($model)){
        $title = $model->title;
        $date = Date::FormatDate($model->created_at);
        $slug = $model->slug;
        $annonce = mb_substr(strip_tags(HtmlPurifier::process($model->annonce, $htmlPurifierOptions)),0,260,'UTF-8');
        $annonce = strlen($annonce) > 240 ? $annonce.'...': $annonce;
        $user = $model->user->username;
        $language = $model->language;
    }

?>
<div class="custom-list-item1">
<h5><i class="fa fa-check-circle section-title-border" aria-hidden="true"></i>&nbsp;<?= Html::a($title,MyUrl::Blog($slug)) ?>&nbsp</h5>
<hr>
</div>


<!-- /end post-->

