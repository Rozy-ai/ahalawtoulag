<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use common\helpers\Language;

$title = $description = "";
$title = Language::Current($model,'title');
$description = Language::Current($model,'description');

$this->title = $title;//Yii::t('app', 'Details');
$this->registerMetaTag(['content' => Html::encode(mb_substr($title,0,250,'utf-8')), 'name' => 'description']);
$this->registerMetaTag(['content' => Html::encode(mb_substr($title,0,250,'utf-8')), 'name' => 'keywords']);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Services'), 'url' => ['services/index','language'=>Language::Language()]];
$this->params['breadcrumbs'][] = $title;
$this->title .= ' | '.Yii::t('app','Site name');

$image = $model->imageRelation;
$imagePath = \Yii::$app->request->BaseUrl . '/images/store/';
if (isset($image)) {
    $path = $image->filePath;
    $imagePath .= $path;
} else {
    $imagePath .= "placeholder.png";
}

?>
<section class="banner-bg-01 sub-header">
    <?=  $this->render('/layouts/breadcrumb'); ?>
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-12">
                <h2><?= $title ?></h2>
                <hr class="mb-20">
                <div class="mb-20"><img class="img-fluid item" src="<?=$imagePath?>" alt="service image"></div>
                <?= $description ?>
                <hr class="mb-50">
            </div>
        </div>
        <div class="row mb-30">
            <aside class="col-lg-12 col-sm-12 col-xs-12">
                <?=  $this->render('_insurance_form',['model'=>$modelContact]); ?>
            </aside>
        </div>
    </div>
</section>
