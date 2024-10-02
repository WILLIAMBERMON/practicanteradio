<!--=== header ===-->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 margin-top-10 margin-bottom-20">
            <div class="row">
                <div class="col-md-8">
                    <?php include APPPATH . "views/useccion/breadcrumb.php"; ?>
                </div>
                <div class="col-md-4">
                    <h4 class="pull-right"><?php echo((isset($tipo)) ? $tipo : " "); ?></h4>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12" style="border-bottom: 3px solid #aa1916;">
            <!--            <h1 class="pull-left text-parallax capa-image2" style="background-color: #aa1916;color: #fff; margin-top: 0px; margin-bottom: 0px; padding: 6px; padding-left: 15px; padding-right: 15px;">-->
            <div class="row">
                <div class="col-md-10">
                    <?php if (isset($seccion_img->logo_acreditado)): ?>
                        <img id="logo-sello" style="width: 50px; height: 45px;"
                             src="<?php echo base_url("public/imagenes/icon"); ?>/<?php echo $seccion_img->logo_acreditado; ?>">
                    <?php endif; ?>
                    <h1 class="pull-left" style="font-size: 36px;">
                        <b><?php echo((isset($titulo)) ? $titulo : "-"); ?></b></h1>
                </div>
                <div class="col-md-2">

                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="perfiles" style="width: 664px;">
    <ul class="nav navbar-nav">
        <li class="dropdown tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Información para aspirantes">
            <a href="/ufps2/uperfil/aspirantes">
                <h6 class="style_botton_perfil" style="background-color:#AA1916"><i class="fa fa-users"></i> Aspirantes</h6>
            </a>
        </li>
        <li class="dropdown tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Información para estudiantes">
            <a href="/ufps2/uperfil/estudiantes">
                <h6 class="style_botton_perfil" style="background-color:#424242"><i class="fa fa-user"></i> Estudiantes</h6>
            </a>                               
        </li>
        <li class="dropdown tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Información para egresados">
            <a href="/ufps2/uperfil/egresados">
                <h6 class="style_botton_perfil" style="background-color:#AA1916"><i class="fa fa-graduation-cap"></i> Egresados</h6>
            </a>
        </li>
        <li class="dropdown tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Información para docentes">
            <a href="/ufps2/uperfil/docentes">
                <h6 class="style_botton_perfil" style="background-color:#424242"><i class="fa fa-user-secret"></i> Docentes</h6>
            </a>                              
        </li>
        <li class="dropdown tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Información para administrativos">
            <a href="/ufps2/uperfil/administrativos">
                <h6 class="style_botton_perfil" style="background-color:#AA1916"><i class="fa fa-briefcase"></i> Administrativos</h6>
            </a>
        </li>
    </ul>
</div>-->

<!--=== fin header ===-->
<!--<div class="cuadroredes">
    <ul class="social-icons social-icons-color margin-top-10" >
        <li class="tooltips"  data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Facebook"><a href="https://www.facebook.com/UFPS-C%C3%BAcuta-553833261409690" class="rounded social_facebook"></a></li>
        <li class="tooltips"  data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Twitter"><a href="https://twitter.com/UFPSCUCUTA" class="rounded social_twitter"></a></li>
        <li class="tooltips"  data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Youtube"><a href="https://www.youtube.com/channel/UCgPz-qqaAk4lbHfr0XH3k2g" class="rounded social_youtube"></a></li>
        <li class="tooltips"  data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Instagram"><a href="#" class="rounded social_instagram"></a></li>
        <li class="tooltips"  data-toggle="tooltip" data-placement="bottom" data-original-title="Escuchanos en Vivo"><a href="#" class="rounded social_emisora"></a></li>
    </ul>  
</div>-->
