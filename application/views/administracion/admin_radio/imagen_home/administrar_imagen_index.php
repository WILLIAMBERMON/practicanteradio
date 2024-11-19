<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <?php if($primero): ?>
    <div class="col-md-9">
        <h1>Añadir imagen principal</h1>
        <?php echo form_open_multipart(base_url('administracion/imagen_principal_radio/true/false')); ?>
            <div class="form-group">
                <?php echo form_label('Foto principal del home:', 'foto',''); ?>
                <?php echo form_upload('foto',"",'class="form-control"'); ?>
            </div>
           
            <?php echo form_submit('submit', 'Subir Imagen'); ?>
        <?php echo form_close(); ?>
    </div>
    <?php else: ?>
        <div class="col-md-9">

        <h1>Imagen Principal</h1>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Imagen Principal</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        <tr>          
            <td>
                <img src="<?php echo base_url("public/imagenes/radio/imagen_principal/" . $contenido->desc_contenido); ?>" alt="Foto del contenido" style="width: 300px;">
            </td>
            <td>
            <?php echo form_open_multipart(base_url('administracion/imagen_principal_radio/false/true')); ?>
                <div class="form-group">
                    <?php echo form_label('Foto principal del home:', 'foto',''); ?>
                    <?php echo form_upload('foto',"",'class="form-control"'); ?>
                </div>
            
                <?php echo form_submit('submit', 'Actualizar Imagen'); ?>
            <?php echo form_close(); ?>

            </td>
        </tr>
    </tbody>
</table>
</div>
    <?php endif; ?>

</div>