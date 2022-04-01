<?php
use yii\helpers\Html;
use common\helpers\Language;
?>
<section class="section bg-gray pd-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="section-title-border mb-20"><?=Yii::t('app','Voluntary insurance')?>
                    <small class="pull-right"><?=Html::a(Yii::t('app', 'Show all').' <i class="fa fa-angle-right"></i>',['companies/index', 'language'=>Language::Language()],['class'=>"show-all"]) ?></small>
                </h3>
            </div>
        </div>
        <!-- work slider -->
        <div class="row karhanalar">
            <?php
                foreach($dataProvider->models as $model) {
                    echo  $this->render('_item-main', ['model' => $model]);
                }
            ?>
        </div>

    </div>
</section>