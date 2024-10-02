<!--=== Header v6 ===-->
<div id="menu-principal" class="header-v6 header-white-transparent header-sticky" style="position: relative;">
    <div id="barra-superior" class="header-v8">
        <!-- Topbar blog -->
        <div class="blog-topbar">
            <div class="topbar-search-block">
                <div class="container">
                    <form method=GET action="https://www.google.es/search">
                        <input type=hidden name=domains value="http://ww2.ufps.edu.co" />
                        <input type=hidden name=sitesearch value="http://ww2.ufps.edu.co" checked />
                        <input type="text" id="s" name="q" class="form-control" placeholder="Buscar...">
                        <div class="search-close"><i class="icon-close"></i></div>
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 col-xs-7">
                        <div class="topbar-toggler" style="font-size: 10px; color: #eee; letter-spacing: 1px; text-transform: uppercase;"><span class="fa fa-angle-down"></span> PERFILES</div>

                        <!-- <iframe style="background:transparent" name="player" allow="autoplay" width="120px" height="52px" marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling=no src="https://apps.ufps.edu.co/emisoraufps"></iframe> -->
                        <video controls="" autoplay="" name="media" width="130px" height="52px">
                            <source src="https://apps.ufps.edu.co/emisoraufps" type="application/ogg">
                        </video>

                    </div>
                    <div class="col-sm-5 col-xs-5 clearfix">
                        <i class="fa fa-search search-btn pull-right"></i>
                        <ul class="topbar-list topbar-log_reg pull-right visible-md-block visible-lg-block">
                            <li class="cd-log_reg home" style="padding: 0px 12px;">
                                <div id="google_translate_element"></div>
                                <script type="text/javascript">
                                    function googleTranslateElementInit() {
                                        new google.translate.TranslateElement({
                                            pageLanguage: 'es',
                                            includedLanguages: 'en,fr,it',
                                            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                                            autoDisplay: false
                                        }, 'google_translate_element');
                                    }
                                </script>
                                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                            </li>

                            <!--   <li class="cd-log_reg home">
                                <a href="http://www.ufps.edu.co/ufps/antigua.php"><i class="fa fa-reply"></i> Versión Anterior</a>
                            </li>  -->
                            <!--    <li class="cd-log_reg"><a class="cd-signup" href="javascript:void(0);">Register</a></li>  -->
                        </ul>
                    </div>
                </div>
                <!--/end row-->
            </div>
            <!--/end container-->
        </div>
        <!-- End Topbar blog -->

    </div>

    <div class="header-v8 img-logo-superior" style="background-color: #aa1916;">
        <!--=== Parallax Quote ===-->
        <div class="parallax-quote parallaxBg" style="padding: 30px 30px;">

            <div class="parallax-quote-in" style="padding: 0px;">


                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <a href="http://ww2.ufps.edu.co" target="_blank"><br>
                            <img id="logo-header" src="<?php echo base_url("public/imagenes/template/header/logo_ufps.png"); ?>" alt="Logo UFPS">
                        </a>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5">
                        <a href="http://ww2.ufps.edu.co/uradio">
                            <img id="logo-header" src="<?php echo base_url("public/imagenes/template/header/pendon-emisora.png"); ?>" alt="Logo Radio UFPS" width="200px" height="160px">
                        </a>
                    </div>
                    <div class="col-md-2 col-ms-1 col-xs-2 pull-right">
                        <a href="http://www.colombia.co/" target="_blank"><br>
                            <img class="header-banner" src="<?php echo base_url("public/imagenes/template/header/escudo_colombia.png"); ?>" alt="Escudo de Colombia"></a>
                    </div>
                </div>
            </div>
        </div>
        <!--=== End Parallax Quote ===-->

    </div>
    <!--/end container-->

    <div class="menu-responsive">
        <!-- Logo -->
        <a class="logo logo-responsive" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url("public/imagenes/template/header/horizontal_logo_pequeno.png"); ?>" alt="Logo">
        </a>
        <!-- End Logo -->

        <!-- Toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
        <!-- End Toggle -->
    </div>

    <!-- Navbar -->
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
            <?php echo $menuprincipal->desc_contenido; ?>
        </div>
    </div>
    <!--/navbar-collapse-->

    <!-- End Navbar -->
</div>
<!--=== End Header v6 ===-->