<?php include APPPATH . "views/useccion/header.php"; ?>

<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-9 col-sm-8 mb-margin-bottom-30">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h1><?php echo((isset($noticia->titulo)) ? $noticia->titulo : "-"); ?></h1></div>
                </div>
                <div class="col-md-12">
                    <!-- End Imagen -->
                    <div class="text-right">
                        <em><h6 style="color:#aa1916;">
                                <i class="fa fa-calendar"></i> Publicado el día
                                <?php
                                echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($noticia->fecha)));
                                ?>
                            </h6></em>
                    </div>
                    <div class="text-left ">
                        <?php if ($noticia->numero < 153): ?>
                            <h5><?php echo ((isset($noticia->precontenido)) ? $noticia->precontenido : "-") . " " . ((isset($noticia->contenido)) ? $noticia->contenido : "-"); ?></h5>
                        <?php else: ?>
                            <h5><?php echo((isset($noticia->contenido)) ? $noticia->contenido : "-"); ?></h5>
                        <?php endif; ?>
                    </div>

                    <div id="fb-root"></div>

                    <!---- script redes social facebook ---->
                    <script type="text/javascript">
                        (function () {
                            var element = document.createElement('script');
                            element.type = "text/javascript";
                            element.async = true;
                            element.id = "facebook-jssdk"
                            element.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(element, s);
                        })();
                    </script>
                    <!---- final script redes social facebook ---->

                    <!-- <div class="fb-like" data-href="http://norfipc.com/pagina.html" data-width="292"
                         data-send="true"></div> -->
                </div>
            </div>

            <!--            <div class="margin-top-60">-->
            <!--                <h4 style="color:#aa1916;">Últimas Noticias</h4>-->
            <!--                --><?php //for ($i = 1; $i < 4; $i++): ?>
            <!--                    <div class="blog-thumb blog-thumb-circle margin-bottom-15">-->
            <!--                        <div class="blog-thumb-hover">-->
            <!--                            <img class="rounded-x" src="-->
            <?php //echo base_url("assets/img/sliders/elastislide/$i.jpg"); ?><!--" alt="">-->
            <!--                            <a class="hover-grad" href="blog_single.html"><i class="fa fa-link"></i></a>-->
            <!--                        </div>-->
            <!--                        <div class="blog-thumb-desc">-->
            <!--                            <h3><a href="--><?php //echo base_url("/unoticia/"); ?><!---->
            <?php //echo ((isset($listado_noticias[$i]->id_titulo)) ? $listado_noticias[$i]->id_titulo : "-"); ?><!--">-->
            <?php //echo ((isset($listado_noticias[$i]->titulo)) ? $listado_noticias[$i]->titulo : "-"); ?><!--</a></h3>-->
            <!--                            <ul class="blog-thumb-info">-->
            <!--                                <li><i class="fa fa-calendar"></i> --><?php
            //                                    echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($listado_noticias[$i]->fecha)));
            //                                    ?><!--</li>-->
            <!--                                <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Ver Video"><a href="https://www.youtube.com/embed/iln-wbZ0HIA"><i class="fa fa-video-camera"></i></a></li>-->
            <!--                                <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Ver Galería"><a href="-->
            <?php //echo base_url("assets/img/sliders/elastislide/5.jpg"); ?><!--" rel="gallery2" class="fancybox img-hover-v1"><i class="fa fa-camera"></i></a></li>-->
            <!--                            </ul>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                --><?php //endfor; ?>
            <!--            </div>-->
            <!-- End Blog Thumb v2 -->


        </div><!--/col-md-8-->
        <div class="col-md-3 col-sm-4">
            <?php include APPPATH . "views/useccion/col-der.php"; ?>
            <!-- Contacts -->


            <!--        <h6>
                 Carlos Eduardo Gómez Reyes
                 <hr class="devider devider-dotted" style="margin: 5px;">
                 Jefe de Comunicaciones y Prensa
                 <hr class="devider devider-dotted" style="margin: 5px;">
                 Apoyo, José Luis Daza, Comunicador Social.
                 <hr class="devider devider-dotted" style="margin: 5px;">
                 Centro de Comunicaciones y Medios Audiovisuales - CECOM
                 <hr class="devider devider-dotted" style="margin: 5px;">
                 Universidad Francisco de Paula Santander
                 <hr class="devider devider-dotted" style="margin: 5px;">
                 oficinadeprensa@ufps.edu.co</h6>  -->


        </div><!--/col-md-3-->
    </div><!--/row-->

    <?php include APPPATH . "views/unoticia/noticias_recientes.php"; ?>

</div><!--/container-->
<!--=== End Content Part ===-->






