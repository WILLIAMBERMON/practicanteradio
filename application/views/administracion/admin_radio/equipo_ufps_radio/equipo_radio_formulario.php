<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>
    <div class="col-md-9">
        <?php if($crear): ?>
        <h1>Crear Nuevo Integrante Radio</h1>
        <form action="<?php echo base_url('administracion/equipo_ufps_radio_editar_crear'); ?>" 
            method="post" 
            enctype="multipart/form-data" 
            id="crearIntegranteRadio">
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
                <?php echo form_upload('foto',"",'class="form-control"'); ?>
            </div>
            <div class="alert alert-info" style="margin-top: 10px; padding: 10px; border-left: 4px solid #17a2b8; border-radius: 4px;">
                <i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; color: #17a2b8;"></i>
                <strong>Requisitos para la imagen:</strong>
                <ul style="margin: 5px 0 0 15px; padding: 0;">
                    <li>El sistema admite archivos en formato <strong>GIF, JPG o PNG</strong>.</li>
                    <li>El tamaño máximo de la imagen es de 1MB <strong>(1024 KB)</strong>.</li>
                    <li>La imagen no debe superar las dimensiones de <strong>600px de ancho por 600px de alto</strong>.</li>
                </ul>
            </div>
            <div id="foto-error" class="alert alert-danger hidden" style="margin-top: 10px;">
                La imagen no cumple con los requisitos especificados.
            </div>
            <!-- Cambia el nombre del botón -->
            <?php echo form_submit('guardar', 'Guardar'); ?>
        </form>
        <br>
        <?php else: ?>
        <!-- Código para editar integrante -->
        <h1>Editar Integrante</h1>
        <?php echo form_open_multipart(base_url('administracion/equipo_ufps_radio_editar_crear'), ['class' => '', 'id' => 'editarIntegranteRadio']); ?>
        <!-- Campo oculto -->
        <div class="form-group ">
            <?php echo form_input('id', set_value('id', $integrante["id"]), 'class="hidden"'); ?>
        </div>
        <div class="form-group ">
            <?php echo form_label('Nombre:', 'nombre'); ?>
            <?php echo form_input('nombre', set_value('nombre', $integrante["nombre"]), 'class="form-control" placeholder="Nombre del integrante"'); ?>
        </div>
        <div class="form-group">
            <?php echo form_label('Cargo:', 'cargo'); ?>
            <?php echo form_input('cargo', set_value('cargo', $integrante["cargo"]), 'class="form-control" placeholder="Cargo que ocupa"'); ?>
        </div>
        <div class="form-group">
            <?php echo form_label('Departamento:', 'departamento'); ?>
            <?php echo form_input('departamento', set_value('departamento', $integrante["departamento"]), 'class="form-control" placeholder="Departamento al que pertenece (radio,cecom,etc)"'); ?>
        </div>
        <div class="form-group">
            <?php echo form_label('Foto:', 'foto'); ?>
            <?php echo form_upload('foto', "", 'class="form-control"'); ?>
        </div>
        <!-- Mensaje de información estilizado -->
        <div class="alert alert-info" style="margin-top: 10px; padding: 10px; border-left: 4px solid #17a2b8; border-radius: 4px;">
            <i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; color: #17a2b8;"></i>
            <strong>Requisitos para la imagen:</strong>
            <ul style="margin: 5px 0 0 15px; padding: 0;">
                <li>El sistema admite archivos en formato <strong>GIF, JPG o PNG</strong>.</li>
                <li>El tamaño máximo de la imagen es de 1MB <strong>(1024 KB)</strong>.</li>
                <li>La imagen no debe superar las dimensiones de <strong>600px de ancho por 600px de alto</strong>.</li>
            </ul>
        </div>
        <!-- Mensaje de error personalizado -->
        <div id="foto-error" class="alert alert-danger hidden" style="margin-top: 10px;">
            La imagen no cumple con los requisitos especificados.
        </div>
        <?php echo form_submit('guardar', 'Guardar'); ?>
        <?php echo form_close(); ?><br>
        <?php endif; ?>
    </div>
</div>
<script src="<?php echo base_url('assets/plugins/jquery/jQuery-3.5.1.min.js'); ?>"></script>
<script>
    $(document).ready(function () {
        const validFormats = ['image/jpeg', 'image/png', 'image/gif'];
        const maxFileSize = 1024 * 1024; // 1MB
        const maxWidth = 600;
        const maxHeight = 600;
        let isImageValid = false; // Bandera para validar dimensiones de imagen
        let isSubmitting = false; // Bandera para evitar múltiples envíos
    
        // Validación de la imagen
        $('[name="foto"]').on('change', function () {
            const fileInput = $(this);
            const file = this.files[0];
            const errorMessage = $('#foto-error');
    
            errorMessage.addClass('hidden'); // Ocultar mensaje de error inicialmente
    
            if (file) {
                // Validar formato
                if (!validFormats.includes(file.type)) {
                    errorMessage.text('Solo se permiten archivos en formato GIF, JPG o PNG.');
                    errorMessage.removeClass('hidden');
                    fileInput.val('');
                    isImageValid = false;
                    return;
                }
    
                // Validar tamaño del archivo
                if (file.size > maxFileSize) {
                    errorMessage.text('El tamaño del archivo no debe superar 1024 KB.');
                    errorMessage.removeClass('hidden');
                    fileInput.val('');
                    isImageValid = false;
                    return;
                }
    
                // Validar dimensiones de la imagen
                const img = new Image();
                img.src = URL.createObjectURL(file);
    
                img.onload = function () {
                    if (img.width > maxWidth || img.height > maxHeight) {
                        errorMessage.text('La imagen no debe superar 600px de ancho por 600px de alto.');
                        errorMessage.removeClass('hidden');
                        fileInput.val('');
                        isImageValid = false;
                    } else {
                        isImageValid = true;
                    }
                    URL.revokeObjectURL(img.src); // Liberar memoria
                };
    
                img.onerror = function () {
                    errorMessage.text('Error al cargar la imagen. Por favor, selecciona otra.');
                    errorMessage.removeClass('hidden');
                    fileInput.val('');
                    isImageValid = false;
                };
            }
        });
    
        // Validación y envío del formulario
        $('#crearIntegranteRadio').on('submit', function (e) {
            if (isSubmitting) return; // Evitar múltiples envíos
            isSubmitting = true;
    
            e.preventDefault(); // Detener el envío predeterminado inicialmente
    
            const form = this; // Referencia al formulario nativo
            const errorMessage = $('#foto-error');
            errorMessage.addClass('hidden'); // Ocultar mensaje de error inicialmente
    
            let isValid = true; // Bandera para validar todos los campos
    
            // Limpia los mensajes de error previos
            $('.error-message').remove();
            $('input[type="text"]').removeClass('error');
    
            $('#crearIntegranteRadio input[type="text"]').each(function () {
                // Verifica si el campo está vacío
                if (!$(this).val().trim()) {
                    isValid = false; // Marca el formulario como inválido
                    $(this).addClass('error'); // Añade clase de error al campo
    
                    // Muestra un mensaje de error debajo del campo
                    $(this).after(`<span class="error-message" style="color:red;">Este campo es obligatorio.</span>`);
                }
            });
    
            // Validar la imagen
            if (!isImageValid) {
                errorMessage.removeClass('hidden');
                errorMessage.text('Por favor, sube una imagen válida.');
                isSubmitting = false; // Permite volver a intentar
                return false; // Detiene el flujo
            }
    
            // Si hay errores en los campos, evita el envío del formulario
            if (!isValid) {
                isSubmitting = false; // Permite volver a intentar
                return false; // Detiene el flujo
            }
    
            console.log('Formulario válido, enviando...');
            // Enviar el formulario usando la función nativa para evitar conflictos
            HTMLFormElement.prototype.submit.call(form);
        });

        $('#editarIntegranteRadio').on('submit', function (e) {
            if (isSubmitting) return; // Evitar múltiples envíos
            isSubmitting = true;
    
            e.preventDefault(); // Detener el envío predeterminado inicialmente
    
            const form = this; // Referencia al formulario nativo
            const errorMessage = $('#foto-error');
            errorMessage.addClass('hidden'); // Ocultar mensaje de error inicialmente
    
            let isValid = true; // Bandera para validar todos los campos
    
            // Limpia los mensajes de error previos
            $('.error-message').remove();
            $('input[type="text"]').removeClass('error');
    
            $('#editarIntegranteRadio input[type="text"]').each(function () {
                // Verifica si el campo está vacío
                if (!$(this).val().trim()) {
                    isValid = false; // Marca el formulario como inválido
                    $(this).addClass('error'); // Añade clase de error al campo
    
                    // Muestra un mensaje de error debajo del campo
                    $(this).after(`<span class="error-message" style="color:red;">Este campo es obligatorio.</span>`);
                }
            });
    
            // Validar la imagen
            if (!isImageValid) {
                errorMessage.removeClass('hidden');
                errorMessage.text('Por favor, sube una imagen válida.');
                isSubmitting = false; // Permite volver a intentar
                return false; // Detiene el flujo
            }
    
            // Si hay errores en los campos, evita el envío del formulario
            if (!isValid) {
                isSubmitting = false; // Permite volver a intentar
                return false; // Detiene el flujo
            }
    
            console.log('Formulario válido, enviando...');
            // Enviar el formulario usando la función nativa para evitar conflictos
            HTMLFormElement.prototype.submit.call(form);
        });

    
        $("[name='guardar']").addClass('btn btn-primary'); // Asegúrate de usar el nuevo nombre aquí
    
    });
</script>