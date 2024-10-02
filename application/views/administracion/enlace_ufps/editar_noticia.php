<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Editar Noticia Boletín</h1>
        <hr>

        <?php if (isset($error_imagen_noti_enlace)): ?>
            <?php $error_imagen_noti_enlace = str_replace("<p>", "", $error_imagen_noti_enlace); ?>
            <?php $error_imagen_noti_enlace = str_replace("</p>", "", $error_imagen_noti_enlace); ?>
            <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_imagen_noti_enlace . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
        <?php endif; ?>


        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable text-justify">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'); ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <?php echo form_open_multipart('', ['class' => '', 'id' => 'form', 'role' => 'form'], ['editar' => 1, 'id_noticia' => $noticia->ID]); ?>

                    <?php $label = 'Nombre'; ?>
                    <?php $name = 'NOMBRE'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 500, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    
            <?php $label = 'Estado'; ?>
            <?php $name = 'ESTADO'; ?>
            <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                <select class="form-control" name="<?php echo $name; ?>">
                    <option value='1' <?php echo $this->input->post('ESTADO') == '1' ? 'selected' : '' ?>>
                        Visible
                    </option>
                    <option value='0' <?php echo $this->input->post('ESTADO') == '0' ? 'selected' : '' ?>>
                        Oculto
                    </option>
                </select>
            </div>

            <?php $label = 'Url'; ?>
            <?php $name = 'URL'; ?>
            <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 500, 'placeholder' => 'Escriba el nombre el url de la noticia', 'class' => 'form-control'], set_value($name), 'required'); ?>
            </div>

                    
                    <?php $label = 'Resumen'; ?>
                    <?php $name = 'RESUMEN'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                        <textarea class="ckeditor" minlength="60" maxlength="1000"
                                  name="<?php echo $name; ?>"><?php echo $this->input->post($name) ? $this->input->post($name) : ""; ?></textarea>
                        </div>
                    </div>

                    <?php $label = 'Descripción'; ?>
                    <?php $name = 'DESCRIPCION'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                        <textarea class="ckeditor" maxlength="8000"
                                  name="<?php echo $name; ?>"><?php echo $this->input->post($name) ? $this->input->post($name) : ""; ?></textarea>
                        </div>
                    </div>

                    
            <?php $label = 'Orden'; ?>
            <?php $name = 'ORDEN'; ?>
            <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                <?php echo form_input(['id' => $name, 'type' => 'number', 'name' => $name, 'maxlength' => 2, 'placeholder' => 'Escriba el número del orden', 'class' => 'form-control'], set_value($name), 'required'); ?>
            </div>

            <?php $label = 'Orientación'; ?>
            <?php $name = 'ORIENTACION'; ?>
            <div class="form-group col-md-12 <?php echo (form_error($name) ? 'has-error has-feedback' : ''); ?>">
                <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                <?php echo form_dropdown($name, $opc_ori, $this->input->post($name), "id=$name class='form-control' required"); ?>
                <?php if (form_error($name)) : ?>
                    <?php echo form_error($name, "<span class='text-danger'>", "</span>"); ?>
                <?php endif; ?>
            </div>

            <?php $label = 'Firma'; ?>
            <?php $name = 'FIRMA'; ?>
            <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                <label class="control-label">
                    <?php echo $label; ?>
                </label>
                <div>
                    <textarea class="ckeditor" maxlength="2000" name="<?php echo $name; ?>"><?php echo $this->input->post($name) ? $this->input->post($name) : ""; ?></textarea>
                </div>
            </div>

                    <?php $label = 'Imagen de Presentación'; ?>
                    <div class="form-group col-md-12">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                            <?php if (!empty($imagen_noti)): ?>
                                <img class="img img-bordered"
                                     src="<?php echo isset($imagen_noti) ? $imagen_noti : ""; ?>"
                                     width="500px;"/>
                            <?php else: ?>
                                <p>No existe una imagen asociada a esta noticia.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php $label = 'Cambiar Imagen'; ?>
                    <?php $recomendacion = 'Se recomienda que la imagen sea de formato .jpg, debe tener un peso menor que 200 KB y una resolución de (342X347)px'; ?>
                    <?php $name = 'imagen_noti_enlace'; ?>
                    <div
                        class="form-group col-md-12 <?= (form_error($name) || isset($error_imagen_noti_div) ? 'has-error has-feedback' : '') ?>">
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

        <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/contenido_enlace_informativo'); ?>"
           style="margin-left:10px;">
            <i class="fa fa-backward"></i> Regresar
        </a>
        <?php echo form_button(['content' => '<i class="fa fa-plus-circle"></i> Editar', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
        <?php echo form_close(); ?>
    </div>
</div>