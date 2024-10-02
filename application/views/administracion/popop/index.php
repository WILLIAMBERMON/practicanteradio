<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Popop</h1>
        <hr>
        <?php if (!empty($popops)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Id Popop</strong>
                    </td>
                    <td>
                        <strong>Título</strong>
                    </td>
                    <td>
                        <strong>Descripción</strong>
                    </td>
                    <td>
                        <strong>Fecha Inicio de Publicación</strong>
                    </td>
                    <td>
                        <strong>Publicado</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($popops as $popop): ?>
                    <tr>
                        <td>
                            <?php echo $popop->id_popop; ?>
                        </td>
                        <td>
                            <?php echo $popop->titulo; ?>
                        </td>
                        <td>
                            <?php echo $popop->descripcion; ?>
                        </td>
                        <td>
                            <?php echo $popop->fecha_inicio; ?>
                        </td>
                        <td>
                            <?php echo $popop->publicar; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_popop'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_popop' => $popop->id_popop]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ningún popop actual.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right" href="<?php echo site_url('administracion/agregar_popop'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Popop
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
