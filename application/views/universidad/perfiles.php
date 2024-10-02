<?php include APPPATH . "views/useccion/header.php"; ?>


<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-9 mb-margin-bottom-30">
            <?php if(!empty($contenido[0][0]->fecha_actualizacion_contenido)): ?>
                <small class="pull-right" style="color:#aa1916;"><i
                        class="fa fa-calendar"></i> <?php setlocale(LC_ALL, "Spanish_Colombia"); ?>
                    <?php echo utf8_encode(strftime("%A", strtotime($contenido[0][0]->fecha_actualizacion_contenido))); ?>
                    ,
                    <?php echo strftime("%d", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?>
                    <?php echo strftime("%B", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?>
                    <?php echo strftime("%Y", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?></small>
            <?php endif; ?>
            <div class="margin-top-40 margin-bottom-40">
                <!--                  <div class="shadow-wrapper">        -->
                <!--                            <blockquote class="tag-box tag-box-v4 margin-bottom-40">-->
                <!--                                <h4>Siguiendo las disposiciones de la Ley 1712 del 6 de marzo de 2014 , la Universidad Francisco de Paula Santander, UFPS, adopta el siguiente esquema de publicación que queda a disposición de la ciudadanía en nuestro sitio web:</h4>-->
                <!--                            </blockquote>-->
                <!--                        </div>-->

                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getLink'): ?>
                    <?php
                    header('Location: ' . $contenido[0]['enlace']);
                    ?>
                <?php endif; ?>

                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getLinkInt'): ?>
                    <?php
                    header('Location: ' . $contenido[0]['enlace']);
                    ?>
                <?php endif; ?>

                <!----------------------- Visualizar el documento de reglamentación ----------------->
                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getArchivoPdfRegla'): ?>
                    <iframe
                        src="https://docs.google.com/gview?url=<?php echo $contenido[0]['enlace']; ?> &embedded=true"
                        style="width:100%; height:730px;" frameborder="0"></iframe>
                    <p style="text-align:center;"><h5>Si no puede visualizar el archivo podrá descargarlo. <b><a
                                href="<?php echo $contenido[0]['enlace']; ?>" data-placement="top" data-toggle="tooltip"
                                class="tooltips" data-original-title="Descargar el Archivo" target="_blank">Descargar
                                Archivo</a></b></h5></p>
                <?php endif; ?>

                <!----------------------- Visualizar el documento de la Sesión --------------------->
                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getArchivoPdf'): ?>
                    <iframe
                        src="https://docs.google.com/gview?url=<?php echo $contenido[0]['enlace']; ?> &embedded=true"
                        style="width:100%; height:730px;" frameborder="0"></iframe>
                    <p style="text-align:center;"><h5>Si no puede visualizar el archivo podrá descargarlo. <b><a
                                href="<?php echo $contenido[0]['enlace']; ?>" data-placement="top" data-toggle="tooltip"
                                class="tooltips" data-original-title="Descargar el Archivo" target="_blank">Descargar
                                Archivo</a></b></h5></p>
                <?php endif; ?>


                <?php if (isset($contenido[0][0]->id_contenido)): ?>
<!--                    <div class="headline margin-bottom-30">-->
<!--                        <h1>--><?php //echo((isset($contenido[0][0]->nombre_contenido)) ? $contenido[0][0]->nombre_contenido : "-"); ?><!--</h1>-->
<!--                    </div>-->
                    <h5><?php echo((isset($contenido[0][0]->desc_contenido)) ? $contenido[0][0]->desc_contenido : " "); ?></h5>
                <?php endif; ?>


            </div>
        </div><!--/col-md-8-->
        <div class="col-md-3 col-sm-4">
            <?php include APPPATH . "views/useccion/col-der.php"; ?>
        </div><!--/col-md-4-->
    </div><!--/row-->


</div><!--/container-->
<!--=== End Content Part ===-->






