<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h2 class="text-justify">Administración de Grupos de Investigación</h2>
        <hr>
        <?php if (!empty($investigaciones)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Id</strong>
                    </td>
                    <td>
                        <strong>Tipo</strong>
                    </td>
                    <td>
                        <strong>Nombre</strong>
                    </td>
                    <td>
                        <strong>Director</strong>
                    </td>
                    <td>
                        <strong>Departamento</strong>
                    </td>
                    <td>
                        <strong>Correo</strong>
                    </td>
                    <td>
                        <strong>Línea</strong>
                    </td>
                    <td>
                        <strong>Estatus</strong>
                    </td>
                    <td>
                        <strong>Fecha</strong>
                    </td>
                    <td>
                        <strong>Publicar</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($investigaciones as $investigacion): ?>
                    <tr class="<?php echo ($investigacion->publicar == '1') ? 'success' : (($investigacion->publicar == '0') ? 'warning' : ''); ?>">
                        <td>
                            <?php echo $investigacion->id_grupo; ?>
                        </td>
                        <td>
                            <?php echo (($investigacion->tipo == '1') ? 'Grupo' : 'Semillero'); ?>
                        </td>
                        <td>
                            <?php echo $investigacion->nombre; ?>
                        </td>
                        <td>
                            <?php echo $investigacion->director; ?>
                        </td>
                        <td>
                            <?php echo $investigacion->departamento; ?>
                        </td>
                        <td>
                            <?php echo $investigacion->correo; ?>
                        </td>
                        <td>
                            <?php echo $investigacion->linea; ?>
                        </td>
                        <td>
                            <?php echo $investigacion->estatus; ?>
                        </td>
                        <td>
                            <?php echo $investigacion->fecha; ?>
                        </td>
                        <td>
                            <?php echo $investigacion->publicar == 1 ? 'Visible' : 'Oculto'; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_investigacion'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_grupo' => $investigacion->id_grupo]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ningun grupo de investigación.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin' || $userdata->rol == 'radio'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right" href="<?= site_url('administracion/contenido'); ?>"
                   style="margin-left:10px;">
                    <i class="fa fa-backward"></i> Regresar
                </a>
                <a class="btn btn-primary pull-right"
                   href="<?php echo site_url('administracion/agregar_investigacion'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Grupo
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>
