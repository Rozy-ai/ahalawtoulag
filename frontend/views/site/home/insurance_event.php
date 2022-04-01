<?php
use yii\helpers\Html;
use common\helpers\Text;
use common\services\PageService;

$pages = PageService::getAll();
$case = $polis = array('language'=>'','title'=>'','alias'=>'','content'=>'');
foreach ($pages as $page) {
    if( Yii::$app->language == $page['language'] ){

        //about
        //if(in_array($page['alias'],['about-us','o-nas','biz-hakda']))
            //$about = $page;

        //case request
        if(in_array($page['alias'],['case-request','case-request-ru','case-request-tm']))
            $case = $page;

        //prolog polis
        if(in_array($page['alias'],['prolong-policy','prolong-policy-ru','prolong-policy-tm']))
            $polis = $page;
    }
}

?>
<section class="section bg-gray pd-75">
    <div class="container">
        <div class="row text-center margin-bottom-20">
            <h2 class="move zoomIn"><?=Yii::t('app','Our services')?></h2>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="event_box move fadeInUp">
                    <div class="imagebg-box">
                        <div class="bg1">
                            <h4 style="border-bottom: 1px solid green;color:green; display: inline-block"><?=Yii::t('app','Shipping')?>:</h4>
                            <p><?=Yii::t('app','Freight forwarding services')?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-offset-2 col-md-8">
                <div class="event_box move fadeInUp">
                    <div class="imagebg-box">
                        <div class="bg1">
                            <h4 style="border-bottom: 1px solid green;color:green; display: inline-block"><?=Yii::t('app','Passenger Transportation')?>:</h4>
                            <p><?=Yii::t('app','Modern buses and cars for passenger transport')?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-offset-2 col-md-8">
                    <div class="event_box move fadeInUp">
                        <div class="imagebg-box">
                            <div class="bg2">
                                <h4 style="border-bottom: 1px solid green;color:green; display: inline-block"><?=Yii::t('app','Reservation')?>:</h4>
                                <p><?=Yii::t('app','Advance booking of freight and passenger transportation')?></p>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
    </div>
    </div>
</section>

<!--     <section class="ds s-pt-55 s-pb-10 s-pt-lg-140 s-pb-lg-150 s-parallax testimonials-section" id="section_testimonials">
                <div id="particles-js"></div> --> <!-- Animated background -->
<!--                 <div class="container">
                    <div class=" col-12 mb-50 text-center">
                        <h4><span class="text-gradient">Atiýaç </span> şaýlar</h4>
                        <p class="fs-20 color-dark">Awtoulag abatlamak boýunça</p>
                        <div class="divider-60 d-none d-xl-block"></div>
                    </div>
                    <div class="row">
                    </div>
                </div> -->
<!--     </section> -->



    <?php 


  