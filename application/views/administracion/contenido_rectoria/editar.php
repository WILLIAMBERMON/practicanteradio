<style>
 /* file upload button */
input[type="file"]::file-selector-button {
  /*border-radius: 4px;*/
  padding: 0 16px;
  height: 40px;
  cursor: pointer;
  background-color: #aa1916;
  border: 1px solid rgba(0, 0, 0, 0.16);
  box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.05);
  margin-right: 16px;
  transition: background-color 200ms;
  color: white;
}

/* file upload button hover state */
input[type="file"]::file-selector-button:hover {
  background-color: darkgrey;
}

/* file upload button active state */
input[type="file"]::file-selector-button:active {
  background-color: #e5e7eb;
}
</style>
<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
    <h1 class="text-justify">Editar Información Rectoria</h1>
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
                <?php echo form_open_multipart('', ['class' => '', 'id' => 'form', 'role' => 'form'], ['editar' => 1]); ?>

                <?php $label = 'Nombre'; ?>
                <?php $name = 'NOMBRE'; ?>
                <div class="form-group col-md-6<?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => 'Nombre', 'name' => $name, 'maxlength' => 255, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                </div>
				
                <?php $label = 'Cargo'; ?>
                <?php $name = 'CARGO'; ?>
                <div class="form-group col-md-6 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 255, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                </div>

                
                <?php $label = 'Foto Actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($foto)): ?>
                            <img class="img img-bordered"
                                 src="<?php echo isset($foto) ? $foto : ""; ?>"
                                 width="500px;"/>
                        <?php else: ?>
                            <p>No existe una imagen</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Foto'; ?>
                <?php $name = 'FOTO'; ?>
                <div
                    class="form-group col-md-12 <?= (form_error($name) || isset($error_imagen) ? 'has-error has-feedback' : '') ?>">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <input id="<?php echo $name; ?>" accept="image/png , image/jpeg" type="file" name="<?php echo $name; ?>"/>
                    </div>
                    
                </div>

                
            </div>
        </div>
    </div>

    <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/contenido_rectoria'); ?>"
       style="margin-left:10px;">
        <i class="fa fa-backward"></i> Regresar
    </a>
    <?php echo form_button(['content' => '<i class="fa fa-floppy-o"></i> Guardar Cambios', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
    <?php echo form_close(); ?>
</div>
</div>