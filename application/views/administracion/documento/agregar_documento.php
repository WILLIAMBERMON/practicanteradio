<div class="col-md-9">
    <h2 class="text-justify">Nuevo Documento</h2>
    <hr>

    <?php if (isset($error_documento)): ?>
        <?php $error_documento = str_replace("<p>", "", $error_documento); ?>
        <?php $error_documento = str_replace("</p>", "", $error_documento); ?>
        <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_documento . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
    <?php endif; ?>

    <?php echo validation_errors('<div class="alert alert-danger alert-dismissable text-justify">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'); ?>
    <?php echo form_open_multipart('', ['class' => '', 'id' => 'form', 'role' => 'form'], ['agregar' => 1]); ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <?php $label = 'Nombre'; ?>
                <?php $name = 'nombre'; ?>
                <div class="form-group col-md-9 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 50, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                </div>

                <?php $label = 'Estado'; ?>
                <?php $name = 'estado'; ?>
                <div class="form-group col-md-3 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <select class="form-control" name="<?php echo $name; ?>">
                        <option value='1' <?php echo $this->input->post('estado') == '1' ? 'selected' : '' ?>>Visible
                        </option>
                        <option value='0' <?php echo $this->input->post('estado') == '0' ? 'selected' : '' ?>>Oculto
                        </option>
                    </select>
                </div>

                <?php $label = 'Documento'; ?>
                <?php $name = 'documento'; ?>
                <div
                    class="form-group col-md-12 <?= (form_error($name) || isset($error_documento) ? 'has-error has-feedback' : '') ?>">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <input class="form-control" accept="application/pdf" type="file" name="<?php echo $name; ?>" required/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="btn btn-primary pull-right" href="<?= site_url('administracion/documentos'); ?>" style="margin-left:10px;">
        <i class="fa fa-backward"></i> Regresar
    </a>
    <?php echo form_button(['content' => '<i class="fa fa-plus-circle"></i> Añadir', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
    <?php echo form_close(); ?>
</div>