<?php

use common\models\News;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t('app','Home').' | '.Yii::t('app','Site name');
$this->registerMetaTag(['content' => Html::encode(Yii::t('app','Site description')), 'name' => 'description']);
$this->registerMetaTag(['content' => Html::encode(Yii::t('app','Site keywords')), 'name' => 'keywords']);
?>
<!-- Hero Section-->
<section class="hero hero-home">
    <!-- Hero Slider-->
    <?php echo $this->render('section_slider1',['sliders'=>$sliders]);// ?>
</section>
<section id="main">
    <?php echo $this->render('/services/section_main',['dataProvider'=>$recentServices]);// ?>
</section>
<section id="">
    <?php echo $this->render('/site/home/main_target');// ?>
</section>
<section id="services">
    <?php echo $this->render('/site/home/insurance_event');// ?>
</section>


<?php

    $news = News::find()->where(['status' => News::STATUS_ACTIVE, 'language'=>\Yii::$app->language])->orderBy(['date_view' => SORT_DESC])->limit(3)->all();



?>
<section id="news" class="news">
    <div class="container">
        <div class="row text-center margin-bottom-20 margin-top-10">
            <div class="col-md-12">
                <h2 class="move zoomIn" style="visibility: visible; animation-name: zoomIn;"><?=yii::t('app', 'News')?></h2>
            </div>
        </div>
        <div class="row">
<?php

    foreach ($news as $item):
    $image = $item->imageRelation;
    $imagePath = \Yii::$app->request->BaseUrl . '/images/store/';
    if (isset($image)) {
        $path = $image->filePath;
        $imagePath .= $path;
    } else {
        $imagePath .= "placeholder.png";
    }


?>
            <div class="col-lg-4 col-xs-12 mb-50">
                <a class="institution-link" href="<?=Url::to(['news/view','id' => $item->id])?>">
                    <article class="grid-blog-post">
                        <div class="post-thumbnail">
                            <?=html::img($imagePath, ['class' => 'img100 w-100 zoom'])?>
                        </div>
                        <div class="post-content">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            <h2><?=$item->title?></h2>
                            <p style="position: absolute;top: 10px;color: green;"><?=$item->date_view?></p>
                        </div>
                    </article>
                </a>
            </div>


            <?php
            endforeach;
            ?>
        </div>
    </div>
</section>

<?php echo $this->render('/questions/section_main',['model'=>$contact]);// ?>
<div id="scrollTop" style="display: none;"><i class="fa fa-long-arrow-up"></i></div>
