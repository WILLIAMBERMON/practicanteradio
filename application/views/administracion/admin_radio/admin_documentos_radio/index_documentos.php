<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>
    <?php
    $pdf1= isset($array_contenido["pdf_creacion_colectivos_radiales"]) ? $array_contenido["pdf_creacion_colectivos_radiales"] : null ;
    $pdf2= isset($array_contenido["estilo_rruc_radio"]) ? $array_contenido["estilo_rruc_radio"] : null ;
    $pdf3= isset($array_contenido["etica_estilo_ufps_radio"]) ? $array_contenido["etica_estilo_ufps_radio"] : null ;

    ?>

        <div class="col-md-9">

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
            <td>
                <?php if(isset($pdf1)): ?>
            <iframe src="<?php echo base_url("public/archivos/pdf_radio/" . $pdf1 ); ?>" 
                width="300" 
                height="400" 
                style="border: none;">
            </iframe>
            <?php endif; ?>            
            </td>
            <td>
            <?php echo form_open_multipart(base_url('administracion/documentos_integrate_radio/pdf_creacion_colectivos_radiales')); ?>
                <div class="form-group">
                    <?php echo form_label('Documento pdf creacion colectivos radiales', 'documento',''); ?>
                    <?php echo form_upload('documento',"",'class="form-control"'); ?>
                </div>
            
                <?php echo form_submit('submit', 'Actualizar PDF'); ?>
            <?php echo form_close(); ?>

            </td>
        </tr>
        <tr>          
            <td>
                            <?php if(isset($pdf2)): ?>                        
            <iframe src="<?php echo base_url("public/archivos/pdf_radio/" . $pdf2 ); ?>" 
                width="300" 
                height="400" 
                style="border: none;">
            </iframe>
                        <?php endif; ?>            
            </td>
            <td>
            <?php echo form_open_multipart(base_url('administracion/documentos_integrate_radio/estilo_rruc_radio')); ?>
                <div class="form-group">
                    <?php echo form_label('Documento estilo rruc radio', 'documento',''); ?>
                    <?php echo form_upload('documento',"",'class="form-control"'); ?>
                </div>
            
                <?php echo form_submit('submit', 'Actualizar PDF'); ?>
            <?php echo form_close(); ?>

            </td>
        </tr>
        <tr>          
            <td>
                <?php if(isset($pdf3)): ?>
            <iframe src="<?php echo base_url("public/archivos/pdf_radio/" . $pdf3 ); ?>" 
                width="300" 
                height="400" 
                style="border: none;">
            </iframe>
            </td>
            <?php endif; ?>
            <td>
            <?php echo form_open_multipart(base_url('administracion/documentos_integrate_radio/etica_estilo_ufps_radio')); ?>
                <div class="form-group">
                    <?php echo form_label('Documento etica estilo ufps radio', 'documento',''); ?>
                    <?php echo form_upload('documento',"",'class="form-control"'); ?>
                </div>
            
                <?php echo form_submit('submit', 'Actualizar PDF'); ?>
            <?php echo form_close(); ?>

            </td>
        </tr>
    </tbody>
</table>
</div>

</div>