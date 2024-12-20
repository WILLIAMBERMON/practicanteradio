<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="margin-bottom-20">Editar Colectivo</h1>

        <!-- Mostrar errores del servidor -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <!-- Formulario -->
        <?php echo form_open_multipart(base_url('administracion/editar_colectivo_update/'.$data_colectivos->id), ['class' => 'form-horizontal', 'id' => 'editarColectivoForm']); ?>

        <!-- Título -->
        <div class="form-group <?php echo form_error('titulo') ? 'has-error' : ''; ?>">
            <?php echo form_label('Título:', 'titulo', ['class' => 'control-label col-sm-2']); ?>
            <div class="col-sm-9">
                <?php echo form_input([
                    'name' => 'titulo',
                    'id' => 'titulo',
                    'value' => set_value('titulo', $data_colectivos->titulo),
                    'class' => 'form-control',
                    'placeholder' => 'Título del colectivo',
                    'required' => true
                ]); ?>
            </div>
        </div>

        <!-- Descripción -->
        <div class="form-group">
            <?php echo form_label('Descripción:', 'descripcion', ['class' => 'control-label col-sm-2']); ?>
            <div class="col-sm-9">
                <?php echo form_textarea([
                    'name' => 'descripcion',
                    'id' => 'descripcion',
                    'value' => set_value('descripcion', $data_colectivos->descripcion),
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese la descripción aquí',
                    'required' => true
                ]); ?>
            </div>
        </div>

        <!-- Foto -->
        <div class="form-group">
            <?php echo form_label('Foto:', 'foto', ['class' => 'control-label col-sm-2']); ?>
            <div class="col-sm-9">
                <?php echo form_upload([
                    'name' => 'foto',
                    'id' => 'foto',
                    'class' => 'form-control'
                ]); ?>

                <!-- Información sobre la foto -->
                <div class="alert alert-info" style="margin-top: 10px;">
                    <i class="glyphicon glyphicon-info-sign" style="color: #17a2b8;"></i>
                    <strong>Requisitos para la imagen:</strong>
                    <ul style="margin: 5px 0 0 15px;">
                        <li>Formatos permitidos: <strong>GIF, JPG o PNG</strong>.</li>
                        <li>Tamaño máximo: <strong>1024 KB</strong>.</li>
                        <li>Dimensiones máximas: <strong>800px de ancho y 500px de alto</strong>.</li>
                    </ul>
                </div>
                <div id="foto-error" class="alert alert-danger hidden" style="margin-top: 10px;">
                    La imagen no cumple con los requisitos especificados.
                </div>
            </div>
        </div>

        <!-- Director -->
        <div class="form-group">
            <?php echo form_label('Presentado por:', 'director', ['class' => 'control-label col-sm-2']); ?>
            <div class="col-sm-9">
                <?php echo form_input([
                    'name' => 'director',
                    'id' => 'director',
                    'value' => set_value('director', $data_colectivos->director),
                    'class' => 'form-control',
                    'placeholder' => 'Nombre del presentador',
                    'required' => true
                ]); ?>
            </div>
        </div>

        <!-- Categoría -->
        <div class="form-group">
            <?php echo form_label('Categoría:', 'categoria_id', ['class' => 'control-label col-sm-2']); ?>
            <div class="col-sm-9">
                <?php echo form_dropdown(
                    'categoria_id',
                    $categorias,
                    set_value('categoria_id', $data_colectivos->categoria_id),
                    [
                        'class' => 'form-control',
                        'id' => 'categoria_id',
                        'required' => true
                    ]
                ); ?>
            </div>
        </div>

        <!-- Botón Guardar -->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-9">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="<?php echo base_url('administracion/getColectivosRadiales'); ?>" class="btn btn-default">Cancelar</a>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

<!-- Script de Validación de Imagen -->
<script>
    document.getElementById('foto').addEventListener('change', function () {
        const fileInput = this;
        const file = fileInput.files[0];
        const errorMessage = document.getElementById('foto-error');
        errorMessage.classList.add('hidden'); // Ocultar mensaje de error inicialmente

        if (file) {
            const validFormats = ['image/jpeg', 'image/png', 'image/gif'];
            const maxFileSize = 1024 * 1024; // 1024 KB
            const maxWidth = 800;
            const maxHeight = 500;

            if (!validFormats.includes(file.type)) {
                errorMessage.textContent = 'Solo se permiten archivos en formato GIF, JPG o PNG.';
                errorMessage.classList.remove('hidden');
                fileInput.value = '';
                return;
            }

            if (file.size > maxFileSize) {
                errorMessage.textContent = 'El tamaño del archivo no debe superar 1024 KB.';
                errorMessage.classList.remove('hidden');
                fileInput.value = '';
                return;
            }

            const img = new Image();
            img.src = URL.createObjectURL(file);

            img.onload = function () {
                if (img.width > maxWidth || img.height > maxHeight) {
                    errorMessage.textContent = 'La imagen no debe superar 800px de ancho y 500px de alto.';
                    errorMessage.classList.remove('hidden');
                    fileInput.value = '';
                }
                URL.revokeObjectURL(img.src);
            };
        }
    });

    document.getElementById('editarColectivoForm').addEventListener('submit', function (e) {
        if (!document.getElementById('foto').value) {
            // Permite que la imagen sea opcional si no se selecciona una nueva
            //console.log('Sin imagen seleccionada, continúa...');
        }
    });
</script>
