<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\helpers\Language;
use common\helpers\MyUrl;
use common\services\PageService;
use common\helpers\CommonInfo;
use common\services\CompanyCategoryService;

AppAsset::register($this);

    //$page = PageService::Menu('about-us');
    $pages = PageService::getAll();
    $about = array('title'=>'','title'=>'','alias'=>'','content'=>'');
    foreach ($pages as $page) {
        if( Yii::$app->language == $page['language'] ){
            //about
            if(in_array($page['alias'],['about-us','o-nas','biz-hakda']))
                $about = $page;

            //case request
            /*if(in_array($page['alias'],['case-request','case-request-ru','case-request-tm']))
                $case = $page;

            //prolog polis
            if(in_array($page['alias'],['prolong-policy','prolong-policy-ru','prolong-policy-tm']))
                $polis = $page;*/
        }
    }
     $about = ['label' =>$about['title'], 'url' => '#about','class' => ''];
//    $about = ['label' =>$about['title'], 'url' => ['#about', 'language'=>$about['language'], 'page'=>$about['alias']]];

    $menuItems = [
        $about,
        ['label' => Yii::t('app', 'Execution of work'), 'url' => '#main', 'class' => 'active'],
//        ['label' => Yii::t('app', 'Maksadymyz'), 'url' => '#main', 'class' => 'active'],
        ['label' => Yii::t('app', 'Services'), 'url' => '#services', 'class' => 'active'],
        ['label' => Yii::t('app', 'News'), 'url' => '/news', 'class' => 'active'],
//        ['label' => Yii::t('app', 'Services'), 'url' => ['/services/index', 'language'=>\Yii::$app->language]],
//        ['label' => Yii::t('app', 'Questions'), 'url' => ['/questions/index', 'language'=>\Yii::$app->language]],
        ['label' => Yii::t('app', 'Contact Us'), 'url' => '#contact', 'class' => ''],
    ];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="/favicon.png?v=1.0.0">
    <?php $this->head() ?>
</head>

<body class="corporate" data-spy="scroll" data-target=".scroll_spy" data-offset="50">
<?php $this->beginBody() ?>
<!-- BEGIN TOP BAR -->
<!-- END TOP BAR -->
<!-- navbar-->

<!-- BEGIN HEADER -->
<div class="header">
    <div class="container-fluid" style="border-bottom: 1px solid #DEDEDE">
        <div class="container">
            <div class="head_top">
        <div class="info_head">
            <p class="p18"><b><i class="fa fa-phone"></i>&nbsp;&nbsp; </b>(+993 132) 4-09-06<br>
            </p>
        </div>
        <div class="lang_head">
            <ul>
                <?php 
                                        $languages = Language::getLanguageArray();
                        //print_r($languages);
                        foreach ($languages as $key=>$value){
                            //if($key != Yii::$app->language) {
                            $lang = $key;
                            $language = Language::getLanguageTitle(strtolower($lang));

                            //en.png => br.png
                            $flag = ($lang=='en')?'br':$lang;

                            echo '<li>'.Html::a('<img src="'.MyUrl::ServerName().'/images/flag/' . $flag . '.png" alt="' . $language . '" title="' . $language . '">', ['/site/language', 'language' => $lang],['alt'=>$language]).'</li>';
                            //}
                        }
                 ?>
            </ul>
        </div>
</div>
        </div>
    </div>
    <div class="container">

        <?php
            // $language = Language::Language();
            // switch ($language){
            //     case 'en': $logo = 'logoEN.png'; break;
            //     case 'ru': $logo = 'logoRU.png'; break;
            //     default: $logo = 'logoTM.png'; break;
            // }
        ?>
        <?=Html::a('<img src="/images/logo.png?v=1.0.1" alt="Logo">'.'<span>'.yii::t('app','Site_name').'</span>',['/site/index'],['class'=>'site-logo'])?>

   
        <a class="site-logo2022" href="<?= '/' ?>">
            <img src="/images/2022nysany.png" alt="Logo 2022" style="width: 100px;height: 80px;float: right;">
            <span>Halkyň arkadagly <br>zamanasy</span>
        </a>
        <a href="javascript:void(0);" class="mobi-toggler main-nav-bar">
                    
                        <span class="line"></span>
                  
                </a>

        <!-- BEGIN NAVIGATION -->
            <div class="header-navigation font-transform-inherit scroll_spy" >
            <ul role="tablist">
                <?php
                $controller = Yii::$app->controller->id;
                $action = Yii::$app->controller->action->id;
                $current_url = '/'.$controller.'/'.$action;

                foreach ($menuItems as $key=>$value){

                    $active = '';
                    $url = $value['url'];
                    //echo substr($url[0],strlen($current_url)*-1).' - '.$current_url.'<br>';
                    if(substr($url[0],strlen($current_url)*-1) == $current_url)
                        $active = 'active';

                    //companies/details && tenders/view
                    if (strpos($url[0], 'companies/index') !== false && strpos($current_url, 'companies/details') !== false) {
                        $active = 'active';
                    }

                    if (strpos($url[0], 'tenders/index') !== false && strpos($current_url, 'tenders/view') !== false) {
                        $active = 'active';
                    }

                    echo '<li class=animate_link_'.$key.' style=position:relative>'.Html::a($value['label'],$value['url'],['class' => $value['class']]).'<span class=add_'.$key.'></span></li>';
                }

                        // $languages = Language::getLanguageArray();
                        // //print_r($languages);
                        // foreach ($languages as $key=>$value){
                        //     //if($key != Yii::$app->language) {
                        //     $lang = $key;
                        //     $language = Language::getLanguageTitle(strtolower($lang));

                        //     //en.png => br.png
                        //     $flag = ($lang=='en')?'br':$lang;

                        //     echo '<li>'.Html::a('<img src="'.MyUrl::ServerName().'/images/flag/' . $flag . '.png" alt="' . $language . '" title="' . $language . '">', ['/site/language', 'language' => $lang],['alt'=>$language]).'</li>';
                        //     //}
                        // }
                    
                ?>
                <!-- BEGIN TOP SEARCH -->
<!--                <li class="menu-search">-->
<!--                    --><?php //echo $this->render('//site/_search'); ?>
<!--                </li>-->
                <!-- END TOP SEARCH -->
            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>
<!-- Header END -->

<div class="main" style="margin-top: 6%">
    <?php echo Alert::widget() ?>
    <?= $content ?>
</div>

<!-- BEGIN PRE-FOOTER -->
<div class="pre-footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-sm-6 pre-footer-col">
                <h2 class="text-center">
                    <?=yii::t('app','Site_name');/*Yii::t('app','Working time')*/?>
                </h2>
                <p class="text-center"><?= CommonInfo::info('contact_address') ?></p>


            </div>
            <!-- END BOTTOM ABOUT BLOCK -->

            <!-- BEGIN TWITTER BLOCK -->
    <!--         <div class="col-md-3 col-sm-6  pre-footer-col">

            </div> -->
            <!-- END TWITTER BLOCK -->

            <div class="col-sm-6  pre-footer-col">
                <address class="text-center">
                    <?php echo CommonInfo::info('contact_phone') ?>
                    <?php echo CommonInfo::info('contact_fax') ?>
                </address>
            </div>
            <!-- END TWITTER BLOCK -->

            <!-- BEGIN BOTTOM MENU -->
        <!--     <div class="col-md-3 col-sm-6  pre-footer-col">
                <address class=""> -->
                    <? 
                    // echo CommonInfo::info('footer_logo') 
                     ?><br>
<!--                    --><?php //echo CommonInfo::info('footer_contact') ?>
  <!--               </address>
            </div> -->
            <!-- END BOTTOM MENU -->
        </div>
    </div>
</div>
<!-- END PRE-FOOTER -->

<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN COPYRIGHT -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!--2015 © ArslanDesign. ALL Rights Reserved.-->
                                <div class="text-center">
                    <?= date('Y') ?> &copy; <?= Yii::t('app','All rights reserved.') ?><?php //CommonInfo::info('footer_working_time') ?>
                </div>
            </div>
            <!-- END COPYRIGHT -->
            <!-- BEGIN POWERED -->
            <!--<div class="col-md-6 col-sm-6 col-xs-6 text-right">
                <p class="powered"><?php //eçho Yii::t('app','Powered by') ?>: <a href="http://www.arslandesign.com/">arslandesign.com</a></p>
            </div>-->
            <!-- END POWERED -->
        </div>
    </div>
</div>
<!-- END FOOTER -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

