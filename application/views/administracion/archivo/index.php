<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Archivos</h1>
        <hr>
        <?php if (!empty($archivos)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Id.</strong>
                    </td>
                    <td>
                        <strong>Título</strong>
                    </td>
                    <td>
                        <strong>Descripción</strong>
                    </td>
                    <td>
                        <strong>Url</strong>
                    </td>
                    <td>
                        <strong>Fecha Subida</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($archivos as $archivo): ?>
                    <tr>
                        <td>
                            <?php echo $archivo->id_archivo; ?>
                        </td>
                        <td>
                            <?php echo $archivo->titulo; ?>
                        </td>
                        <td>
                            <?php echo $archivo->descripcion_archivo; ?>
                        </td>
                        <td>
                            <?php echo $archivo->url; ?>
                        </td>
                        <td>
                            <?php echo $archivo->fecha_actualizacion; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ningún archivo.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right" href="<?php echo site_url('administracion/agregar_archivo'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Archivo
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
