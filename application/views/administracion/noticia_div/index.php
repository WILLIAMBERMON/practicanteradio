<style>
table {
    table-layout:fixed;
}
td{
    overflow:hidden;
    text-overflow: ellipsis;
}
</style>
<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Noticias</h1>
        <hr>
        <div id="alert_mensaje"></div>
        <?php $label = 'Tipo Noticia'; ?>
                    <?php $name = 'tipo_noticia_index'; ?>
                    <div class="form-group col-md-2 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <select class="form-control select_tipo_noticia" name="<?php echo $name; ?>">
                            <option value='0' selected>
                                CECOM
                            </option>
                            <option value='1'>
                                Noticias de Prensa
                            </option>
                        </select>
                    </div> 
        <br>
        <?php if (!empty($noticias)): ?>
            <div class="table-responsive col-md-12">
                <table id="tabla_noticias_divisist" class="table table-striped table-hover table-bordered text-center">
                    <thead>
                    <tr>
                        <td>
                            <strong>Título</strong>
                        </td>
                        <td>
                            <strong>Contenido</strong>
                        </td>
                        <td>
                            <strong>Estado</strong>
                        </td>
                        <td>
                            <strong>Fecha de Creación</strong>
                        </td>
                        <td>
                            <strong>Observación</strong>
                        </td>
                        <td>
                            <strong>Tipo</strong>
                        </td>
                        <td>
                            <strong>Fecha de Vencimiento</strong>
                        </td>
                        <td>
                            <strong>Url Img</strong>
                        </td>
                        <td>
                            <strong>Url</strong>
                        </td>
                        <td>
                            <strong>Editar</strong>
                        </td>
                    </tr>
                    </thead>
                    <?php foreach ($noticias as $noticia): ?>
                        <tr class="<?php //echo ($noticia->ESTADO == '1') ? 'success' : (($noticia->ESTADO == '0') ? 'warning' : ''); ?>">
                            <td>
                                <?php echo $noticia->TITULO; ?>
                            </td>
                            <td>
                                <?php echo $noticia->CONTENIDO; ?>
                            </td>
                            <td>
                                <?php echo $noticia->ESTADO == 1 ? 'Visible' : 'Oculto'; ?>
                            </td>
                            <td>
                                <?php echo $noticia->FECHA_CREACION; ?>
                            </td>
                            <td>
                                <?php echo $noticia->OBSERVACION; ?>
                            </td>
                            <td>
                                <?php echo $noticia->TIPO; ?>
                            </td>
                            <td>
                                <?php echo $noticia->FECHA_VENCIMIENTO; ?>
                            </td>
                            <td>
                                <?php echo $noticia->URL_IMG; ?>
                            </td>
                            <td>
                                <?php echo $noticia->URL; ?>
                            </td>
                            <td>
                                <?php echo form_open(site_url('administracion/editar_noticia_divisist'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_noticia' => $noticia->TITULO, 'tipo' => $noticia->TIPO, 'tipo_noticia' => '0']); ?>
                                <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                    <i class="fa fa-pencil-square-o"></i></button>
                                <?php echo form_close(); ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php else: ?>
            <p>Aun no ha registrado ninguna noticia.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right"
                   href="<?php echo site_url('administracion/agregar_noticia_divisist'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Noticia
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
