<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h2 class="text-justify">Nuevo Grupo</h2>
        <hr>

        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable text-justify">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'); ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <?php echo form_open_multipart('', ['class' => '', 'id' => 'form', 'role' => 'form'], ['agregar' => 1]); ?>

                    <?php $label = 'Nombre'; ?>
                    <?php $name = 'nombre'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 250, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Tipo'; ?>
                    <?php $name = 'tipo'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <select class="form-control" name="<?php echo $name; ?>">
                            <option value='1' <?php echo $this->input->post('tipo') == '1' ? 'selected' : '' ?>>
                                Grupo
                            </option>
                            <option value='2' <?php echo $this->input->post('tipo') == '2' ? 'selected' : '' ?>>
                                Semillero
                            </option>
                        </select>
                    </div>

                    <?php $label = 'Director'; ?>
                    <?php $name = 'director'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 200, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Departamento'; ?>
                    <?php $name = 'departamento'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 200, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                    </div>

                    <?php $label = 'Correo'; ?>
                    <?php $name = 'correo'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 100, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                    </div>

                    <?php $label = 'Línea'; ?>
                    <?php $name = 'linea'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 255, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                    </div>

                    <?php $label = 'Enlace'; ?>
                    <?php $name = 'enlace'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 100, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                    </div>

                    <?php $label = 'Estatus'; ?>
                    <?php $name = 'estatus'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 100, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                    </div>

                    <?php $label = 'Fecha'; ?>
                    <?php $name = 'fecha'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'type' => 'date', 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Publicar'; ?>
                    <?php $name = 'publicar'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <select class="form-control" name="<?php echo $name; ?>">
                            <option value='1' <?php echo $this->input->post('publicar') == '1' ? 'selected' : '' ?>>
                                Visible
                            </option>
                            <option value='0' <?php echo $this->input->post('publicar') == '0' ? 'selected' : '' ?>>
                                Oculto
                            </option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/investigacion'); ?>"
           style="margin-left:10px;">
            <i class="fa fa-backward"></i> Regresar
        </a>
        <?php echo form_button(['content' => '<i class="fa fa-plus-circle"></i> Añadir', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
        <?php echo form_close(); ?>
    </div>
</div>