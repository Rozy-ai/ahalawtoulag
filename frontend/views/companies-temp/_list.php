<?php
use yii\widgets\ListView;
use lo\widgets\magnific\MagnificPopup;

    /*echo MagnificPopup::widget(
        [
        'target' => '#mpup-inner',
        'options' => [
            'delegate'=> 'a.imgtype',
            'type' => 'image',
            'gallery'=> [
                'enabled' => true,
                ],
            ]
        ]
    );*/

    $layoutPager = '<div class="clearfix"></div><div class="pagination pagination-custom d-flex justify-content-between d-block">{pager}</div>';
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item-main',
        'summary' => '',
        'layout' => "{summary}{items}".$layoutPager,
        'pager' => [
            'firstPageLabel' => '«',
            'lastPageLabel' => '»',
            'nextPageLabel' => ' <i class="fa fa-angle-right"></i>',
            'prevPageLabel' => '<i class="fa fa-angle-left"></i> ',
            'maxButtonCount' => 3,
            'disabledPageCssClass' => 'disabled',
            'prevPageCssClass' =>'page-item',
            'nextPageCssClass' =>'page-item',
        ],
    ]);

    if(isset($summary) && $summary == false) {
        echo '<div class="col-xs-12"><div class="btnArea btnAreaBorder text-center">' . Html::a(\Yii::t('app', 'Show More'), ['companies/index'], ['class' => 'btn btn-primary']) . '</div></div>';
    }
?>

