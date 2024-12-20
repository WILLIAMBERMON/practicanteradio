<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

<h1>Lista de Categorias</h1>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<br>
<?php echo form_open_multipart(base_url('administracion/categorias_colectivo/true'), ['class' => 'form-inline']); ?>

<div class="form-group">
    <?php echo form_label('Nueva Categoría:', 'nombre', ['class' => 'control-label']); ?>
    <?php echo form_input([
        'name' => 'nombre',
        'id' => 'nombre',
        'class' => 'form-control',
        'value' => set_value('nombre'),
        'placeholder' => 'Ingrese la categoría',
        'required' => true,
    ]); ?>
    <?= form_error('nombre', '<span class="text-danger">', '</span>') ?>
</div>

<?php echo form_submit('submit', 'Guardar', 'class="btn btn-success"'); ?>

<?php echo form_close(); ?>

<br>
    <script src="<?php echo base_url("assets/plugins/jquery/jQuery-3.5.1.min.js")?>"></script>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 10%;">ID</th>
            <th style="width: 50%;">Categoría</th>
            <th style="width: 40%;">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categorias as $key => $value): ?>
        <tr>
            <td class="text-center"><?php echo $key; ?></td>
            <td>
                <span class="categoria-label"><?php echo $value; ?></span>
                <!-- Formulario oculto para edición -->
                <div class="form-edit hidden" id="edit-<?php echo $key; ?>">
                    <?php echo form_open_multipart(base_url('administracion/editarCategoriaColectivo/'.$key), ['class' => 'form-inline form-update']); ?>
                    <div class="form-group">
                        <?php echo form_input([
                            'name' => 'editar',
                            'id' => 'editar-' . $key,
                            'class' => 'form-control input-sm',
                            'value' => set_value('editar', $value),
                            'placeholder' => 'Editar categoría',
                            'required' => 'required', // Validación HTML5
                            'oninvalid' => "this.setCustomValidity('Por favor, ingrese una categoría válida.')",
                            'oninput' => "this.setCustomValidity('')", // Limpia el mensaje al escribir
                        ]); ?>
                    </div>
                    <?php echo form_submit('submit', 'Actualizar', 'class="btn btn-primary btn-sm btn-submit"'); ?>
                    <?php echo form_close(); ?>
                </div>
            </td>
            <td class="text-center">
                <a href="#" class="btn btn-warning btn-sm btn-edit" data-id="<?php echo $key; ?>"><i class="fa fa-pencil"></i> Editar</a>
                <a href="<?php echo site_url('administracion/eliminarCategoriaColectivo/' . $key); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

<a class="btn btn-danger pull-left" href="<?php echo site_url('administracion/getColectivosRadiales'); ?>"
style="margin-left:10px;" bis_skin_checked="1">
    <i class="fa fa-backward"></i> Regresar
</a>


<script>
    $(document).ready(function () {
        // Manejar clic en el botón Editar
        $(document).on('click', '.btn-edit', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            // Ocultar todos los formularios activos
            $('.form-edit').addClass('hidden');
            $('.categoria-label').show(); // Restaurar texto si quedó oculto

            // Ocultar el texto de la categoría y mostrar el formulario
            var $parentRow = $(this).closest('tr'); // Obtener la fila actual
            $parentRow.find('.categoria-label').hide(); // Ocultar el texto
            $parentRow.find('.form-edit').removeClass('hidden').hide().slideDown(); // Mostrar el formulario
        });
    });
</script>
</div>