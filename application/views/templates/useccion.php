<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->

<head>

    <title>UFPS - Cúcuta</title>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="application-name" content="UFPS" lang="es">
    <meta name="Author" content="UFPS Cúcuta" lang="es">
    <meta name="Contributors" content="Viarney Alirio Villamizar Moreno - Henry Alexander Peñaranda Mora" lang="es">
    <meta name="Aditional-Contributors" content="Jean Polo Cequeda Olago" lang="es">


    <meta property="og:title" content="<?php echo ((isset($nom_titulo)) ? $nom_titulo : ''); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo base_url('unoticia'); ?>/<?php echo ((isset($id_titulo)) ? $id_titulo : ''); ?>" />
    <meta property="og:image" content="<?php echo base_url("public/imagenes/noticia/"); ?>/<?php echo ((isset($imgalterna)) ? $imgalterna : 'default.jpg'); ?>" />
    <meta property="og:description" content="<?php echo ((isset($descripcion)) ? $descripcion : ''); ?>" />

    <!-- Favicon -->
    <link href='<?php echo base_url("assets/img/ico/favicon.ico"); ?>' rel='Shortcut icon'>

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
    <?= $_css ?>

</head>

<body class="header-fixed boxed-layout">
    <div class="wrapper">
        <?php include APPPATH . "views/uprincipal/header_navbar.php"; ?>


        <section class="content-header">
            <h1>
                <?php echo ((isset($content_header)) ? $content_header : ''); ?>
                <small><?php echo ((isset($content_sub_header)) ? $content_sub_header : ''); ?></small>
            </h1>
        </section>
        <!-- Alertas de la clase Template -->
        <div id="template_alerts">
            <?php foreach ($_warning as $_msj) : ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-exclamation-triangle"></i>&nbsp;
                    <?= $_msj ?>
                </div>
            <?php endforeach; ?>
            <?php foreach ($_success as $_msj) : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-check-circle"></i>&nbsp;
                    <?= $_msj ?>
                </div>
            <?php endforeach; ?>
            <?php foreach ($_error as $_msj) : ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-times-circle"></i>&nbsp;
                    <?= $_msj ?>
                </div>
            <?php endforeach; ?>
            <?php foreach ($_info as $_msj) : ?>
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-info-circle"></i>&nbsp;
                    <?= $_msj ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Main content -->
        <section class="content">
            <?php foreach ($_content as $_view) : ?>
                <?php include $_view; ?>
            <?php endforeach; ?>
        </section>

    </div>
    <!--/wrapper-->

    <!--=== Footer Version 1 ===-->
    <?php include APPPATH . "views/uprincipal/footer-v1.php"; ?>
    <!--=== End Footer Version 1 ===-->
    <?= $_js ?>

    <!----------- js plantilla ------->
    <!--        <script type="text/javascript">-->
    <!--            jQuery(document).ready(function () {-->
    <!--                App.init();-->
    <!--                FancyBox.initFancybox();-->
    <!--                Datepicker.initDatepicker();-->
    <!--                OwlCarousel.initOwlCarousel();-->
    <!--                LayerSlider.initLayerSlider();-->
    <!--                OwlRecentWorks.initOwlRecentWorksV2();-->
    <!--            });-->
    <!--        </script>-->


    <!--[if lt IE 9]>
<script src="assets/plugins/respond.js"></script>
<script src="assets/plugins/html5shiv.js"></script>
<script src="assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

    <!-- For Background Image -->
    <!--<script type="text/javascript" src="assets/plugins/backstretch/jquery.backstretch.min.js"></script>  -->
    <!--<script type="text/javascript">
    $.backstretch([
      "assets/img/bg/13.jpg"
      ])
</script>  -->
    <!-- End For Background Image -->


    <?php if (isset($is_normatividad)) : ?>
        <script type="text/javascript">
            function getActo() {
                var entidad_selected = $('select[name=txtEnt]').val();
                $.ajax({
                    data: {
                        entidad_selected: entidad_selected,
                    },
                    type: 'POST',
                    url: '<?php echo base_url("useccion/getActo"); ?>',
                    success: function(data) {
                        console.log(data);
                        $('.actos').html(data);
                    }
                })
            }

            function getAnyo() {
                var entidad_selected = $('select[name=txtEnt]').val();
                var acto_selected = $('select[name=txtActo]').val();
                $.ajax({
                    data: {
                        acto_selected: acto_selected,
                        entidad_selected: entidad_selected,
                    },
                    type: 'POST',
                    url: '<?php echo base_url("useccion/getAnyo"); ?>',
                    success: function(data) {
                        console.log(data);
                        $('.anyo').html(data);
                    }
                })
            }

            (function(d) {
                var s = d.createElement("script");
                s.setAttribute("data-account", "DDA2YfPFFJ");
                s.setAttribute("src", "https://cdn.userway.org/widget.js");
                (d.body || d.head).appendChild(s);
            })(document)
        </script>
    <?php endif; ?>
</body>

</html>