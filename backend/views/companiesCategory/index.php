<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Category');
$this->params['breadcrumbs'][] = $this->title;
$gridId = "product-grid";
?>
<div class="<?= $gridId ?>">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-right">
                <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    [
                        'class' => 'btn btn-primary btn-sm',
                        'title' => Yii::t('app','Create')
                    ]); ?>
            </div>
        </div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary'=> '',
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],
                    'id',
                    [
                        'attribute' => 'title_tm',
                        'value' => function($model){return mb_substr($model->title_tm,0,50);},
                    ],
                    [
                        'attribute' => 'title_ru',
                        'value' => function($model){return mb_substr($model->title_ru,0,50);},
                    ],
                    [
                        'attribute' => 'title_en',
                        'value' => function($model){return mb_substr($model->title_en,0,50);},
                    ],
                    [
                        'attribute' => 'title_ar',
                        'value' => function($model){return mb_substr($model->title_ar,0,50);},
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
