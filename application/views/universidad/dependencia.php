<?php include APPPATH . "views/universidad/header.php"; ?>


<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-4">

            <div class="shadow-wrapper">

                <div class="margin-top-20">
                    <h2 style="color:#AA1916;"><b>Menú de Información</b></h2>
                </div>
                <?php include APPPATH . "views/universidad/menu_dependencia.php"; ?>

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
            <div class="margin-bottom-40">
                <?php if (isset($seccion[0]->desc_seccion) && $present) : ?>
                    <div class="shadow-wrapper margin-top-30">
                        <blockquote class="tag-box tag-box-v4 margin-bottom-40">
                            <h5><?php echo ((isset($seccion[0]->desc_seccion)) ? $seccion[0]->desc_seccion : "-"); ?></h5>
                        </blockquote>
                    </div>
                <?php endif; ?>

                <?php if (isset($contenido[0][0]->id_contenido)) : ?>
                    <div class="headline margin-bottom-30">
                        <h1><?php echo ((isset($contenido[0][0]->nombre_contenido)) ? $contenido[0][0]->nombre_contenido : "-"); ?></h1>
                    </div>

                    <?php if (isset($seccion[0]->desc_seccion) && strcmp($contenido[0][0]->nombre_contenido, "Presentación") == 0) : ?>
                        <div class="shadow-wrapper">
                            <blockquote class="tag-box tag-box-v4 margin-bottom-40">
                                <h5><?php echo ((isset($seccion[0]->desc_seccion)) ? $seccion[0]->desc_seccion : "-"); ?></h5>
                            </blockquote>
                        </div>
                    <?php endif; ?>

                    <h5><?php echo ((isset($contenido[0][0]->desc_contenido)) ? $contenido[0][0]->desc_contenido : " "); ?></h5>
                    <!---------------------- subcontenido de la tabla de equipo de trabajo ----------->
                    <?php if (isset($subcontenido[0]->id_etrabajo)) : ?>
                        <div class="box-body table-responsive no-padding">
                            <table id="table_etrabajo" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">
                                            <h5><b>Nombres</b></h5>
                                        </th>
                                        <th style="text-align: center;">
                                            <h5><b>Cargo</b></h5>
                                        </th>
                                        <th style="text-align: center;">
                                            <h5><b>Correo</b></h5>
                                        </th>
                                        <th style="text-align: center;">
                                            <h5><b>Ext.</b></h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $numFilas = count($subcontenido); ?>
                                    <?php for ($i = 0; $i < $numFilas; $i++) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo ((isset($subcontenido[$i]->nombre_apellido)) ? $subcontenido[$i]->nombre_apellido : ""); ?></td>
                                            <td style="text-align: center;"><?php echo ((isset($subcontenido[$i]->cargo)) ? $subcontenido[$i]->cargo : ""); ?></td>
                                            <td style="text-align: center;"><?php echo ((isset($subcontenido[$i]->correo)) ? $subcontenido[$i]->correo : ""); ?></td>
                                            <td style="text-align: center;"><?php echo ((isset($subcontenido[$i]->extension)) ? $subcontenido[$i]->extension : ""); ?></td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
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
                                            <th style="text-align: center;">Fecha de Publicación</th>
                                            <th style="text-align: center;">Archivo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($documentosc as $documento) : ?>
                                            <?php if ($documento->id_titulo == $titulos_doc[$i]->id_titulo) : ?>
                                                <tr>
                                                    <td><?php echo ((isset($documento->descripcion_documento)) ? $documento->descripcion_documento : ""); ?></td>
                                                    <td style="text-align: center;"><?php echo ((isset($documento->fecha_documento)) ? utf8_encode(strftime("%A, %d de %B del %Y", strtotime($documento->fecha_documento))) : ""); ?></td>
                                                    <td style="text-align: center;"><a href="/<?php echo PATH_PDF_DOCUMENTO_CONTENIDO_DOC; ?><?php echo ((isset($documento->archivo)) ? $documento->archivo : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Descargar Archivo" target="_blank">
                                                            <?php if ((strpos($documento->archivo, ".pdf")) || (strpos($documento->archivo, ".PDF"))) : ?>
                                                                <i class="icon-custom icon-sm rounded icon-color-red fa fa-file-pdf-o" aria-hidden="true"></i>
                                                            <?php elseif ((strpos($documento->archivo, ".doc")) || (strpos($documento->archivo, ".docx"))) : ?>
                                                                <i class="icon-custom icon-sm rounded icon-color-red fa fa-file-word-o" aria-hidden="true"></i>
                                                            <?php elseif ((strpos($documento->archivo, ".xlsx")) || (strpos($documento->archivo, ".xls"))) : ?>
                                                                <i class="icon-custom icon-sm rounded icon-color-red fa fa-file-excel-o" aria-hidden="true"></i>
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
                    <!--------------------subcontenido de actos principales normatividad -------------->
                    <?php if (isset($subcontenido[0]->descripcion_documento)) : ?>
                        <div class="box-body table-responsive no-padding margin-top-300">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Descripción</th>
                                        <th style="text-align: center;">Fecha del Documento</th>
                                        <th style="text-align: center;">Archivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $numFilas = count($subcontenido); ?>
                                    <?php for ($i = 0; $i < $numFilas; $i++) : ?>
                                        <tr>
                                            <td><?php echo ((isset($subcontenido[$i]->descripcion_documento)) ? $subcontenido[$i]->descripcion_documento : ""); ?></td>
                                            <td style="text-align: center;"><?php echo ((isset($subcontenido[$i]->fecha_documento)) ? utf8_encode(strftime("%A, %d de %B del %Y", strtotime($subcontenido[$i]->fecha_documento))) : ""); ?></td>
                                            <td style="text-align: center;"><a href="929/<?php echo ((isset($subcontenido[$i]->id_documento)) ? $subcontenido[$i]->id_documento : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Ver Archivo"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                <a href="<?php echo RUTA_REGLAMENTACION; ?><?php echo ((isset($subcontenido[$i]->archivo)) ? $subcontenido[$i]->archivo : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Descargar Archivo"><i class="fa fa-cloud-download"></i></a>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="text-align: center;">Descripción</th>
                                        <th style="text-align: center;">Fecha del Documento</th>
                                        <th style="text-align: center;">Archivo</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    <?php endif; ?>

                <?php endif; ?>
                <!-----------------------Contenido Investigacion -------------------->
                <?php if (isset($contenido[0][0]->id_grupo)) : ?>
                    <?php
                    //  header('Location: http://www.commentcamarche.net/forum/');
                    ?>
                    <div class="headline-v2 headline-v2-red-inst">
                        <h3>Grupos de Investigación</h3>
                    </div>

                    <!-- Accordion v1 -->
                    <div class="panel-group acc-v1" id="accordion-2">
                        <?php if (isset($contenido[0]) && count($contenido[0])) : ?>
                            <?php $numFilas = count($contenido[0]); ?>
                            <?php for ($i = 0; $i < $numFilas; $i++) : ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><b>
                                                <a class="accordion-toggle menu-acordeon" data-toggle="collapse" data-parent="#accordion-2" href="#collapse-<?php echo ((isset($contenido[0][$i]->id_grupo)) ? $contenido[0][$i]->id_grupo : "-"); ?>">
                                                    <span aria-hidden="true" class="icon-users"></span> <?php echo ((isset($contenido[0][$i]->nombre)) ? $contenido[0][$i]->nombre : "-"); ?>
                                                </a></b>
                                        </h4>
                                    </div>
                                    <div id="collapse-<?php echo ((isset($contenido[0][$i]->id_grupo)) ? $contenido[0][$i]->id_grupo : "-"); ?>" class="panel-collapse collapse <?php echo ((($i == 0)) ? "in" : " "); ?>">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6><?php echo ((strlen($contenido[0][$i]->director) != 0) ? "<b>Director:</b> " . $contenido[0][$i]->director : " "); ?></h6>
                                                    <h6><?php echo ((strlen($contenido[0][$i]->departamento) != 0) ? "<b>Departamento:</b> " . $contenido[0][$i]->departamento : " "); ?></h6>
                                                    <h6><?php echo ((strlen($contenido[0][$i]->correo) != 0) ? "<b>Correo:</b> " . $contenido[0][$i]->correo : " "); ?></h6>
                                                    <h6><?php echo ((strlen($contenido[0][$i]->linea) != 0) ? "<b>Linea:</b> " . $contenido[0][$i]->linea : " "); ?></h6>
                                                    <h6><?php echo ((strlen($contenido[0][$i]->enlace) != 0) ? "<b>Enlace Web:</b> <a href=" . $contenido[0][$i]->enlace . ">Entrar</a>" : " "); ?></h6>
                                                    <h6><?php echo ((strlen($contenido[0][$i]->estatus) != 0) ? "<b>Estatus:</b> " . $contenido[0][$i]->estatus : " "); ?></h6>
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
                                        <h4><?php echo ((isset($contenido[0][$i]->nombre)) ? $contenido[0][$i]->nombre : " "); ?></h4>
                                        <span class="thumb-product-type"><?php echo ((isset($contenido[0][$i]->edicion)) ? 'Edición: ' . $contenido[0][$i]->edicion : " "); ?></span>
                                        <span class="thumb-product-type"><?php echo ((isset($contenido[0][$i]->year)) ? 'Año: ' . $contenido[0][$i]->year : " "); ?></span>

                                    </div>
                                    <ul class="list-inline overflow-h">
                                        <li class="thumb-product-purchase">
                                            <a href="<?php echo ((isset($contenido[0][$i]->archivo)) ? base_url("/public/imagenes/publicaciones") . '/' . $contenido[0][$i]->imagen : "-"); ?>" rel="gallery" class="fancybox img-hover-v2" title="Publicaciones">
                                                <span><i class="fa fa-eye"></i></span>
                                            </a> |
                                            <?php if (strpos($contenido[0][$i]->archivo, 'pdf') !== false) : ?>
                                                <a href="<?php echo ((isset($contenido[0][$i]->archivo)) ? base_url("/public/archivos/publicaciones") . '/' . $contenido[0][$i]->archivo : "-"); ?>" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a>
                                            <?php else : ?>
                                                <a href="<?php echo ((isset($contenido[0][$i]->archivo)) ? base_url("/public/imagenes/publicaciones") . '/' . $contenido[0][$i]->archivo : "-"); ?>" target="_blank"><span><i class="fa fa fa-picture-o"></i></span></a>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <!--/end row-->
                <?php endif; ?>


                <!----------------------- Imagen con mapeo de posiciones -------------------->
                <!--                <img src="http://www.profesordeinformatica.com/images/mapa.gif" border="0" width="250" height="250" usemap="#mapa" class="img-responsive center-block">-->
                <!--                <map name="mapa">-->
                <!--                    <area href="cuadrado.html" shape="rect" coords="18,124,111,219">-->
                <!--                    <area href="circulo.html"  shape="circle" coords="128,60,50">-->
                <!--                    <area href="triangulo.html" shape="poly" coords="139,200, 193,110, 236,199">-->
                <!--                </map>-->

                <!--                <img src="http://localhost:10003/public/imagenes/powerpuff-girls.fw.jpg" usemap="#powerpuffgirls" alt="" >-->
                <!--                <map name="powerpuffgirls">-->
                <!--                    <area shape="poly" coords="122,36,281,36,285,37,287,39,289,42,289,46,289,48,278,77,276,81,274,84,271,84,218,84,218,90,210,90,208,95,207,99,204,100,72,100,26,87,23,84,20,81,19,75,35,40,37,37,43,34,62,34,65,30,68,25,72,25,115,25,119,27,121,30,122,36,122,36" href="#ppg" title="The Powerpuff Girls" alt="The Powerpuff Girls">-->
                <!--                    <area shape="poly" coords="864,667,912,649,922,667,971,667,973,718,981,721,985,729,988,730,1010,730,1010,742,833,742,833,730,865,730,865,721,874,721,874,718,864,667,864,667" href="#cn" title="Cartoon Network" alt="Cartoon Network">-->
                <!--                    <area shape="poly" coords="1010,297,995,281,979,267,962,255,944,248,927,242,909,237,876,236,857,237,838,240,817,246,797,255,778,266,761,281,746,299,735,321,730,335,728,345,726,348,721,348,709,344,711,360,718,378,708,380,697,388,688,397,685,403,685,411,686,418,691,424,698,429,707,430,735,426,743,427,752,433,762,444,774,454,798,469,787,483,779,481,772,481,761,486,753,495,747,505,746,516,746,520,748,526,751,532,759,538,741,561,734,571,732,583,733,591,737,598,744,604,754,607,765,604,776,597,797,570,817,543,857,487,865,487,893,487,910,484,924,483,930,483,935,484,939,490,934,496,931,501,929,505,932,514,938,519,945,522,954,523,966,520,979,516,985,511,989,507,993,499,994,493,991,484,986,475,967,463,982,454,998,439,1013,424,1024,409,1024,329,1017,312,1010,297,1010,297" href="#buttercup" title="Buttercup" alt="Buttercup">-->
                <!--                    <area shape="poly" coords="571,100,563,83,562,66,549,80,541,96,537,112,536,127,537,141,531,141,508,141,508,141,511,133,517,126,533,114,500,111,476,111,452,114,438,118,424,124,410,130,400,139,392,151,390,166,391,174,394,183,400,190,409,198,391,215,379,234,371,252,368,270,367,276,368,297,371,315,381,338,396,357,414,375,399,378,387,385,379,393,377,405,378,412,382,418,388,424,395,429,411,433,425,435,431,445,439,456,459,474,480,487,502,499,514,507,523,514,528,523,530,534,529,541,526,547,515,562,532,556,548,547,562,535,574,523,583,508,590,490,594,469,596,448,596,430,591,409,587,397,599,390,613,381,628,371,643,356,657,336,666,312,669,299,670,284,669,276,668,264,670,263,697,263,704,261,711,257,716,251,719,243,718,236,715,231,706,221,694,215,683,213,677,213,670,215,664,219,656,231,645,215,652,206,657,198,660,190,662,181,660,169,655,157,648,150,638,142,617,130,596,120,582,112,571,100,571,100" href="#blossom" title="Blossom" alt="Blossom">-->
                <!--                    <area shape="poly" coords="254,285,232,270,207,260,179,254,150,252,119,254,103,257,88,263,71,270,61,275,58,273,57,273,45,269,36,267,17,270,7,276,1,282,0,282,0,285,0,290,0,351,2,354,1,354,1,390,3,400,5,409,9,420,22,441,39,460,58,475,47,480,38,487,32,493,30,504,33,514,41,523,53,531,69,534,77,532,85,529,90,525,93,517,91,511,88,508,85,505,85,502,86,499,89,496,97,496,120,499,138,502,154,502,167,502,185,531,215,576,235,609,241,616,248,622,255,625,265,628,273,625,280,621,285,613,287,604,283,592,276,580,261,558,269,553,273,547,276,541,277,535,274,523,267,513,257,504,250,501,244,501,240,502,237,502,225,487,242,478,259,468,276,451,282,447,292,445,318,450,327,448,334,445,339,439,341,430,337,418,329,409,318,400,307,397,301,397,301,393,301,391,303,391,321,393,336,391,352,387,370,380,387,369,373,368,364,363,358,360,353,354,350,347,347,330,345,312,343,302,340,293,336,285,331,279,318,272,305,267,293,266,282,267,272,270,262,276,254,285,254,285" href="#bubbles" title="Bubbles" alt="Bubbles">-->
                <!--                    <area href="triangulo.html" shape="rect" coords="600,0,700,120">-->
                <!--                </map>-->
                <!--                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
                <!--                <script>-->
                <!--                    $(document).ready(function(e) {-->
                <!--                        $('img[usemap]').rwdImageMaps();-->
                <!--                    });-->
                <!--                </script>-->


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
                <!----------------------- Visualizar el documento de reglamentación ----------------->
                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getArchivoPdfRegla') : ?>
                    <iframe src="https://docs.google.com/gview?url=<?php echo $contenido[0]['enlace']; ?> &embedded=true" style="width:100%; height:730px;" frameborder="0"></iframe>
                    <p style="text-align:center;">
                    <h5>Si no puede visualizar el archivo podrá descargarlo. <b><a href="<?php echo $contenido[0]['enlace']; ?>" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Descargar el Archivo" target="_blank">Descargar Archivo</a></b></h5>
                    </p>
                <?php endif; ?>

                <!----------------------- Visualizar el documento de la Sesión --------------------->
                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getArchivoPdf') : ?>
                    <iframe src="https://docs.google.com/gview?url=<?php echo $contenido[0]['enlace']; ?> &embedded=true" style="width:100%; height:730px;" frameborder="0"></iframe>
                    <p style="text-align:center;">
                    <h5>Si no puede visualizar el archivo podrá descargarlo. <b><a href="<?php echo $contenido[0]['enlace']; ?>" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Descargar el Archivo" target="_blank">Descargar Archivo</a></b></h5>
                    </p>

                    <?php $planeacion = base_url("/public/archivos/oferta_academica/6ab71258aeb94ca5dbeffc8048634642.pdf"); ?>
                    <p>
                        <?php if ($contenido[0]['enlace'] == $planeacion) : ?>
                    <h5>Descripción de la naturaleza y funciones de cada dependencia del organigrama:
                        <b>
                            <a href="<?php echo base_url("/universidad/normatividad/929/655"); ?>" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Ver Aquí" target="_blank">Ver Aquí</a>
                        </b>
                    </h5>
                <?php endif; ?>
                </p>
            <?php endif; ?>

            <?php if (isset($data) && count($data)) : ?>
                <?= form_open('', ['class' => 'sky-form sky-form-not', 'id' => 'form_buscar', 'role' => 'form'], ['buscar' => 1]); ?>

                <footer>

                    <?php if (isset($documentos) && count($documentos)) : ?>
                        <a href="" class="btn-u margin-bottom-30" role="button"><i class="fa fa-repeat"></i> Nueva Consulta</a>
                    <?php else : ?>
                        <fieldset>
                            <section>
                                <label class="select state-error">
                                    <?= form_dropdown($name = 'txtEnt', $Options = $data, array($this->input->post('txtEnt')), 'onChange="getActo()"', 'selected="selected"'); ?>
                                    <i></i>
                                </label>
                            </section>
                            <section>
                                <label class="select actos"></label>
                            </section>
                            <section>
                                <label class="select anyo"></label>
                            </section>
                        </fieldset>
                        <footer>
                            <button type="submit" class="btn-u"><i class="fa fa-search"></i> Consultar</button>
                        </footer>
                    <?php endif; ?>




                    <?= form_close(); ?>
                <?php endif; ?>

                <!-----------------------Documentos Normatividad -------------------->
                <?php if (isset($documentos) && count($documentos)) : ?>
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
                                        <?php for ($i = 0; $i < $numFilas; $i++) : ?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo ((isset($documentos[$i]->nombre_seccion)) ? $documentos[$i]->nombre_seccion : "-"); ?></td>
                                                <td style="text-align: center;"><?php echo ((isset($documentos[$i]->NombreActo)) ? $documentos[$i]->NombreActo . " No. " . $documentos[$i]->numero_acto : "-"); ?></td>
                                                <td style="text-align: center;"><?php echo ((isset($documentos[$i]->fecha_documento)) ? utf8_encode(strftime("%A, %d de %B del %Y", strtotime($documentos[$i]->fecha_documento))) : "-"); ?></td>
                                                <td><?php echo ((isset($documentos[$i]->descripcion_documento)) ? $documentos[$i]->descripcion_documento : "-"); ?></td>
                                                <td style="text-align: center;"><a href="doc/<?php echo ((isset($documentos[$i]->id_documento)) ? $documentos[$i]->id_documento : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Ver Archivo"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                    <a href="<?php echo RUTA_REGLAMENTACION; ?>/<?php echo ((isset($documentos[$i]->archivo)) ? $documentos[$i]->archivo : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Descargar Archivo" target="_blank"><i class="fa fa-cloud-download"></i></a>
                                                </td>
                                            </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th style="text-align: center;">Entidad</th>
                                            <th style="text-align: center;">Acto</th>
                                            <th style="text-align: center;">Fecha del Documento</th>
                                            <th style="text-align: center;">Descripción</th>
                                            <th style="text-align: center;">Archivo</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->

                        </div><!-- /.col -->
                    </div><!-- /.row -->
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