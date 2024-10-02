<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>
    <div class="col-md-9">
        <h1 class="text-justify">Nueva Sección</h1>
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
                    <?php echo form_open_multipart('administracion/agregar_seccion', ['class' => '', 'id' => 'form', 'role' => 'form'], ['agregar' => 1]); ?>
                    <?php $label = 'Nombre'; ?>
                    <?php $name = 'nombre_seccion'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 150, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                    </div>
                    <?php $label = 'Nombre corto (URL)'; ?>
                    <?php $recomendacion = 'Se recomienda que el nombre corto no deba tener espacios en blanco ni tildes'; ?>
                    <?php $name = 'id_titulo'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'maxlength' => 255, 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
                        <?php echo $recomendacion; ?>
                    </div>
                    <?php $label = 'Descripción'; ?>
                    <?php $name = 'desc_seccion'; ?>
                    <div class="form-group col-md-12 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <label class="control-label">
                        <?php echo $label; ?>
                        </label>
                        <div>
                            <textarea class="ckeditor" maxlength="8000"
                                name="<?php echo $name; ?>"><?php echo $this->input->post($name) ? $this->input->post($name) : ""; ?></textarea>
                        </div>
                    </div>
                    <?php $label = 'Fecha'; ?>
                    <?php $name = 'fecha_actualizacion_seccion'; ?>
                    <div class="form-group col-md-6 <?= (form_error($name) ? 'has-error has-feedback' : '') ?>">
                        <?php echo form_label($label, $name, ['class' => 'control-label']); ?>
                        <?php echo form_input(['id' => $name, 'name' => $name, 'type' => 'datetime-local', 'placeholder' => $label, 'class' => 'form-control'], set_value($name), 'required'); ?>
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
                    <input type="file" name="imagen_banner[]" multiple style="display:none">
                </div>
                <!-- Plugin para subir multiples archivos -->
                <label for="fecha_actualizacion_seccion" class="control-label">Cargar Imágenes Banner</label>
                <div class="form-group">
                    <div class="btn btn-primary fileup-btn">
                        Seleccionar Imágenes
                        <input type="file" id="upload3" multiple accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <div id="upload3-queue"></div>
                </div>
                <!-- fin del plugin de subir multiples archivos-->
            </div>
        </div>
        <input type="hidden" id="imagen1" name="imagen1" value="" />
        <input type="hidden" id="imagen2" name="imagen2" value="" />
        <input type="hidden" id="imagen3" name="imagen3" value="" />
        <input type="hidden" id="imagen4" name="imagen4" value="" />
        <input type="hidden" id="imagen5" name="imagen5" value="" />
        <input type="hidden" id="imagen6" name="imagen6" value="" />
        <a class="btn btn-primary pull-right margin-bottom-30" href="<?= site_url('administracion/seccion'); ?>"
            style="margin-left:10px;">
        <i class="fa fa-backward"></i> Regresar
        </a>
        <?php echo form_button(['content' => '<i class="fa fa-plus-circle"></i> Añadir', 'type' => 'button', 'id' =>'button_add' ,'class' => 'btn btn-primary pull-right']); ?>
        <?php echo form_close(); ?>
    </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Recortar Imagen</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="fotocargada" class="form-group col-md-12">
                            <div id="imagen">
                                <input type="hidden" id="scaleY" value="1">
                                <input type="hidden" id="scaleX" value="1">
                                <input type="hidden" name="codigo" id="codigo" value="' + codigo + '">
                                <input type="hidden" id="destino" name="destino" value="' + destino + '">
                                <input type="hidden" id="origen" name="origen" value="' + origen + '">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="imagen_cargada'"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="btn-group" style="margin:0px 5px 0px 0px">
                                        <button type="button" class="btn btn-primary" onclick="recortar()">
                                        Recortar
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="restaurar()">
                                        Restaurar
                                        </button>
                                    </div>
                                    <div class="btn-group" style="margin:0px 5px 0px 0px">
                                        <button type="button" class="btn btn-primary" onclick="$('#canvas').cropper('rotate','-45')">
                                        <i class="fa fa-undo"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="$('#canvas').cropper('rotate','45')">
                                        <i class="fa fa-repeat"></i>
                                        </button>
                                    </div>
                                    <div class="btn-group" style="margin:0px 5px 0px 0px">
                                        <button type="button" class="btn btn-primary" onclick="$('#canvas').cropper('move','-10','0')">
                                        <i class="fa fa-arrow-left"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="$('#canvas').cropper('move','10','0')">
                                        <i class="fa fa-arrow-right"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="$('#canvas').cropper('move','0','-10')">
                                        <i class="fa fa-arrow-up"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="$('#canvas').cropper('move','0','10')">
                                        <i class="fa fa-arrow-down"></i>
                                        </button>
                                    </div>
                                    <div class="btn-group" style="margin:0px 5px 0px 0px">
                                        <button type="button" class="btn btn-primary" onclick="mover('scaleX');">
                                        <i class="fa fa-arrows-h"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="mover('scaleY');">
                                        <i class="fa fa-arrows-v"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div style="display: flex;  align-items: center;flex-direction: column; height: 220px;margin-bottom: 40px;">
                                <div id="divimagen" class="container  col-md-12 " style="height: 250px;">
                                    <div class="col-md-12 " style="height: 250px; width: 520px; " id="tamañoimagen">
                                        <canvas style="display: none;" id="canvas">Your browser does not support the HTML5 canvas element.</canvas>
                                    </div>
                                </div>
                            </div>
                            <div id="padre" style="width: 50%; margin: 0 auto;" >
                                <div class="" id="result" style="">
                                </div>
                                <div class="" id="info_imagen" style="">
                                </div>
                            </div>
                        </div>
                        <div id="recomendacion" class="form-group col-md-12" style="display:none;color: #2e6da4;">
                            <i><b>Recomendación:<b> Recuerde que debe realizar primero el recorte de la imagen</i>
                            <input id="hidden_alto" name="hidden_alto" type="hidden" value="" />
                            <input id="hidden_ancho" name="hidden_ancho" type="hidden" value="" />
                            <input id="hidden_nombre_archivo" name="hidden_nombre_archivo" type="hidden" value="" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--<button type="button"  class="btn btn-primary pull-left" onclick="limpiar()">Cerrar</button>-->
                <button type="button" id="" name="" value="" onclick="guardar()" class="btn btn-primary pull-right">
                <i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Guardar Recorte</button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" >Cerrar</button>
            </div>
        </div>
    </div>
</div>