<?php

use yii\widgets\Breadcrumbs;
?>
<div class="breadbox mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php
                    echo Breadcrumbs::widget([
                        'homeLink' => [
                            'label' => Yii::t('app', 'Home'),
                            'url' => Yii::$app->homeUrl,
                        ],
                        // 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]);
                ?>
            </div>
        </div>
    </div>
</div>
