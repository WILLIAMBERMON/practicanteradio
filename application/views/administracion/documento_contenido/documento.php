<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h2 class="text-justify">Administración de Documentos del Contenido</h2>
        <hr>
        <?php if (!empty($documentos)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Id</strong>
                    </td>
                    <td>
                        <strong>Descripción</strong>
                    </td>
                    <td>
                        <strong>Fecha del Documento</strong>
                    </td>
                    <td>
                        <strong>Archivo</strong>
                    </td>
                    <td>
                        <strong>Orden</strong>
                    </td>
                    <td>
                        <strong>Publicar</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($documentos as $documento): ?>
                    <tr class="<?php echo ($documento->publicar == '1') ? 'success' : (($documento->publicar == '0') ? 'warning' : ''); ?>">
                        <td>
                            <?php echo $documento->id_documento; ?>
                        </td>
                        <td>
                            <?php echo $documento->descripcion_documento; ?>
                        </td>
                        <td>
                            <?php echo $documento->fecha_documento; ?>
                        </td>
                        <td>
                            <?php echo $documento->archivo; ?>
                        </td>
                        <td>
                            <?php echo $documento->orden; ?>
                        </td>
                        <td>
                            <?php echo $documento->publicar == 1 ? 'Visible' : 'Oculto'; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_documento_contenido'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_documento' => $documento->id_documento]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ningun documento.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin' or $userdata->rol == 'contratacion' or $userdata->rol == 'radio'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right" href="<?= site_url('administracion/documento_contenido_titulo'); ?>"
                   style="margin-left:10px;">
                    <i class="fa fa-backward"></i> Regresar
                </a>
                <a class="btn btn-primary pull-right"
                   href="<?php echo site_url('administracion/agregar_documento_contenido'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Documento
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>
