<!-- NOSOTROS -->
<div style="background-color: #b43432;">
    <div class="container content-prin profile">

        <div class="row margin-bottom-10 margin-top-10">
            <div class="headline-center-v2 margin-bottom-10">
            <div id="pie1" class="footer-v1 off-container">
        </div>
                <h1 style="font-size: 30px; color:#ffffff;"><b>Nosotros</b></h1>
                <span class="bordered-icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></span>
            </div>
 
                <div class="col-sm-4">
                    <div class="headline-center-v2 margin-bottom-10">
                        <h5 style="font-size: 25px; color:#ffffff;"><b><br>Quiénes somos</b></h5>
                        <div class="service-block-v2" style="background: #fff; border-top: 5px solid #f1c40f;">
                            <p>
                                <b>La UFPS Radio 95.2 FM es la emisora de la Universidad Francisco de Paula Santander en Cúcuta. Durante nuestra existencia nos hemos caracterizado por ser un medio de comunicación alternativo e incluyente.
</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="headline-center-v2 margin-bottom-10">
                        <h5 style="font-size: 25px; color:#ffffff;"><b><br>Qué hablamos</b></h5>
                        <div class="service-block-v2" style="background: #fff; border-top: 5px solid #3498db;">
                        <p>
                                <b>Nuestra academia, los hechos de actualidad, nuestra ciudad, las ciencias, las artes, la literatura, la música, la cultura y el sentir de nuestras comunidades, son los contenidos que se emiten desde la UFPS Radio 95.2FM
                                </b></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="headline-center-v2 margin-bottom-10">
                        <h5 style="font-size: 25px; color:#ffffff;"><b><br>Cómo lo hablamos</b></h5>
                        <div class="service-block-v2" style="background: #fff; border-top: 5px solid #e74c3c;">
                        <p>
                                <b>En la UFPS Radio 95.2 FM abordamos estos y muchos más temas a través de Programas radiales, Microprogramas, Seriados, Capsulas informativas, Especiales y Documentales sonoros de producción propia o fruto de convenios
                                interinstitucionales, nacionales e internacionales.
                                </b></p>
                        </div>
                    </div>
                </div>
        </div><!--/row-->

    </div>
</div>
<!-- FIN NOSOTROS -->
<style>
      .tarjeta {
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        padding: 20px;
        background-color: #fff;
        text-align: center;
        width: 95%;
        height: 95%;
        
      }
      .img-equipo {
        border-radius: 50%;
        width: 170px;
        height: 170px;
      }
      
      @media (min-width: 768px) {
        .img-equipo {
        border-radius: 50%;
        width: 160px;
        height: 160px;
      }
      .carousel-inner {
        display: flex;
        overflow: hidden;
        justify-content: center;
      }
      .carousel-inner .item {
        flex: 0 0 33.33%;
        max-width: 33.33%;
        transition: transform 0.6s ease-in-out;
        display: none;
        justify-content: center;
      }
      .carousel-inner .item.active,
      .carousel-inner .item-prev,
      .carousel-inner .item-next {
        display: block !important;
      }
      .carousel-inner .item.active + .item,
      .carousel-inner .item.active + .item + .item {
        display: block !important;
      }
      .carousel-inner .item.active ~ .item-prev,
      .carousel-inner .item.active ~ .item-next {
        display: none !important;
      }
    }
  
      .carousel-control-custom {
        background-color: transparent !important;
        transition: background-color 0.3s, box-shadow 0.3s;
      }
      .carousel-control-custom:hover {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
      }
      .carousel-control-custom:active {
        background-color: rgba(255, 0, 0, 0.5) !important;
      }
      .carousel-control-custom:not(:active) {
        background-color: transparent !important;
      }
      .section-title-equipo {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
      padding-left: 10%;
    }

    .section-title-equipo:after {
      content: "";
      display: block;
      width: 90%;
      height: 2.5px;
      background-color: red;
      margin-top: 10px;
    }

</style>
<h2 class="section-title-equipo">Equipo UFPS Radio 95.2 FM</h2>
<div class="container" style="background-color: #F8F8FF;">
  <br>
  <div id="carrusel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carrusel" data-slide-to="0" class="active"></li>
      <li data-target="#carrusel" data-slide-to="1"></li>
      <li data-target="#carrusel" data-slide-to="2"></li>
      <li data-target="#carrusel" data-slide-to="3"></li>
      <li data-target="#carrusel" data-slide-to="4"></li>
      <li data-target="#carrusel" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <div class="tarjeta">
          <img class="img-equipo" src="<?php echo base_url("public/imagenes/radio/equipo/felix.jpg"); ?>" alt="">
          <h3>Félix Joaquín Lozano Cardenas</h3>
          <h4>Coordinador - CECOM</h4>
          <p>CECOM</p>
        </div>
      </div>
      <div class="item">
        <div class="tarjeta">
          <img class="img-equipo" src="<?php echo base_url("public/imagenes/radio/equipo/grecia.jpg"); ?>" alt="">
          <h3>Grecia Karina Corzo Mendoza</h3>
          <h4>Jefe de producción y programación</h4>
          <p>UFPSRadio 95.2F.M.</p>
        </div>
      </div>
      <div class="item">
        <div class="tarjeta">
          <img class="img-equipo" src="<?php echo base_url("public/imagenes/radio/equipo/jessica.jpg"); ?>" alt="">
          <h3>Jessica Barrera Pinto</h3>
          <h4>Productora Radial</h4>
          <p>UFPSRadio 95.2F.M.</p>
        </div>
      </div>
      <div class="item">
        <div class="tarjeta">
          <img class="img-equipo" src="<?php echo base_url("public/imagenes/radio/equipo/jesus.jpg"); ?>" alt="">
          <h3>Jesús Enrique Hernández Contreras</h3>
          <h4>Dj y Control Master</h4>
          <p>UFPSRadio 95.2F.M.</p>
        </div>
      </div>
      <div class="item ultima">
        <div class="tarjeta">
          <img class="img-equipo" src="<?php echo base_url("public/imagenes/radio/equipo/miguel.jpg"); ?>" alt="">
          <h3>Miguel Ángel Estévez Restrepo</h3>
          <h4>Control Master</h4>
          <p>UFPSRadio 95.2F.M.</p>
        </div>
      </div>
      <div class="item">
        <div class="tarjeta">
          <img class="img-equipo" src="<?php echo base_url("public/imagenes/radio/equipo/patricia.jpg"); ?>" alt="">
          <h3>Carmen Patricia Álvarez Cáceres</h3>
          <h4>Secretaria</h4>
          <p>CECOM</p>
        </div>
      </div>
    </div>
    <a class="left carousel-control carousel-control-custom" href="#carrusel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" style="color:red" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control carousel-control-custom" href="#carrusel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" style="color:red" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
   
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
  $(document).ready(function() {

    if ($(window).width() > 768) {
    // Escuchamos el evento 'slid.bs.carousel' para detectar cuando el carrusel ha cambiado de slide
    $('#carrusel').on('slid.bs.carousel', function() {
      // Verificamos si el último item ('ultima') tiene la clase 'active'
      if ($('.item.ultima').hasClass('active')) {

        // Removemos la clase 'active' de la última diapositiva
        $('.item.ultima').removeClass('active');

        // Agregamos la clase 'active' al primer item del carrusel
        $('.carousel-inner .item:first').addClass('active');

        // Reiniciamos los indicadores del carrusel
        $('.carousel-indicators li').removeClass('active');
        $('.carousel-indicators li:first').addClass('active');
      }
    });
  }});
</script>

</div><!-- Redes Sociales ---------------------->

<div style=" background-color: #ffffff; ">
  <div class="container content-prin profile" style=" background-color: #ffffff;">
    <div class="row margin-top-10">


      <div class="headline-center-v2 headline-center-v2-dark margin-bottom-10">
                <h1 style="font-size: 30px;"><b>Redes Sociales</b></h1>
                <span class="bordered-icon"><i class="fa fa-weixin" aria-hidden="true"></i></span>
            </div>

            <div align="center" class="margin-bottom-20">
          <a href="https://www.facebook.com/UFPS-RADIO-23274124820/?fref=ts"target="_blank">
            <img src="<?php echo base_url("public/imagenes/radio/social/1480311546_fb.png"); ?>" width="40px" height="40px" alt="Logo" />
          </a>&nbsp;&nbsp;
          <a href="https://twitter.com/ufpsradio"
          target="_blank"><img src="<?php echo base_url("public/imagenes/radio/social/1480311550_twitter.png"); ?>" width="40px" height="40px" alt="Logo" />
          </a>&nbsp;&nbsp;
          <a href="https://soundcloud.com/ufpsradio"target="_blank">
            <img src="<?php echo base_url("public/imagenes/radio/social/orange_white_40-94fc761.png"); ?>" width="40px" height="40px" alt="Logo" />
          </a>
        </div>

      <div class="col-md-12">
        <div class="row equal-height-columns margin-bottom-10">

					 <!-- Facebook-->
           <div class="col-md-6">
             <div class="fb-page" data-href="https://www.facebook.com/UFPS-RADIO-23274124820/?ref=page_internal"
             data-tabs="timeline" data-height="500" data-width="500" data-small-header="false"
             data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true">
             <blockquote cite="https://www.facebook.com/UFPS-RADIO-23274124820/?ref=page_internal" class="fb-xfbml-parse-ignore">
               <a href="https://www.facebook.com/UFPS-RADIO-23274124820/?ref=page_internal">UFPS RADIO</a>
             </blockquote>
           </div>
           </div>

          <!--Twitter-->
          <div class="col-md-6">
            <a class="twitter-timeline " data-lang="es" data-width="500"
            data-height="500" data-dnt="true" href="https://twitter.com/ufpsradio">Tweets by ufpsradio</a>
            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            <a class="twitter-follow-button"href="https://twitter.com/ufpsradio">Sigue @ufpsradio</a>
          </div>

          <div class="col-md-12">
            <div class="fb-comments" data-href="https://www.facebook.com/UFPS-RADIO-23274124820"data-mobile data-numposts="10">
            </div>
            <div id="incluirPagina" name="incluirPagina">
            </div>
          </div>


  </div>
</div>
</div>
</div><!-- End Redes Sociales ---------------------->
</div>


<!-- ICONOS REDES SOCIALES -->
<div class="cuadroredes">
    <ul class="social-icons margin-top-10">
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Facebook"><a
                href="https://www.facebook.com/UFPS-C%C3%BAcuta-553833261409690" class="rounded social_facebook"></a>
        </li>
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Twitter"><a
                href="https://twitter.com/UFPSCUCUTA" class="rounded social_twitter"></a></li>
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Youtube"><a
                href="https://www.youtube.com/channel/UCgPz-qqaAk4lbHfr0XH3k2g" class="rounded social_youtube"></a></li>
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Instagram">
            <a href="https://www.instagram.com/ufpscucuta/" class="rounded social_instagram"></a></li>
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Escuchanos en Vivo"><a
                href="http://www.ufps.edu.co/emisora/player.php" class="rounded social_emisora"></a></li>
    </ul>
</div>
<!-- FIN ICONOS REDES SOCIALES -->




<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<style>
  /* Contenedor principal del carrusel */
  .swiper-container {
    width: 100%;
    height: 450px;
    background-image: url("https://s2.abcstatics.com/media/bienestar/2022/01/01/musica-clasica-beneficios-k7IG--1248x698@abc.jpg"); 
    background-size: cover;
    background-position: center;
    overflow: hidden; /* Para evitar el scroll horizontal */
  }

  .swiper-slide {
  display: flex;
  justify-content: center;
  align-items: center; 
}

  /* Ajustes de las imágenes para que quepan según el tamaño de la pantalla */
  .carousel-image {
    width: 100%;
    height: 300px;
    max-width: 100%; /* Evitar que las imágenes sobrepasen su contenedor */
    object-fit: cover; /* Para ajustar las imágenes sin deformarlas */
    box-shadow: 15px 15px 50px rgba(0, 0, 0, 0.5)
  }

  

  /* Responsive: cuando la pantalla sea menor a 780px mostrar 2 imágenes */
  @media (max-width: 900px) {
    .swiper-container {
      height: 300px;
    }
    .carousel-image {
      height: 200px;
    }
   
  }

  /* Responsive: cuando la pantalla sea menor a 500px mostrar 1 sola imagen */
  @media (max-width: 500px) {
    .swiper-container {
      height: 250px;
    }
    .carousel-image {
      height: 150px;
    }
   
  }
  .section-title-colectivos {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
      padding-left: 10%;
      text-align: center;

    }

    .section-title-colectivos:after {
      content: "";
      display: block;
      width: 130px;
      height: 2.5px;
      background-color: red;
      margin-top: 10px;
      margin: 10px auto 0 auto;
    }
</style>

<h2 class="section-title-colectivos">Colectivos Radiales</h2>


<!-- Contenedor del carrusel -->
<div class="swiper-container">
  <div class="swiper-wrapper">
    <!-- Slides con las imágenes -->
    <div class="swiper-slide"><img src="https://radionacional-v3.s3.amazonaws.com/s3fs-public/styles/portadas_relaciona_4_3/public/senalradio/articulo-noticia/galeriaimagen/piano-1655558_1280.jpg?h=1c9b88c9&itok=PuVKDe1b" alt="Imagen 2" class="carousel-image"></div>
    <div class="swiper-slide"><img src="https://ww2.ufps.edu.co/public/imagenes/seccion/a6f32d218e21789ac34c372e849b9921.jpg" alt="Imagen 1" class="carousel-image"></div>
    <div class="swiper-slide"><img src="https://radionacional-v3.s3.amazonaws.com/s3fs-public/styles/portadas_relaciona_4_3/public/senalradio/articulo-noticia/galeriaimagen/piano-1655558_1280.jpg?h=1c9b88c9&itok=PuVKDe1b" alt="Imagen 3" class="carousel-image"></div>
    <div class="swiper-slide"><img src="https://ww2.ufps.edu.co/public/imagenes/seccion/a6f32d218e21789ac34c372e849b9921.jpg" alt="Imagen 1" class="carousel-image"></div>
    <div class="swiper-slide"><img src="https://radionacional-v3.s3.amazonaws.com/s3fs-public/styles/portadas_relaciona_4_3/public/senalradio/articulo-noticia/galeriaimagen/piano-1655558_1280.jpg?h=1c9b88c9&itok=PuVKDe1b" alt="Imagen 3" class="carousel-image"></div>
    <div class="swiper-slide"><img src="https://ww2.ufps.edu.co/public/imagenes/seccion/a6f32d218e21789ac34c372e849b9921.jpg" alt="Imagen 1" class="carousel-image"></div>
  </div>
 
</div>

<!-- Scripts de Swiper.js -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper('.swiper-container', {
    loop: true,  // Repetición infinita
    slidesPerView: 1,  // Mostrar 3 imágenes al mismo tiempo en pantallas grandes
    spaceBetween: 10,  // Espacio entre cada imagen
    simulateTouch: true,
    grabCursor: true,
    speed: 600,  
    autoplay: {
   delay: 5000,
 },
    breakpoints: {
      900: {
        slidesPerView: 3, // 2 imágenes para pantallas menores a 780px
      },
      500: {
        slidesPerView: 2, // 1 imagen para pantallas menores a 500px
      }
    }
  });
</script>
