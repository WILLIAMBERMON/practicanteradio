<hr class="devider devider-dotted">
<div class="row margin-top-60">
    <h4 style="color:#aa1916;">Últimas Noticias</h4>
    <?php for ($i = 0; $i < 3; $i++): ?>
        <div class="col-md-4">
            <div class="blog-thumb blog-thumb-circle margin-bottom-15">
                <div class="blog-thumb-hover">
                    <img class="img-responsive"
                         src="<?php echo base_url("public/imagenes/noticia/" . ((isset($listado_noticias[$i]->imagenp)) ? $listado_noticias[$i]->imagenp : "-")); ?>"
                         alt="">
                    <a class="hover-grad"
                       href="<?php echo base_url("/unoticia"); ?>/<?php echo((isset($listado_noticias[$i]->id_titulo)) ? $listado_noticias[$i]->id_titulo : "-"); ?>"><i
                            class="fa fa-link"></i></a>
                </div>
                <div class="blog-thumb-desc">
                    <h3>
                        <a href="<?php echo base_url("/unoticia"); ?>/<?php echo((isset($listado_noticias[$i]->id_titulo)) ? $listado_noticias[$i]->id_titulo : "-"); ?>"><?php echo((isset($listado_noticias[$i]->titulo)) ? $listado_noticias[$i]->titulo : "-"); ?></a>
                    </h3>
                    <ul class="blog-thumb-info">
                        <li><i class="fa fa-calendar"></i> <?php
                            echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($listado_noticias[$i]->fecha)));
                            ?></li>

                        <?php if (isset($listado_noticias[$i]->video)): ?>
                            <li class="tooltips" data-toggle="tooltip" data-placement="bottom"
                                data-original-title="Ver Video">
                                <a rel="shadowbox;width=400;height=300"
                                   title="<?php echo((isset($listado_noticias[$i]->descripcion_video2)) ? $listado_noticias[$i]->descripcion_video2 : "-"); ?>"
                                   href="<?php echo base_url("public/videos/noticias"); ?>/<?php echo((isset($listado_noticias[$i]->video)) ? $listado_noticias[$i]->video : "-"); ?>"><i
                                        class="fa fa-video-camera"></i></a>
                            </li>
                        <?php else: ?>
                            <?php if (isset($listado_noticias[$i]->video)): ?>
                                <li class="tooltips" data-toggle="tooltip" data-placement="bottom"
                                    data-original-title="Ver Video">
                                    <a href="https://www.youtube.com/embed/iln-wbZ0HIA"><i
                                            class="fa fa-video-camera"></i></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if (isset($galerias[$i]->idNoti)): ?>
                            <li class="tooltips" data-toggle="tooltip" data-placement="bottom"
                                data-original-title="Ver Galería"><a
                                    href="<?php echo base_url("public/imagenes/noticias"); ?>/<?php echo $galerias[$i]->img1; ?>"
                                    rel="gallery2"
                                    title="Galeria - <?php echo((isset($listado_noticias[$i]->titulo)) ? $listado_noticias[$i]->titulo : "-"); ?>"
                                    class="fancybox img-hover-v1"><i class="fa fa-camera"></i></a></li>
                            <?php if (isset($galerias[$i]->img2)): ?>
                                <a href="<?php echo base_url("public/imagenes/noticias"); ?>/<?php echo $galerias[$i]->img2; ?>"
                                   rel="gallery2" class="fancybox img-hover-v2"
                                   title="Galeria - <?php echo((isset($listado_noticias[$i]->titulo)) ? $listado_noticias[$i]->titulo : "-"); ?>">
                                </a>
                            <?php endif; ?>
                            <?php if (isset($galerias[$i]->img3)): ?>
                                <a href="<?php echo base_url("public/imagenes/noticias"); ?>/<?php echo $galerias[$i]->img3; ?>"
                                   rel="gallery2" class="fancybox img-hover-v2"
                                   title="Galeria - <?php echo((isset($listado_noticias[$i]->titulo)) ? $listado_noticias[$i]->titulo : "-"); ?>">
                                </a>
                            <?php endif; ?>
                            <?php if (isset($galerias[$i]->img4)): ?>
                                <a href="<?php echo base_url("public/imagenes/noticias"); ?>/<?php echo $galerias[$i]->img4; ?>"
                                   rel="gallery2" class="fancybox img-hover-v2"
                                   title="Galeria - <?php echo((isset($listado_noticias[$i]->titulo)) ? $listado_noticias[$i]->titulo : "-"); ?>">
                                </a>
                            <?php endif; ?>
                            <?php if (isset($galerias[$i]->img5)): ?>
                                <a href="<?php echo base_url("public/imagenes/noticias"); ?>/<?php echo $galerias[$i]->img5; ?>"
                                   rel="gallery2" class="fancybox img-hover-v2"
                                   title="Galeria - <?php echo((isset($listado_noticias[$i]->titulo)) ? $listado_noticias[$i]->titulo : "-"); ?>">
                                </a>
                            <?php endif; ?>
                            <?php if (isset($galerias[$i]->img6)): ?>
                                <a href="<?php echo base_url("public/imagenes/noticias"); ?>/<?php echo $galerias[$i]->img6; ?>"
                                   rel="gallery2" class="fancybox img-hover-v2"
                                   title="Galeria - <?php echo((isset($listado_noticias[$i]->titulo)) ? $listado_noticias[$i]->titulo : "-"); ?>">
                                </a>
                            <?php endif; ?>
                            <?php if (isset($galerias[$i]->img7)): ?>
                                <a href="<?php echo base_url("public/imagenes/noticias"); ?>/<?php echo $galerias[$i]->img7; ?>"
                                   rel="gallery2" class="fancybox img-hover-v2"
                                   title="Galeria - <?php echo((isset($listado_noticias[$i]->titulo)) ? $listado_noticias[$i]->titulo : "-"); ?>">
                                </a>
                            <?php endif; ?>
                            <?php if (isset($galerias[$i]->img8)): ?>
                                <a href="<?php echo base_url("public/imagenes/noticias"); ?>/<?php echo $galerias[$i]->img8; ?>"
                                   rel="gallery2" class="fancybox img-hover-v2"
                                   title="Galeria - <?php echo((isset($listado_noticias[$i]->titulo)) ? $listado_noticias[$i]->titulo : "-"); ?>">
                                </a>
                            <?php endif; ?>
                            <?php if (isset($galerias[$i]->img9)): ?>
                                <a href="<?php echo base_url("public/imagenes/noticias"); ?>/<?php echo $galerias[$i]->img9; ?>"
                                   rel="gallery2" class="fancybox img-hover-v2"
                                   title="Galeria - <?php echo((isset($listado_noticias[$i]->titulo)) ? $listado_noticias[$i]->titulo : "-"); ?>">
                                </a>
                            <?php endif; ?>
                            <?php if (isset($galerias[$i]->img10)): ?>
                                <a href="<?php echo base_url("public/imagenes/noticias"); ?>/<?php echo $galerias[$i]->img10; ?>"
                                   rel="gallery2" class="fancybox img-hover-v2"
                                   title="Galeria - <?php echo((isset($listado_noticias[$i]->titulo)) ? $listado_noticias[$i]->titulo : "-"); ?>">
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>