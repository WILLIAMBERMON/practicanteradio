<div class="col-md-9">
    <h2 class="text-justify">Editar Plantilla del portal</h2>
    <hr>

    <?php if (isset($error_ruta_logo)): ?>
        <?php $error_ruta_logo = str_replace("<p>", "", $error_ruta_logo); ?>
        <?php $error_ruta_logo = str_replace("</p>", "", $error_ruta_logo); ?>
        <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_ruta_logo . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
    <?php endif; ?>
    <?php if (isset($error_ruta_logo_footer)): ?>
        <?php $error_ruta_logo_footer = str_replace("<p>", "", $error_ruta_logo_footer); ?>
        <?php $error_ruta_logo_footer = str_replace("</p>", "", $error_ruta_logo_footer); ?>
        <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_ruta_logo_footer . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
    <?php endif; ?>
    <?php if (isset($error_ruta_escudo)): ?>
        <?php $error_ruta_escudo = str_replace("<p>", "", $error_ruta_escudo); ?>
        <?php $error_ruta_escudo = str_replace("</p>", "", $error_ruta_escudo); ?>
        <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_ruta_escudo . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
    <?php endif; ?>
    <?php if (isset($error_ruta_escudo_footer)): ?>
        <?php $error_ruta_escudo_footer = str_replace("<p>", "", $error_ruta_escudo_footer); ?>
        <?php $error_ruta_escudo_footer = str_replace("</p>", "", $error_ruta_escudo_footer); ?>
        <?php echo '<div class="alert alert-danger alert-dismissable text-justify">' . $error_ruta_escudo_footer . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'; ?>
    <?php endif; ?>

    <?php echo validation_errors('<div class="alert alert-danger alert-dismissable text-justify">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'); ?>
    <?php echo form_open_multipart('', ['class' => '', 'id' => 'form', 'role' => 'form'], ['editar' => 1]); ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <?php $label = 'Logo actual (Encabezado)'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($rutas['ruta_logo'])): ?>
                            <img class="img img-bordered"
                                 src="<?php echo $rutas['ruta_logo']; ?>"
                                 width="300px;"/>
                        <?php else: ?>
                            <p>Aún no ha asignado un logo para el encabezado del portal</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Logo (encabezado)'; ?>
                <?php $name = 'ruta_logo'; ?>
                <div
                    class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <input class="form-control" accept="image/*" type="file" name="<?php echo $name; ?>"/>
                    </div>
                </div>

                <?php $label = 'Escudo actual (encabezado)'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($rutas['ruta_escudo'])): ?>
                            <img class="img img-bordered"
                                 src="<?php echo $rutas['ruta_escudo']; ?>"
                                 width="300px;"/>
                        <?php else: ?>
                            <p>Aún no ha asignado un escudo para el encabezado del portal</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Escudo (encabezado)'; ?>
                <?php $name = 'ruta_escudo'; ?>
                <div
                    class="form-group col-md-12 <?= (form_error($name) || isset($error_imagen) ? 'has-error has-feedback' : '') ?>">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <input class="form-control" accept="image/*" type="file" name="<?php echo $name; ?>"/>
                    </div>
                </div>

                <?php $label = 'Logo actual (pie de página)'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($rutas['ruta_logo_footer'])): ?>
                            <img class="img img-bordered"
                                 src="<?php echo $rutas['ruta_logo_footer']; ?>"
                                 width="300px;"/>
                        <?php else: ?>
                            <p>Aún no ha asignado un logo para el pie de página del portal</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Logo (pie de página)'; ?>
                <?php $name = 'ruta_logo_footer'; ?>
                <div
                    class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <input class="form-control" accept="image/*" type="file" name="<?php echo $name; ?>"/>
                    </div>
                </div>

                <?php $label = 'Escudo actual (pie de página)'; ?>
                <div class="form-group col-md-12">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <?php if (!empty($rutas['ruta_escudo_footer'])): ?>
                            <img class="img img-bordered"
                                 src="<?php echo $rutas['ruta_escudo_footer']; ?>"
                                 width="300px;"/>
                        <?php else: ?>
                            <p>Aún no ha asignado un escudo para el pie de página del portal</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php $label = 'Cambiar Escudo (pie de página)'; ?>
                <?php $name = 'ruta_escudo_footer'; ?>
                <div
                    class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <input class="form-control" accept="image/*" type="file" name="<?php echo $name; ?>"/>
                    </div>
                </div>

                <?php $label = 'Texto de pie de página'; ?>
                <?php $name = 'texto_footer'; ?>
                <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                    <label class="control-label">
                        <?php echo $label; ?>
                    </label>
                    <div>
                        <textarea class="ckeditor" maxlength="1000"
                                  name="<?php echo $name; ?>"><?php echo $this->input->post($name) ? $this->input->post($name) : ""; ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php echo form_button(['content' => '<i class="fa fa-floppy-o"></i> Guardar Cambios', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
    <?php echo form_close(); ?>
</div>