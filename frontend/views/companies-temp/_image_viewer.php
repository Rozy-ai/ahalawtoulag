<?php
$images = $model->imageRelations;
$imagePath = \Yii::$app->request->BaseUrl.'/images/store/';
?>
<div class="outer">
    <div id="big" class="owl-carousel owl-theme">
        <?php

            if (isset($images)) {

                foreach ($images as $image){

                    if(isset($image)) {
                        $path = $image->filePath;
                    }
                    else{
                        $imagePath .= "placeholder.png";
                    }
                    echo'<div class="owl-main-photo"><img class="item" src="'.$imagePath . $path.'" alt="project image"></div>';
                }
            }

        ?>
        </div>
        <div id="thumbs" class="owl-carousel owl-theme">
            <?php

            if (isset($images)) {

                foreach ($images as $image){

                    if(isset($image)) {
                        $path = $image->filePath;
                    }
                    else{
                        $imagePath .= "placeholder.png";
                    }

                    echo'<img class="item" src="'.$imagePath . $path.'" alt="project image">';
                }
            }

            ?>
    </div>
</div>
<div class=" mb-20"></div>