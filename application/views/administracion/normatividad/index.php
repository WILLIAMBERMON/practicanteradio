<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Normatividad</h1>
        <hr>
        <?php if (!empty($entidades)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Id sección</strong>
                    </td>
                    <td>
                        <strong>Nombre sección</strong>
                    </td>
                    <td>
                        <strong>Actos</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($entidades as $entidad): ?>
                    <tr>
                        <td>
                            <?php echo $entidad->id_seccion; ?>
                        </td>
                        <td>
                            <?php echo $entidad->nombre_seccion; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/acto'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_entidad' => $entidad->id_seccion, 'nombre_entidad' => $entidad->nombre_seccion]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-list-ol"></i></button>
                            <?php echo form_close(); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ninguna entidad.</p>
        <?php endif; ?>
    </div>
</div>
