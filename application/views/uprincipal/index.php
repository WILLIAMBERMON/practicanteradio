<!--- ATENCIÓN AL CIUDADANO ---->
<div class="row no-margin">
    <div class="col-md-12">
        <div class="owl-clients-v2" style="padding: 5px;">
            <div class="item text-center" style="padding-top: 5px;">
                <!-- <a href="/universidad/transparencia">  -->
                <a tabindex="-1" href="/universidad/transparencia_acceso_informacion_publica/2059">
                    <span class="sprite i-transparencia hover-shadow"></span>
                    <h5 tabindex="0"><b>Transparencia y Acceso a la Información Pública</b></h5>
                </a>
            </div>
            <div class="item text-center" style="padding-top: 5px;">
                <a tabindex="-1" href="/universidad/normatividad"><span class="sprite i-normatividad hover-shadow"></span>
                    <h5 tabindex="0"><b>Normatividad</b></h5>
                </a>
            </div>
            <div class="item text-center" style="padding-top: 5px;">
                <a tabindex="-1" href="/universidad/atencion_ciudadano/1118">
                    <span class="sprite i-ciudadano hover-shadow"></span>
                    <h5 tabindex="0"><b>Atención al Ciudadano en la Universidad</b></h5>
                </a>
            </div>
            <div class="item text-center" style="padding-top: 5px;">
                <a tabindex="-1" href="/universidad/proyectos-de-acuerdo-ufps/1188">
                    <span class="sprite i-proyectos_acuerdo hover-shadow"></span>
                    <h5 tabindex="0"><b>Proyectos de Acuerdo UFPS</b></h5>
                </a>
            </div>
            <div  class="item text-center" style="padding-top: 5px;">
                <a tabindex="-1" href="/universidad/admisiones-registro-academico/109">
                    <span class="sprite i-admisiones hover-shadow"></span>
                    <h5 tabindex="0"><b>Admisiones y Registro Académico</b></h5>
                </a>
            </div>
            <div class="item text-center" style="padding-top: 5px;">
                <a tabindex="-1" href="/universidad/atencion_ciudadano">
                    <span class="sprite i-peticiones hover-shadow"></span>
                    <h5 tabindex="0"><b>Peticiones, Denuncias, Quejas, Reclamos y Sugerencias</b></h5>
                </a>
            </div>
            <div class="item text-center" style="padding-top: 5px;">
                <a tabindex="-1" href="/seccion/calendario">
                    <span class="sprite i-calendario hover-shadow"></span>
                    <h5 tabindex="0"><b>Calendario</b></h5>
                </a>
            </div>
            <div class="item text-center" style="padding-top: 5px;">
                <a tabindex="-1" href="/universidad/convocatorias"><span class="sprite i-convocatoria hover-shadow"></span>
                    <h5 tabindex="0"><b>Convocatorias</b></h5>
                </a>
            </div>
            <div class="item text-center" style="padding-top: 5px;">
                <a tabindex="-1" href="/universidad/sistema-integrado-de-gestion-de-calidad/1280">
                    <span class="sprite i-sistemas_integrados hover-shadow"></span>
                    <h5 tabindex="0"><b>Sistema Integrado de Gestión de Calidad</b></h5>
                </a>
            </div>
            <div class="item text-center" style="padding-top: 5px;">
                <a tabindex="-1" href="/universidad/plan_de_desarrollo_institucional/1705">
                    <span class="sprite i-plan_desarrollo hover-shadow"></span>
                    <h5 tabindex="0"><b>Plan de Desarrollo Institucional</b></h5>
                </a>
            </div>
            <div class="item text-center" style="padding-top: 5px;">
                <a tabindex="-1" href="/universidad/cuenta-conmigo/1112">
                    <span class="sprite i-cuenta_conmigo hover-shadow"></span>
                    <h5 tabindex="0"><b>Cuenta Conmigo</b></h5>
                </a>
            </div>
            <div class="item text-center" style="padding-top: 5px;">
                <a tabindex="-1" href="/universidad/estrategia-de-rendicion-de-cuentas/1623">
                    <span class="sprite i-audiencia hover-shadow"></span>
                    <h5 tabindex="0"><b>Estrategia de Rendición de Cuentas</b></h5>
                </a>
            </div>
            <div class="item text-center" style="padding-top: 5px;">
                <a tabindex="-1" href="/universidad/pei_2021_ufps/2153">
                    <span class="sprite i-pei hover-shadow"></span>
                    <h5 tabindex="0"><b>Proyecto Educativo Institucional</b></h5>
                </a>
            </div>

            <!--            <div class="item text-center" style="padding-top: 5px;">-->
            <!--                <a href="/seccion/nuestras-obras/971">-->
            <!--                    <span class="sprite i-nuestras_obras hover-shadow"></span>-->
            <!--                    <h5><b>Obras en Ejecución</b></h5></a>-->
            <!--            </div>-->
        </div>
    </div>
</div>

<!-- EVENTOS ---------------------->
<div style="background-color: #e8e8e8; ">
    <div class="container content-prin profile">
        <div class="row margin-top-10">
            <div class="headline-center-v2 headline-center-v2-dark margin-bottom-10">
                <h1 style="font-size: 30px;"><b tabindex='0'>Destacados y Eventos</b></h1>
                <span class="bordered-icon"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
            </div>
            <div class="col-md-12">
                <div class="row equal-height-columns margin-bottom-10">

                    <div class="container">
                        <div class="owl-carousel-v1 owl-work-v1 margin-bottom-40">
                            <div class="owl-recent-works-v1">
                                <!--                                <div class="item">-->
                                <!--                                    <a href="#">-->
                                <!--                                        <em class="overflow-hidden">-->
                                <!--                                            <img class="img-responsive" src="assets/img/main/img1.jpg" alt="">-->
                                <!--                                        </em>-->
                                <!--                        <span>-->
                                <!--                            <strong>Happy New Year</strong>-->
                                <!--                            <i>Anim pariatur cliche reprehenderit</i>-->
                                <!--                        </span>-->
                                <!--                                    </a>-->
                                <!--                                </div>-->

                                <?php $numFilas = count($eventos); ?>
                                <?php for ($i = 0; $i < $numFilas; $i++) : ?>
                                    <?php if ($i == 0 || $i == 4 || $i == 8) : ?>
                                        <?php $color = "rgba-red"; ?>
                                    <?php endif; ?>
                                    <?php if ($i == 1 || $i == 5 || $i == 9) : ?>
                                        <?php $color = "rgba-blue"; ?>
                                    <?php endif; ?>
                                    <?php if ($i == 2 || $i == 6 || $i == 10) : ?>
                                        <?php $color = "rgba-purple"; ?>
                                    <?php endif; ?>
                                    <?php if ($i == 3 || $i == 7 || $i == 11) : ?>
                                        <?php $color = "rgba-default"; ?>
                                    <?php endif; ?>
                                    <div class="item">
                                        <?php if (!empty($eventos[$i]['url'])) : ?>
                                            <a href="<?php echo $eventos[$i]['url']; ?>" style="text-align: center;">
                                            <?php else : ?>
                                                <a href="/ueventos/<?php echo ((isset($eventos[$i]['id_titulo'])) ? $eventos[$i]['id_titulo'] : "-"); ?>" style="text-align: center;">
                                                <?php endif; ?>
                                                <div class="easy-block-v1-badge <?php echo $color; ?>" style="color:#fff; padding: 5px;">
                                                    <?php echo ((isset($eventos[$i]['fecha_evento'])) ? $eventos[$i]['fecha_evento'] : "Evento Destacado"); ?>
                                                </div>
                                                <em class="overflow-hidden">
                                                    <img class="img-responsive" src="<?php echo base_url("public/imagenes/eventos/" . $eventos[$i]['imagenp']); ?>" alt="Imagen de eventos">
                                                </em>
                                                <span>
                                                    <strong><?php echo ((isset($eventos[$i]['titulo'])) ? $eventos[$i]['titulo'] : "-"); ?></strong>
                                                    <i>Lugar: <?php echo ((isset($eventos[$i]['lugar'])) ? $eventos[$i]['lugar'] : "Ver Información"); ?></i>
                                                </span>
                                                </a>
                                    </div>
                                <?php endfor; ?>




                            </div>

                            <div class="headline">
                                <div class="owl-navigation">
                                    <div class="customNavigation">
                                        <a class="owl-btn prev-v2"><i class="fa fa-angle-left"></i></a>
                                        <a class="owl-btn next-v2"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <!--/navigation-->
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
<!-- FIN EVENTOS --->


<!-- NOVEDADES -->
<div style="background-color: #b43432;">
    <div class="container content-prin profile">

        <div class="row margin-bottom-10 margin-top-10">
            <div class="headline-center-v2 margin-bottom-10">
                <h1 style="font-size: 30px; color:#fff;"><b>Novedades</b></h1>
                <span class="bordered-icon"><i class="fa fa-files-o" aria-hidden="true"></i></span>
            </div>
            <?php
            //    $numFilas = count($destacados_actu);
            $numFilas = 3;
            for ($i = 0; $i < $numFilas; $i++) :
            ?>
                <?php if ($i == 0) : ?>
                    <?php $colore = "yellow"; ?>
                    <?php $numColor = "#f1c40f"; ?>
                <?php elseif ($i == 1) : ?>
                    <?php $colore = "blue"; ?>
                    <?php $numColor = "#3498db"; ?>
                <?php else : ?>
                    <?php $colore = "red"; ?>
                    <?php $numColor = "#e74c3c"; ?>
                <?php endif; ?>
                <div class="col-sm-4">
                    <div class="service-block-v1 md-margin-bottom-50" style="background: #fff; border-top: 5px solid <?php echo $numColor; ?>;">
                        <?php if (isset($destacados_actu[$i]['adjunto']) && isset($destacados_actu[$i]['contenido'])) : ?>
                            <i class="icon-custom icon-lg rounded-x icon-color-<?php echo $colore; ?> icon-line fa fa-link" style="background: #fff;"></i>
                        <?php endif; ?>
                        <?php if (!isset($destacados_actu[$i]['adjunto']) && isset($destacados_actu[$i]['contenido'])) : ?>
                            <i class="icon-custom icon-lg rounded-x icon-color-<?php echo $colore; ?> icon-line fa fa-search-plus" style="background: #fff;"></i>
                        <?php endif; ?>
                        <?php if (isset($destacados_actu[$i]['adjunto']) && !isset($destacados_actu[$i]['contenido'])) : ?>
                            <i class="icon-custom icon-lg rounded-x icon-color-<?php echo $colore; ?> icon-line fa fa-file-pdf-o" style="background: #fff;"></i>
                        <?php endif; ?>
                        <h5 class="title-v3-bg text-uppercase"><a href="/udestacado/<?php echo ((isset($destacados_actu[$i]['id_titulo'])) ? $destacados_actu[$i]['id_titulo'] : "-"); ?>" style="text-transform:none; color:#464646;"><b><?php echo ((isset($destacados_actu[$i]['titulo'])) ? $destacados_actu[$i]['titulo'] : "-"); ?></b></a>
                        </h5>
                        <p>
                            <?php echo utf8_encode(strftime("%A", strtotime($destacados_actu[$i]['fecha']))); ?>
                            ,
                            <?php echo strftime("%d", strtotime($destacados_actu[$i]['fecha'])); ?>
                            <?php echo strftime("%B", strtotime($destacados_actu[$i]['fecha'])); ?>
                            <?php echo strftime("%Y", strtotime($destacados_actu[$i]['fecha'])); ?>
                        </p>
                        <a href="/udestacado/<?php echo ((isset($destacados_actu[$i]['id_titulo'])) ? $destacados_actu[$i]['id_titulo'] : "-"); ?>"><b>Leer
                                más</b></a>
                    </div>
                </div>
            <?php endfor; ?>
            <div class="col-md-12 margin-top-10">
                <a href="/udestacado/listado_destacados/" class="btn-u btn-brd btn-brd-hover btn-u-light btn-u-sm pull-right tooltips" data-toggle="tooltip" data-placement="left" data-original-title="Más Novedades Anteriores">Ver
                    más <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>

            </div>
        </div>
        <!--/row-->

    </div>
</div>
<!-- FIN DESTACADOS -->

<!-- ICONOS REDES SOCIALES -->
<div class="cuadroredes">
    <ul class="social-icons margin-top-10">
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Facebook"><a href="https://www.facebook.com/UFPS-C%C3%BAcuta-553833261409690" class="rounded social_facebook"></a>
        </li>
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Twitter"><a href="https://twitter.com/UFPSCUCUTA" class="rounded social_twitter"></a></li>
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Youtube"><a href="https://www.youtube.com/channel/UCgPz-qqaAk4lbHfr0XH3k2g" class="rounded social_youtube"></a></li>
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Instagram">
            <a href="https://www.instagram.com/ufpscucuta/" class="rounded social_instagram"></a>
        </li>
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Escuchanos en Vivo"><a href="http://www.ufps.edu.co/emisora/player.php" class="rounded social_emisora"></a></li>
    </ul>
</div>
<!-- FIN ICONOS REDES SOCIALES -->