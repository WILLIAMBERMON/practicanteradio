<!--=== col-derecha ===-->
<div class="row">

    <?php if(isset($buscar_noticias)): ?>
    <div class="col-md-12 col-sm-6 col-xs-12 margin-top-20">
        <div class="fadeInUp animated">
            <div class="shadow-wrapper">
                <blockquote class="tag-box tag-box-v4" style="margin-bottom-30">
                    <h5><b><a class="tooltips" title="Ir a Listado de Noticias Anteriores" data-toggle="tooltip" data-placement="left" data-original-title="Ir a Listado de Noticias Anteriores" href="<?php echo base_url("unoticia/listado_noticias"); ?>" >Buscar Noticias Anteriores <i class="fa fa-search search-btn"></i></a></b>
                    </h5>
                </blockquote>
            </div>
        </div>
    </div>
    <?php endif; ?>




<!--        <div class="col-md-12 col-sm-12 col-xs-12">-->
<!--            <div class="fondo_style_title"><h4 class="style_title" class="" style="width:60%;"><b><i-->
<!--                                class="fa fa-newspaper-o"></i> CECOM</b></h4></div>-->
<!--            <ul class="list-inline blog-photostream blog-panel_derecho margin-bottom-50">-->
<!--                <li>-->
<!--                    <a class="fancybox img-hover-v2 tooltips" title="Ir a Rectoría al Día" data-toggle="tooltip" data-placement="left" data-original-title="Ir a Rectoría al Día" href="--><?php //echo base_url("universidad/rectoria/1120"); ?><!--" rel="gallery" target="_blank">-->
<!--                        <span><img class="img-responsive" src="--><?php //echo base_url("public/imagenes/template/panel_derecho/rectoriaaldia.jpg"); ?><!--" alt=""></span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="fancybox img-hover-v2 tooltips" title="Ir a Oriente Universitario" data-toggle="tooltip" data-placement="left" data-original-title="Ir a Oriente Universitario" href="/public/archivos/oriente/Oriente_Universitario.pdf" rel="gallery" target="_blank">-->
<!--                        <span><img class="img-responsive" src="--><?php //echo base_url("assets/img/cecom/oriente-universitario.jpg"); ?><!--" alt=""></span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="fancybox img-hover-v2 tooltips" title="Ir a Boletín Siente la U" data-toggle="tooltip" data-placement="left" data-original-title="Ir a Boletín Siente la U" href="http://www.ufps.edu.co/ufpsnuevo/sientelau/index2.php" rel="gallery" target="_blank">-->
<!--                        <span><img class="img-responsive" src="--><?php //echo base_url("public/imagenes/template/panel_derecho/boletin-siente-la-u-banner.jpg"); ?><!--" alt=""></span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="fancybox img-hover-v2 tooltips" title="Ir a Boletín Siente la U Acreditación" data-toggle="tooltip" data-placement="left" data-original-title="Ir a Boletín Siente la U Acreditación" href="https://issuu.com/ufps/docs/siente_la_u_acreditaci_n_edicion_4" rel="gallery" target="_blank">-->
<!--                        <span><img class="img-responsive" src="--><?php //echo base_url("public/imagenes/template/panel_derecho/siente_la_u_acreditacion.jpg"); ?><!--" alt=""></span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="fancybox img-hover-v2 tooltips" title="Ir a Magazín Siente la U" data-toggle="tooltip" data-placement="left" data-original-title="Ir a Magazín Siente la U" href="https://www.youtube.com/channel/UCgPz-qqaAk4lbHfr0XH3k2g" rel="gallery" target="_blank">-->
<!--                        <span><img class="img-responsive" src="--><?php //echo base_url("public/imagenes/template/panel_derecho/comunicando-banner.jpg"); ?><!--" alt=""></span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="fancybox img-hover-v2 tooltips" title="Ir a Emisora UFPS Radio" data-toggle="tooltip" data-placement="left" data-original-title="Ir a Emisora UFPS Radio" href="http://radio.ufps.edu.co/" rel="gallery" target="_blank">-->
<!--                        <span><img class="img-responsive" src="--><?php //echo base_url("public/imagenes/template/panel_derecho/emisora-banner.png"); ?><!--" alt=""></span>-->
<!--                    </a>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <!-- End Photostream -->
<!--        </div>-->
  

<!---->
    <div class="magazine-posts col-md-12 col-sm-6 col-xs-12 margin-top-20 shadow-wrapper">
<!--        <div class="headline-v2 headline-v2-red-inst no-margin"><h2><b>Rectoría al Día</b></h2></div> -->
        <div class="magazine-posts-img portfolio-box  box-shadow shadow-effect-2">
            <a tabindex='-1' class="thumbnail fancybox tooltips" title="Ir a Rectoría al Día" data-toggle="tooltip" data-placement="left" data-original-title="Ir a Rectoría al Día" href="<?php echo base_url("universidad/rectoria/1120"); ?>">
                <img tabindex='0' class="full-width img-responsive" src="<?php echo base_url("public/imagenes/template/panel_derecho/rectoriaaldia.jpg"); ?>" alt="">
                <span class="portfolio-box-in rounded-x">
                    <i class="fa fa-link icon-lg icon-line"></i>
                </span>
            </a>
        </div>
        <hr class="devider devider-dotted" style="margin-top: 20px;">
    </div>

    <div class="magazine-posts col-md-12 col-sm-6 col-xs-12 shadow-wrapper">
        <!--  <div class="headline-v2 headline-v2-red-inst no-margin"><h2><b>Oriente Universitario</b></h2></div>  -->
        <div class="magazine-posts-img portfolio-box box-shadow shadow-effect-2">
            <a tabindex='-1' class="thumbnail fancybox tooltips" title="Ir a Oriente Universitario" data-toggle="tooltip" data-placement="left" data-original-title="Ir a Oriente Universitario" href="<?php echo base_url("universidad/centro_comu_ufps/1893"); ?>" target="_blank">
                <img tabindex='0' class="full-width img-responsive" src="<?php echo base_url("assets/img/cecom/oriente-universitario.jpg"); ?>" alt="">
                <span class="portfolio-box-in rounded-x">
                    <i class="fa fa-link icon-lg icon-line"></i>
                </span>
            </a>
        </div>
        <hr class="devider devider-dotted" style="margin-top: 20px;">
    </div>


    <div class="magazine-posts col-md-12 col-sm-6 col-xs-12 shadow-wrapper">
<!--        <div class="headline-v2 headline-v2-red-inst no-margin"><h2><b>Editorial Siente la U</b></h2></div> -->
        <div class="magazine-posts-img portfolio-box box-shadow shadow-effect-2">
            <a tabindex='-1' class="thumbnail fancybox tooltips" title="Ir a Boletín Siente la U" data-toggle="tooltip" data-placement="left" data-original-title="Ir a Boletín Siente la U" href="http://www.ufps.edu.co/ufpsnuevo/sientelau/index2.php" target="_blank">
                <img tabindex='0' class="full-width img-responsive" src="<?php echo base_url("public/imagenes/template/panel_derecho/boletin-siente-la-u-banner.jpg"); ?>" alt="">
                <span class="portfolio-box-in rounded-x">
                    <i class="fa fa-link icon-lg icon-line"></i>
                </span>
            </a>
        </div>
        <hr class="devider devider-dotted" style="margin-top: 20px;">
    </div>

    <div class="magazine-posts col-md-12 col-sm-6 col-xs-12 shadow-wrapper">
        <!--        <div class="headline-v2 headline-v2-red-inst no-margin"><h2><b>Editorial Siente la U</b></h2></div> -->
        <div class="magazine-posts-img portfolio-box box-shadow shadow-effect-2">
            <a tabindex='-1' class="thumbnail fancybox tooltips" title="Ir a Boletín Siente la U Acreditación" data-toggle="tooltip" data-placement="left" data-original-title="Ir a Boletín Siente la U Acreditación" href="<?php echo base_url("/universidad/acreditacion/1170"); ?>" target="_blank">
                <img tabindex='0' class="full-width img-responsive" src="<?php echo base_url("public/imagenes/template/panel_derecho/siente_la_u_acreditacion.jpg"); ?>" alt="">
                <span class="portfolio-box-in rounded-x">
                    <i class="fa fa-link icon-lg icon-line"></i>
                </span>
            </a>
        </div>
        <hr class="devider devider-dotted" style="margin-top: 20px;">
    </div>



<!--    <div class="magazine-posts col-md-12 col-sm-6 col-xs-12 shadow-wrapper">-->
<!--<!--        <div class="headline-v2 headline-v2-red-inst no-margin"><h2><b>Magazín Siente la U</b></h2></div> -->
<!--        <div class="magazine-posts-img portfolio-box box-shadow shadow-effect-2">-->
<!--            <a class="thumbnail fancybox tooltips" title="Ir a Magazín Siente la U" data-toggle="tooltip" data-placement="left" data-original-title="Ir a Magazín Siente la U" href="https://www.youtube.com/channel/UCgPz-qqaAk4lbHfr0XH3k2g" target="_blank">-->
<!--                <img class="full-width img-responsive" src="--><?php //echo base_url("public/imagenes/template/panel_derecho/comunicando-banner.jpg"); ?><!--" alt="">-->
<!--                <span class="portfolio-box-in rounded-x">-->
<!--                    <i class="fa fa-link icon-lg icon-line"></i>-->
<!--                </span>-->
<!--            </a>-->
<!--        </div>-->
<!--        <hr class="devider devider-dotted" style="margin-top: 20px;">-->
<!--    </div>-->
<!--    <div class="magazine-posts col-md-12 col-sm-6 col-xs-12 shadow-wrapper">-->
<!--<!--        <div class="headline-v2 headline-v2-red-inst no-margin"><h2><b>UFPS Radio fm 95.2</b></h2></div> -->
<!--        <div class="magazine-posts-img portfolio-box box-shadow shadow-effect-2">-->
<!--            <a class="thumbnail fancybox tooltips" title="Ir a Emisora UFPS Radio" data-toggle="tooltip" data-placement="left" data-original-title="Ir a Emisora UFPS Radio" href="http://www.ufps.edu.co/emisora/player.php" target="_blank">-->
<!--                <img class="full-width img-responsive" src="--><?php //echo base_url("public/imagenes/template/panel_derecho/emisora-banner.png"); ?><!--" alt="">-->
<!--                <span class="portfolio-box-in rounded-x">-->
<!--                    <i class="fa fa-link icon-lg icon-line"></i>-->
<!--                </span>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->



</div>

<!--=== fin col-derecha ===-->  

