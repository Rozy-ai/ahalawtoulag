<?php
use yii\helpers\Html;
use common\helpers\Language;
?>
<section class="section pd-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="section-title-border mb-20"><?=Yii::t('app','Often asked')?>
                    <small class="pull-right"><?=Html::a(Yii::t('app', 'Show all').' <i class="fa fa-angle-right"></i>',['questions/index', 'language'=>Language::Language()],['class'=>"show-all"]) ?></small>
                </h1>
            </div>
        </div>
        <!-- work slider -->
        <div class="row karhanalar">
            <?php
            /*foreach($dataProvider->models as $model) {
                echo  $this->render('_item-main', ['model' => $model]);
            }*/
            echo $this->render('_list',['dataProvider'=>$dataProvider]);
            ?>
        </div>

    </div>
</section>
