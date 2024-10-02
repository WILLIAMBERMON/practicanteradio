<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Nuevo Menú</h1>
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
                    <?php echo form_open_multipart('', ['class' => '', 'id' => 'form', 'role' => 'form'], ['agregar' => 1]); ?>

                    <?php $label = 'Nombre'; ?>
                    <?php $name = 'nombre_menu'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 100, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>
                    
                    <?php $label = 'Orden submenú'; ?>
                    <?php $name = 'orden_menu'; ?>
                    <div class="form-group col-md-6 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 2, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Publicar'; ?>
                    <?php $name = 'publicar'; ?>
                    <div class="form-group col-md-6 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
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

                    <?php $label = 'Enlace menú Actual'; ?>
                    <?php $name = 'enlace_menu'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <hr class="devider devider-dotted">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 200, 'placeholder' => $label, 'class' => 'form-control', 'disabled' => true], set_value($name)); ?>
                    </div>

                    <?php $label = 'Seleccionar tipo de enlace'; ?>
                    <?php $name = 'tipo_enlace'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <select class="form-control" name="<?php echo $name; ?>" id="<?php echo $name; ?>" onchange="validar_tipo_enlace()" required>
                            <option
                                value='' <?php echo $this->input->post('tipo_enlace') != '0' && $this->input->post('tipo_enlace') != '1' ? 'selected' : '' ?>>
                                Seleccione una opción
                            <option value='0' <?php echo $this->input->post('tipo_enlace') == '0' ? 'selected' : '' ?>>
                                No Actualizar
                            </option>
                            <option value='1' <?php echo $this->input->post('tipo_enlace') == '1' ? 'selected' : '' ?>>
                                Contenido
                            </option>
                            <option value='2' <?php echo $this->input->post('tipo_enlace') == '2' ? 'selected' : '' ?>>
                                Documento
                            </option>
                            <option value='3' <?php echo $this->input->post('tipo_enlace') == '3' ? 'selected' : '' ?>>
                                Link Externo
                            </option>
                            <option value='4' <?php echo $this->input->post('tipo_enlace') == '4' ? 'selected' : '' ?>>
                                Grupos de Investigación
                            </option>
                            <option value='5' <?php echo $this->input->post('tipo_enlace') == '5' ? 'selected' : '' ?>>
                                Publicaciones
                            </option>
                            <option value='6' <?php echo $this->input->post('tipo_enlace') == '6' ? 'selected' : '' ?>>
                                No Enlazar
                            </option>
                        </select>
                    </div>

                    <?php $label = 'Contenido'; ?>
                    <?php $name = 'enlace_contenido'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <select class="form-control" name="<?php echo $name; ?>" id="<?php echo $name; ?>" disabled>
                            <?php foreach ($contenidos as $contenido): ?>
                                <option value='<?php echo $contenido->id_contenido;?>'><?php echo $contenido->nombre_contenido;?></option>
                            <?php endforeach; ?>
                        </select>
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
                            <input class="form-control" accept="application/pdf" type="file"
                                   name="<?php echo $name; ?>" id="<?php echo $name; ?>" disabled/>
                        </div>
                        <?php echo $recomendacion; ?>
                    </div>


                    <?php $label = 'Link externo'; ?>
                    <?php $name = 'enlace_link'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 200, 'placeholder' => $label, 'class' => 'form-control', 'disabled' => true], set_value($name)); ?>
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/submenu'); ?>"
           style="margin-left:10px;">
            <i class="fa fa-backward"></i> Regresar
        </a>
        <?php echo form_button(['content' => '<i class="fa fa-plus-circle"></i> Añadir', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
        <?php echo form_close(); ?>
    </div>
</div>