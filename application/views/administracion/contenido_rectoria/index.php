<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Información de Rectoria</h1>
        <hr>
        <?php if (!empty($inforectoria)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Nombre</strong>
                    </td>
                    <td>
                        <strong>Cargo</strong>
                    </td>
                    <td>
                        <strong>Foto</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                    
                </tr>
                </thead>
                <tr class="">
                    <td>
                        <?php echo $inforectoria->NOMBRE; ?>
                    </td>
                    <td>
                        <?php echo $inforectoria->CARGO; ?>
                    </td>
                    <td>
                        <?php echo $inforectoria->FOTO; ?>
                    </td>
                    
                    <td>
                        <?php echo form_open(site_url('administracion/editar_contenido_rectoria?id_info_rec='.$inforectoria->ID_INFO_REC), ['class' => '', 'id' => 'form', 'role' => 'form']); ?>
                        <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                            <i class="fa fa-pencil-square-o"></i></button>
                        <?php echo form_close(); ?>
                    </td>
                </tr>                    
                
            </table>
        <?php endif;?>
        
    </div>
</div>