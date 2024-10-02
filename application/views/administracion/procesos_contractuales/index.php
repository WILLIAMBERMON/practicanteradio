<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Grupos de Procesos Contractuales</h1>
        <hr>
        <?php if(isset($vigencias) && $vigencias): ?>
            <p>Seleccionar una vigencia: </p><br>
            <div class="row">
            <?php echo form_open(site_url('administracion/procesos_contractuales'), ['class' => '', 'id' => 'form', 'role' => 'form'], []); ?>
                    <div class="col-md-8">
                        <select name="vigencia" class="form-control">
                            <option value=''>Seleccione...</option>
                            <?php  foreach($vigencias as $vig):  ?>
                            <option <?php echo ($vig->nombre_menu == $actual)?'selected':'' ?> value='<?php echo $vig->nombre_menu ?>'><?php echo $vig->nombre_menu; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary pull-left" value="1" name="cambiar" type="submit"> <i class="fa fa-search"></i> Cambiar</button>
                    </div>
                <?php echo form_close(); ?>
            </div>    
            <hr>
        <?php endif; ?>
        <?php if (!empty($grupos)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Id Grupo</strong>
                    </td>
                    <td>
                        <strong>Objeto</strong>
                    </td>
                    <td>
                        <strong>Fecha</strong>
                    </td>
                    <td>
                        <strong>Licitaciones</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($grupos as $grupo): ?>
                    <tr>
                        <td>
                            <?php echo $grupo->idgrupo; ?>
                        </td>
                        <td>
                            <?php echo $grupo->objeto_des; ?>
                        </td>
                        <td>
                            <?php echo $grupo->fecha; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/licitaciones'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_grupo' => $grupo->idgrupo]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-folder-open"></i></button>
                            <?php echo form_close(); ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_grupo'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_grupo' => $grupo->idgrupo]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ningún grupo de proceso contractual.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'contratacion'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right" href="<?php echo site_url('administracion/agregar_procesos_contractuales'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Grupo
                </a>
                <?php if($nuevogrupow): ?>
                <a class="btn btn-primary pull-left" href="<?php echo site_url('administracion/crear_vigencia'); ?>">
                    <i class="fa fa-plus-circle"></i> Crear Vigencia
                </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
