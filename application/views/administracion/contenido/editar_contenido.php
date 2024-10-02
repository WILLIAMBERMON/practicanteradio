<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h2 class="text-justify">Editar Contenido</h2>
        <hr>

        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable text-justify">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'); ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <?php echo form_open_multipart('', ['class' => '', 'id' => 'form', 'role' => 'form'], ['editar' => 1]); ?>

                    <?php $label = 'Nombre'; ?>
                    <?php $name = 'nombre_contenido'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 100, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Descripción'; ?>
                    <?php $name = 'desc_contenido'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                        <textarea class="ckeditor" maxlength="8000"
                                  name="<?php echo $name; ?>"><?php echo $this->input->post($name) ? $this->input->post($name) : ""; ?></textarea>
                        </div>
                    </div>

                    <?php $label = 'Seleccionar subcontenido'; ?>
                    <?php $name = 'sub_call_contenido'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <select class="form-control" name="<?php echo $name; ?>" id="<?php echo $name; ?>" onchange="validar_tipo_enlace()">
                            <option value=''>
                                Seleccione una opción
                            <option value='0' <?php echo $this->input->post('sub_call_contenido') == '0' ? 'selected' : '' ?>>
                                No Actualizar
                            </option>
                            <option value='1' <?php echo $this->input->post('sub_call_contenido') == '1' ? 'selected' : '' ?>>
                                Grupo de Trabajo - Administrativo
                            </option>
                            <option value='2' <?php echo $this->input->post('sub_call_contenido') == '2' ? 'selected' : '' ?>>
                                Grupo de Trabajo - Docentes
                            </option>
                            <option value='3' <?php echo $this->input->post('sub_call_contenido') == '3' ? 'selected' : '' ?>>
                                No incrustar subcontenido
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/contenido'); ?>"
           style="margin-left:10px;">
            <i class="fa fa-backward"></i> Regresar
        </a>
        <?php echo form_button(['content' => '<i class="fa fa-floppy-o"></i> Guardar Cambios', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
        <?php echo form_close(); ?>
    </div>
</div>