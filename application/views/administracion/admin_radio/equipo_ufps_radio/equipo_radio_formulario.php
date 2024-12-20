<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
    <?php if($crear): ?>
        <h1>Crear Nuevo Integrante Radio</h1>
        <?php //echo form_open_multipart(base_url('administracion/equipo_ufps_radio_editar_crear')); ?>
        <?php echo form_open_multipart(base_url('administracion/equipo_ufps_radio_editar_crear'), ['class' => '', 'id' => 'crearIntegranteRadio']); ?>

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
                <?php //echo form_upload('foto'); ?>
                <?php echo form_upload('foto',"",'class="form-control"'); ?>
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
            <?php echo form_submit('submit', 'Guardar'); ?>
        <?php echo form_close(); ?><br>
        
        
        
        <?php else: ?>
            <h1>Editar Integrante</h1>
            <?php //echo form_open_multipart(base_url('administracion/equipo_ufps_radio_editar_crear')); ?>
            <?php echo form_open_multipart(base_url('administracion/equipo_ufps_radio_editar_crear'), ['class' => '', 'id' => 'crearIntegranteRadio']); ?>

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
                <?php echo form_upload('foto',"",'class="form-control"'); ?>
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
            
            <?php echo form_submit('submit', 'Guardar'); ?>
        <?php echo form_close(); ?><br>

        <?php endif; ?>

    </div>
</div>
<script src="<?php echo base_url('assets/plugins/jquery/jQuery-3.5.1.min.js'); ?>"></script>
<script>
$(document).ready(function() {
    // Validaciones para la imagen principal
    const validFormats = ['image/jpeg', 'image/png', 'image/gif'];
    const maxFileSize = 1024 * 1024; // 1024 KB en bytes
    const maxWidth = 600;
    const maxHeight = 600;

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
                    errorMessage.text('La imagen no debe superar 600px de ancho por 600px de alto.');
                    errorMessage.removeClass('hidden');
                    fileInput.val(''); // Limpiar el campo
                }
                URL.revokeObjectURL(img.src); // Liberar memoria
            };
        }
    });

    // Validación del formulario para asegurarse de que todos los campos estén llenos
    $('#crearIntegranteRadio').on('submit', function(e) {
        let isValid = true;

        // Verificar que todos los campos de texto estén llenos
        $('input[type="text"]').each(function() {
            if (!$(this).val().trim()) {
                isValid = false;
                $(this)[0].setCustomValidity('Este campo es obligatorio.');
            } else {
                $(this)[0].setCustomValidity('');
            }
        });

        // Verificar que el archivo de la imagen sea válido
        const fileInput = $('[name="foto"]');
        if (!fileInput.val()) {
            isValid = false;
            alert('Por favor, sube una imagen válida.');
        }

        if (!isValid) {
            e.preventDefault(); // Evitar envío si no cumple requisitos
        }
    });

    // Ajuste del botón con Bootstrap 3
    $("[name='submit']").addClass('btn btn-primary');
});
</script>
