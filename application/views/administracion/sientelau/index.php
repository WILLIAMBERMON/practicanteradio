<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Boletìn Siente la U</h1>
        <hr>
        <?php if (!empty($editoriales)): ?>
            <div class="table-responsive">
                <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                    <thead>
                    <tr>
                        <td>
                            <strong>Editorial</strong>
                        </td>
                        <td>
                            <strong>Mes</strong>
                        </td>
                        <td>
                            <strong>Año</strong>
                        </td>
                        <td>
                            <strong>Estado</strong>
                        </td>
                        <td>
                            <strong>Editar</strong>
                        </td>
                    </tr>
                    </thead>
                    <?php foreach ($editoriales as $editorial): ?>
                        <tr class="<?php echo ($editorial->ESTADO == '1') ? 'success' : (($editorial->ESTADO == '0') ? 'warning' : ''); ?>">
                            <td>
                                <?php echo $editorial->EDITORIAL; ?>
                            </td>
                            <td>
                                <?php echo $editorial->MES; ?>
                            </td>
                            <td>
                                <?php echo $editorial->ANYO; ?>
                            </td>
                            <td>
                                <?php echo $editorial->ESTADO == 1 ? 'Visible' : 'Oculto'; ?>
                            </td>
                            <td>
                                <?php echo form_open(site_url('administracion/editar_sientelau'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['editorial' => $editorial->EDITORIAL, 'anyo' => $editorial->ANYO]); ?>
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
                   href="<?php echo site_url('administracion/agregar_sientelau'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Boletín
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
