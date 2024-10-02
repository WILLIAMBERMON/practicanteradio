<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es"> <!--<![endif]-->
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144229272-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-144229272-1');
</script>
    <title>UFPS - Cúcuta</title>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="application-name" content="UFPS" lang="es">
    <meta name="Author" content="Viarney Alirio Villamizar Moreno" lang="es">
    <meta name="Contributors" content="División de Sistemas" lang="es">
    <meta name="Aditional-Contributors" content="Jean Polo Cequeda Olago" lang="es">
    <?php if (isset($page_keywords)): ?>
        <meta name="keywords" content="<?php echo $page_keywords; ?>"/>
    <?php endif; ?>
    <?php if (isset($page_description)): ?>
        <meta name="description" content="<?php echo $page_description; ?>"/>
    <?php endif; ?>

    <meta property="og:title" content="<?php echo((isset($nom_titulo)) ? $nom_titulo : ''); ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo((isset($url)) ? $url : base_url()); ?>"/>
    <meta property="og:image" content="<?php echo((isset($url_img)) ? $url_img : " "); ?>"/>
    <meta property="og:description" content="<?php echo((isset($descripcion)) ? $descripcion : ''); ?>"/>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href='<?php echo base_url("assets/img/ico/favicon.ico"); ?>' rel='Shortcut icon'>

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css'
          href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <?= $_css ?>

    <?php if (isset($popop)): ?>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#mostrarmodal").modal("show");
            });
        </script>
    <?php endif; ?>

<!--    <style>-->
<!--        body {-->
<!--            font-family: Helvetica, Arial, sans-serif;-->
<!--        }-->
<!--        h1 {-->
<!--            font-size: 20px;-->
<!--        }-->
<!--        div {-->
<!--            width: 100%;-->
<!--        }-->
<!--        img[usemap] {-->
<!--            border: none;-->
<!--            height: auto;-->
<!--            max-width: 100%;-->
<!--            width: auto;-->
<!--        }-->
<!--    </style>-->

<style type="text/css">
video{
    width: fit-content !important;
}
</style>
</head>

<body>


<?php if (isset($popop)) : ?>
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog" style="width: 600px !important;">
                <div class="modal-content">

                    <!--                                <div class="modal-header">-->
                    <!--                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                    <!--                                    <h3>Cabecera de la ventana</h3>-->
                    <!--                                </div>-->
                    <div class="modal-body">
                        <?php if (!empty($popop->video)) : ?>
                            <?php if (strpos($popop->video, "youtu.be") !== false) : ?>
                                <iframe src="https://www.youtube.com/embed/<?php echo $popop->video; ?>" frameborder="0" allowfullscreen width="100%" height="300px"></iframe>
                            <?php else : ?>
                                <?php if (strpos($popop->video, "alostream.com") === false) : ?>
                                <iframe src="http://www.alostream.com/<?php echo $popop->video; ?>" frameborder="0" allowfullscreen width="100%" height="300px"></iframe>
                                <?php endif; ?>
                            <?php endif; ?>

                        <?php endif; ?>
                        <?php if (!empty($popop->imagen)) : ?>
                            <?php if (!empty($popop->enlace)) : ?>
                                <a href="<?php echo $popop->enlace; ?>"><img class="img-responsive" src="<?php echo base_url("public/imagenes/popop/"); ?>/<?php echo $popop->imagen; ?>" alt=""></a>
                            <?php else : ?>
                                <img class="img-responsive" src="<?php echo base_url("public/imagenes/popop/"); ?>/<?php echo $popop->imagen; ?>" alt="">
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if (!empty($popop->descripcion)) : ?>
                            <h4><?php echo $popop->descripcion; ?></h4>
                        <?php endif; ?>
                    </div>
                    <!--                                <div class="modal-footer">-->
                    <!--                                    <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>-->
                    <!--                                </div> -->
                </div>
            </div>
        </div>
    <?php endif; ?>
<div class="wrapper">
    <!-- Alertas de la clase Template -->
    <div id="template_alerts">
        <?php foreach ($_warning as $_msj): ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-exclamation-triangle"></i>&nbsp;
                <?= $_msj ?>
            </div>
        <?php endforeach; ?>
        <?php foreach ($_success as $_msj): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-check-circle"></i>&nbsp;
                <?= $_msj ?>
            </div>
        <?php endforeach; ?>
        <?php foreach ($_error as $_msj): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-times-circle"></i>&nbsp;
                <?= $_msj ?>
            </div>
        <?php endforeach; ?>
        <?php foreach ($_info as $_msj): ?>
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-info-circle"></i>&nbsp;
                <?= $_msj ?>
            </div>
        <?php endforeach; ?>
    </div>

    <?php foreach ($_content as $_view): ?>
        <?php include $_view; ?>
    <?php endforeach; ?>

</div><!--/End Wrapepr-->

<?= $_js ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initParallaxBg();
        ContactPage.initMap();
        OwlCarousel.initOwlCarousel();
    });
</script>
<!--[if lt IE 9]>
<script src="assets/plugins/respond.js"></script>
<script src="assets/plugins/html5shiv.js"></script>
<script src="assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->


</body>
</html>