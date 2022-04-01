<?php
use yii\helpers\Html;
?>
<header class="d-flex justify-content-between align-items-start">
    <ul class="CTAs list-inline">
        <?php
            $id = 0;
            $active = "btn-template-outlined";
            if(intval($id)<=0){
                $active = "btn-template";
            }

            echo '<li class="list-inline-item">'.Html::a(\Yii::t('app','Show all'), ['site/gallery-list'], ['class'=>"btn $active", 'data-type'=>'post']).'</li>';

            $title = "";
            foreach($categories as $category) {
                switch(\Yii::$app->language){
                    case 'ru': $title = $category->title_ru; break;
                    case 'en': $title = $category->title_en; break;
                    default: $title = $category->title; break;
                }

                $active = "btn-template-outlined";
                if(intval($id)>0 && intval($id)==$category->id){
                    $active = "btn-template";
                }

                echo '<li class="list-inline-item">'.Html::a($title, ['site/gallery-list','id'=>$category->id], ['class'=>"btn $active", 'data-type'=>'post']).'</li>';
            }
        ?>
    </ul>
</header>