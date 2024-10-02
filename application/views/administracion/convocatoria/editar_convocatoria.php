<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>
    <div class="col-md-9">
        <h1 class="text-justify">Editar Convocatoria</h1>
        <hr>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable text-justify">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>'); ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <?php echo form_open_multipart('', ['class' => '', 'id' => 'form', 'role' => 'form'], ['editar' => 1]); ?>
                    <?php $label = 'Descripción de la Convocatoria'; ?>
                    <?php $name = 'descripcion'; ?>
                    <?php $contenido =  $this->input->post($name); ?>
                    <?php $fecha_publicado =  $this->input->post("fecha_publicado"); ?>
                    <?php //echo $this->input->post($name);  ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php //echo form_input(['id' => $name, 'name' => $name, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                        <textarea id="<?php echo $name;?>" name="<?php echo $name;?>" class="form-control descripcion" rows="3"><?php echo $this->input->post($name); ?></textarea>
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
                    <!--                --><?php //$label = 'Link externo'; ?>
                    <!--                --><?php //$name = 'enlace'; ?>
                    <!--                <div class="form-group col-md-12 --><?//= (form_error($name) ? 'has-error has-feedback' : '') ?><!--">-->
                    <!--                    --><?php //echo form_label($label, $name, ['class' => 'control-label']); ?>
                    <!--                    --><?php //echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 300, 'placeholder' => $label, 'class' => 'form-control'], set_value($name)); ?>
                    <!--                </div>-->
                    <?php $label = 'Fecha'; ?>
                    <?php $name = 'fecha_publicado'; ?>
                    <div class="form-group col-md-6 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'type' => 'datetime-local', 'placeholder' => $label, 'class' => 'form-control fecha_publicado'], set_value($name), 'required'); ?>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/convocatoria'); ?>"
            style="margin-left:10px;">
        <i class="fa fa-backward"></i> Regresar
        </a>
        <?php echo form_button(['content' => '<i class="fa fa-floppy-o"></i> Guardar Cambios', 'type' => 'submit', 'class' => 'btn btn-primary pull-right']); ?>
        <?php echo form_close(); ?>

        <div class="row">
            <div class="col-md-12 margin-bottom-30">
            <h3 class="text-justify">Previsualizar Convocatoria</h3>
                <div class="panel margin-top-30">
                    <div class="panel-heading panel-blue-ins">
                        <div class="row">
                            <div class="col-md-2">
                                <span class="info-box-icon"><i class="fa fa-paperclip"></i></span>
                            </div>
                            <div class="col-md-10">
                                <h3 class="panel-title"><b id="contenido_convocatoria"><?php echo $contenido; ?></b></h3>
                                <h6 style="color:#fff;"><i class="fa fa-calendar"></i> Publicado. <label id="fecha_convocatoria" style="color:#fff;">(<?php setlocale(LC_ALL, 'es_CO'); ?>
                                    <?php echo utf8_encode(strftime("%A, %d de %B del %Y %r", strtotime(($fecha_publicado)))); ?>)</label>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
