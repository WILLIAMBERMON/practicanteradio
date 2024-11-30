<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
    <?php if($crear): ?>
        <h1>Crear Nuevo Integrante Radio</h1>
        <?php echo form_open_multipart(base_url('administracion/equipo_ufps_radio_editar_crear')); ?>
            <div class="form-group ">
                <?php echo form_label('Nombre:', 'nombre'); ?>
                <?php echo form_input('nombre', set_value('nombre'),'class="form-control" placeholder="Nombre del integrante"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Cargo:', 'cargo'); ?>
                <?php echo form_input('cargo', set_value('cargo'), 'class="form-control" placeholder="Cargo que ocupa"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Departamento:', 'departamento'); ?>
                <?php echo form_input('departamento', set_value('departamento'),'class="form-control" placeholder="Departamento al que pertenece (radio,cecom,etc)"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Foto:', 'foto'); ?>
                <?php echo form_upload('foto'); ?>
            </div>
           
            
            <?php echo form_submit('submit', 'Guardar'); ?>
        <?php echo form_close(); ?>
        
        
        
        <?php else: ?>
            <h1>Editar Integrante</h1>
            <?php echo form_open_multipart(base_url('administracion/equipo_ufps_radio_editar_crear')); ?>
            <div class="form-group ">
                <?php echo form_input('id', set_value('id',$integrante["id"]),'class="hidden"'); ?>
            </div>
            <div class="form-group ">
                <?php echo form_label('Nombre:', 'nombre'); ?>
                <?php echo form_input('nombre', set_value('nombre',$integrante["nombre"]),'class="form-control" placeholder="Nombre del integrante"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Cargo:', 'cargo'); ?>
                <?php echo form_input('cargo', set_value('cargo',$integrante["cargo"]), 'class="form-control" placeholder="Cargo que ocupa"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Departamento:', 'departamento'); ?>
                <?php echo form_input('departamento', set_value('departamento',$integrante["departamento"]),'class="form-control" placeholder="Departamento al que pertenece (radio,cecom,etc)"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Foto:', 'foto'); ?>
                <?php echo form_upload('foto'); ?>
            </div>
           
            
            <?php echo form_submit('submit', 'Guardar'); ?>
        <?php echo form_close(); ?>

        <?php endif; ?>

    </div>
</div>