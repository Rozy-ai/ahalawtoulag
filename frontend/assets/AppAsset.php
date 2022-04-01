<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/jquery.fancybox.css',
        'css/components.css',
        'css/green.css?v=1.0.0',
        'css/slick.css',
        'css/slick-theme.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.min.css',
        'css/sweetalert2.min.css',
        'plugins/nonid/style.css',
        // 'css/main.css',
        'css/animate.css',
        'css/custom.css',
        'css/style.css?v=2.0.7',
        'css/style-responsive.css?v=2.0.0',
    ];
    public $js = [
        //'js/jquery.min.js',
        'js/jquery-migrate.min.js',
        'js/bootstrap.min.js',
        'js/back-to-top.js?v=1.0.0',
        'js/jquery.fancybox.pack.js',
        'js/layout.js',
        'js/wow.min.js',
        'js/slick.min.js',
        // 'js/forwow.js',
        'js/owl.carousel.min.js',
        'js/sweetalert2.min.js',
        'js/jssor.slider.min.js',
        // 'js/compressed.js',
        // 'js/main.js',
        'js/myscripts.js?v=1.0.3'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        'yidas\yii\fontawesome\FontawesomeAsset'
    ];
}

