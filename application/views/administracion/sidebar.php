<div class="col-md-3 col-sm-3 col-lg-3" style="min-height: 500px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            Panel de Opciones
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <?php if ($userdata->rol == 'admin'): ?>
                    <li class="<?= ($item_sidebar_active == 'administrar_noticias') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/noticia'); ?>">
                            Administrar Noticias
                        </a>
                    </li>
                    <li class="<?= ($item_sidebar_active == 'administrar_informaciones') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/informacion'); ?>">
                            Administrar Información
                        </a>
                    </li>
                    <li class="<?= ($item_sidebar_active == 'administrar_eventos') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/evento'); ?>">
                            Administrar Eventos
                        </a>
                    </li>
                    <li class="<?= ($item_sidebar_active == 'administrar_novedades') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/novedad'); ?>">
                            Administrar Novedades
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if ($userdata->rol == 'admin' || $userdata->rol == 'radio'): ?>
                    <li class="<?= ($item_sidebar_active == 'administrar_secciones') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/seccion'); ?>">
                            Administrar Secciones
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if ($userdata->rol == 'admin'): ?>
                    <li class="<?= ($item_sidebar_active == 'administrar_normatividad') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/entidad'); ?>">
                            Administrar Normatividad
                        </a>
                    </li>
                    <li class="<?= ($item_sidebar_active == 'administrar_convocatorias') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/convocatoria'); ?>">
                            Administrar Convocatorias
                        </a>
                    </li>
                    <li class="<?= ($item_sidebar_active == 'administrar_popop') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/popop'); ?>">
                            Administrar Popop
                        </a>
                    </li>
                    <li class="<?= ($item_sidebar_active == 'administrar_calendarios') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/calendario'); ?>">
                            Administrar Calendarios
                        </a>
                    </li>
                    <li class="<?= ($item_sidebar_active == 'administrar_archivo') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/archivo'); ?>">
                            Administrar Archivos
                        </a>
                    </li>
<!--                    <li class="--><?//= ($item_sidebar_active == 'administrar_contenidos') ? 'active' : ''; ?><!--">-->
<!--                        <a href="--><?//= site_url('administracion/contenido'); ?><!--">-->
<!--                            Administrar Contenido-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="--><?//= ($item_sidebar_active == 'administrar_plantilla') ? 'active' : ''; ?><!--">-->
<!--                        <a href="--><?//= site_url('administracion/editar_plantilla'); ?><!--">-->
<!--                            Administrar Plantilla-->
<!--                        </a>-->
<!--                    </li>-->
                    <li class="<?= ($item_sidebar_active == 'administrar_noticias_di') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/noticia_divisist'); ?>">
                            Administrar Noticias Divisist
                        </a>
                    </li>
                    <!--
                    <li class="<?//= ($item_sidebar_active == 'correos_sientelau') ? 'active' : ''; ?>">
                        <a href="<?//= site_url('administracion/correos_sientelau'); ?>">
                            Administrar Siente la U
                        </a>
                    </li>
                    -->
                    <li class="<?= ($item_sidebar_active == 'correos_enlace_informativo') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/correos_enlace_informativo'); ?>">
                            Administrar Boletín Enlace
                        </a>
                    </li>
                    <li class="<?= ($item_sidebar_active == 'administrar_contenido_rectoria') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/contenido_rectoria'); ?>">
                            Administrar Contenido Rectoria
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($userdata->rol == 'contratacion'): ?>
                <li class="<?= ($item_sidebar_active == 'administrar_procesos_contractuales') ? 'active' : ''; ?>">
                    <a href="<?= site_url('administracion/procesos_contractuales'); ?>">
                        Administrar Procesos Contractuales
                    </a>
                </li>
                    <li class="<?= ($item_sidebar_active == 'administrar_secciones') ? 'active' : ''; ?>">
                        <a href="<?= site_url('administracion/documento_contenido_titulo'); ?>">
                            Administrar Documentos Contratación
                        </a>
                    </li>
                <?php endif; ?>
                    <li>
                        <a class="text-danger" href="<?= site_url('administracion/logout'); ?>">
                            <i class="fa fa-power-off"></i> Cerrar sesión
                        </a>
                    </li>

            </ul>
        </div>
    </div>
</div>