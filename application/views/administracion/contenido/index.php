<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h2 class="text-justify">Administración de Contenidos</h2>
        <hr>
        <?php if (!empty($contenidos)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Nombre</strong>
                    </td>
                    <td>
                        <strong>Fecha</strong>
                    </td>
                    <td>
                        <strong>SubContenido</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($contenidos as $contenido): ?>
                    <tr>
                        <td>
                            <?php echo $contenido->nombre_contenido; ?>
                        </td>
                        <td>
                            <?php echo $contenido->fecha_actualizacion_contenido; ?>
                        </td>
                        <td>
                            <?php echo $contenido->sub_call_contenido; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_contenido'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_contenido' => $contenido->id_contenido]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ningun elemento de contenido.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin' || $userdata->rol == 'radio'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right" href="<?= site_url('administracion/seccion'); ?>"
                   style="margin-left:10px;">
                    <i class="fa fa-backward"></i> Regresar
                </a>
                <a class="btn btn-primary pull-right"
                   href="<?php echo site_url('administracion/agregar_contenido'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Contenido
                </a>
            </div>
        <?php endif; ?>



            <div class="row row-no-space margin-bottom-40">
                <div class="heading heading-v1 margin-bottom-20">
                    <h2>Contenido para menú y submenú</h2>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="pricing-table-v8 service-block-default sm-margin-bottom-30">
                        <div class="service-block ">
                            <h4 class="heading-md">Publicaciones</h4>
                            <p>Publicaciones de revistas, editoriales y/o Boletines de la sesión.</p>
                            <a href="<?php echo site_url('administracion/publicacion'); ?>" class="btn-u btn-u ">Administrar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="pricing-table-v8 service-block-default sm-margin-bottom-30 md-margin-bottom-30">
                        <div class="service-block ">
                            <h4 class="heading-md">Grupos de Investigación</h4>
                            <p>Grupos de investigación para solo las facultades que lo tienen.</p>
                            <a href="<?php echo site_url('administracion/investigacion'); ?>" class="btn-u btn-u ">Administrar</a>
                        </div>
                    </div>
                </div>
                <!--            <div class="col-md-4 col-sm-6">-->
                <!--                <div class="pricing-table-v8 service-block-light-green sm-margin-bottom-30">-->
                <!--                    <div class="service-block ">-->
                <!--                        <h2 class="heading-md">Advanced</h2>-->
                <!--                        <span><i class="dollar">$</i>45<i>p/m</i></span>-->
                <!--                        <p>Donec id elit non mi porta gravida at eget metus id elit gravida at eget</p>-->
                <!--                        <a href="#" class="btn-u btn-brd btn-u ">Purchase Now</a>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
            </div>

        <div class="row row-no-space margin-bottom-40">
            <div class="heading heading-v1 margin-bottom-20">
                <h2>Subcontenido</h2>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="pricing-table-v8 service-block-default sm-margin-bottom-30">
                    <div class="service-block ">
                        <h4 class="heading-md">Listado de Archivos</h4>
                        <p>Aquí se administra los archivos que se anexa en un contenido específico.</p>
                        <a href="<?php echo site_url('administracion/documento_contenido_titulo'); ?>" class="btn-u btn-u ">Administrar</a>
                    </div>
                </div>
            </div>

<!--            <div class="col-md-6 col-sm-6">-->
<!--                <div class="pricing-table-v8 service-block-default sm-margin-bottom-30">-->
<!--                    <div class="service-block ">-->
<!--                        <h4 class="heading-md">Listado de Archivos</h4>-->
<!--                        <p>Aquí se administra los archivos que se anexa en un contenido específico.</p>-->
<!--                        <a href="--><?php //echo site_url('administracion/documento_contenido_titulo'); ?><!--" class="btn-u btn-u ">Administrar</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="col-md-4 col-sm-6">-->
<!--                <div class="pricing-table-v8 service-block-default sm-margin-bottom-30 md-margin-bottom-30">-->
<!--                    <div class="service-block ">-->
<!--                        <h2 class="heading-md">Grupos de Investigación</h2>-->
<!--                        <p>Grupos de investigación para solo las facultades que lo tienen.</p>-->
<!--                        <a href="--><?php //echo site_url('administracion/investigacion'); ?><!--" class="btn-u btn-u ">Administrar</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <!--            <div class="col-md-4 col-sm-6">-->
            <!--                <div class="pricing-table-v8 service-block-light-green sm-margin-bottom-30">-->
            <!--                    <div class="service-block ">-->
            <!--                        <h2 class="heading-md">Advanced</h2>-->
            <!--                        <span><i class="dollar">$</i>45<i>p/m</i></span>-->
            <!--                        <p>Donec id elit non mi porta gravida at eget metus id elit gravida at eget</p>-->
            <!--                        <a href="#" class="btn-u btn-brd btn-u ">Purchase Now</a>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>




    </div>
</div>
