<?php
if(isset($sliders)){
?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
     <?php 
                                  $all = count($sliders);
                                    $counter=0;
                                  while ($counter++<$all):
                                  ?> 
                                
                                <li data-target="#carousel-example-generic" data-slide-to="<?= $counter ?>" class="<?php ($counter==1)?'active':''; ?>"></li>
                           
                            <?php endwhile; ?>
                                  
    

  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php 
                                  
                                    $counter=0;
                                    foreach($sliders as $img):
                                    $counter++; ?>
    <div class="item <?= ($counter==1)?'active':'' ?>">
     <img src="<?= \Yii::$app->request->BaseUrl.'/images/store/' . $img['imageRelation']['filePath'] ?>" alt="">

    </div>
    <?php
                                    endforeach;
                                    ?>

   
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php
}
?>




