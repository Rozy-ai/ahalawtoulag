<?php
use common\helpers\Language;

    $title = $description = "";
    if(isset($model)) {
        $title = Language::Current($model, 'title');
        $description = Language::Current($model, 'description');
    }
?>
<h3 class="mb-10"><?=$title?></h3>
<?=$description?>
