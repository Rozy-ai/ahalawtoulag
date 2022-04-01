<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = $title = Yii::t('app', 'Companies');
$description = Yii::t('app', 'Companies');

$this->registerMetaTag(['content' => Html::encode($description), 'name' => 'description']);
$this->registerMetaTag(['content' => Html::encode($description), 'name' => 'keywords']);
$this->params['breadcrumbs'][] = $title;
$this->title .= ' | '.Yii::t('app','Site name');


?>
<section class="banner-bg-01 sub-header">
    <?= $this->render('/layouts/breadcrumb'); ?>
    <div class="container">
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <div class="content-page">
                    <?= $this->render('/layouts/title_left', ['title' => Yii::t('app', 'Companies')]); ?>
                    <div class="margin-bottom-30">
                        <?= $this->render('_list', ['dataProvider' => $dataProvider]); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
