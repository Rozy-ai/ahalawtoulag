<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Language;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
$gridId = "settings-grid";
/*echo'<pre>';
print_r(\Yii::$app->session["settings"]);
echo'</pre>';*/

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
                        'value' => function($model){return Language::getLanguageArray()[$model->language];},
                        /*'filter' => Html::activeDropDownList(
                            $searchModel, 'language', $languageArray, ['class' => 'form-control', 'prompt' => '']
                        )*/
                    ],
                    'mykey',
                    [
                        'attribute' => 'value',
                        'value' => function($model){return mb_substr(strip_tags($model->value),0,50);},
                        /*'filter' => Html::activeDropDownList(
                            $searchModel, 'language', $languageArray, ['class' => 'form-control', 'prompt' => '']
                        )*/
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
