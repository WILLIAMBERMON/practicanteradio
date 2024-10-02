<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Convocatorias</h1>
        <hr>
        <?php if (!empty($convocatorias)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Id Convocatoria</strong>
                    </td>
                    <td>
                        <strong>Descripción</strong>
                    </td>
                    <td>
                        <strong>Fecha</strong>
                    </td>
                    <td>
                        <strong>Actividades</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($convocatorias as $row): ?>
                    <tr>
                        <td>
                            <?php echo $row->id_convocatoria; ?>
                        </td>
                        <td>
                            <?php echo $row->descripcion; ?>
                        </td>
                        <td>
                            <?php echo $row->fecha_publicado; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/actividad_convocatoria'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_convocatoria' => $row->id_convocatoria]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-folder-open"></i></button>
                            <?php echo form_close(); ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_convocatoria'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_convocatoria' => $row->id_convocatoria]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ninguna convocatoria.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right" href="<?php echo site_url('administracion/agregar_convocatoria'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Convocatoria
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
