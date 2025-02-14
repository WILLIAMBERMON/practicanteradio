<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>
    <?php
        $pdf1 = isset($array_contenido["pdf_creacion_colectivos_radiales"]) ? $array_contenido["pdf_creacion_colectivos_radiales"] : null;
        $pdf2 = isset($array_contenido["estilo_rruc_radio"]) ? $array_contenido["estilo_rruc_radio"] : null;
        $pdf3 = isset($array_contenido["etica_estilo_ufps_radio"]) ? $array_contenido["etica_estilo_ufps_radio"] : null;
    ?>
    <div class="col-md-9 col-xs-12">
        <h1>Documentos UFPS Radio</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Documentos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 80%;">
                        <?php if (isset($pdf1)): ?>
                            <h3>Documento PDF Creación Colectivos Radiales</h3>
                            <iframe src="<?php echo base_url("public/archivos/pdf_radio/" . $pdf1); ?>" 
                                    width="100%" 
                                    height="500" 
                                    style="border: none;">
                            </iframe>
                        <?php endif; ?>            
                    </td>
                    <td style="width: 20%;">
                        <?php echo form_open_multipart(base_url('administracion/documentos_integrate_radio/pdf_creacion_colectivos_radiales'), ['onsubmit' => 'return validateFileInput(this)']); ?>
                        <div class="form-group">
                            <?php echo form_upload('documento', '', 'class="form-control" accept="application/pdf" required'); ?>
                        </div>
                        <?php echo form_submit('submit', 'Actualizar PDF', 'class="btn btn-primary"'); ?>
                        <?php echo form_close(); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 80%;">
                        <?php if (isset($pdf2)): ?>   
                            <h3>Documento Estilo RRUC Radio</h3>                     
                            <iframe src="<?php echo base_url("public/archivos/pdf_radio/" . $pdf2); ?>" 
                                    width="100%" 
                                    height="500" 
                                    style="border: none;">
                            </iframe>
                        <?php endif; ?>            
                    </td>
                    <td style="width: 20%;">
                        <?php echo form_open_multipart(base_url('administracion/documentos_integrate_radio/estilo_rruc_radio'), ['onsubmit' => 'return validateFileInput(this)']); ?>
                        <div class="form-group">
                            <?php echo form_upload('documento', '', 'class="form-control" accept="application/pdf" required'); ?>
                        </div>
                        <?php echo form_submit('submit', 'Actualizar PDF', 'class="btn btn-primary"'); ?>
                        <?php echo form_close(); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 80%;">
                        <?php if (isset($pdf3)): ?>
                            <h3>Documento Ética Estilo UFPS Radio</h3>                     
                            <iframe src="<?php echo base_url("public/archivos/pdf_radio/" . $pdf3); ?>" 
                                    width="100%" 
                                    height="500" 
                                    style="border: none;">
                            </iframe>
                        <?php endif; ?>
                    </td>
                    <td style="width: 20%;">
                        <?php echo form_open_multipart(base_url('administracion/documentos_integrate_radio/etica_estilo_ufps_radio'), ['onsubmit' => 'return validateFileInput(this)']); ?>
                        <div class="form-group">
                            <?php echo form_upload('documento', '', 'class="form-control" accept="application/pdf" required'); ?>
                        </div>
                        <?php echo form_submit('submit', 'Actualizar PDF', 'class="btn btn-primary"'); ?>
                        <?php echo form_close(); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
    @media (max-width: 768px) {
        .table {
            font-size: 14px; /* Ajusta el tamaño del texto en pantallas pequeñas */
        }
        iframe {
            height: 300px; /* Disminuye la altura del iframe en pantallas pequeñas */
        }
    }
</style>

<script>
// Función para validar el input file antes de enviar el formulario
function validateFileInput(form) {
    const fileInput = form.querySelector('input[type="file"]');
    if (!fileInput.files.length) {
        alert("Por favor, selecciona un archivo antes de enviar.");
        return false; // Evita el envío del formulario
    }
    return true; // Permite el envío del formulario
}
</script>
