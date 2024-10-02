<?php include APPPATH . "views/useccion/header.php"; ?>


<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-9 mb-margin-bottom-30">
            <?php if ($fecha): ?>
                <small class="pull-right" style="color:#aa1916;"><i
                        class="fa fa-calendar"></i> <?php setlocale(LC_ALL, "Spanish_Colombia"); ?>
                    <?php echo utf8_encode(strftime("%A", strtotime($fecha->ultima))); ?>
                    ,
                    <?php echo strftime("%d", strtotime($fecha->ultima)); ?>
                    <?php echo strftime("%B", strtotime($fecha->ultima)); ?>
                    <?php echo strftime("%Y", strtotime($fecha->ultima)); ?></small>
            <?php endif; ?>
            <div class="margin-top-40 margin-bottom-40">
                <!--                  <div class="shadow-wrapper">        -->
                <!--                            <blockquote class="tag-box tag-box-v4 margin-bottom-40">-->
                <!--                                <h4>Siguiendo las disposiciones de la Ley 1712 del 6 de marzo de 2014 , la Universidad Francisco de Paula Santander, UFPS, adopta el siguiente esquema de publicación que queda a disposición de la ciudadanía en nuestro sitio web:</h4>-->
                <!--                            </blockquote>-->
                <!--                        </div>-->
                <?php if (isset($ticonvocatoria)): ?>
                    <div class="row">
                        <?php $numFilas = count($ticonvocatoria); ?>
                        <?php for ($i = 0; $i < $numFilas; $i++): ?>
                            <div class="col-md-12 margin-bottom-30">
                                <div class="panel margin-top-30">
                                    <div class="panel-heading panel-blue-ins">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <span class="info-box-icon"><i class="fa fa-paperclip"></i></span>
                                            </div>
                                            <div class="col-md-10"> <h3 class="panel-title"><b><?php echo((isset($ticonvocatoria[$i]->descripcion)) ? $ticonvocatoria[$i]->descripcion : ""); ?></b></h3>
                                                <h6 style="color:#fff;"><i class="fa fa-calendar"></i> Publicado. (<?php setlocale(LC_TIME, 'es_CO'); ?>
                                                    <?php echo utf8_encode(strftime("%A, %d de %B del %Y %r", strtotime(($ticonvocatoria[$i]->fecha_publicado)))); ?>)</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body no-padding">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th style="text-align: center;">Descripción</th>
                                                <th style="text-align: center;">Publicado</th>
                                                <th style="text-align: center;">Archivo</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php $numFi = count($conconvocatoria); ?>
                                            <?php for ($j = 0; $j < $numFi; $j++): ?>
                                                <?php if ($ticonvocatoria[$i]->id_convocatoria == $conconvocatoria[$j]->id_convocatoria): ?>
                                                    <tr>
                                                        <td><?php echo((isset($conconvocatoria[$j]->descripcion)) ? $conconvocatoria[$j]->descripcion : ""); ?></td>
                                                        <td style="text-align: center;">
                                                            <?php echo utf8_encode(strftime("%A, %d de %B del %Y %r", strtotime(($conconvocatoria[$j]->fecha_publicado)))); ?></td>
                                                        <td style="text-align: center;">
                                                            <a href="convocatorias/<?php echo((isset($conconvocatoria[$j]->id_actividad)) ? $conconvocatoria[$j]->id_actividad : ""); ?>"
                                                               class="opcaccessinv">
                                                                <?php if ((strpos($conconvocatoria[$j]->archivo, ".pdf")) || (strpos($conconvocatoria[$j]->archivo, ".PDF"))): ?>
                                                                    <i class="icon-custom icon-sm rounded icon-color-red fa fa-file-pdf-o" aria-hidden="true"></i>
                                                                <?php elseif ((strpos($conconvocatoria[$j]->archivo, ".doc")) || (strpos($conconvocatoria[$j]->archivo, ".docx"))): ?>
                                                                    <i class="icon-custom icon-sm rounded icon-color-red fa fa-file-word-o" aria-hidden="true"></i>
                                                                <?php else: ?>
                                                                    <i class="icon-custom icon-sm rounded icon-color-red fa fa-link" aria-hidden="true"></i>
                                                                <?php endif; ?>
                                                            </a></td>
                                                    </tr>

                                                <?php endif; ?>
                                            <?php endfor; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>


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
                    <div class="headline margin-bottom-30">
                        <h1><?php echo((isset($contenido[0][0]->nombre_contenido)) ? $contenido[0][0]->nombre_contenido : "-"); ?></h1>
                    </div>
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






