<div class="row no-margin">
    <div class="col-md-12 no-padding">
        <ul class="pgwSlider">
            <?php
            for ($i = 0; $i < 4; $i++):
                ?>
                <?php if(isset($noticias_actu[$i])):?>
                <li>
                <?php if($noticias_actu[$i]->enlace ==null):?> 
                    <a href="<?php echo base_url("unoticia/" . ((isset($noticias_actu[$i]->id_titulo)) ? $noticias_actu[$i]->id_titulo : "-")); ?>"><img
                            src="<?php echo base_url("public/imagenes/noticia/" . ((isset($noticias_actu[$i]->imagen)) ? $noticias_actu[$i]->imagen : "-")); ?>"
                            alt="<?php echo((isset($noticias_actu[$i]->titulo)) ? $noticias_actu[$i]->titulo : "-"); ?>"><span
                            style="font-family: inherit; font-weight: bold;"><?php echo((isset($noticias_actu[$i]->titulo)) ? $noticias_actu[$i]->titulo : "-"); ?></span></a>
                          
                <?php else: ?>
                    <a href="<?php echo $noticias_actu[$i]->enlace; ?>" target="_blank"><img
                            src="<?php echo base_url("public/imagenes/noticia/" . ((isset($noticias_actu[$i]->imagen)) ? $noticias_actu[$i]->imagen : "-")); ?>"
                            alt="<?php echo((isset($noticias_actu[$i]->titulo)) ? $noticias_actu[$i]->titulo : "-"); ?>"><span
                            style="font-family: inherit; font-weight: bold;"><?php echo((isset($noticias_actu[$i]->titulo)) ? $noticias_actu[$i]->titulo : "-"); ?></span></a>
                 
                            <?php endif;?>
                        </li>
                <?php endif;?>
                <?php
            endfor;
            ?>
        </ul>
    </div>
</div>