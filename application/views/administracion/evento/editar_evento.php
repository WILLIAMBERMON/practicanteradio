<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
    <h1 class="text-justify">Editar Evento</h1>
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

                <?php $label = 'Título'; ?>
                <?php $name = 'titulo'; ?>
                <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 255, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                </div>
                <?php $label = 'Nombre corto (URL)'; ?>
                <?php $recomendacion = 'Se recomienda que el nombre corto no deba tener espacios en blanco ni tildes'; ?>
                <?php $name = 'id_titulo'; ?>
                <div class="form-group col-md-9 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 255, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    <?php echo $recomendacion; ?>
                </div>

                <?php $label = 'Publicar'; ?>
                <?php $name = 'publicar'; ?>
                <div class="form-group col-md-3 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <select class="form-control" name="<?php echo $name; ?>">
                        <option value='1' <?php echo $this->input->post('publicar') == '1' ? 'selected' : '' ?>>Visible
                        </option>
                        <option value='0' <?php echo $this->input->post('publicar') == '0' ? 'selected' : '' ?>>Oculto
                        </option>
                    </select>
                </div>

                <?php $label = 'URL'; ?>
                <?php $recomendacion = 'El URL se redirecciona automáticamente al evento que lo vincule'; ?>
                <?php $name = 'url'; ?>
                <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 255, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                    <?php echo $recomendacion; ?>
                </div>

                <?php $label = 'Lugar'; ?>
                <?php $name = 'lugar'; ?>
                <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 255, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                </div>


                <?php $label = 'Fecha Evento'; ?>
                <?php $name = 'fecha_evento'; ?>
                <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 50, 'placeholder' => '25 de diciembre del 2016', 'class' => 'form-control'], set_value($name), 'required'); ?>
                </div>

                <?php $label = 'Hora del Evento'; ?>
                <?php $name = 'hora_evento'; ?>
                <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 50, 'placeholder' => '12:00 p.m', 'class' => 'form-control'], set_value($name), 'required'); ?>
                </div>

                <?php $label = 'Fecha Inicio'; ?>
                <?php $name = 'fecha_inicio'; ?>
                <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => $name, 'name' => $name, 'type' => 'datetime-local', 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                </div>

                <?php $label = 'Fecha Fin'; ?>
                <?php $name = 'fecha_fin'; ?>
                <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => $name, 'name' => $name, 'type' => 'datetime-local', 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                </div>

                <?php $label = 'Contenido'; ?>
                <?php $name = 'contenido'; ?>
                <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <textarea class="ckeditor" maxlength="1000"
                                  name="<?php echo $name; ?>"><?php echo $this->input->post($name) ? $this->input->post($name) : ""; ?></textarea>
                    </div>
                </div>



                <?php $label = 'Contacto'; ?>
                <?php $name = 'contacto'; ?>
                <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <textarea class="ckeditor" maxlength="1000"
                                  name="<?php echo $name; ?>"><?php echo $this->input->post($name) ? $this->input->post($name) : ""; ?></textarea>
                    </div>
                </div>

                <?php $label = 'Imagen Pequeña Principal actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($imagen_pevento)): ?>
                            <img class="img img-bordered"
                                 src="<?php echo isset($imagen_pevento) ? $imagen_pevento : ""; ?>"
                                 width="500px;"/>
                        <?php else: ?>
                            <p>No existe una imagen asociada a esta noticia.</p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <?php $label = 'Imagen Pequeña Principal'; ?>
                <?php $recomendacion = 'Se recomienda que la imagen sea de formato .jpg, debe tener un peso menor que 50 KB y una resolución de (262X100)px'; ?>
                <?php $name = 'imagenp'; ?>
                <div
                    class="form-group col-md-12 <?= (form_error($name) || isset($error_imagenp) ? 'has-error has-feedback' : '') ?>">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <input class="form-control" accept="image/*" type="file" name="<?php echo $name; ?>"
                               required/>
                    </div>
                    <?php echo $recomendacion; ?>
                </div>

                <?php $label = 'Imagen actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($imagen_evento)): ?>
                            <img class="img img-bordered"
                                 src="<?php echo isset($imagen_evento) ? $imagen_evento : ""; ?>"
                                 width="500px;"/>
                        <?php else: ?>
                            <p>No existe una imagen asociada a esta noticia.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Imagen'; ?>
                <?php $recomendacion = 'Se recomienda que la imagen sea de formato .jpg, debe tener un peso menor que 150kb y una resolución de (708x354)px'; ?>
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
                <?php $recomendacion = 'Se recomienda que el documento debe tener un peso menor que 2048kb'; ?>
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

    <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/evento'); ?>"
       style="margin-left:10px;">
        <i class="fa fa-backward"></i> Regresar
    </a>
    <?php echo form_button(['content' => '<i class="fa fa-floppy-o"></i> Guardar Cambios', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
    <?php echo form_close(); ?>
</div>
    </div>