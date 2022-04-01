<?php
use yii\helpers\Html;
use common\helpers\Language;
use common\helpers\MyUrl;
use yii\helpers\HtmlPurifier;
use common\helpers\Date;

$htmlPurifierOptions = [
    'HTML.SafeIframe' => true,
    'Attr.AllowedFrameTargets' => ['_blank', '_self', '_parent', '_top'],
    'URI.SafeIframeRegexp' =>
        '%^(https?:)?//(www.youtube.com/embed/|player.vimeo.com/video/|vk.com/video)%',
];

$title = $description = $date = "-";
if(isset($model)){
    $title = Language::Current($model,'title');
    $description = mb_substr(HtmlPurifier::process(Language::Current($model,'description'), $htmlPurifierOptions),0,100);
    $date = $model->created_at;

    $image = $model->imageRelation;
    $imagePath = \Yii::$app->request->BaseUrl . '/images/store/';
    if (isset($image)) {
        $path = $image->filePath;
        $imagePath .= $path;
    } else {
        $imagePath .= "placeholder.png";
    }
}

?>
<div class="col-lg-4 col-xs-12 mb-50">
    <?=Html::a('
        <article class="grid-blog-post">
            <div class="post-thumbnail">
                <img class="img100 w-100 zoom" src="'.$imagePath.'" alt="">
            </div>
            <div class="post-content">
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                <h2>'.$title.'</h2>
            </div>
        </article>',MyUrl::Services($model->id),['class'=>'institution-link']) ?>
</div>
