<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Licitaciones</h1>
        <hr>
        <?php if (!empty($licitaciones)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Id Licitación</strong>
                    </td>
                    <td>
                        <strong>Título</strong>
                    </td>
                    <td>
                        <strong>Id Grupo</strong>
                    </td>
                    <td>
                        <strong>Orden</strong>
                    </td>
                    <td>
                        <strong>Fecha</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($licitaciones as $licitacion): ?>
                    <tr>
                        <td>
                            <?php echo $licitacion->idlici; ?>
                        </td>
                        <td>
                            <?php echo $licitacion->titulo; ?>
                        </td>
                        <td>
                            <?php echo $licitacion->grupo; ?>
                        </td>
                        <td>
                            <?php echo $licitacion->orden; ?>
                        </td>
                        <td>
                            <?php echo $licitacion->fechapublicado; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_licitacion'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_licitacion' => $licitacion->idlici]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ninguna licitación.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'contratacion'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/procesos_contractuales'); ?>"
                   style="margin-left:10px;">
                    <i class="fa fa-backward"></i> Regresar
                </a>
                <a class="btn btn-primary pull-right" href="<?php echo site_url('administracion/agregar_licitacion'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Licitación
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
