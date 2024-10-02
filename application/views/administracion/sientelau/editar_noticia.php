<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Editar Noticia Divisist</h1>
        <hr>

        <?php if (isset($error_imagen_noti_div)): ?>
            <?php $error_imagen_noti_div = str_replace("<p>", "", $error_imagen_noti_div); ?>
            <?php $error_imagen_noti_div = str_replace("</p>", "", $error_imagen_noti_div); ?>
            <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_imagen_noti_div . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
        <?php endif; ?>


        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable text-justify">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'); ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <?php echo form_open_multipart('', ['class' => '', 'id' => 'form', 'role' => 'form'], ['editar' => 1, 'ID_NOTICIA' => $id_noticia, 'TIPO' => $tipo, 'IMAGEN_NOTI' => $imagen_noti]); ?>

                    <?php $label = 'Título'; ?>
                    <?php $name = 'TITULO'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 200, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'disabled'); ?>
                    </div>

                    <?php $label = 'Descripción'; ?>
                    <?php $name = 'CONTENIDO'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                        <textarea class="ckeditor" maxlength="2000"
                                  name="<?php echo $name; ?>"><?php echo $this->input->post($name) ? $this->input->post($name) : ""; ?></textarea>
                        </div>
                    </div>

                    <?php $label = 'Tipo'; ?>
                    <?php $name = 'TIPO'; ?>
                    <div class="form-group col-md-2 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 200, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'disabled'); ?>
                    </div>

                    <?php $label = 'Publicar'; ?>
                    <?php $name = 'ESTADO'; ?>
                    <div class="form-group col-md-5 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
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

<!--                    --><?php //$label = 'Fecha'; ?>
<!--                    --><?php //$name = 'fecha_vencimiento'; ?>
<!--                    <div class="form-group col-md-4 --><?//= (form_error($name) ? 'has-error has-feedback' : '') ?><!--">-->
<!--                        --><?php //echo form_label($label, $name, ['class' => 'control-label']); ?>
<!--                        --><?php //echo form_input(['id' => $name, 'name' => $name, 'type' => 'datetime-local', 'placeholder' => 'dd/mm/aaaa', 'class' => 'form-control'], set_value($name), 'required'); ?>
<!--                    </div>-->

                    <div class='col-md-5'>
                        <input type="hidden" name="INICIO" id="inicio" value="<?php echo $fecha_ven; ?>">
                        <div class="form-group <?php echo (form_error('FECHA_VENCIMIENTO') ? 'has-error has-feedback' : 'has-feedback'); ?>">
                            <label>Fecha del evento</label>
                            <div class='input-group date' id='datetimepicker6'>

                                <input type='text' class="form-control input-group-addon" id="FECHA_VENCIMIENTO" name="FECHA_VENCIMIENTO" required="required"/>
                                <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
                            </div>
                            <?php if (form_error("FECHA_VENCIMIENTO")): ?>
                                <?php echo form_error("FECHA_VENCIMIENTO", "<span class='text-danger'>", "</span>"); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php $label = 'URL'; ?>
                    <?php $recomendacion = 'Se recomienda que el url sea completo incluyendo el http:// o https://'; ?>
                    <?php $name = 'URL'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 200, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                        <?php echo $recomendacion; ?>
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
                    <?php $recomendacion = 'Se recomienda que la imagen sea de formato .jpg, debe tener un peso menor que 80 KB y una resolución de (270X110)px'; ?>
                    <?php $name = 'imagen_noti_div'; ?>
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

        <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/noticia_divisist'); ?>"
           style="margin-left:10px;">
            <i class="fa fa-backward"></i> Regresar
        </a>
        <?php echo form_button(['content' => '<i class="fa fa-plus-circle"></i> Editar', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
        <?php echo form_close(); ?>
    </div>
</div>