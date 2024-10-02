<?php include APPPATH . "views/useccion/header.php"; ?>  


<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-4">
            <div class="shadow-wrapper">        

                <div class="margin-top-20"><h2 style="color:#AA1916;"><b>Menú de Información</b></h2></div>
                <?php include APPPATH . "views/universidad/menu.php"; ?> 

            </div>
        </div><!--/col-md-3-->
        <div class="col-md-8 mb-margin-bottom-30">
            <div class="margin-bottom-40">
                <?php if (isset($contenido[0][0]->id_contenido)): ?>
                    <div class="headline margin-bottom-30"><h1><?php echo ((isset($contenido[0][0]->nombre_contenido)) ? $contenido[0][0]->nombre_contenido : "-"); ?></h1></div>


                    <?php if (isset($seccion[0]->desc_seccion) && strcmp($contenido[0][0]->nombre_contenido, "Presentación") == 0): ?>
                        <div class="shadow-wrapper">        
                            <blockquote class="tag-box tag-box-v2 shadow-effect-1 margin-bottom-40">
                                <h5><?php echo ((isset($seccion[0]->desc_seccion)) ? $seccion[0]->desc_seccion : "-"); ?></h5>
                            </blockquote>
                        </div>
                    <?php endif; ?>

                    <h5><?php echo ((isset($contenido[0][0]->desc_contenido)) ? $contenido[0][0]->desc_contenido : " "); ?></h5>
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
                                            <td style="text-align: center;"><?php echo ((isset($subcontenido[$i]->nombre_apellido)) ? $subcontenido[$i]->nombre_apellido : ""); ?></td>
                                            <td style="text-align: center;"><?php echo ((isset($subcontenido[$i]->cargo)) ? $subcontenido[$i]->cargo : ""); ?></td>
                                            <td style="text-align: center;"><?php echo ((isset($subcontenido[$i]->correo)) ? $subcontenido[$i]->correo : ""); ?></td>
                                            <td style="text-align: center;"><?php echo ((isset($subcontenido[$i]->extension)) ? $subcontenido[$i]->extension : ""); ?></td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="text-align: center;"><h5><b>Nombres</b></h5></th>
                                <th style="text-align: center;"><h5><b>Cargo</b></h5></th>
                                <th style="text-align: center;"><h5><b>Correo</b></h5></th>
                                <th style="text-align: center;"><h5><b>Ext.</b></h5></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    <?php endif; ?>
                    <!--------------------subcontenido de actos principales normatividad -------------->
                    <?php if (isset($subcontenido[0]->descripcion_documento)): ?>
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
                                    <?php for ($i = 0; $i < $numFilas; $i++): ?>
                                        <tr>
                                            <td><?php echo ((isset($subcontenido[$i]->descripcion_documento)) ? $subcontenido[$i]->descripcion_documento : ""); ?></td>
                                            <td style="text-align: center;"><?php echo ((isset($subcontenido[$i]->fecha_documento)) ? utf8_encode(strftime("%A, %d de %B del %Y", strtotime($subcontenido[$i]->fecha_documento))) : ""); ?></td>
                                            <td style="text-align: center;"><a href="929/<?php echo ((isset($subcontenido[$i]->id_documento)) ? $subcontenido[$i]->id_documento : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Ver Archivo"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                <a href="http://www.ufps.edu.co/ufpsnuevo/archivos/reglamentacion/<?php echo ((isset($subcontenido[$i]->archivo)) ? $subcontenido[$i]->archivo : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Descargar Archivo"><i class="fa fa-cloud-download"></i></a></td>
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

                    <!--------------------documentos anexos para la seccion -------------->
                    <?php if (isset($docanexos[0]->descripcion_documento)): ?>
                        <div class="panel panel-red margin-top-30">
                            <div class="panel-heading panel-red-ins">
                                <h3 class="panel-title"><i class="fa fa-files-o"></i> Documentos Anexos</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Descripción</th>
                                            <th style="text-align: center;">Fecha del Documento</th>
                                            <th style="text-align: center;">Archivo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $numFilas = count($docanexos); ?>
                                        <?php for ($i = 0; $i < $numFilas; $i++): ?>
                                            <tr>
                                                <td><?php echo ((isset($docanexos[$i]->descripcion_documento)) ? $docanexos[$i]->descripcion_documento : ""); ?></td>
                                                <td style="text-align: center;"><?php echo ((isset($docanexos[$i]->fecha_documento)) ? utf8_encode(strftime("%A, %d de %B del %Y", strtotime($docanexos[$i]->fecha_documento))) : ""); ?></td>
                                                <td style="text-align: center;"><a href="929/<?php echo ((isset($docanexos[$i]->id_documento)) ? $docanexos[$i]->id_documento : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Ver Archivo"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                    <a href="http://www.ufps.edu.co/ufpsnuevo/archivos/reglamentacion/<?php echo ((isset($docanexos[$i]->archivo)) ? $docanexos[$i]->archivo : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Descargar Archivo"><i class="fa fa-cloud-download"></i></a></td>
                                            </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>


                <?php endif; ?>
                <!-----------------------Contenido Investigacion -------------------->
                <?php if (isset($contenido[0][0]->id_grupo)): ?>
                    <?php
                    //  header('Location: http://www.commentcamarche.net/forum/');
                    ?>
                    <div class="headline-v2 headline-v2-red-inst">
                        <h3>Grupos de Investigación</h3>
                    </div>

                    <!-- Accordion v1 -->
                    <div class="panel-group acc-v1" id="accordion-2">
                        <?php if (isset($contenido[0]) && count($contenido[0])): ?>
                            <?php $numFilas = count($contenido[0]); ?>
                            <?php for ($i = 0; $i < $numFilas; $i++): ?>
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
                <?php if (isset($contenido[0][0]->publicacion_id)): ?>
                    <div class="headline-v2 headline-v2-red-inst">
                        <h3>Publicaciones <?php echo ((isset($contenido[0][0]->nombre)) ? $contenido[0][0]->nombre : "-"); ?></h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="box-body table-responsive no-padding">
                                <table id="example3" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Portada</th>
                                            <th style="text-align: center;">Volumen</th>
                                            <th style="text-align: center;">Número</th>
                                            <th style="text-align: center;">ISBN</th>
                                            <th style="text-align: center;">Año</th>
                                            <th style="text-align: center;">Archivo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $numFilas = count($contenido[0]); ?>
                                        <?php for ($i = 0; $i < $numFilas; $i++): ?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo ((isset($contenido[0][$i]->imagen)) ? "<img src=http://www.ufps.edu.co/ufpsnuevo/publicaciones/imagen/" . $contenido[0][$i]->imagen . ">" : "-"); ?></td>
                                                <td style="text-align: center;"><?php echo ((isset($contenido[0][$i]->volumen)) ? $contenido[0][$i]->volumen : " "); ?></td>
                                                <td style="text-align: center;"><?php echo ((isset($contenido[0][$i]->numero)) ? $contenido[0][$i]->numero : " "); ?></td>
                                                <td style="text-align: center;"><?php echo ((isset($contenido[0][$i]->isbn)) ? $contenido[0][$i]->isbn : " "); ?></td>
                                                <td style="text-align: center;"><?php echo ((isset($contenido[0][$i]->year)) ? $contenido[0][$i]->year : " "); ?></td>
                                                <td style="text-align: center;"><a href="234/<?php echo ((isset($contenido[0][$i]->archivo)) ? $contenido[0][$i]->archivo : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Ver Archivo"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                    <a href="http://www.ufps.edu.co/ufpsnuevo/publicaciones/archivos/<?php echo ((isset($contenido[0][$i]->archivo)) ? $contenido[0][$i]->archivo : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Descargar Archivo"><i class="fa fa-cloud-download"></i></a></td>

                                            </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th style="text-align: center;">Portada</th>
                                            <th style="text-align: center;">Volumen</th>
                                            <th style="text-align: center;">Número</th>
                                            <th style="text-align: center;">ISBN</th>
                                            <th style="text-align: center;">Año</th>
                                            <th style="text-align: center;">Archivo</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                <?php endif; ?>

                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getLink'): ?>
                    <?php
                    header('Location: ' . $contenido[0]['enlace']);
                    ?>
                <?php endif; ?>

                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getArchivoPdf'): ?>
                    <iframe src="http://docs.google.com/gview?url=<?php echo $contenido[0]['enlace']; ?> &embedded=true" style="width:100%; height:730px;" frameborder="0"></iframe>  
                    <p style="text-align:center;"><h5>Si no puedes visualizar el archivo podrá descargarlo. <b><a href="<?php echo $contenido[0]['enlace']; ?>"  data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Descargar el Archivo">Descargar Archivo</a></b></h5></p>

                <?php endif; ?>




                <?php if (isset($data) && count($data)): ?>
                    <?= form_open('', ['class' => 'sky-form sky-form-not', 'id' => 'form_buscar', 'role' => 'form'], ['buscar' => 1]); ?>

                    <footer>

                        <?php if (isset($documentos) && count($documentos)): ?> 
                            <a href="" class="btn-u margin-bottom-30" role="button"><i class="fa fa-repeat"></i> Nueva Consulta</a>
                        <?php else: ?>
                            <fieldset>
                                <section>
                                    <label class="select state-error" > 
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
                                                    <td style="text-align: center;"><?php echo ((isset($documentos[$i]->nombre_seccion)) ? $documentos[$i]->nombre_seccion : "-"); ?></td>
                                                    <td style="text-align: center;"><?php echo ((isset($documentos[$i]->NombreActo)) ? $documentos[$i]->NombreActo . " No. " . $documentos[$i]->numero_acto : "-"); ?></td>
                                                    <td style="text-align: center;"><?php echo ((isset($documentos[$i]->fecha_documento)) ? utf8_encode(strftime("%A, %d de %B del %Y", strtotime($documentos[$i]->fecha_documento))) : "-"); ?></td>
                                                    <td><?php echo ((isset($documentos[$i]->descripcion_documento)) ? $documentos[$i]->descripcion_documento : "-"); ?></td>
                                                    <td style="text-align: center;"><a href="929/<?php echo ((isset($documentos[$i]->id_documento)) ? $documentos[$i]->id_documento : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Ver Archivo"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                        <a href="http://www.ufps.edu.co/ufpsnuevo/archivos/reglamentacion/<?php echo ((isset($documentos[$i]->archivo)) ? $documentos[$i]->archivo : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Descargar Archivo"><i class="fa fa-cloud-download"></i></a></td>                                       
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
        </div><!--/col-md-8-->
    </div><!--/row-->


</div><!--/container-->
<!--=== End Content Part ===-->






