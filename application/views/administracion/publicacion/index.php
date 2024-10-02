<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h2 class="text-justify">Administración de Publicaciones</h2>
        <hr>
        <?php if (!empty($publicaciones)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Id Publicación</strong>
                    </td>
                    <td>
                        <strong>Nombre</strong>
                    </td>
                    <td>
                        <strong>Volumen</strong>
                    </td>
                    <td>
                        <strong>Número</strong>
                    </td>
                    <td>
                        <strong>ISBN</strong>
                    </td>
                    <td>
                        <strong>Año</strong>
                    </td>
                    <td>
                        <strong>Edición</strong>
                    </td>
                    <td>
                        <strong>Fecha</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($publicaciones as $publicacion): ?>
                    <tr>
                        <td>
                            <?php echo $publicacion->publicacion_id; ?>
                        </td>
                        <td>
                            <?php echo $publicacion->nombre; ?>
                        </td>
                        <td>
                            <?php echo $publicacion->volumen; ?>
                        </td>
                        <td>
                            <?php echo $publicacion->numero; ?>
                        </td>
                        <td>
                            <?php echo $publicacion->isbn; ?>
                        </td>
                        <td>
                            <?php echo $publicacion->year; ?>
                        </td>
                        <td>
                            <?php echo $publicacion->edicion; ?>
                        </td>
                        <td>
                            <?php echo $publicacion->fecha_real; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_publicacion'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_publicacion' => $publicacion->publicacion_id]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ningun elemento de publicación.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin' || $userdata->rol == 'radio'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right" href="<?= site_url('administracion/contenido'); ?>"
                   style="margin-left:10px;">
                    <i class="fa fa-backward"></i> Regresar
                </a>
                <a class="btn btn-primary pull-right"
                   href="<?php echo site_url('administracion/agregar_publicacion'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Publicación
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>
