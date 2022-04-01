<?php

use eugenekei\news\Module;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel eugenekei\news\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = Module::t('eugenekei-news', 'News');
$this->title = Yii::t('app', 'News');
$this->params['subtitle'] = Module::t('eugenekei-news', 'List News');
$this->params['breadcrumbs'][] = [
    'label' => $this->title,
    //'url' => ['index']
];
//$this->params['breadcrumbs'][] = $this->params['subtitle'];

$gridId = 'news-grid';
?>
<!--<div class="<?php //echo $gridId; ?>">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1><?php //echo $this->title; ?></h1>
        </div>
    </div>-->
<?= $this->render('@frontend/views/layouts/breadcrumb',['header_text' => $this->title]) ?>
<div class="container section-padding">
    <div class="section-title text-center">
        <h1><?= $this->title ?></h1>
        <h2><?= Yii::t('app', 'Keep updated about us') ?></h2>
    </div>
    <div class="blog-content">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item blog-list-item col-md-4 col-sm-6'],
            'itemView' => '_item-v1',
            'viewParams' => ['module' => ''],
            'layout' => "<div id='blog-list' class='lst row'>{items}</div></div><div class='pagination-section text-center'>{pager}</div>",
        ]) ?>

</div>
