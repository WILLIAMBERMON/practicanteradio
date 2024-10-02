<?php include APPPATH . "views/universidad/header.php"; ?>


<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-4 team-v1">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-unstyled" style="border-style: double; border-width: 6px; border-color: #ddd; padding: 10px; background-color: #f8f8f8;">
                        <li>

                            <!-- <img class="img-responsive" src="<?php //echo base_url("public/imagenes/rectoria/hector_miguel_parra_lopez.jpg"); 
                                                                    ?>" alt=""> -->
                            <img class="img-responsive" src="https://divisist2.ufps.edu.co/public/documentos/120e138b66a858fa7884c198ae54056a.jpg" alt="">

<!-- <h3><b>Héctor Miguel Parra López</b></h3> -->
<h3><b>SANDRA ORTEGA SIERRA </b></h3>
<h4>/ Rectora</h4>
                            <!--                            <p>La calidad académica en el ámbito educativo, requiere de la construcción de una cultura-->
                            <!--                                propia; ardua tarea en la que nos hemos comprometido desde años atrás en nuestra Alma-->
                            <!--                                Mater.</p>-->
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="shadow-wrapper">
                        <div class="margin-top-20">
                            <h2 style="color:#AA1916;"><b>Menú de Información</b></h2>
                        </div>
                        <?php include APPPATH . "views/universidad/menu_rectoria.php"; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--/col-md-3-->
        <div class="col-md-8 mb-margin-bottom-30">
            <?php if (!empty($contenido[0][0]->fecha_actualizacion_contenido)) : ?>
                <small class="pull-right" style="color:#aa1916;"><i class="fa fa-calendar"></i> <?php setlocale(LC_ALL, "Spanish_Colombia"); ?>
                    <?php echo utf8_encode(strftime("%A", strtotime($contenido[0][0]->fecha_actualizacion_contenido))); ?>
                    ,
                    <?php echo strftime("%d", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?>
                    <?php echo strftime("%B", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?>
                    <?php echo strftime("%Y", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?></small>
            <?php endif; ?>
            <div class="margin-bottom-40  fadeInUp animated">
                <?php if (isset($contenido[0][0]->id_contenido)) : ?>
                    <div class="headline margin-bottom-30">
                        <h1><?php echo ((isset($contenido[0][0]->nombre_contenido)) ? $contenido[0][0]->nombre_contenido : "-"); ?></h1>
                    </div>
                    <h5><?php echo ((isset($contenido[0][0]->desc_contenido)) ? $contenido[0][0]->desc_contenido : " "); ?></h5>
                    <!---------------------- subcontenido de la tabla de equipo de trabajo ----------->
                <?php endif; ?>
                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getLink') : ?>
                    <?php
                    header('Location: ' . $contenido[0]['enlace']);
                    ?>
                <?php endif; ?>
                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getLinkInt') : ?>
                    <?php
                    header('Location: ' . $contenido[0]['enlace']);
                    ?>
                <?php endif; ?>

                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getArchivoPdf') : ?>
                    <iframe src="https://docs.google.com/gview?url=<?php echo $contenido[0]['enlace']; ?> &embedded=true" style="width:100%; height:730px;" frameborder="0"></iframe>
                    <p style="text-align:center;">
                    <h5>Si no puedes visualizar el archivo podrá descargarlo. <b><a href="<?php echo $contenido[0]['enlace']; ?>" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Descargar el Archivo">Descargar Archivo</a></b>
                    </h5>
                    </p>
                <?php endif; ?>

                <!--------------------tabla de archivos anexos al contenido -------------->
                <?php if (isset($titulos_doc)) : ?>
                    <?php $numFilas = count($titulos_doc); ?>
                    <?php for ($i = 0; $i < $numFilas; $i++) : ?>
                        <div class="box-body table-responsive no-padding margin-top-30">
                            <h4><b><i class="fa fa-files-o"></i> <?php echo $titulos_doc[$i]->descripcion; ?></b></h4>
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Descripción</th>
                                        <th style="text-align: center;">Fecha del Documento</th>
                                        <th style="text-align: center;">Archivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($documentosc as $documento) : ?>
                                        <?php if ($documento->id_titulo == $titulos_doc[$i]->id_titulo) : ?>
                                            <tr>
                                                <td><?php echo ((isset($documento->descripcion_documento)) ? $documento->descripcion_documento : ""); ?></td>
                                                <td style="text-align: center;"><?php echo ((isset($documento->fecha_actualizacion)) ? utf8_encode(strftime("%A, %d de %B del %Y", strtotime($documento->fecha_actualizacion))) : ""); ?></td>
                                                <td style="text-align: center;"><a href="/<?php echo PATH_PDF_DOCUMENTO_CONTENIDO_DOC; ?><?php echo ((isset($documento->archivo)) ? $documento->archivo : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Descargar Archivo" target="_blank">
                                                        <?php if ((strpos($documento->archivo, ".pdf")) || (strpos($documento->archivo, ".PDF"))) : ?>
                                                            <i class="icon-custom icon-sm rounded icon-color-red fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        <?php elseif ((strpos($documento->archivo, ".doc")) || (strpos($documento->archivo, ".docx"))) : ?>
                                                            <i class="icon-custom icon-sm rounded icon-color-red fa fa-file-word-o" aria-hidden="true"></i>
                                                        <?php else : ?>
                                                            <i class="icon-custom icon-sm rounded icon-color-red fa fa-link" aria-hidden="true"></i>
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

                <!-----------------------Contenido Publicaciones -------------------->
                <?php if (isset($contenido[0][0]->publicacion_id)) : ?>
                    <div class="headline margin-bottom-30">
                        <h1>Publicaciones <?php echo ((isset($contenido[0][0]->nombre)) ? $contenido[0][0]->nombre : "-"); ?></h1>
                    </div>

                    <div class="row illustration-v4 margin-bottom-40">
                        <?php $numFilas = count($contenido[0]); ?>
                        <?php for ($i = 0; $i < $numFilas; $i++) : ?>
                            <div class="col-md-4">
                                <div class="thumb-product">
                                    <img class="thumb-product-img" src="<?php echo ((isset($contenido[0][$i]->imagen)) ? base_url("/public/imagenes/publicaciones") . '/' . $contenido[0][$i]->imagen : "-"); ?>" alt="">
                                    <div class="thumb-product-in">
                                        <h4><?php echo ((isset($contenido[0][$i]->nombre)) ? $contenido[0][$i]->nombre : "-"); ?></h4>
                                        <span class="thumb-product-type"><?php echo ((isset($contenido[0][$i]->edicion)) ? 'Edición: ' . $contenido[0][$i]->edicion : "-"); ?></span>
                                        <span class="thumb-product-type"><?php echo ((isset($contenido[0][$i]->year)) ? 'Año: ' . $contenido[0][$i]->year : "-"); ?></span>

                                    </div>
                                    <ul class="list-inline overflow-h">
                                        <li class="thumb-product-purchase">
                                            <a href="<?php echo ((isset($contenido[0][$i]->archivo)) ? base_url("/public/imagenes/publicaciones") . '/' . $contenido[0][$i]->archivo : "-"); ?>" rel="gallery" class="fancybox img-hover-v2" title="Rectoría al Día">
                                                <span><i class="fa fa-eye"></i></span>
                                            </a> | <a href="<?php echo ((isset($contenido[0][$i]->archivo)) ? base_url("/public/imagenes/publicaciones") . '/' . $contenido[0][$i]->archivo : "-"); ?>" target="_blank"><i class="fa fa-cloud-download"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <!--/end row-->
                <?php endif; ?>

                <!-- Licitaciones Rectoria -->
                <?php if (isset($subcontenido[0]->idlici)) : ?>
                    <?php $numFilas = count($subcontenido); ?>

                    <?php $grupo = 0; ?>
                    <?php $h = 0; ?>
                    <?php for ($i = 0; $i < $numFilas; $i++) : ?>
                        <?php if ($subcontenido[$i]->grupo != 0) : ?>
                            <?php if ($subcontenido[$i]->grupo != $grupo) : ?>
                                <?php $grupo = $subcontenido[$i]->grupo; ?>
                                <hr class="devider devider-dotted">
                                <?php if (isset($grupos)) : ?>
                                    <h5>
                                        <b>OBJETO:</b> <?php echo ((isset($grupos[$h]->objeto_des)) ? $grupos[$h]->objeto_des : ""); ?>
                                    </h5>
                                    <?php $h++; ?>
                                <?php endif; ?>
                                <ul class="l_pdf">
                                <?php endif; ?>
                                <li>
                                    <a href="/public/archivos/rectoria/pdf/<?php echo ((isset($subcontenido[$i]->enlace)) ? $subcontenido[$i]->enlace : ""); ?>" target="_blank">
                                        <?php echo ((isset($subcontenido[$i]->titulo)) ? $subcontenido[$i]->titulo : ""); ?>
                                        No. <?php echo ((isset($grupos[$h - 1]->numero)) ? $grupos[$h - 1]->numero : ""); ?>
                                        (Publicado <?php echo ((isset($subcontenido[$i]->fechapublicado)) ? $subcontenido[$i]->fechapublicado : ""); ?>
                                        )
                                    </a>
                                </li>
                                <?php if ($i + 1 == $numFilas || $subcontenido[$i + 1]->grupo != $grupo) : ?>
                                </ul>
                            <?php endif; ?>
                        <?php else : ?>
                            <hr class="devider devider-dotted">
                            <a href="/public/archivos/rectoria/pdf/<?php echo ((isset($subcontenido[$i]->enlace)) ? $subcontenido[$i]->enlace : ""); ?>" target="_blank"><b>
                                    <?php echo ((isset($subcontenido[$i]->titulo)) ? $subcontenido[$i]->titulo : ""); ?></b>
                            </a>
                        <?php endif; ?>
                    <?php endfor; ?>

                <?php endif; ?>

            </div>

        </div>
        <!--/col-md-8-->
    </div>
    <!--/row-->

    <?php include APPPATH . "views/unoticia/noticias_recientes.php"; ?>

</div>
<!--/container-->
<!--=== End Content Part ===-->