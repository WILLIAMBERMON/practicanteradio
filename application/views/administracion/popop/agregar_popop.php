<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Nuevo Popop</h1>
        <hr>

        <?php if (isset($error_imagen)): ?>
            <?php $error_imagen = str_replace("<p>", "", $error_imagen); ?>
            <?php $error_imagen = str_replace("</p>", "", $error_imagen); ?>
            <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_imagen . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
        <?php endif; ?>

        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable text-justify">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'); ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <?php echo form_open_multipart('', ['class' => '', 'id' => 'form', 'role' => 'form'], ['agregar' => 1]); ?>

                    <?php $label = 'Título'; ?>
                    <?php $name = 'titulo'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 255, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Descripción'; ?>
                    <?php $name = 'descripcion'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 255, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                    </div>


                    <?php $label = 'URL'; ?>
                    <?php $recomendacion = 'El URL se redirecciona automáticamente al popop que lo vincule'; ?>
                    <?php $name = 'enlace'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 255, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                        <?php echo $recomendacion; ?>
                    </div>

                    <?php $label = 'Publicar'; ?>
                    <?php $name = 'publicar'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <select class="form-control" name="<?php echo $name; ?>">
                            <option value='1' <?php echo $this->input->post('publicar') == '1' ? 'selected' : '' ?>>Visible
                            </option>
                            <option value='0' <?php echo $this->input->post('publicar') == '0' ? 'selected' : '' ?>>Oculto
                            </option>
                        </select>
                    </div>

                    <?php $label = 'Video (Enlace)'; ?>
                    <?php $descripcion = 'https://youtu.be/PlX7xEa4Yxg'; ?>
                    <?php $name = 'video'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 200, 'placeholder' => $descripcion, 'class' => 'form-control'], set_value($name)); ?>
                    </div>

                    <?php $label = 'Fecha Inicio de Publicación'; ?>
                    <?php $name = 'fecha_inicio'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'type' => 'datetime-local', 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Fecha Final de Publicación'; ?>
                    <?php $name = 'fecha_fin'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'type' => 'datetime-local', 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Imagen'; ?>
                    <?php $recomendacion = 'Se recomienda que la imagen sea de formato .jpg, debe tener un peso menor que 150kb y una resolución de fija de ancho 568px y largo menor que 568px'; ?>
                    <?php $name = 'imagen'; ?>
                    <div
                        class="form-group col-md-12 <?= (form_error($name) || isset($error_imagen) ? 'has-error has-feedback' : '') ?>">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                            <input class="form-control" accept="image/*" type="file" name="<?php echo $name; ?>"/>
                        </div>
                        <?php echo $recomendacion; ?>
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/popop'); ?>"
           style="margin-left:10px;">
            <i class="fa fa-backward"></i> Regresar
        </a>
        <?php echo form_button(['content' => '<i class="fa fa-plus-circle"></i> Añadir', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
        <?php echo form_close(); ?>
    </div>
</div>