<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Editar Noticia</h1>
        <hr>

        <?php if (isset($error_imagen)): ?>
            <?php $error_imagen = str_replace("<p>", "", $error_imagen); ?>
            <?php $error_imagen = str_replace("</p>", "", $error_imagen); ?>
            <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_imagen . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
        <?php endif; ?>
        <?php if (isset($error_imagenp)): ?>
            <?php $error_imagenp = str_replace("<p>", "", $error_imagenp); ?>
            <?php $error_imagenp = str_replace("</p>", "", $error_imagenp); ?>
            <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_imagenp . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
        <?php endif; ?>
        <?php if (isset($error_imgalterna)): ?>
            <?php $error_imgalterna = str_replace("<p>", "", $error_imgalterna); ?>
            <?php $error_imgalterna = str_replace("</p>", "", $error_imgalterna); ?>
            <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_imgalterna . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
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
                            <option value='1' <?php echo $this->input->post('publicar') == '1' ? 'selected' : '' ?>>
                                Visible
                            </option>
                            <option value='0' <?php echo $this->input->post('publicar') == '0' ? 'selected' : '' ?>>
                                Oculto
                            </option>
                        </select>
                    </div>


                    <?php $label = 'Número Noticia'; ?>
                    <?php $name = 'numero'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 3, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Fecha'; ?>
                    <?php $name = 'fecha'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'type' => 'date', 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Video (Enlace)'; ?>
                    <?php $descripcion = 'Ejemplo: https://youtu.be/PlX7xEa4Yxg'; ?>
                    <?php $name = 'video2'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 200, 'placeholder' => $descripcion, 'class' => 'form-control'], set_value($name)); ?>
                    </div>
                    <?php $label = 'Descripción del video'; ?>
                    <?php $name = 'descripcion_video2'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 255, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                    </div>

                    <?php $label = 'Descripción'; ?>
                    <?php $name = 'contenido'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                        <textarea class="ckeditor" maxlength="4000"
                                  name="<?php echo $name; ?>"><?php echo $this->input->post($name) ? $this->input->post($name) : ""; ?></textarea>
                        </div>
                    </div>

<!--                    --><?php //$label = 'Firma'; ?>
<!--                    --><?php //$name = 'firma'; ?>
<!--                    <div class="form-group col-md-12 --><?//= (form_error($name) ? 'has-error has-feedback' : '') ?><!--">-->
<!--                        <label class="control-label">-->
<!--                            --><?php //echo $label; ?>
<!--                        </label>-->
<!--                        <div>-->
<!--                        <textarea class="ckeditor" maxlength="1000"-->
<!--                                  name="--><?php //echo $name; ?><!--" disabled="true">--><?php //echo $this->input->post($name) ? $this->input->post($name) : ""; ?><!--</textarea>-->
<!--                        </div>-->
<!--                    </div>-->

                    <?php $label = 'Imagen Principal Slider'; ?>
                    <div class="form-group col-md-12">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                            <?php if (!empty($imagen_noticia)): ?>
                                <img class="img img-bordered"
                                     src="<?php echo isset($imagen_noticia) ? $imagen_noticia : ""; ?>"
                                     width="500px;"/>
                            <?php else: ?>
                                <p>No existe una imagen asociada a esta noticia.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php $label = 'Cambiar Imagen'; ?>
                    <?php $recomendacion = 'Se recomienda que la imagen sea de formato .jpg, debe tener un peso menor que 200 KB y una resolución de (1900X550)px'; ?>
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

                    <?php $label = 'Imagen Pequeña Principal'; ?>
                    <div class="form-group col-md-12">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                            <?php if (!empty($imagen_pequena)): ?>
                                <img class="img img-bordered"
                                     src="<?php echo isset($imagen_pequena) ? $imagen_pequena : ""; ?>"
                                     width="100px;"/>
                            <?php else: ?>
                                <p>No existe una imagen asociada a esta noticia.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php $label = 'Cambiar Imagen'; ?>
                    <?php $recomendacion = 'Se recomienda que la imagen sea de formato .jpg, debe tener un peso menor que 40 KB y una resolución de (100X36)px'; ?>
                    <?php $name = 'imagenp'; ?>
                    <div
                        class="form-group col-md-12 <?= (form_error($name) || isset($error_imagenp) ? 'has-error has-feedback' : '') ?>">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                            <input class="form-control" accept="image/*" type="file" name="<?php echo $name; ?>"/>
                        </div>
                        <?php echo $recomendacion; ?>
                    </div>

                    <?php $label = 'Imagen de Contenido'; ?>
                    <div class="form-group col-md-12">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                            <?php if (!empty($imagen_alterna)): ?>
                                <img class="img img-bordered"
                                     src="<?php echo isset($imagen_alterna) ? $imagen_alterna : ""; ?>"
                                     width="500px;"/>
                            <?php else: ?>
                                <p>No existe una imagen asociada a esta noticia.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php $label = 'Cambiar Imagen'; ?>
                    <?php $recomendacion = 'Se recomienda que la imagen sea de formato .jpg, debe tener un peso menor que 80 KB y una resolución de (800X300)px'; ?>
                    <?php $name = 'imgalterna'; ?>
                    <div
                        class="form-group col-md-12 <?= (form_error($name) || isset($error_imgalterna) ? 'has-error has-feedback' : '') ?>">
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

        <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/noticia'); ?>"
           style="margin-left:10px;">
            <i class="fa fa-backward"></i> Regresar
        </a>
        <?php echo form_button(['content' => '<i class="fa fa-floppy-o"></i> Guardar Cambios', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
        <?php echo form_close(); ?>
    </div>
</div>