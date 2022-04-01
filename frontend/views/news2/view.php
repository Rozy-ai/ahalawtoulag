<?php

use eugenekei\news\Module;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use lo\widgets\magnific\MagnificPopup;

echo MagnificPopup::widget(
    [
        'target' => '.blog-image',
        'options' => [
            'delegate'=> 'a',
            'type' => 'image',
        ],
        //'effect' => 'with-zoom'
    ]
);
/* @var $this yii\web\View */
/* @var $model eugenekei\news\models\News */

$this->title = Html::encode($model->title);
$this->params['subtitle'] = $this->title;
$this->params['breadcrumbs'][] = [
    'label' => Module::t('eugenekei-news', 'News'),
    'url' => ['index']
];

$htmlPurifierOptions = [
    'HTML.SafeIframe' => true,
    'Attr.AllowedFrameTargets' => ['_blank', '_self', '_parent', '_top'],
    'URI.SafeIframeRegexp' =>
        '%^(https?:)?//(www.youtube.com/embed/|player.vimeo.com/video/|vk.com/video)%',
];

$images = $model->getImages();
if(isset($images[0])){
$path = $images[0]->filePath;
}

?>
<?= $this->render('@frontend/views/layouts/breadcrumb',['header_text' => Module::t('eugenekei-news', 'News')]) ?>
<div class="blog-details">
    <div class="container">
        <div class="blog-content">
            <div class="blog-image clearEdges">
                <?php
                    if(strcmp($path,'placeHolder.png')){
                ?>
                        <?= strcmp($path,'placeHolder.png')? '<div style="background-image: url('.\Yii::$app->request->BaseUrl.'/images/store/'.$path.')" class="placeholderImg"></div>' : ''  ?>

                        <div class="entry-thumbnail imageFixedSize  <?= strcmp($path,'placeHolder.png')? '':'placeholderDiv' ?>">
                            <?= Html::a(strcmp($path,'placeHolder.png')?'<img class="news-image" src="'.\Yii::$app->request->BaseUrl.'/images/store/'.$path.'" alt="'.$model->title.'">':'<i class="fa fa-photo placeholderI"></i>', Url::to(\Yii::$app->request->BaseUrl.'/images/store/'.$path)) ?>
                        </div>
                <?php
                    }
                ?>
                <!--<div class="time">
                    <h2>07 <span>Aug</span></h2>
                </div>-->
            </div> <!-- blog-image -->
            <div class="entry-title">
                <h3><?php echo $this->title; ?></h3>
            </div>
            <div class="entry-meta">
                <ul class="list-inline">
                    <li><i class="fa fa-calendar"></i><?= date('d/m/Y', strtotime($model->created_at)); ?></li>
                    <!--<li><a href="#"><i class="fa fa-user"></i>Captain Sad</a></li>
                    <li><a href="#"><i class="fa fa-folder-o"></i>Construction</a></li>
                    <li><a href="#"><i class="fa fa-comment-o"></i>3 Comments</a></li>-->
                </ul>
            </div>
            <div class="post-content">
                <?php echo HtmlPurifier::process($model->content, $htmlPurifierOptions); ?>
            </div>
        </div>
    </div>
</div>
<!--<div class="share-social">
    <ul class="social">
        <li>Share:</li>
        <li><a href="#"><i class="fa fa-rss"></i></a></li>
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
    </ul>
</div>--><!-- share social -->
