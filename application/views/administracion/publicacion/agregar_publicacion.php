<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h2 class="text-justify">Nueva Publicación</h2>
        <hr>

        <?php if (isset($error_imagen)): ?>
            <?php $error_imagen = str_replace("<p>", "", $error_imagen); ?>
            <?php $error_imagen = str_replace("</p>", "", $error_imagen); ?>
            <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_imagen . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
        <?php endif; ?>
        <?php if (isset($error_imagenar)): ?>
            <?php $error_imagenar = str_replace("<p>", "", $error_imagenar); ?>
            <?php $error_imagenar = str_replace("</p>", "", $error_imagenar); ?>
            <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_imagenar . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
        <?php endif; ?>

        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable text-justify">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'); ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <?php echo form_open_multipart('', ['class' => '', 'id' => 'form', 'role' => 'form'], ['agregar' => 1]); ?>

                    <?php $label = 'Nombre'; ?>
                    <?php $name = 'nombre'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 50, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Volumen'; ?>
                    <?php $name = 'volumen'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 5, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                    </div>

                    <?php $label = 'Número'; ?>
                    <?php $name = 'numero'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 5, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                    </div>

                    <?php $label = 'ISBN'; ?>
                    <?php $name = 'isbn'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 20, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                    </div>

                    <?php $label = 'Año'; ?>
                    <?php $name = 'year'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 4, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), ''); ?>
                    </div>

                    <?php $label = 'Edición'; ?>
                    <?php $name = 'edicion'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 5, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                    </div>

                    <?php $label = 'Imagen Portada'; ?>
                    <?php $recomendacion = 'Se recomienda que la imagen sea de formato .jpg, debe tener un peso menor que 30kb y una resolución fija de ancho 85px y largo de 126px'; ?>
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

                    <?php $label = 'Documento'; ?>
                    <?php $name = 'documento'; ?>
                    <?php $recomendacion = 'Se recomienda que el documento debe tener un peso menor que 2048kb'; ?>
                    <div
                        class="form-group col-md-6 <?= (form_error($name) || isset($error_documento) ? 'has-error has-feedback' : '') ?>">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                            <input class="form-control" accept="application/pdf" type="file" name="<?php echo $name; ?>"/>
                        </div>
                        <?php echo $recomendacion; ?>
                    </div>

                    <?php $label = 'Imagen Archivo'; ?>
                    <?php $recomendacion = 'Se recomienda que la imagen sea de formato .jpg, debe tener un peso menor que 900kb y una resolución fija de ancho 1276px y largo un máximo de 1860px'; ?>
                    <?php $name = 'imagenar'; ?>
                    <div
                        class="form-group col-md-6 <?= (form_error($name) || isset($error_imagenar) ? 'has-error has-feedback' : '') ?>">
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

        <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/contenido'); ?>"
           style="margin-left:10px;">
            <i class="fa fa-backward"></i> Regresar
        </a>
        <?php echo form_button(['content' => '<i class="fa fa-plus-circle"></i> Añadir', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
        <?php echo form_close(); ?>
    </div>
</div>