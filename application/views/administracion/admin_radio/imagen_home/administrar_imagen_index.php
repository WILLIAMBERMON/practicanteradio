<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>
    <?php if($primero): ?>
    <div class="col-md-9">
        <h1>Añadir imagen principal</h1>
        <?php echo form_open_multipart(base_url('administracion/imagen_principal_radio/true/false'), ['class' => 'form-horizontal', 'id' => 'cargarImagenPrincipal']); ?>
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
        <table class="table table-bordered table-hover">
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
                        <!-- Mensaje de información estilizado -->
                        <div class="alert alert-info" style="margin-top: 10px; padding: 10px; border-left: 4px solid #17a2b8; border-radius: 4px;">
                            <i class="glyphicon glyphicon-info-sign" style="margin-right: 5px; color: #17a2b8;"></i>
                            <strong>Requisitos para la imagen:</strong>
                            <ul style="margin: 5px 0 0 15px; padding: 0;">
                                <li>El sistema admite archivos en formato <strong>GIF, JPG o PNG</strong>.</li>
                                <li>El tamaño máximo de la imagen es de <strong>1024 KB</strong>.</li>
                                <li>La imagen no debe superar las dimensiones de <strong>1900px de ancho por 500px de alto</strong>.</li>
                            </ul>
                        </div>
                        <!-- Mensaje de error personalizado -->
                        <div id="foto-error" class="alert alert-danger hidden" style="margin-top: 10px;">
                            La imagen no cumple con los requisitos especificados.
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
<script src="<?php echo base_url("assets/plugins/jquery/jQuery-3.5.1.min.js")?>"></script>
<script>
$(document).ready(function() {
    // Validaciones para la imagen principal
    const validFormats = ['image/jpeg', 'image/png', 'image/gif'];
    const maxFileSize = 1024 * 1024; // 1024 KB en bytes
    const maxWidth = 1900;
    const maxHeight = 500;

    // Manejar el cambio en el input de la imagen
    $('[name="foto"]').on('change', function() {
        const fileInput = $(this);
        const file = this.files[0];
        const errorMessage = $('#foto-error');

        errorMessage.addClass('hidden'); // Ocultar mensaje de error inicialmente

        if (file) {
            // Validar formato
            if (!validFormats.includes(file.type)) {
                errorMessage.text('Solo se permiten archivos en formato GIF, JPG o PNG.');
                errorMessage.removeClass('hidden');
                fileInput.val(''); // Limpiar el campo
                return;
            }

            // Validar tamaño del archivo
            if (file.size > maxFileSize) {
                errorMessage.text('El tamaño del archivo no debe superar 1024 KB.');
                errorMessage.removeClass('hidden');
                fileInput.val(''); // Limpiar el campo
                return;
            }

            // Validar dimensiones de la imagen
            const img = new Image();
            img.src = URL.createObjectURL(file);

            img.onload = function() {
                if (img.width > maxWidth || img.height > maxHeight) {
                    errorMessage.text('La imagen no debe superar 1900px de ancho por 500px de alto.');
                    errorMessage.removeClass('hidden');
                    fileInput.val(''); // Limpiar el campo
                }
                URL.revokeObjectURL(img.src); // Liberar memoria
            };
        }
    });

    // Validación del formulario en general
    $('#cargarImagenPrincipal').on('submit', function(e) {
        const fileInput = $('[name="foto"]');
        if (!fileInput.val()) {
            e.preventDefault(); // Evitar envío si no cumple requisitos
            alert('Por favor, sube una imagen válida.');
        }
    });

    // Ajuste del botón con Bootstrap 3
    $("[name='submit']").addClass('btn btn-primary');
    
});


</script>