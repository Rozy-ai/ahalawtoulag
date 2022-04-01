<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\SearchForm;

$model = new SearchForm();

$this->title = $title = Yii::t('app', 'Page not found');
$description = Yii::t('app', 'The page you are looking for was moved, removed, renamed or might never existed.');

$this->registerMetaTag(['content' => Html::encode($description), 'name' => 'description']);
$this->registerMetaTag(['content' => Html::encode($description), 'name' => 'keywords']);
$this->params['breadcrumbs'][] = $title;
$this->title .= ' | '.Yii::t('app','Site name');


?>
<section class="banner-bg-01 sub-header">
    <?= $this->render('/layouts/breadcrumb'); ?>
    <div class="container">
        <div class="row margin-bottom-65">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <div class="content-page not-found">
                    <div class="row margin-bottom-65">
                        <div class="col-xs-12 col-sm-12">
                            <h1>404</h1>
                            <div class="title-h1  margin-bottom-65"><?= Yii::t('app', 'Page not found') ?></div>
                            <p><?= Yii::t('app', 'The page you are looking for was moved, removed, renamed or might never existed.') ?></p>
                            <?php $form = ActiveForm::begin(['action'=>['site/search'],'method'=>'get','id' => 'site-search-form','fieldConfig' => ['options' => ['tag' => false]],'options'=>['class'=>'content-search-view2']]); ?>
                                <div class="input-group">
                                    <?= $form->field($model, 'title')->textInput(['autofocus' => true,'placeholder'=>Yii::t('app','Search').'...','class'=>'form-control'])->label(false) ?>
                                    <span class="input-group-btn">
                                        <?= Html::submitButton(Yii::t('app','Search'), ['class' => 'btn btn-primary', 'id'=>'site-search-button']) ?>
                                    </span>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!--<section class="page-error-section bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <h1>404</h1>
                <p>The page you are looking for was moved, removed, renamed or might never existed.</p>
                <form action="" class="addon-form-style text-center">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="search....">
                            <button type="submit" class="btn btn-default">What are you looking for</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>-->
