<?php
use eugenekei\news\Module;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
/* @var $model eugenekei\news\models\News */

$htmlPurifierOptions = [
    'HTML.SafeIframe' => true,
    'Attr.AllowedFrameTargets' => ['_blank', '_self', '_parent', '_top'],
    'URI.SafeIframeRegexp' =>
        '%^(https?:)?//(www.youtube.com/embed/|player.vimeo.com/video/|vk.com/video)%',
];
$images = $model->getImages();

if(isset($images[0]))
    $path = $images[0]->filePath;
?>

<div class="blog-post">
    <div class="entry-header">
        <div class="blog-image clearEdges">
            <?= strcmp($path,'placeHolder.png')? '<div style="background-image: url('.\Yii::$app->request->BaseUrl.'/images/store/'.$path.')" class="placeholderImg"></div>' : ''  ?>

            <div class="entry-thumbnail imageFixedSize  <?= strcmp($path,'placeHolder.png')? '':'placeholderDiv' ?>">
                <?= Html::a(strcmp($path,'placeHolder.png')?'<img class="news-image" src="'.\Yii::$app->request->BaseUrl.'/images/store/'.$path.'" alt="'.$model->title.'">':'<i class="fa fa-photo placeholderI"></i>', [$module.'news/view', 'id' => $model->id]) ?>
            </div>
            <!--<div class="time">
                <h2>07 <span>Aug</span></h2>
            </div>-->
        </div> <!-- blog-image -->
    </div>
    <div class="entry-post">
        <div class="entry-title">
            <h4><?= Html::a(Html::encode($model->title), [$module.'news/view', 'id' => $model->id]) ?></h4>
        </div>
        <div class="post-content">
            <div class="entry-summary">
                <p><?= HtmlPurifier::process($model->annonce, $htmlPurifierOptions) ?>...<?= Html::a(\Yii::t('app','Read more'), [$module.'news/view', 'id' => $model->id]) ?></p>
                <div class="entry-meta">
                    <ul class="list-inline">
                        <li><i class="fa fa-calendar"></i><?= date('d/m/Y', strtotime($model->created_at)); ?></li>
                        <!--<li><a href="https://template.gridbootstrap.com/diagram/blog.html#"><i class="fa fa-user"></i>Author</a></li>
                        <li><a href="https://template.gridbootstrap.com/diagram/blog.html#"><i class="fa fa-folder-o"></i>Interior Design</a></li>
                        <li><a href="https://template.gridbootstrap.com/diagram/blog.html#"><i class="fa fa-comment-o"></i>7 Comments</a></li>-->
                    </ul>
                </div>

            </div>
        </div>
    </div><!-- entry-post -->
</div>