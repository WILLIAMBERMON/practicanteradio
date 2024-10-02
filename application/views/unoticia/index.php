<?php include APPPATH . "views/useccion/header.php"; ?>

<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-9 col-sm-8 mb-margin-bottom-30">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h1 style="color:#555;"><?php echo((isset($noticia[0]->titulo)) ? $noticia[0]->titulo : "-"); ?></h1></div>
                </div>
                <div class="col-md-12">
                    <div class="news-v3 bg-color-white col-md-12 col-sm-12 col-xs-12">
                        <!-- video -->
                        <div class="margin-bottom-20">
                            <?php if (isset($noticia[0]->video) || isset($noticiaimg)): ?>
                                <span>Multimedia: </span>
                            <?php endif; ?>

                            <?php if (isset($noticia[0]->video)): ?>
                                <a rel="shadowbox;width=400;height=300"
                                   style="color:#687074;"
                                   title="<?php echo((isset($noticia[0]->descripcion_video2)) ? $noticia[0]->descripcion_video2 : "-"); ?>"
                                   href="<?php echo base_url("public/videos/noticias"); ?>/<?php echo((isset($noticia[0]->video)) ? $noticia[0]->video : "-"); ?>"><i
                                        class="fa fa-video-camera"></i> Video </a>
                            <?php endif; ?>

                            <?php if (isset($noticiaimg)): ?>
                                <span> | </span>
                                <a href="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img1"); ?>"
                                   rel="gallery"
                                   style="color:#687074;"
                                   class="fancybox img-hover-v2"
                                   title="Galeria - <?php echo((isset($noticia[0]->titulo)) ? $noticia[0]->titulo : "-"); ?>">
                                    <i class="fa fa-camera"></i> Galeria
                                </a>
                            <?php endif; ?>
                        </div>
                        <?php if (isset($noticia[0]->video2)): ?>
                        <div class="news-v3 bg-color-white">
                            <div class="responsive-video">
                                <iframe
                                    src="https://www.youtube.com/embed/<?php echo((isset($noticia[0]->video2)) ? $noticia[0]->video2 : "-"); ?>"
                                    frameborder="0" allowfullscreen></iframe>
                            </div>
                            <?php if (!empty($noticia[0]->descripcion_video2)): ?>
                                <div class="news-v3-in margin-top-10" style="padding: 5px 10px 20px;">
                                    <ul class="list-inline posted-info">
                                        <li><?php echo $noticia[0]->descripcion_video2; ?></li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php else: ?>
                        <img class="img-responsive"
                             src="<?php echo base_url("public/imagenes/noticia/"); ?>/<?php echo ((isset($noticia[0]->imgalterna)) ? $noticia[0]->imgalterna : "-"); ?>"
                             alt="">
                        <?php endif; ?>
                        <?php if (isset($noticiaimg)): ?>
                        <div class="news-v3-in margin-top-20" style="padding: 5px 10px 20px;">
                            <ul class="list-inline blog-photostream margin-bottom-10">
                                <?php if (isset($noticiaimg->img1) && $noticiaimg->img1 != null): ?>
                                <li>
                                    <a href="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img1"); ?>"
                                       rel="gallery" class="fancybox img-hover-v2"
                                       title="Galeria - <?php echo ((isset($noticia[0]->titulo)) ? $noticia[0]->titulo : "-"); ?>">
                                                <span><img class="img-responsive"
                                                           src="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img1"); ?>"
                                                           alt=""></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                    <?php if (isset($noticiaimg->img2) && $noticiaimg->img2 != null): ?>
                                <li>
                                    <a href="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img2"); ?>"
                                       rel="gallery" class="fancybox img-hover-v2"
                                       title="Galeria - <?php echo ((isset($noticia[0]->titulo)) ? $noticia[0]->titulo : "-"); ?>">
                                                <span><img class="img-responsive"
                                                           src="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img2"); ?>"
                                                           alt=""></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                    <?php if (isset($noticiaimg->img3) && $noticiaimg->img3 != null): ?>
                                <li>
                                    <a href="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img3"); ?>"
                                       rel="gallery" class="fancybox img-hover-v2"
                                       title="Galeria - <?php echo ((isset($noticia[0]->titulo)) ? $noticia[0]->titulo : "-"); ?>">
                                                <span><img class="img-responsive"
                                                           src="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img3"); ?>"
                                                           alt=""></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                    <?php if (isset($noticiaimg->img4) && $noticiaimg->img4 != null): ?>
                                <li>
                                    <a href="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img4"); ?>"
                                       rel="gallery" class="fancybox img-hover-v2"
                                       title="Galeria - <?php echo ((isset($noticia[0]->titulo)) ? $noticia[0]->titulo : "-"); ?>">
                                                <span><img class="img-responsive"
                                                           src="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img4"); ?>"
                                                           alt=""></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                    <?php if (isset($noticiaimg->img5) && $noticiaimg->img5 != null): ?>
                                <li>
                                    <a href="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img5"); ?>"
                                       rel="gallery" class="fancybox img-hover-v2"
                                       title="Galeria - <?php echo ((isset($noticia[0]->titulo)) ? $noticia[0]->titulo : "-"); ?>">
                                                <span><img class="img-responsive"
                                                           src="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img5"); ?>"
                                                           alt=""></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                    <?php if (isset($noticiaimg->img6) && $noticiaimg->img6 != null): ?>
                                <li>
                                    <a href="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img6"); ?>"
                                       rel="gallery" class="fancybox img-hover-v2"
                                       title="Galeria - <?php echo ((isset($noticia[0]->titulo)) ? $noticia[0]->titulo : "-"); ?>">
                                                <span><img class="img-responsive"
                                                           src="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img6"); ?>"
                                                           alt=""></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                    <?php if (isset($noticiaimg->img7) && $noticiaimg->img7 != null): ?>
                                <li>
                                    <a href="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img7"); ?>"
                                       rel="gallery" class="fancybox img-hover-v2"
                                       title="Galeria - <?php echo ((isset($noticia[0]->titulo)) ? $noticia[0]->titulo : "-"); ?>">
                                                <span><img class="img-responsive"
                                                           src="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img7"); ?>"
                                                           alt=""></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                    <?php if (isset($noticiaimg->img8) && $noticiaimg->img8 != null): ?>
                                <li>
                                    <a href="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img8"); ?>"
                                       rel="gallery" class="fancybox img-hover-v2"
                                       title="Galeria - <?php echo ((isset($noticia[0]->titulo)) ? $noticia[0]->titulo : "-"); ?>">
                                                <span><img class="img-responsive"
                                                           src="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img8"); ?>"
                                                           alt=""></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                    <?php if (isset($noticiaimg->img9) && $noticiaimg->img9 != null): ?>
                                <li>
                                    <a href="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img9"); ?>"
                                       rel="gallery" class="fancybox img-hover-v2"
                                       title="Galeria - <?php echo ((isset($noticia[0]->titulo)) ? $noticia[0]->titulo : "-"); ?>">
                                                <span><img class="img-responsive"
                                                           src="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img9"); ?>"
                                                           alt=""></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                    <?php if (isset($noticiaimg->img10) && $noticiaimg->img10 != null): ?>
                                <li>
                                    <a href="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img10"); ?>"
                                       rel="gallery" class="fancybox img-hover-v2"
                                       title="Galeria - <?php echo ((isset($noticia[0]->titulo)) ? $noticia[0]->titulo : "-"); ?>">
                                                <span><img class="img-responsive"
                                                           src="<?php echo base_url("public/imagenes/noticias/$noticiaimg->img10"); ?>"
                                                           alt=""></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                            <!-- End Photostream -->
                            <ul class="list-inline posted-info">
                                <?php if (isset($noticiaimg->descripcion)): ?>
                                <li>
                                    <a href="#"><?php echo ((isset($noticiaimg->descripcion)) ? $noticiaimg->descripcion : "Cecom"); ?></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- End Imagen -->
                    <div class="text-right">
                        <em><h6 style="color:#aa1916;">
                                <i class="fa fa-calendar"></i> Publicado el día
                                <?php
                                echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($noticia[0]->fecha)));
                                ?> / No. <?php echo ((isset($noticia[0]->numero)) ? $noticia[0]->numero : "-"); ?>
                            </h6></em>
                    </div>
                    <div class="text-left">
                        <?php if ($noticia[0]->numero < 153): ?>
                        <h5 class="parrafo_noticia"><?php echo ((isset($noticia[0]->precontenido)) ? $noticia[0]->precontenido : "-") . " " . ((isset($noticia[0]->contenido)) ? $noticia[0]->contenido : "-"); ?></h5>
                        <?php else: ?>
                        <h5 class="parrafo_noticia"><?php echo ((isset($noticia[0]->contenido)) ? $noticia[0]->contenido : "-"); ?></h5>
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
            <div class="row margin-bottom-30">
                <div class="col-md-12 col-sm-12 col-xs-12">
<!--                    <div class="fondo_style_title"><h4 class="style_title" class="" style="width:60%;"><b><i-->
<!--                                        class="fa fa-edit"></i> Firma</b></h4></div>-->
<!--                    <h5 class="parrafo_noticia" style="background-color: #f7f7f7;">--><?php //echo ((isset($noticia[0]->firma)) ? $noticia[0]->firma : "-"); ?><!--</h5>-->

                    <blockquote>
                        <p><em><?php echo ((isset($noticia[0]->firma)) ? $noticia[0]->firma : "-"); ?></h5>
                            </em></p>

                    </blockquote>

                </div>
            </div>

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






