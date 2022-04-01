<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Testimonials');
$this->params['breadcrumbs'][] = $this->title;
$gridId = "slider-grid";
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
                        'attribute' => 'language',
                        'value' => function($model){return $model->getLanguageArray()[$model->language];},
                        /*'filter' => Html::activeDropDownList(
                            $searchModel, 'language', $languageArray, ['class' => 'form-control', 'prompt' => '']
                        )*/
                    ],
                    [
                        'attribute' => 'text',
                        'value' => function($model){return mb_substr(strip_tags($model->text),0,100);},
                    ],
                    //'text:ntext',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>

