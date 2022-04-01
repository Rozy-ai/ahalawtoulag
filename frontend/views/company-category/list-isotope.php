<?php
use yii\helpers\Html;
use common\helpers\Language;
?>
<header class="d-flex justify-content-between align-items-start">
<div class="button-group filters-button-group">
    <?php
        echo'<button class="button btn btn-template-outlined list-inline-item active" data-filter="*">'.\Yii::t('app','Show all').'</button>';
        $title = "";
        foreach($categories as $category) {
            echo '<button class="button btn btn-template-outlined list-inline-item" data-filter=".'.$category->id.'">'.Language::Current($category,'title').'</button>';
        }
    ?>
</div>
</header>
<?php $this->registerJs('
	$(".filters-button-group").on( "click", "button", function() {
	
	    //remove old active class
        $(".btn").each(function(i) {
            if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
        
        //add new active class to current
        $(this).addClass("active");
	
        var filterValue = $( this ).attr("data-filter");
        $("#w0 .row").isotope({ filter: filterValue });
	}); 
', $this::POS_END) ?>