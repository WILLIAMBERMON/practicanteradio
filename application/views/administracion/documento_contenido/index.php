<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h2 class="text-justify">Administración de Documentos del Contenido</h2>
        <hr>
        <?php if (!empty($titulos)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Id</strong>
                    </td>
                    <td>
                        <strong>Id. Contenido</strong>
                    </td>
                    <td>
                        <strong>Descripción</strong>
                    </td>
                    <td>
                        <strong>Fecha del Publicado</strong>
                    </td>
                    <td>
                        <strong>Orden</strong>
                    </td>
                    <td>
                        <strong>Publicar</strong>
                    </td>
                    <td>
                        <strong>Documentos</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($titulos as $titulo): ?>
                    <tr class="<?php echo ($titulo->publicar == '1') ? 'success' : (($titulo->publicar == '0') ? 'warning' : ''); ?>">
                        <td>
                            <?php echo $titulo->id_titulo; ?>
                        </td>
                        <td>
                            <?php echo $titulo->id_contenido; ?>
                        </td>
                        <td>
                            <?php echo $titulo->descripcion; ?>
                        </td>
                        <td>
                            <?php echo $titulo->fecha_publicado; ?>
                        </td>
                        <td>
                            <?php echo $titulo->orden; ?>
                        </td>
                        <td>
                            <?php echo $titulo->publicar == 1 ? 'Visible' : 'Oculto'; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/documento_contenido'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_titulo' => $titulo->id_titulo]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-folder-open"></i></button>
                            <?php echo form_close(); ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_documento_contenido_titulo'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_titulo' => $titulo->id_titulo]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ningun título.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin' or $userdata->rol == 'contratacion' or $userdata->rol == 'radio'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right" href="<?= site_url('administracion/contenido'); ?>"
                   style="margin-left:10px;">
                    <i class="fa fa-backward"></i> Regresar
                </a>
                <a class="btn btn-primary pull-right"
                   href="<?php echo site_url('administracion/agregar_documento_contenido_titulo'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Titulo
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>
