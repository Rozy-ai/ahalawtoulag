<?php
use common\helpers\Date;
use common\helpers\Language;

$title = $fullname = $date = $products = $phone = $fax = $email = $address = "";
if(isset($model)) {
    //$title = Language::Current($model, 'title');
    $fullname = Language::Current($model, 'fullname');
    $date = $model->expiration_date;
    $products = Language::Current($model, 'products');
    $phone = $model->phone;
    $fax = $model->fax;
    $email = $model->email;
    $address = Language::Current($model, 'legal_address');
}

?>
    <!-- overview -->
    <div class="rounded mb-50">
        <ul class="pl-0">
            <li class="border-bottom">
                <span class="d-inline-block"><?=Yii::t('app','Fullname')?>:</span>
                <span class="d-inline-block"><?=$fullname?></span>
            </li>
            <li class="border-bottom">
                <span class="d-inline-block"><?=Yii::t('app','Expiration Date')?>:</span>
                <span class="d-inline-block"><?=$date?></span>
            </li>
            <li class="border-bottom">
                <span class="d-inline-block"><?=Yii::t('app','Products')?>:</span>
                <span class="d-inline-block"><?=$products?></span>
            </li>
            <li class="border-bottom">
                <span class="d-inline-block"><?=Yii::t('app','Phone')?>:</span>
                <span class="d-inline-block"><?=$phone?></span>
            </li>
            <li class="border-bottom">
                <span class="d-inline-block"><?=Yii::t('app','Fax')?>:</span>
                <span class="d-inline-block"><?=$fax?></span>

            </li>
            <li class="border-bottom">
                <span class="d-inline-block"><?=Yii::t('app','Email')?>:</span>
                <span class="d-inline-block"><?=$email?></span>
            </li>
            <li class="border-bottom">
                <span class="d-inline-block"><?=Yii::t('app','Legal address')?>:</span>
                <span class="d-inline-block"><?=$address?></span>
            </li>
        </ul>
    </div>
