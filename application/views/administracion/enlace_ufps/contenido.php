<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Contenido Boletín Enlace UFPS</h1>
        <hr>
        <?php if (!empty($noticias)) : ?>
            <div class="table-responsive">
                <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <td>
                                <strong>Id</strong>
                            </td>
                            <td>
                                <strong>Orden</strong>
                            </td>
                            <td>
                                <strong>Nombre</strong>
                            </td>
                            <td>
                                <strong>Resumen</strong>
                            </td>
                            <td>
                                <strong>Fecha</strong>
                            </td>
                            <td>
                                <strong>Estado</strong>
                            </td>
                            <td>
                                <strong>Url</strong>
                            </td>
                            <td>
                                <strong>Imagen</strong>
                            </td>
                            <td>
                                <strong>Editar</strong>
                            </td>
                        </tr>
                    </thead>
                    <?php foreach ($noticias as $noticia) : ?>
                        <tr class="<?php echo ($noticia->ESTADO == '1') ? 'success' : (($noticia->ESTADO == '0') ? 'warning' : ''); ?>">
                            <td>
                                <?php echo $noticia->ID; ?>
                            </td>
                            <td>
                                <?php echo $noticia->ORDEN; ?>
                            </td>
                            <td>
                                <?php echo $noticia->NOMBRE; ?>
                            </td>
                            <td>
                                <?php echo $noticia->RESUMEN; ?>
                            </td>
                            <td>
                                <?php echo $noticia->FECHA; ?>
                            </td>
                            <td>
                                <?php echo $noticia->ESTADO == 1 ? 'Visible' : 'Oculto'; ?>
                            </td>
                            <td>
                                <?php echo $noticia->URL; ?>
                            </td>
                            <td>
                                <img class="img-responsive" src="<?php echo $noticia->RUTA_IMAGEN; ?>" alt="">
                            </td>
                            <td>
                                <?php echo form_open(site_url('administracion/editar_noticia_enlace_informativo'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_noticia' => $noticia->ID]); ?>
                                <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                    <i class="fa fa-pencil-square-o"></i></button>
                                <?php echo form_close(); ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php else : ?>
            <p>Aun no ha registrado ninguna noticias del boletín.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin') : ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/correos_enlace_informativo'); ?>" style="margin-left:10px;">
            <i class="fa fa-backward"></i> Regresar
        </a>
                <a class="btn btn-primary pull-right" href="<?php echo site_url('administracion/agregar_noticia_enlace_informativo  '); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Noticia
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>