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
                    <div class="col-sm-8 col-xs-10">
                        <div class="topbar-toggler" style="font-size: 10px; color: #eee; letter-spacing: 1px; text-transform: uppercase;"><span class="fa fa-angle-down"></span> PERFILES</div>
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
                                    max-width: 55%;
                                }

                                /* Imagen de logo pequeña a la izquierda del reproductor */
                                .station-logo {
                                    width: 45px;
                                    height: 45px;
                                    border-radius: 50%;
                                    border: 2px solid #ff0000; /* Borde rojo */
                                }

                                /* Estilos para el audio, ocultando la barra de progreso */
                                audio {
                                    display: none;
                                }
                                /* Estilos para cuando se hace scroll: el reproductor se convierte en una burbuja */
                                .audio-container.floating {
                                    position: fixed;
                                    bottom: 20px;
                                    right: 20px;
                                    background-color: rgba(0, 0, 0, 0.7); /* Fondo negro translúcido */
                                    padding: 1%;
                                    border-radius: 50px;
                                    width: 28%;  /* Ancho flotante */
                                    box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.5); /* Efecto flotante */
                                    z-index: 1000;
                                    max-width: none; /* Quita el límite de 100% */
                                    color: #999;
                                }
                                .audio-container.floating p {
                                    color: #999 !important;
                                }

                                

                                /* Media query para que el reproductor sea 100% en pantallas pequeñas */
                                @media (max-width: 768px) {
                                    .audio-container {
                                        width: 100%; /* 100% del ancho en pantallas pequeñas */
                                        max-width: 100%;
                                        padding: 5px;
                                    }

                                    .audio-container.floating {
                                        width: 80%;  /* Asegúrate de que el reproductor no se esconda en la pantalla al estar flotante */
                                        right: 5%;   /* Lo mantiene visible en la pantalla pequeña */
                                        bottom: 10px;
                                    }
                                }

                                /* Animación para que se vea más flotante */
                                .audio-container:hover {
                                    transform: translateY(-3px);
                                }
                                .boton-reproductor {
                                        background-color: red; /* Color de fondo rojo */
                                        border-radius: 50%; /* Hace que el contenedor sea redondo */
                                        width: 45px; /* Ancho del contenedor */
                                        height: 45px; /* Alto del contenedor */
                                        display: flex; /* Para centrar el contenido */
                                        justify-content: center; /* Centra el contenido horizontalmente */
                                        align-items: center; /* Centra el contenido verticalmente */
                                        color: white; /* Color del texto */
                                        font-size: 16px; /* Tamaño de fuente */
                                        text-align: center; /* Alineación del texto */
                                        border: 2px solid red; /* Borde rojo alrededor del botón */
                                        position: relative; /* Necesario para el efecto de pseudo-elemento */
                                        transition: background-color 0.3s, transform 0.3s; /* Efecto suave en el hover */
                                        cursor: pointer; /* Cambia el cursor a puntero */
                                    }

                                    .boton-reproductor:hover {
                                        background-color: darkred; /* Color de fondo más oscuro al hacer hover */
                                        transform: scale(1.05); /* Efecto de aumento al hacer hover */
                                    }
                                    #volume {
                                        -webkit-appearance: none; /* Para WebKit */
                                        appearance: none; /* Para otros navegadores */
                                        height: 5px; /* Altura del control deslizante */
                                        background: #ccc; /* Color de fondo del control deslizante */
                                        border-radius: 50px; /* Hace que el control deslizante sea redondeado */
                                    }
                                    #volume::-webkit-slider-thumb {
                                        -webkit-appearance: none; /* Elimina el estilo por defecto */
                                        appearance: none;
                                        width: 15px; /* Ancho del pulgar */
                                        height: 15px; /* Alto del pulgar */
                                        border-radius: 50%; /* Hace que el pulgar sea redondo */
                                        background: #fff; /* Color del pulgar */
                                        cursor: pointer; /* Cambia el cursor al pasar el mouse */
                                        transition: background 0.3s; /* Transición suave para el color */
                                    }
                                    #volume::-moz-range-thumb {
                                        width: 15px; /* Ancho del pulgar */
                                        height: 15px; /* Alto del pulgar */
                                        border-radius: 50%; /* Hace que el pulgar sea redondo */
                                        background: #fff; /* Color del pulgar */
                                        cursor: pointer; /* Cambia el cursor al pasar el mouse */
                                        transition: background 0.3s; /* Transición suave para el color */
                                    }
                                    #volume:hover::-webkit-slider-thumb {
                                        background: red; /* Cambia a rojo al hacer hover */
                                    }
                                    #volume:hover::-moz-range-thumb {
                                        background: red; /* Cambia a rojo al hacer hover */
                                    }
                                    .volume-control {
                                        display: flex; /* Usar flexbox para alinear en fila */
                                        align-items: center; /* Centrar verticalmente */
                                        gap: 10px; /* Espacio entre el ícono y el control deslizante */
                                    }
     
                            </style>
                            
                        <div class="audio-container">
                            
                            <div class="player">
                                    <button id="play" class="boton-reproductor" style="display:none;">
                                        <i class="fas fa-play"></i> 
                                    </button>
                                    <button id="pause" class="boton-reproductor">
                                        <i class="fas fa-pause"></i> 
                                    </button>
                                    <audio id="audio" controls autoplay>
                                        <source src="https://apps.ufps.edu.co/emisoraufps" type="audio/mpeg">
                                    </audio>
                            </div>
                            

                            <div class="contenedor-informacion" style="width:70%; text-align: center;">
                            <p style="font-weight: bold; font-size: 1.3em; margin: 1px; color: #333;">
                                <?php echo $colectivo_actual ? $colectivo_actual->titulo : "En Directo - UFPS"; ?>
                            </p>
                            <p style="font-size: 1.1em; margin: 1px; color: #666;"> 
                                             <?php  if($programacion_actual):
                                                    // Convertir hora_inicio a formato 12H
                                                    $hora_inicio = date("g:i A", strtotime($programacion_actual->hora_inicio));
                                                    // Convertir hora_fin a formato 12H
                                                    $hora_fin = date("g:i A", strtotime($programacion_actual->hora_fin));
                                                    
                                                    echo $hora_inicio; ?> - <?php echo $hora_fin; 
                                             endif; ?>
                                </p>
                                <div class="volume-control">
                                    <i class="icono-volume5  fa-solid fa-volume-high " aria-hidden="true"></i>
                                    <i class="icono-volume-  fas fa-volume-down hidden" aria-hidden="true"></i>
                                    <i class="icono-volume0  fas fa-volume-off hidden" aria-hidden="true"></i>
                                    <input type="range" id="volume" min="0" max="1" step="0.1" value="1" style="width:100%;">
                                </div>
                                
                            </div>
                            
                            <img class="station-logo" src="<?php echo $colectivo_actual ? base_url("public/imagenes/radio/colectivos/" . $colectivo_actual->foto)  : base_url("public/imagenes/template/header/pendon-emisora.png"); ?>" alt="Radio Logo">
                        </div>

                        <script>
                            $(document).ready(function() {
                                    const $audio = $('#audio');
                                    const $playButton = $('#play');
                                    const $pauseButton = $('#pause');

                                    // Intentar reproducir al cargar
                                    $audio.prop('autoplay', true).prop('muted', true);
                                    $audio[0].play().catch(() => {
                                        // Mostrar el botón de reproducción si el autoplay falla
                                        $playButton.show();
                                        $pauseButton.hide();
                                    });

                                    // Reproducción al interactuar con el botón
                                    $playButton.on('click', function () {
                                        $audio.prop('muted', false)[0].play();
                                        $playButton.hide();
                                        $pauseButton.show();
                                    });

                                    $pauseButton.on('click', function () {
                                        $audio[0].pause();
                                        $playButton.show();
                                        $pauseButton.hide();
                                    });
                                    $('#volume').on('input', function() {
                                        audio.volume = $(this).val();
                                        //console.log("valor = "+ $(this).val() );
                                        if ($(this).val() >= 0.5) {
                                            $('.icono-volume-').addClass('hidden');
                                            $('.icono-volume0').addClass('hidden');
                                            $('.icono-volume5').removeClass('hidden');
                                        }
                                        else if ($(this).val()< 0.5 && $(this).val()> 0.0 ) {
                                            $('.icono-volume5').addClass('hidden');
                                            $('.icono-volume0').addClass('hidden');
                                            $('.icono-volume-').removeClass('hidden');
                                        }else{
                                            $('.icono-volume5').addClass('hidden');
                                            $('.icono-volume-').addClass('hidden');
                                            $('.icono-volume0').removeClass('hidden');
                                        }
                                    });
                                });
                        </script>

                     </div>      
                    <div class="col-sm-4 col-xs-2 clearfix">
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

    <div class="menu-responsive burguer">
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
    
  <style>
    .navbar-radio {
      position: relative; /* Inicialmente es relativa */
      width: auto; /* Navbar a 100% de ancho */
      margin: 0 auto; /* Centramos el navbar */
      transition: all 0.3s ease;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .navbar-radio.fixed {
      position: fixed;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      z-index: 1000; /* Asegura que el navbar esté por encima de otros elementos */
      width: 100%; /* Cambiamos el ancho al 80% */
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

    }
    .burguer.fixed {
    position: fixed;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      z-index: 1000; /* Asegura que el navbar esté por encima de otros elementos */
      width: 70%;
    }
    .navbar-radio .container {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .navbar-radio.fixed .logo-navbar-radio {
      display: block;
    }
    .logo-navbar-radio {
      display: none;
      height: 40px;
      margin-right: 20px;
    }
  </style>

  
  <!-- Navbar -->
  <div class="navbar-radio">
    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
      <div class="container">
    <img src="https://ww2.ufps.edu.co/public/imagenes/template/header/pendon-emisora.png" alt="Logo" class="logo-navbar-radio">

    <ul class="nav navbar-nav">
                <!-- Home -->
                <li>
                    <a id="nosotros" href="/radiocontenido/radio-ufps/1785">
                        Nosotros
                    </a>
                </li>
                <!-- End Home -->
                <li>
                    <a id="programacion" href="/radiocontenido/programacion-ufps-radio/1890">
                        Programación
                    </a>
                </li>
                <li>
                    <a id="programacion" href="/radiocontenido/colectivos-radiales-ufps-radio/1784">
                        Colectivos Radiales UFPS RADIO
                    </a>
                </li>
                <!-- Pages -->
                <li>
                    <a id="contacto" href="/radiocontenido/radio-ufps/1786">
                        Contacto
                    </a> 
            </li>
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    Intégrate a la UFPS Radio
                </a>
                <ul class="dropdown-menu">
                <?php
                $pdf1= isset($array_contenido["pdf_creacion_colectivos_radiales"]) ? $array_contenido["pdf_creacion_colectivos_radiales"] : null ;
                $pdf2= isset($array_contenido["estilo_rruc_radio"]) ? $array_contenido["estilo_rruc_radio"] : null ;
                $pdf3= isset($array_contenido["etica_estilo_ufps_radio"]) ? $array_contenido["etica_estilo_ufps_radio"] : null ;

                ?>
                <?php if(isset($pdf1)): ?>
                    <li><a href="/radiocontenido/integrate-ufps/1">Instructivo Creación Colectivos Radiales</a></li>
                <?php endif; ?> 
                <?php if(isset($pdf2)): ?>           
                    <li><a href="/radiocontenido/integrate-ufps/2">Manual de estilo RRUC</a></li>
                <?php endif; ?>    
                <?php if(isset($pdf3)): ?>        
                    <li><a href="/radiocontenido/integrate-ufps/3">Manual de ética y estilo UFPS Radio</a></li>
                <?php endif; ?>            
                </ul>
            </li>
            
            <!-- End Blog -->

          
 
            </ul>        
      </div>
    </div>
  </div>

  <script>
    window.onscroll = function() {
      var navbar = document.querySelector('.navbar-radio');
      var burguer = document.querySelector('.burguer');

      if (window.pageYOffset > 100) { // Puedes ajustar el valor
        navbar.classList.add('fixed');
        burguer.classList.add('fixed');

      } else {
        navbar.classList.remove('fixed');
        burguer.classList.remove('fixed');

      }
      const audioContainer = document.querySelector('.audio-container');
        if (window.scrollY > 100) {
            audioContainer.classList.add('floating');
        } else {
            audioContainer.classList.remove('floating');
        }
    };
  </script>




    <!-- End Navbar -->
</div>
<!--=== End Header v6 ===-->