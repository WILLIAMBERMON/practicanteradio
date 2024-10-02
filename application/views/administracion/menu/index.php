<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
        <h1 class="text-justify">Administración de Menús</h1>
        <hr>
        <?php if (!empty($menus)): ?>
            <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>
                        <strong>Nombre</strong>
                    </td>
                    <td>
                        <strong>Orden Menú</strong>
                    </td>
                    <td>
                        <strong>Nombre Contenido</strong>
                    </td>
                    <td>
                        <strong>Link</strong>
                    </td>
                    <td>
                        <strong>Submenú</strong>
                    </td>
                    <td>
                        <strong>Estado</strong>
                    </td>
                    <td>
                        <strong>Editar</strong>
                    </td>
                </tr>
                </thead>
                <?php foreach ($menus as $menu): ?>
                    <tr class="<?php echo ($menu->publicar == '1') ? 'success' : (($menu->publicar == '0') ? 'warning' : ''); ?>">
                        <td>
                            <?php echo $menu->nombre_menu; ?>
                        </td>
                        <td>
                            <?php echo $menu->orden_menu_p; ?>
                        </td>
                        <td>
                            <?php echo $menu->enlace_menu; ?>
                        </td>
                        <td>
                        <a href="<?php echo $nombre_url.$menu->id_menu; ?>" target="_bank"><?php echo $nombre_url.$menu->id_menu; ?></a>
                        </td>
                        
                        <td>
                            <?php echo form_open(site_url('administracion/submenu'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_menu' => $menu->id_menu]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-bars"></i></button>
                            <?php echo form_close(); ?>
                        </td>
                        <td>
                            <?php echo $menu->publicar == 1 ? 'Visible' : 'Oculto'; ?>
                        </td>
                        <td>
                            <?php echo form_open(site_url('administracion/editar_menu'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_menu' => $menu->id_menu]); ?>
                            <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                                <i class="fa fa-pencil-square-o"></i></button>
                            <?php echo form_close(); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aun no ha registrado ningún menú.</p>
        <?php endif; ?>
        <?php if ($userdata->rol == 'admin' || $userdata->rol == 'radio'): ?>
            <div class="clearfix margin-bottom-30">
                <hr>
                <a class="btn btn-primary pull-right" href="<?= site_url('administracion/seccion'); ?>"
                   style="margin-left:10px;">
                    <i class="fa fa-backward"></i> Regresar
                </a>
                <a class="btn btn-primary pull-right" href="<?php echo site_url('administracion/agregar_menu'); ?>">
                    <i class="fa fa-plus-circle"></i> Añadir Menú
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
