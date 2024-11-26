<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<h1>Lista de Categorias</h1>
<h1><?= ($item_sidebar_active) ?></h1>

<a href="<?php echo site_url('administracion/getColectivosRadiales'); ?>" class="btn btn-primary">Ver colectivos</a>
<br>
<br>
    <?php echo form_open_multipart(base_url('administracion/categorias_colectivo/true')); ?>

        <div class="form-group">
                    <?php echo form_label('Nueva Categoria:', 'nombre'); ?>
                    <?php echo form_input('nombre', set_value('nombre')); ?>
                    <?= form_error('nombre') ?>
        </div>
        <?php echo form_submit('submit', 'Guardar nueva categoria','class="btn btn-success"'); ?>
    <?php echo form_close(); ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categorias as $key => $value): ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo $value; ?></td>
            <td>
                <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Editar</a>

                <a href="<?php echo site_url('administracion/eliminarCategoriaColectivo/'.$key); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
                <?php echo form_open_multipart(base_url('administracion/editarCategoriaColectivo/'.$key)); ?>
                    <div class="form-group hidden" id="<?php echo $key; ?>">
                        <?php echo form_label('Editar la Categoria:', 'editar'); ?>
                        <?php echo form_input('editar', set_value('editar')); ?>
                        <?php echo form_submit('submit', 'Actualizar'); ?>
                    </div>
                <?php echo form_close(); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

<script>
    $(document).ready(function() {
        // Delegamos el evento click en los enlaces con la clase "btn-warning"
        $(document).on('click', '.btn-warning', function(e) {
            e.preventDefault(); // Evita que el enlace redirija
            // Obtenemos el id del formulario asociado
            var formularioId = $(this).closest('tr').find('td:first-child').text();
            // Mostramos el formulario seleccionado con una animación (opcional)
            $('#' + formularioId).removeClass('hidden').slideDown();
        });
    });
</script>
</div>