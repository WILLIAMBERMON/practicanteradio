<?php include APPPATH . "views/useccion/header.php"; ?>


<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-4">


            <div class="shadow-wrapper">

                <h2 style="color:#AA1916;"><b>Menú de Información</b></h2>
                <?php include APPPATH . "views/useccion/menu.php"; ?>

            </div>
            <?php if (isset($tiposeccion) && count($tiposeccion) && $tiposeccion[0]->id_tipo == 1): ?>
                <!--  <button class="btn btn-block btn-pinterest-inversed rounded margin-top-30 margin-bottom-20 tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Ir a Admisiones y Registro Académico">
                      <span aria-hidden="true" class="icon-pencil"></span> Proceso de Inscripción
                  </button>  -->
            <?php endif; ?>

        </div><!--/col-md-3-->
        <div class="col-md-8 mb-margin-bottom-30">
            <?php if (!empty($contenido[0][0]->fecha_actualizacion_contenido)): ?>
                <small class="pull-right" style="color:#aa1916;"><i
                        class="fa fa-calendar"></i> <?php setlocale(LC_ALL, "Spanish_Colombia"); ?>
                    <?php echo utf8_encode(strftime("%A", strtotime($contenido[0][0]->fecha_actualizacion_contenido))); ?>
                    ,
                    <?php echo strftime("%d", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?>
                    <?php echo strftime("%B", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?>
                    <?php echo strftime("%Y", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?></small>
            <?php endif; ?>
            <div class="margin-bottom-40 fadeInUp animated">
                <?php if (isset($seccion[0]->desc_seccion) && $present): ?>
                    <?php if (isset($seccion_img)): ?>
                        <!--=== carousel ===-->
                        <div id="myCarousel" class="carousel slide carousel-v1">
                            <div class="carousel-inner">
                                <?php if (isset($seccion_img->img1)): ?>
                                    <div class="item active">
                                        <img
                                            src="<?php echo base_url("public/imagenes/seccion").'/'.$seccion_img->img1; ?>"
                                            class="img-responsive" alt="" width='100%'>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($seccion_img->img2)): ?>
                                    <div class="item">
                                        <img
                                            src="<?php echo base_url("public/imagenes/seccion").'/'.$seccion_img->img2; ?>"
                                            class="img-responsive" alt="" width='100%'>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($seccion_img->img3)): ?>
                                    <div class="item">
                                        <img
                                            src="<?php echo base_url("public/imagenes/seccion").'/'.$seccion_img->img3; ?>"
                                            class="img-responsive" alt="" width='100%'>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($seccion_img->img4)): ?>
                                    <div class="item">
                                        <img
                                            src="<?php echo base_url("public/imagenes/seccion").'/'.$seccion_img->img4; ?>"
                                            class="img-responsive" alt="" width='100%'>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($seccion_img->img5)): ?>
                                    <div class="item">
                                        <img
                                            src="<?php echo base_url("public/imagenes/seccion").'/'.$seccion_img->img5; ?>"
                                            class="img-responsive" alt="" width='100%'>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($seccion_img->img6)): ?>
                                    <div class="item">
                                        <img
                                            src="<?php echo base_url("public/imagenes/seccion").'/'.$seccion_img->img6; ?>"
                                            class="img-responsive" alt="" width='100%'>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="carousel-arrow">
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="shadow-wrapper margin-top-30">
                        <blockquote class="tag-box tag-box-v4 margin-bottom-40">
                            <h5><?php echo((isset($seccion[0]->desc_seccion)) ? $seccion[0]->desc_seccion : "-"); ?></h5>
                        </blockquote>
                    </div>
                <?php endif; ?>

                <?php if (isset($contenido[0][0]->id_contenido)): ?>
                    <div class="headline margin-bottom-30">
                        <h1><?php echo((isset($contenido[0][0]->nombre_contenido)) ? $contenido[0][0]->nombre_contenido : "-"); ?></h1>
                    </div>


                    <h5><?php echo((isset($contenido[0][0]->desc_contenido)) ? $contenido[0][0]->desc_contenido : " "); ?></h5>


                    <!--------------------tabla de archivos anexos al contenido -------------->
                    <?php if (isset($titulos_doc)): ?>
                        <?php $numFilas = count($titulos_doc); ?>
                        <?php for ($i = 0; $i < $numFilas; $i++): ?>
                            <div class="box-body table-responsive no-padding margin-top-30">
                                <h4><b><i class="fa fa-files-o"></i> <?php echo $titulos_doc[$i]->descripcion; ?></b>
                                </h4>
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">Descripción</th>
                                        <th style="text-align: center;">Fecha de Publicación</th>
                                        <th style="text-align: center;">Archivo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($documentosc as $documento): ?>
                                        <?php if ($documento->id_titulo == $titulos_doc[$i]->id_titulo): ?>
                                            <tr>
                                                <td><?php echo((isset($documento->descripcion_documento)) ? $documento->descripcion_documento : ""); ?></td>
                                                <td style="text-align: center;"><?php echo((isset($documento->fecha_actualizacion)) ? utf8_encode(strftime("%A, %d de %B del %Y", strtotime($documento->fecha_actualizacion))) : ""); ?></td>
                                                <td style="text-align: center;"><a
                                                        href="/<?php echo PATH_PDF_DOCUMENTO_CONTENIDO_DOC; ?><?php echo((isset($documento->archivo)) ? $documento->archivo : ""); ?>"
                                                        class="hover tooltips" data-toggle="tooltip"
                                                        data-placement="bottom"
                                                        data-original-title="Descargar Archivo" target="_blank">
                                                        <?php if ((strpos($documento->archivo, ".pdf")) || (strpos($documento->archivo, ".PDF"))): ?>
                                                            <i class="icon-custom icon-sm rounded icon-color-red fa fa-file-pdf-o"
                                                               aria-hidden="true"></i>
                                                        <?php elseif ((strpos($documento->archivo, ".doc")) || (strpos($documento->archivo, ".docx"))): ?>
                                                            <i class="icon-custom icon-sm rounded icon-color-red fa fa-file-word-o"
                                                               aria-hidden="true"></i>
                                                        <?php elseif ((strpos($documento->archivo, ".xlsx")) || (strpos($documento->archivo, ".xls"))): ?>
                                                            <i class="icon-custom icon-sm rounded icon-color-red fa fa-file-excel-o"
                                                               aria-hidden="true"></i>
                                                        <?php else: ?>
                                                            <i class="icon-custom icon-sm rounded icon-color-red fa fa-link"
                                                               aria-hidden="true"></i>
                                                        <?php endif; ?>
                                                    </a></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        <?php endfor; ?>
                    <?php endif; ?>

                    <!---------------------- subcontenido de la tabla de equipo de trabajo ----------->
                    <?php if (isset($subcontenido[0]->id_etrabajo)): ?>
                        <div class="box-body table-responsive no-padding">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th style="text-align: center;"><h5><b>Nombres</b></h5></th>
                                    <th style="text-align: center;"><h5><b>Cargo</b></h5></th>
                                    <th style="text-align: center;"><h5><b>Correo</b></h5></th>
                                    <th style="text-align: center;"><h5><b>Ext.</b></h5></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $numFilas = count($subcontenido); ?>
                                <?php for ($i = 0; $i < $numFilas; $i++): ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo((isset($subcontenido[$i]->nombre_apellido)) ? $subcontenido[$i]->nombre_apellido : ""); ?></td>
                                        <td style="text-align: center;"><?php echo((isset($subcontenido[$i]->cargo)) ? $subcontenido[$i]->cargo : ""); ?></td>
                                        <td style="text-align: center;"><?php echo((isset($subcontenido[$i]->correo)) ? $subcontenido[$i]->correo : ""); ?></td>
                                        <td style="text-align: center;"><?php echo((isset($subcontenido[$i]->extension)) ? $subcontenido[$i]->extension : ""); ?></td>
                                    </tr>
                                <?php endfor; ?>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    <?php endif; ?>
                <?php endif; ?>

                <!-----------------------Contenido Investigacion -------------------->
                <?php if (isset($contenido[0][0]->id_grupo)): ?>
                    <div class="headline margin-bottom-30"><h1>Grupos de Investigación</h1></div>
                    <!-- Accordion v1 -->
                    <div class="panel-group acc-v1" id="accordion-2">
                        <?php if (isset($contenido[0]) && count($contenido[0])): ?>
                            <?php $numFilas = count($contenido[0]); ?>
                            <?php for ($i = 0; $i < $numFilas; $i++): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><b>
                                                <a class="accordion-toggle menu-acordeon" data-toggle="collapse"
                                                   data-parent="#accordion-2"
                                                   href="#collapse-<?php echo((isset($contenido[0][$i]->id_grupo)) ? $contenido[0][$i]->id_grupo : "-"); ?>">
                                                    <span aria-hidden="true"
                                                          class="icon-users"></span> <?php echo((isset($contenido[0][$i]->nombre)) ? $contenido[0][$i]->nombre : "-"); ?>
                                                </a></b>
                                        </h4>
                                    </div>
                                    <div
                                        id="collapse-<?php echo((isset($contenido[0][$i]->id_grupo)) ? $contenido[0][$i]->id_grupo : "-"); ?>"
                                        class="panel-collapse collapse <?php echo((($i == 0)) ? "in" : " "); ?>">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6><?php echo((strlen($contenido[0][$i]->director) != 0) ? "<b>Director:</b> " . $contenido[0][$i]->director : " "); ?></h6>
                                                    <h6><?php echo((strlen($contenido[0][$i]->departamento) != 0) ? "<b>Departamento:</b> " . $contenido[0][$i]->departamento : " "); ?></h6>
                                                    <h6><?php echo((strlen($contenido[0][$i]->correo) != 0) ? "<b>Correo:</b> " . $contenido[0][$i]->correo : " "); ?></h6>
                                                    <h6><?php echo((strlen($contenido[0][$i]->linea) != 0) ? "<b>Linea:</b> " . $contenido[0][$i]->linea : " "); ?></h6>
                                                    <h6><?php echo((strlen($contenido[0][$i]->enlace) != 0) ? "<b>Enlace Web:</b> <a href=" . $contenido[0][$i]->enlace . ">Entrar</a>" : " "); ?></h6>
                                                    <h6><?php echo((strlen($contenido[0][$i]->estatus) != 0) ? "<b>Estatus:</b> " . $contenido[0][$i]->estatus : " "); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                    <!-- End Accordion v2 -->
                <?php endif; ?>

                <!-----------------------Contenido Publicaciones -------------------->
                <?php if (isset($contenido[0][0]->publicacion_id)): ?>
                    <div class="headline margin-bottom-30"><h1>
                            Publicaciones <?php echo((isset($contenido[0][0]->nombre)) ? $contenido[0][0]->nombre : "-"); ?></h1>
                    </div>

                    <div class="row illustration-v4 margin-bottom-40">
                        <?php $numFilas = count($contenido[0]); ?>
                        <?php for ($i = 0; $i < $numFilas; $i++): ?>
                            <div class="col-md-4">
                                <div class="thumb-product">
                                    <img class="thumb-product-img"
                                         src="<?php echo((isset($contenido[0][$i]->imagen)) ? base_url("/public/imagenes/publicaciones") . '/' . $contenido[0][$i]->imagen : "-"); ?>"
                                         alt="">
                                    <div class="thumb-product-in">
                                        <h4><?php echo((isset($contenido[0][0]->nombre)) ? $contenido[0][0]->nombre : "-"); ?></h4>
                                        <span
                                            class="thumb-product-type"><?php echo((isset($contenido[0][$i]->volumen)) ? 'Volumen: ' . $contenido[0][$i]->volumen : "-"); ?></span>
                                        <span
                                            class="thumb-product-type"><?php echo((isset($contenido[0][$i]->numero)) ? 'Número: ' . $contenido[0][$i]->numero : "-"); ?></span>
                                        <span
                                            class="thumb-product-type"><?php echo((isset($contenido[0][$i]->isbn)) ? 'ISBN: ' . $contenido[0][$i]->isbn : "-"); ?></span>
                                        <span
                                            class="thumb-product-type"><?php echo((isset($contenido[0][$i]->year)) ? 'Año: ' . $contenido[0][$i]->year : " "); ?></span>

                                    </div>
                                    <ul class="list-inline overflow-h">
                                        <li class="thumb-product-purchase"><a
                                                href="publicaciones/<?php echo((isset($contenido[0][$i]->archivo)) ? $contenido[0][$i]->archivo : ""); ?>"><i
                                                    class="fa fa-eye"></i></a> | <a
                                                href="<?php echo base_url("/public/archivos/publicaciones"); ?>/<?php echo((isset($contenido[0][$i]->archivo)) ? $contenido[0][$i]->archivo : ""); ?>"><i
                                                    class="fa fa-cloud-download"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div><!--/end row-->
                <?php endif; ?>

                <!-----------------------Contenido Docentes -------------------->
                <?php if (isset($contenido[0][0]->COD_PROFESOR)): ?>
                <div class="headline margin-bottom-30"><h1>
                        Docentes</h1>
                </div>
                <div class="testimonials-v6 testimonials-wrap">
                    <div class="row margin-bottom-50">
                        <?php $numFilas = count($contenido[0]); ?>
                        <?php for ($i = 0;
                        $i < $numFilas;
                        $i++): ?>
                            <?php if(($i+1)%2==1): ?>
                                <div class="row">
                            <?php endif; ?>
                            <div class="col-md-6 md-margin-bottom-50">
                                <div class="testimonials-info rounded-bottom" style="padding-left: 0px; padding-right: 0px;">
                                    <div style="height: 40px;">
                                        <strong><h5 style="color: #aa1916;"><b><?php echo $contenido[0][$i]->NOMBRES; ?></b></h5></strong>
                                    </div>
                                    <img alt="" src="<?php echo isset($contenido[0][$i]->LLAVE) ? "https://docentes.ufps.edu.co/public/imagenes/{$contenido[0][$i]->LLAVE}.JPEG" : base_url("public/imagenes/foto_default.JPEG"); ?>" class="rounded-x">
                                    <div class="testimonials-desc">
                                        <div style="overflow: auto; width: 100%; height: 150px;">
                                            <h6>
                                                <span style="color: #aa1916;"><b><i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo $contenido[0][$i]->CATEGORIA == 'TC' ? "Docente de Planta" : ""; ?>
                                                        <?php echo $contenido[0][$i]->CATEGORIA == 'OTC' ? "Docente Ocasional" : ""; ?>
                                                        <?php echo $contenido[0][$i]->CATEGORIA == 'CT' ? "Docente de Catedra" : ""; ?>
                                                        <?php echo $contenido[0][$i]->CATEGORIA == 'MT' ? "Docente" : ""; ?></b></span>
                                                <span><?php echo $contenido[0][$i]->ESTUDIOS; ?></span>
                                               <span style="color: #aa1916; text-decoration:underline; margin-top: 5px;"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo isset($contenido[0][$i]->EMAIL) ? $contenido[0][$i]->EMAIL : ""; ?></span>
                                            </h6>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <?php if(($i+1)%2==0): ?>
                                </div>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </div><!--/end row-->
                    </div>
                    <?php endif; ?>


                <!-----------------------Contenido Docentes -------------------->
                <?php if (isset($contenido[0][0]->PENSUM)): ?>
                    <div class="headline margin-bottom-30"><h1>
                            Pensum</h1>
                    </div>
                    <iframe src="https://evaldocente.ufps.edu.co/div_sistemas/consultapensumweb.php?car=<?php echo $cod_carrera; ?>&pen=<?php echo $contenido[0][0]->PENSUM; ?>"
                        marginwidth="0" marginheight="0" name="ventana_iframe" scrolling="yes" border="0"
                        frameborder="0" width="100%" height="600"></iframe>
                <?php endif; ?>


                    <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getLink'): ?>
                        <?php
                        header('Location: ' . $contenido[0]['enlace']);
                        ?>
                    <?php endif; ?>

                    <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getArchivoPdf'): ?>
                        <iframe
                            src="https://docs.google.com/gview?url=<?php echo $contenido[0]['enlace']; ?> &embedded=true"
                            style="width:100%; height:730px;" frameborder="0"></iframe>
                        <p style="text-align:center;"><h5>Si no puedes visualizar el archivo podrá descargarlo. <b><a
                                    href="<?php echo $contenido[0]['enlace']; ?>" data-placement="top"
                                    data-toggle="tooltip"
                                    class="tooltips" data-original-title="Descargar el Archivo" target="_blank">Descargar
                                    Archivo</a></b></h5></p>

                    <?php endif; ?>

                    <!-----------------------Documentos Normatividad -------------------->
                    <?php if (isset($documentos) && count($documentos)): ?>
                        <div class="row fadeInUp animated">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="box-body table-responsive no-padding">
                                    <table id="example4" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center;">Entidad</th>
                                            <th style="text-align: center;">Acto</th>
                                            <th style="text-align: center;">Fecha del Documento</th>
                                            <th style="text-align: center;">Descripción</th>
                                            <th style="text-align: center;">Archivo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $numFilas = count($documentos); ?>
                                        <?php for ($i = 0; $i < $numFilas; $i++): ?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo((isset($documentos[$i]->nombre_seccion)) ? $documentos[$i]->nombre_seccion : "-"); ?></td>
                                                <td style="text-align: center;"><?php echo((isset($documentos[$i]->NombreActo)) ? $documentos[$i]->NombreActo . " No. " . $documentos[$i]->numero_acto : "-"); ?></td>
                                                <td style="text-align: center;"><?php echo((isset($documentos[$i]->fecha_documento)) ? utf8_encode(strftime("%A, %d de %B del %Y", strtotime($documentos[$i]->fecha_documento))) : "-"); ?></td>
                                                <td><?php echo((isset($documentos[$i]->descripcion_documento)) ? $documentos[$i]->descripcion_documento : "-"); ?></td>
                                                <td style="text-align: center;"><a
                                                        href="929/<?php echo((isset($documentos[$i]->id_documento)) ? $documentos[$i]->id_documento : ""); ?>"
                                                        class="hover tooltips" data-toggle="tooltip"
                                                        data-placement="bottom"
                                                        data-original-title="Ver Archivo"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                    <a href="http://www.ufps.edu.co/ufpsnuevo/archivos/reglamentacion/<?php echo((isset($documentos[$i]->archivo)) ? $documentos[$i]->archivo : ""); ?>"
                                                       class="hover tooltips" data-toggle="tooltip"
                                                       data-placement="bottom"
                                                       data-original-title="Descargar Archivo"><i
                                                            class="fa fa-cloud-download"></i></a></td>
                                            </tr>
                                        <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->

                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    <?php endif; ?>
                </div>
            </div><!--/col-md-8-->
        </div><!--/row-->

        <?php include APPPATH . "views/unoticia/noticias_recientes.php"; ?>

    </div><!--/container-->
    <!--=== End Content Part ===-->






