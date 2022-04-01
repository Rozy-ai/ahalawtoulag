<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Language;
use common\helpers\MyUrl;
use common\helpers\Text;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrganizationCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Search');

$description = Yii::t('app', 'Search results');

$this->registerMetaTag(['content' => Html::encode($description).': '.trim($model->title), 'name' => 'description']);
$this->registerMetaTag(['content' => Html::encode($description).': '.trim($model->title), 'name' => 'keywords']);
$this->params['breadcrumbs'][] = $description;
if(strlen(trim($model->title))>0)
    $this->title .= ' | '.trim($model->title);
$this->title .= ' | '.Yii::t('app','Site name');

$gridId = "search-grid";
?>
<!-- Hero Section-->
<section class="banner-bg-01 sub-header">
    <?= $this->render('/layouts/breadcrumb'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= $description.': '.$model->title ?></h1>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="content-page">
                <!--<form action="#" class="content-search-view2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Search</button>
                      </span>
                    </div>
                </form>-->
                <?php $form = ActiveForm::begin(['action'=>['site/search'],'method'=>'get','id' => 'site-search-form','fieldConfig' => ['options' => ['tag' => false]],'options'=>['class'=>'content-search-view2']]); ?>
                    <div class="input-group">
                        <?= $form->field($model, 'title')->textInput(['autofocus' => true,'placeholder'=>Yii::t('app','Search').'...','class'=>'form-control'])->label(false) ?>
                        <span class="input-group-btn">
                            <?= Html::submitButton(Yii::t('app','Search'), ['class' => 'btn btn-primary', 'id'=>'site-search-button']) ?>
                        </span>
                    </div>
                <?php ActiveForm::end(); ?>
                <?php
                    $result = 0;
                    if( count($tenders) > 0 ) {
                        foreach ($tenders as $tender) {
                            echo '<div class="search-result-item">';
                            echo '<h4>' .Yii::t('app','Questions').': '. Html::a($tender->title, MyUrl::Blog($tender->slug)) . '</a></h4>';
                            echo '<p>' . mb_substr(Text::stripTags($tender->content), 0, 50, 'utf-8') . '</p>';
                            echo '</div>';
                        }
                        $result++;
                    }

                    if( count($companies) > 0 ) {
                        foreach ($companies as $company) {
                            echo '<div class="search-result-item">';
                            echo '<h4>' . Yii::t('app', 'Services') . ': ' . Html::a(Language::Current($company, 'title'), MyUrl::Services($company->id)) . '</a></h4>';
                            echo '<p>' . mb_substr(Text::stripTags(Language::Current($company, 'description')), 0, 50, 'utf-8') . '</p>';
                            echo '</div>';
                        }
                        $result++;
                    }

                    if( $result == 0 ){
                        echo '<div class="search-result-item">';
                            echo'<p>'.Yii::t('app', 'No results found.').'</p>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>

