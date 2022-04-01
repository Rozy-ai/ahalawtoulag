<?php
use yii\helpers\Html;
use common\helpers\Language;
use common\helpers\MyUrl;

$image = $model;
$imagePath = \Yii::$app->request->BaseUrl.'/images/store/';
if (isset($image)) {
    $path = $image->filePath;
    $imagePath .= $path;
}
else{
    $imagePath .= "placeholder.png";
}
?>
<div class="col-sm-6 col-xs-6 padding15 product-slider-image">
    <?=Html::a('<img class="product-image" src="'.$imagePath.'" alt="work-image"><div class="image-overlay">
        <div class="product-title">
            <i class="fa fa-search search-btn"></i>
        </div>
    </div>',MyUrl::Services($model->itemId))?>

</div>
