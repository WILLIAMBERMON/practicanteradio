<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="margin-bottom-20">Crear Nuevo Colectivo</h1>

        <?php echo form_open_multipart(base_url('administracion/store_colectivo'), ['class' => 'form-horizontal', 'id' => 'crearColectivoForm']); ?>

        <!-- Título -->
        <div class="form-group">
            <?php echo form_label('Título:', 'titulo', ['class' => 'control-label col-sm-1']); ?>
            <div class="col-sm-9">
                <?php echo form_input([
                    'name' => 'titulo',
                    'id' => 'titulo',
                    'value' => set_value('titulo'),
                    'class' => 'form-control',
                    'placeholder' => 'Título del colectivo',
                    'required' => true
                ]); ?>
                <span class="help-block hidden">Este campo es obligatorio.</span>
            </div>
        </div>

        <!-- Descripción -->
        <div class="form-group">
            <?php echo form_label('Descripción:', 'descripcion', ['class' => 'control-label col-sm-1']); ?>
            <div class="col-sm-9">
                <?php echo form_textarea([
                    'name' => 'descripcion',
                    'id' => 'descripcion',
                    'value' => set_value('descripcion'),
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese la descripción aquí',
                    'required' => true
                ]); ?>
                <span class="help-block hidden">Este campo es obligatorio.</span>
            </div>
        </div>

        <!-- Foto -->
        <div class="form-group">
            <?php echo form_label('Foto:', 'foto', ['class' => 'control-label col-sm-1']); ?>
            <div class="col-sm-9">
                <?php echo form_upload([
                    'name' => 'foto',
                    'id' => 'foto',
                    'class' => 'form-control',
                    'required' => true
                ]); ?>
                <span class="help-block hidden">Por favor, sube una foto válida.</span>

                <!-- Mensaje de información estilizado -->
                <div class="alert alert-info" style="margin-top: 10px; padding: 10px; border-left: 4px solid #17a2b8; border-radius: 4px;">
                    <i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; color: #17a2b8;"></i>
                    <strong>Requisitos para la imagen:</strong>
                    <ul style="margin: 5px 0 0 15px; padding: 0;">
                        <li>El sistema admite archivos en formato <strong>GIF, JPG o PNG</strong>.</li>
                        <li>El tamaño máximo de la imagen es de <strong>1024 KB</strong>.</li>
                        <li>La imagen no debe superar las dimensiones de <strong>800px de ancho por 500px de alto</strong>.</li>
                    </ul>
                </div>

                <!-- Mensaje de error personalizado -->
                <div id="foto-error" class="alert alert-danger hidden" style="margin-top: 10px;">
                    La imagen no cumple con los requisitos especificados.
                </div>
            </div>
        </div>
        <!-- Presentado por -->
        <div class="form-group">
            <?php echo form_label('Presentado por:', 'director', ['class' => 'control-label col-sm-1']); ?>
            <div class="col-sm-9">
                <?php echo form_input([
                    'name' => 'director',
                    'id' => 'director',
                    'value' => set_value('director'),
                    'class' => 'form-control',
                    'placeholder' => 'Nombre del presentador',
                    'required' => true
                ]); ?>
                <span class="help-block hidden">Este campo es obligatorio.</span>
            </div>
        </div>

        <!-- Categoría -->
        <div class="form-group">
            <?php echo form_label('Categoría:', 'categoria_id', ['class' => 'control-label col-sm-1']); ?>
            <div class="col-sm-9">
                <?php echo form_dropdown(
                    'categoria_id',
                    $categorias,
                    set_value('categoria_id'),
                    [
                        'class' => 'form-control',
                        'id' => 'categoria_id',
                        'required' => true
                    ]
                ); ?>
                <span class="help-block hidden">Selecciona una categoría.</span>
            </div>
        </div>

        <!-- Botón Guardar -->
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-1">
                <button type="submit" class="btn pull-left btn-primary">Guardar</button>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

<script>
    document.getElementById('foto').addEventListener('change', function () {
        const fileInput = this;
        const file = fileInput.files[0];
        const errorMessage = document.getElementById('foto-error');
        errorMessage.classList.add('hidden'); // Ocultar mensaje de error inicialmente

        // Validación del archivo
        if (file) {
            const validFormats = ['image/jpeg', 'image/png', 'image/gif'];
            const maxFileSize = 1024 * 1024; // 1024 KB en bytes
            const maxWidth = 800;
            const maxHeight = 500;

            // Validar formato
            if (!validFormats.includes(file.type)) {
                errorMessage.textContent = 'Solo se permiten archivos en formato GIF, JPG o PNG.';
                errorMessage.classList.remove('hidden');
                fileInput.value = ''; // Limpia el campo
                return;
            }

            // Validar tamaño del archivo
            if (file.size > maxFileSize) {
                errorMessage.textContent = 'El tamaño del archivo no debe superar 1024 KB.';
                errorMessage.classList.remove('hidden');
                fileInput.value = ''; // Limpia el campo
                return;
            }

            // Validar dimensiones de la imagen
            const img = new Image();
            img.src = URL.createObjectURL(file);

            img.onload = function () {
                if (img.width > maxWidth || img.height > maxHeight) {
                    errorMessage.textContent = 'La imagen no debe superar 800px de ancho por 500px de alto.';
                    errorMessage.classList.remove('hidden');
                    fileInput.value = ''; // Limpia el campo
                }
                URL.revokeObjectURL(img.src); // Liberar memoria
            };
        }
    });

    // Validación del formulario en general
    document.getElementById('crearColectivoForm').addEventListener('submit', function (e) {
        if (!document.getElementById('foto').value) {
            e.preventDefault(); // Evitar envío si no cumple requisitos
            alert('Por favor, sube una imagen válida.');
        }
    });
</script>