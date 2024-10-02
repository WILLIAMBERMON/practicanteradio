<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>
    <div class="col-md-9">
        <h1 class="text-justify">Administración de Boletín Enlace UFPS</h1>
        <hr>
        <div id="alert_mensaje"></div>
        <?php if (!empty($editoriales)) : ?>
        <div class="table-responsive">
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <td>
                            <strong>Id</strong>
                        </td>
                        <td>
                            <strong>Nombre</strong>
                        </td>
                        <td>
                            <strong>Edición</strong>
                        </td>
                        <td>
                            <strong>Año</strong>
                        </td>
                        <td>
                            <strong>Estado</strong>
                        </td>
                        <td>
                            <strong>Fecha</strong>
                        </td>
                        <!--
                            <td>
                                <strong>Encabezado</strong>
                            </td>
                            <td>
                                <strong>Pie</strong>
                            </td>
                            -->
                        <td>
                            <strong>Acciones</strong>
                        </td>
                    </tr>
                </thead>
                <?php foreach ($editoriales as $editorial) : ?>
                <tr class="<?php echo ($editorial->ESTADO == '1') ? 'success' : (($editorial->ESTADO == '0') ? 'warning' : ''); ?>">
                    <td>
                        <?php echo $editorial->ID; ?>
                    </td>
                    <td>
                        <?php echo $editorial->NOMBRE; ?>
                    </td>
                    <td>
                        <?php echo $editorial->EDICION; ?>
                    </td>
                    <td>
                        <?php echo $editorial->ANYO; ?>
                    </td>
                    <td>
                        <?php echo $editorial->ESTADO == 1 ? 'Visible' : 'Oculto'; ?>
                    </td>
                    <td>
                        <?php echo $editorial->FECHA; ?>
                    </td>
                    <!--
                        <td>
                            <img class="img-responsive" src="<?php //echo $editorial->RUTA_ENCABEZADO; ?>" alt="">
                        </td>
                        <td>
                            <img class="img-responsive" src="<?php //echo $editorial->RUTA_PIE; ?>" alt="">
                        </td>
                        -->
                    <td style="display: ruby-text;">
                        <?php echo form_open(site_url('administracion/contenido_enlace_informativo'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_boletin' => $editorial->ID]); ?>
                        <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow tooltip_datatable" type="submit" data-toggle="tooltip" data-placement="top" data-original-title="Ver Noticias">
                        <i class="fa fa-folder-open"></i></button>
                        <?php echo form_close(); ?>
                        <?php echo form_open(site_url('administracion/editar_enlace_informativo'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_boletin' => $editorial->ID]); ?>
                        <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow tooltip_datatable" type="submit" data-toggle="tooltip" data-placement="top" data-original-title="Editar Boletin">
                        <i class="fa fa-pencil-square-o"></i></button>
                        <?php echo form_close(); ?>
                        <button onclick="cargarModal('<?php echo $editorial->ID; ?>')" style="padding: 0px;" class="btn btn-link btn-lg hvr-grow tooltip_datatable" type="button" data-toggle="tooltip" data-placement="top" data-original-title="Visualizar Boletin" >
                        <i class="fa fa-search-plus"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php else : ?>
        <p>Aun no ha registrado ningún Boletín.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin') : ?>
        <div class="clearfix margin-bottom-30">
            <hr>
            <a class="btn btn-primary pull-right" href="<?php echo site_url('administracion/agregar_enlace_informativo'); ?>">
            <i class="fa fa-plus-circle"></i> Añadir Boletín
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- Modal de Previsualización del Boletín -->
<div id="modal_visualizar_boletin" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="nombre_boletin">Boletin Edición 30</h4>
      </div>
      <div class="modal-body">
        <div class="clearfix">
            <div id="contenido_boletin"></div>
            
        </div>
      </div>
      <div class="modal-footer">
        <div class="clearfix">
            <input type="text" id="email_boletin" size="50" placeholder="Ingrese el correo electrónico para recibir el boletín" class="form-group" />
            <button type="button" id="enviar_correo" class="btn btn-success form-group" >
                <i class="fa fa-paper-plane"></i> Enviar Boletín
            </button>
            <button type="button" class="btn btn-info pull-right" data-dismiss="modal">Cerrar</button>
        </div>
        <div id="alert_correo"></div>
      </div>
    </div>

  </div>
</div>

<button type="button" class="btn btn-default tooltip" data-toggle="tooltip" data-placement="top" id="right" title="" data-original-title="Tooltip on right">Tooltip on right</button>

<button type="button" data-toggle="tooltip" id="left" class="btn btn-default">Tooltip on left</button>
