<?php include APPPATH . "views/useccion/header.php"; ?>  


<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-4">
            <div class="shadow-wrapper">        
                <div class="margin-top-20"><h2 style="color:#AA1916;"><b>Atención al ciudadano</b></h2></div>
                <?php include APPPATH . "views/universidad/menu.php"; ?> 
            </div>
            <!-- fin menu de Información --->
        </div><!--/col-md-3-->
        <div class="col-md-8 mb-margin-bottom-30">
            <?php if(!empty($contenido[0]->fecha_actualizacion_contenido)): ?>
                <small class="pull-right" style="color:#aa1916;"><i
                        class="fa fa-calendar"></i> <?php setlocale(LC_ALL, "Spanish_Colombia"); ?>
                    <?php echo utf8_encode(strftime("%A", strtotime($contenido[0]->fecha_actualizacion_contenido))); ?>
                    ,
                    <?php echo strftime("%d", strtotime($contenido[0]->fecha_actualizacion_contenido)); ?>
                    <?php echo strftime("%B", strtotime($contenido[0]->fecha_actualizacion_contenido)); ?>
                    <?php echo strftime("%Y", strtotime($contenido[0]->fecha_actualizacion_contenido)); ?></small>
            <?php endif; ?>
            <div class="margin-bottom-40">                     
                <?php if (isset($contenido[0]->id_contenido)): ?>
                    <div class="headline margin-bottom-30"><h1><?php echo ((isset($contenido[0]->nombre_contenido)) ? $contenido[0]->nombre_contenido : "-"); ?></h1></div>
                    <h5><?php echo ((isset($contenido[0]->desc_contenido)) ? $contenido[0]->desc_contenido : " "); ?></h5>
                <?php endif; ?>
            </div>
        </div><!--/col-md-8-->
    </div><!--/row-->


</div><!--/container-->
<!--=== End Content Part ===-->






