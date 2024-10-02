<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h2 class="text-justify">Administración de Calendarios</h2>
        <hr>
        <?php if (!empty($calendarios)): ?>
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
                        <strong>Nombre o Descripción</strong>
                    </td>
                    <td>
                        <strong>Archivo</strong>
                    </td>
                    <td>
                        <strong>PP</strong>
                    </td>
                    <td>
                        <strong>SP</strong>
                    </td>
                    <td>
                        <strong>TP</strong>
                    </td>
                    <td>
                        <strong>EX</strong>
                    </td>
                    <td>
                        <strong>HA</strong>
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
                <?php foreach ($calendarios as $calendario): ?>
                    <tr class="<?php echo ($calendario->publicar == '1') ? 'success' : (($calendario->publicar == '0') ? 'warning' : ''); ?>">
                        <td>
                            <?php echo $calendario->id_calendario; ?>
                        </td>
                        <td>
                            <?php echo (($calendario->tipo == '1') ? 'Documento' : 'Programa'); ?>
                        </td>
                        <td>
                            <?php echo $calendario->nombre; ?>
                        </td>
                        <td>
                            <?php echo $calendario->archivo; ?>
                        </td>
                        <td>
                            <?php echo $calendario->pp; ?>
                        </td>
                        <td>
                            <?php echo $calendario->sp; ?>
                        </td>
                        <td>
                            <?php echo $calendario->tp; ?>
                        </td>
                        <td>
                            <?php echo $calendario->ex; ?>
                        </td>
                        <td>
                            <?php echo $calendario->ha; ?>
                        </td>
                        <td>
                            <?php echo $calendario->fecha; ?>
                        </td>
                        <td>
                            <?php echo $calendario->publicar == 1 ? 'Visible' : 'Oculto'; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_calendario'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_calendario' => $calendario->id_calendario]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ningun calendario.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right"
                   href="<?php echo site_url('administracion/agregar_calendario'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Calendario
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>
