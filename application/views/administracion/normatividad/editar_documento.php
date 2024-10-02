<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
    <h1 class="text-justify">Editar Documento</h1>
        <h3>Entidad: <?php if(isset($nombre_entidad)): ?>
                <?php echo $nombre_entidad; ?>
            <?php endif; ?></h3>
        <h3>Acto: <?php if(isset($nombre_acto)): ?>
                <?php echo $nombre_acto; ?>
            <?php endif; ?></h3>
    <hr>

    <?php echo validation_errors('<div class="alert alert-danger alert-dismissable text-justify">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <?php echo form_open_multipart('', ['class' => '', 'id' => 'form', 'role' => 'form'], ['editar' => 1]); ?>

                <?php $label = 'Número de acto'; ?>
                <?php $name = 'numero_acto'; ?>
                <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 20, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                </div>

                <?php $label = 'Fecha del documento'; ?>
                <?php $name = 'fecha_documento'; ?>
                <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => $name, 'name' => $name, 'type' => 'date', 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
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


                <?php $label = 'Descripción del documento'; ?>
                <?php $name = 'descripcion_documento'; ?>
                <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <textarea class="ckeditor" maxlength="4000"
                                  name="<?php echo $name; ?>"><?php echo $this->input->post($name) ? $this->input->post($name) : ""; ?></textarea>
                    </div>
                </div>

                <?php $label = 'Documento actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (isset($ruta_documento)): ?>
                            <a class="btn btn-primary"
                               href="<?php echo isset($ruta_documento) ? $ruta_documento : ""; ?>"
                               download="download">
                                <i class="fa fa-file-pdf-o"></i>&nbsp;
                                Descargar archivo
                            </a>
                        <?php else: ?>
                            <span
                                class="label label-info">Actualmente no existe ningun documento cargado en el sistema.</span>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Documento'; ?>
                <?php $name = 'documento'; ?>
                <?php $recomendacion = 'Se recomienda que el documento debe tener un peso menor que 5120kb'; ?>
                <div
                    class="form-group col-md-12 <?= (form_error($name) || isset($error_documento) ? 'has-error has-feedback' : '') ?>">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <input class="form-control" accept="application/pdf" type="file" name="<?php echo $name; ?>"/>
                    </div>
                    <?php echo $recomendacion; ?>
                </div>
            </div>
        </div>
    </div>

    <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/acto'); ?>"
       style="margin-left:10px;">
        <i class="fa fa-backward"></i> Regresar
    </a>
    <?php echo form_button(['content' => '<i class="fa fa-floppy-o"></i> Guardar Cambios', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
    <?php echo form_close(); ?>
</div>
    </div>