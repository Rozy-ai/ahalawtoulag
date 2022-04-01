<?php
use evgeniyrru\yii2slick\Slick;

if(isset($images)){
    $items = array();
    foreach($images as $img) {
        $items []= '<img class="img-responsive" src="'.\Yii::$app->request->BaseUrl.'/images/store/' . $img['filePath'] .'">';
    }

    echo Slick::widget([
        'id'=>'slick-div',
        'items' => $items,

        // Widget configuration. See example above.

        // settings for js plugin
        // @see http://kenwheeler.github.io/slick/#settings
        'clientOptions' => [
            //'dots'     => true,
            'arrows' => false,
            'speed'    => 300,
            'autoplay' => true,
            'infinite' => true,
            'slidesPerRow' => 2,
            'rows' => 2,
            'responsive' => [
                [
                    'breakpoint' => 1024,
                    'settings' => [
                        'slidesToShow' => 4,
                        'slidesToScroll' => 4,
                        'infinite' => true,
                        'autoplay' => true,
                    ],
                ],
                [
                    'breakpoint' => 600,
                    'settings' => [
                        'slidesToShow' => 3,
                        'slidesToScroll' => 3,
                        'infinite' => true,
                        'autoplay' => true,
                    ],
                ],
                [
                    'breakpoint' => 480,
                    'settings' => [
                        'slidesToShow' => 2,
                        'slidesToScroll' => 2,
                        'infinite' => true,
                        'autoplay' => true,
                    ],
                ],
            ],
        ],

    ]);
    echo'<p style="text-align: center">';
    echo '<a class="slick-arrow slick-arrow-custom" data-hereket="cep"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<a class="slick-arrow slick-arrow-custom" data-hereket="sag"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>';
    echo'<p>';
}
?>