<?php include APPPATH . "views/useccion/header.php"; ?>  


<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-12 mb-margin-bottom-30">
            <?php if(!empty($contenido[0][0]->fecha_actualizacion_contenido)): ?>
                <small class="pull-right" style="color:#aa1916;"><i
                        class="fa fa-calendar"></i> <?php setlocale(LC_ALL, "Spanish_Colombia"); ?>
                    <?php echo utf8_encode(strftime("%A", strtotime($contenido[0][0]->fecha_actualizacion_contenido))); ?>
                    ,
                    <?php echo strftime("%d", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?>
                    <?php echo strftime("%B", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?>
                    <?php echo strftime("%Y", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?></small>
            <?php endif; ?>
            <div class="margin-bottom-40 fadeInUp animated">
                   <?php if (!empty($seccion[0]->desc_seccion)): ?>
                        <div class="shadow-wrapper margin-top-30">        
                            <blockquote class="tag-box tag-box-v4 margin-bottom-40">
                                <h5><?php echo ((isset($seccion[0]->desc_seccion)) ? $seccion[0]->desc_seccion : "-"); ?></h5>
                            </blockquote>
                        </div>
                    <?php endif; ?>
                
                <?php if (isset($contenido[0][0]->id_contenido)): ?>
                    <h5><?php echo ((isset($contenido[0][0]->desc_contenido)) ? $contenido[0][0]->desc_contenido : " "); ?></h5>
                <?php endif; ?>

                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getLink'): ?>
                    <?php
                    header('Location: ' . $contenido[0]['enlace']);
                    ?>
                <?php endif; ?>

                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getArchivoPdf'): ?>
                    <iframe src="https://docs.google.com/gview?url=<?php echo $contenido[0]['enlace']; ?> &embedded=true" style="width:100%; height:730px;" frameborder="0"></iframe>
                    <p style="text-align:center;"><h5>Si no puedes visualizar el archivo podrá descargarlo. <b><a href="<?php echo $contenido[0]['enlace']; ?>"  data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Descargar el Archivo" target="_blank">Descargar Archivo</a></b></h5></p>

                <?php endif; ?>
            </div>
        </div><!--/col-md-8-->
    </div><!--/row-->

    <?php include APPPATH . "views/unoticia/noticias_recientes.php"; ?>

</div><!--/container-->
<!--=== End Content Part ===-->






