<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\Date;
use common\helpers\Image;
use lo\widgets\magnific\MagnificPopup;
use common\helpers\MyUrl;
use common\helpers\Text;

/* @var $this yii\web\View */
/* @var $model backend\models\Blog */

$title = Html::encode($model->title);
$content = $model->content;
$contentbr = Text::PtoBr($content);
$annonce = Text::stripTags($model->annonce);

$this->title = $title;
$this->title .= ' | '.Yii::t('app', 'Tenders').' | '.Yii::t('app','Site name');
$this->registerMetaTag(['content' => Html::encode($annonce), 'name' => 'description']);
$this->registerMetaTag(['content' => Html::encode($title), 'name' => 'keywords']);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tenders'), 'url' => ['index','language'=>\common\helpers\Language::Language()]];
$this->params['breadcrumbs'][] = $title;

echo MagnificPopup::widget(
        [
        'target' => '.div-content',
        'options' => [
            'delegate'=> 'a',
            'type' => 'image',
            'gallery'=> [
                'enabled' => true,
                ],
            ]
        ]
    );

?>
<?= $this->render('/layouts/breadcrumb'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1><?= Html::encode($model->title) ?></h1>
        </div>
    </div>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
        <!-- BEGIN CONTENT -->
        <div class="col-md-12 col-sm-12">
            <div class="content-page">
                <div class="row margin-bottom-30">
                    <div class="col-md-12 col-sm-12">
                        <ul class="blog-info">
                            <li><i class="fa fa-calendar"></i> <?= Date::FormatDate($model->created_at) ?></li>
                        </ul>
                        <p><?= $content ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>