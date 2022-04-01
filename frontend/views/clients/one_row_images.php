<?php
use evgeniyrru\yii2slick\Slick;

if(isset($images)){

    $items = array();
    foreach($images as $img) {
        $items []= '<img class="img-responsive" src="'.\Yii::$app->request->BaseUrl.'/images/store/' . $img['filePath'] .'">';
    }

    echo Slick::widget([
        'items' => $items,

        // Widget configuration. See example above.

        // settings for js plugin
        // @see http://kenwheeler.github.io/slick/#settings
        'clientOptions' => [
            //'dots'     => true,
            'arrows' => true,
            'speed'    => 300,
            'autoplay' => true,
            'infinite' => true,
            'slidesToShow' => 2,
            'slidesToScroll' => 2,
            /*'responsive' => [
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
            ],*/
        ],

    ]);
}
?>