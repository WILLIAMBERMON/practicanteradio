<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">

        <h1>Crear Nueva Programacion</h1>
        <?php echo form_open_multipart(base_url('administracion/store_programacion_radio')); ?>

            <div class="form-group">
            <?php echo form_label('Colectivo:', 'colectivo'); ?>
                <?php echo form_dropdown('colectivo', $colectivos,'','class="form-control" id="categoria_id"'); ?>
            </div>

            <div class="form-group">
                <?php echo form_label('Hora de Inicio:', 'hora_inicio'); ?>
                <?php echo form_input(['name' => 'hora_inicio','class' => 'form-control','type' => 'time']); ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Hora de Fin:', 'hora_fin'); ?>
                <?php echo form_input(['name' => 'hora_fin','class' => 'form-control','type' => 'time']); ?>
            </div>
            
            <div class="form-group">
            <?php echo form_label('Dias:', 'dia_transmicion'); ?>
                <?php echo form_dropdown('dia_transmicion', $dias,'','class="form-control" id="categoria_id"'); ?>
            </div>
            
            <?php echo form_submit('submit', 'Guardar Programacion', 'class="btn btn-primary"'); ?>

        <?php echo form_close(); ?>
    </div>
</div>