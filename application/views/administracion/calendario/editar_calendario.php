<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h2 class="text-justify">Editar Calendario</h2>
        <hr>

        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable text-justify">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'); ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <?php echo form_open_multipart('', ['class' => '', 'id' => 'form', 'role' => 'form'], ['editar' => 1]); ?>

                    <?php $label = 'Nombre'; ?>
                    <?php $name = 'nombre'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 4000, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>

                    <?php $label = 'Tipo'; ?>
                    <?php $name = 'tipo'; ?>
                    <div class="form-group col-md-4 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <select class="form-control" name="<?php echo $name; ?>">
                            <option value='1' <?php echo $this->input->post('tipo') == '1' ? 'selected' : '' ?>>
                                Documento
                            </option>
                            <option value='2' <?php echo $this->input->post('tipo') == '2' ? 'selected' : '' ?>>
                                Programa
                            </option>
                        </select>
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
                    <div
                        class="form-group col-md-12 <?= (form_error($name) || isset($error_documento) ? 'has-error has-feedback' : '') ?>">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                            <input class="form-control" accept="application/pdf" type="file" name="<?php echo $name; ?>"/>
                        </div>
                    </div>


                    <?php $label = 'Primer Previo Actual'; ?>
                    <div class="form-group col-md-12">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                            <?php if (isset($ruta_pp)): ?>
                                <a class="btn btn-primary"
                                   href="<?php echo isset($ruta_pp) ? $ruta_pp : ""; ?>"
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

                    <?php $label = 'Cambiar Primer Previo'; ?>
                    <?php $name = 'pp'; ?>
                    <?php $recomendacion = 'Se recomienda que el archivo tenga un peso mínimo de 2048kb'; ?>
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

                    <?php $label = 'Segundo Previo Actual'; ?>
                    <div class="form-group col-md-12">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                            <?php if (isset($ruta_sp)): ?>
                                <a class="btn btn-primary"
                                   href="<?php echo isset($ruta_sp) ? $ruta_sp : ""; ?>"
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

                    <?php $label = 'Cambiar Segundo Previo'; ?>
                    <?php $name = 'sp'; ?>
                    <?php $recomendacion = 'Se recomienda que el archivo tenga un peso mínimo de 2048kb'; ?>
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

                    <?php $label = 'Tercer Previo Actual'; ?>
                    <div class="form-group col-md-12">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                            <?php if (isset($ruta_tp)): ?>
                                <a class="btn btn-primary"
                                   href="<?php echo isset($ruta_tp) ? $ruta_tp : ""; ?>"
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

                    <?php $label = 'Cambiar Tercer Previo'; ?>
                    <?php $name = 'tp'; ?>
                    <?php $recomendacion = 'Se recomienda que el archivo tenga un peso mínimo de 2048kb'; ?>
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

                    <?php $label = 'Exámen Actual'; ?>
                    <div class="form-group col-md-12">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                            <?php if (isset($ruta_ex)): ?>
                                <a class="btn btn-primary"
                                   href="<?php echo isset($ruta_ex) ? $ruta_ex : ""; ?>"
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

                    <?php $label = 'Cambiar Exámen'; ?>
                    <?php $name = 'ex'; ?>
                    <?php $recomendacion = 'Se recomienda que el archivo tenga un peso mínimo de 2048kb'; ?>
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

                    <?php $label = 'Habilitación Actual'; ?>
                    <div class="form-group col-md-12">
                        <label class="control-label">
                            <?php echo $label; ?>
                        </label>
                        <div>
                            <?php if (isset($ruta_ha)): ?>
                                <a class="btn btn-primary"
                                   href="<?php echo isset($ruta_ha) ? $ruta_ha : ""; ?>"
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

                    <?php $label = 'Cambiar Habilitación'; ?>
                    <?php $name = 'ha'; ?>
                    <?php $recomendacion = 'Se recomienda que el archivo tenga un peso mínimo de 2048kb'; ?>
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

        <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/calendario'); ?>"
           style="margin-left:10px;">
            <i class="fa fa-backward"></i> Regresar
        </a>
        <?php echo form_button(['content' => '<i class="fa fa-floppy-o"></i> Guardar Cambios', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
        <?php echo form_close(); ?>
    </div>
</div>