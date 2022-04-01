<?php
use yii\helpers\Html;
use common\helpers\MetaTag;

/* @var $this yii\web\View */
/* @var $model bupy7\pages\models\Page */
if (empty($model->title_browser)) {
    $this->title = Html::encode($model->title);
} else {
    $this->title = Html::encode($model->title_browser);
}
if (!empty($model->meta_description)) {
    $this->registerMetaTag(['content' => Html::encode($model->meta_description), 'name' => 'description']);
}
if (!empty($model->meta_keywords)) {
    $this->registerMetaTag(['content' => Html::encode($model->meta_keywords), 'name' => 'keywords']);
}

//MetaTag::Set($this->title, Html::encode($model->meta_description), ['/pages/default/index', 'language'=>$model->language, 'page'=>$model->alias], null);

$this->params['breadcrumbs'][] = [
    'label' => $this->title,
    //'url' => ['index']
];

$this->title .= ' | '.Yii::t('app','Site name');
$content = $model->content;

?>
<?php echo $this->render('header',['title' => Html::encode($model->title)]); ?>
<div class="container">
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-60">
        <section class="clearfix <?= $model->alias ?> about-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->render('//layouts/title_left', ['title' => Html::encode($model->title)]); ?>
                        <?php
                            if($model->alias === 'partners') {
                                $slider = $this->render('//clients/three_rows_images',['images'=>$images]);
                                $content = str_replace("[slick_slider_clients]", $slider, $content);
                                echo $content;
                            }
                            elseif($model->alias === 'case-request') {
                                //$content = str_replace("[case_request_form]", $form, $content);
                                echo $content;
                                echo $this->render('//services/_insurance_form',['model'=>$form]);

                            }
                            else {
                                echo $content;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
