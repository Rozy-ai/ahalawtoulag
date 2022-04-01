<?php

use yii\helpers\Html;
use yii\grid\GridView;

$title = Yii::t('app', 'Questions');

$description = Yii::t('app', 'Questions');

$this->registerMetaTag(['content' => Html::encode($description), 'name' => 'description']);
$this->registerMetaTag(['content' => Html::encode($description), 'name' => 'keywords']);
$this->params['breadcrumbs'][] = $title;
$this->title = $title.' | '.Yii::t('app','Site name');

$gridId = "blog-grid";
?>
<!-- Hero Section-->
<section class="banner-bg-01 sub-header">
    <?= $this->render('/layouts/breadcrumb'); ?>
    <div class="container">
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <div class="content-page">
                    <?= $this->render('/layouts/title_left', ['title' => Yii::t('app', 'Questions')]); ?>
                    <div class="row margin-bottom-30">
                        <div class="col-md-12 col-sm-12">
                            <?= $this->render('_list', ['dataProvider' => $dataProvider]); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

