<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Eventos</h1>
        <hr>
        <?php if (!empty($eventos)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Título</strong>
                    </td>
                    <td>
                        <strong>Contenido</strong>
                    </td>
                    <td>
                        <strong>Fecha Publicado</strong>
                    </td>
                    <td>
                        <strong>Fecha Inicio</strong>
                    </td>
                    <td>
                        <strong>Fecha Fin</strong>
                    </td>
                    <td>
                        <strong>Publicar</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($eventos as $evento): ?>
                    <tr class="<?php echo ($evento->publicar == '1') ? 'success' : (($evento->publicar == '0') ? 'warning' : ''); ?>">
                        <td>
                            <?php echo $evento->titulo; ?>
                        </td>
                        <td>
                            <?php echo $evento->contenido; ?>
                        </td>
                        <td>
                            <?php echo $evento->fecha_real; ?>
                        </td>
                        <td>
                            <?php echo $evento->fecha_inicio; ?>
                        </td>
                        <td>
                            <?php echo $evento->fecha_fin; ?>
                        </td>
                        <td>
                            <?php echo $evento->publicar == 1 ? 'Visible' : 'Oculto'; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_evento'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_evento' => $evento->id]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ningún evento.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right" href="<?php echo site_url('administracion/agregar_evento'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Evento
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
