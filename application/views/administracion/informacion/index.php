<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Información</h1>
        <hr>
        <?php if (!empty($noticias)): ?>
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
                        <strong>Fecha</strong>
                    </td>
                    <td>
                        <strong>Estado</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($noticias as $noticia): ?>
                    <tr class="<?php echo ($noticia->publicar == '1') ? 'success' : (($noticia->publicar == '0') ? 'warning' : ''); ?>">
                        <td>
                            <?php echo $noticia->idNoti; ?>
                        </td>
                        <td>
                            <?php echo $noticia->titulo; ?>
                        </td>
                        <td>
                            <?php echo $noticia->fecha; ?>
                        </td>
                        <td>
                            <?php echo $noticia->publicar == 1 ? 'Visible' : 'Oculto'; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_informacion'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_noticia' => $noticia->idNoti]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ninguna información.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right" href="<?php echo site_url('administracion/agregar_informacion'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Información
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
