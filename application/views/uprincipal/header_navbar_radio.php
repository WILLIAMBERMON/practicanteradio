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
                        
                        <div class="audio-container">
                            <audio id="radio-player" controls autoplay>
                                <source src="https://apps.ufps.edu.co/emisoraufps" type="audio/mpeg">
                            </audio>
                            <img class="station-logo" src="https://ww2.ufps.edu.co/public/imagenes/template/header/pendon-emisora.png" alt="Radio Logo">
                        </div>
                            <style>
                                
                                /* Estilos base para el contenedor del reproductor */
                                .audio-container {
                                    position: relative;
                                    display: flex;
                                    align-items: center;
                                    background-color: rgba(255, 255, 255, 0.8); /* Fondo translúcido */
                                    padding: 1%;
                                    border-radius: 20px;
                                    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2); /* Sombra flotante */
                                    transition: all 0.3s ease-in-out;
                                    max-width: 310px;
                                    margin: 0 auto; /* Centra el reproductor horizontalmente */
                                }

                                /* Imagen de logo pequeña a la izquierda del reproductor */
                                .station-logo {
                                    width: 40px;
                                    height: 40px;
                                    margin-right: 1%;
                                    border-radius: 50%;
                                    border: 2px solid #ff0000; /* Borde rojo */
                                }

                                /* Estilos para el audio, ocultando la barra de progreso */
                                audio {
                                    outline: none;
                                    background: transparent;
                                }

                                audio::-webkit-media-controls-panel {
                                    background-color: rgba(0, 0, 0, 0.5); /* Fondo del panel en negro translúcido */
                                    color: white;
                                }

                                audio::-webkit-media-controls-timeline {
                                    display: none; /* Oculta la barra de progreso */
                                }

                                audio::-webkit-media-controls-current-time-display,
                                audio::-webkit-media-controls-time-remaining-display {
                                    display: none; /* Oculta los tiempos */
                                }

                                audio::-webkit-media-controls-play-button {
                                    color: #ff0000; /* Botón de play en rojo */
                                }

                                audio::-webkit-media-controls-mute-button {
                                    color: #ffffff; /* Botón de mute en blanco */
                                }

                                /* Estilos para cuando se hace scroll: el reproductor se convierte en una burbuja */
                                .audio-container.floating {
                                    position: fixed;
                                    bottom: 20px;
                                    right: 20px;
                                    background-color: rgba(0, 0, 0, 0.7); /* Fondo negro translúcido */
                                    padding: 1%;
                                    border-radius: 50px;
                                    width: 310px;  /* Ancho flotante */
                                    box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.5); /* Efecto flotante */
                                    z-index: 1000;
                                    max-width: none; /* Quita el límite de 100% */
                                    transform: scale(0.9); /* Hace más pequeño el reproductor al hacer scroll */
                                }

                                .audio-container.floating .station-logo {
                                    width: 30px;
                                    height: 30px;
                                }

                                /* Media query para que el reproductor sea 100% en pantallas pequeñas */
                                @media (max-width: 768px) {
                                    .audio-container {
                                        width: 100%; /* 100% del ancho en pantallas pequeñas */
                                        max-width: 100%;
                                        padding: 5px;
                                    }

                                    .audio-container.floating {
                                        width: 52%;  /* Asegúrate de que el reproductor no se esconda en la pantalla al estar flotante */
                                        right: 5%;   /* Lo mantiene visible en la pantalla pequeña */
                                        bottom: 10px;
                                        transform: scale(0.8); /* Mantén el efecto de hacer más pequeño */
                                    }
                                }

                                /* Animación para que se vea más flotante */
                                .audio-container:hover {
                                    transform: translateY(-5px);
                                }

                            </style>
                            <script>
                                window.onscroll = function () {
                                const audioContainer = document.querySelector('.audio-container');
                                if (window.scrollY > 100) {
                                    audioContainer.classList.add('floating');
                                } else {
                                    audioContainer.classList.remove('floating');
                                }
                            };

                            </script>
                            


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