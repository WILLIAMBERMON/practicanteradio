<?php include APPPATH . "views/useccion/header.php"; ?>  


<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-4">

            <div class="shadow-wrapper">        

                <div class="margin-top-20"><h2 style="color:#AA1916;"><b>Menú de Información</b></h2></div>
                <?php include APPPATH . "views/universidad/menu_normatividad.php"; ?> 

            </div>
        </div><!--/col-md-3-->
        <div class="col-md-8 mb-margin-bottom-30">
            <?php if(!empty($contenido[0][0]->fecha_actualizacion_contenido)): ?>
            <small class="pull-right" style="color:#aa1916;"><i
                    class="fa fa-calendar"></i> <?php setlocale(LC_ALL, "Spanish_Colombia"); ?>
                <?php echo utf8_encode(strftime("%A", strtotime($contenido[0][0]->fecha_actualizacion_contenido))); ?>
                ,
                <?php echo strftime("%d", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?>
                <?php echo strftime("%B", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?>
                <?php echo strftime("%Y", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?></small>
            <?php endif; ?>
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
                                            <td style="text-align: center;"><a href="normatividad/929/<?php echo ((isset($subcontenido[$i]->id_documento)) ? $subcontenido[$i]->id_documento : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Ver Archivo" target="_blank"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                <a href="<?php echo RUTA_REGLAMENTACION; ?>/<?php echo ((isset($subcontenido[$i]->archivo)) ? $subcontenido[$i]->archivo : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Descargar Archivo" target="_blank"><i class="fa fa-cloud-download"></i></a></td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
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
                                                <td style="text-align: center;"><a href="normatividad/929/<?php echo ((isset($docanexos[$i]->id_documento)) ? $docanexos[$i]->id_documento : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Ver Archivo" target="_blank"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                    <a href="<?php echo RUTA_REGLAMENTACION; ?>/<?php echo ((isset($docanexos[$i]->archivo)) ? $docanexos[$i]->archivo : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Descargar Archivo" target="_blank"><i class="fa fa-cloud-download"></i></a></td>
                                            </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>


                <?php endif; ?>

                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getLink'): ?>
                    <?php
                    header('Location: ' . $contenido[0]['enlace']);
                    ?>
                <?php endif; ?>


                <!----------------------- Visualizar el documento de reglamentación ----------------->
                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getArchivoPdfRegla'): ?>
                    <iframe src="https://docs.google.com/gview?url=<?php echo $contenido[0]['enlace']; ?> &embedded=true" style="width:100%; height:730px;" frameborder="0"></iframe>
                    <p style="text-align:center;"><h5>Si no puede visualizar el archivo podrá descargarlo. <b><a href="<?php echo $contenido[0]['enlace']; ?>"  data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Descargar el Archivo" target="_blank">Descargar Archivo</a></b></h5></p>
                <?php endif; ?>

                <!----------------------- Visualizar el documento de la Sesión --------------------->
                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getArchivoPdf'): ?>
                    <iframe src="https://docs.google.com/gview?url=<?php echo $contenido[0]['enlace']; ?> &embedded=true" style="width:100%; height:730px;" frameborder="0"></iframe>
                    <p style="text-align:center;"><h5>Si no puede visualizar el archivo podrá descargarlo. <b><a href="<?php echo $contenido[0]['enlace']; ?>"  data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Descargar el Archivo" target="_blank">Descargar Archivo</a></b></h5></p>
                <?php endif; ?>




                <?php if (isset($data) && count($data)): ?>
                    <?php echo form_open('', ['class' => 'sky-form sky-form-not', 'id' => 'form_buscar', 'role' => 'form'], ['buscar' => 1]); ?>

                    <footer>

                        <?php if (isset($documentos)): ?>
                            <a href="" class="btn-u margin-bottom-30" role="button"><i class="fa fa-repeat"></i> Nueva Consulta</a>
                        <?php else: ?>
                            <fieldset>
                                <section>
                                    <label class="select state-error" > 
                                        <?php echo form_dropdown($name = 'txtEnt', $Options = $data, array($this->input->post('txtEnt')), 'onChange="getActo()"', 'selected="selected"'); ?>
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
                        <?php form_close(); ?>
                    <?php endif; ?>

                    <!-----------------------Documentos Normatividad -------------------->
                    <?php if (isset($documentos) && count($documentos)): ?>
                        <div class="row fadeInUp animated margin-top-40">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="box-body table-responsive">
                                    <table id="example4" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Entidad</th>
                                                <th style="display:none" style="text-align: center;">Acto</th>
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
                                                    <td style="display:none" style="text-align: center;"><?php echo $documentos[$i]->numero_acto; ?></td>
                                                    <td style="text-align: center;"><?php echo ((isset($documentos[$i]->NombreActo)) ? $documentos[$i]->NombreActo . " No. " . $documentos[$i]->numero_acto : "-"); ?></td>
                                                    <td style="text-align: center;"><?php echo ((isset($documentos[$i]->fecha_documento)) ? utf8_encode(strftime("%A, %d de %B del %Y", strtotime($documentos[$i]->fecha_documento))) : "-"); ?></td>
                                                    <td><?php echo ((isset($documentos[$i]->descripcion_documento)) ? $documentos[$i]->descripcion_documento : "-"); ?></td>
                                                    <td style="text-align: center;"><a href="929/<?php echo ((isset($documentos[$i]->id_documento)) ? $documentos[$i]->id_documento : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Ver Archivo" target="_blank"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                        <a href="<?php echo RUTA_REGLAMENTACION; ?>/<?php echo ((isset($documentos[$i]->archivo)) ? $documentos[$i]->archivo : ""); ?>" class="hover tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Descargar Archivo" target="_blank"><i class="fa fa-cloud-download"></i></a></td>
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


</div><!--/container-->
<!--=== End Content Part ===-->






