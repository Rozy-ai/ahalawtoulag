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
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Companies'), 'url' => ['companies/index','language'=>Language::Language()]];
$this->params['breadcrumbs'][] = $title;
$this->title .= ' | '.Yii::t('app','Site name');

?>
<section class="banner-bg-01 sub-header">
    <?=  $this->render('/layouts/breadcrumb'); ?>
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-12">
                <h2><?= $title ?></h2>
                <hr class="mb-50">
            </div>
        </div>
        <div class="row mb-10">
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <?=  $this->render('_image_viewer',['model'=>$model]); ?>
                <?php //echo  $this->render('_info_description',['model'=>$model]); ?>
            </div>
            <aside class="col-lg-8 col-sm-6 col-xs-12">
                <?=  $this->render('_info_details',['model'=>$model]); ?>
            </aside>
        </div>
        <?php
        if(strlen($modelContact->email)>0){
        ?>
            <div class="row">
                <div class="col-lg-12"><?=  $this->render('_contact',['model'=>$modelContact]); ?></div>
            </div>
        <?php
        }
        ?>
    </div>
</section>
