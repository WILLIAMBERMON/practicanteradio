<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Actividades de la Convocatoria</h1>
        <hr>
        <?php if (!empty($actividades)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Id Actividad</strong>
                    </td>
                    <td>
                        <strong>Descripción</strong>
                    </td>
                    <td>
                        <strong>Id Convocatoria</strong>
                    </td>
                    <td>
                        <strong>Fecha Publicado</strong>
                    </td>
                    <td>
                        <strong>Fecha Realización</strong>
                    </td>
                    <td>
                        <strong>Publicar</strong>
                    </td>
                    <td>
                        <strong>Orden</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($actividades as $actividad): ?>
                    <tr class="<?php echo ($actividad->publicar == '1') ? 'success' : (($actividad->publicar == '0') ? 'warning' : ''); ?>">
                        <td>
                            <?php echo $actividad->id_actividad; ?>
                        </td>
                        <td>
                            <?php echo $actividad->descripcion; ?>
                        </td>
                        <td>
                            <?php echo $actividad->id_convocatoria; ?>
                        </td>
                        <td>
                            <?php echo $actividad->fecha_publicado; ?>
                        </td>
                        <td>
                            <?php echo $actividad->fecha_realizacion; ?>
                        </td>
                        <td>
                            <?php echo $actividad->publicar == 1 ? 'Visible' : 'Oculto'; ?>
                        </td>
                        <td>
                            <?php echo $actividad->orden; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_actividad'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_actividad' => $actividad->id_actividad]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ninguna actividad de la convocatoria.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/convocatoria'); ?>"
                   style="margin-left:10px;">
                    <i class="fa fa-backward"></i> Regresar
                </a>
                <a class="btn btn-primary pull-right" href="<?php echo site_url('administracion/agregar_actividad'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Actividad
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
