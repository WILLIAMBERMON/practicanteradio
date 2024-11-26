

<!-- CARRUSEL CON LOS COLECTIVOS RADIALES -->
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
    <?php foreach ($colectivos as $colectivo) :?>
    <div class="swiper-slide">
      <a href="<?php echo base_url("radiocontenido/colectivo_radial/" . $colectivo->id); ?>">
        <img src="<?php echo base_url("public/imagenes/radio/colectivos/" . $colectivo->foto); ?>" alt="Imagen 1" class="carousel-image">
      </a>
    </div>
    <?php endforeach; ?>  

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
<!-- FIN COLECTIVOS -->


<!-- Carrusel con el equipo de la radio -->
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
      text-align: center;

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

           

      <div class="col-md-12">
        <div class="row equal-height-columns margin-bottom-10">

					 <!-- Facebook-->
           <div class="col-xs-12 col-sm-12 col-md-6">
             <div class="fb-page" data-href="https://www.facebook.com/UFPS-RADIO-23274124820/?ref=page_internal"
             data-tabs="timeline" data-height="620" data-width="480" data-small-header="false"
             data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true">
             <blockquote cite="https://www.facebook.com/UFPS-RADIO-23274124820/?ref=page_internal" class="fb-xfbml-parse-ignore">
               <a href="https://www.facebook.com/UFPS-RADIO-23274124820/?ref=page_internal">UFPS RADIO</a>
             </blockquote>
           </div>
          </div>

         <!-- Instagram -->
        <div class="col-xs-12 col-sm-12 col-md-6 ">
          <h3 style="display: inline; margin-right: 10px;">Síguenos en Instagram</h3>
              <a href="https://www.instagram.com/ufpsradio/" target="_blank" style="display: inline;">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram" style="width: 20px; height: 20px; vertical-align: middle;">
              </a>
              <p>Visita nuestro perfil para ver las últimas publicaciones.</p>

              
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/ufpsradio/" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
            
              
              <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div>
                <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div>
                <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div>
                <div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div>
                <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>
      </div>

          


  </div>
</div>
</div>
</div><!-- End Redes Sociales ---------------------->


<!-- ICONOS REDES SOCIALES -->
<div class="cuadroredes">
    <ul class="social-icons margin-top-10">
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Facebook"><a
                href="https://www.facebook.com/UFPS-C%C3%BAcuta-553833261409690" class="rounded social_facebook"></a>
        </li>
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Youtube"><a
                href="https://www.youtube.com/channel/UCgPz-qqaAk4lbHfr0XH3k2g" class="rounded social_youtube"></a></li>
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Síguenos en Instagram">
            <a href="https://www.instagram.com/ufpsradio/" class="rounded social_instagram"></a></li>
        <li class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Escuchanos en Vivo"><a
                href="http://www.ufps.edu.co/emisora/player.php" class="rounded social_emisora"></a></li>
    </ul>
</div>
<!-- FIN ICONOS REDES SOCIALES -->





