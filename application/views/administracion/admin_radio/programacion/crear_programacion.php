<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">

        <h1>Crear Nuevo Colectivo</h1>
        <?php echo form_open_multipart(base_url('administracion/store_colectivo')); ?>
            <div class="form-group <?php echo form_error('titulo') ? 'has-error' : ''; ?>">
                <?php echo form_label('Título:', 'titulo'); ?>
                <?php echo form_input('titulo', set_value('titulo'),'class="form-control" placeholder="Titulo del colectivo"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Descripción:', 'descripcion'); ?>
                <?php echo form_textarea('descripcion', set_value('descripcion'), 'class="form-control" placeholder="Ingrese la descripción aquí"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Foto:', 'foto'); ?>
                <?php echo form_upload('foto'); ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Director:', 'director'); ?>
                <?php echo form_input('director', set_value('director')); ?>
            </div>
            <label for="categoria_id">Categoría:</label>
                <?php echo form_dropdown('categoria_id', $categorias,'','class="form-control" id="categoria_id"'); ?>

            <?php echo form_submit('submit', 'Guardar'); ?>
        <?php echo form_close(); ?>
    </div>
</div>