<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>
    <div class="col-md-9 table-responsive">
        <h1 class="text-justify">Administración de Secciones</h1>
        <hr>
        <?php if (!empty($secciones)): ?>
        <table id="table_datatable" class="table table-striped table-hover table-bordered text-center" style="width: 100%;">
            <thead>
                <tr>
                    <td>
                        <strong>Nombre</strong>
                    </td>
                    <td>
                        <strong>Descripción</strong>
                    </td>
                    <td>
                        <strong>Fecha</strong>
                    </td>
                    <td>
                        <strong>Estado</strong>
                    </td>
                    <td>
                        <strong>Menú</strong>
                    </td>
                    <td>
                        <strong>Contenido</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                    <td>
                        <strong>Eliminar</strong>
                    </td>
                </tr>
            </thead>
            <?php foreach ($secciones as $seccion): ?>
            <tr class="<?php echo ($seccion->publicar == '1') ? 'success' : (($seccion->publicar == '0') ? 'warning' : ''); ?>">
                <td>
                    <?php echo $seccion->nombre_seccion; ?>
                </td>
                <td>
                    <?php echo $seccion->desc_seccion; ?>
                </td>
                <td>
                    <?php echo $seccion->fecha_actualizacion_seccion; ?>
                </td>
                <td>
                    <?php echo $seccion->publicar == 1 ? 'Visible' : 'Oculto'; ?>
                </td>
                <td>
                    <?php echo form_open(site_url('administracion/menu'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_seccion' => $seccion->id_seccion]); ?>
                    <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                    <i class="fa fa-bars"></i></button>
                    <?php echo form_close(); ?>
                </td>
                <td>
                    <?php echo form_open(site_url('administracion/contenido'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_seccion' => $seccion->id_seccion]); ?>
                    <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                    <i class="fa fa-folder-open"></i></button>
                    <?php echo form_close(); ?>
                </td>
                <td>
                    <?php echo form_open(site_url('administracion/editar_seccion'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_seccion' => $seccion->id_seccion]); ?>
                    <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                    <i class="fa fa-pencil-square-o"></i></button>
                    <?php echo form_close(); ?>
                </td>
                <td>
                    <?php //echo form_open(site_url('administracion/borrar_seccion'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_seccion' => $seccion->id_seccion]); ?>
                    <!--
                    <a style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" data-toggle="modal"
                        data-target="#myModalBorrarDocumento<?php //echo $seccion->id_seccion;?>">
                    <i class="fa fa-trash"></i>
                    </a>
                    -->
                    <a style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" 
                        onclick="validar_seccion('<?php echo $seccion->id_seccion;?>')">
                    <i class="fa fa-trash"></i>
                    </a>
                    <?php //echo form_close(); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
        <p>Aun no ha registrado ninguna sección.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin' ||  $userdata->rol == 'radio'): ?>
        <div class="clearfix margin-bottom-30">
            <hr>
            <a class="btn btn-primary pull-right" href="<?php echo site_url('administracion/agregar_seccion'); ?>">
            <i class="fa fa-plus-circle"></i> Añadir Sección
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade modal-warning" id="myModalBorrarSeccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="font-size: 25px;">
                    <i class="fa fa-exclamation-triangle"></i> Advertencia
                </h4>
            </div>
            <div class="modal-body">
                <p class="text-justify" style="font-size: 15px;">
                    <b>¿Está seguro de borrar la sección seleccionada?</b> Puede eliminar manualmente cada registro relacionado con la sección en la siguiente tabla, o si desea eliminar todos los registros de una sola vez por favor use el botón Borrar Sección
                </p>
                <div class="table-responsive">
                    <table id="tabla_validar_seccion" class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Descripción</th>
                                <th>Cantidad Registros</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">
                Cerrar
                </button>
                <button type="button" class="btn btn-warning pull-right" id="button_delete_seccion" name="button_delete_seccion">
                <i class="fa fa-trash"></i> Borrar Sección
                </button>
            </div>
        </div>
    </div>
</div>
