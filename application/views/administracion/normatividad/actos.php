<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Normatividad</h1>
        <h3>Entidad: <?php if(isset($nombre_entidad)): ?>
                <?php echo $nombre_entidad; ?>
            <?php endif; ?></h3>
        <hr>

        <?php if (!empty($actos)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Id acto</strong>
                    </td>
                    <td>
                        <strong>Nombre acto</strong>
                    </td>
                    <td>
                        <strong>Documentos</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($actos as $acto): ?>
                    <tr>
                        <td>
                            <?php echo $acto->id_acto; ?>
                        </td>
                        <td>
                            <?php echo $acto->NombreActo; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/documento_norma'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_acto' => $acto->id_acto, 'nombre_acto' => $acto->NombreActo]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-folder-open"></i></button>
                            <?php echo form_close(); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ningún acto.</p>
        <?php endif; ?>
    </div>
</div>
