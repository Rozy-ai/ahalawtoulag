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

$title = $description = $date = $products = "-";
if(isset($model)){
    $title = Language::Current($model,'title');
    $description = HtmlPurifier::process(Language::Current($model,'description'), $htmlPurifierOptions);
    $date = $model->expiration_date;
    $products = Language::Current($model,'products');
}

$image = $model->imageRelation;
$imagePath = \Yii::$app->request->BaseUrl.'/images/store/';
if (isset($image)) {
    $path = $image->filePath;
    $imagePath .= $path;
}
else{
    $imagePath .= "placeholder.png";
}
?>
<div class="row">
    <div class="col-md-3 col-sm-3">
        <div class="thingsImage clearEdges">
            <div style="background-image: url(<?=$imagePath?>)" class="placeholderImg"></div>
            <div class="karhana-item imageFixedSize">
                <a href="#"><img class="img-fluid w-100" src="<?=$imagePath?>" alt=""></a>
            </div>
        </div>
    </div>
    <div class="col-sm-9 col-md-9">
        <p><strong><?= Yii::t('app','Title').': ';?></strong><?= Html::a($title,MyUrl::Companies($model->id)) ?></p>
        <p><strong><?= Yii::t('app','Expiration Date').': ';?></strong><?= $date ?></p>
        <p><strong><?= Yii::t('app','Products').': ';?></strong><?= $products ?></p>
        <?= Html::a('<i class="fa fa-envelope"></i>&nbsp;&nbsp;'.Yii::t('app','Read More'),MyUrl::Companies($model->id),['class'=>'btn btn-primary round5']) ?>
    </div>
</div>
<hr class="blog-post-sep">
