<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
    <h1 class="text-justify">Editar Galería</h1>
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

                <?php $label = 'Descripción'; ?>
                <?php $name = 'descripcion'; ?>
                <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 4000, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
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

                <?php $label = 'Imagen uno actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($imagen_uno)): ?>
                            <img class="img img-bordered img-responsive"
                                 src="<?php echo isset($imagen_uno) ? $imagen_uno : ""; ?>"/>
                        <?php else: ?>
                            <p>No existe una imagen.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Imagen'; ?>
                <?php $recomendacion = 'Se recomienda que la imagen debe tener un peso menor que 100kb y una resolución fija de (700X400)px'; ?>
                <?php $name = 'img1'; ?>
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

                <?php $label = 'Imagen dos actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($imagen_dos)): ?>
                            <img class="img img-bordered img-responsive"
                                 src="<?php echo isset($imagen_dos) ? $imagen_dos : ""; ?>"/>
                        <?php else: ?>
                            <p>No existe una imagen.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Imagen'; ?>
                <?php $recomendacion = 'Se recomienda que la imagen debe tener un peso menor que 100kb y una resolución fija de (700X400)px'; ?>
                <?php $name = 'img2'; ?>
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

                <?php $label = 'Imagen tres actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($imagen_tres)): ?>
                            <img class="img img-bordered img-responsive"
                                 src="<?php echo isset($imagen_tres) ? $imagen_tres : ""; ?>"/>
                        <?php else: ?>
                            <p>No existe una imagen.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Imagen'; ?>
                <?php $recomendacion = 'Se recomienda que la imagen debe tener un peso menor que 100kb y una resolución fija de (700X400)px'; ?>
                <?php $name = 'img3'; ?>
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

                <?php $label = 'Imagen cuatro actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($imagen_cuatro)): ?>
                            <img class="img img-bordered img-responsive"
                                 src="<?php echo isset($imagen_cuatro) ? $imagen_cuatro : ""; ?>"/>
                        <?php else: ?>
                            <p>No existe una imagen.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Imagen'; ?>
                <?php $recomendacion = 'Se recomienda que la imagen debe tener un peso menor que 100kb y una resolución fija de (700X400)px'; ?>
                <?php $name = 'img4'; ?>
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

                <?php $label = 'Imagen cinco actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($imagen_cinco)): ?>
                            <img class="img img-bordered img-responsive"
                                 src="<?php echo isset($imagen_cinco) ? $imagen_cinco : ""; ?>"/>
                        <?php else: ?>
                            <p>No existe una imagen.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Imagen'; ?>
                <?php $recomendacion = 'Se recomienda que la imagen debe tener un peso menor que 100kb y una resolución fija de (700X400)px'; ?>
                <?php $name = 'img5'; ?>
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

                <?php $label = 'Imagen seis actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($imagen_seis)): ?>
                            <img class="img img-bordered img-responsive"
                                 src="<?php echo isset($imagen_seis) ? $imagen_seis : ""; ?>"/>
                        <?php else: ?>
                            <p>No existe una imagen.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Imagen'; ?>
                <?php $recomendacion = 'Se recomienda que la imagen debe tener un peso menor que 100kb y una resolución fija de (700X400)px'; ?>
                <?php $name = 'img6'; ?>
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

                <?php $label = 'Imagen siete actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($imagen_siete)): ?>
                            <img class="img img-bordered img-responsive"
                                 src="<?php echo isset($imagen_siete) ? $imagen_siete : ""; ?>"/>
                        <?php else: ?>
                            <p>No existe una imagen.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Imagen'; ?>
                <?php $recomendacion = 'Se recomienda que la imagen debe tener un peso menor que 100kb y una resolución fija de (700X400)px'; ?>
                <?php $name = 'img7'; ?>
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

                <?php $label = 'Imagen ocho actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($imagen_ocho)): ?>
                            <img class="img img-bordered img-responsive"
                                 src="<?php echo isset($imagen_ocho) ? $imagen_ocho : ""; ?>"/>
                        <?php else: ?>
                            <p>No existe una imagen.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Imagen'; ?>
                <?php $recomendacion = 'Se recomienda que la imagen debe tener un peso menor que 100kb y una resolución fija de (700X400)px'; ?>
                <?php $name = 'img8'; ?>
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

                <?php $label = 'Imagen nueve actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($imagen_nueve)): ?>
                            <img class="img img-bordered img-responsive"
                                 src="<?php echo isset($imagen_nueve) ? $imagen_nueve : ""; ?>"/>
                        <?php else: ?>
                            <p>No existe una imagen.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Imagen'; ?>
                <?php $recomendacion = 'Se recomienda que la imagen debe tener un peso menor que 100kb y una resolución fija de (700X400)px'; ?>
                <?php $name = 'img9'; ?>
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

                <?php $label = 'Imagen diez actual'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($imagen_diez)): ?>
                            <img class="img img-bordered img-responsive"
                                 src="<?php echo isset($imagen_diez) ? $imagen_diez : ""; ?>"/>
                        <?php else: ?>
                            <p>No existe una imagen.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Imagen'; ?>
                <?php $recomendacion = 'Se recomienda que la imagen debe tener un peso menor que 100kb y una resolución fija de (700X400)px'; ?>
                <?php $name = 'img10'; ?>
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