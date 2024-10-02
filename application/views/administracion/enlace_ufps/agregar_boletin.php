<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Nuevo Boletín</h1>
        <hr>

        <?php if (isset($error_imagen_noti_div)) : ?>
            <?php $error_imagen_noti_div = str_replace("<p>", "", $error_imagen_noti_div); ?>
            <?php $error_imagen_noti_div = str_replace("</p>", "", $error_imagen_noti_div); ?>
            <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_imagen_noti_div . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
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

                    <?php $label = 'Edición'; ?>
                    <?php $name = 'edicion'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'type' => 'number', 'name' => $name, 'maxlength' => 3, 'placeholder' => 'Escriba el número de la edición', 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Año'; ?>
                    <?php $name = 'anyo'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'type' => 'number', 'name' => $name, 'maxlength' => 4, 'placeholder' => 'Escriba el año de la edición', 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Estado'; ?>
                    <?php $name = 'estado'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <select class="form-control" name="<?php echo $name; ?>">
                            <option value='1' <?php echo $this->input->post('estado') == '1' ? 'selected' : '' ?>>
                                Visible
                            </option>
                            <option value='0' <?php echo $this->input->post('estado') == '0' ? 'selected' : '' ?>>
                                Oculto
                            </option>
                        </select>
                    </div>

                    <?php $label = 'Plantilla'; ?>
                    <?php $name = 'id_template_correo'; ?>
                            <div
                                class="form-group col-md-4 <?php echo(form_error($name) ? 'has-error has-feedback' : ''); ?>">
                                <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                                <?php echo form_dropdown($name, $listado_plantilla, $this->input->post($name), "id=$name class='form-control' required"); ?>
                                <?php if (form_error($name)): ?>
                                    <?php echo form_error($name, "<span class='text-danger'>", "</span>"); ?>
                                <?php endif; ?>
                            </div>
                      
                </div>
            </div>
        </div>

        <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/correos_enlace_informativo'); ?>" style="margin-left:10px;">
            <i class="fa fa-backward"></i> Regresar
        </a>
        <?php echo form_button(['content' => '<i class="fa fa-plus-circle"></i> Añadir', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
        <?php echo form_close(); ?>
    </div>
</div>