<?php
use yii\helpers\Html;
?>

<div class="row">
    <div class="col-lg-12">
        <h3 class="section-title-border mb-20"><?=Yii::t('app','Recent Products')?></h3>
    </div>
</div>
<div class="row">
    <?php
    $modelText = "";
    $index = 1;
    foreach($dataProvider->models as $model) {
        $active = "";
        if($index == 1)
            $active = "active";

        ?>
        <div class="owl-item <?= $active ?>">
            <?php echo  $this->render('_item-image', ['model' => $model]); ?>
        </div>
        <?php

        $index++;
    }
    ?>
</div>