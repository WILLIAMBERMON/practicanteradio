<!--=== breadcrumb ===-->
<?php if (isset($breadcrumb)): ?>
    <ul class="breadcrumb no-padding margin-bottom-10">
        <?php
        $numFilas = count($breadcrumb);
        for ($i = 0; $i < $numFilas; $i++):
            ?>
          <?php if($breadcrumb[$i]['href'] != " "): ?>
        <li title="<?php echo $breadcrumb[$i]['title'];?>"><a href="<?php echo $breadcrumb[$i]['href'];?>" style="font-style: italic; font-size: 14px;"><?php echo $breadcrumb[$i]['nombre'];?></a></li>
           <?php else: ?>
         <li class="active" title="<?php echo ((isset($titulo_bread)) ? $titulo_bread : "-"); ?>"  style="font-style: italic; font-size: 14px;"><?php echo ((isset($titulo_bread)) ? $titulo_bread : "-"); ?></li>
         <?php endif; ?>
        <?php endfor; ?>        
    </ul> 
<?php endif; ?>
<!--=== fin breadcrumb ===-->  

